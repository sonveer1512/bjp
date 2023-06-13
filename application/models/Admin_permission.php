 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Admin_permission extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function getadminroles()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('pms_admin_role');  

         return $query;

}

public function getcategory()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('sidebar_subtrees');  

         return $query;

}

public function depadmineditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


    public function deletecalleradmin($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function callereditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


public function getPermission($id) {
   $this->db->select('*');
   $this->db->from('role_permission');
   $this->db->where('role_id',$id);
   $query = $this->db->get();

   return $query->result_array();
}



}
