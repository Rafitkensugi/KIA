<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model
{
    protected $table = 'roles';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('role_id' => $id))->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('role_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('role_id' => $id));
    }

    public function role_exists($role_name, $exclude_id = null)
    {
        $this->db->where('role_name', $role_name);
        if ($exclude_id) {
            $this->db->where('role_id !=', $exclude_id);
        }
        return $this->db->count_all_results($this->table) > 0;
    }

    // Untuk dropdown
    public function get_role_options()
    {
        $query = $this->db->select('role_id, role_name')->get($this->table);
        $options = array();
        foreach ($query->result() as $row) {
            $options[$row->role_id] = $row->role_name;
        }
        return $options;
    }
}