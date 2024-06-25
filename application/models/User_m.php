<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('vwlogin');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }
    public function pantau($post)
    {
        $computer = gethostname();
        $status = 0;
        $update = 1;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $username = $this->fungsi->user_login()->username;
        $cek = [
            'username' => $username, 'status' => $status,
            'tanggal_out'=>$updated_date, 'computer' => $computer
        ];
        $this->db->where('status', $update);
        $this->db->update('tbl_login', $cek);

        $data = [
            'username' => $post['username'],
            'computer' => $computer
        ];
        $this->db->insert('tbl_login', $data);


    }
    public function Out()
    {
        $computer = gethostname();
        $status = 0;
        $update = 1;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $username = $this->fungsi->user_login()->username;
        $data = [
            'username' => $username, 'status' => $status,
            'tanggal_out'=>$updated_date, 'computer' => $computer
        ];
        $this->db->where('status', $update);
       $this->db->update('tbl_login', $data);
       
    }
    public function get($id = null)
    {
        $this->db->from('vwlogin');
        if ($id != null) {
            $this->db->where('username', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getData()
    {
        $hapus = 1;
        $this->db->where('hapus', $hapus);
        return $this->db->get('vwlogin')->result();
    }

    function getDataByID($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->get('vwlogin')->result();
    }

    function deleteData($id_karyawan, $data)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('tbl_karyawan', $data);
    }

    function insertData($data)
    {
        $this->db->insert('tbl_karyawan', $data);
    }

    function updateData($id_karyawan, $data)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('tbl_karyawan', $data);
    }
    function getJabatan()
    {
        $query = $this->db->query('SELECT id_jabatan,nama_jabatan FROM tbl_jabatan');
        return $query->result();
    }
    function getUnit()
    {
        $query = $this->db->query('SELECT id_unit,nama_unit FROM tbl_unit');
        return $query->result();
    }
    function make_query()
    {
        $hapus = 1;
        $this->db->select("*");
        $this->db->from("vwlogin");
        $this->db->where('hapus', $hapus);
        $order_column = array("username");
        if (isset($_POST["search"]["value"])) {
            $this->db->like("username", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_karyawan', 'DESC');
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
        $this->db->from("vwlogin");
        $this->db->where('hapus', $hapus);
        return $this->db->count_all_results();
    }
}
