<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "/libraries/PHPExcel.php";
class Userdata extends CI_Controller
{

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

        $this->load->model('Caller_modal');
        $this->load->model('Department_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('auth');
        $this->load->model('Subadmin_model');
    }


    public function index($offset = null)
    {
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

            $userdatapagination = $this->Subadmin_model->userdata1('bjpdetail', 'flag', '0', $limit, $offset);
          $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
           
          
            $total = $this->Subadmin_model->userdata2('bjpdetail', 'flag', '0');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                $this->load->view('admin/user', $data);
            }
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }






    public function edit($id)
    {
        $data['usereditdata'] = $this->Subadmin_model->list_common('panchayat');
        $data['dharmdata'] = $this->Subadmin_model->list_common('dharm');
        $data['citiesdata'] = $this->Subadmin_model->list_common('cities');
        $data['pachayatsimiti'] = $this->Subadmin_model->list_common('pachayatsimiti');
        $data['grampanchyat6'] = $this->Subadmin_model->list_common('grampanchyat');
        $data['gramp'] = $this->Subadmin_model->list_common('gramdetail');

        // print_r($data['pachayatsimiti']); exit(); 
        // echo $this->db->last_query();
        $data['content'] = $this->Subadmin_model->list_common_where3('bjpdetail', 'id', $id);



        $this->load->view('admin/users/usereditmodal', $data);
    }
    public function addcaller()
    {
        $sess = $this->session->userdata('pmsadmin');
        $name = $sess['name'];
        $role = $sess['role'];
        $id = $sess['id'];


        $caller_name = $this->input->post('caller_name');
        $caller_email = $this->input->post('caller_email');
        $caller_password = $this->input->post('caller_password');
        $password = md5($caller_password);
        $caller_contact = $this->input->post('caller_contact');
        $caller_select = $this->input->post('caller_select');
        $caller_address = $this->input->post('caller_address');
        $pregional = $this->input->post('pregional');


        //check mail

        $this->db->where('admin_email', $caller_email);
        $query = $this->db->get('master_admin');

        if ($query->num_rows() > 0) {

            echo json_encode(['email' => '0']);
        } else {

            if ($role == 'Master') {
                $insertData = array(
                    'admin_name' => $caller_name,
                    'admin_email' => $caller_email,
                    'admin_password' => $password,
                    'admin_contact' => $caller_contact,
                    'admin_role' => $caller_select,
                    'admin_address' => $caller_address,
                    'user_created_by' => $id,
                    'user_regional_head' => $pregional
                );

                $insertUser =  $this->db->insert('master_admin', $insertData);
            } else {
                $insertData = array(
                    'admin_name' => $caller_name,
                    'admin_email' => $caller_email,
                    'admin_password' => $password,
                    'admin_contact' => $caller_contact,
                    'admin_role' => $caller_select,
                    'admin_address' => $caller_address,
                    'user_created_by' => $id,
                    'user_regional_head' => $id
                );

                $insertUser =  $this->db->insert('master_admin', $insertData);
            }
            if ($insertUser) {
                echo json_encode(['done' => '1']);
            } else {
                echo json_encode(['done' => '0']);
            }
        }
    }

   



    public function followleaddata()
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
            $i = 0;

            foreach ($allDataInSheet as $value) {
                $inserdata['c_follow_name'] = $value['B'];
                $inserdata['c_follow_email'] = $value['C'];
                $inserdata['c_follow_contact'] = $value['D'];
                $inserdata['c_follow_address'] = $value['E'];
                $inserdata['c_follow_status'] = $value['F'];
                $inserdata['c_follow_uploaded_by'] = $id;

                $this->db->insert('caller_follow_lead', $inserdata);
                $i++;
            }

            redirect('CallerAdmin/followLead', 'refresh');
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
    }

    public function addrespond()
    {
        $sess = $this->session->userdata('pmsadmin');
        $name = $sess['name'];
        $role = $sess['role'];
        $id = $sess['id'];
        $followid =  $this->input->post('follow_id');
        $resremark =  $this->input->post('resremark');
        $status =  $this->input->post('status');
        $date = $this->input->post('date');
        $insertData = array(
            'follow_user_id' => $followid,
            'follow_remarks' => $resremark,
            'follow_up_date' => $date,
            'follow_up_status' => $status,

            'follow_up_created_by' => $id

        );


        $insertUser =  $this->db->insert('follow_up_data', $insertData);

        $insertData = array(
            'c_follow_status' => $status


        );
        $this->db->where('c_follow_id', $followid);
        $this->db->update('caller_follow_lead', $insertData);

        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }
    public function subadminedit()

    {
        $data['usereditdata'] = $this->Subadmin_model->list_common('panchayat');
        $data['dharmdata'] = $this->Subadmin_model->list_common('dharm');
        $data['citiesdata'] = $this->Subadmin_model->list_common('cities');

        $data['pachayatsimiti'] = $this->Subadmin_model->panchayatsimitdata();
        // print_r($data['pachayatsimiti']); exit();


        $id =  $this->input->post('id');

        $data['content'] = $this->Subadmin_model->usereditmodel($id);

        $this->load->view('admin/users/usereditmodal', $data);
    }
    public function simitfetch($id)
    {

        if ($id != '0') {

            $states = $this->Subadmin_model->list_common_where3('pachayatsimiti', 'panchayat', $id);

            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {

                $output .= '<option value="' . $value['id'] . '">' . $value['pachayatsimiti'] . '</option>';
            }

            $response = array('status' => true, 'output' => $output);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }


    public function grampanchyat($id)
    {

        if ($id != '0') {

            $states = $this->Subadmin_model->list_common_where3('grampanchyat', 'panchyatsimit', $id);

            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {

                $output .= '<option value="' . $value['id'] . '">' . $value['gram_panchyat'] . '</option>';
            }

            $response = array('status' => true, 'output' => $output);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    public function gramdata($id)
    {

        if ($id != '0') {

            $states = $this->Subadmin_model->list_common_where3('gramdetail', 'grampanchyat_id', $id);

            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {

                $output .= '<option value="' . $value['id'] . '">' . $value['gramname'] . '</option>';
            }

            $response = array('status' => true, 'output' => $output);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }




    public function insertgrampan($id)
    {

        if ($id != '0') {



            $states = $this->Subadmin_model->list_common_where3('grampanchyat', 'panchyatsimit', $id);

            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {

                $output .= '<option value="w">' . $value['panchyatsimit'] . '</option>';
            }

            $response = array('status' => true, 'output' => $output);


            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    public function gramfetch($id)
    {

        if ($id != '0') {



            $states = $this->Subadmin_model->list_common_where3('gramdetail', 'grampanchyat_id', $id);

            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {

                $output .= '<option value="w">' . $value['gramname'] . '</option>';
            }

            $response = array('status' => true, 'output' => $output);


            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }


    public function adddegnitymodel()
    {
        $id =  $this->input->post('id');
        $data['item'] = $this->Subadmin_model->list_common_where3('bjpdetail', 'id', $id);

        if ($data['item']) {
            $this->load->view('admin/user/adddegnity', $data);
        } else {
            $this->load->view('errors/error404');
        }
    }

    public function adddegnitydata()
    {

        $id =  $this->input->post('id');
        $designation = $this->input->post('designation');
        $year = $this->input->post('year');
        $remark = $this->input->post('remark');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $updatedata = array(
            'ex_man' => $designation,
            'year_ex_man' => $year,
            'remark_ex_man' => $remark,
            'updated_at' => $date

        );
        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('bjpdetail', $updatedata);

        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }



    public function editdegnitymodel()
    {
        $id =  $this->input->post('id');
        $data['edititem'] = $this->Subadmin_model->list_common_where3('bjpdetail', 'id', $id);

        if ($data['edititem']) {
            $this->load->view('admin/user/editdegnity', $data);
        } else {
            $this->load->view('errors/error404');
        }
    }


    public function updatedegnitydata()
    {

        $id =  $this->input->post('id');

        $year = $this->input->post('year');
        $remark = $this->input->post('remark');
        $designation = $this->input->post('designation');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $updatedata = array(
            'ex_man' => $designation,
            'year_ex_man' => $year,
            'remark_ex_man' => $remark,
            'updated_at' => $date

        );
        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('bjpdetail', $updatedata);

        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }






    public function updatesubadmi()
    {
        $id =  $this->input->post('id');
        $name = $this->input->post('name');
        $f_name = $this->input->post('f_name');
        $panchayatsimit = $this->input->post('pachayatsimiti');
        $caste = $this->input->post('caste');
        $dharm = $this->input->post('dharm');
        $mobile = $this->input->post('mobile');
        $whtup = $this->input->post('whtup');
        $birthd = $this->input->post('birthd');
        $marriedstatus = $this->input->post('marriedstatus');
        $dateofmarriage = $this->input->post('dateofmarriage');
        $ward_no = $this->input->post('ward_no');
        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $day1 = $this->input->post('day1');
        $month1 = $this->input->post('month1');
        $year1 = $this->input->post('year1');

        $verify = $this->input->post('verify');
        $aadharno = $this->input->post('aadharno');
        $voteridno = $this->input->post('voteridno');
        $village = $this->input->post('village');
        $gram_panchanyat = $this->input->post('grampanchya');
        $gram = $this->input->post('gram');
        $panchayat = $this->input->post('simiti');
        $tashsil = $this->input->post('tashsil');
        $district = $this->input->post('district');
        $pincode = $this->input->post('pincode');
        $sadasha_varsh = $this->input->post('sadasha_varsh');
        $vartaman_pad = $this->input->post('vartaman_pad');
        $purv_pad = $this->input->post('purv_pad');
        $vidhan_sabha = $this->input->post('vidhan_sabha');
        $cities_id = $this->input->post('cities_id');


        //  date_default_timezone_set('Asia/Kolkata');
        // $date = date('d-m-Y H:i A');

        $updatedata = array(
            'name' => $name,
            'f_name' => $f_name,
            'panchayatsimit' => $panchayatsimit,
            'caste' => $caste,
            'dharm' => $dharm,
            'mobile' => $mobile,
            'whtup' => $whtup,
            'birthd' => $day . '-' . $month . '-' . $year,
            'marriedstatus' => $marriedstatus,
            'dateofmarriage' => $day1 . '-' . $month1 . '-' . $year1,
            'ward_no' => $ward_no,
            'verify' => $verify,
            'aadharno' => $aadharno,
            'voteridno' => $voteridno,
            'village' => $village,
            'gram_panchanyat' => $gram_panchanyat,
            'gram' => $gram,
            'panchayat' => $panchayat,
            'tashsil' => $tashsil,
            'district' => $district,
            'pincode' => $pincode,
            'sadasha_varsh' => $sadasha_varsh,
            'vartaman_pad' => $vartaman_pad,
            'purv_pad' => $purv_pad,
            'vidhan_sabha' => $vidhan_sabha,
            'cities_id' => $cities_id
        );

        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('bjpdetail', $updatedata);
        // echo $this->db->last_query(); exit();
        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }

    public function exportdata()
    {
        $userdata = $this->Subadmin_model->userdata1('bjpdetail', 'flag', '0');

        $this->load->library('PHPExcel');
        $objectPHPExcel = new PHPExcel();
        $filename = date('d-m-y');
        $objectPHPExcel->setActiveSheetIndex(0);
        $objectPHPExcel->getActiveSheet()->SetCellValue('A1', 'Name');
        $objectPHPExcel->getActiveSheet()->SetCellValue('B1', 'Father Name');
        $objectPHPExcel->getActiveSheet()->SetCellValue('C1', 'Ex Man');
        $objectPHPExcel->getActiveSheet()->SetCellValue('D1', 'Panchayat Samiti');
        $objectPHPExcel->getActiveSheet()->SetCellValue('E1', 'Caste');
        $objectPHPExcel->getActiveSheet()->SetCellValue('F1', 'Dharm');
        $objectPHPExcel->getActiveSheet()->SetCellValue('G1', 'Mohalla');
        $objectPHPExcel->getActiveSheet()->SetCellValue('H1', 'Mobile');
        $objectPHPExcel->getActiveSheet()->SetCellValue('I1', 'WhatsApp');
        $objectPHPExcel->getActiveSheet()->SetCellValue('J1', 'Birth Day');
        $objectPHPExcel->getActiveSheet()->SetCellValue('K1', 'Married Status');
        $objectPHPExcel->getActiveSheet()->SetCellValue('L1', 'Date Of Marriage');
        $objectPHPExcel->getActiveSheet()->SetCellValue('M1', 'Ward No');
        $objectPHPExcel->getActiveSheet()->SetCellValue('N1', 'Varify');
        $objectPHPExcel->getActiveSheet()->SetCellValue('O1', 'Aadhar No');
        $objectPHPExcel->getActiveSheet()->SetCellValue('P1', 'Voter Id No');
        $objectPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Village');
        $objectPHPExcel->getActiveSheet()->SetCellValue('R1', 'Gram Panchayat');
        $objectPHPExcel->getActiveSheet()->SetCellValue('S1', 'Gram');
        $objectPHPExcel->getActiveSheet()->SetCellValue('T1', 'Panchayat');
        $objectPHPExcel->getActiveSheet()->SetCellValue('U1', 'Tahseel');
        $objectPHPExcel->getActiveSheet()->SetCellValue('V1', 'District');
        $objectPHPExcel->getActiveSheet()->SetCellValue('W1', 'Pincode');
        $objectPHPExcel->getActiveSheet()->SetCellValue('X1', 'Sadasyata Varsh');
        $objectPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Vartman Pad');
        $objectPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Purva Pad');
        $objectPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Vidhan Sabha');
        $objectPHPExcel->getActiveSheet()->SetCellValue('AB1', 'City');
        $objectPHPExcel->getActiveSheet()->SetCellValue('AC1', 'User Status');
        $objectPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Date Of Added');
        $objectPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Date Of Update');

        $rowcount = 2;

        foreach ($userdata as $value) {
            $pan_id = $value['panchayatsimit'];
            $this->db->select('*');
            $this->db->from('pachayatsimiti');
            $this->db->where('id', $pan_id);
            $rows1 = $this->db->get()->row();
            $panchayat_name = $rows1->pachayatsimiti;

            $dharm_id = $value['dharm'];
            $this->db->select('*');
            $this->db->from('dharm');
            $this->db->where('id', $dharm_id);
            $rows2 = $this->db->get()->row();
            $dharm_name = $rows2->dharm;

            $gram_panchayat = $value['gram_panchanyat'];
            $this->db->select('*');
            $this->db->from('grampanchyat');
            $this->db->where('id', $gram_panchayat);
            $rows3 = $this->db->get()->row();
            $gram_panchayat_name = $rows3->gram_panchyat;

            $g_name = $value['gram'];
            $this->db->select('*');
            $this->db->from('gramdetail');
            $this->db->where('id', $g_name);
            $rows4 = $this->db->get()->row();
            $gram_name = $rows4->gramname;


            $objectPHPExcel->getActiveSheet()->SetCellValue('A' . $rowcount, $value['name']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('B' . $rowcount, $value['f_name']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('C' . $rowcount, $value['ex_man']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('D' . $rowcount, $panchayat_name);
            $objectPHPExcel->getActiveSheet()->SetCellValue('E' . $rowcount, $value['caste']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('F' . $rowcount, $dharm_name);
            $objectPHPExcel->getActiveSheet()->SetCellValue('G' . $rowcount, $value['moholla']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('H' . $rowcount, $value['mobile']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('I' . $rowcount, $value['whtup']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('J' . $rowcount, $value['birthd']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('K' . $rowcount, $value['marriedstatus']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('L' . $rowcount, $value['dateofmarriage']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('M' . $rowcount, $value['ward_no']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('N' . $rowcount, $value['verify']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('O' . $rowcount, $value['aadharno']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('P' . $rowcount, $value['voteridno']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowcount, $value['village']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('R' . $rowcount, $gram_panchayat_name);
            $objectPHPExcel->getActiveSheet()->SetCellValue('S' . $rowcount, $gram_name);
            $objectPHPExcel->getActiveSheet()->SetCellValue('T' . $rowcount, $value['panchayat']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('U' . $rowcount, $value['tashsil']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('V' . $rowcount, $value['district']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('W' . $rowcount, $value['pincode']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('X' . $rowcount, $value['sadasha_varsh']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowcount, $value['vartaman_pad']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowcount, $value['purv_pad']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowcount, $value['vidhan_sabha']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowcount, $value['cities_id']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowcount, $value['datastatus']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowcount, $value['created_at']);
            $objectPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowcount, $value['updated_at']);
            $rowcount++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objectPHPExcel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposotion: acctchment;filename=userdata"' . $filename . '"');
        header('Cache-control:max-age-0');
        ob_end_clean();
        $objWriter->save('php://output');
        exit();
    }




    public function filterdata($offset = null)
    {
       $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
      		$total='';
        $action = $this->input->post('action');
      $is_panchayat_id = $this->input->post('is_panchayat_id'); 
      $gram_panchayat = $this->input->post('gram_panchayat');
      $gram = $this->input->post('gram');
      $mohalla = $this->input->post('mohalla');
        if ($action == 'all') {
            $data['filterdata']  = $this->Subadmin_model->userdata1('user_form_data', 'flag', '0');
          
        }
      if($action == 'activebjp')
      {
        $data['filterdata']  = $this->Subadmin_model->filter_party_wise_data('user_form_data', 'datastatus', 'active','bjp_congress','bjp');
        
        }
       if($action == 'inactivebjp')
      {
            $data['filterdata']  = $this->Subadmin_model->filter_party_wise_data('user_form_data', 'datastatus', 'inactive','bjp_congress','bjp');
        }
       if($action == 'activecongress')
      {
            $data['filterdata']  = $this->Subadmin_model->filter_party_wise_data('user_form_data', 'datastatus', 'active','bjp_congress','congress');
        }
      if($action == 'varified')
      {
            $data['filterdata']  = $this->Subadmin_model->userdata1('user_form_data', 'is_varified', 'varified', $limit, $offset);
        }
       if($action == 'inactivecongress')
      {
            $data['filterdata']  = $this->Subadmin_model->filter_party_wise_data('user_form_data', 'datastatus', 'inactive','bjp_congress','congress');
        }
      
      if(!empty($is_panchayat_id) || !empty($gram_panchayat) || !empty($gram) || !empty($mohalla)){
      		if($action == 'activebjp')
      {
       	$data['filterdata']  = $this->Subadmin_model->merge_all_filter('user_form_data',$is_panchayat_id,$gram_panchayat,$gram,$mohalla,'datastatus', 'active','bjp_congress','bjp' );
        
        }
        
        if($action == 'inactivebjp')
      {
       	$data['filterdata']  = $this->Subadmin_model->merge_all_filter('user_form_data',$is_panchayat_id,$gram_panchayat,$gram,$mohalla,'datastatus', 'inactive','bjp_congress','bjp' );
        
        }
        
        if($action == 'activecongress')
      {
       	$data['filterdata']  = $this->Subadmin_model->merge_all_filter('user_form_data',$is_panchayat_id,$gram_panchayat,$gram,$mohalla,'datastatus', 'active','bjp_congress','congress' );
        
        }
        if($action == 'inactivecongress')
      {
       	$data['filterdata']  = $this->Subadmin_model->merge_all_filter('user_form_data',$is_panchayat_id,$gram_panchayat,$gram,$mohalla,'datastatus', 'inactive','bjp_congress','congress' );
        
        }
         if($action == 'varified')
      {
       	$data['filterdata']  = $this->Subadmin_model->merge_varified_filter('user_form_data',$is_panchayat_id,$gram_panchayat,$gram,$mohalla,'is_varified', 'varified');
        
        }
      		
      
      }
      			$data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
               

        $this->load->view('admin/user/filterdata', $data);
    }

    public function datefilter()
    {
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $data['filterdata']  = $this->Subadmin_model->filterdate($startdate, $enddate);


        $this->load->view('admin/user/filterdata', $data);
    }

    public function searchdata()
    {
        $searchstring = $this->input->post('content');

        $data['filterdata']  = $this->Subadmin_model->searchdata($searchstring);


        $this->load->view('admin/user/filterdata', $data);
    }

    public function importexcel()
    {


        $this->load->library('PHPExcel');
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
            $i = 0;

            foreach ($allDataInSheet as $value) {
                $inserdata['c_follow_name'] = $value['B'];
                $inserdata['c_follow_email'] = $value['C'];
                $inserdata['c_follow_contact'] = $value['D'];
                $inserdata['c_follow_address'] = $value['E'];
                $inserdata['c_follow_status'] = $value['F'];
                $inserdata['c_follow_uploaded_by'] = $id;
                print_r($$inserdata);
                //$this->db->insert('caller_follow_lead', $inserdata);
                $i++;
            }

            //redirect('CallerAdmin/followLead', 'refresh');



        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
    }



    public function alluserdata($offset = null)
    {
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

            $userdatapagination = $this->Subadmin_model->userdata1('user_form_data', 'flag', '0', $limit, $offset);
            $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
           
          
            $total = $this->Subadmin_model->userdata2('user_form_data', 'flag', '0');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'],'is_varified' => $value['is_varified'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man'], 'bjp_congress' => $value['bjp_congress'], 'is_supporter' => $value['is_supporter']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                $this->load->view('admin/alluserdata/alluserdata', $data);
            }
          else{
          		$this->load->view('admin/alluserdata/alluserdata');
          }
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }


    public function updateactivedata()
    {
        $action = $_REQUEST['action'];
        $id = $_REQUEST['id'];
        if ($action == 'neutral') {
            $action = '';
        }



        $update = array(
            'datastatus'  => $action,
            'bjp_congress'=>'',
            'is_supporter'=>'',
            'flag'=>'2',
          'is_varified'  => 'varified'
          
        );

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id', $id[$i]);
            $this->db->update('user_form_data', $update);
        }

        echo json_encode(['done' => '1']);
    }
  
  
  	 public function varifydata()
    {
        $action = $_REQUEST['action'];
        $id = $_REQUEST['id'];
        $update = array(
            'is_varified'  => $action
            
        );

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id', $id[$i]);
            $this->db->update('user_form_data', $update);
        }

        echo json_encode(['done' => '1']);
    }

    public function dataactinact()
    {
       
        $title = $_REQUEST['title'];
        $id = $_REQUEST['id'];
        
        $data['id'] = $id;
        $data['title'] = $title;
        // for ($i = 0; $i < count($id); $i++) {
        //     $this->db->where('id', $id[$i]);
        //     $this->db->update('bjpdetail', $update);
        // }
        
        $this->load->view('admin/alluserdata/bjpcongressupdate', $data);

        
    }

    public function bjpcongressupdate()
    {

        $user_select = $this->input->post('user_select');
        $title = $this->input->post('bjp_congress');
        $id = $this->input->post('user_id');
        
        $user_sopport = $this->input->post('user_sopport');



        $update = array(
            'datastatus'  => $user_select,
            'bjp_congress'=>$title,
            'is_supporter'=>$user_sopport,
          'is_varified'  => 'varified'
        );

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id', $id[$i]);
            $this->db->update('user_form_data', $update);
        }

        echo json_encode(['done' => '1']);

    }

    public function bjpuserdata($offset = null)
    {
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

            $userdatapagination = $this->Subadmin_model->bjpdatalist('user_form_data', 'bjp_congress', 'bjp', $limit, $offset);
            $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
            $total = $this->Subadmin_model->bjpdatalist1('user_form_data', 'bjp_congress', 'bjp');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man'], 'bjp_congress' => $value['bjp_congress'], 'is_supporter' => $value['is_supporter']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                $this->load->view('admin/alluserdata/bjpdata', $data);
            }
          else{
          		$this->load->view('admin/alluserdata/bjpdata');
          }
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }


    public function congressuserdata($offset = null)
    {
        
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

          $userdatapagination = $this->Subadmin_model->bjpdatalist('user_form_data', 'bjp_congress', 'congress', $limit, $offset);
          $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
            $total = $this->Subadmin_model->bjpdatalist1('user_form_data', 'bjp_congress', 'congress');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man'], 'bjp_congress' => $value['bjp_congress'], 'is_supporter' => $value['is_supporter']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                
                $this->load->view('admin/alluserdata/congressuserdata', $data);
            }
          else{
          		$this->load->view('admin/alluserdata/congressuserdata');
          }
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }

    public function fakedata($offset = null)
    {
        
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

          $userdatapagination = $this->Subadmin_model->fake_data('user_form_data', 'datastatus', 'fakedata', $limit, $offset);
        
          $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
            $total = $this->Subadmin_model->bjpdatalist1('user_form_data', 'datastatus', 'fakedata');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man'], 'bjp_congress' => $value['bjp_congress'], 'is_supporter' => $value['is_supporter']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                
                $this->load->view('admin/alluserdata/fakedata', $data);
            }
          else{
          		$this->load->view('admin/alluserdata/fakedata');
          }
          
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
	
  	 public function varified_data($offset = null)
    {
        
        if ($this->session->userdata('pmsadmin') == true) {
            $bjp = array();
            $limit = 500;

            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);

          $userdatapagination = $this->Subadmin_model->userdata1('user_form_data', 'is_varified', 'varified', $limit, $offset);
        
          $data['is_panchayat'] = $this->Subadmin_model->userdata1('pachayatsimiti', 'flag', '0', $limit, $offset);
            $total = $this->Subadmin_model->bjpdatalist1('user_form_data', 'is_varified', 'varified');
            if (!empty($userdatapagination)) {
                foreach ($userdatapagination as $value) {
                    array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man'], 'bjp_congress' => $value['bjp_congress'], 'is_supporter' => $value['is_supporter']));
                }
                $data['count'] = $total;
                $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
                $data['useritem'] =  $bjp;
                
                $this->load->view('admin/alluserdata/varified_data', $data);
            }
          else{
          	$this->load->view('admin/alluserdata/varified_data');
          
          }
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
  
  
   public function deleterecord($id)
    {	
     $updatedata = array(
            'flag' => '2',
           

        );
        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('user_form_data', $updatedata);

        if ($insertUser) {
            echo json_encode(['done' => '1']);
        } else {
            echo json_encode(['done' => '0']);
        }
    }
  
  public function deleteselected()
    {
        $action = $_REQUEST['action'];
        $id = $_REQUEST['id'];
        $update = array(
            'flag'  => $action
            
        );

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id', $id[$i]);
            $this->db->update('user_form_data', $update);
        }

        echo json_encode(['done' => '1']);
    }
  
   public function not_varifydata()
    {
        $action = $_REQUEST['action'];
        $id = $_REQUEST['id'];
        $update = array(
            'is_varified'  => $action,
          'datastatus'  => '',
            'bjp_congress'=>'',
            'is_supporter'=>'',
            
        );

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id', $id[$i]);
            $this->db->update('user_form_data', $update);
        }

        echo json_encode(['done' => '1']);
    }
  

}
