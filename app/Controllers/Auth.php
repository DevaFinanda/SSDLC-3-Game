<?php // app/Controllers/Auth.php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
public function login()
{
    helper(['form']);
    $user = null; 

if ($this->request->getPost('username') === 'admin' && 
    $this->request->getPost('password') === 'admin123') {
    session()->set([
        'username' => 'admin',
        'role'     => 'admin',
        'access_expires' => date('Y-m-d H:i:s', strtotime('+10 minutes'))
    ]);
    return redirect()->to('/dashboard');
}
    

    return view('login');
}
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
