<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\Admin\UserRequest;
use App\MadarNews\Interfaces\RoleInterface;
use App\MadarNews\Interfaces\UserInterface;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * object from UsersRepository
     */
    protected $userRepository,$roleRepository;

    /**
     * UserController constructor.
     * deal with UsersInterface
     * @param UserInterface $userRepository
     * @param RoleInterface $roleRepository
     */
    public function __construct(UserInterface $userRepository,RoleInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * index function to show all users
     */
    public function index()
    {
        //get all users by repository
        $users = $this->userRepository->all();

        //get index view that show all users
        return view('admin.users.index',compact('users'));
    }

    /**
     * create function to show create user view
    */
    public function create()
    {
        //get all roles
        $roles = $this->roleRepository->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * store function to insert user in database
     * @param UserRequest $request
     * @return UserRequest|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        //add avatar to request
        $request->request->add(['avatar' => 'person.png']);

        //add hash password to request
        $request->merge(['password' => bcrypt($request->password)]);

        //insert user in database
        $user = $this->userRepository->create($request->except('_token'));

        //if choose role
        if($request->role_id != null){
            $user->role()->attach($request->role_id);
        }
        if($request->permissions != null){
            $user->permission()->attach($request->permissions);
        }

        if($user)
            return redirect()->route('admin.users.index')->with(['success' => __('admin.addUserSuccessfully')]);
        else
            return redirect()->route('admin.users.index')->with(['error' => __('admin.error')]);
    }

    /**
     * edit function to show edit user view
     * @param $id
     */
    public function edit($id)
    {
        //find user by id
        $user = $this->userRepository->getById($id);

        //check if user exist
        if(!$user)
            return redirect()->route('admin.users.index')->with(['error' => __('admin.userNotFount')]);

        //get all roles
        $roles = $this->roleRepository->all();

        $userRole = $user->role->first();
        if($userRole != null){
            $rolePermissions = $userRole->permission;
        }else{
            $rolePermissions = null;
        }

        $userPermissions = $user->permission;
        return view('admin.users.edit',compact('user','roles','userRole','rolePermissions','userPermissions'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //find user by id
        $user = $this->userRepository->getById($id);

        //check if user exist
        if(!$user)
            return redirect()->route('admin.users.index')->with(['error' => __('admin.userNotFount')]);


        //if change password of user
        if ($request->filled('password'))
        {
            //add hash password to request
            $request->merge(['password' => bcrypt($request->password)]);

            //update user data with password
            $user->update($request->except(['id','password_confirmation']));
        }
        else
            $user->update($request->only(['name','email']));

        if($request->role_id != null)
        {
            $user->role()->sync($request->role_id);
        }

        if($request->permissions != null)
        {
            $user->permission()->sync($request->permissions);
        }

        if(true)
            return redirect()->route('admin.users.index')->with(['success' => __('admin.editUserSuccessfully')]);
        else
            return redirect()->route('admin.users.index')->with(['error' => __('admin.error')]);

    }

    /**
     * delete user by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find user by id
        $user = $this->userRepository->getById($id);

        //check if user exist
        if(!$user)
            return redirect()->route('admin.users.index')->with(['error' => __('admin.userNotFount')]);

        $this->userRepository->delete($user);
        return redirect()->route('admin.users.index')->with(['success' => __('admin.deleteUserSuccessfully')]);
    }

    /**
     * show edit profile form
     */
    public function editProfile()
    {
        //get id of user
        $user = $this->userRepository->getById(Auth::user()->id);

        return view('admin.profile.edit',compact('user'));
    }

    /**
     * @param ProfileRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateProfile(ProfileRequest $request,$id)
    {
        //find user by id
        $user = $this->userRepository->getById($id);

        //check if user exist
        if(!$user)
            return redirect()->route('admin.users.index')->with(['error' => __('admin.userNotFount')]);
        //handle photos
        if ($request->hasFile('avatar')) {
            $avatar = $this->handleImage($request,'users');
            $user->avatar = $avatar;
        }
        $this->userRepository->saveAvatar($user);

        //if change password of user
        if ($request->filled('password'))
        {
            //add hash password to request
            $request->merge(['password' => bcrypt($request->password)]);

            //update user data with password
            $user->update($request->except(['id','password_confirmation']));
        }
        else
            $user->update($request->only(['name','email']));

        if($user)
            return redirect()->route('admin.users.editProfile')->with(['success' => __('admin.editProfileSuccessfully')]);
        else
            return redirect()->route('admin.users.editProfile')->with(['error' => __('admin.error')]);

    }

    /**
     * save image in folder
     * @param $request
     * @param $folder
     * @return string
     */
    public function handleImage($request,$folder)
    {
        $iconName = time().rand(1,100).'.'.$request->avatar->extension();
        $request->avatar->move(public_path('Admin/assets/images/'.$folder), $iconName);
        return $iconName;
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getPermissions($id)
    {
        $role = $this->roleRepository->getById($id);

        $permissions['data'] = $role->permission;

        return response()->json($permissions);
    }
}
