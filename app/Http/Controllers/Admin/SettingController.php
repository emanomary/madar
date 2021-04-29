<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\MadarNews\Interfaces\SettingInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * object from UsersRepository
     */
    protected $settingRepository;

    /**
     * SettingController constructor.
     * @param SettingInterface $settingRepository
     */
    public function __construct(SettingInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * index function to show all setting
     */
    public function index()
    {
        //get all users by repository
        $setting = $this->settingRepository->all();

        //get index view that show all users
        return view('admin.settings.index',compact('setting'));
    }

    /**
     * edit function to show edit user view
     * @param $id
     */
    public function edit($id)
    {
        //find user by id
        $setting = $this->settingRepository->getById($id);

        //check if user exist
        if(!$setting)
            return redirect()->route('admin.settings.index')->with(['error' => __('admin.settingNotFount')]);
        return view('admin.settings.edit',compact('setting'));
    }

    /**
     * @param SettingRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SettingRequest $request, $id)
    {
        //find user by id
        $setting = $this->settingRepository->getById($id);

        //check if user exist
        if(!$setting)
            return redirect()->route('admin.settings.index')->with(['error' => __('admin.settingNotFount')]);

        $this->settingRepository->update($request->all(),$id);
        //handle photos
        if ($request->hasFile('favicon')) {
            $favicon = $this->handleFavicon($request);
            $setting->favicon = $favicon;
        }
        if ($request->hasFile('logo')) {
            $logo = $this->handleLogo($request);
            $setting->logo = $logo;
        }

        //save photos in database
        $this->settingRepository->updateImage($setting);

        if($setting)
            return redirect()->route('admin.settings.index')->with(['success' => __('admin.editSettingSuccessfully')]);
        else
            return redirect()->route('admin.settings.index')->with(['error' => __('admin.error')]);

    }

    /**
     * handle favicon
     * @param $request
     * @return string
     */
    public function handleFavicon($request)
    {
        $imageName = time().rand(1,100).'.'.$request->favicon->extension();
        $request->favicon->move(public_path('Admin/assets/images/logo'), $imageName);
        return $imageName;
    }

    /**
     * handle logo
     * @param $request
     * @return string
     */
    public function handleLogo($request)
    {
        $imageName = time().rand(1,100).'.'.$request->logo->extension();
        $request->logo->move(public_path('Admin/assets/images/logo'), $imageName);
        return $imageName;
    }
}
