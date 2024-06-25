<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index()
    {
        check_not_login();
        $data['jabatan'] = $this->user_m->getJabatan();
        $data['unit'] = $this->user_m->getUnit();
        $this->template->load('template', 'user_v', $data);
    }
    function ambilDataByid()
    {
        $id = $this->input->post('id');
        $data = $this->user_m->getDataByID($id);
        echo json_encode($data);
    }
    function ambilData()
    {
        $data = $this->user_m->getData();
        echo json_encode($data);
    }

    function hapusData()
    {
        $hapus = 2;
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
        $id = $this->input->post('id_karyawan');
        $data = [
            'hapus' => $hapus, 'updated_by' => $updated_by,
            'updated_date' => $updated_date, 'computer' => $computer
        ];
        $data = $this->user_m->deleteData($id, $data);
        echo json_encode($data);
    }

    function tambahData()
    {
        $nama     = $this->input->post('nama');
        $username  = $this->input->post('username');
        $password = $this->input->post('password');
        $id_unit   = $this->input->post('unit');
        $id_jabatan  = $this->input->post('jabatan');
        $tanggal_masuk = $this->input->post('tanggal');
        $created_by = $this->fungsi->user_login()->username;
        $computer = gethostname();
        $data = [
            'nama' => $nama, 'username' => $username, 'password' => md5($password), 'id_unit' => $id_unit,
            'id_jabatan' => $id_jabatan, 'tanggal_masuk'=> $tanggal_masuk, 'created_by' => $created_by, 'computer' => $computer
        ];
        $data = $this->user_m->insertData($data);
        echo json_encode($data);
    }

    function perbaruiData()
    {
        $id_karyawan     = $this->input->post('id_karyawan');
        $nama     = $this->input->post('nama');
        $password = $this->input->post('password');
        $id_unit   = $this->input->post('unit');
        $id_jabatan  = $this->input->post('jabatan');
        $tanggal_masuk = $this->input->post('tanggal');
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
        if($password==""){
             $data = [
            'nama' => $nama, 'id_unit' => $id_unit, 'id_jabatan' => $id_jabatan,
            'tanggal_masuk'=>$tanggal_masuk,'updated_by' => $updated_by, 'updated_date' => $updated_date, 'computer' => $computer
        ];

        }else{
            $data = [
                'nama' => $nama, 'password' => md5($password), 'id_unit' => $id_unit, 'id_jabatan' => $id_jabatan,
                'tanggal_masuk'=>$tanggal_masuk,'updated_by' => $updated_by, 'updated_date' => $updated_date, 'computer' => $computer
            ];
    
        }
       
        $data = $this->user_m->updateData($id_karyawan, $data);
        echo json_encode($data);
    }
    function table()
    {
        $this->load->model("User_m");
        $fetch_data = $this->User_m->getTable();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $no++;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->username;
            $sub_array[] = $row->password;
            $sub_array[] = $row->nama_unit;
            $sub_array[] = $row->nama_jabatan;
            $sub_array[] = $row->tanggal_masuk;
            $sub_array[] = '<button type="button" name="update" data-id="' . $row->id_karyawan . '" class="btn btn-primary btn_edit fa fa-pencil-square-o"> Update</button>  <button type="button" name="delete" data-id="' . $row->id_karyawan . '" class="btn btn-danger btn_hapus fa fa-trash"> Delete</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->User_m->get_all_data(),
            "recordsFiltered"     =>     $this->User_m->get_filtered_data(),
            "data"                =>     $data
        );
        echo json_encode($output);
    }
}
