<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MadarNews\Interfaces\PermissionInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * object from PermissionRepository
     */
    protected $permissionRepository;

    /**
     * PermissionController constructor.
     * deal with PermissionInterface
     * @param PermissionInterface $permissionRepository
     */
    public function __construct(PermissionInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * index function to show all permissions
     */
    public function index()
    {
        //get all permissions by repository
        $permissions = $this->permissionRepository->all();

        //get index view that show all permissions
        return view('admin.permissions.index',compact('permissions'));
    }

}
