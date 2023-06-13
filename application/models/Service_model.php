<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Service_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}
public function getservicedata()
{

    $this->db->select('*');
    //$this->db->where('admin_role','Caller');
    // $this->db->where('admin_status','Enable');
    $query = $this->db->get('service_category');  
    
             return $query;
    
    }

public function updateservicedata($table,$data,$where,$id){
    $this->db->where($where,$id);
    $this->db->update($table,$data);
    $this->db->where('status','0');
    return true;
}
public function deleteservices($id){
    $this->db->where('service_id',$id);
    $this->db->delete('services');
}

public function serviceeditModal($id)
{
     $this->db->select('*');
        $this->db->from('services');
        $this->db->where('service_id',$id);
        $query = $this->db->get();
        return $query->result_array();
}

public function servicedatashow(){
   
   $this->db->select('*');
   $this->db->from('services');
   $this->db->join('service_category', 'services.service_category = service_category.serv_cat_id');
   $query = $this->db->get();
    return $query;

}

public function deleteService($id){
    $this->db->where('service_id',$id);
    $this->db->delete('services');
}
}
