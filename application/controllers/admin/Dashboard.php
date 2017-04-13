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
        $crud->set_relation('id_category','category','Title');
        $crud->unset_texteditor('description');

        $crud->required_fields('title','author','file', 'id_category');

        //declare which file type is want to change
        $crud->change_field_type('status', 'hidden');
        $crud->change_field_type('date_created', 'hidden');
        $crud->change_field_type('date_updated', 'hidden');

        //call callback function
        $crud->callback_before_insert(array($this, 'callback_insert'));
        $crud->callback_before_update(array($this, 'callback_updated'));

        $crud->field_type('date_updated', 'hidden');
        $crud->set_field_upload('file','./assets/uploads/files');
        $crud->set_field_upload('thumbnail','./assets/uploads/files');

        $output = $crud->render();
        $this->load->view('admin/dashboard', $output);
    }

    public function callback_insert($post_array)
    {
        $post_array['status'] = TRUE;
        $post_array['date_created'] = date('Y-m-d H:i:s');
        $post_array['date_updated'] = date('Y-m-d H:i:s');
        return $post_array;
    }

    public function callback_update($post_array)
    {
        $post_array['date_updated'] = date('Y-m-d H:i:s');
        return $post_array;
    }


    public function category()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');

        $crud = new Grocery_CRUD();
        $crud->set_table('category');
        $crud->set_subject('Category File');
        $crud->unset_texteditor('description');

        $crud->required_fields('title');
        $crud->set_field_upload('thumbnail','./assets/uploads/files');

        $output = $crud->render();
        $this->load->view('admin/dashboard', $output);
    }


}