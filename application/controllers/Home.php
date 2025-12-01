<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $this->load->database();

        if ($this->db->conn_id) {
            echo "BISA DONG";
        } else {
            echo "ELAH";
        }
    }
}
