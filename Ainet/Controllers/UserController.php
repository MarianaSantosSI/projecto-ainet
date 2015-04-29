<?php namespace Ainet\Controllers;

use Ainet\Models\User;
use Ainet\Support\InputHelper;

class UserController
{
        public function __construct()
        {

        }

        public function listUsers()
        {
            return User::all();
        }

        public function addUser()
        {
            $user = new User;
            if (empty($_POST)) {
                return [$user, false];
            }

            $errors = $this->validateInput($user);
            if (empty($errors)) {
                User::add($user);
            }
            return [$user,$errors];
        }

        public function editUser()
        {
            if (empty($_POST)){
                $id = InputHelper::get('user_id');
                if ($id == null){
                    header('Location: http://192.168.56.101/ficha04/users.php');
                    exit(0);
                }
                return [User::find($id), false];
            }

            $user = new User();
            $errors = $this->validateInput($user, false);
            if (empty($errors)) {
                User::save($user);
            }
            return [$user,$errors];

        }

        function validateInput($user, $validatepassword=true)
        {
            $user->fullname=InputHelper::post('fullname');
            $user->id=InputHelper::post('user_id');
            $user->email=InputHelper::post('email');
            $user->password=InputHelper::post('password');
            $password=InputHelper::post('passwordConfirmation');
            $user->type=InputHelper::post('type');
            $errors=[];

            if($user->fullname==null || !preg_match('/[a-zA-Z ]+$/',$user->fullname)){
                $errors['fullname']="Nome inválido";
            }

            if($user->email){
                $validmail = filter_var($user->email,FILTER_VALIDATE_EMAIL);
                if(!$validmail){
                    $errors['email']= 'Inavlid email';
                }
            }else{
                $errors['email']= 'email is required';
            }
            if ($validatepassword){
                if (strlen($user->password)<8){
                    $errors['password']='Password with 8 characterrs required.';
                }
                elseif ($user->password!=$password){
                    $errors['password']='Passwords don\'t match';
                }
            }
            return $errors;
        }
}