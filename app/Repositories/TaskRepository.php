<?php


namespace App\Repositories;


use App\Models\Task;
use App\Models\User;
use phpDocumentor\Reflection\Types\Boolean;

class TaskRepository
{
    public function forUser(User $user){
        return Task::where('user_id',$user->id)->orderBy('created_at','asc')->get();
    }
    public function forAdmin(bool $isAdmin){
        return User::where('is_admin',!$isAdmin)->get();
    }
}
