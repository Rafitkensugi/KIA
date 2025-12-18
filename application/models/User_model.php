<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_with_roles()
    {
        $this->db->select('u.*, r.role_name');
        $this->db->from($this->table . ' u');
        $this->db->join('roles r', 'r.role_id = u.role_id', 'left');
        $this->db->order_by('u.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->select('u.*, r.role_name');
        $this->db->from($this->table . ' u');
        $this->db->join('roles r', 'r.role_id = u.role_id', 'left');
        $this->db->where('u.user_id', $id);
        return $this->db->get()->row_array();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('user_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('user_id' => $id));
    }

    public function email_exists($email, $exclude_id = null)
    {
        $this->db->where('email', $email);
        if ($exclude_id) {
            $this->db->where('user_id !=', $exclude_id);
        }
        return $this->db->count_all_results($this->table) > 0;
    }
}