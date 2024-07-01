<?php

class User extends CI_Model {

  private $table = 'users';

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get() {
    $query = $this->db->order_by("created_at", "desc")->get($this->table);
    // echo $this->db->queries[0]; exit;
    return $query;
  }

  public function insert($data=array()) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($data=array(), $id="") {
    $this->db->where("id", $id);
    return $this->db->update($this->table, $data);
  }

  public function delete($id=0) {
    $this->db->where("id", $id);
    return $this->db->delete($this->table);
  }

}