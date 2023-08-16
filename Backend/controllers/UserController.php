<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
public function register(){
    echo '<pre>';
    print_r($_POST);
    echo'</pre>';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repas = $_POST['repas'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $avatar = $_FILES['avatar'];


        if(empty($username)||empty($password)||empty($name)||empty($phone)||empty($address)||empty($email)){
            $this->error='phải nhập đầy đủ thông tin';
        }elseif($password != $repas){
            $this->error='mật khẩu không khớp';
        }elseif(is_numeric($phone)){
            $this->error='số điện thoại sai định dạng';
        }elseif(strlen($password)<8){
            $this->error='độ dài mật khẩu tối thiểu 8 kí tự';
        }elseif(strlen($phone)<10){
            $this->error='số điện thoại không đúng ';
        }elseif($username-> getUser($username)){
            $this->error='username đã được đăng kí trước đó vui lòng đặt username khác';
        }
        elseif($avatar['error']==0){
            $ext = pathinfo($avatar['name'],PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            $allow =['jpg','gif','png','jpeg'];
            if(!in_array($ext,$allow)){
                $error='k phải ảnh';
            }
            if(empty($error)){
                $filename='';
                if($avatar['error'] == 0){
                    $dir_upload = 'uploads';
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $filename = time() . "-" . $avatar['name'];
                    $is_upload = move_uploaded_file($avatar['tmp_name'],"$dir_upload/$filename");
                    var_dump($is_upload);
                }}
//                $sql_insert = "insert into student(name,age,avatar,description) values('$name','$age','$filename','$mota')";
//                $is_insert = mysqli_query($connection,$sql_insert);
        if(empty($this->error)){

            $pass_hash = password_hash($password,PASSWORD_BCRYPT);
            // var_dump($pass_hash);
            $user_model = new User();
            $is_register =$user_model ->registerUser($username,$pass_hash,$name,$phone,$address,$email,$filename);
            var_dump($is_register);
            if($is_register){
                $_SESSION['success']='dky thành công';
                header('location:index.php?controller=user&action=login');
                exit();
            }$this->error='dky thất bại';
        }
    }

    $this->page_title='form đăng ký';
    $this->content = $this->render('views/users/register.php');
    require_once 'views/layouts/main_login.php';
    }}
    //index.php?controller=user&action=login
    public function login(){

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($this->error)){
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
