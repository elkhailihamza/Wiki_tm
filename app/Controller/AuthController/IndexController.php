<?php
namespace app\Controller\AuthController;

use app\Services\sessionManager;
use core\Routing\ViewRenderer;
use app\model\Auth;

class IndexController
{
    private $Auth;
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $confirmPass;
    private static array $errors = [];
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->displayError();
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

    public function login()
    {
        require __DIR__ . "/../../View/login.view.php";
    }

    public function register()
    {
        require __DIR__ . "/../../View/login.view.php";
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
                if ((int) sessionManager::get('role_id') === 2) {
                    header("Location: dashboard/home");
                    exit;
                }
                header("Location: /wiki_tm/home");
                exit;
            }
        } else {
            self::$errors[] = 'Email or password error!';
        }
    }
    public function registerUser()
    {
        $result = $this->Auth->findEmail($this->email);
        if (empty($result)) {
            if ($this->pass === $this->confirmPass) {
                $hashed = password_hash($this->pass, PASSWORD_DEFAULT);
                if ($this->Auth->registerUser($this->fname, $this->lname, $this->email, $hashed, 1)) {
                    header('Location: /wiki_tm/login');
                } else {
                    self::$errors[] = 'Register Error!';
                }
            } else {
                self::$errors[] = 'Password does not match!';
            }
        } else {
            self::$errors[] = 'Email already in use!';
        }
    }
    public function displayError()
    {
        if (!empty(self::$errors)) {
            ViewRenderer::view('app/View/includes/partial/errorbox.php', ['error' => self::$errors]);
        }
    }
}

new IndexController;