<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Complex extends CI_Controller {


    protected $table = 'sale';
    protected $id = 'id_sale';
    protected $title = 'Multi Relational Table Join';

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
        $this->load->view('example/complex', $data);
    }
}

/* End of file Complex.php */
