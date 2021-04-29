<?php

namespace App\Providers;

use App\MadarNews\Interfaces\CategoryInterface;
use App\MadarNews\Interfaces\ContactInterface;
use App\MadarNews\Interfaces\NewInterface;
use App\MadarNews\Interfaces\PermissionInterface;
use App\MadarNews\Interfaces\RoleInterface;
use App\MadarNews\Interfaces\SettingInterface;
use App\MadarNews\Interfaces\UserInterface;
use App\MadarNews\Interfaces\VideoInterface;
use App\MadarNews\Repositories\CategoryRepository;
use App\MadarNews\Repositories\ContactRepository;
use App\MadarNews\Repositories\NewRepository;
use App\MadarNews\Repositories\PermissionRepository;
use App\MadarNews\Repositories\RoleRepository;
use App\MadarNews\Repositories\SettingRepository;
use App\MadarNews\Repositories\UsersRepository;
use App\MadarNews\Repositories\VideoRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        $this->app->bind(UserInterface::class,UsersRepository::class);
        $this->app->bind(SettingInterface::class,SettingRepository::class);
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(NewInterface::class,NewRepository::class);
        $this->app->bind(VideoInterface::class,VideoRepository::class);
        $this->app->bind(PermissionInterface::class,PermissionRepository::class);
        $this->app->bind(RoleInterface::class,RoleRepository::class);
        $this->app->bind(ContactInterface::class,ContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
