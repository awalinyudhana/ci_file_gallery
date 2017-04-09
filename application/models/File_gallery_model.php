<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 4/9/17
 * Time: 5:08 PM
 */
class File_gallery_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function all(){
        $hasil = $this->db->get('file');
        if ($hasil->num_rows() > 0) {
            return $hasil;
        } else {
            return array();
        }
    }

    public function findByCategory($category){ }
}