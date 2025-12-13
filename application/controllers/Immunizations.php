<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immunizations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Immunizations_model', 'immun');
    }

    // =========================================================
    // INDEX
    // =========================================================
    public function index() {
        $data['immunizations'] = $this->immun->get_all();
        $this->load->view('immunizations/index', $data);
    }

    // =========================================================
    // CREATE PAGE
    // =========================================================
    public function add() {
        // menampilkan form create
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view('immunizations/create');
            return;
        }

        // proses insert data
        $data = [
            'child_id'          => $this->input->post('child_id'),
            'record_id'         => $this->input->post('record_id'),
            'vaccine_name'      => $this->input->post('vaccine_name'),
            'vaccine_batch'     => $this->input->post('vaccine_batch'),
            'immunization_date' => $this->input->post('immunization_date'),
            'next_schedule'     => $this->input->post('next_schedule'),
            'effects'           => $this->input->post('effects'),
        ];

        $this->immun->insert($data);
        redirect('immunizations');
    }

    // =========================================================
    // VIEW DETAIL
    // =========================================================
    public function view($id) {
        $data['detail'] = $this->immun->get_by_id($id);

        if (!$data['detail']) {
            show_404();
        }

        $this->load->view('immunizations/view', $data);
    }

    // =========================================================
    // EDIT PAGE
    // =========================================================
    public function edit($id) {

        // jika method GET: tampilkan halaman edit
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $data['detail'] = $this->immun->get_by_id($id);

            if (!$data['detail']) {
                show_404();
            }

            $this->load->view('immunizations/edit', $data);
            return;
        }

        // jika POST: update data
        $post = [
            'child_id'          => $this->input->post('child_id'),
            'record_id'         => $this->input->post('record_id'),
            'vaccine_name'      => $this->input->post('vaccine_name'),
            'vaccine_batch'     => $this->input->post('vaccine_batch'),
            'immunization_date' => $this->input->post('immunization_date'),
            'next_schedule'     => $this->input->post('next_schedule'),
            'effects'           => $this->input->post('effects'),
        ];

        $this->immun->update_data($id, $post);
        redirect('immunizations');
    }

    // =========================================================
    // DELETE
    // =========================================================
    public function delete($id) {
        $this->immun->delete_data($id);
        redirect('immunizations');
    }
}
