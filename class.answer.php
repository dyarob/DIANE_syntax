<?php

require_once('class.simplFormul.php');

class	Answer
{
	private	$str;
	private	$full_exp;
	private $simpl_formulas;
	private $simpl_fors;
	private	$simpl_fors_obj;

	public function	Answer($str, $nbs_problem)
	{
		$this->str = $str;
		$this->simpl_fors = [];
		$this->analyse($nbs_problem);
		// SQL insertion
		//$this->sql_insert($id_answer, $simpl_formula[0], $type_d_operation, $type_de_resolution, $calcul_error);
//		$this->sql_insert();
	}
		
	public function	sql_insert()
	{
		$con = mysqli_connect("demo.local.42.fr","root","coucou","diane_adelie", "3301");
		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		mysqli_query($con, "INSERT INTO answers (`string`, `full_expression`) VALUES ('$this->str', '$this->full_exp')")
			or die(mysqli_error($con));
		$id_answer = mysqli_insert_id($con);
		mysqli_close($con);
		return $id_answer;
	}

	public function	_print()
	{
		echo "voila";
	}

	// Outputs:
	// - formules simples
	function	find_simpl_for()
	{
		preg_match_all("/\d+\s*[+*-\/]\s*\d+\s*=\s*\d+/",
			$this->str, $this->simpl_formulas, PREG_SET_ORDER);
	}

	// Analyses a simple arithmetic problem answer.
	// WORKS ONLY FOR ADDITIONS / SUBSTRACTIONS!
	// NO NEGATIVE NUMBERS ALLOWED!
	public function	analyse($nbs_problem)
	{
		$this->find_simpl_for();
		//$id_answer = insert_answer($reponse);
		$i = 0;
		foreach ($this->simpl_formulas as $simpl_formula)
		{
			$this->simpl_fors_obj[$i] = new SimplFormul($simpl_formula[0], $nbs_problem, $this->simpl_fors);
			//$tmp->find_formul($nbs_problem, $this->simpl_fors);
			$this->simpl_fors_obj[$i]->_print();
			$this->simpl_fors[$this->simpl_fors_obj[$i]->result] = $this->simpl_fors_obj[$i]->formul;
			$i++;
		}
		$this->full_exp = $this->simpl_fors_obj[$i - 1]->formul;
//		print_r($this->simpl_fors);
	}
}

?>
