<?php
    namespace App\Controllers;
    class Controller{
        protected $view;
        public function __construct()
        {
            $this->view = new \League\Plates\Engine('views');
        }  
        // Lưu các giá trị của $_POST vào $_SESSION 
        protected function saveFormValues(array $except = [])
        {
        $form = [];
        foreach($_POST as $key => $value) {
            if (! in_array($key, $except, true)) {
                $form[$key] = $value;
            }
        }
        $_SESSION['form'] = $form; 
        } 
    }
?>