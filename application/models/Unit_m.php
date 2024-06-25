<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{

    function getData()
    {
        $hapus = 1;
        $this->db->where('hapus', $hapus);
        return $this->db->get('tbl_unit')->result();
    }

    function getDataByID($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        return $this->db->get('tbl_unit')->result();
    }

    function deleteData($id_unit, $data)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->update('tbl_unit', $data);
    }

    function insertData($data)
    {
        $this->db->insert('tbl_unit', $data);
    }

    function updateData($id_unit, $data)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->update('tbl_unit', $data);
    }
    
    function make_query()
    {
        $hapus = 1;
        $this->db->select("*");
        $this->db->from("tbl_unit");
        $this->db->where('hapus', $hapus);
        $order_column = array("nama_unit");
        if (isset($_POST["search"]["value"])) {
            $this->db->like("nama_unit", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_unit', 'DESC');
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
        $this->db->from("tbl_unit");
        $this->db->where('hapus', $hapus);
        return $this->db->count_all_results();
    }
}
