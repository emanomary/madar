<?php

namespace App\MadarNews\Interfaces;

interface RoleInterface
{
    /**
     * get all roles
     */
    public function all();

    /**
     * insert role into database
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * update data of role in database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data,$id);

    /**
     * delete role from database
     * @param $role
     * @return mixed
     */
    public function delete($role);

    /**
     * get role by id
     * @param $id
     * @return mixed
     */
    public function getById($id);
}

