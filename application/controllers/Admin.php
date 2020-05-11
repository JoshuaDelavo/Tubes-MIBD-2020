<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            # code...
            redirect('auth');
        }
        $this->load->library('form_validation');
        $data['url'] = 'admin';
    }
    public function index()
    {
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function dataUser()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `user` 
            Where `role_id`!= 1
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/dataUser', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Data User';
        $role = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['id' => $role])->row_array();
        // $data['query'] = $this->db->query(
        //     "SELECT *
        //     FROM `user` 
        //     Where `id` == '$role'
        //    "
        // )->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $role = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['id' => $role])->row_array();

        $jabatan = htmlspecialchars($this->input->post('jabatan', true));
        if ($jabatan == 'Operator') {
            $jabatan = "3";
        }
        if ($jabatan == "Pimpinan Taman") {
            $jabatan = "2";
        }
        $pass =  htmlspecialchars($this->input->post('password', true));
        $pass2 = htmlspecialchars($this->input->post('password2', true));
        if (!$pass == $pass2) {
            $pass3 = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $pass = $pass3;
        }
        $data =
            [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $pass,
                'role_id' => $jabatan
            ];
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation Your Data Has Been Updated !!
          </div>');
        $post = $this->input->post('data');
        $this->db->update('user', $data, "id = $post");
        redirect('admin/dataUser');
    }

    public function dataScooter()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `datascooter` 
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/dataScooter', $data);
        $this->load->view('templates/footer');
    }

    public function editS()
    {
        $data['title'] = 'Edit Data Scooter';
        $role = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataS'] = $this->db->get_where('datascooter', ['noMesin' => $role])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/editS', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $data['title'] = 'Data User';
        $role = $this->input->post('idDelete');
        $this->db->delete('user', ['id' => $role]);
        // $data['query'] = $this->db->query(
        //     "SELECT *
        //     FROM `user` 
        //     Where `id` == '$role'
        //    "
        // )->row_array();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation Your Data Has Been Deleted !!
              </div>');
        redirect('admin/dataUser');
    }

    public function deleteS()
    {
        $data['title'] = 'Data Scooter ';
        $role = $this->input->post('delete');
        $this->db->delete('datascooter', ['noMesin' => $role]);
        // $data['query'] = $this->db->query(
        //     "SELECT *
        //     FROM `user` 
        //     Where `id` == '$role'
        //    "
        // )->row_array();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation Your Data Scooter Has Been Deleted !!
              </div>');
        redirect('admin/dataScooter');
    }

    public function addS()
    {
        $data['title'] = 'Edit Data Scooter';
        $role = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataS'] = $this->db->get_where('datascooter', ['noMesin' => $role])->row_array();
        $data['title'] = 'Add Scooter Page';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/addScooter');
        $this->load->view('templates/footer');
    }

    public function addScooter()
    {
        // $im = $_FILES[`gambar`];
        $image = $_FILES['file']['name'];
        if ($image) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '1000';
            $config['upload_path'] = '../asset/image/';
            $this->load->library('upload', $config);

            $data = [
                'gambar' => $image,
                'warna' => htmlspecialchars($this->input->post('warna', true)),
                'jenis' => 'Electric',
                'tarif' => htmlspecialchars($this->input->post('tarif', true)),
            ];

            $this->db->insert('datascooter', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation Your Scooter Has Been Registered !!
          </div>');
            redirect('admin/dataScooter');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Your File Upload Failed !!
          </div>');
            redirect('admin/addScooter');
        }
    }

    public function updateS()
    {
        $data['title'] = 'Edit Data Scooter';
        $role = $this->input->post('data');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataS'] = $this->db->get_where('datascooter', ['noMesin' => $role])->row_array();
        $input =
            [
                'tarif' => htmlspecialchars($this->input->post('tarif')) + 0
            ];
        $this->db->update('datascooter', $input, "noMesin = $role");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your Scooter Data Has Been Changed !!
      </div>');
        redirect('admin/dataScooter');
    }
}
