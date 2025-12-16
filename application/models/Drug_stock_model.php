<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_stock_model extends CI_Model {

    private $table = 'drug_stock';

    /**
     * Ambil semua data stok (dengan nama obat)
     */
    public function get_all()
    {
        return $this->db
            ->select('drug_stock.*, drugs.drug_name')
            ->from($this->table)
            ->join('drugs', 'drugs.drug_id = drug_stock.drug_id')
            ->order_by('stock_id', 'DESC')
            ->get()
            ->result();
    }

    /**
     * Ambil data stok berdasarkan ID
     */
    public function get_by_id($id)
    {
        return $this->db
            ->select('drug_stock.*, drugs.drug_name')
            ->from($this->table)
            ->join('drugs', 'drugs.drug_id = drug_stock.drug_id')
            ->where('stock_id', $id)
            ->get()
            ->row();
    }

    /**
     * Ambil riwayat stok berdasarkan obat
     */
    public function get_by_drug($drug_id)
    {
        return $this->db
            ->where('drug_id', $drug_id)
            ->order_by('date', 'DESC')
            ->get($this->table)
            ->result();
    }

    /**
     * Tambah data stok (MASUK / KELUAR)
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Hapus histori stok (jarang dipakai, tapi aman disediakan)
     */
    public function delete($id)
    {
        $this->db->where('stock_id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Hitung total stok berdasarkan histori
     * (opsional, untuk validasi / audit)
     */
    public function calculate_stock($drug_id)
    {
        $this->db->select("
            SUM(
                CASE 
                    WHEN type = 'in' THEN quantity
                    ELSE -quantity
                END
            ) AS total_stock
        ");
        $this->db->where('drug_id', $drug_id);
        $result = $this->db->get($this->table)->row();

        return $result->total_stock ?? 0;
    }
}
