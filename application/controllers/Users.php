<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$this->load->model('Users_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['subadminData'] = $this->Users_model->userdata();
          $data['useruploaddata'] = $this->Users_model->useruploaddata();
           $data['customerlist'] = $this->Users_model->customerlist();
           $data['customerdocs'] = $this->Users_model->customerdocs();
		return $this->load->view('admin/users/users',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	
	public function addcustomer()
	{



  		$cus_name=$this->input->post('cus_name');
        $cus_email=$this->input->post('cus_email');
        $cus_password=$this->input->post('cus_password');
        $password = md5($cus_password);
        $cus_contact=$this->input->post('cus_contact');
        $cus_select=$this->input->post('cus_select');
        $cus_address=$this->input->post('cus_address');


        //check mail

        $this->db->where('admin_email',$cus_email);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       

         $insertData = array('admin_name'=>$cus_name,
								'admin_email'=>$cus_email,
								'admin_password'=>$password,
								'admin_contact'=>$cus_contact,
								'admin_role'=>$cus_select,
								'admin_address'=>$cus_address
           	 );
           $insertUser =  $this->db->insert('master_admin',$insertData);

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

	public function deletecusadmin($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Users_model->deletecusadmin($id);
    redirect('Users');
}


public function getcurpassword()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Users_model->subadmineditmodel($id);

        
		$this->load->view('admin/subadmin/subadmineditmodel',$data);

}


public function updatecusadmin()
{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		 $cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
         $npassword = md5($new_password);
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('admin_password',$cpassword);
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
 public function update()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        $accept_status  = $_REQUEST['accept_status']; 
     

      	$update = array(
        'admin_status'  => $accept_status
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect('Subadmin', 'refresh');
      
    }

    public function customeredit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Users_model->customereditmodel($id);

        
		$this->load->view('admin/users/usereditmodal',$data);

}

public function updatecustomer()
{
		$id =  $this->input->post('admin_user_id'); 
		$cus_name=$this->input->post('cus_name');
        $cus_email=$this->input->post('cus_email');      
        $cus_contact=$this->input->post('cus_contact');
        $cus_address=$this->input->post('cus_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$cus_name,
								'admin_email'=>$cus_email,
								
								'admin_contact'=>$cus_contact,
								'updated_at' => $date,
								'admin_address'=>$cus_address
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

	public function uploaddata()
	{
		
        
        require_once APPPATH . "./third_party/PHPExcel.php";
        $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;
    
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $flag = true;
            $i=0;

            foreach ($allDataInSheet as $value) {
                $inserdata['user_upload_name'] = $value['B'];
                $inserdata['user_upload_email'] = $value['C'];
                $inserdata['user_upload_contact'] = $value['E'];
                $inserdata['user_upload_address'] = $value['D'];
              $inserdata['user_data_uploaded_by'] = $id;

                $this->db->insert('user_data', $inserdata);
                $i++;
            } 
          
         redirect('Users', 'refresh');


          
        } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
 }
  
  
  
  public function useruploaddata()
	{

		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

  		$cus_name=$this->input->post('cus_up_nme');
        $cus_data=$this->input->post('cus_up_data');
     $cus_data_name=$this->input->post('cus_up_data_name');
        
         date_default_timezone_set('Asia/Kolkata');
    	$date = date('d-m-Y H:i A');

       if($_FILES['cus_up_data']['name'] != "")
    {
      $path_parts = pathinfo($_FILES['cus_up_data']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
      $imgname=$image_path;

      $source =  $_FILES['cus_up_data']['tmp_name'];      
      $originalpath  = "webupload/customerdata".$imgname;
     
      move_uploaded_file($source,$originalpath);    
      
    }
    
    if($role == 'Master')
    {
	 		 $insertData = array('customer_id'=>$cus_name,
          						'customer_docs' =>$imgname,
                                 'cu_docs_name' =>$cus_data_name,
								'uploaded_by'=>$id
				);

				$insertUser =  $this->db->insert('customer_docs',$insertData);
      			
        
 		 }
    else{
    			$insertData = array('customer_id'=>$id,
          						'customer_docs' =>$imgname,
                                      'cu_docs_name' =>$cus_data_name,
								'uploaded_by'=>$id
				);
    			
    	}
    
    if($insertData)
		 		{
				echo json_encode(['done'=>'1']);

				

					
				}
	 		else
				{
	 			echo json_encode(['done'=>'0']);

			}
     }

	 public function updatesubadmi()
{

		$id =  $this->input->post('admin_user_id'); 
		$sub_name=$this->input->post('admin_name');
        $sub_email=$this->input->post('admin_email');
      
        $sub_contact=$this->input->post('admin_contact');
        $sub_select=$this->input->post('admin_role');
        $sub_address=$this->input->post('admin_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'updated_at'=>$date,
								'admin_address'=>$sub_address
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


}
