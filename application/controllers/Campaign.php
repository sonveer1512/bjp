<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

      $this->load->model('Caller_model');
      $this->load->model('student_model');
      $this->load->helper('url');

      $this->load->helper('email');
}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['item'] = $this->Caller_model->list_common_1('campaign');
			return $this->load->view('admin/campaign/list',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}	
	}
  
  public function addcamp()
	{
		$title = $this->input->post('title');
        $date_time = $this->input->post('date_time');
        $description = $this->input->post('description');
        $this->db->where('title',$title);
    	$this->db->where('date_time',$date_time);
    	$query = $this->db->get('campaign');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['exist'=>'0']);

    	}
    		else

    	{
       	
         $insertData = array('title'=>$title,
								'date_time'=>$date_time,
								'discription'=>$description,
								
           	 );
           $insertUser =  $this->db->insert('campaign',$insertData);
              echo json_encode(['done' => '1']);
          
            }
        
	}



	public function deletestaff()
{
    $id = $this->input->post("admin_user_id");
     $updatedata['flag'] = 2;
    $insertUser= $this->db->where('admin_user_id',$id);
    $insertUser= $this->db->update('master_admin',$updatedata);
    redirect('staff');
}

public function edit()
{
	$id =  $this->input->post('id');
  	$data['content'] = $this->Caller_model->list_common_where3('campaign','id',$id);
  	$this->load->view('admin/campaign/edit',$data);
  
}

        public function camp_details($id,$offset = null)
      {
          $data['filter_gram'] = $this->student_model->list_common_for_filter('calling_details','campaign_id');
           $limit = 10;
          	$data['id'] = $id;
           $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
            $data['content'] = $this->Caller_model->list_common_where3('calling_details','campaign_id',$id);
          	$call_abort = $this->Caller_model->count_call_abort('calling_details','call_abort','1');
          	$data['count_call_abort'] = $call_abort;
          	$call_initiate = $this->Caller_model->count_call_abort('calling_details','campaign_id',$id);
          	$call_initiate_left = $this->Caller_model->count_call_status_not('calling_details','campaign_id',$id);
          	$data['count_call_initiate'] = $call_initiate;
          	$data['count_call_status_not'] = $call_initiate_left;
          	$get_name = $this->Caller_model->list_common_where3('campaign','id',$id);
          	$data['name'] = $get_name[0]['title'];
            $total = $this->student_model->list_common_count1('calling_details', 'campaign_id', $id);
           $data['count'] = $total;
          $this->load->view('admin/campaign/camp_details',$data);

      }
public function update()
{

		$id =  $this->input->post('id'); 
		$title = $this->input->post('title');
        $date_time = $this->input->post('date_time');
        $description = $this->input->post('description');

         $updatedata =array('title'=>$title,
								'date_time'=>$date_time,
								'discription'=>$description,
								
           	 );
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('campaign',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}
 public function update_status()
    {
        

        $id = $this->input->post('id'); 
        $status = $this->input->post('status'); 
     	if($status == 'Delete')
        {
          $update['flag'] = '2';
        }
   		if($status == 'Active')
        {
          $update['flag'] = '0';
        }
   		if($status == 'InActive')
        {
          $update['flag'] = '1';
        }
   		
   
        $this->db->where('id',$id);
        $this->db->update('campaign',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
  function call_filter_data(){
    	
    	$id = $this->input->post('id');
   		$is_verify = $this->input->post('is_verify'); 
    	$verify_status = $this->input->post('var_st'); 
    	$not_verify_status = $this->input->post('var_st_not'); 
    	$is_verify_satus = $this->input->post('is_verify_satus');
    	if($is_verify == 'all'){
    	$is_verify ='';
        $data['content'] = $this->Caller_model->get_call_filter_data('calling_details','is_verified',$is_verify,'campaign_id',$id);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
    	}
    	
    	if($is_verify != 'all' && $verify_status == 'all')
        {
        $is_verify = $this->input->post('is_verify'); 
        $verify_status = '';
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        }
    
    	if($is_verify == 'Not Verify' && $not_verify_status == 'all')
        {
        $is_verify = $this->input->post('is_verify'); 
        $not_verify_status = '';
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$not_verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        }
    	
    	if($is_verify == 'Not Verify' && $not_verify_status != 'all')
        {
        	$is_verify = $this->input->post('is_verify'); 
        $not_verify_status = $this->input->post('var_st_not'); 
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$not_verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        	
        }
    
    	if($is_verify == 'Verify' && $verify_status == 'all')
        {
        $is_verify = $this->input->post('is_verify'); 
        $verify_status = '';
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        }
    	
    	if($is_verify == 'Verify' && $verify_status != 'all')
    	{
        	$is_verify = $this->input->post('is_verify'); 
        $verify_status = $this->input->post('var_st'); 
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        	
        }
    	
    	if($verify_status == 'all')
        {
         $verify_status = '';
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        }
    
    	if($verify_status != 'all')
        {
         $verify_status = $this->input->post('var_st');
        $data['content'] = $this->Caller_model->get_call_filter_data_sub('calling_details','is_verified',$is_verify,'campaign_id',$id,'is_verify_satus',$verify_status);
      	return $this->load->view('admin/campaign/call_verify_data',$data); 
        }
    	
    
  }
}

