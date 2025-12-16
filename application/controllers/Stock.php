<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Drug_stock_model', 'stock');
        $this->load->model('Drug_model', 'drug');
    }
    public function index()
{
    $data['stocks'] = $this->stock->get_all();
    $this->load->view('stock/index', $data);
}

public function create()
{
    $data['drugs'] = $this->drug->get_all();
    $this->load->view('stock/create', $data);
}

public function detail($id)
{
    $data['stock'] = $this->stock->get_by_id($id);
    $this->load->view('stock/detail', $data);
}


    public function store()
    {
        $post = $this->input->post();

        // Ambil data obat
        $drug = $this->drug->get_by_id($post['drug_id']);

        if (!$drug) {
            show_error('Obat tidak ditemukan');
        }

        // Validasi stok keluar
        if ($post['type'] == 'out' && $drug->stock < $post['quantity']) {
            show_error('Stok tidak mencukupi');
        }

        // ================= TRANSAKSI =================
        $this->db->trans_start();

        // 1. Simpan histori stok
        $this->stock->insert([
            'drug_id'      => $post['drug_id'],
            'type'         => $post['type'], // in / out
            'quantity'     => $post['quantity'],
            'supplier'     => $post['supplier'],
            'batch_number' => $post['batch_number'],
            'date'         => $post['date'],
            'notes'        => $post['notes'],
        ]);

        // 2. Hitung stok baru
        $new_stock = ($post['type'] == 'in')
            ? $drug->stock + $post['quantity']
            : $drug->stock - $post['quantity'];

        // 3. Update stok di tabel drugs
        $this->drug->update($post['drug_id'], [
            'stock' => $new_stock
        ]);

        $this->db->trans_complete();
        // ================= END TRANSAKSI =================

        if ($this->db->trans_status() === FALSE) {
            show_error('Gagal menyimpan stok');
        }

        redirect('stock');

        
    }
}
