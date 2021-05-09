<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewRequest;
use App\MadarNews\Interfaces\CategoryInterface;
use App\MadarNews\Interfaces\NewInterface;
use App\MadarNews\Interfaces\UserInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    /**
     * @var NewInterface
     */
    protected $newRepository,$categoryRepository,$userRepository;

    /**
     * NewController constructor.
     * @param NewInterface $newRepository
     * @param CategoryInterface $categoryRepository
     * @param UserInterface $userRepository
     */
    public function __construct(NewInterface $newRepository,CategoryInterface $categoryRepository,UserInterface $userRepository)
    {
        $this->newRepository = $newRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * index function to show all news
     */
    public function index()
    {
        //get all users by repository
        $news = $this->newRepository->all();

        //get index view that show all users
        return view('admin.news.index',compact('news'));
    }

    /**
     * create function to show create category view
     */
    public function create()
    {
        // get all categories
        $categories = $this->categoryRepository->getCategories();

        //check if there is categories or not
        if($categories->count() == 0)
            return redirect()->route('admin.categories.create')->with(['error' => __('admin.addCategoryFirst')]);

        // get all categories
        $users = $this->userRepository->all();

        //check if there is categories or not
        if($users->count() == 0)
            return redirect()->route('admin.users.create')->with(['error' => __('admin.addUserFirst')]);

        return view('admin.news.create',compact('categories','users'));
    }

    /**
     * store function to insert category in database
     * @param NewRequest $request
     * @return RedirectResponse
     */
    public function store(NewRequest $request)
    {
        //$user_id = Auth::user()->id;
        // change status of new
        $this->changeStatus($request);

        // add user_id to the request
        //$request->request->add(['user_id' => $user_id]);

        //insert news in database
        $new = $this->newRepository->create($request->except('_token'));
        //handle photos
        if ($request->hasFile('image')) {
            $image = $this->handleImage($request,'news');
            $new->image = $image;
            $this->newRepository->saveImage($new);
        }

        if($new)
            return redirect()->route('admin.news.index')->with(['success' => __('admin.addNewSuccessfully')]);
        else
            return redirect()->route('admin.news.index')->with(['error' => __('admin.error')]);
    }

    /**
     * edit function to show edit category view
     * @param $id
     */
    public function edit($id)
    {
        //find user by id
        $new = $this->newRepository->getById($id);
        //check if user exist
        if(!$new)
            return redirect()->route('admin.news.index')->with(['error' => __('admin.newNotFount')]);

        // get all categories
        $categories = $this->categoryRepository->getCategories();

        $category = $new->category;
        // get all categories
        $users = $this->userRepository->all();

        //check if there is categories or not
        if($users->count() == 0)
            return redirect()->route('admin.users.create')->with(['error' => __('admin.addUserFirst')]);

        return view('admin.news.edit',compact('new','categories','users','category'));
    }

    /**
     * @param NewRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(NewRequest $request, $id)
    {
        //get $new by id
        $new = $this->newRepository->getById($id);
        // change status of new
        $this->changeStatus($request);

        //insert news in database
        $this->newRepository->update($request->all(),$id);

        //handle photos
        $imagePath = "";
        if ($request->hasFile('image')) {
            $imagePath = $this->handleImage($request,'news');
            $new->image = $imagePath;
            $this->newRepository->updateImage($new);
        }

        if($new)
            return redirect()->route('admin.news.index')->with(['success' => __('admin.editNewSuccessfully')]);
        else
            return redirect()->route('admin.news.index')->with(['error' => __('admin.error')]);

    }

    /**
     * delete news by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find new by id
        $new = $this->newRepository->getById($id);

        //check if user exist
        if(!$new)
            return redirect()->route('admin.news.index')->with(['error' => __('admin.newNotFount')]);

        //delete category
        $this->newRepository->delete($new);

        return redirect()->route('admin.news.index')->with(['success' => __('admin.deleteNewSuccessfully')]);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function changeStatus($request)
    {
        if (!$request->has('status'))
            return $request->request->add(['status' => 0]);
        else
            return $request->request->add(['status' => 1]);
    }

    /**
     * save image in folder
     * @param $request
     * @param $folder
     * @return string
     */
    public function handleImage($request,$folder)
    {
        /*$file=$request->image;
        $filename=$file->getClientOriginalName();
        $file->storeAs(''.$folder.'',$filename);*/
        $imageName = time().rand(1,100).'.'.$request->image->extension();
        $request->image->move(public_path('Admin/assets/images/'.$folder), $imageName);
        return $imageName;
    }
}
