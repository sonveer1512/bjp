 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Market_admin_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}



public function masterData()

{

$this->db->select('*');
$this->db->where('admin_role','Marketing');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('master_admin');  

         return $query;

}
public function deletemarketing($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function deleteworkallot($id)
{
  $this->db->where('marketing_id',$id);
  $this->db->delete('work_alloted_list');
}

public function marketingeditttModal($id)
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

}
