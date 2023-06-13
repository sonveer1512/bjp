<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac {

    private $userRoles = array();
    private $userRoles2 = array();
    protected $permissions;
    var $perm_category;
    

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('rolepermission_model');
        $this->permissions = array();
        $this->perm_category = array('can_view', 'can_add', 'can_edit', 'can_delete','can_change_pass');
        self::loadPermission(); //Initiate the userroles
    }

    function loadPermission() {
        $admin_session = $this->CI->session->userdata('pmsadmin');
        if(!empty($admin_session['role'])) {
            $role_id = $this->CI->rolepermission_model->getroleid($admin_session['role']);

            $permissions = $this->getPermission($role_id);

            $this->userRoles[$admin_session['role']] = $permissions;
        }
    }

    function getPermission($role_id) { 
        
        $role_perm = $this->CI->rolepermission_model->getPermissionByRole($role_id);

        foreach ($role_perm as $key => $value) {
            foreach ($this->perm_category as $per_cat_key => $per_cat_value) {
                if ($value->$per_cat_value == 1) {
                    $this->permissions[$value->short_name . "-" . $per_cat_value] = true;
                }
            }
        }

        return $role_perm;
    }
 



    function hasPrivilege($category = null, $permission = null) {

         $perm = trim($category) . "-" . trim($permission);

        $admin_session = $this->CI->session->userdata('pmsadmin');
        $role_id = $this->CI->rolepermission_model->getroleid($admin_session['role']);

        if($admin_session['role'] == 'Master') {
            return true;
        }

        foreach ($this->userRoles as $role) {
            if ($this->hasPermission($perm)) {
                return true;
            }
        }

        return false;
    }



    function hasPermission($permission) {
        return isset($this->permissions[$permission]);
    }





    function loadPermission2($user_id) {
        $permissions = $this->getPermission($user_id);
        $this->userRoles2[] = $permissions;
    }


    function haspermissionuserwise($user_id, $permission) {
        $this->loadPermission2($user_id);

        foreach ($this->userRoles2 as $role) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }
    }


    function module_permission($module_name) {
        $module_perm = $this->CI->Module_model->getPermissionByModulename($module_name);
        return $module_perm;
    }

    function unautherized() {
        $this->CI->load->view('layout/header');
        $this->CI->load->view('unauthorized');
        $this->CI->load->view('layout/footer');
    }

}
