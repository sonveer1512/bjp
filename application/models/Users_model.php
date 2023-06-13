 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Users_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function userdata()

{

$this->db->select('*');
$this->db->where('admin_role','Customer');
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


    public function deletecusadmin($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function customereditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}

public function userupload()

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
  
  public function useruploaddata()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('user_data');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('user_data');  

         return $query;
      }

}
  
   public function customerlist()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
                $this->db->where('admin_role','Customer');
               $query = $this->db->get('master_admin');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('user_created_by',$id);
                $this->db->where('admin_role','Customer');
        
               $query = $this->db->get('master_admin');  

         return $query;
      }

}
  
  public function customerdocs()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_role','Customer');
               $query = $this->db->get('customer_docs');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('uploaded_by',$id);
                //$this->db->where('admin_role','Customer');
        
               $query = $this->db->get('customer_docs');  

         return $query;
      }

}


}
