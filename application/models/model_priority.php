<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_priority extends CI_Model {

  public function __construct() {
    parent::__construct();
  }
  
  public function priority_by_id($id) {
    $where = array(
      'id' => $id
    );
    
    $query = $this->db->get_where('priority', $where);
    
    if($query->num_rows() == 1) {
      return $query->row();
    } else {
      return FALSE;
    }
  }

}