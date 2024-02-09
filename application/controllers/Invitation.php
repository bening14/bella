<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invitation extends CI_Controller
{
    // public function __construct()
    // {
    // }

    public function index()
    {
        $this->load->model("Crud", "crud");

        $data['count'] = $this->Crud->count_all('tbl_ucapan');
        $data['all'] = $this->Crud->get_all('tbl_ucapan')->result_array();
        // echo $this->db->last_query();
        // die;
        $this->load->view('invitation', $data);
    }

    public function insert_data()
    {
        $this->load->model("Crud", "crud");

        $table = $this->input->post("table");
        $data = $this->input->post();
        unset($data['table']);

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die;

        $insert_data = $this->crud->insert($table, $data);

        $getdata = $this->crud->get_all($table)->result();


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!', 'data' => $getdata];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }
}
