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
        $this->load->library('form_validation');
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
            FROM `datapenyewa` JOIN `datatransaksi` ON
            `datapenyewa` . `noKtp` = `datatransaksi` . `noKtp`
            JOIN `memakai` ON 
            `datatransaksi` . `noTransaksi` = `memakai` . `noTransaksi`
            JOIN `datascooter` ON
            `memakai` . `noMesin` = `datascooter` . `noMesin`
            "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('operator/dataPS');
        $this->load->view('templates/footer');
    }

    public function transaksi()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['orang'] = $this->db->query(
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
        $this->load->view('operator/transaksiSewa');
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['orang'] = $this->db->query(
            "SELECT *
            FROM `datapenyewa` JOIN `datatransaksi` ON
            `datapenyewa` . `noKtp` = `datatransaksi` . `noKtp`
            JOIN `memakai` ON 
            `datatransaksi` . `noTransaksi` = `memakai` . `noTransaksi`
            JOIN `datascooter` ON
            `memakai` . `noMesin` = `datascooter` . `noMesin`
            "
        )->result_array();
        // $role = $this->input->post('id');
        // $data['dataP'] = $this->db->get_where('datapenyewa', ['noKtp' => $role]);
        $this->load->view('templates/header', $data);
        $this->load->view('operator/sewaTransaksi');
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $data['title'] = 'Operator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules(
            'noKtp',
            'NoKtp',
            'required|is_unique[datapenyewa.noKtp]',
            [
                'is_unique' => 'This No Ktp Already Registered'
            ]
        );
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('number', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Operator';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['orang'] = $this->db->query(
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
            $this->load->view('operator/sewaTransaksi');
            $this->load->view('templates/footer');
        } else {
            $penyewa =
                [
                    'noKtp' => htmlspecialchars($this->input->post('noKtp')),
                    'username' => htmlspecialchars($this->input->post('name')),
                    'noTelepon' => htmlspecialchars($this->input->post('number')),
                    'alamat' => htmlspecialchars($this->input->post('alamat'))
                ];
            $waktuPinjam = time();
            $transaksi =
                [
                    'waktuPinjam' => $waktuPinjam,
                    'tanggalPinjam' => date('Y-m-d'),
                    'status' => '1',
                    'noKtp' => htmlspecialchars($this->input->post('noKtp'))
                ];
            $this->db->insert('datapenyewa', $penyewa);
            $this->db->insert('datatransaksi', $transaksi);
            $transaksi1 = $this->db->get_where('datatransaksi', ['noKtp' => $this->input->post('noKtp'), 'waktuPinjam' => $waktuPinjam]);
            var_dump($transaksi1);
            die;
            $memakai = [
                'noTransaksi' => $transaksi1,
                'noMesin' => $this->input->post('ch')
            ];
            $this->db->insert('memakai', $memakai);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation Penyewa Data Has Been Registered !!
              </div>');
            redirect('operator/transaksiSewa');
        }
    }
}
