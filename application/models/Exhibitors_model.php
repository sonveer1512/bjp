 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Exhibitors_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}



public function userdata()

{
  $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
	 if ($role == 'Master') {
  $this->db->select('*');
  $this->db->from('master_admin a'); 
  $this->db->join('exhibitors e', 'e.master_admin_id=a.admin_user_id');
  $this->db->where('a.admin_role','Exhibitor');
  $query = $this->db->get(); 
  return $query;
     }
   if ($role == 'Regional') {
     
      $this->db->select('*');
  $this->db->from('master_admin a'); 
  $this->db->join('exhibitors e', 'e.master_admin_id=a.admin_user_id');
  $this->db->where('a.admin_role','Exhibitor');
     $this->db->where('a.user_regional_head	',$id);
  $query = $this->db->get(); 
  return $query;
}
}

public function getservicelist()
{

    $this->db->select('*');
    $query = $this->db->get('services');  
    
             return $query;
    
    }
    
public function exhibitoreditmodel($id)
{

   $this->db->select('*');
  $this->db->from('master_admin a'); 
  $this->db->join('exhibitors e', 'e.master_admin_id=a.admin_user_id');
  // $this->db->join('services s', 's.service_id=e.ex_services');
  $this->db->where('e.exhibitors_id',$id);

        $query = $this->db->get();

        return $query->result_array();
}


public function exhibitor_services($id) {
  $this->db->select('service_id');
  $this->db->from('exhibitors_services');
  $this->db->where('exhibitor_id',$id);
  $query = $this->db->get();
  return $query->result_array();
}


function updaterecords($id,$updatedata)
    {
        $query="UPDATE `master` 
        SET `name`='$name',
        `email`='$email',
        `phone`='$phone',
        `city`='$city' WHERE id=$id";
        $this->db->query($query);
    }

    public function deleteexeadmin($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}


}
