<?php



defined('BASEPATH') OR exit('No direct script access allowed');



Class Api_model extends CI_model {

public function getdata($table,$limit,$offset){

    $this->db->select('*');

    $this->db->from($table);

    

    $this->db->limit($limit);

    $this->db->offset($offset);

    $query = $this->db->get();

    $result = $query->result_array();

    // $this->db->last_query($result);

    return $result;

}
  
  
public function list_common_where3($table,$where,$id){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where,$id);
    $this->db->where('flag','0');
    $this->db->order_by('id','asc');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}
  
public function list_common_where4($table,$where,$id){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where,$id);
    $this->db->where('flag','0');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}
  
public function list_common($table){
    $this->db->select('*');
    $this->db->from($table);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function countrow($table)

	{

		$this->db->select('*');

		$this->db->from($table);

		// $this->db->where('flag', '0');

		

		$this->db->order_by('id', 'desc');

		$query = $this->db->get();

		return $query->num_rows();

	}



   



	

}

?>