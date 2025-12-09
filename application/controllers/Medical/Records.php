<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Medical_record_model', 'record');
    }

    public function index()
    {
        $data['records'] = $this->record->getAll();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('medical/records/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('medical/records/create');
        $this->load->view('layout/footer');
    }

    public function store()
    {
        $data = [
            'reg_id'        => $this->input->post('reg_id'),
            'height'        => $this->input->post('height'),
            'weight'        => $this->input->post('weight'),
            'blood_pressure'=> $this->input->post('blood_pressure'),
            'pulse'         => $this->input->post('pulse'),
            'temperature'   => $this->input->post('temperature'),
            'symptoms'      => $this->input->post('symptoms'),
            'notes'         => $this->input->post('notes'),
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $this->record->insert($data);
        redirect('medical/records');
    }

    public function edit($id)
    {
        $data['record'] = $this->record->getById($id);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('medical/records/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $data = [
            'height'        => $this->input->post('height'),
            'weight'        => $this->input->post('weight'),
            'blood_pressure'=> $this->input->post('blood_pressure'),
            'pulse'         => $this->input->post('pulse'),
            'temperature'   => $this->input->post('temperature'),
            'symptoms'      => $this->input->post('symptoms'),
            'notes'         => $this->input->post('notes'),
        ];

        $this->record->update($id, $data);
        redirect('medical/records');
    }
    public function detail($id)
{
    $data['record'] = $this->record->getById($id);

    if (!$data['record']) {
        show_404();
    }

    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('medical/records/detail', $data);
    $this->load->view('layout/footer');
}

public function print($id)
{
    $data['record'] = $this->record->getById($id);

    if (!$data['record']) {
        show_404();
    }

    $this->load->view('medical/records/print', $data);
}



    public function delete($id)
    {
        $this->record->delete($id);
        redirect('medical/records');
    }
}
