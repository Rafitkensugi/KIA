<?php

/**
 * @property CI_Input $input
 * @property Queue_model $Treatments_model
 */
class treatments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Treatments_model');
    }

    public function index()
    {
        $data['treatments'] = $this->Treatments_model->get_all();
        $this->load->view('medical/treatments/index', $data);
    }

    public function create()
    {
        $this->load->view('medical/treatments/create');
    }

    public function store()
    {
        $data = [
            'record_id'         => $this->input->post('record_id'),
            'treatment_name'    => $this->input->post('treatment_name'),
            'cost'              => $this->input->post('cost'),
            'notes'             => $this->input->post('notes')
        ];

        $this->Treatments_model->insert($data);
        redirect('medical/treatments');
    }
    public function edit($id)
    {
        $data['treatments'] = $this->Treatments_model->get_by_id($id);
        $this->load->view('medical/treatments/edit', $data);
    }
    public function update($id)
    {
        $data = [
            'record_id'         => $this->input->post('record_id'),
            'treatment_name'    => $this->input->post('treatment_name'),
            'cost'              => $this->input->post('cost'),
            'notes'             => $this->input->post('notes')
        ];

        $this->Treatments_model->update($id, $data);
        redirect('medical/treatments');
    }
    public function delete($id)
    {
        $this->Treatments_model->delete($id);
        redirect('medical/treatments');
    }
}
