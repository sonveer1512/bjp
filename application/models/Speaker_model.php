 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Speaker_model extends CI_Model

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


public function speakerlist()

{
$sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
	 if ($role == 'Master') {
$this->db->select('*');    
$this->db->from('speaker');
$this->db->join('master_admin', 'speaker.speaker_master_admin_id = master_admin.admin_user_id');
$query = $this->db->get();

         return $query;
     }
  else{
  $this->db->select('*');    
$this->db->from('speaker');
$this->db->join('master_admin', 'speaker.speaker_master_admin_id = master_admin.admin_user_id');
      $this->db->where('master_admin.user_regional_head',$id);
$query = $this->db->get();

         return $query;
  }
}
public function deletespeaker($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}
public  function deletespeakerproject($speakerid){
  $this->db->where('speaker_id',$speakerid);
  $this->db->delete('speaker_project');
}

public function deletespeakerfromspeaker($id)
{
  $this->db->where('speaker_master_admin_id',$id);
  $this->db->delete('speaker');
}

public function speakereditmodal($id)
{
   // $id = $this->input->get("admin_user_id");
        $this->db->select('*');    
        $this->db->from('speaker');
        
        // $this->db->join('projects', 'speaker.speaker_project_id = projects.p_id');
         $this->db->where('speaker_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}
  
  public function speakerprojectdata($id)
{
   // $id = $this->input->get("admin_user_id");
        $this->db->select('*');
        $this->db->from('speaker_project');
        $this->db->join('projects', 'speaker_project.speaker_regional_head = projects.regional_head');
     
    	$this->db->where('speaker_project.speaker_id',$id);
        $query = $this->db->get();
        return $query;
}

public function speaker_project($id) {
  $this->db->select('project_id');
  $this->db->from('speaker_project');
  $this->db->where('speaker_id',$id);
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

}
