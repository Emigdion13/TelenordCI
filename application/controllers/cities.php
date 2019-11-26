<?php

/**
 * Controller cities
 * Generated by 'cCrm WIZARD'
 * @author 
 */
class cities extends CI_Controller {

    
    /**
    * Controller constructor
    */
    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_cities');
    }

    /**
     * Data method for ajax
     * This method is the standard for Grid load
     * @access public
     * @return View
     */
    public function data() {

        $page       = $this->input->post('page') ? $this->input->post('page') : 1;
        $rp         = $this->input->post('rows') ? $this->input->post('rows') : 10;
        $sortname   = $this->input->post('sidx') ? $this->input->post('sidx') : 'cities_id';
        $sortorder  = $this->input->post('sord') ? $this->input->post('sord') : 'DESC';
        $limit      = $rp * $page - $rp;
        $offset     = $rp;

        //Filters
        $filter = array();
        $filter['cities_id'] = $this->input->post('cities_id');
		$filter['cities_name'] = $this->input->post('cities_name');
		$filter['cities_type'] = $this->input->post('cities_type');
		
        $totalRecords   = $this->mdl_cities->get_cnt($filter);
        $results        = $this->mdl_cities->get_recordset($sortname, $sortorder, $limit, $offset, $filter);
        $totalPages     = ceil($totalRecords / $rp);

        $output = array(
            'total'     => $totalPages,
            'page'      => $page,
            'records'   => $totalRecords,
            'rows'      => $results
        );

        echo json_encode($output);
        
    }
} // End of Controller