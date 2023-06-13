<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gram extends CI_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Subadmin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}


	public function index($offset = null)
	{
      
     

		if ($this->session->userdata('pmsadmin') == true) {
			$data['grampanchayat'] = $this->Subadmin_model->list_common('grampanchyat');
         $data['panchayatsamiti'] = $this->Subadmin_model->list_common('pachayatsimiti');
          
           $gramdata = array();
           $limit = 100;
           $offset = (empty($offset) || $offset == 1) ? '0' : ($offset - 1) * ($limit);
          $gramdatapagination = $this->Subadmin_model->gramdata('gramdetail',$limit,$offset);
         
          $total = $this->Subadmin_model->gramdata('gramdetail');
           if(!empty($gramdatapagination)) {
                foreach ($gramdatapagination as $value) {
                    array_push($gramdata, array('id' => $value['id'],'gramname' => $value['gramname'], 'panchayatsimit' => $value['panchayatsimit'], 'grampanchyat_id' => $value['grampanchyat_id']));
                }
            }

            $data['count'] = count($total);
            $data['gramdata'] = $gramdata;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
         	
        
        
			return $this->load->view('admin/gram/list',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
	public function addgram()
	{
		

  		$pan_sam_name=$this->input->post('pan_sam_name');
        $panchayat=$this->input->post('panchayat');
      $gram_pan_name=$this->input->post('gram_pan_name');
        $gram_name=$this->input->post('gram_name');
      $this->db->where('gramname',$gram_name);
      $this->db->where('panchayat_id','1');
    	$query = $this->db->get('gramdetail');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       

         $insertData = array('gramname'=>$gram_name,
								'panchayat_id'=>$panchayat,
								'panchayatsimit'=>$pan_sam_name,
                             'grampanchyat_id'=>$gram_pan_name
								
           	 );
            
              
         
           $insertUser =  $this->db->insert('gramdetail',$insertData);
           
          

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
    $this->Subadmin_model->deletegram($id);
    redirect('gram');
}

public function edit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Subadmin_model->editgram($id);
   $data['panchayatsamiti'] = $this->Subadmin_model->list_common_where3('pachayatsimiti','panchayat','1');
  $data['grampanchayat'] = $this->Subadmin_model->list_common_where3('grampanchyat','panchayat','1');

        
		$this->load->view('admin/gram/edit',$data);

}

public function update()
{

		$id =  $this->input->post('id'); 
		$pan_sam_name=$this->input->post('pan_sam_name');
       
      $gram_pan_name=$this->input->post('gram_pan_name');
        $gram_name=$this->input->post('gram_name');

         $updatedata = array('gramname'=>$gram_name,
								
								'panchayatsimit'=>$pan_sam_name,
                             'grampanchyat_id'=>$gram_pan_name
								
           	 );

 
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('gramdetail',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
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

