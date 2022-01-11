<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                session_start();
		}
		
	public function index()
	{
		if(isset($_SESSION['username']))
				{
					redirect('admin/dashboard');
				}
				
            $this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			
			if ($this->form_validation->run() !== false)
			{
				$this->load->model('admin_model');
				$res = $this->
						admin_model
						->verify_user(
						$this->input->post('username'),
						$this->input->post('password')
						);
					if($res != false)
					{
						$_SESSION['first_name'] = $res->first_name;
						$_SESSION['admin'] = $res->admin;
						$_SESSION['last_name'] = $res->last_name;
						$_SESSION['date_created'] = $res->date_created;
						$_SESSION['image_path'] = $res->image_path;
						$_SESSION['id'] = $res->id;
						redirect("admin/dashboard");
					}
			}
		$this->load->view('Shared/header');
		$this->load->view('Shared/navbar');
		$this->load->view('login');
		$this->load->view('Shared/footer');

		
	}

	public function profile($todo="")
        {
			if(!isset($_SESSION['id']))
					 redirect('admin/login');

		$this->load->model('Database_model'); 
		$SideBarData["data"] = "Data";

		$this->load->view('Shared/header');
		$this->load->view('Shared/navbar',$SideBarData);
		$this->load->view('Shared/heading');
		$this->load->view('Shared/sidebar',$SideBarData);

		

				 
			$this->load->model('admin_model');
			
			if($todo == "password")
			{
				$res = $this->
						admin_model
						->update_password($_SESSION['id'],$this->input->post('password'));	
				redirect("admin/profile");
			}
			if($todo == "info")
			{
				$res = $this->
						admin_model
						->update_personal_info($_SESSION['id'],
						$this->input->post('first_name'),
						$this->input->post('last_name'),
						$this->input->post('user_name'),
						$this->input->post('email_address')
						);	
				redirect("admin/profile");
			}
			
			if($todo == "image")
			{
				$config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('image'))
                {
                        $file_name = $this->upload->data('file_name'); 
						$res = $this->
						admin_model
						->change_image($_SESSION['id'],$file_name
						);	
                }
                }
			
			$res = $this->
						admin_model
						->get_user_data($_SESSION['id']);
			$data['first_name'] = $res->first_name;
			$data['last_name'] = $res->last_name;
			$data['user_name'] = $res->user_name;
			$data['email_address'] = $res->email_address;
			$data['password'] = $res->password;
			$data['image_path'] = $res->image_path;
			$this->load->view('admin/profile',$data);
			$this->load->view('Shared/footer');

        }

	public function dashboard()
        {
		if(!isset($_SESSION['id']))
					 redirect('admin/login');

		$this->load->model('Database_model');
		
		$table = "exams";
		$sql = "SELECT exams.*,users.first_name , users.last_name FROM exams,users WHERE exams.user_id = users.id";
		$data['rows'] = $this->Database_model->get_all_Data_Sql($sql);
		$data['table'] = $table;

		$SideBarData["data"] = "Data";
		
		$this->load->view('Shared/header');
		$this->load->view('Shared/navbar',$SideBarData);
		$this->load->view('Shared/heading');
		$this->load->view('Shared/sidebar',$SideBarData);
		$this->load->view('dashboard',$data);
		$this->load->view('Modals/add');
		$this->load->view('Shared/footer');
		}
		
	public function logout()
        {
			session_destroy();
            redirect('admin/index');
        }

	function login()
	{
		$this->load->view('Shared/header');
		$this->load->view('Shared/navbar');
		$this->load->view('login');
		$this->load->view('Shared/footer');
	}

	function signUp($do = "No")
	{
		if($do == "add")
		{
			$this->load->model('Database_model');
			
			$ArrayData = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_address' => $this->input->post('email_address'),
				'user_name' => $this->input->post('user_name'),
				'password' => SHA1($this->input->post('password')),
				'admin' => $this->input->post('admin')
			);
			
			$this->Database_model->add_new_row("users",$ArrayData);
				redirect('admin/login');
		}
		$this->load->view('Shared/header');
		$this->load->view('Shared/navbar');
		$this->load->view('signUp');
		$this->load->view('Shared/footer');
	}


}
