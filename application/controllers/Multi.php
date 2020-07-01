<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Multi extends CI_Controller {


    protected $table = 'orders';
    protected $id = 'id_order';
    protected $title = 'Multi Table Join';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Global_model', 'gm');
        $this->load->library('Shin');
        $this->column = $this->shin->findColumnAndTable($this->table);
    }

    public function index()
    {
        $order = $this->gm->leftJoinTable($this->table, $this->column)->result();
        $data = [
            'order' => $order,
            'title' => $this->title
        ];
        $this->load->view('example/multi', $data);
    }
}

/* End of file Multi.php */
