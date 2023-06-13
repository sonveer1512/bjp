 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Finance_modal extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function masterData()

{

$this->db->select('*');
$this->db->where('admin_role','Finance');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('master_admin');  

         return $query;

}

public function financeeditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


    public function deletefinance($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function designeditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


public function checknotification($time) {
   $this->db->select('*');
   $this->db->from('notification');
   $this->db->where('member_created_at >',$time);
   $query = $this->db->get();
   echo $this->db->last_query();

   return $query->result_array();
}



}
