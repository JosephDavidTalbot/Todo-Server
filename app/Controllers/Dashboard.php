<?php namespace App\Controllers;

use App\Models\EventsModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $data = [];
        $model = new EventsModel();
        $id = $session->get('user_id');

        $data['title'] = 'To-Do Dashboard';
        $data['css'] = '<link href="assets/css/main.css" rel="stylesheet">';
        $data['user_name'] = $session->get('user_name');
        $data['user_id'] = $id;
        $data['events'] = $model->getEvents($id);

        echo view('templates/header', $data);
        echo view('pages/dashboard', $data);
        echo view('templates/footer', $data);

        //echo "Welcome back, ".$session->get('user_name');
    }

    public function create()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'title' => 'required|max_length[50]',
            'body' => 'required|max_length[200]',
            'event_date' => 'required',
        ];

        if($this->validate($rules)){
            $model = new EventsModel();
            $data = [
                'event_user' => $this->request->getVar('user_id'),
                'event_title' => $this->request->getVar('title'),
                'event_body' => $this->request->getVar('body'),
                'event_date' => $this->request->getVar('event_date')
            ];
            $model->insert($data);
            return redirect()->to('/dashboard');
        }else{
            $data['validation'] = $this->validator;
            echo view('pages/dashboard', $data);
        }
    }
}
