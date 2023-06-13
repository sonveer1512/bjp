 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Department_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function departdata()

{
    $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
if ($role == 'Master') {
      $this->db->select('*');
$this->db->where('admin_role','Project Manager');
 //$this->db->where('project_manager_created_by',$id);
$query = $this->db->get('master_admin');  

         return $query;
}
else{

$this->db->select('*');
$this->db->where('admin_role','Project Manager');
 $this->db->where('project_manager_created_by',$id);
$query1 = $this->db->get('master_admin');  

         return $query1;

}
}

public function getregionalhead()
{
     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_role','Regional');
        $this->db->where('admin_status','Enable');
        $query = $this->db->get();

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
function updaterecords($id,$updatedata)
    {
        $query="UPDATE `master` 
        SET `name`='$name',
        `email`='$email',
        `phone`='$phone',
        `city`='$city' WHERE id=$id";
        $this->db->query($query);
    }

    public function deletedepadmin($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

}
