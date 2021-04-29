<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\UserInterface;
use App\Models\User;

class UsersRepository implements UserInterface
{
    protected $userModel;

    /**
     * UsersRepository constructor.
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * get all users
     */
    public function all()
    {
        return $this->userModel->all();
    }

    /**
     * insert user into database
     */
    public function create(array $data)
    {
        return $this->userModel->create($data);
    }

    /**
     * update data of user in database
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data, $id)
    {
        return $this->userModel->find($id)->update($data);
    }

    /**
     * delete user from database
     * @param $user
     * @return
     */
    public function delete($user)
    {
        return $user->delete();
    }

    /**
     * get user by id
     * @param $id
     * @return
     */
    public function getById($id)
    {
        return $this->userModel->find($id);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function saveAvatar($user)
    {
        return $user->update();
    }
}
