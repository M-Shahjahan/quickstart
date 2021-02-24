<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;
    public function __construct(UserRepository $users){
        $this->middleware('auth');
        $this->users=$users;
    }
    public function index(Request $request){
        return view('tasks.index',['tasks'=>$this->users->forUser($request->id)]);
    }
}
