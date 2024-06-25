<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{

    function getData()
    {
        $hapus = 1;
        $this->db->where('hapus', $hapus);
        return $this->db->get('tbl_jabatan')->result();
    }

    function getDataByID($id_jabatan)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->get('tbl_jabatan')->result();
    }

    function deleteData($id_jabatan, $data)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->update('tbl_jabatan', $data);
    }

    function insertData($data)
    {
        $this->db->insert('tbl_jabatan', $data);
    }

    function updateData($id_jabatan, $data)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->update('tbl_jabatan', $data);
    }
    
    function make_query()
    {
        $hapus = 1;
        $this->db->select("*");
        $this->db->from("tbl_jabatan");
        $this->db->where('hapus', $hapus);
        $order_column = array("nama_jabatan");
        if (isset($_POST["search"]["value"])) {
            $this->db->like("nama_jabatan", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_jabatan', 'DESC');
        }
    }
    function getTable()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $hapus = 1;
        $this->db->select("*");
        $this->db->from("tbl_jabatan");
        $this->db->where('hapus', $hapus);
        return $this->db->count_all_results();
    }
}
