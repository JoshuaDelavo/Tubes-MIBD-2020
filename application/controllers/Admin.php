<?php
defined('BASEPATH') or exit('No direct script access allowed');
//Testing ampe bego
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            # code...
            redirect('auth');
        }
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
        $data['title'] = 'Data User';
        $role = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->query(
            "SELECT *
            FROM `user` 
            Where `id` '=' $role
           "
        )->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // $id = $this->input->post('id');
        // $data['query'] = $this->db->query(
        //     "SELECT *
        //     FROM `user`
        //     WHERE `user`.`id` = $id
        //     "

        // )->row_array();

        // foreach ($query->getResult() as $row) {
        //     echo $row->title;
        //     echo $row->name;
        //     echo $row->body;
        // }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');

        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules(
        //     'email',
        //     'Email',
        //     'required|trim|valid_email|is_unique[user.email]',
        //     [
        //         'is_unique' => 'This email has already registered!!'
        //     ]
        // );
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]
        // |max_length[50]|matches[password2]', [
        //     'matches' => 'Password dont match !!',
        //     'min_length' => 'Password minimal 3 characters !!'
        // ]);


        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'Registration Page';
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('auth/edit');
        //     $this->load->view('templates/footer');
        // } else {
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('name', true)),
        //         'email' => htmlspecialchars($this->input->post('email', true)),
        //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //         'image' => 'user.jpg',
        //         'role_id' => $this->input->post('ch'),
        //         'date_created' => time()
        //     ];

        //     $this->db->insert('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //         Congratulation Your Account Has Been Registered !!
        //       </div>');
        //     redirect('admin/dataUser');
        // }
    }
}
