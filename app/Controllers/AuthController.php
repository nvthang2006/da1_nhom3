<?php
namespace App\Controllers;
use App\Models\User;
use App\Core\Auth;
class AuthController extends BaseController {
    public function showLogin(){ $this->view('login'); }
    public function login(){
        $email = $_POST['email'] ?? ''; $pass = $_POST['password'] ?? '';
        $m = new User(); $u = $m->findByEmail($email);
        if (!$u || !password_verify($pass, $u['password'])) { $this->view('login',['error'=>'Invalid']); return; }
        Auth::login($u); $this->redirect('/index.php/admin/tours');
    }
    public function showRegisterForm(){ $this->view('register'); }
    public function logout(){ Auth::logout(); $this->redirect('/index.php/login'); }
}
