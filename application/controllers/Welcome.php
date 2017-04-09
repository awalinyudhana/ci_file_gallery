<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_gallery_model');
        $this->load->helper('html');
    }


	public function index()
	{
	    $data['file_gallery'] = $this->File_gallery_model->all()->result();



		$this->load->view('welcome_message', $data);
	}
}
