<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    protected $categoryModel;

    /**
     * UsersRepository constructor.
     * @param Category $categoryModel
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     * get all categories
     */
    public function all()
    {
        return $this->categoryModel->all();
    }

    /**
     * insert category into database
     * @param array $data
     * @return
     */
    public function create(array $data)
    {
        return $this->categoryModel->create($data);
    }

    /**
     * update data of category in database
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data, $id)
    {
        return $this->categoryModel->find($id)->update($data);
    }

    /**
     * delete category from database
     * @param $category
     * @return
     */
    public function delete($category)
    {
        return $category->delete();
    }

    /**
     * get user by id
     * @param $id
     * @return
     */
    public function getById($id)
    {
        return $this->categoryModel->find($id);
    }

    /**
     * get categories for list
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categoryModel->with('child')
            ->whereNull('parent_id')->get();
    }

    /**
     * get parent category
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategoryMenu()
    {
        return $this->categoryModel
            ->whereNull('parent_id')->get();
    }

}
