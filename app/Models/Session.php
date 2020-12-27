<?php

namespace App\Models;

use App\Models\User;

class Session
{
    protected static $user;

    public static function login(User $user, array $credentials)
    {
        $verified = false;//password_verify($credentials['password'], $user->password);
        if ($credentials['password'] === $user->password) {
            $_SESSION['username'] = $user->username;
            $verified = true;
        }
        return $verified;
    }

    public static function user()
    {
        if (! static::$user && static::checkLogin()) {
            static::$user = User::find($_SESSION['username']);
        }
        return static::$user;
    }

    public static function logout()
    {
        static::$user = null;
        session_unset();
        session_destroy();
    }

    public static function checkLogin()
    {
        return isset($_SESSION['username']);    
    }
}
?>