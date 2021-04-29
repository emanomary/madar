<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\CategoryInterface;
use App\MadarNews\Interfaces\PermissionInterface;
use App\Models\Category;
use App\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    protected $permissionModel;

    /**
     * UsersRepository constructor.
     * @param Permission $permissionModel
     */
    public function __construct(Permission $permissionModel)
    {
        $this->permissionModel = $permissionModel;
    }

    /**
     * get all permissions
     */
    public function all()
    {
        return $this->permissionModel->all();
    }
}
