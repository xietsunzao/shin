<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Example extends CI_Controller
{

    protected $table = 'product';
    protected $id = 'id_product';
    protected $title = 'Data Product';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Global_model', 'gm');
        $this->load->library('Shin');
        $this->column = $this->shin->findColumnAndTable($this->table);
    }

    public function index()
    {
        $product = $this->gm->leftJoinTable($this->table, $this->column)->result();
        $data = [
            'product' => $product,
            'title' => $this->title
        ];
        $this->load->view('example/list', $data);
    }
}

/* End of file Example.php */
