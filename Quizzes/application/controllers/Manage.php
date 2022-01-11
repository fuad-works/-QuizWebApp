<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

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
        else redirect('admin/login');
	}

	public function Exams($exam_id = 0,$do="no",$id="")
    {
        	//$table = 'clients';
			if(!isset($_SESSION['id']))
					 redirect('admin/login');

			$this->load->model('Database_model');
			
			$SideBarData['data'] = "questions";

            $this->load->view('Shared/header');
		    $this->load->view('Shared/navbar',$SideBarData);
		    $this->load->view('Shared/heading');
		    $this->load->view('Shared/sidebar',$SideBarData);
			
			if($do=="edit")
			{
				$data['row'] = $this->Database_model->get_row($id,$table);
			}
			
			if($do=="delete")
			{
				$this->Database_model->delete_row($id,$table);
				redirect('manage/Data/'.$table);
			}
			$ArrayData = array();

			if($do=="addNew" || $do=="update") 
			{

				if($table == "users")
					$ArrayData = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email_address' => $this->input->post('email_address'),
						'user_name' => $this->input->post('user_name'),
						'password' => SHA1($this->input->post('password')),
						'admin' => $this->input->post('admin')
						);

				if($table == "exams")
					$ArrayData = array(
						'title' => $this->input->post('title'),
						'allowed_time' => $this->input->post('allowed_time'),
						'user_id' => $_SESSION["id"]
						);
				
			}

			if($do=="addNew")
			{
				$this->Database_model->add_new_row($table,$ArrayData);
				redirect('manage/Data/'.$table);
			}
			
			if($do=="update")
			{
				$this->Database_model->update_row($id,$table,$ArrayData);
				redirect('manage/Data/'.$table);
			}

			$data['rows'] = $this->Database_model->get_all_Data_Sql("SELECT * FROM exams WHERE user_id = ".$_SESSION["id"]);
			$data['table'] = 'questions';
			if($exam_id != 0)
				$data['rows1'] = $this->Database_model->get_all_Data_Sql("SELECT * FROM questions WHERE exam_id = ".$exam_id);
			$data["exam_id"] = $exam_id;
            $this->load->view('pages/questionsmng',$data);
            
		    $this->load->view('Shared/footer');
	}

    public function Data($table = "table",$do="no",$id="")
    {
        	//$table = 'clients';
			if(!isset($_SESSION['id']))
					 redirect('admin/login');

			if($_SESSION['admin'] != "0" && $table == "users")
					 redirect('admin/dashboard');

			$this->load->model('Database_model');
			
			$SideBarData['data'] = $table;

            $this->load->view('Shared/header');
		    $this->load->view('Shared/navbar',$SideBarData);
		    $this->load->view('Shared/heading');
		    $this->load->view('Shared/sidebar',$SideBarData);
			
			if($do=="edit")
			{
				$data['row'] = $this->Database_model->get_row($id,$table);
			}
			
			if($do=="delete")
			{
				$this->Database_model->delete_row($id,$table);
				redirect('manage/Data/'.$table);
			}
			$ArrayData = array();

			if($do=="addNew" || $do=="update") 
			{

				if($table == "users")
					$ArrayData = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email_address' => $this->input->post('email_address'),
						'user_name' => $this->input->post('user_name'),
						'password' => SHA1($this->input->post('password')),
						'admin' => $this->input->post('admin')
						);

				if($table == "exams")
					$ArrayData = array(
						'title' => $this->input->post('title'),
						'allowed_time' => $this->input->post('allowed_time'),
						'user_id' => $_SESSION["id"]
						);
				
			}

			if($do=="addNew")
			{
				$this->Database_model->add_new_row($table,$ArrayData);
				redirect('manage/Data/'.$table);
			}
			
			if($do=="update")
			{
				$this->Database_model->update_row($id,$table,$ArrayData);
				redirect('manage/Data/'.$table);
			}
			
			$data['rows'] = $this->Database_model->get_all_Data($table);
			if($table == "exams")
			$data['rows'] = $this->Database_model->get_all_Data_Sql("SELECT * FROM exams WHERE user_id = ".$_SESSION["id"]);
			$data['table'] = $table;

			if($table == "students_log")
			$data['rows'] = $this->Database_model->get_all_Data_Sql("SELECT students_log.*,exams.title FROM students_log,exams WHERE students_log.exam_id = exams.id AND students_log.user_id = ".$_SESSION["id"]);
			//students_log

            $this->load->view('pages/'.$table,$data);
            
		    $this->load->view('Shared/footer');
	}

	public function DataQ($table = "table", $exam_id = 0, $do="no",$id="")
    {
        	//$table = 'clients';
			if(!isset($_SESSION['id']))
					 redirect('admin/login');

			$this->load->model('Database_model');
			
			$SideBarData['data'] = $table;

            $this->load->view('Shared/header');
		    $this->load->view('Shared/navbar',$SideBarData);
		    $this->load->view('Shared/heading');
		    $this->load->view('Shared/sidebar',$SideBarData);
			
			if($do=="edit")
			{
				$data['row'] = $this->Database_model->get_row($id,$table);
				$s = "SELECT * FROM answers WHERE question_id = " .$id;
				$data['ans'] = $this->Database_model->get_all_Data_Sql($s);
			}
			
			if($do=="delete")
			{
				$this->Database_model->delete_question($id);
				redirect('manage/Exams/'.$exam_id);
			}
			$ArrayData = array();

			if($do=="addNew")
			{
				$qTitle = $this->input->post('title');
				$question_type = $this->input->post('question_type');
				$aTitles = $this->input->post('titles');
				$marks = $this->input->post('marks');
				$this->Database_model->add_new_question($qTitle,$exam_id,$question_type,$aTitles,$marks);
				redirect('manage/Exams/'.$exam_id);
			}
			
			if($do=="update")
			{
				$qTitle = $this->input->post('title');
				$question_type = $this->input->post('question_type');
				$aTitles = $this->input->post('titles');
				$marks = $this->input->post('marks');
				$this->Database_model->update_question($id,$qTitle,$exam_id,$question_type,$aTitles,$marks);
				redirect('manage/Exams/'.$exam_id);
			}
			
			$data["exam_id"] = $exam_id;
			$data['rows'] = $this->Database_model->get_all_Data($table);
			if($table == "exams")
			$data['rows'] = $this->Database_model->get_all_Data_Sql("SELECT * FROM exams WHERE user_id = ".$_SESSION["id"]);
			$data['table'] = $table;

            $this->load->view('pages/'.$table,$data);
            
		    $this->load->view('Shared/footer');
	}

	public function EndExam($exam_id)
    {
			if(!isset($_SESSION['id']))
					 redirect('admin/login');
			
			if(!isset($_SESSION['exam_id']))
					redirect('admin/dashboard');

			$_SESSION["end_exam"] = date("Y-m-d h:i:sa");

			$this->load->model('Database_model');

			$this->benchmark->mark('endpoint');

			$SideBarData['data'] = "Data";

			
			$score = 0;
			$timeFirst  = strtotime($_SESSION["start_exam"]);
			$timeSecond = strtotime($_SESSION["end_exam"]);
			$time_taken = $timeSecond - $timeFirst;

			$exam_id = $_SESSION['exam_id'];
			$questions = $this->Database_model->get_all_Data_Sql("SELECT * FROM questions WHERE exam_id=".$exam_id);
			$index = 1;
			foreach($questions as $q1)
			{
				$s = "SELECT * FROM answers WHERE question_id = " .$q1->id;
				$answers = $this->Database_model->get_all_Data_Sql($s);

				foreach($answers as $ans)
				{
					if(isset($_SESSION['answer'.$index]))
						if($_SESSION['answer'.$index])
							foreach($_SESSION['answer'.$index] as $nn)
								if($nn == $ans->id)
									$score += $ans->mark;
				}
				$index++;
			}

			
			$ArrayData = array(
				'user_id' => $_SESSION['id'],
				'exam_id' => $exam_id,
				'total_mark' => $score,
				'time_taken' => $time_taken
				);
			
			$this->Database_model->add_new_row("students_log",$ArrayData);

			$data["score"] = $score;
			$data["time_taken"] = $time_taken;

            $this->load->view('Shared/header');
		    $this->load->view('Shared/navbar',$SideBarData);
		    $this->load->view('Shared/heading');
		    $this->load->view('Shared/sidebar',$SideBarData);

			//Close End Exam and destroy Session
			$f_name = $_SESSION['first_name'];
			$admin = $_SESSION['admin'];
			$last_name = $_SESSION['last_name'];
			$dateCreated = $_SESSION['date_created'];
			$image_path = $_SESSION['image_path'];
			$uid = $_SESSION['id'];

			session_destroy();
			session_start();

			$_SESSION['first_name'] = $f_name;
			$_SESSION['admin'] = $admin;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['date_created'] = $dateCreated;
			$_SESSION['image_path'] = $image_path;
			$_SESSION['id'] = $uid;


			
			$this->load->view('pages/result',$data);
            
			$this->load->view('Shared/footer');
	}


	public function Exam($exam_id = 0,$do="no",$q_count=1)
    {
			if(!isset($_SESSION['id']))
					 redirect('admin/login');

			if(!isset($_SESSION['start_exam']))
				$_SESSION["start_exam"] = date("Y-m-d h:i:sa");

			$this->load->model('Database_model');

			$_SESSION['exam_id'] = $exam_id;
			$_SESSION['questions'] = $this->Database_model->get_count_sql("questions","exam_id",$exam_id);
			$_SESSION['current_question'] = $q_count;
			
			$data["questions"] = $this->Database_model->get_all_Data_Sql("SELECT * FROM questions WHERE exam_id = ".$exam_id);
			$alwoed_time = $this->Database_model->get_all_Data_Sql_row("SELECT * FROM exams WHERE id = ".$exam_id)->allowed_time;

			$timeFirst  = strtotime($_SESSION["start_exam"]);
			$timeSecond = strtotime(date("Y-m-d h:i:sa"));
			$elapsed = $timeSecond - $timeFirst;

			$_SESSION['remain_time'] = ($alwoed_time * 60) - $elapsed;

			$SideBarData['data'] = "questions";
			$SideBarData['questions'] = $data["questions"];
			$SideBarData['exam_id'] = $exam_id;
			$SideBarData['q_count'] = $q_count;
			$SideBarData['remain_time'] = $_SESSION['remain_time'];

            $this->load->view('Shared/header');
		    $this->load->view('Shared/navbar',$SideBarData);
		    $this->load->view('Shared/heading');
			$this->load->view('Shared/sidebar_q',$SideBarData);
			
			if($do == "answer")
			{
				$_SESSION['answer'.$q_count] = $this->input->post('answer');
			}

			$data['table'] = 'questions';
			
			$data["exam_id"] = $exam_id;

			$data["question"] = $this->Database_model->get_all_Data_Sql_row("SELECT * FROM questions WHERE exam_id = ".$exam_id." LIMIT ".($q_count-1).",1");
			if($data["question"])
			{
				$s = "SELECT * FROM answers WHERE question_id = " .$data["question"]->id;
				$data['ans'] = $this->Database_model->get_all_Data_Sql($s);
			}
			
			
			$this->load->view('pages/question',$data);
            
			$this->load->view('Shared/footer');
	}
	

}
