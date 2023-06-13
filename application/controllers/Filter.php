<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "/libraries/PHPExcel.php";
class Filter extends CI_Controller
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


    public function is_panchayat_filter_data($id,$offset = null)
    {
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('user_form_data', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_is_panchayat_data('user_form_data', 'panchayatsimit', $id, $limit, $offset);
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }
  
  
   public function is_panchayat_filter_data_imported($id,$offset = null)
    {
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('bjpdetail', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_is_panchayat_data('bjpdetail', 'panchayatsimit', $id, $limit, $offset);
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    } 
    
    public function fetch_grampanchayat($id)
    {
        $states = $this->Subadmin_model->list_common_where3('grampanchyat','panchyatsimit',$id);
       

        $output = '<option value="0">Select</option>';
        foreach($states as $value) {
            $output .= '<option value="'.$value['id'].'">'.$value['gram_panchyat'].'</option>';
        }

        $response = array('status' => true, 'output' => $output);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
  
 
    public function fetch_gram($id)
    {
        $states = $this->Subadmin_model->list_common_where3('gramdetail','grampanchyat_id',$id);

        $output = '<option value="0">Select</option>';
        foreach($states as $value) {
            $output .= '<option value="'.$value['id'].'">'.$value['gramname'].'</option>';
        }

        $response = array('status' => true, 'output' => $output);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function gram_panchayat_filter_data($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('user_form_data', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_gram_panchayat_data('user_form_data', 'gram_panchanyat', $id,'panchayatsimit',$is_panchayat_id, $limit, $offset);
        
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }
  
  
  	public function gram_panchayat_filter_data_imported($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('bjpdetail', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_gram_panchayat_data('bjpdetail', 'gram_panchanyat', $id,'panchayatsimit',$is_panchayat_id, $limit, $offset);
        
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }


    public function fetch_mohalla($id)
    {
        $states = $this->Subadmin_model->list_common_where3('mohalla','booth_id',$id);

        $output = '<option value="0">Select</option>';
        foreach($states as $value) {
            $output .= '<option value="'.$value['id'].'">'.$value['mohalla'].'</option>';
        }

        $response = array('status' => true, 'output' => $output);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function gram_data($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
       $gram_panchayat =$this->input->post('gram_panchayat');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('user_form_data', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_gram_data('user_form_data', 'gram', $id,'gram_panchanyat',$gram_panchayat,'panchayatsimit',$is_panchayat_id, $limit, $offset);
      
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }
  
  
  	public function gram_data_imported($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
       $gram_panchayat =$this->input->post('gram_panchayat');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('bjpdetail', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_gram_data('bjpdetail', 'gram', $id,'gram_panchanyat',$gram_panchayat,'panchayatsimit',$is_panchayat_id, $limit, $offset);
      
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }

    public function mohalla_data($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
       $gram_panchayat =$this->input->post('gram_panchayat');
       $gram =$this->input->post('gram');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('user_form_data', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_mohalla_data('user_form_data', 'moholla', $id,'gram_panchanyat',$gram_panchayat,'panchayatsimit',$is_panchayat_id,'gram',$gram, $limit, $offset);
      
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }
  
  
  	public function mohalla_data_imported($id,$offset = null)
    {
       $is_panchayat_id =$this->input->post('is_panchayat_id');
       $gram_panchayat =$this->input->post('gram_panchayat');
       $gram =$this->input->post('gram');
        $bjp = array();
        $limit = 500;
        $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
        $total = $this->Subadmin_model->userdata2('bjpdetail', 'flag', '0');
        
        $userdatapagination = $this->Subadmin_model->fetch_mohalla_data('bjpdetail', 'moholla', $id,'gram_panchanyat',$gram_panchayat,'panchayatsimit',$is_panchayat_id,'gram',$gram, $limit, $offset);
      
        if (!empty($userdatapagination)) {
            foreach ($userdatapagination as $value) {
                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'], 'moholla' => $value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus'], 'ex_man' => $value['ex_man']));
            }
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['filterdata'] =  $bjp;
            $this->load->view('admin/user/filterdata', $data);
        }
        
       
       
    }



   


}
