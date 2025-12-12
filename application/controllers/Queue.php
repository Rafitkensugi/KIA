<?php

/**
 * @property CI_Input $input
 * @property Queue_model $Queue_model
 */
class Queue extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Queue_model');
    }

    public function index()
    {
        $data['queue'] = $this->Queue_model->get_all();
        $this->load->view('queue/index', $data);
    }

    public function create()
    {
        $this->load->view('queue/create');
    }

    public function store()
    {
        $data = [
            'reg_id'        => $this->input->post('reg_id'),
            'queue_number'  => $this->input->post('queue_number'),
            'status'        => $this->input->post('status'),
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $this->Queue_model->insert($data);
        redirect('queue');
    }

    public function edit($id)
    {
        $data['queue'] = $this->Queue_model->get_by_id($id);
        $this->load->view('queue/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'reg_id'        => $this->input->post('reg_id'),
            'queue_number'  => $this->input->post('queue_number'),
            'status'        => $this->input->post('status'),
        ];

        $this->Queue_model->update($id, $data);
        redirect('queue');
    }

    public function delete($id)
    {
        $this->Queue_model->delete($id);
        redirect('queue');
    }
}
