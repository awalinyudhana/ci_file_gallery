<?php

/**
 * Class File_gallery_model
 */
class Model_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_category($where = [])
    {
        $this->db
            ->select('category.*, IFNULL(COUNT(file.id), 0) as total_file')
            ->from('category')
            ->join('file', 'file.id_category = category.id_category')
            ->group_by('category.id_category')
            ->order_by('category.id_category', 'ASC');

        if ( ! is_null($where) && key_exists('like', $where)){
            $this->db->like('file.'.$where['like'][0], $where['like'][1]);
            unset($where['like']);
        }

        if ( ! is_null($where) && is_array($where))
            foreach($where as $key => $value)
            {
                $this->db->where('file.'.$key, $value);
            }

        return $this->db->get()->result_array();
    }

    public function get_all_file($where, $limit=6, $offset=0)
    {
        $this->db->from('file');

        if ( ! is_null($where) && key_exists('like', $where)){
            $this->db->like('file.'.$where['like'][0], $where['like'][1]);
            unset($where['like']);
        }

        if ( ! is_null($where) && is_array($where))
            foreach($where as $key => $value)
            {
                $this->db->where('file.'.$key, $value);
            }

        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }


    function get_file_row_count($where = NULL)
    {
        if ( ! is_null($where) && key_exists('like', $where)){
            $this->db->like('file.'.$where['like'][0], $where['like'][1]);
            unset($where['like']);
        }

        if ( ! is_null($where) && is_array($where))
            foreach($where as $key => $value)
            {
                $this->db->where('file.'.$key, $value);
            }

        return $this->db->count_all_results('file');

    }

    function get_file_by_id($id)
    {
        return $this->db
            ->select('file.*, category.title as title_category')
            ->from('file')
            ->join('category', 'file.id_category = category.id_category')
            ->where('file.id', $id)
            ->get()
            ->row_array();
    }
}