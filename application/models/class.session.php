<?php
/**
 * Session Class for connecting to MySQL
 * 
 * @package Main
 * @subpackage Basic
 * @author Faizan Ayubi
 */
class Session {
	private $logged_in;
	public $user_id;
	public $member_id;
	public $name;
	public $type;
	public $auth;
	public $message;

	function __construct() {
		session_start();
		$this->check_message();
		$this->check_login();
		if ($this->logged_in) {
			//check location
		} else {
			//do other
		}
	}

	public function is_logged_in() {
		if($this->logged_in) { return true;}
		else{ return false;}
	}

	public function login($user) {
		if ($user) {
			$this->user_id 	= $_SESSION['user_id'] 	= $user->id;
			$this->type 	= $_SESSION['type'] 	= $user->type;
			$this->name 	= $_SESSION['name'] 	= $user->name;
			$this->logged_in= true;
		}
	}

	public function switchTo($member_id) {
		if ($member_id) {
			$this->member_id= $_SESSION['member_id'] = $member_id;
			$this->logged_in = true;
		}
	}

	public function newlogin($user, $auth, $member_id) {
		if ($user) {
			$this->user_id 	= $_SESSION['user_id'] 	= $user->id;
			$this->member_id= $_SESSION['member_id']= $member_id;
			$this->type 	= $_SESSION['type'] 	= $user->type;
			$this->auth 	= $_SESSION['auth'] 	= $auth;
			$this->name 	= $_SESSION['name'] 	= $user->name;
			$this->logged_in= true;
		}
	}

	public function logout() {
		unset($_SESSION['user_id']);
		unset($_SESSION['member_id']);
		unset($this->user_id);
		unset($this->member_id);
		unset($this->name);
		unset($this->type);
		unset($this->auth);
		$this->logged_in = false;
	}

	public function message($msg="") {
		if (!empty($msg)) {
			$_SESSION['message'] = $msg;
		} else {
			return $this->message;
		}
	}

	private function check_login() {
		if (isset($_SESSION['user_id'])) {
			$this->user_id 	= $_SESSION['user_id'];
			$this->member_id= $_SESSION['member_id'];
			$this->name 	= $_SESSION['name'];
			$this->type 	= $_SESSION['type'];
			$this->auth 	= $_SESSION['auth'];
			$this->logged_in= true;
		} else {
			unset($this->user_id);
			unset($this->member_id);
			unset($this->name);
			unset($this->type);
			unset($this->auth);
			$this->logged_in = false;
		}
	}

	private function check_message() {
		if (isset($_SESSION['message'])) {
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			$this->message = "";
		}
		
	}
}

$session = new Session();
$message = $session->message();
?>