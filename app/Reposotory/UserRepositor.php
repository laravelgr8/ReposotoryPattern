<?php 
namespace App\Reposotory;
use App\Models\User;
class UserRepositor implements UserRepositoryInterface{
    protected $user;
    public function __construct(User $user){
        $this->user=$user;
    }

    public function getAllUser(){
        return $this->user->all();
    }

    public function getUserById($id){
        return $this->user->find($id);
    }

    public function createUser($data){
        return $this->user->create($data);
    }

    public function updateUser($id,$data){
        $user=$this->user->getUserById($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id){
        return $this->user->delete($id);
    }
}

?>