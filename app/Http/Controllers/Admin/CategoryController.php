<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\MadarNews\Interfaces\CategoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * object from UsersRepository
     */
    protected $categoryRepository;

    /**
     * UserController constructor.
     * deal with UsersInterface
     * @param CategoryInterface $categoryRepository
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * index function to show all categories
     */
    public function index()
    {
        //get all users by repository
        $categories = $this->categoryRepository->all();

        //get index view that show all users
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * create function to show create category view
     */
    public function create()
    {
        $categories = $this->categoryRepository->getCategories();

        return view('admin.categories.create',compact('categories'));
    }

    /**
     * store function to insert category in database
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        if ($request->type == 1)
            $request->request->add(['parent_id' => null]);
        //insert category in database
        $category = $this->categoryRepository->create($request->except('_token'));

        if($category)
            return redirect()->route('admin.categories.index')->with(['success' => __('admin.addCategorySuccessfully')]);
        else
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.error')]);
    }

    /**
     * edit function to show edit category view
     * @param $id
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->getCategories();
        //check if user exist
        if(!$categories)
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.notFountCategories')]);

        //find user by id
        $category = $this->categoryRepository->getById($id);

        //check if user exist
        if(!$category)
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.categoryNotFount')]);
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        //find user by id
        $category = $this->categoryRepository->getById($id);

        //check if user exist
        if(!$category)
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.categoryNotFount')]);

        if ($request->type == 1)
            $request->request->add(['parent_id' => null]);

        //update category
        $this->categoryRepository->update($request->all(),$id);

        if(true)
            return redirect()->route('admin.categories.index')->with(['success' => __('admin.editCategorySuccessfully')]);
        else
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.error')]);

    }

    /**
     * delete category by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find user by id
        $category = $this->categoryRepository->getById($id);

        //check if user exist
        if(!$category)
            return redirect()->route('admin.categories.index')->with(['error' => __('admin.categoryNotFount')]);

        //delete category
        $this->categoryRepository->delete($category);

        return redirect()->route('admin.categories.index')->with(['success' => __('admin.deleteCategorySuccessfully')]);
    }
}
