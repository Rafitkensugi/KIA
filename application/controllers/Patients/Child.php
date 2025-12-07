<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Child extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_child_model', 'child');
    }

    // LIST
    public function index()
    {
        $data['children'] = $this->child->get_all();
        $this->load->view('patients/child/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        $data['mothers'] = $this->child->get_mothers();
        $this->load->view('patients/child/create', $data);
    }

    // SIMPAN DATA
    public function store()
    {
        $post = $this->input->post();

        $data = [
            'mother_id'    => $post['mother_id'],
            'nik'          => $post['nik'],
            'name'         => $post['name'],
            'birth_date'   => $post['birth_date'],
            'gender'       => $post['gender'],
            'birth_weight' => $post['birth_weight'],
            'birth_length' => $post['birth_length'],
            'alergies'     => $post['alergies'],
        ];

        $this->child->insert($data);
        redirect('patients/child');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data['child']   = $this->child->get_by_id($id);
        $data['mothers'] = $this->child->get_mothers();
        $this->load->view('patients/child/edit', $data);
    }

    // UPDATE DATA
    public function update($id)
    {
        $post = $this->input->post();

        $data = [
            'mother_id'    => $post['mother_id'],
            'nik'          => $post['nik'],
            'name'         => $post['name'],
            'birth_date'   => $post['birth_date'],
            'gender'       => $post['gender'],
            'birth_weight' => $post['birth_weight'],
            'birth_length' => $post['birth_length'],
            'alergies'     => $post['alergies'],
        ];

        $this->child->update($id, $data);
        redirect('patients/child');
    }

    // HAPUS
    public function delete($id)
    {
        $this->child->delete($id);
        redirect('patients/child');
    }

    // DETAIL
    public function detail($id)
    {
        $data['child'] = $this->child->get_by_id($id);
        $this->load->view('patients/child/detail', $data);
    }
}
