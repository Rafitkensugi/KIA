<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function get_all() {
        return $this->db->get('settings')->result();
    }

    public function get_by_key($key) {
        return $this->db
            ->get_where('settings', ['setting_key' => $key])
            ->row();
    }

    public function update($key, $value) {
        $this->db->where('setting_key', $key);
        return $this->db->update('settings', [
            'setting_value' => $value
        ]);
    }
}
