<?php

namespace App\MadarNews\Interfaces;

interface VideoInterface
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
     * @param $video
     * @return mixed
     */
    public function delete($video);

    /**
     * get news by id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    public function getFirstYoutube();

    public function getYoutube();
}

