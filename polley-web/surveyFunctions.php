<?php
	$con = mysqli_connect("localhost", "root", "root", "polley");

	if(mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	$question = $_POST["question"];
	$surveyName = $_POST["SurveyName"];
	
	if($_POST['qType'] === 'multipleChoice')
	{
		$m1 = $_POST["m1"];
		$m2 = $_POST["m2"];
		$m3 = $_POST["m3"];
		$m4 = $_POST['m4'];
	}

	function addQuestion()
	{
		mysqli_query($con, "INSERT INTO Question (question, surveyID, questionID) VALUES(?s, ?s, ?s)", $question, $surveyID, $questionID);
	}

	function createSurvey()
	{
		mysqli_query($con, "INSERT INTO Survey (SurveyName, surveyID) VALUES(?s, ?s, ?s)", $surveyName, $surveyID);
	}

	