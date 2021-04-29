<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\MadarNews\Interfaces\VideoInterface;
use Illuminate\Http\RedirectResponse;

class VideoController extends Controller
{
    /**
     * object from VideoRepository
     */
    protected $videoRepository;

    /**
     * VideoController constructor.
     * @param VideoInterface $videoRepository
     */
    public function __construct(VideoInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * index function to show all videos
     */
    public function index()
    {
        //get all users by repository
        $videos = $this->videoRepository->all();

        //get index view that show all users
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * create function to show create video view
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * store function to insert category in database
     * @param VideoRequest $request
     * @return RedirectResponse
     */
    public function store(VideoRequest $request)
    {
        // change status of new
        $this->changeStatus($request);

        //insert videos in database
        $video = $this->videoRepository->create($request->except('_token'));

        if($video)
            return redirect()->route('admin.videos.index')->with(['success' => __('admin.addVideoSuccessfully')]);
        else
            return redirect()->route('admin.videos.index')->with(['error' => __('admin.error')]);
    }

    /**
     * edit function to show edit video view
     * @param $id
     */
    public function edit($id)
    {
        //find video by id
        $video = $this->videoRepository->getById($id);

        //check if $video exist
        if(!$video)
            return redirect()->route('admin.videos.index')->with(['error' => __('admin.videoNotFount')]);

        return view('admin.videos.edit',compact('video'));
    }

    /**
     * @param VideoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(VideoRequest $request, $id)
    {
        //get video by id
        $video = $this->videoRepository->getById($id);

        // change status of video
        $this->changeStatus($request);

        //insert videos in database
        $this->videoRepository->update($request->all(),$id);

        if($video)
            return redirect()->route('admin.videos.index')->with(['success' => __('admin.editVideoSuccessfully')]);
        else
            return redirect()->route('admin.videos.index')->with(['error' => __('admin.error')]);

    }

    /**
     * delete videos by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find new by id
        $video = $this->videoRepository->getById($id);

        //check if user exist
        if(!$video)
            return redirect()->route('admin.videos.index')->with(['error' => __('admin.videoNotFount')]);

        //delete category
        $this->videoRepository->delete($video);

        return redirect()->route('admin.videos.index')->with(['success' => __('admin.deleteVideoSuccessfully')]);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function changeStatus($request)
    {
        if (!$request->has('status'))
            return $request->request->add(['status' => 0]);
        else
            return $request->request->add(['status' => 1]);
    }

}
