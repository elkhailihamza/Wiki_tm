<?php
namespace app\Controller\AuthController;

use app\Services\sessionManager;
use app\model\Auth;

class IndexController
{
    private $Auth;
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $confirmPass;
    private static string $error;
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->registration();
    }

    public function registration()
    {
        if (isset($_POST['sign-in'])) {
            $this->email = $_POST['email'];
            $this->pass = $_POST['pass'];
            $this->loginUser();
        }
        if (isset($_POST['sign-up'])) {
            $this->fname = $_POST['fname'];
            $this->lname = $_POST['lname'];
            $this->email = $_POST['email'];
            $this->pass = $_POST['pass'];
            $this->confirmPass = $_POST['confirmpass'];
            $this->registerUser();
        }
    }

    public function loginUser()
    {
        $result = $this->Auth->findEmail($this->email);
        if ($result) {
            $password = $result->pass;
            if (password_verify($this->pass, $password)) {
                sessionManager::set('id_user', $result->id_user);
                sessionManager::set('fname', $result->fname);
                sessionManager::set('lname', $result->lname);
                sessionManager::set('role_id', $result->role_id);
                $this->Auth->loginUser();
            }
        } else {
            self::$error = 'Email or password error!';
        }
        // $this->displayError();
    }
    public function registerUser()
    {
        $result = $this->Auth->findEmail($this->email);
        if (empty($result)) {
            if ($this->pass === $this->confirmPass) {
                $hashed = password_hash($this->pass, PASSWORD_DEFAULT);
                if ($this->Auth->registerUser($this->fname, $this->lname, $this->email, $hashed, 1)) {
                    echo 'Registered!';
                } else {
                    self::$error = 'Register Error!';
                }
            } else {
                self::$error = 'Password does not match!';
            }
        } else {
            self::$error = 'Email already in use!';
        }
        // $this->displayError();
    }
    // public function displayError()
    // {
    //     if (!empty(self::$error)) {
    //         include_once(__DIR__ . '/../View/includes/partial/errorBox.php');
    //     }
    // }
}