<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPermission extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Admin_permission');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}


	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['admin'] = $this->Admin_permission->getadminroles();
			$data['category'] = $this->Admin_permission->getcategory();
			return $this->load->view('admin/admin_permission',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}

	



    public function getpermissiondata() {
    	$adminid = $this->input->post('adminid');

    	$data['admin_id'] = $adminid;
    	$data['permission'] = $this->Admin_permission->getPermission($adminid);
    	$data['admin'] = $this->Admin_permission->getadminroles();
		$data['category'] = $this->Admin_permission->getcategory();

    	$this->load->view('admin/admin_permission_ajax',$data);

    }
  
  public function updatepermission()
{
   $admin_select = $this->input->post('admin_select');
   $subtree = $this->input->post('attribute_name');

   date_default_timezone_set('Asia/Kolkata');
   $date = date('d-m-Y H:i A');

   for ($i = 0; $i < count($subtree); ++$i) {

   		$ids = $subtree[$i];
   		$add1 = $this->input->post('can_add_'.$ids);
   		$edit1 = $this->input->post('can_edit_'.$ids);
   		$delete1 = $this->input->post('can_delete_'.$ids);
   		$view1 = $this->input->post('can_view_'.$ids);
   		$changepass1 = $this->input->post('can_change_pass_'.$ids);
   		


		if(!empty($add1)) {     $add = $add1;    }else{ $add = 0; }
	    if(!empty($edit1)) {     $edit = $edit1;    }else{ $edit = 0; }
	    if(!empty($delete1)) {     $delete = $delete1;    }else{ $delete = 0; }
	    if(!empty($view1)) {     $view = $view1;    }else{ $view = 0; }
	    if(!empty($changepass1)) {     $changepass = $changepass1;    }else{ $changepass = 0; }
	    	


	    $updatedata = array(
              
               'can_view' => $view,
               'can_edit' => $edit,
               'can_delete' => $delete,
               'can_add' => $add,
               'can_change_pass' => $changepass,
              
               'updated_at' => $date
            );

	    $this->db->where('role_id',$admin_select);
	    $this->db->where('sidebar_subtree_id',$ids);
    	$query = $this->db->get('role_permission');

    	if ($query->num_rows() > 0) {

    		

 	 		$insertUser = $this->db->where('role_id', $admin_select);
 	 		$insertUser = $this->db->where('sidebar_subtree_id', $ids);
	    	$insertUser = $this->db->update('role_permission', $updatedata);
	    	
     
    	}else{

    		if($add != 0 || $edit != 0 || $view != 0 || $delete != 0 || $changepass != 0 ) {

    			 $updatedata = array(
               'role_id' => $admin_select,
               'sidebar_subtree_id' => $ids,
               'can_view' => $view,
               'can_edit' => $edit,
               'can_delete' => $delete,
               'can_add' => $add,
               'can_change_pass   ' => $changepass,
              
               'created_at' => $date
            );
    			$insertUser = $this->db->insert('role_permission', $updatedata);	
    		}
    	}

    		
   		}
   	

 	if ($insertUser) {
            echo json_encode(['done' => '1']);
         } else {
            echo json_encode(['done' => '0']);
         }
     
 }
}

