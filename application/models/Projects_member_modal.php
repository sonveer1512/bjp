 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Projects_member_modal extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function pojectdata()

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
$query = $this->db->get('master_admin');  

         return $query;

}
}
public function pojectalloteddata()

{
   $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];


      $this->db->select('*');    
$this->db->from('projects');
$this->db->join('project_member','projects.p_id = project_member.project_id');
$this->db->join('master_admin','project_member.admin_user_id = master_admin.admin_user_id');

 //$this->db->where('projects.created_by',$id);
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

public function getprojectmanager($id)
{
    $response = array();
 
    // Select record
    $this->db->select('admin_user_id,admin_name');
    $this->db->where('project_manager_created_by', $id);
    $q = $this->db->get('master_admin');
    $response = $q->result_array();

    return $response;
}

public function alluser()
{
       $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_role !=','Master');
        $this->db->where('admin_role !=','Regional');
        $this->db->where('admin_role !=','Project Manager');
        $query = $this->db->get();

        return $query;
}
}
