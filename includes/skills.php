<?php 
	
	if (isset($_POST['skill_btn'])) {
		
		$skillName = $_POST['name'];
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/skills.php';
		include '../classes/SkillsContr.php';
		$contact = new SkillsContr($skillName);

		$contact->setNewSkill();
		
	}
	