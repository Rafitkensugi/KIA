<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregnancy extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pregnancy_model');
        $this->load->model('Patient_mother_model'); // opsional jika kamu punya modelnya
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index() {
        $data['title'] = "Data Kehamilan";
        $data['pregnancies'] = $this->Pregnancy_model->getAll();

        $this->load->view('patients/pregnancy/index', $data);
    }

    public function create() {
        $data['title'] = "Tambah Data Kehamilan";
        $data['mothers'] = $this->db->get('patients_mother')->result();

        $this->load->view('patients/pregnancy/create', $data);
    }

    public function store() {
        $data = [
            'mother_id' => $this->input->post('mother_id'),
            'hpht'      => $this->input->post('hpht'),
            'hpl'       => $this->input->post('hpl'),
            'gravida'   => $this->input->post('gravida'),
            'para'      => $this->input->post('para'),
            'abortus'   => $this->input->post('abortus'),
            'notes'     => $this->input->post('notes'),
            'created_at'=> date('Y-m-d H:i:s')
        ];

        $this->Pregnancy_model->insert($data);
        redirect('patients/pregnancy');
    }

    public function edit($id) {
        $data['title'] = "Edit Data Kehamilan";
        $data['pregnancy'] = $this->Pregnancy_model->getById($id);
        $data['mothers'] = $this->db->get('patients_mother')->result();

        $this->load->view('patients/pregnancy/edit', $data);
    }

    public function update($id) {
        $data = [
            'mother_id' => $this->input->post('mother_id'),
            'hpht'      => $this->input->post('hpht'),
            'hpl'       => $this->input->post('hpl'),
            'gravida'   => $this->input->post('gravida'),
            'para'      => $this->input->post('para'),
            'abortus'   => $this->input->post('abortus'),
            'notes'     => $this->input->post('notes'),
        ];

        $this->Pregnancy_model->update($id, $data);
        redirect('patients/pregnancy');
    }

    public function delete($id) {
        $this->Pregnancy_model->delete($id);
        redirect('patients/pregnancy');
    }
}
