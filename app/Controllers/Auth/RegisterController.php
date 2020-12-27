<?php
    namespace App\Controllers\Auth;

use App\Models\User;
use App\Models\Session;
use App\Controllers\Controller;

class RegisterController extends Controller{
    public function __construct()
    {
        // Nếu người dùng chưa đăng nhập thì chuyển hướng đến đăng nhập
        if (Session::checkLogin()) {
            redirect('home');
        }

        parent::__construct();
    }
    public function showRegisterForm(){
        // Thu thập dữ liệu cho view
        $data = [
            'old' => session_get_once('form'),
            'messages' => session_get_once('messages')
        ];  

        // Tạo và hiển thị view
        echo $this->view->render('Auth/register', $data);
    }
    //đăng ký
    public function register(){
        $data = $this->getUserData();
        $user = new User();
        $user->createUser($data);
    }
    //lấy giá trị từ form
    protected function getUserData(){
        return [
            'hovaten' => $_POST['hovaten'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            're-password' => $_POST['re-password'],
            'email' => filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)
        ];
    }

}