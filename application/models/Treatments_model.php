<?php

class Treatments_model extends CI_Model
{
    private $table = 'treatments';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['treatment_id' => $id])->row();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['treatment_id' => $id]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table, ['treatment_id' => $id]);
    }
}
