<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
public function register(){
    // xử lý form
    echo '<pre>';
    print_r($_POST);
    echo'</pre>';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repas = $_POST['repas'];
        if(empty($username)||empty($password)){
            $this->error='phải nhập';
        }elseif($password != $repas){
            $this->error='mật khẩu không khớp';
        }
        if(empty($this->error)){
            // mã hóa mật khẩu
            $pass_hash = password_hash($password,PASSWORD_BCRYPT);
            var_dump($pass_hash);
            // controller gọi model để insert
            $user_model = new User();
            $is_register =$user_model ->registerUser($username,$pass_hash);
            var_dump($is_register);
            if($is_register){
                $_SESSION['success']='dky thành công';
                header('location:index.php?controller=user&action=login');
                exit();
            }$this->error='dky thất bại';
        }
    }
    //- controller gọi view
    $this->page_title='form đăng ký';
    $this->content = $this->render('views/users/register.php');
    // sử dụng layout khác cho user mà chưa đăng nhập
    //require_once 'views/layouts/main.php';
    require_once 'views/layouts/main_login.php';
    }
    //index.php?controller=user&action=login
    public function login(){

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($this->error)){
                // - xử lý đăng nhập
                // + controller gọi model lấy ra user tương ứng với username từ from
                // lấy mk đã mã hóa  của user đó so sánh với mk xem có khớp với thuật toán đã cho hay k
                $user_model = new User();
                $user =$user_model->getUser($username);
                echo'<pre>';
                print_r($user);
                echo '</pre>';

                if(empty($user)){
                    $this->error='username k tồn tại';}
                else{
                    $pass_hash=$user['password'];
                    $is_login=password_verify($password,$pass_hash);
                    var_dump($is_login);
                    if($is_login){
                        $_SESSION['user']=$user;
                        $_SESSION['success']='đăng nhập thành công';
                        header('location:index.php?controller=product&action=index');
                        exit();
                    }
                    $this->error='sai tk';
                }
            }}
    // controller gọi view
        $this->page_title='form đăng nhập';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';

}
public function logout(){
    unset($_SESSION['user']);
    $_SESSION['success']='logout thành công';
    header('location:index.php?controller=user&action=login');
}
}
