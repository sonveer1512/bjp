 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Workallot_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}




public function workallotedData()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('work_alloted_list');  

         return $query->result_array();

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

public function workedit($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('work_alloted_list');
        $this->db->where('work_allot_id',$id);
        $query = $this->db->get();

        
}
public function mytask($id)
{
    
          
          $this->db->select('*');
        $this->db->from('work_alloted_list');
        $this->db->where('marketing_id',$id);
        $query = $this->db->get();
        return $query->result_array();
      
}

public function totalwork($id)
{
    
          
         $querytotal = $this->db->query("SELECT count(work_allot_id) AS total FROM work_alloted_list where marketing_id = '$id'");
    // print_r($query->result());
    return $querytotal->result_array();
      
}

public function totalpending($id)
{
    
          
         $query = $this->db->query("SELECT count(work_allot_id) AS pending FROM work_alloted_list where marketing_id = '$id' and status = 'Pending'");
    // print_r($query->result());
    return $query->result_array();
      
}

public function totalcompleted($id)
{
    
          
         $query = $this->db->query("SELECT count(work_allot_id) AS complete FROM work_alloted_list where marketing_id = '$id' and status = 'Completed'");
    // print_r($query->result());
    return $query->result_array();
      
}

public function totalreject($id)
{
    
          
         $query = $this->db->query("SELECT count(work_allot_id) AS reject FROM work_alloted_list where marketing_id = '$id' and status = 'Cancelled By Admin'");
    // print_r($query->result());
    return $query->result_array();
      
}

public function totalformaster($id)
{
    
          
         $query = $this->db->query("SELECT * FROM work_alloted_list");
    // print_r($query->result());
    return $query->result_array();
      
}

}
