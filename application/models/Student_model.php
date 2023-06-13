 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Student_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}

  
  public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
    	
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
}
  public function list_commons($table,$limit = null, $offset = null){
		$this->db->select('*');
 		$this->db->from($table);
    	if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		  }
    	$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
}
  
  public function list_common_count($table)
  {
  		$this->db->select('*');
 		$this->db->from($table);
    	$this->db->where('flag','0');
    	$query = $this->db->get();
      	$result = $query->num_rows();
      	return $result;
  }
   public function list_common_count1($table,$where,$id)
  {
  		$this->db->select('*');
 		$this->db->from($table);
     	$this->db->where($where,$id);
    	$this->db->where('flag','0');
    	$query = $this->db->get();
      	$result = $query->num_rows();
      	return $result;
  }
  
  public function list_common_newupload($table)
  {
  		$this->db->select('distinct(booth_no)');
 		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function list_common_for_filter($table,$data)
  {
  		$this->db->select('distinct('.$data.')');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function list_common_where3($table,$where,$id){
		$this->db->select('*');
		$this->db->where($where,$id);
    	$this->db->where('flag','0');
		$this->db->order_by('id','asc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
  public function get_booth($table,$where,$id)
  {
  		$this->db->select('distinct(booth_select)');
		$this->db->where($where,$id);
    	$this->db->where('flag','0');
		$this->db->order_by('id','asc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function get_filter_data($table,$booth_no,$gram_pan_id)
  {
  		$this->db->select('*');
		if(!empty($booth_no))
        {
        	$this->db->where('booth_select',$booth_no);
        }
    
    	if(!empty($gram_pan_id))
        {
        	$this->db->where('gram_panchayat_id',$gram_pan_id);
        }
    	$this->db->where('flag','0');
		$this->db->order_by('id','asc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function get_filter_name_contact($string,$gram_pan_id,$booth_no)
  {
  		$this->db->select('*');
		$this->db->from('newuploadeddata');
    	if(!empty($booth_no))
        {
        	$this->db->where('booth_select',$booth_no);
        }
    
    	if(!empty($gram_pan_id))
        {
        	$this->db->where('gram_panchayat_id',$gram_pan_id);
        }
		$this->db->like('name',$string);
    	$this->db->or_like('contact',$string);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function data_after_search($table,$booth_no,$gram_pan_id,$items)
	{
		$this->db->select('*');
    	if(!empty($booth_no))
        {
        	$this->db->where('booth_select',$booth_no);
        }
    
    	if(!empty($gram_pan_id))
        {
        	$this->db->where('gram_panchayat_id',$gram_pan_id);
        }
		$this->db->where('name', $items);
		if(is_numeric($items)){
		$this->db->or_where('contact', $items);
		}
		$this->db->order_by('id', 'asc');
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
  public function delete_manager($table,$id,$data)
  {
    $this->db->where('id',$id);
	$this->db->update($table,$data);
	return true;
  
  }
	  public function get_filter_data_verify($table,$data,$unverify_id)
  {
  		$this->db->select('*');
       	$this->db->from($table);
    	$this->db->where('flag','0');
        $this->db->where($data,$unverify_id);
		$this->db->order_by('id','asc');			
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function getPaginatedData($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;
        $this->db->limit($perPage, $offset);
        $query = $this->db->get('student_data');
		$result = $query->result_array();
		return $result;
        //return $query->result();
    }


   
}


