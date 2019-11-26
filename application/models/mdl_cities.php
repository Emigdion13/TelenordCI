<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* Model generate by cCrm Wizard
* Model for table: cities
* File name: mdl_cities.php
*/

class mdl_cities extends CI_Model {
    
    private $tablename = 'cities';

    private $dynamicQuery = null;

    public function __construct() {
	    parent::__construct();
        $this->load->database();
    }

    /**
    * Get record 
    * @param mixed $cities_id | Primary key
    * @return new mdl_cities_Object or FALSE If record not found.
    */
    public function get($cities_id) {

    	$this->db->where('cities_id', $cities_id);
    	$query = $this->db->get($this->tablename);

    	if ($query->num_rows()) {
            return new mdl_cities_Object($query->row());
	    }
    	return FALSE;
    }
    
    /**
     * Insert record
     * @param mdl_cities_Object $record
     * @return type 
     */
    public function insert(mdl_cities_Object $record) {
        
        $data = array(
        	'cities_name'	 => $record->getCities_name(),
	'cities_type'	 => $record->getCities_type()
        );
        
        $this->db->insert($this->tablename, $data);
        
        return $this->db->insert_id();
    }
    
    /**
     * Update record
     * @param mdl_cities_Object $record
     * @return type 
     */
    public function update(mdl_cities_Object $record) {
        
        $data = array(
        	'cities_name'	 => $record->getCities_name(),
	'cities_type'	 => $record->getCities_type()
        );
        
        $this->db->update( $this->tablename, $data, array( 'cities_id' => $record->getCities_id() ) );
    }

    // Filter Database
    private function db_filter($filter = array()){
        	if ( $filter['cities_id'] )
		$this->db->like('cities_id', $filter['cities_id']);
	if ( $filter['cities_name'] )
		$this->db->like('cities_name', $filter['cities_name']);
	if ( $filter['cities_type'] )
		$this->db->like('cities_type', $filter['cities_type']);

    }

    /**
     * Get record set for Grid
     * @param null $sortname
     * @param null $sortorder
     * @param null $limit
     * @param null $offset
     * @param array $filter
     * @return array
     */
    public function get_recordset($sortname = NULL, $sortorder = NULL, $limit = NULL, $offset = NULL, $filter = array()) {
        
        $this->db->select('c.*')->from($this->tablename . ' c');

        $this->db_filter($filter);

      
        // Order by
        if ($sortname && $sortorder)
            $this->db->order_by($sortname, $sortorder);
        if ($limit && $offset)
            $this->db->limit($offset, $limit);
        
        $query = $this->db->get();
        if ($query->num_rows()) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else 
            return array();
    }

    /**
     * Get count all resuts
     * @param $filter
     * @return Int
     */
    public function get_cnt($filter = array()) {
        $this->db->from($this->tablename . ' c');
        
        $this->db_filter($filter);
        
        return $this->db->count_all_results();
    }
    
    /**
     * Delete Record if can be deleted
     * @param mdl_cities_Object $record
     * @return boolean 
     */
    public function delete(mdl_cities_Object $record) {
        if( ! $this->can_delete( $record ) )
            return false;
        
        $this->db->delete( $this->tablename, array('cities_id' => $record->getCities_id() ) );
        return true;        
    }
    
    /**
     * Check if can be deleted an item based on policy
     * @param mdl_cities_Object $record
     * @return boolean 
     */
    public function can_delete(mdl_cities_Object $record) {
        
        return true;
    }

}
/**
* End of Model CRUD
*/

/**
* Active Records, Model of table: cities
*/
class mdl_cities_Object {
    
	private $cities_id;
	private $cities_name;
	private $cities_type;

    
    function __construct($row = null) {
        if($row) {
            		$this->cities_id	= $row->cities_id;
		$this->cities_name	= $row->cities_name;
		$this->cities_type	= $row->cities_type;

        }
    }
    
                
    /**
    * On table, the value is: int(11)
    * @param mixed $value
    */
    function setCities_id($value) { 
        $this->cities_id = $value;
    }

    /**
    * cities_id
    * @return mixed int(11) | This is the type on the table.
    */
    function getCities_id() { 
        return $this->cities_id;
    }            
    /**
    * On table, the value is: varchar(70)
    * @param mixed $value
    */
    function setCities_name($value) { 
        $this->cities_name = $value;
    }

    /**
    * cities_name
    * @return mixed varchar(70) | This is the type on the table.
    */
    function getCities_name() { 
        return $this->cities_name;
    }            
    /**
    * On table, the value is: varchar(20)
    * @param mixed $value
    */
    function setCities_type($value) { 
        $this->cities_type = $value;
    }

    /**
    * cities_type
    * @return mixed varchar(20) | This is the type on the table.
    */
    function getCities_type() { 
        return $this->cities_type;
    }

}

/**
* End of file: mdl_cities.php 
*/