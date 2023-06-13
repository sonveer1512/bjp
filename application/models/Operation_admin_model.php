 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Operation_admin_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function masterData()

{

$this->db->select('*');
$this->db->where('admin_role','Operation');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('master_admin');  

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


    public function deleteoperation($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function operadmineditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


}
