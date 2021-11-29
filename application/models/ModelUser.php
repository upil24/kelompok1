<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }


    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }

    public function joinUser_Userrole()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        return $this->db->get();
    }
}
