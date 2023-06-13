<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subadmin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subadmin_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('email');
    }
    public function test()
    {
        $this->sendmail('sp9522385@gmail.com', 'sp9522385@gmail.com', 'test Mail', 'hello');
    }
    public function index()
    {
        if ($this->session->userdata('pmsadmin') == true) {
            $data['subadminData'] = $this->Subadmin_model->masterData();
            return $this->load->view('admin/subadmin', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
    public function showstates($id)
    {
        if ($id != '0') {
            $states = $this->Subadmin_model->list_common_where3('states', 'country_id', $id);
            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {
                $output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
            }
            $response = array('status' => true, 'output' => $output);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
    public function showcity($id)
    {
        $states = $this->Subadmin_model->list_common_where3('cities', 'state_id', $id);
        $output = '<option value="0">Select</option>';
        foreach ($states as $value) {
            $output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function addsubadmin()
    {
        $sess = $this->session->userdata('pmsadmin');
        $id = $sess['id'];
        $role = $sess['role'];
        $name = $sess['name'];
        $sub_name = $this->input->post('sub_name');
        $sub_email = $this->input->post('sub_email');
        $sub_password = $this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact = $this->input->post('sub_contact');
        $sub_select = $this->input->post('sub_select');
        $sub_address = $this->input->post('sub_address');
        $subject = "Welcome to Axepert Exhibit Pvt Ltd.";
        $message = "We are greatfully to inform you ($sub_email),<br>$name is added you $sub_email in Axepert Exhibit Admin Panel as a Regional Head.<br>Your username is your email ($sub_email) and your password is $sub_password.<br>Please click here for login https://axepertexhibits.com/AdminPanelPMS2/";
        //check mail
        $this->db->where('admin_email', $sub_email);
        $query = $this->db->get('master_admin');
        if ($query->num_rows() > 0) {
            echo json_encode(['email' => '0']);
        } else {
            $insertData = array(
                'admin_name' => $sub_name,
                'admin_email' => $sub_email,
                'admin_password' => $password,
                'admin_contact' => $sub_contact,
                'admin_role' => $sub_select,
                'admin_address' => $sub_address
            );
            $insertUser =  $this->db->insert('master_admin', $insertData);
        }
        echo json_encode(['done' => '1']);
    }
    public function deletesubadmin($id)
    {
        $id = $this->input->post("admin_user_id");
        $this->Subadmin_model->deletesubadmin($id);
        redirect('subadmin');
    }
    public function subadminedit()
    {
        $id =  $this->input->post('id');
        $data['content'] = $this->Subadmin_model->supervisoreditmodel($id);
     
        $this->load->view('admin/subadmin/subadmineditmodel', $data);
    }
    public function updatesubadmi()
    {
        $id =  $this->input->post('admin_user_id');
        $sub_name = $this->input->post('admin_name');
        $sub_email = $this->input->post('admin_email');
        $sub_contact = $this->input->post('admin_contact');
        $sub_select = $this->input->post('admin_role');
        $sub_address = $this->input->post('admin_address');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $updatedata = array(
            'admin_name' => $sub_name,
            'admin_email' => $sub_email,
            'admin_contact' => $sub_contact,
            'admin_role' => $sub_select,
            'updated_at' => $date,
            'admin_address' => $sub_address
        );
        $insertUser = $this->db->where('admin_user_id', $id);
        $insertUser = $this->db->update('master_admin', $updatedata);
        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }
    public function update()
    {
        $admin_user_id = $_REQUEST['admin_user_id'];
        $update = array(
            'admin_status'  => 'Enable'
        );
        $this->db->where('admin_user_id', $admin_user_id);
        $this->db->update('master_admin', $update);
        redirect($_SERVER['REQUEST_URI'], 'refresh');
    }
    public function updatedisable()
    {
        $admin_user_id = $_REQUEST['admin_user_id'];
        $update = array(
            'admin_status'  => 'Disable'
        );
        $this->db->where('admin_user_id', $admin_user_id);
        $this->db->update('master_admin', $update);
        redirect($_SERVER['REQUEST_URI'], 'refresh');
    }
    public function changesubpass()
    {
        $id =  $this->input->post('admin_user_id');
        $cur_password =  $this->input->post('cur_password');
        $cpassword = md5($cur_password);
        $new_password = $this->input->post('new_password');
        $npassword = md5($new_password);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $this->db->where('admin_password', $cpassword);
        $this->db->where('admin_user_id', $id);
        $query = $this->db->get('master_admin');
        if ($query->num_rows() > 0) {
            $updatedata = array(
                'admin_password' => $npassword,
                'updated_at' => $date
            );
            $insertUser = $this->db->where('admin_user_id', $id);
            $insertUser = $this->db->update('master_admin', $updatedata);
            if ($insertUser) {
                echo json_encode(['inserted' => '1']);
            } else {
                echo json_encode(['inserted' => '0']);
            }
        } else {
            echo json_encode(['password' => '0']);
        }
    }
}
