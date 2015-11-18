<?
	class Scaff extends CI_Controller{
		public function __construct(){
			parent::__construct();
			
		}
			function Scaff(){
				//parent::Controller();
				$this->load->helper('url');
				
			}

			function lists(){
 $data['query']=$this->db->get('inform');
			echo "aaa";
			$this->load->view('scaff',$data);
		
			}
			
		}

		?>