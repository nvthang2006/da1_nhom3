<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController; use App\Core\Auth;
// class DashboardController extends BaseController {
//     public function index(){ if (!Auth::check() || !Auth::isRole('admin')) { header('Location: /index.php/login'); exit; } $this->view('admin/dashboard'); }
// }
class DashboardController extends BaseController {
    public function index(){
        // TẠM THỜI BỎ CHECK LOGIN ĐỂ XEM GIAO DIỆN
        // if (!Auth::check() || !Auth::isRole('admin')) {
        //     header('Location: /index.php/login'); 
        //     exit; 
        // }

        $this->view('admin/dashboard');
    }
}

