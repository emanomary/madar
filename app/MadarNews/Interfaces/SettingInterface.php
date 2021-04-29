<?php

namespace App\MadarNews\Interfaces;

interface SettingInterface
{
    /**
     * get all setting
     */
    public function all();

    /**
     * update data of setting in database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * delete setting from database
     * @param $setting
     * @return mixed
     */
    public function delete($setting);

    /**
     * get setting by id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * update setting in database
     * @param $setting
     * @return mixed
     */
    public function updateImage($setting);

}

