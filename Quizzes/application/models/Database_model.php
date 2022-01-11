<?php
class Database_model extends CI_Model {
	
	public function get_all_Data($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_count_sql($table,$w1,$w2)
	{
		$sql = "SELECT COUNT(*) as countNum FROM ".$table. " WHERE " .$w1. " = " . $w2;
		$query = $this->db->query($sql);
		return $query->row()->countNum;
	}

	public function get_count($table)
	{
		$sql = "SELECT COUNT(*) as countNum FROM ".$table;
		$query = $this->db->query($sql);
		return $query->row()->countNum;
	}

	public function get_all_Data_Sql($sql)
	{
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_all_Data_Sql_row($sql)
	{
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function get_row($id,$table)
	{
		$query = $this->db->where('id',$id)->get($table);
		return $query->row();
	}
	
	public function add_new_row($table,$ArrayData)
	{
		$str = $this->db->set($ArrayData)->get_compiled_insert($table);
		$this->db->query($str);
	}
	
	public function update_row($id,$table,$ArrayData)
	{
		$str = $this->db->set($ArrayData)->where('id', $id)->get_compiled_update($table);
		$this->db->query($str);
	}
	
	public function delete_row($id,$table)
	{
		$str = 'DELETE FROM '.$table.' WHERE id = '.$id;
		$this->db->query($str);
	}

	public function delete_question($id)
	{
		$str = 'DELETE FROM answers WHERE question_id = '.$id;
			$this->db->query($str);
			
		$str = 'DELETE FROM questions WHERE id = '.$id;
			$this->db->query($str);
		
	}

	public function add_new_question($qTitle,$exam_id,$question_type,$aTitles,$marks)
	{
		$query = $this->db->query("SHOW TABLE STATUS WHERE name='questions'");
		$row = $query->row();
		$next_inc_value = 0;
		$next_inc_value = $row->Auto_increment; 
		
		$data = array(
		'title' => $qTitle,
		'exam_id' => $exam_id,
		'question_type' => $question_type
		);
		
		$str = $this->db->set($data)->get_compiled_insert('questions');
		$this->db->query($str);
		
		for($i=0;$i<count($aTitles);$i++)
			{
			$data = array(
			'title' => $aTitles[$i],
			'question_id' => $next_inc_value,
			'mark' => $marks[$i]
			);
			$str = $this->db->set($data)->get_compiled_insert('answers');
			$this->db->query($str);
			}
	}

	public function update_question($id,$qTitle,$exam_id,$question_type,$aTitles,$marks)
	{
		$data = array(
			'title' => $qTitle,
			'exam_id' => $exam_id,
			'question_type' => $question_type
			);

		$str = $this->db->set($data)->where('id', $id)->get_compiled_update('questions');
		$this->db->query($str);
		
			$str = 'DELETE FROM answers WHERE question_id = '.$id;
			$this->db->query($str);

			for($i=0;$i<count($aTitles);$i++)
			{
			$data = array(
			'title' => $aTitles[$i],
			'question_id' => $id,
			'mark' => $marks[$i]
			);
			$str = $this->db->set($data)->get_compiled_insert('answers');
			$this->db->query($str);
			}

	}


}
?>
