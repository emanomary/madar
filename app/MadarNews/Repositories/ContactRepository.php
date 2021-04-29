<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\ContactInterface;
use App\Models\Contact;

class ContactRepository implements ContactInterface
{
    protected $contactModel;

    /**
     * ContactRepository constructor.
     * @param Contact $contactModel
     */
    public function __construct(Contact $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    /**
     * get all messages
     */
    public function all()
    {
        return $this->contactModel->all();
    }

    /**
     * insert message into database
     * @param array $data
     * @return
     */
    public function create(array $data)
    {
        return $this->contactModel->create($data);
    }

    /**
     * delete message from database
     * @param $message
     * @return
     */
    public function delete($message)
    {
        return $message->delete();
    }

    /**
     * get user by id
     * @param $id
     * @return
     */
    public function getById($id)
    {
        return $this->contactModel->find($id);
    }

}
