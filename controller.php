<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
class Cg extends CI_Controller
{
		function __construct()
		{
			parent::__construct();
			$this->load->model('cg_model');
		}
		public function index()
		{
			$md = $this->cg_model->getUsers();
			print_r($md);
		}
		public function login()
		{
			$param = file_get_contents("php://input");
			$request = json_decode($param);
			$loginValidate = $this->cg_model->login($request);
			if(count($loginValidate) > 0)
			{
				$data = array('status'=>200,'data'=>$loginValidate[0]);
			}
			else
			{
				$data = false;
			}
			
			echo json_encode($data);
		}
		public function getClients()
		{
			$users = $this->cg_model->getUsers();
			if(count($users) > 0)
			{
				$data = array('status'=>200,'data'=>$users);
			}
			else
			{
				$data = false;
			}
			echo json_encode($data);
		}
		public function getClient($id)
		{
			$users = $this->cg_model->getUsers($id);
			if(count($users) > 0)
			{
				$data = array('status'=>200,'data'=>$users);
			}
			else
			{
				$data = false;
			}
			echo json_encode($data);
		}
}
?>
