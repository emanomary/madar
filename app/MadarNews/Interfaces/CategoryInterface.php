<?php

namespace App\MadarNews\Interfaces;

interface CategoryInterface
{
    /**
     * get all categories
     */
    public function all();

    /**
     * insert category into database
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * update data of category in database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data,$id);

    /**
     * delete category from database
     * @param $category
     * @return mixed
     */
    public function delete($category);

    /**
     * get setting by id
     * @param $id
     * @return mixed
     */
    public function getById($id);
}

