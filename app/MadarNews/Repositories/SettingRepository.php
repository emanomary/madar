<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\SettingInterface;
use App\Models\Setting;

class SettingRepository implements SettingInterface
{
    protected $settingModel;

    /**
     * UsersRepository constructor.
     * @param Setting $settingModel
     */
    public function __construct(Setting $settingModel)
    {
        $this->settingModel = $settingModel;
    }

    /**
     * get all setting
     */
    public function all()
    {
        return $this->settingModel->first();
    }

    /**
     * update data of setting in database
     */
    public function update(array $data, $id)
    {
        return $this->settingModel->find($id)->update($data);
    }

    /**
     * delete setting from database
     */
    public function delete($setting)
    {
        return $setting->delete();
    }

    /**
     * get setting by id
     */
    public function getById($id)
    {
        return $this->settingModel->find($id);
    }

    /**
     * @param $setting
     * @return mixed
     */
    public function updateImage($setting)
    {
        return $setting->update();
    }

}
