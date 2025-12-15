<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregnancy_model extends CI_Model {

    private $table = 'pregnancies';

    public function getAll() {
        return $this->db->select('pregnancies.*, patients_mother.name AS mother_name')
                        ->from($this->table)
                        ->join('patients_mother', 'patients_mother.mother_id = pregnancies.mother_id', 'left')
                        ->order_by('pregnancy_id', 'DESC')
                        ->get()
                        ->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['pregnancy_id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, ['pregnancy_id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['pregnancy_id' => $id]);
    }
}
