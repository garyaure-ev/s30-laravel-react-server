<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use Exception;


class RoleController extends Controller
{
    protected $roleRepo;
    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return $this->roleRepo->list();
    }
}
