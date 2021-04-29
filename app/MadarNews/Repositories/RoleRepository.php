<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\RoleInterface;
use App\Models\Role;

class RoleRepository implements RoleInterface
{
    protected $roleModel;

    /**
     * RoleRepository constructor.
     * @param Role $roleModel
     */
    public function __construct(Role $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    /**
     * get all roles
     */
    public function all()
    {
        return $this->roleModel->all();
    }

    /**
     * insert Role into database
     * @param array $data
     * @return
     */
    public function create(array $data)
    {
        return $this->roleModel->create($data);
    }

    /**
     * update data of Role in database
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data, $id)
    {
        return $this->roleModel->find($id)->update($data);
    }

    /**
     * delete Role from database
     * @param $role
     * @return
     */
    public function delete($role)
    {
        return $role->delete();
    }

    /**
     * get role by id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->roleModel->find($id);
    }

}
