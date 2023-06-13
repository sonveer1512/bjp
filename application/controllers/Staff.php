<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

      $this->load->model('Caller_model');
      $this->load->helper('url');

      $this->load->helper('email');
}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['staff'] = $this->Caller_model->list_common('master_admin');
			return $this->load->view('admin/caller_admin/list',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}	
	}
  
  public function show_user_access()
  {
  	$id = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    $data['access_data'] = $this->Caller_model->list_common_where3('caller_admin','caller_admin_id',$id);
    return $this->load->view('admin/caller_admin/access_details',$data); 
  }
  
   
  

	public function addsubadmin()
	{
		$sess = $this->session->userdata('pmsadmin');
       	$id = $sess['id'];
        $role = $sess['role'];
      	$name = $sess['name'];


  		$sub_name=$this->input->post('sub_name');
        $sub_email=$this->input->post('sub_email');
        $sub_password=$this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact=$this->input->post('sub_contact');
        $sub_select=$this->input->post('user_role');
        $sub_address=$this->input->post('sub_address');
        $this->db->where('admin_email',$sub_email);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       		
		
         $insertData = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
                            
								'admin_address'=>$sub_address
           	 );
              
         
           $insertUser =  $this->db->insert('master_admin',$insertData);
           $last_id = $this->db->insert_id();
           if($sub_select == 'Executive')
            {
             if(!empty( $this->input->post('jila')))
             {
				$insertData_caller['zila'] = $this->input->post('jila');
             }
             if(!empty( $this->input->post('vidhansabha_id')))
             {
				$insertData_caller['vidhansabha'] = $this->input->post('vidhansabha_id');
             }
             if(!empty( $this->input->post('panchayat_id')))
             {
				$insertData_caller['panchayat_nagarpalika'] = $this->input->post('panchayat_id');
             }
             if(!empty( $this->input->post('mandal_id')))
             {
				$insertData_caller['mandal'] = $this->input->post('mandal_id');
             }
             if(!empty( $this->input->post('gram_id')))
             {
				$insertData_caller['gram_panchayat'] = $this->input->post('gram_id');
             }
             if(!empty( $this->input->post('booth_id')))
             {
				$insertData_caller['booth'] = $this->input->post('booth_id');
             }
			$insertData_caller['caller_admin_id'] = $last_id;
             $insertUser =  $this->db->insert('caller_admin',$insertData_caller);

            }
            
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

public function staff_edit()
{
	$id =  $this->input->post('id');
  	$data['role'] = $role =  $this->input->post('role');
  	if($role == 'Executive'){
    	$data['content'] = $this->Caller_model->list_common_join($id);
      	$this->load->view('admin/caller_admin/edit_executive',$data);
    }
 	else{
    
    $data['content'] = $this->Caller_model->list_common_where3('master_admin','admin_user_id',$id);
  	$this->load->view('admin/caller_admin/edit_all',$data);
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
 public function updatestatus()
    {
        

        $admin_user_id = $this->input->post('admin_user_id'); 
        $status = $this->input->post('status'); 
     	if($status == 'Disabled')
        {
          $update['admin_status'] = 'Disable';
        }
   		else{
   		$update['admin_status'] = 'Enable';
   		}
   
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

public function searchbyname()
{
	$postData = $this->input->post();

      // Get data
      $data = $this->Subadmin_model->getname($postData);

      echo json_encode($data);
}

function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $data[] = array(
      'CustomerName'  => $customer_name,
      'Address'   => $address,
      'City'    => $city,
      'PostalCode'  => $postal_code,
      'Country'   => $country
     );
    }
   }
   //$this->excel_import_model->insert($data);
   echo 'Data Imported successfully';
  } 
 }

}

