<?php
class Diagnosis_model extends CI_Model{
  private $table = 'diagnosis';
  
  public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function get_by_id($diag_id)
    {
        return $this->db->get_where($this->table, ['diag_id' => $diag_id])->row();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function update($diag_id, $data)
    {
        return $this->db->update($this->table, $data, ['diag_id' => $diag_id]);
    }
    public function delete($diag_id)
    {
        return $this->db->delete($this->table, ['diag_id' => $diag_id]);
    }
}
?>