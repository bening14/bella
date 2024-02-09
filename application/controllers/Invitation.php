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
}
