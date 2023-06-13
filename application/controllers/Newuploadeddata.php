<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newuploadeddata extends MY_Controller {

	
	public function __construct()

{

    parent::__construct();

            $this->load->model('student_model');
             $this->load->model('Caller_model');
    }


	public function index($offset = null)
	{
      	
		if ($this->session->userdata('pmsadmin') == true) {
          	 $limit = 500;
          	$offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
         	$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
          	$data['booth_no'] = $this->student_model->list_common_newupload('data2');
          	$data['filter_gram'] = $this->student_model->list_common_for_filter('newuploadeddata','gram_panchayat_id');
          	$data['filter_booth'] = $this->student_model->list_common_for_filter('newuploadeddata','booth_select');
			$data['student'] = $this->student_model->list_commons('newuploadeddata',$limit, $offset);
          	$total = $this->student_model->list_common_count('newuploadeddata', 'flag', '0');
          	$data['count'] = $total;
          	$data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
          	
          	return $this->load->view('admin/newuploaded/student_list',$data); 

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
  
	public function upload()
    {
        error_reporting(0);
        require_once APPPATH . "./third_party/PHPExcel.php";
        $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
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
            $i = 0;
			$inserdata['gram_panchayat_id']  = $this->input->post('gram_panchayat');
          	$inserdata['booth_select']  = $this->input->post('booth_no');
          
            foreach ($allDataInSheet as $key => $value) {

                if ($key >= 0) {
                   
                    if (!empty($value['A'])) {
                     
                      $inserdata['name']  =  $value['B'];
                        $inserdata['father_name'] = $value['C'];
                        $inserdata['gender'] = $value['D'];
                      	$inserdata['age'] = $value['E'];
                      	$inserdata['contact'] = $value['F'];
                      	$inserdata['address'] = $value['G'];
                      	$inserdata['mukhya_gram'] = $value['H'];
						$inserdata['ward_no'] = $value['I'];
                        $inserdata['ward_gram'] = $value['J'];
                        $inserdata['booth_no'] = $value['K'];
                        $inserdata['mohalla'] = $value['M'];
                        $inserdata['house_no'] = $value['N'];
                      	$inserdata['voter_sr_no'] = $value['O'];
                        $inserdata['sub_caste'] = $value['P'];
                        $inserdata['caste'] = $value['Q'];
                      
                       /* 	
                      	$inserdata['mukhya_gram'] = $value['A'];
                      	$inserdata['name']  =  $value['B'];
                      	$inserdata['contact'] = $value['C'];
                      	$inserdata['address'] = $value['D'];*/
                      
                       	$update_data = $this->db->insert('newuploadeddata', $inserdata);
                      
                    }
                }
              

                $i++;
            }
          	$updatedata2['flag'] = 2;
          	$update_data = $this->db->where('contact', '');
        	$update_data = $this->db->update('newuploadeddata', $updatedata2);
          
          if($update_data)
          {
          echo json_encode(['inserted' => 1]);
          }
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
    }
  
  
  public function filter()
	{

		$gram_pan_id = $this->input->post('gram_pan_id');
    	$booth_no = $this->input->post('booth_no');
        if($gram_pan_id == 'all' && $booth_no == 'all')
        {
           $data['student']  = $this->student_model->list_common('newuploadeddata');
          $this->load->view('admin/newuploaded/filter_data', $data);
        }
    else if($gram_pan_id == 'all'){
      
      		$gram_pan_id = '';	
   		 $data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->get_filter_data('newuploadeddata',$booth_no,$gram_pan_id);
      $this->load->view('admin/newuploaded/filter_data', $data);
    }
    else if($booth_no == 'all'){
    		$booth_no = '';
      		$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->get_filter_data('newuploadeddata',$booth_no,$gram_pan_id);
      	$this->load->view('admin/newuploaded/filter_data', $data);
    }
    else{
    	$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->get_filter_data('newuploadeddata',$booth_no,$gram_pan_id);
      	$this->load->view('admin/newuploaded/filter_data', $data);
    }
    
		
	}
  
  public function get_data_after_search()
  {
    	$gram_pan_id = $this->input->post('gram_pan_id');
    	$booth_no = $this->input->post('booth_no');
    	$items = $this->input->post('items');
    	if($gram_pan_id == 'all' && $booth_no == 'all')
        {
          $gram_pan_id = '';
          $booth_no = '';
  		$data['student'] = $this->student_model->data_after_search('newuploadeddata',$booth_no,$gram_pan_id,$items);
         return $this->load->view('admin/newuploaded/filter_data', $data);
        }
        
    	else if($gram_pan_id == 'all'){
      
      		$gram_pan_id = '';	
   		 $data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->data_after_search('newuploadeddata',$booth_no,$gram_pan_id,$items);
      return $this->load->view('admin/newuploaded/filter_data', $data);
    }
    else if($booth_no == 'all'){
    		$booth_no = '';
      		$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->data_after_search('newuploadeddata',$booth_no,$gram_pan_id,$items);
      	return $this->load->view('admin/newuploaded/filter_data', $data);
    }
    else{
      	$gram_pan_id = '';
          $booth_no = '';
    	$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		 $data['student'] = $booth_data = $this->student_model->data_after_search('newuploadeddata',$booth_no,$gram_pan_id,$items);
      	return $this->load->view('admin/newuploaded/filter_data', $data);
    }
  }
  
  public function get_name_contact()
  {
   $product = array();
        $query = $this->input->post('query');
          $gram_pan_id = $this->input->post('gram_pan_id');
    	  $booth_no = $this->input->post('booth_no');
    		if($gram_pan_id == 'all' && $booth_no == 'all')
            {
              $gram_pan_id = '';
              $booth_no = '';
		    $data = $this->student_model->get_filter_name_contact($query,$gram_pan_id,$booth_no);
            }else{
              $data = $this->student_model->get_filter_name_contact($query,$gram_pan_id,$booth_no);
            }
    	    if (!empty($data)) {
                foreach ($data as $value) {
                    $product[] = $value['name'];
                  	$product[] = $value['contact'];
                }
            }
            
            
    	echo json_encode($product);
        
  }
  
  public function getbooth($id)
  {
  	
        if($id != '0') {
          
           

            $booth_no = $this->student_model->get_booth('newuploadeddata','gram_panchayat_id',$id);

            $output = '<option value="all" selected>All Booth</option>';
            foreach($booth_no as $value) {
             
                $output .= '<option value="'.$value['booth_select'].'">'.$value['booth_select'].'</option>';
            }

            $response = array('status' => true, 'output' => $output);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }   
  
  }
  
    	 
	


	public function delete($id)
{
    $id = $this->input->post("id");
	$data = array(
        'flag'  => '2'
        );
    $this->team_leader_model->delete_team_leader('manager',$id,$data);
    redirect('master');
}

public function openeditmodel()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->manager_model->list_common_where3('manager','id',$id);
		
        
		$this->load->view('admin/master/manager_edit',$data);

}

public function updateteamleader()
{

		$id = $this->input->post('id'); 
		$tl_name=$this->input->post('tl_name');
        $tl_email=$this->input->post('tl_email');
        $tl_contact=$this->input->post('tl_contact');
        $employee_id=$this->input->post('employee_id');
        $tl_department=$this->input->post('tl_department');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('name'=>$tl_name,
								'email'=>$tl_email,
								'contact'=>$tl_contact,
								'emp_id'=>$employee_id,
								'department'=>$tl_department,
						);
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('manager',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}
  
  public function get_comp()
  {
  
    	$data['item'] = $this->Caller_model->list_common_for_call('campaign');
   	return $this->load->view('admin/newuploaded/campaign_list',$data); 
  
  }
  
  public function add_to_compaign()
  {
  	$data_of_add = $this->input->post('fruits');
    $id = $this->input->post('id');
    $count = $notsavedcount = 0;
    foreach($data_of_add as $val)
    {
      	$get_mobile = $this->Caller_model->list_common_where3('newuploadeddata','id',$val);
      	$data['mobile'] = $mobile = $get_mobile[0]['contact'];
      	$data['campaign_id'] = $id;
      	$check_data = $this->Caller_model->list_common_where4('calling_details','campaign_id',$id,'mobile',$mobile);
      
      	if($check_data == 0) {
          $res = $this->db->insert('calling_details',$data);
          $count++;
        }else{
        	$notsavedcount++;
        }
    }
    
    $resp = json_encode(['done'=> '1','msg' => ' कैंपेन में <b>'.$count.'</b> लोग जुड़ चुके हैं।', 'msg2' => ' कैंपेन में <b>'.$notsavedcount.'</b> नंबर्स पहले से जुड़े हैं।' ]);
    
    echo $resp;
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
        
 	 		echo json_encode(['exist'=>'0','msg' => 'कैंपेन पहले से जुड़े हैं |']);

    	}
    		else

    	{
       	$insertData = array('title'=>$title,
								'date_time'=>$date_time,
								'discription'=>$description,
		);
             
           $insertUser =  $this->db->insert('campaign',$insertData);
           $last_id = $this->db->insert_id();
           //$last_id = '1000';
           $data_of_add = $this->input->post('fruits');
          $data_arr = json_decode($data_of_add);
           $count = $notsavedcount = 0;
            foreach($data_arr as $val)
            {
                $get_mobile = $this->Caller_model->list_common_where3('newuploadeddata','id',$val);
                $data['mobile'] = $mobile = $get_mobile[0]['contact'];
                $data['campaign_id'] = $last_id;
                $check_data = $this->Caller_model->list_common_where4('calling_details','campaign_id',$last_id,'mobile',$mobile);

                if($check_data == 0) {
                  $res = $this->db->insert('calling_details',$data);
                  $count++;
                }else{
                    $notsavedcount++;
                }
            }

            $resp = json_encode(['done'=> '1','msg' => ' कैंपेन में <b>'.$count.'</b> लोग जुड़ चुके हैं।', 'msg2' => ' कैंपेन में <b>'.$notsavedcount.'</b> नंबर्स पहले से जुड़े हैं।' ]);

            echo $resp;
			}
  
  }


}

