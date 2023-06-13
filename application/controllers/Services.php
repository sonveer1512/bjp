<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	public function __construct()

	{
	
	parent::__construct();
			$this->load->model('Service_model');
			$this->load->helper('url');
			 $this->load->library('form_validation');
			  $this->load->library('session');
	}

	public function index()
	{
		 if ($this->session->userdata('pmsadmin') == true) {
			$data['servicesData'] = $this->Service_model->getservicedata();
				$data['servicesDatashow'] = $this->Service_model->servicedatashow();
		return $this->load->view('admin/services/services',$data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

			// public function show()
			// {
			// 	$data['servicesDatashow'] = $this->Service_model->servicedatashow();
			// 	 $this->load->view('admin/services/services',$data);
			// }
			
	
	public function addservice()
	{
  		$service_name=$this->input->post('service_name');
		$service_category=$this->input->post('service_category');
		$service_description= $this->input->post('service_description');
		$service_price= $this->input->post('service_price');
        $insertData = array('service_name'=>$service_name,'service_category'=>$service_category,'service_desc'=>$service_description,'serv_price'=>$service_price);
      // print_r($insertData); exit();
		$insertUser =  $this->db->insert('services',$insertData);
           if($insertUser)
				{
					echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				} 
	}


	
	public function deleteservice($id){
		$id = $this->input->post("service_id");
		$this->Service_model->deleteservices($id);
		redirect('service');
	}


	public function serviceedit()
{
		$id =  $this->input->post('id');
		$data['content'] = $this->Service_model->serviceeditModal($id);
		// print_r(content); die();
		$this->load->view('admin/services/serviceeditmodal',$data);
}


public function updateservice(){
	$id =  $this->input->post('service_id'); 
	$service_name=$this->input->post('service_name');
	$service_category=$this->input->post('service_category');
	$service_desc=$this->input->post('service_desc');

	 date_default_timezone_set('Asia/Kolkata');
	$date = date('d-m-Y H:i A');

	 $updatedata = array('service_name'=>$service_name,'service_category'=>$service_category,'service_desc'=>$service_desc);
		   $insertUser= $this->db->where('service_id',$id);
		   $insertUser= $this->db->update('services',$updatedata);
		 if($insertUser)
			{
				echo json_encode(['inserted'=>'1']);	
			}
			else
			{
				echo json_encode(['inserted'=>'0']);
				 
			}
}
public function deleteservicesss($id)
{
    $id = $this->input->post("service_id");
    $this->Service_model->deleteService($id);
    redirect('Services');
}



public function update()
    {
        

        $service_id  = $_REQUEST['service_id'];
        
     

      	$update = array(
        'service_status'  => 'Enable'
        );

        $this->db->where('service_id',$service_id);
        $this->db->update('services',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }




    public function updatedisable()
    {
        

        $service_id = $_REQUEST['service_id'];
        
     

      	$update = array(
        'service_status'  => 'Disable'
        );

        $this->db->where('service_id',$service_id);
        $this->db->update('services',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
}
	

