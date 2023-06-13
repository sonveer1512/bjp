<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panchayatsamiti extends CI_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Subadmin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}


	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['panchayatsamiti'] = $this->Subadmin_model->list_common_where3('pachayatsimiti','panchayat','1');
         
			return $this->load->view('admin/panchayatsamiti/list',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
	public function addpanchayatsamiti()
	{
  		$pan_sam_name=$this->input->post('pan_sam_name');
        $panchayat=$this->input->post('panchayat');
        $this->db->where('pachayatsimiti',$pan_sam_name);
        $this->db->where('panchayat','1');
    	$query = $this->db->get('pachayatsimiti');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       

         $insertData = array('pachayatsimiti'=>$pan_sam_name,
								'tehsil'=>$pan_sam_name,
								'panchayat'=>$panchayat
								
           	 );
              
         
           $insertUser =  $this->db->insert('pachayatsimiti',$insertData);
           
          

           if($insertUser)
				{
             		
					echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	}

          
  
        
	}



	public function delete($id)
{
    $id = $this->input->post("id");
    $this->Subadmin_model->deletesubadminpan($id);
    redirect('Panchayatsamiti');
}

public function panchyatasamitiedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Subadmin_model->subadmineditmodel($id);

        
		$this->load->view('admin/panchayatsamiti/edit',$data);

}

public function updatepanchayatsamiti()
{

		 $id =  $this->input->post('id');
		$pan_sam_name=$this->input->post('pan_sam_name');
       

         $updatedata = array('pachayatsimiti'=>$pan_sam_name
								
           	 );
  
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('pachayatsimiti',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}
 public function update()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Enable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Disable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
    public function changesubpass()
{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		 $cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
         $npassword = md5($new_password);
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('admin_password',$cpassword);
        $this->db->where('admin_user_id',$id);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{

    		$updatedata = array(
								'admin_password'=>$npassword,
								
								'updated_at'=>$date
								
           	 );
          
         
           	$insertUser= $this->db->where('admin_user_id',$id);
       		$insertUser= $this->db->update('master_admin',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
				 
        
 	 		

    	}
    	else
    	{

         echo json_encode(['password'=>'0']);
     }
        
       
}


}

