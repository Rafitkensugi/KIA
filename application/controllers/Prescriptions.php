<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescriptions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Prescription_model');
        $this->load->database();
    }

    public function index() {
        $data['prescriptions'] = $this->Prescription_model->get_all();
        $this->load->view('prescriptions/index', $data);
    }

    public function create() {
        $data['drugs'] = $this->db->get('drugs')->result();
        $data['records'] = $this->db->get('medical_records')->result();

        if ($this->input->post()) {
            $insert = [
                'record_id'   => $this->input->post('record_id'),
                'drug_id'     => $this->input->post('drug_id'),
                'dosage'      => $this->input->post('dosage'),
                'instruction' => $this->input->post('instruction'),
                'quantity'    => $this->input->post('quantity'),
                'notes'       => $this->input->post('notes'),
            ];

            $this->Prescription_model->insert($insert);
            redirect('prescriptions');
        }

        $this->load->view('prescriptions/create', $data);
    }

    public function edit($id) {
        $data['prescription'] = $this->Prescription_model->get_by_id($id);
        $data['drugs'] = $this->db->get('drugs')->result();
        $data['records'] = $this->db->get('medical_records')->result();

        if ($this->input->post()) {
            $update = [
                'record_id'   => $this->input->post('record_id'),
                'drug_id'     => $this->input->post('drug_id'),
                'dosage'      => $this->input->post('dosage'),
                'instruction' => $this->input->post('instruction'),
                'quantity'    => $this->input->post('quantity'),
                'notes'       => $this->input->post('notes'),
            ];

            $this->Prescription_model->update($id, $update);
            redirect('prescriptions');
        }

        $this->load->view('prescriptions/edit', $data);
    }

    public function delete($id) {
        $this->Prescription_model->delete($id);
        redirect('prescriptions');
    }
}