<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Speaker_model');
		$this->load->model('Projects_modal');
      $this->load->model('Department_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}
public function test(){
	$this->sendmail('suryapratap05021995@gmail.com','bhaveshkapoor09@gmail.com','test Mail','hello');
}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['speakersdata'] = $this->Speaker_model->speakerlist();
			$data['projectdata'] = $this->Projects_modal->projectlist();
           $data['subadminData'] = $this->Department_model->getregionalhead();
			return $this->load->view('admin/speaker/speakerlist',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}

	public function addspeaker()
	{

		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

  		$spe_name=$this->input->post('spe_name');
        $spe_email=$this->input->post('spe_email');
        $spe_pass=$this->input->post('spe_pass');
        $password = md5($spe_pass);
        $spe_desi=$this->input->post('spe_desi');
        $spe_contact=$this->input->post('spe_contact');
        $spe_project=$this->input->post('spe_project');
        $admin_role=$this->input->post('admin_role');
      $pregional=$this->input->post('pregional');
      $spe_com_name=$this->input->post('spe_com_name');
      $spe_com_add=$this->input->post('spe_com_add');
     
         date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i A');

        //check mail
        
       
        $this->db->where('admin_email',$spe_email);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{

       	 if($role == 'Master')
          {

         $insertData = array('admin_name'=>$spe_name,
								'admin_email'=>$spe_email,
								'admin_password'=>$password,
								'admin_contact'=>$spe_contact,
								'admin_role'=>$admin_role,
								'spekear_created_by' => $id,
                             	'user_regional_head' => $pregional
								
           	 );
         
           $insertUser =  $this->db->insert('master_admin',$insertData);
            $item_id = $this->db->insert_id();
            if($_FILES['spe_image']['name'] != "")
    {
      $path_parts = pathinfo($_FILES['spe_image']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
      $imgname=$image_path;

      $source =  $_FILES['spe_image']['tmp_name'];      
      $originalpath  = "webupload/".$imgname;
     
      move_uploaded_file($source,$originalpath);    
      
    }
	  $insertData = array('speaker_name'=>$spe_name,
          						'speaker_designation' =>$spe_desi,
								'speaker_email'=>$spe_email,
								
								'speaker_contact'=>$spe_contact,
								
								'speaker_image'=>$imgname,
								// 'speaker_project_id'=>$project,
								'speaker_master_admin_id'=>$item_id,
								'speaker_created_at'=>$date,
								'speaker_created_by' => $id,
                                'spe_com_name' => $spe_com_name,
                                'spe_com_add' => $spe_com_add,
                          		'speaker_regional_head' => $pregional
								
           	 );

				$insertUser =  $this->db->insert('speaker',$insertData);
				$speaker_id = $this->db->insert_id();



    for ($i = 0; $i < count($spe_project) ; ++$i) {
         	$project = $spe_project[$i];
			 $insertDatas = [
				'project_id' => $project,
				'speaker_id' => $speaker_id,
               	'speaker_regional_head'=>$pregional

			];

        	
           $insertUser =  $this->db->insert('speaker_project',$insertDatas);
       }
         }
              else{
              			 $insertData = array('admin_name'=>$spe_name,
								'admin_email'=>$spe_email,
								'admin_password'=>$password,
								'admin_contact'=>$spe_contact,
								'admin_role'=>$admin_role,
								'spekear_created_by' => $id,
                                'user_created_by'=>$id,
              					'user_regional_head'=>$id              
								
           	 );
         
           $insertUser =  $this->db->insert('master_admin',$insertData);
            $item_id = $this->db->insert_id();
            if($_FILES['spe_image']['name'] != "")
    {
      $path_parts = pathinfo($_FILES['spe_image']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
      $imgname=$image_path;

      $source =  $_FILES['spe_image']['tmp_name'];      
      $originalpath  = "webupload/".$imgname;
     
      move_uploaded_file($source,$originalpath);    
      
    }
	  $insertData = array('speaker_name'=>$spe_name,
          						'speaker_designation' =>$spe_desi,
								'speaker_email'=>$spe_email,
								
								'speaker_contact'=>$spe_contact,
								
								'speaker_image'=>$imgname,
								// 'speaker_project_id'=>$project,
								'speaker_master_admin_id'=>$item_id,
								'speaker_created_at'=>$date,
								'speaker_created_by' => $id
								
           	 );

				$insertUser =  $this->db->insert('speaker',$insertData);
				$speaker_id = $this->db->insert_id();



    for ($i = 0; $i < count($spe_project) ; ++$i) {
         	$project = $spe_project[$i];
			 $insertDatas = [
				'project_id' => $project,
				'speaker_id' => $speaker_id

			];

        	
           $insertUser =  $this->db->insert('speaker_project',$insertDatas);
       }
         }
              }
	   
	   	echo json_encode(['done'=>'1']);

        //    if($insertUser)
		// 		{
		// 			echo json_encode(['done'=>'1']);

				

					
		// 		}
		// 		else
		// 		{
		// 			echo json_encode(['done'=>'0']);

		// 		}
    	}

          
  
        
	



	public function deletespeaker($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Speaker_model->deletespeaker($id);
	//get the speaker id from the speaker table
	$getspeakder_id = $this->db->query("SELECT * FROM speaker where speaker_master_admin_id = ? ",[$id])->result();
	 $speakerid = $getspeakder_id[0]->speaker_id;
	 $this->db->where('speaker_id', $speakerid);
	 $this->db->delete('speaker_project');

    $this->Speaker_model->deletespeakerfromspeaker($id);
	
    redirect('Speaker');
}

public function speakeredit()
{
	
		$id =  $this->input->post('id');
		$data['projectdata'] = $this->Projects_modal->projectlist();

		$services = $this->Speaker_model->speaker_project($id);
		foreach ($services as $value) {
			$serve[] = $value['project_id'];
		}
		$data['allotedproject'] = $serve;
		$data['content'] = $this->Speaker_model->speakereditmodal($id);

        
		$this->load->view('admin/speaker/speakereditlist',$data);

}
  
  public function getprojectdetails()
{
	
		$id =  $this->input->post('id');
		$data['projectdetailsdata'] = $this->Speaker_model->speakerprojectdata($id);
    	
		$this->load->view('admin/speaker/speakerprojectdetails',$data);

}

public function updatesubadmi()
{


		$id =  $this->input->post('admin_user_id'); 
		$sub_name=$this->input->post('admin_name');
        $sub_email=$this->input->post('admin_email');
        $sub_password=$this->input->post('admin_password');
         $password = md5($sub_password);
        $sub_contact=$this->input->post('admin_contact');
        $sub_select=$this->input->post('admin_role');
        $sub_address=$this->input->post('admin_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
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
 public function update()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Enable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


	public function updatespeaker()
{
		// $id =  $this->input->post('admin_role'); 
		$sess = $this->session->userdata('pmsadmin');
		$udpdatedbyid = $sess['id'];

		  $speakerid =  $this->input->post('speaker_id'); 

		 $spe_name=$this->input->post('spe_name');
         $spe_email=$this->input->post('spe_email');
       
         $spe_desi=$this->input->post('spe_desi');
         $spe_contact=$this->input->post('spe_contact');


	     $spe_project=$this->input->post('spe_project');

		 $speakimage = $this->input->post('spe_image');
		 if ($_FILES['spe_image']['name'] != "") {

			$path_parts = pathinfo($_FILES['spe_image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$speakimage = $image_path;

			$source =  $_FILES['spe_image']['tmp_name'];
			$originalpath  = "webupload/" . $speakimage;

			move_uploaded_file($source, $originalpath);
		}





	   for ($i = 0; $i < count($spe_project) ; ++$i) {
		$project = $spe_project[$i];
		//now check that  the project  is already purchased  or not'
		$check = $this->db->query("SELECT *	 FROM  speaker_project WHERE speaker_id = ?   AND  project_id = ? ", array($speakerid, $project));

		if ($check->num_rows() > 0) {

			$updatedData = array('speaker_name'=>$spe_name,
			'speaker_designation' =>$spe_desi,
		  'speaker_email'=>$spe_email,
		  
		  'speaker_contact'=>$spe_contact,
		  'speaker_updated_at'=>$udpdatedbyid,
		  'speaker_image'=>$speakimage

		  
		  
		);

			$this->db->where('speaker_id', $speakerid);

			$this->db->update('speaker', $updatedData);
		} else {

			$insertData = [
				'speaker_id' => $speakerid,
				'project_id' => $project,
				// 'ex_services_amount' => $totalamount
			];
			$updatedDatas= array('speaker_name'=>$spe_name,
			'speaker_designation' =>$spe_desi,
		  'speaker_email'=>$spe_email,
		  
		  'speaker_contact'=>$spe_contact,
		  'speaker_updated_at'=>$udpdatedbyid,
		  'speaker_image'=>$speakimage


		  
		  
);

			// $updateServiceAmount = [
			// 	'ex_services_amount' => $totalamount
			// ];
			$this->db->where('speaker_id', $speakerid);
			$this->db->update('speaker', $updatedDatas);
			// $this->db->where('speaker_id', $id);
			// $this->db->update('speaker_project', $updateServiceAmount);

			$this->db->insert('speaker_project', $insertData);
		}
	}
	echo  json_encode(['inserted' => '1']);





	// 	$insertDatas = [
	// 	   'project_id' => $project,
	// 	   'speaker_id' => $speaker_id

	//    ];

	   
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
}

