<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallerUploadData extends CI_Controller {

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
      $this->load->model('caller_modal');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['subadminData'] = $this->Users_model->userdata();
          $data['calleruploaddata'] = $this->caller_modal->calleruserupload();
		return $this->load->view('admin/Caller/caller_upload_data',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
	public function callerupload()
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
                $inserdata['c_up_name'] = $value['B'];
                $inserdata['c_up_email'] = $value['C'];
                $inserdata['c_up_contact'] = $value['E'];
                $inserdata['c_up_add'] = $value['D'];
              $inserdata['c_up_uploaded_by'] = $id;
              
              
        $this->db->where('c_up_name',$value['B']);
               $this->db->where('c_up_email',$value['C']);
    	$query = $this->db->get('caller_upload_data');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{

                $this->db->insert('caller_upload_data', $inserdata);
                $i++;
            } 
            }
          
         redirect('CallerUploadData', 'refresh');


          
        } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }

	}
	

}
