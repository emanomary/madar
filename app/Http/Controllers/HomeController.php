<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\News;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $news = News::count();
        $videos = Video::count();
        $messages = Contact::count();
        $roles = Role::count();
        return view('admin.home',compact('users','categories','news','videos','messages','roles'));
    }
}
