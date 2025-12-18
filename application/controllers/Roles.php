<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model', 'role');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['roles'] = $this->role->get_all();
        $this->load->view('roles/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|max_length[100]|callback_check_role_name');
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[65535]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('roles/create');
        } else {
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'description' => $this->input->post('description') ?: null
            );
            $this->role->insert($data);
            $this->session->set_flashdata('message', 'Role berhasil ditambahkan.');
            redirect('roles');
        }
    }

    public function edit($id)
    {
        $data['role'] = $this->role->get_by_id($id);
        if (!$data['role']) show_404();

        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|max_length[100]|callback_check_role_name[' . $id . ']');
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[65535]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('roles/edit', $data);
        } else {
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'description' => $this->input->post('description') ?: null
            );
            $this->role->update($id, $data);
            $this->session->set_flashdata('message', 'Role berhasil diperbarui.');
            redirect('roles');
        }
    }

    public function delete($id)
    {
        // Optional: cek apakah role sedang dipakai
        $this->db->where('role_id', $id);
        if ($this->db->count_all_results('users') > 0) {
            $this->session->set_flashdata('error', 'Tidak bisa hapus role yang sedang digunakan.');
            redirect('roles');
        }

        $this->role->delete($id);
        $this->session->set_flashdata('message', 'Role berhasil dihapus.');
        redirect('roles');
    }

    // Callback validasi
    public function check_role_name($role_name, $id = null)
    {
        if ($this->role->role_exists($role_name, $id)) {
            $this->form_validation->set_message('check_role_name', 'Role name sudah digunakan.');
            return FALSE;
        }
        return TRUE;
    }
}