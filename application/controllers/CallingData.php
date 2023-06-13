<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallingData extends MY_Controller {

	
	public function __construct()

{

    parent::__construct();

            $this->load->model('callingData_model');
    }


	public function index()
	{
      	
		if ($this->session->userdata('pmsadmin') == true) {
         	$data['calling'] = $this->callingData_model->list_common('calling_details');
          	return $this->load->view('admin/calling_data/callData',$data); 

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
			$inserdata['gram_panchayat_id']  = $this->input->post('gram_panchayat');  ;
            foreach ($allDataInSheet as $key => $value) {

                if ($key > 1) {
                    if (!empty($value['A'])) {
                        $inserdata['name']  =  $value['B'];
                        $inserdata['father_name'] = $value['C'];
                        $inserdata['class_section'] = $value['D'];
                      	$inserdata['school'] = $value['E'];
                      	$inserdata['contact'] = $value['F'];
                       	$update_data = $this->db->insert('student_data', $inserdata);
                      
                    }
                }

                $i++;
            }
          
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

		$id = $this->input->post('id');
        if($id == 'all')
        {
            $data['student']  = $this->student_model->list_common('student_data');
          $this->load->view('admin/student/filter_data', $data);
        }
   		 $data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
		$data['student']  = $this->student_model->list_common_where3('student_data','gram_panchayat_id',$id);
		$this->load->view('admin/student/filter_data', $data);
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
  
  public function fetch_callingdata_sid()
  {
    echo json_encode(['code'=>200,'status'=>'busy']);
  /*	$sid = $this->input->post('sid'); 
    $call_data = $this->callingData_model->list_common_where3('calling_details','Sid',$sid);
    if(!empty($call_data))
    {
    echo json_encode(['code'=>200,'status'=>$call_data[0]['Status'],'duration'=>$call_data[0]['Duration'],'start_time'=>$call_data[0]['StartTime'],'end_time'=>$call_data[0]['EndTime'],'recording'=>$call_data[0]['RecordingUrl']]);
    }
    else{
    	echo json_encode(['code'=>400,'msg'=>'Call Not Connected']);
    } */
  }
  


}

