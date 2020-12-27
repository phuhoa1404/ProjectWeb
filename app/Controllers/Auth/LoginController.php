<?php
    namespace App\Controllers\Auth;

use App\Models\User;
use App\Models\Session;
use App\Controllers\Controller;
    class LoginController extends Controller{
        public function showLoginForm()
        {
            if (Session::checkLogin()) {
                redirect('home');
            }
            // Thu thập dữ liệu cho view
            $data = [
            'old' => session_get_once('form'),
            'errors' => session_get_once('errors')
            ];    
            // hiển thị
            echo $this->view->render('Auth/login',$data);
        }
        //hàm lấy thông tin từ bảng đăng nhập
        protected function getUserInfo(){
            return ['username' => $_POST['username'],
                    'password' => $_POST['password']
                ];
        }
        //đăng nhập
        public function login(){
            $userInfo = $this->getUserInfo();
            $user = User::getValues($userInfo);
            $errors= [];
            //echo $userInfo['username'];
            //echo $userInfo['password'];
            //echo $user->username;
            //echo $user->password;
            if ($user->username != $userInfo['username']){
                $errors['username'] = 'Tài khoản không chính xác!!';  
                //echo $errors['username']; 
                //echo "<script type='text/javascript'>alert('$errors');</script>";       
            }else if(Session::login($user,$userInfo)){
                redirect('home');
            }else{
                $errors['password'] = 'Mật khẩu không chính xác';
                //echo $errors['password'];
                //echo "<script type='text/javascript'>alert('$errors');</script>";       
            }
            $this->saveFormValues(['password']);
            redirect('/', ['errors' => $errors]);
            //return ($errors);
        }
        //đăng xuất
        public function logout(){
            Session::logout();
            redirect('/');
        }
    }
?>
