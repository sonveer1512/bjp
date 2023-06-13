 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class caller_modal extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function userdata()

{
         $this->db->select('*');
        $this->db->from('bjpdetail');      
        $query = $this->db->get();
       
        return $query->result_array();  
}
  
  public function followleaddata()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('caller_follow_lead');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('c_follow_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('caller_follow_lead');  

         return $query;
      }

}

  
   public function followupdate()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('follow_up_data');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('follow_up_created_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('follow_up_data');  

         return $query;
      }

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
  
  public function calleruserupload()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('caller_upload_data');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('c_up_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('caller_upload_data');  

         return $query;
      }

}


}
