<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\VideoInterface;
use App\Models\Video;

class VideoRepository implements VideoInterface
{
    protected $videoModel;

    /**
     * VideoRepository constructor.
     * @param Video $videoModel
     */
    public function __construct(Video $videoModel)
    {
        $this->videoModel = $videoModel;
    }

    /**
     * get all videos
     */
    public function all()
    {
        return $this->videoModel->all();
    }

    /**
     * insert video into database
     * @param array $data
     * @return
     */
    public function create(array $data)
    {
        return $this->videoModel->create($data);
    }

    /**
     * update data of video in database
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data, $id)
    {
        return $this->videoModel->find($id)->update($data);
    }

    /**
     * delete video from database
     * @param $video
     * @return
     */
    public function delete($video)
    {
        return $video->delete();
    }

    /**
     * get video by id
     * @param $id
     * @return
     */
    public function getById($id)
    {
        return $this->videoModel->find($id);
    }

    public function getFirstYoutube()
    {
        return $this->videoModel
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->first();
    }

    public function getYoutube()
    {
        return $this->videoModel
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->take(5)->get();
    }
}
