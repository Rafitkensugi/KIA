<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->load->helper(['url', 'settings']);
    }

    public function index() {
        $data['settings'] = $this->Settings_model->get_all();
        $this->load->view('settings/index', $data);
    }

    public function edit($key) {
        $data['setting'] = $this->Settings_model->get_by_key($key);
        $this->load->view('settings/edit', $data);
    }

    public function update() {
        $key   = $this->input->post('setting_key');
        $value = $this->input->post('setting_value');

        $this->Settings_model->update($key, $value);
        redirect('settings');
    }
}
