<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    protected $table = 'transactions';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_with_details()
    {
        $this->db->select('
            t.*, 
            r.reg_code, r.visit_date,
            CASE 
                WHEN r.patient_type = "mother" THEN pm.name
                WHEN r.patient_type = "child" THEN pc.name
            END as patient_name
        ');
        $this->db->from($this->table . ' t');
        $this->db->join('registrations r', 'r.reg_id = t.reg_id', 'left');
        $this->db->join('patients_mother pm', 'pm.mother_id = r.mother_id', 'left');
        $this->db->join('patients_child pc', 'pc.child_id = r.child_id', 'left');
        $this->db->order_by('t.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->select('
            t.*, 
            r.reg_code, r.patient_type, r.visit_date,
            pm.name as mother_name,
            pc.name as child_name
        ');
        $this->db->from($this->table . ' t');
        $this->db->join('registrations r', 'r.reg_id = t.reg_id', 'left');
        $this->db->join('patients_mother pm', 'pm.mother_id = r.mother_id', 'left');
        $this->db->join('patients_child pc', 'pc.child_id = r.child_id', 'left');
        $this->db->where('t.trx_id', $id);
        return $this->db->get()->row_array();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('trx_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('trx_id' => $id));
    }

    // Cek apakah registrasi sudah memiliki transaksi
    public function transaction_exists_by_reg($reg_id)
    {
        return $this->db->where('reg_id', $reg_id)->count_all_results($this->table) > 0;
    }

    // Ambil registrasi yang belum punya transaksi
    public function get_unpaid_registrations()
    {
        $sql = "
            SELECT r.*, 
                CASE 
                    WHEN r.patient_type = 'mother' THEN pm.name 
                    ELSE pc.name 
                END as patient_name
            FROM registrations r
            LEFT JOIN patients_mother pm ON r.mother_id = pm.mother_id
            LEFT JOIN patients_child pc ON r.child_id = pc.child_id
            LEFT JOIN transactions t ON r.reg_id = t.reg_id
            WHERE t.trx_id IS NULL
        ";
        return $this->db->query($sql)->result_array();
    }
}