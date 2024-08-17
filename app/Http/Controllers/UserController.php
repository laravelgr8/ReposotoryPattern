<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Reposotory\UserRepositoryInterface;
class UserController extends Controller
{
    protected $userrepo;
    public function __construct(UserRepositoryInterface $userrepo){
        $this->userrepo = $userrepo;
    }

    public function index(){
        $data=$this->userrepo->getAllUser();
        return $data;
    }
}
