<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\MadarNews\Interfaces\CategoryInterface;
use App\MadarNews\Interfaces\ContactInterface;
use App\MadarNews\Interfaces\NewInterface;
use App\MadarNews\Interfaces\SettingInterface;
use App\MadarNews\Interfaces\VideoInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * object from UsersRepository
     */
    protected $settingRepository,
              $contactRepository,$categoryRepository;

    /**
     * ContactUsController constructor.
     * @param SettingInterface $settingRepository
     * @param ContactInterface $contactRepository
     * @param CategoryInterface $categoryRepository
     */
    public function __construct(SettingInterface $settingRepository,ContactInterface $contactRepository,CategoryInterface $categoryRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->contactRepository = $contactRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * get all data of index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function messages()
    {
        $userMessages = $this->contactRepository->all();

        return view('admin.messages.index',compact('userMessages'));
    }

    /**
     * get all news by category id
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contactUs()
    {
        $setting = $this->settingRepository->all();
        $categories = $this->categoryRepository->all();

        return view('site.contactus',compact('setting','categories'));
    }

    /**
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        $message = $this->contactRepository->create($request->except('_token'));

        if($message)
            return redirect()->route('site.messages')->with('success', __('admin.successSendMessage'));
        else
            return redirect()->route('site.messages')->with('error', __('admin.errorSendMessage'));
    }

    /**
     * delete category by id
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //find message by id
        $message = $this->contactRepository->getById($id);

        //check if user exist
        if(!$message)
            return redirect()->route('admin.messages.index')->with(['error' => __('admin.messageNotFount')]);

        //delete category
        $this->contactRepository->delete($message);

        return redirect()->route('admin.messages.index')->with(['success' => __('admin.deleteMessageSuccessfully')]);
    }

    public function show($id)
    {
        $message = $this->contactRepository->getById($id);
        if(!$message)
            return redirect()->route('admin.messages.index')->with(['error' => __('admin.messageNotFount')]);

        return view('admin.messages.show',compact('message'));
    }
}
