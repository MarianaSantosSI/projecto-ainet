<?php namespace Ainet\Controllers;

use Ainet\Models\User;
use Ainet\Support\InputHelper;

class AuthenticationController {
	public $user;
	private $authenticated=false;
	public $errors=false;

	function __construct() 
	{
		session_start();		// criar 1 sessão
		if (isset($_SESSION['authenticated'])) {
			$email = $_SESSION['email'];
			$user = User::findByEmail($_SESSION['email']);
			$this->authenticated=true;
		}
		elseif (!empty($_POST)) {
			// verificar email e pass
			$mail = InputHelper::post('email');
			$pass = InputHelper::post('password');
			$user = User::findByEmail($mail);
			
			if (is_null($user)) {
				$this->user = new User();
				$this->user->email = $mail;			// Se errar, campos continuam preenchidos na prox. tentativa
				$this->user->password = $pass;		// ----- igual acima
				$this->errors = ['email'=>'Invalid user or password'];
				return;
			}

			// TODO: validar password
			else {
				// autenticado com sucesso
				$this->user = $user;			
				$this->authenticated = true;
				$_SESSION['authenticated'] = true;
				$_SESSION['email'] = $mail;
			}
		}
		else {
			$this->user = new User();	
		}
	}

	function isAuthenticated () 
	{
		return $this->authenticated;
	}

	static function redirectToLogin() 
	{
		header('Location: http://192.168.56.101/ficha06/login.php');
		exit();
	}

	static function redirectToHome() 
	{
		header('Location: http://192.168.56.101/ficha06/users.php');
		exit();
	}

	public static function logout() 
	{
		session_start();		// carrega Sessões p/ memória
		$_SESSION = [];			
		session_destroy();
		self::redirectToLogin();
	}

}