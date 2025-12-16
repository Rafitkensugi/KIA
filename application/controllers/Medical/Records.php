<?php

/**
 * @property CI_Input $input
 * @property Medical_records_model $Medical_records_model
 */
class Records extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Medical_records_model');
    }

    public function index()
    {
        $data['records'] = $this->Medical_records_model->get_all();
        $this->load->view('medical/records/index', $data);
    }

    public function create()
    {
        $this->load->view('medical/records/create');
    }

    public function store()
    {
        $data = [
            'reg_id'         => $this->input->post('reg_id'),
            'height'         => $this->input->post('height'),
            'weight'         => $this->input->post('weight'),
            'blood_pressure' => $this->input->post('blood_pressure'),
            'pulse'          => $this->input->post('pulse'),
            'temperature'    => $this->input->post('temperature'),
            'symptoms'       => $this->input->post('symptoms'),
            'notes'          => $this->input->post('notes')
        ];

        $this->Medical_records_model->insert($data);
        redirect('medical/records');
    }

    public function edit($id)
    {
        $data['record'] = $this->Medical_records_model->get_by_id($id);
        $this->load->view('medical/records/edit', $data);
    }

    public function detail($id)
{
    $data['record'] = $this->Medical_records_model->get_by_id($id);

    if (!$data['record']) {
        show_404();
    }

    $this->load->view('medical/records/detail', $data);
}


    public function update($id)
    {
        $data = [
            'reg_id'         => $this->input->post('reg_id'),
            'height'         => $this->input->post('height'),
            'weight'         => $this->input->post('weight'),
            'blood_pressure' => $this->input->post('blood_pressure'),
            'pulse'          => $this->input->post('pulse'),
            'temperature'    => $this->input->post('temperature'),
            'symptoms'       => $this->input->post('symptoms'),
            'notes'          => $this->input->post('notes')
        ];

        $this->Medical_records_model->update($id, $data);
        redirect('medical/records');
    }

    public function delete($id)
    {
        $this->Medical_records_model->delete($id);
        redirect('medical/records');
    }
    public function print($id)
{
    $data['record'] = $this->Medical_records_model->get_by_id($id);

    if (!$data['record']) {
        show_404();
    }

    $this->load->view('medical/records/print', $data);
}

}
 