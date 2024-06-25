<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
function getJabatan()
    {
        $query = $this->db->query('SELECT COUNT(id_jabatan) as jabatan FROM tbl_jabatan');
        return $query->result();
    }
    function getUnit()
    {
        $query = $this->db->query('SELECT COUNT(id_unit) as unit FROM tbl_unit');
        return $query->result();
    }
    function getLogin()
    {
        $query = $this->db->query('SELECT count(id) as login FROM tbl_login where status = 1');
        return $query->result();
    }
    function getKaryawan()
    {
        $query = $this->db->query('SELECT count(username) as karyawan FROM tbl_karyawan');
        return $query->result();
    }
}