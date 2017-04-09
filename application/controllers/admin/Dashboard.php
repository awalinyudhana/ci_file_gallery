<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 4/7/17
 * Time: 5:30 PM
 */
class Dashboard extends CI_Controller
{

    public function __consctruct()
    {
        parent::__construct();

        $this->load->helper('date');
        $this->load->libraries('grocery_CRUD');
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');

        $crud = new Grocery_CRUD();
        $crud->set_table('file');
        $crud->set_subject('File Upload');

        //callback for save date before insert
        //declare which column to updated
/*        $crud->add_fields('date_created', 'date_updated');
        $crud->edit_fields('date_updated');*/

        //declare which file type is want to change
        $crud->change_field_type('date_created', 'hidden');
        $crud->change_field_type('date_updated', 'hidden');

        //call callback function
        $crud->callback_before_insert(array($this, 'callback_insert'));
        $crud->callback_before_update(array($this, 'callback_updated'));

        $crud->field_type('date_updated', 'hidden');
        $crud->set_field_upload('file','./assets/uploads/files');

        $output = $crud->render();

        //header
        $this->load->view('admin/themes/header');
        //nav-top menu
        $this->load->view('admin/themes/nav');
        //sidebar
        $this->load->view('admin/themes/sidebar');
        //content
        $this->load->view('admin/dashboard', $output);
        //footer
        $this->load->view('admin/themes/footer');
    }

    public function callback_insert($post_array)
    {
        $post_array['date_created'] = date('Y-m-d H:i:s');
        $post_array['date_updated'] = date('Y-m-d H:i:s');
        return $post_array;
    }

    public function callback_update($post_array)
    {
        $post_array['date_updated'] = date('Y-m-d H:i:s');
        return $post_array;
    }


}