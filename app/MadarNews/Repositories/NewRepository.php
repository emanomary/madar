<?php

namespace App\MadarNews\Repositories;

use App\MadarNews\Interfaces\NewInterface;
use App\Models\News;
use Carbon\Carbon;

class NewRepository implements NewInterface
{
    protected $newModel;

    /**
     * UsersRepository constructor.
     * @param News $newModel
     */
    public function __construct(News $newModel)
    {
        $this->newModel = $newModel;
    }

    /**
     * get all news
     */
    public function all()
    {
        return $this->newModel->all();
    }

    /**
     * insert new into database
     * @param array $data
     * @return
     */
    public function create(array $data)
    {
        return $this->newModel->create($data);
    }

    /**
     * update data of new in database
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data, $id)
    {
        return $this->newModel->find($id)->update($data);
    }

    /**
     * delete new from database
     * @param $new
     * @return
     */
    public function delete($new)
    {
        return $new->delete();
    }

    /**
     * get new by id
     * @param $id
     * @return
     */
    public function getById($id)
    {
        return $this->newModel->find($id);
    }

    /**
     * save image of new
     * @param $new
     * @return mixed|void
     */
    public function saveImage($new)
    {
        return $new->save();
    }

    /**
     * update image of new
     * @param $new
     * @return mixed
     */
    public function updateImage($new)
    {
        return $new->update();
    }

    /**
     * get all news for section 1
     * @return mixed
     */
    public function getFirstFiveNews()
    {
        return $this->newModel->where('status',1)
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')->take(5)->get();
    }

    public function getLatestNews()
    {
        return $this->newModel->where('status',1)
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')->take(4)->get();
    }

    public function getMiddleEastNews($id)
    {
        return $this->newModel->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();
    }

    public function getTechNews($id)
    {
        return $this->newModel->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(2)
            ->get();
    }

    public function getHealthNews($id)
    {
        return $this->newModel->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(2)
            ->get();
    }

    public function getInfoGraphicNews($id)
    {
        return $this->newModel
            ->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(3)->get();
    }

    public function getArticleNews($id)
    {
        return $this->newModel
            ->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();
    }

    public function getInvestigationNews($id)
    {
        return $this->newModel
            ->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();
    }

    public function getCategoryNews($id)
    {
        return $this->newModel->orderBy('created_at', 'desc')
            ->where(['status'=>1,'category_id'=>$id])
            ->where('publishDate', '<=', Carbon::now())
            ->take(19)
            ->paginate(20);
    }

    public function getNewBySlug($slug)
    {
        return $this->newModel->where('slug',$slug)->first();
    }


}
