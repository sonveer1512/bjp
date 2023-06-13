<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentData extends MY_Controller {

	
	public function __construct()

{

    parent::__construct();

            $this->load->model('student_model');
    }


	public function index()
	{
		if ($this->session->userdata('pmsadmin') == true) {
         	$data['gram_panchayat'] = $this->student_model->list_common('grampanchyat');
          	$data['filter_gram'] = $this->student_model->list_common_for_filter('student_data','gram_panchayat_id');
			//$data['student'] = $this->student_model->list_common('student_data');
          	$data['student'] = $this->getData(1, 10);
          	return $this->load->view('admin/student/student_list',$data); 

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
                        $inserdata['name']  =  $value['E'];
                        $inserdata['father_name'] = $value['F'];
                        $inserdata['class_section'] = $value['B'];
                      	/*$inserdata['school'] = $value['Q'];*/
                      	$inserdata['contact'] = $value['K'];
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
  
  
  public function fetchData()
    {
        $page = $this->input->get('page');
        $perPage = 10; // Number of items per page

        $data = $this->getData($page, $perPage);

        echo json_encode($data);
    }

    private function getData($page, $perPage)
    {
        $data = $this->student_model->getPaginatedData($page, $perPage);
        return $data;
    }


}

