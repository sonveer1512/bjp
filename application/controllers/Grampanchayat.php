<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grampanchayat extends CI_Controller {

	
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
            $grampanchayatdata = array();
          
            $limit = 50;
            $offset = (empty($offset) || $offset == 1) ? '0' : ($offset - 1) * ($limit);
            $grampanchayatdatapagination = $this->Subadmin_model->grampanchayatdata('grampanchyat',$limit,$offset);
          
          	$total = $this->Subadmin_model->grampanchayatdata('grampanchyat');
            
            if(!empty($grampanchayatdatapagination)) {
                foreach ($grampanchayatdatapagination as $value) {
                    array_push($grampanchayatdata, array('id' => $value['id'],'gram_panchyat' => $value['gram_panchyat'], 'panchyatsimit' => $value['panchyatsimit']));
                }
            }

            $data['count'] = count($total);
            $data['grampanchhayatdatapagination'] = $grampanchayatdata;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
        	
			return $this->load->view('admin/grampanchayat/list',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
	public function addgrampanchayat()
	{
		

  		$pan_sam_name=$this->input->post('pan_sam_name');
        $panchayat=$this->input->post('panchayat');
      $gram_pan_name=$this->input->post('gram_pan_name');
      $this->db->where('gram_panchyat',$gram_pan_name);
      $this->db->where('panchayat','1');
    	$query = $this->db->get('grampanchyat');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       

         $insertData = array('gram_panchyat'=>$gram_pan_name,
								'panchyatsimit'=>$pan_sam_name,
								'panchayat'=>$panchayat
								
           	 );
              
         
           $insertUser =  $this->db->insert('grampanchyat',$insertData);
           
          

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



	public function deletesubadmin($id)
{
    $id = $this->input->post("id");
    $this->Subadmin_model->deletesubadmin1($id);
    redirect('grampanchayat');
}

public function edit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Subadmin_model->subadmineditmodel1($id);
  $data['panchayatsamiti'] = $this->Subadmin_model->list_common_where3('pachayatsimiti','panchayat','1');
  
 

        
		$this->load->view('admin/grampanchayat/edit',$data);

}

public function update()
{

		$id =  $this->input->post('id'); 
		$pan_sam_name=$this->input->post('pan_sam_name');
       
      $gram_pan_name=$this->input->post('gram_pan_name');

           $updatedata = array('gram_panchyat'=>$gram_pan_name,
								'panchyatsimit'=>$pan_sam_name
								
								
           	 );
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('grampanchyat',$updatedata);
      
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

