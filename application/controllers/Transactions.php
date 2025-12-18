<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaction');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['transactions'] = $this->transaction->get_all_with_details();
        $this->load->view('transactions/index', $data);
    }

    public function view($id)
    {
        $data['transaction'] = $this->transaction->get_by_id($id);
        if (!$data['transaction']) show_404();
        $this->load->view('transactions/view', $data);
    }

    public function create()
    {
        $data['registrations'] = $this->transaction->get_unpaid_registrations();
        $this->load->view('transactions/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('reg_id', 'Registration', 'required|integer');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required|in_list[cash,transfer,qris]');

        if ($this->form_validation->run() == FALSE) {
            $data['registrations'] = $this->transaction->get_unpaid_registrations();
            $this->load->view('transactions/create', $data);
        } else {
            $reg_id = $this->input->post('reg_id');

            if ($this->transaction->transaction_exists_by_reg($reg_id)) {
                $this->session->set_flashdata('error', 'Transaksi untuk registrasi ini sudah ada.');
                redirect('transactions/create');
            }

            $data = array(
                'reg_id' => $reg_id,
                'total_amount' => $this->input->post('total_amount'),
                'payment_method' => $this->input->post('payment_method'),
                'status' => 'paid'
            );

            $this->transaction->insert($data);
            $this->session->set_flashdata('message', 'Transaksi berhasil dibuat.');
            redirect('transactions');
        }
    }

    public function edit($id)
    {
        $data['transaction'] = $this->transaction->get_by_id($id);
        if (!$data['transaction']) show_404();

        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required|numeric|greater_than_equal_to[0]');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required|in_list[cash,transfer,qris]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[paid,unpaid]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('transactions/edit', $data);
        } else {
            $update_data = array(
                'total_amount' => $this->input->post('total_amount'),
                'payment_method' => $this->input->post('payment_method'),
                'status' => $this->input->post('status')
            );
            $this->transaction->update($id, $update_data);
            $this->session->set_flashdata('message', 'Transaksi berhasil diperbarui.');
            redirect('transactions/view/' . $id);
        }
    }
}