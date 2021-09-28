<?php

namespace App\Controllers;

use App\Models\User_model;

class Login extends BaseController
{
    public function index()
    {
        return view('site/login');
    }

    public function get_login()
    {
        $session = session();
        $form = [
            "username" => $this->request->getPost('username'),
            "password" => $this->request->getPost('password'),
        ];
        $getmodel = new User_model();
        $response = $getmodel->login($form);
        $session->setTempdata($response['data']);
        echo json_encode($response);
        die;
    }

    public function get_logout()
    {
        $response = array();
        $session = session();
        $session->destroy();
		if(isset($_POST['username']))
        {
			$username = $_POST['username'];
		}
           
        $response['status'] = 1;
		if(!isset($_POST['username']))
        {
            return redirect()->to('/'); 
		}
        $response['message'] = 'Log out successfully.';
        $response['data'] = array('username'=>$username); 

        echo json_encode($response);
    }
}
