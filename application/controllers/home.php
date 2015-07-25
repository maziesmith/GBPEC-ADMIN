<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Home extends Controller {

    public function index() {
        $view = $this->getActionView();       

        if (RequestMethods::post("action") == "login") {
            $email = RequestMethods::post("email");
            $password = RequestMethods::post("password");
            $user = Employee::first(array("email = ?" => $email));
            $user_auth = Wallet::first(array("user_type = ?"=> "1", "password = ?" => sha1($password), "user_id = ?" => $user->id));
            if (isset($user) && isset($user_auth)) {
                $this->user = $user;
                //$user_details = EmployeeDetail::first(array("employee_id = ?" => $user->id));
               // $this->user_details = $user_details;
                $user_auth->login_count += 1;
                if($user_auth->save()){
                    echo "succeful";
                }
                $admin = Administrator::first(array("employee_id = ?" => $user->id));
                if($admin){
                    $session = Registry::get("session");
                    $session->set("Administartor", $admin);
                }
                self::redirect("/admin/".$admin->department);
            } else {
                $view->set("success", "Incorrect email or password");
            }
        } 
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
     public function logout() {
        $user = Employee::first(array("id = ?" => $this->user->id));
        $user->last_ip = $_SERVER['REMOTE_ADDR'];
        $user->save();
        $this->setUser(false);
        self::redirect("/admin/");
        $view = $this->getActionView();
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
}
