<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Role_model', 'role');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['users'] = $this->user->get_all_with_roles();
        $this->load->view('users/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|callback_check_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[72]');
        $this->form_validation->set_rules('role_id', 'Role', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $data['roles'] = $this->role->get_role_options();
            $this->load->view('users/create', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password_hash' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status') ?: 1
            );
            $this->user->insert($data);
            $this->session->set_flashdata('message', 'User berhasil ditambahkan.');
            redirect('users');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->user->get_by_id($id);
        if (!$data['user']) show_404();

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|callback_check_email[' . $id . ']');
        $this->form_validation->set_rules('role_id', 'Role', 'required|integer');
        // Password opsional
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[72]');
        }

        if ($this->form_validation->run() == FALSE) {
            $data['roles'] = $this->role->get_role_options();
            $this->load->view('users/edit', $data);
        } else {
            $update_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status') ?: 1
            );

            if (!empty($this->input->post('password'))) {
                $update_data['password_hash'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->user->update($id, $update_data);
            $this->session->set_flashdata('message', 'User berhasil diperbarui.');
            redirect('users');
        }
    }

    public function delete($id)
    {
        $this->user->delete($id);
        $this->session->set_flashdata('message', 'User berhasil dihapus.');
        redirect('users');
    }

    public function check_email($email, $id = null)
    {
        if ($this->user->email_exists($email, $id)) {
            $this->form_validation->set_message('check_email', 'Email sudah terdaftar.');
            return FALSE;
        }
        return TRUE;
    }
}