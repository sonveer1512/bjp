 <?php
  if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

  class Projects_modal extends CI_Model

  {

    public function __construct()

    {

      parent::__construct();
    }





    public function pojectdata()

    {
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      if ($role == 'Master') {
        $this->db->select('*');
        $this->db->where('admin_role', 'Project Manager');
        //$this->db->where('project_manager_created_by',$id);
        $query = $this->db->get('master_admin');

        return $query;
      } else {
        $this->db->select('*');
        $this->db->where('admin_role', 'Project Manager');
        $this->db->where('project_manager_created_by', $id);
        $query = $this->db->get('master_admin');

        return $query;
      }
    }
    public function pojectalloteddata()

    {
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];

      if ($role == 'Master') {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->join('master_admin', 'projects.created_by = master_admin.admin_user_id');
        $query = $this->db->get();
        return $query;
      } 
         if ($role == 'Regional')
         {
           $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->join('projects', 'master_admin.admin_user_id = projects.created_by');
        $this->db->where('projects.regional_head', $id);
        //$this->db->where('projects.project_status !=', 'Cancel By Admin');

        $query = $this->db->get();

        // $query = $this->db->get('projects');  

        return $query;
      } else {
        		$this->db->select('*');
        $this->db->from('master_admin');
        $this->db->join('projects', 'master_admin.admin_user_id = projects.created_by');
        $this->db->where('projects.project_manager', $id);
        //$this->db->where('projects.project_status !=', 'Cancel By Admin');

        $query = $this->db->get();

        // $query = $this->db->get('projects');  

        return $query;
      }
    }
    public function projectlist()
    {
      $this->db->select('*');

      // $this->db->where('admin_status','Enable');
      $query = $this->db->get('projects');

      return $query;
    }

	public function projectedit($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('projects');
      $this->db->where('p_id', $id);
      $query = $this->db->get();

      return $query->result_array();
    }


    public function deleteproject($id)
    {
      $this->db->where('p_id', $id);
      $this->db->delete('projects');
    }

    public function callereditmodel($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('master_admin');
      $this->db->where('admin_user_id', $id);
      $query = $this->db->get();

      return $query->result_array();
    }

    public function getprojectmanager($id)
    {
      $response = array();

      // Select record
      $this->db->select('admin_user_id,admin_name');
      $this->db->where('project_manager_created_by', $id);
      $q = $this->db->get('master_admin');
      $response = $q->result_array();

      return $response;
    }

    public function alluser()
    {
      $this->db->select('*');
      $this->db->from('master_admin');
      $this->db->where('admin_role !=', 'Master');
      $this->db->where('admin_role !=', 'Regional');
      $this->db->where('admin_role !=', 'Project Manager');
      $query = $this->db->get();

      return $query;
    }
    
     public function userupload()

{
   $sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];

            if ($role = 'Master') {
               // code...
            
               $this->db->select('*');
               //$this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('user_data');  

         return $query;
      }
      else{

          $this->db->select('*');
               $this->db->where('user_data_uploaded_by',$id);
               // $this->db->where('admin_status','Enable');
               $query = $this->db->get('user_data');  

         return $query;
      }
  }
    
    public function deleteallottedproject($id)
    {
    	 $this->db->where('p_allot_id',$id);
  		$this->db->delete('project_allot_show_admin');
    
    }
  }
