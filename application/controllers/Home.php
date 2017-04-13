<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $_limit = 24;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('model_home');
    }

    public function index()
    {
        $search = $this->input->get('search');

        $query = [];
        if (strlen($search))
            $query['like'] = ['title', $search];

        $list_category = $this->model_home->get_all_category($query);
        $list_file_group_by_category = array_map(
            function($item) use ($query){
                $query['id_category'] = $item['id_category'];
                $query['status'] = true;
                $list_file = $this->model_home->get_all_file($query);

                $item['file'] = $list_file;

                return $item;
            },
            $list_category
        );
        $data['items'] = $list_file_group_by_category;
        $this->load->view('homepage', $data);
    }

    public function by_category($id_category, $current_page = 1)
    {
        $limit = $this->_limit;
        $offset = ($current_page - 1) * $limit;

        $search = $this->input->get('search');

        $query = [];
        if (strlen($search))
            $query['like'] = ['title', $search];

        $query['id_category'] = $id_category;

        $total_rows = $this->model_home->get_file_row_count($query);
        $list_file = $this->model_home->get_all_file($query, $limit, $offset);

        $data['pagination'] = $this->create_pagination(site_url('home/by_category/' . $id_category . '/'), $total_rows, $current_page);
        $data['items'] = $list_file;
        $this->load->view('by_category', $data);
    }

    function detail($id)
    {
        $data['item'] = $this->model_home->get_file_by_id($id);
        $this->load->view('detail', $data);
    }

    function create_pagination(
        $base_url, $total_rows, $current_page, $query_string = FALSE)
    {
        $config = [];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';

        $config['cur_page'] = ($current_page > ceil($total_rows / $this->_limit) ?
            ceil($total_rows / $this->_limit) : $current_page);
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['num_links'] = 3;
        $config['per_page'] = $this->_limit;
        $config['use_page_numbers'] = TRUE;

        $config['reuse_query_string'] = TRUE;
        if ($query_string !== FALSE) {
            $config['additional_query_string'] = $query_string;
        }
        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }
}
