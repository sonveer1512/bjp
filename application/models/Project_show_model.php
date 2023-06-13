 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Project_show_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}

public function takeUser($admin_email, $admin_password, $admin_role)

{

$this->db->select('*');

$this->db->from('master_admin');

$this->db->where('admin_email', $admin_email);

$this->db->where('admin_password', $admin_password);

$this->db->where('admin_status', 'Enable');
$this->db->where('admin_role', $admin_role);

$query = $this->db->get();

return $query->num_rows();

}

public function userData($admin_email)

{

$this->db->select('admin_email');



$this->db->where('admin_email', $admin_email);

$query = $this->db->get('master_admin');

return $query->row();

}

public function masterData()

{
	$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
  		if($role == 'Master')
        {
            $this->db->select('*');
            $this->db->where('admin_role','ProjectShowAdmin');
            // $this->db->where('admin_status','Enable');
            $query = $this->db->get('master_admin');  

         return $query;
        }
  		else
        {
         $this->db->select('*');
            $this->db->where('admin_role','ProjectShowAdmin');
             $this->db->where('user_regional_head',$id);
            $query = $this->db->get('master_admin');  
        	 return $query;
        }

}
public function deleteallottedproject($id)
{
  $this->db->where('p_allot_id',$id);
  $this->db->delete('project_allot_show_admin');
}
  
  public function deleteshowadmin($id)
{
 $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function pshoweditmodel($id)
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

    public function allotprojectshowadmin()

{

$this->db->select('*');
//$this->db->where('admin_role','ProjectShowAdmin');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('project_allot_show_admin');  

         return $query;

}

public function projectlist()
{
    $this->db->select('*');
//$this->db->where('admin_role','ProjectShowAdmin');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('projects');  

         return $query;
}

public function allotedprojectlist()
{

    $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

if ($role == 'Master' OR $role == 'Regional') {
      //$this->db->select('*');    
//$this->db->from('project_allot_show_admin');
//$this->db->join('projects', 'master_admin.admin_user_id = projects.created_by');
 //$this->db->where('projects.created_by',$id);
      $this->db->select('*');
        $this->db->from('project_allot_show_admin');
      // $this->db->where('p_show_status !=','Cancel By Admin');

        $query = $this->db->get();
//$query = $this->db->get();
  return $query;
}
else{
      $this->db->select('*');
      $this->db->where('show_admin_id',$id);

      $query = $this->db->get('project_allot_show_admin');


         return $query;

}


}

}
