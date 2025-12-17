<?php
/**
 * @property CI_Input $input
 * @property Reports_model $Reports_model
 */
class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load model tanpa alias agar konsisten
        $this->load->model('Reports_model');
    }

    public function index() {
        $data['reports'] = $this->Reports_model->get_all();
        $this->load->view('reports/index', $data);
    }

    public function create() {
        $this->load->view('reports/create');
    }

    public function store() {
        $data = [
            'report_type' => $this->input->post('report_type'),
            'period'      => $this->input->post('period'),
            'data'        => $this->input->post('data'),
            'created_at'  => date('Y-m-d H:i:s')
        ];
        $this->Reports_model->insert($data);
        redirect('reports');
    }

    public function edit($id) {
        $data['report'] = $this->Reports_model->get_by_id($id);
        $this->load->view('reports/edit', $data);
    }

    public function update($id) {
        $data = [
            'report_type' => $this->input->post('report_type'),
            'period'      => $this->input->post('period'),
            'data'        => $this->input->post('data'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];
        $this->Reports_model->update($id, $data);
        redirect('reports');
    }

    public function delete($id) {
        $this->Reports_model->delete($id);
        redirect('reports');
    }
}
?>