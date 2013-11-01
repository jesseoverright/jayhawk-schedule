<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();


        session_start();

    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        if ($this->form_validation->run() !== FALSE) {
            $this->load->model('login_model');

            #check for successful login
            $logged_in = $this->login_model
                ->verify_user($this->input->post('username'), $this->input->post('password'));

            if ($logged_in !== FALSE) {
                $_SESSION['username'] = $this->input->post('username');
                redirect('schedule');
            }
        }

        # show login page
        $this->load->view('templates/ku-header');
        $this->load->view('login_screen');
        $this->load->view('templates/ku-footer');

    }

    public function logout() {
        session_destroy();
        $this->index();
    }
}
