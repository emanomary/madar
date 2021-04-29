<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\MadarNews\Interfaces\PermissionInterface;
use App\MadarNews\Interfaces\RoleInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * object from PermissionRepository , RoleRepository
     */
    protected $permissionRepository,$roleRepository;

    /**
     * RoleController constructor.
     * deal with PermissionInterface, RoleInterface
     * @param PermissionInterface $permissionRepository
     * @param RoleInterface $roleRepository
     */
    public function __construct(PermissionInterface $permissionRepository,RoleInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * index function to show all roles
     */
    public function index()
    {
        //get all roles by repository
        $roles = $this->roleRepository->all();

        //get index view that show all permissions
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * @return View
     */
    public function create()
    {
        //get all permissions
        $permissions = $this->permissionRepository->all();

        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleRepository->create($request->except('_token'));

        if ($request->permissions) {
            $role->permission()->attach($request->permissions);
        }

        if ($role)
            return redirect()->route('admin.roles.index')->with('success', __('Admin.successAddRole'));
        else
            return redirect()->route('admin.roles.index')->with('error', __('Admin.error'));
    }

    /**
     * @param $id
     * @return View|RedirectResponse
     */
    public function edit($id)
    {
        //get role by id
        $role=$this->roleRepository->getById($id);

        //check if role exist or not
        if (!$role)
            return redirect()->route('admin.roles.index')->with('error', __('admin.roleNotFound'));

        //get all permissions related to role
        $rolePermissions = array_values($role->permission->pluck('id')->toArray());

        $rolePermission = $role->permission;

        //get all permissions
        $permissions = $this->permissionRepository->all();

        if ($role)
            return view('admin.roles.edit',compact('role','permissions','rolePermissions','rolePermission'));
        else
            return redirect()->route('admin.roles.index')->with('error', __('admin.error'));
    }

    /**
     * @param RoleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(RoleRequest $request,$id)
    {
        //get role by id
        $role = $this->roleRepository->getById($id);

        //check if role exist or not
        if (!$role)
            return redirect()->route('admin.roles.index')->with('error', __('admin.notFoundRole'));

        $this->roleRepository->update($request->all(),$id);

        //attach permissions to role
        if($request->permissions)
        {
            $role->permission()->sync($request->permissions);
        }
        if(true)
            return redirect()->route('admin.roles.index')->with('success', __('admin.successUpdateRole'));
        else
            return redirect()->route('admin.roles.index')->with('error', __('admin.error'));
    }

    /**
     * delete role by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find role by id
        $role = $this->roleRepository->getById($id);

        //check if user exist
        if(!$role)
            return redirect()->route('admin.roles.index')->with(['error' => __('admin.roleNotFount')]);

        //delete category
        $this->roleRepository->delete($role);

        return redirect()->route('admin.roles.index')->with(['success' => __('admin.deleteRoleSuccessfully')]);
    }
}
