<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_mother_model extends CI_Model {

    private $table = 'patients_mother';

    // Ambil semua data ibu
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil data ibu berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['mother_id' => $id])->row();
    }

    // Tambah data ibu
    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    // Update data ibu
    public function update($id, $data)
    {
        $this->db->where('mother_id', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus data ibu
    public function delete($id)
    {
        $this->db->where('mother_id', $id);
        return $this->db->delete($this->table);
    }
}
