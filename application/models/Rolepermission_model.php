<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rolepermission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function getPermissionByRole($role_id) {
        $this->db->select('`role_permission`.*, sidebar_subtrees.subtree_id as subtree_id,sidebar_subtrees.subtree_attr_name as subtree_attr_name,sidebar_subtrees.short_name as short_name');
        $this->db->from('role_permission');

        $this->db->join('sidebar_subtrees', 'sidebar_subtrees.subtree_id=role_permission.sidebar_subtree_id');
        $this->db->where('role_permission.role_id', $role_id);
        $query = $this->db->get();
        return $query->result();
    }


    public function getroleid($role) {
        $query = $this->db->select('role_id')->where('role_name',$role)->get('pms_admin_role');
        return $query->row()->role_id;
    }


    public function getInsertBatch($insert_array, $role_id, $delete_array) {
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        if (!empty($insert_array)) {

            $this->db->insert_batch('role_permissions', $insert_array);
        }

# Updating data
        if (!empty($delete_array)) {
            $this->db->where('role_id', $role_id);
            $this->db->where_in('permission_id', $delete_array);
            $this->db->delete('role_permissions');
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            $this->db->trans_rollback();
            return FALSE;
        } else {

            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function getPermissionWithSelectedByRole($role_id) {
        $sql = "SELECT permissions.*, role_permissions.id as `role_permission_id`,IF(role_permissions.id IS NULL,0,1) AS role_permission_state FROM `permissions` LEFT JOIN role_permissions on permissions.id=role_permissions.permission_id and role_permissions.role_id =$role_id";

        $query = $this->db->query($sql);
        return $query->result();
    }

}

?>