Step 1: Create a new folder in the App directory of your project. Name it something like "Reposotory".

Step 2: Create a Interface inside Reposotory folder. Name it something like "UserRepositoryInterface.php"

Step 3: Define some abstract metthod like 
<?php 
namespace App\Reposotory;
interface UserRepositoryInterface{
    public function getAllUser();
    public function getUserById($id);
    public function createUser($data);
    public function updateUser($id,$data);
    public function deleteUser($id);
}
?>

Step 4: Create a class inside Reposotory folder. Name it something like "UserRepositor.php" and define all interface method 
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


Step 5: Now you bind the interface with class in AppServiceProvider, In register method 
use App\Reposotory\UserRepositor;
use App\Reposotory\UserRepositoryInterface;
public function register()
{
    $this->app->bind(UserRepositoryInterface::class,UserRepositor::class);
}


Step 6: Now you can use the interface in your controller to get the instance of the class.

use App\models\User;
use App\Reposotory\UserRepositoryInterface;

protected $userrepo;
public function __construct(UserRepositoryInterface $userrepo){
    $this->userrepo = $userrepo;
}

public function index(){
    $data=$this->userrepo->getAllUser();
    return $data;
}