<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Diagnosis_model $Diagnosis_model
 * @property CI_Input $input
 */
class Diagnosis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Diagnosis_model');
    }

    public function index()
    {
        $data['diagnosis'] = $this->Diagnosis_model->get_all();
        $this->load->view('diagnosis/index', $data);
    }

    public function create()
    {
        $this->load->view('diagnosis/create');
    }

    public function store()
    {
        $data = [
            'record_id'      => $this->input->post('record_id'),
            'icd10'          => $this->input->post('icd10'),
            'diagnosis_name' => $this->input->post('diagnosis_name'),
            'notes'          => $this->input->post('notes'),
        ];

        $this->Diagnosis_model->insert($data);

        redirect('diagnosis');
    }

    public function edit($id)
    {
        $data['item'] = $this->Diagnosis_model->get_by_id($id);
        $this->load->view('diagnosis/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'record_id'      => $this->input->post('record_id'),
            'icd10'          => $this->input->post('icd10'),
            'diagnosis_name' => $this->input->post('diagnosis_name'),
            'notes'          => $this->input->post('notes'),
        ];

        $this->Diagnosis_model->update($id, $data);

        redirect('diagnosis');
    }

    public function delete($id)
    {
        $this->Diagnosis_model->delete($id);
        redirect('diagnosis');
    }
}
