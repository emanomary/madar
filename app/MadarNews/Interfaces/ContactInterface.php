<?php

namespace App\MadarNews\Interfaces;

interface ContactInterface
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

