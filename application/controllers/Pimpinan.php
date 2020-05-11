<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
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
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/index');
        $this->load->view('templates/footer');
    }

    public function dataScooter()
    {
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `datascooter` 
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/dataS', $data);
        $this->load->view('templates/footer');
    }

    public function transaksiS()
    {
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `datascooter` JOIN `memakai` 
            ON `datascooter` . `noMesin` = `memakai` . `noMesin` JOIN `datatransaksi`
            ON `memakai` . `noTransaksi` = `datatransaksi` . `noTransaksi`   
 
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/transaksiS', $data);
        $this->load->view('templates/footer');
    }

    public function transaksiP()
    {
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `datapenyewa` JOIN `datatransaksi` ON
            `datapenyewa` . `noKtp` = `datatransaksi` . `noKtp`
            JOIN `memakai` ON 
            `datatransaksi` . `noTransaksi` = `memakai` . `noTransaksi`
            JOIN `datascooter` ON
            `memakai` . `noMesin` = `datascooter` . `noMesin`
            "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/transaksiP', $data);
        $this->load->view('templates/footer');
    }

    public function statistikP()
    {
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penyewa'] = $this->db->query(
            "SELECT COUNT(`datatransaksi`.`noTransaksi`) as `ct` , `datapenyewa`.`noKtp` , `datapenyewa` . `username`
            FROM `datapenyewa` JOIN `datatransaksi` ON
            `datapenyewa` . `noKtp` = `datatransaksi` . `noKtp`
            GROUP BY `datapenyewa` . `noKtp`
            "
        )->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/statistikP', $data);
        $this->load->view('templates/footer');
    }
    public function statistikS()
    {
        $data['title'] = 'Pimpinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['scooter'] = $this->db->query(
            "SELECT *
            FROM `datascooter` 
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pimpinan/statistikS', $data);
        $this->load->view('templates/footer');
    }
}
