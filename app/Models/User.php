<?php

namespace App\Models;
class User
{
    public $username;
    public $password;
    protected $errors = [];
    protected $messages = [];
    //đăng ký
    public function createUser(array $data)
    {
        $messages = [];
        if(!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])){
            $messages['username'] = 'Tài khoản không hợp lệ';
            //echo "Tài khoản không hợp lệ";
		}
		else if($data['password'] != $data['re-password']){
            $messages['password'] = 'Mật khẩu không trùng khớp';
            //echo "Mật khẩu không trùng khớp";
		}
		else {
            $db = Db::getInstance();
            $sql = $db->prepare("select username from account where username=:username");
            $sql->execute(array('username' => $data['username']));
            $row = $sql->fetch();
            if (!empty($row)) {
                $messages['username'] = 'Tài khoản đã tồn tại';
                redirect('register', ['messages' => $messages]);
                //echo $data['username'];
                //echo "Tài khoản đã tồn tại";
            
            }else {
                $sql = $db->prepare('insert into account (username,password,email,fname) values (:name,:pwd,:mail,:fname)');
                $sql->bindParam(':name', $data['username']);
                $sql->bindParam(':pwd', $data['password']);
                $sql->bindParam(':mail', $data['email']);
                $sql->bindParam(':fname', $data['hovaten']);
                $sql->execute();
                $messages['success'] = 'Tạo tài khoản thành công';
                redirect('register',['messages' => $messages]);
                //echo "Tạo tài khoản thành công";
            }
        redirect('register', ['messages' => $messages]);
        }
    }
    //hàm đưa giá trị dạng mảng thành object User
    protected static function createFormDb(array $data)
    {
        $user = new User();
        $user->username = $data['username'];
        $user->password = $data['password'];
        return $user;
    }
    //hàm lấy giá trị từ bảng account database
    public static function getValues(array $data)
    {
        $db = Db::getInstance();
        $sql = $db->prepare("select username, password from account where username = :username");
        $sql->execute(array('username' => $data['username']));
        while ($row = $sql->fetch()) {
            $user = static::createFormDb($row);
        }
        return $user;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
