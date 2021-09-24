<?php namespace App\Controllers;

use App\Models\EventsModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $data = [];
        $EventsModel = new EventsModel();

        $data['title'] = 'To-Do Dashboard';
        $data['css'] = "";
        $data['user_name'] = $session->get('user_name');
        $data['events'] = $EventsModel->getEvents($session->get('user_id'));

        echo view('templates/header', $data);
        echo view('pages/dashboard', $data);
        echo view('templates/footer', $data);
        #
        #
        #
        //echo "Welcome back, ".$session->get('user_name');
    }
}
