<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model
{
    private $table = 'registrations';

    public function get_all()
    {
        $this->db->select('r.*, 
            IF(r.patient_type = "mother", m.name, c.name) AS patient_name', false);
        $this->db->from($this->table . ' r');
        $this->db->join('patients_mother m', 'm.mother_id = r.mother_id', 'left');
        $this->db->join('patients_child c', 'c.child_id = r.child_id', 'left');
        $this->db->order_by('r.reg_id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('r.*, 
            IF(r.patient_type = "mother", m.name, c.name) AS patient_name', false);
        $this->db->from($this->table . ' r');
        $this->db->join('patients_mother m', 'm.mother_id = r.mother_id', 'left');
        $this->db->join('patients_child c', 'c.child_id = r.child_id', 'left');
        $this->db->where('r.reg_id', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('reg_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('reg_id', $id);
        return $this->db->delete($this->table);
    }

    // Ambil semua ibu
    public function get_mothers()
    {
        $this->db->select('mother_id, name AS mother_name');
        $this->db->from('patients_mother');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    // Ambil semua anak
    public function get_children()
    {
        $this->db->select('child_id, name AS child_name');
        $this->db->from('patients_child');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }
    public function has_medical_record($reg_id)
{
    return $this->db->get_where('medical_records', ['reg_id' => $reg_id])->num_rows() > 0;
}


   public function generate_reg_code()
{
    // Ambil reg_code terakhir berdasarkan ID terbesar
    $this->db->select('reg_code');
    $this->db->order_by('reg_id', 'DESC');
    $query = $this->db->get('registrations')->row();

    if ($query) {
        // Ambil angka dari format REG-0001 -> 0001
        $last_number = (int) substr($query->reg_code, -4);
        $next_number = $last_number + 1;
    } else {
        $next_number = 1;
    }

    // Format 4 digit: 0001, 0002, dst
    $number = str_pad($next_number, 4, '0', STR_PAD_LEFT);

    return 'REG-' . $number;
}
}