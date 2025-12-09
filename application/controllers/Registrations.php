<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Registration_model', 'registration');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

   public function index()
{
    $data['registrations'] = $this->registration->get_all();
    
    // Kirimkan status apakah reg_id punya rekam medis
    foreach ($data['registrations'] as $r) {
        $r->has_record = $this->registration->has_medical_record($r->reg_id);
    }

    $this->load->view('registrations/index', $data);
}


    public function create()
    {
        $data['mothers']   = $this->registration->get_mothers();
        $data['children']  = $this->registration->get_children();
        $this->load->view('registrations/create', $data);
    }

    public function store()
    {
        $patient_type = $this->input->post('patient_type', true);
        $mother_id    = $this->input->post('mother_id');
        $child_id     = $this->input->post('child_id');

        // pastikan hanya satu yang terisi
        if ($patient_type == 'mother') {
            $mother_id = $mother_id ?: null;
            $child_id  = null;
        } elseif ($patient_type == 'child') {
            $child_id  = $child_id ?: null;
            $mother_id = null;
        } else {
            $mother_id = null;
            $child_id  = null;
        }

        $data = [
            'reg_code'     => $this->registration->generate_reg_code(),
            'patient_type' => $patient_type,
            'mother_id'    => $mother_id,
            'child_id'     => $child_id,
            'visit_date'   => $this->input->post('visit_date', true),
            'service_type' => $this->input->post('service_type', true),
            'status'       => 'pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $this->registration->insert($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil ditambahkan');
        redirect('registrations');
    }

    public function edit($id)
    {
        $reg = $this->registration->get_by_id($id);
        if (!$reg) {
            show_404();
        }
        $data['reg'] = $reg;
        $this->load->view('registrations/edit', $data);
    }

    public function update($id)
    {
        $reg = $this->registration->get_by_id($id);
        if (!$reg) {
            show_404();
        }

        $data = [
            'visit_date'   => $this->input->post('visit_date', true),
            'service_type' => $this->input->post('service_type', true),
            'status'       => $this->input->post('status', true),
        ];

        $this->registration->update($id, $data);
        $this->session->set_flashdata('success', 'Registrasi berhasil diupdate');
        redirect('registrations');
    }

    public function detail($id)
    {
        $reg = $this->registration->get_by_id($id);
        if (!$reg) {
            show_404();
        }
        $data['reg'] = $reg;
        $this->load->view('registrations/detail', $data);
    }

    public function delete($id)
    {
        $reg = $this->registration->get_by_id($id);
        if (!$reg) {
            show_404();
        }

        $this->registration->delete($id);
        $this->session->set_flashdata('success', 'Registrasi berhasil dihapus');
        redirect('registrations');
    }

    public function print($id)
    {
        $reg = $this->registration->get_by_id($id);
        if (!$reg) {
            show_404();
        }
        $data['reg'] = $reg;
        $this->load->view('registrations/print', $data);
    }
}
