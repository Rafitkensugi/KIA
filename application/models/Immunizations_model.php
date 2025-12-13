<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immunizations_model extends CI_Model {

    private $table = 'immunizations';

    public function get_all() {
        return $this->db
            ->order_by('immun_id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id) {
        return $this->db
            ->where('immun_id', $id)
            ->get($this->table)
            ->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_data($id, $data) {
        return $this->db
            ->where('immun_id', $id)
            ->update($this->table, $data);
    }

    public function delete_data($id) {
        return $this->db
            ->where('immun_id', $id)
            ->delete($this->table);
    }
}
