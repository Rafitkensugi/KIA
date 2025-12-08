<?php
class Medical_record_model extends CI_Model {

    protected $table = 'medical_records';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['record_id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('record_id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('record_id', $id)->delete($this->table);
    }
}
