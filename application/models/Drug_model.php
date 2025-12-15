<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_model extends CI_Model {

    private $table = 'drugs';

    public function get_all()
    {
        return $this->db
            ->order_by('drug_id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, ['drug_id' => $id])
            ->row();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('drug_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('drug_id', $id);
        return $this->db->delete($this->table);
    }
}
