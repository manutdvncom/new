<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 11/10/2020
 * Time: 6:51 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller{
    //Phương thức đăng ký user
    //index.php?controller=user&action=register
    public function register(){
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $user_model = new User();
            $user = $user_model->getUser($username);
            if (empty($username)||empty($password)||empty($confirm_password)){
                $this->error = 'Không được để trống';
            }elseif ($confirm_password != $password){
                $this->error = 'Mật khẩu nhập lại phải trùng';
            }else if (!empty($user)){
                $this->error = "Username $username đã tồn tại";
            }
            if (empty($this->error)){
                $user_model->username = $username;
                $user_model->password = md5($password);
                $user_model->getRegister();
                if ($user_model->getRegister()){
                    $_SESSION['success'] = 'Đăng ký thành công';
                    header("Location: index.php?controller=user&action=login");
                    exit();
                } else {
                    $this->error = 'Đăng ký thất bại';
                }
            }
        }
        //Hiển thị ra view - form đăng ký cho user
        //Lấy nội dung view
        $this->content = $this->render('views/users/register.php');
        //Gọi layout để hiển thị nội dung view vừa lấy được
        //Tạo 1 layout khác tương đương với user chưa login
        require_once 'views/layouts/main_login.php';
    }
    public function login(){
        if (isset($_SESSION['user'])){
            $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
            header("Location: index.php?controller=category&action=create");
            exit();
        }
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_model = new User();
            if (empty($username)||empty($password)){
                $this->error = 'Không được để trống';
            }
            if (empty($this->error)){
                $user_model->username = $username;
                $user_model->password = $password;
                $user = $user_model->getLogin();
                if ($user){
                    $_SESSION['user'] = $user;
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    header("Location: index.php?controller=category&action=create");
                    exit();
                }else {
                    $this->error = 'Sai username/password';
                }
            }
        }
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }
    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Logout thành công';
        header("Location: index.php?controller=user&action=login");
        exit();
    }
}
?>