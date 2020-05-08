<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata['email']) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('operator/index');
        $this->load->view('templates/footer');
    }
}
