<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
      	$this->load->model('Subadmin_model');
      	$this->load->helper('url');
      	$this->load->library('form_validation');
    }


    public function index()
    {
        $data['items'] = $this->Subadmin_model->list_common('sms_templates');
        $this->load->view('admin/template/list', $data);
    }


    public function add()
    {
        $this->form_validation->set_rules('template_id', 'Template ID', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {
            $response = array('status' => false, 'message' => 'Enter Mandatory Fields');
        } else {
          	$data['template_id'] = $this->input->post('template_id');

            $exist = $this->Subadmin_model->list_common_where3('sms_templates', 'template_id', $data['template_id']);
            $rand = rand(1000, 9999);

            if (empty($exist)) {
                $data['message'] = $this->input->post('message');
              	$data['template_name'] = $this->input->post('template_name');

                $saved = $this->Subadmin_model->insert_common('sms_templates', $data);

                if ($saved) {
                    $response = array('code' => 200, 'message' => 'Template Added Succesfully');
                } else {
                    $response = array('code' => 200, 'message' => 'Something went wrong');
                }
            } else {
                $response = array('code' => 400, 'message' => "Already Exist");
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }




    public function edit()
    {
        $id =  $this->input->post('id');
        $data['item'] = $this->Subadmin_model->list_common_where3('sms_templates', 'id', $id);

        if ($data['item']) {
            $this->load->view('admin/template/edit', $data);
        } else {
            $this->load->view('errors/error404');
        }
    }



    public function update()
    {
      	$this->form_validation->set_rules('template_id', 'Template ID', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {
            $response = array('status' => false, 'message' => 'Enter Mandatory Fields');
        } else {
          	$data['template_id'] = $this->input->post('template_id');
            $data['message'] = $this->input->post('message');
            $data['template_name'] = $this->input->post('template_name');
            $item_id = $this->input->post('rowid');

            $saved = $this->Subadmin_model->update_common('sms_templates', $data, 'id', $item_id);

            if ($saved) {
              $response = array('code' => 200, 'message' => 'Template Added Succesfully');
            } else {
              $response = array('code' => 200, 'message' => 'Something went wrong');
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
