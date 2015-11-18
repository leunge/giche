<?
	class Inform_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function get_list(){
			$query=$this->db->from('test');
			return $query->get()->result_array();
		}
}

