<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $data = [];
        $model = new UserModel();

        $data['title'] = 'User Profile';
        $data['css'] = '';
        $data['user_name'] = $session->get('user_name');
        $data['user_email'] = $session->get('user_email');

        echo view('templates/header', $data);
        echo view('pages/profile', $data);
        echo view('templates/footer', $data);
    }

    public function edit()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'InputForName'  => 'required|min_length[3]|max_length[20]',
            'InputForEmail' => 'required|min_length[6]|max_length[50]|valid_email'
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $this->request->getVar('InputForName'),
                'user_email'    => $this->request->getVar('InputForEmail')
            ];
            $model->update(session()->get('user_id'),$data);

            $ses_data = [
                'user_id'       => session()->get('user_id'),
                'user_name'     => $data['user_name'],
                'user_email'    => $data['user_email'],
                'logged_in'     => TRUE
            ];
            session()->set($ses_data);

            return redirect()->to('/profile');

            echo view('templates/header', $data);
            echo view('pages/profile', $data);
            echo view('templates/footer', $data);
        }else{
            $data['title'] = 'User Profile';
            $data['css'] = '';
            $data['user_name'] = session()->get('user_name');
            $data['user_email'] = session()->get('user_email');
            $data['validation'] = $this->validator;
            echo view('templates/header', $data);
            echo view('pages/profile', $data);
            echo view('templates/footer', $data);
        }
    }

    public function changePassword()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_id'       => $session->get('user_id'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->update($data);
            $data['user_name'] = $session->get('user_name');
            $data['user_email'] = $session->get('user_email');
            return redirect()->to('/profile');
        }else{
            $data['validation'] = $this->validator;
            echo view('pages/profile', $data);
        }
    }
}
