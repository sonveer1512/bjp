<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()

{

parent::__construct();

		$this->load->model('Serv_category_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['servCatData'] = $this->Serv_category_model->getcatdata();
		return $this->load->view('admin/services/category',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function addcategory()
	{



  		$cat_name=$this->input->post('cat_name');
       


        //check mail

     //    $this->db->where('admin_email',$exadminemail);
    	// $query = $this->db->get('master_admin');

    	// if ($query->num_rows() > 0)
    	// {
        
 	 		// echo json_encode(['email'=>'0']);

    	// }
    	// 	else

    	// {
       

         $insertData = array('ser_cat_name'=>$cat_name
								
           	 );
           $insertUser =  $this->db->insert('service_category',$insertData);

           if($insertUser)
				{
					echo json_encode(['done'=>'1']);


					
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	//}

          
  
        
	}

	public function deletecategory($id)
{
    $id = $this->input->post("serv_cat_id");

    $this->Serv_category_model->deletecategory($id);
    redirect('Category');
}



public function categoryedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Serv_category_model->categoryeditModal($id);

        
		$this->load->view('admin/services/categoryeditmodal',$data);

}

public function updatecategory()
{
		$id =  $this->input->post('serv_cat_id'); 
		$cat_name=$this->input->post('cat_name');
        
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('ser_cat_name'=>$cat_name
								
           	 );
          
         
           	$insertUser= $this->db->where('serv_cat_id',$id);
       		$insertUser= $this->db->update('service_category',$updatedata);
      
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
        

        $serv_cat_id  = $_REQUEST['serv_cat_id'];
        
     

      	$update = array(
        'serv_cat_status'  => 'Enable'
        );

        $this->db->where('serv_cat_id',$serv_cat_id);
        $this->db->update('service_category',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }




    public function updatedisable()
    {
        

        $serv_cat_id = $_REQUEST['serv_cat_id'];
        
     

      	$update = array(
        'serv_cat_status'  => 'Disable'
        );

        $this->db->where('serv_cat_id',$serv_cat_id);
        $this->db->update('service_category',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


	
	

}
