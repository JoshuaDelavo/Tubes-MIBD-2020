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

    public function penyewa()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['orang'] = $this->db->query(
            "SELECT *
            FROM `datapenyewa`
            "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('operator/dataPenyewa');
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $role = $this->input->post('id');
        // $data['dataP'] = $this->db->get_where('datapenyewa', ['noKtp' => $role]);
        $this->load->view('templates/header', $data);
        $this->load->view('operator/addPenyewa');
        $this->load->view('templates/footer');
    }
}
