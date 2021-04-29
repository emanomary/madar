<?php

namespace App\MadarNews\Interfaces;

interface UserInterface
{
    /**
     * get all users
     */
    public function all();

    /**
     * insert user into database
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * update data of user in database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data,$id);

    /**
     * delete user from database
     * @param $user
     * @return mixed
     */
    public function delete($user);

    /**
     * get user by id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * save user avatar
     * @param $user
     * @return mixed
     */
    public function saveAvatar($user);
}

