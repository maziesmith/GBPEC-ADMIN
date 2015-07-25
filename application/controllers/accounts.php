<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Accounts extends Users {
 	
    /**
 	*
 	* @before _secure
 	*/
    public function index() {
    	$view = $this->getActionView();
        $admin = Administrator::first(array("employee_id = ?" => $this->user->id));
        if($admin->department!="accounts"){
        	$alert = "Tried to access un authorized department";
        	 $user = Employee::first(array("id = ?" => $this->user->id));
                $user->warning = $alert;
                $user->save();
                self::redirect("/admin/".$admin->department);
            }
        
         $this->defaultLayout = "layouts/accounts";
         $this->setLayout();
        
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
}