<?php
class Prescription_model extends CI_Model {

    private $table = 'prescriptions';

    public function get_all() {
        $this->db->select('prescriptions.*, drugs.drug_name, medical_records.record_id');
        $this->db->from($this->table);
        $this->db->join('drugs', 'drugs.drug_id = prescriptions.drug_id');
        $this->db->join('medical_records', 'medical_records.record_id = prescriptions.record_id');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['prescription_id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('prescription_id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('prescription_id', $id)->delete($this->table);
    }
}