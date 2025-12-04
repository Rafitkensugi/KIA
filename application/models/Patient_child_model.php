<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_child_model extends CI_Model {

    private $table = 'patients_child';

    public function get_all()
    {
        $this->db->select('c.*, m.name AS mother_name');
        $this->db->from($this->table . ' c');
        $this->db->join('patients_mother m', 'm.mother_id = c.mother_id', 'left');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('c.*, m.name AS mother_name');
        $this->db->from($this->table . ' c');
        $this->db->join('patients_mother m', 'm.mother_id = c.mother_id', 'left');
        $this->db->where('c.child_id', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('child_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('child_id', $id);
        return $this->db->delete($this->table);
    }

    public function get_mothers()
    {
        return $this->db->get('patients_mother')->result();
    }
}
