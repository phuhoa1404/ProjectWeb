<?php
    namespace App\Controllers;

use App\Models\Session;

class HomeController extends Controller{
        public function home(){
            /*if (Session::checkLogin()) {
                redirect('home');
            }
            // hiển thị
            echo $this->view->render('Auth/login');*/
            include 'Views/Tab/home.php';
        }
        public function result() {
            include 'Views/Tab/result.php';
        }
        public function contact() {
            include 'Views/Tab/contact.php';
        }
        
        public function notFound() {
			http_response_code(404);
            //include 'Views/Error/404.php';
            echo $this->view->render("Error/404");
			exit();
	    }
    }
