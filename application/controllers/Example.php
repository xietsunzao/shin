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
        $this->id = $this->uri->segment(3);
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

    public function where()
    {
        $getRow = $this->gm->leftJoinWhere($this->table, $this->column, $this->id);
        if ($getRow->num_rows() > 0) {
            $row = $getRow->row();
            $data = [
                'title' => 'Join Tables Where Statement (PK)',
                'product_name' => $row->product_name,
                'category_name' => $row->category_name,
                'price' => $row->price,
                'id_category' => $row->id_category,
                'id_product' => $row->id_product
            ];
            $this->load->view('example/where', $data);
        } else {
            redirect('home');
            echo "row not found!";
        }
    }
}

/* End of file Example.php */
