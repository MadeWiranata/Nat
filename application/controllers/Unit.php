<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('unit_m');
    }
    public function index()
    {
        check_not_login();
        $this->template->load('template', 'v_unit');
    }
    function ambilDataByid()
    {
        $id = $this->input->post('id');
        $data = $this->unit_m->getDataByID($id);
        echo json_encode($data);
    }
    function ambilData()
    {
        $data = $this->unit_m->getData();
        echo json_encode($data);
    }

    function hapusData()
    {
        $hapus = 2;
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
        $id = $this->input->post('id_unit');
        $data = [
            'hapus' => $hapus, 'updated_by' => $updated_by,
            'updated_date' => $updated_date, 'computer' => $computer
        ];
        $data = $this->unit_m->deleteData($id, $data);
        echo json_encode($data);
    }

    function tambahData()
    {
        $unit     = $this->input->post('unit');
        $created_by = $this->fungsi->user_login()->username;
        $computer = gethostname();
        $data = [
            'nama_unit' => $unit, 'created_by' => $created_by, 'computer' => $computer
        ];
        $data = $this->unit_m->insertData($data);
        echo json_encode($data);
    }

    function perbaruiData()
    {
        $id_unit     = $this->input->post('id_unit');
        $unit     = $this->input->post('unit');
        $updated_by = $this->fungsi->user_login()->username;
        date_default_timezone_set('Asia/Jakarta');
        $updated_date = date("Y-m-d H:i:s");
        $computer = gethostname();
      
            $data = [
                'nama_unit' => $unit, 'updated_by' => $updated_by, 'updated_date' => $updated_date, 'computer' => $computer
            ];
       
        $data = $this->unit_m->updateData($id_unit, $data);
        echo json_encode($data);
    }
    function table()
    {
        $this->load->model("unit_m");
        $fetch_data = $this->unit_m->getTable();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $no++;
            $sub_array[] = $row->nama_unit;
            $sub_array[] = $row->created_by;
            $sub_array[] = $row->created_date;
            $sub_array[] = $row->updated_by;
            $sub_array[] = $row->updated_date;
            $sub_array[] = $row->computer;
            $sub_array[] = '<button type="button" name="update" data-id="' . $row->id_unit . '" class="btn btn-primary btn_edit fa fa-pencil-square-o"> Update</button>  <button type="button" name="delete" data-id="' . $row->id_unit . '" class="btn btn-danger btn_hapus fa fa-trash"> Delete</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->unit_m->get_all_data(),
            "recordsFiltered"     =>     $this->unit_m->get_filtered_data(),
            "data"                =>     $data
        );
        echo json_encode($output);
    }
}
