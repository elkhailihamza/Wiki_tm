<?php
namespace app\Controller;
use app\model\Auth;

class AuthController
{
    private $Auth;
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $confirmPass;
    private static $error;
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
                $this->Auth->loginUser();
            }
        } else {
            self::$error = 'Email or password error!';
        }
        $this->displayError();
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
        $this->displayError();
    }
    public function displayError()
    {
        if (!empty(self::$error)) {
            include_once (__DIR__ . '/../View/includes/partial/errorBox.php');
        }
    }
}