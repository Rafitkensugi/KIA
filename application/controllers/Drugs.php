<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drugs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Drug_model', 'drug');
    }

    // LIST
    public function index()
    {
        $data['drugs'] = $this->drug->get_all();
        $this->load->view('drugs/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        $this->load->view('drugs/create');
    }

    // SIMPAN DATA
    public function store()
    {
        $post = $this->input->post();

        $data = [
            'drug_name'       => $post['drug_name'],
            'category'        => $post['category'],
            'unit'            => $post['unit'],
            'price'           => $post['price'],
            'expiration_date' => $post['expiration_date'],
            'stock_minimum'   => $post['stock_minimum'],
        ];

        $this->drug->insert($data);
        redirect('drugs');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data['drug'] = $this->drug->get_by_id($id);
        $this->load->view('drugs/edit', $data);
    }

    // UPDATE DATA
    public function update($id)
    {
        $post = $this->input->post();

        $data = [
            'drug_name'       => $post['drug_name'],
            'category'        => $post['category'],
            'unit'            => $post['unit'],
            'price'           => $post['price'],
            'expiration_date' => $post['expiration_date'],
            'stock_minimum'   => $post['stock_minimum'],
        ];

        $this->drug->update($id, $data);
        redirect('drugs');
    }

    // DETAIL
    public function detail($id)
    {
        $data['drug'] = $this->drug->get_by_id($id);
        $this->load->view('drugs/detail', $data);
    }

    // HAPUS
    public function delete($id)
    {
        $this->drug->delete($id);
        redirect('drugs');
    }
}
