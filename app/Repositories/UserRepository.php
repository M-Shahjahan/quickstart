<?php


namespace App\Repositories;


use App\Models\Task;
use App\Models\User;

class UserRepository
{
    public function forAdmin(bool $isAdmin){
        return User::where('is_admin',!$isAdmin)->get();
    }
    public function forUser(int $id){
        return Task::where('user_id',$id)->get();
    }
}
