<?php
class Queue_model extends CI_Model {

    private $table = 'queue';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['queue_id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['queue_id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['queue_id' => $id]);
    }
}
