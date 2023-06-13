 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Serv_category_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function getcatdata()

{

$this->db->select('*');

// $this->db->where('admin_status','Enable');
$query = $this->db->get('service_category');  

         return $query;

}

public function categoryeditModal($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('service_category');
        $this->db->where('serv_cat_id',$id);
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

    public function deletecategory($id)
{
  $this->db->where('serv_cat_id',$id);
  $this->db->delete('service_category');
}


}
