<?php

namespace App\MadarNews\Interfaces;

interface NewInterface
{
    /**
     * get all news
     */
    public function all();

    /**
     * insert news into database
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * update data of news in database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data,$id);

    /**
     * delete news from database
     * @param $new
     * @return mixed
     */
    public function delete($new);

    /**
     * get news by id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * update setting in database
     * @param $new
     * @return mixed
     */
    public function saveImage($new);

    /**
     * update setting in database
     * @param $new
     * @return mixed
     */
    public function updateImage($new);


    /**
     * @return mixed
     */
    public function getFirstFiveNews();

    public function getLatestNews();

    public function getMiddleEastNews($id);

    public function getHealthNews($id);

    public function getTechNews($id);

    public function getInfoGraphicNews($id);

    public function getCategoryNews($id);

    public function getNewBySlug($slug);
}

