<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mother extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_mother_model', 'mother');
    }

    // LIST
    public function index()
    {
        $data['mothers'] = $this->mother->get_all();
        $this->load->view('patients/mother/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        $this->load->view('patients/mother/create');
    }

    // SIMPAN DATA
    public function store()
    {
        $post = $this->input->post();

        $data = [
            'nik'             => $post['nik'],
            'name'            => $post['name'],
            'birth_date'      => $post['birth_date'],
            'phone'           => $post['phone'],
            'address'         => $post['address'],
            'blood_type'      => $post['blood_type'],
            'alergies'        => $post['alergies'],
            'medical_history' => $post['medical_history'],
        ];

        $this->mother->insert($data);
        redirect('patients/mother');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data['mother'] = $this->mother->get_by_id($id);
        $this->load->view('patients/mother/edit', $data);
    }

    // UPDATE DATA
    public function update($id)
    {
        $post = $this->input->post();

        $data = [
            'nik'             => $post['nik'],
            'name'            => $post['name'],
            'birth_date'      => $post['birth_date'],
            'phone'           => $post['phone'],
            'address'         => $post['address'],
            'blood_type'      => $post['blood_type'],
            'alergies'        => $post['alergies'],
            'medical_history' => $post['medical_history'],
        ];

        $this->mother->update($id, $data);
        redirect('patients/mother');
    }

    // HAPUS
    public function delete($id)
    {
        $this->mother->delete($id);
        redirect('patients/mother');
    }

    // DETAIL
    public function detail($id)
    {
        $data['mother'] = $this->mother->get_by_id($id);
        $this->load->view('patients/mother/detail', $data);
    }
}
