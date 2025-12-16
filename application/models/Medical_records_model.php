<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_records_model extends CI_Model
{
    protected $table = 'medical_records';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['record_id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('record_id', $id)
                        ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('record_id', $id)
                        ->delete($this->table);
    }
}
