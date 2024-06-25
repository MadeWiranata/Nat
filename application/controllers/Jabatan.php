<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jabatan_m');
    }
    public function index()
    {
        check_not_login();
        $this->template->load('template', 'v_jabatan');
    }
    function ambilDataByid()
    {
        $id = $this->input->post('id');
        $data = $this->jabatan_m->getDataByID($id);
        echo json_encode($data);
    }
    function ambilData()
    {
        $data = $this->jabatan_m->getData();
        echo json_encode($data);
    }

    function hapusData()
    {
        $hapus = 2;
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
        $id = $this->input->post('id_jabatan');
        $data = [
            'hapus' => $hapus, 'updated_by' => $updated_by,
            'updated_date' => $updated_date, 'computer' => $computer
        ];
        $data = $this->jabatan_m->deleteData($id, $data);
        echo json_encode($data);
    }

    function tambahData()
    {
        $jabatan     = $this->input->post('jabatan');
        $created_by = $this->fungsi->user_login()->username;
        $computer = gethostname();
        $data = [
            'nama_jabatan' => $jabatan, 'created_by' => $created_by, 'computer' => $computer
        ];
        $data = $this->jabatan_m->insertData($data);
        echo json_encode($data);
    }

    function perbaruiData()
    {
        $id_jabatan     = $this->input->post('id_jabatan');
        $jabatan     = $this->input->post('jabatan');
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
      
            $data = [
                'nama_jabatan' => $jabatan, 'updated_by' => $updated_by, 'updated_date' => $updated_date, 'computer' => $computer
            ];
       
        $data = $this->jabatan_m->updateData($id_jabatan, $data);
        echo json_encode($data);
    }
    function table()
    {
        $this->load->model("jabatan_m");
        $fetch_data = $this->jabatan_m->getTable();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $no++;
            $sub_array[] = $row->nama_jabatan;
            $sub_array[] = $row->created_by;
            $sub_array[] = $row->created_date;
            $sub_array[] = $row->updated_by;
            $sub_array[] = $row->updated_date;
            $sub_array[] = $row->computer;
            $sub_array[] = '<button type="button" name="update" data-id="' . $row->id_jabatan . '" class="btn btn-primary btn_edit fa fa-pencil-square-o"> Update</button>  <button type="button" name="delete" data-id="' . $row->id_jabatan . '" class="btn btn-danger btn_hapus fa fa-trash"> Delete</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->jabatan_m->get_all_data(),
            "recordsFiltered"     =>     $this->jabatan_m->get_filtered_data(),
            "data"                =>     $data
        );
        echo json_encode($output);
    }
}
