<?php
	$con = mysqli_connect('localhost', 'root', '', 'polley');
	
	if (mysqli_connect_errno()) 
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$surveyName = mysql_real_escape_string($_POST["surveyName"]);
	$questionIdCount = 2;
	$surveyID = getSurveyID();
 	$result = count($_POST) - 3;
 	$array = array();
 	$quizID = array();
 	$completed = false;

	for ($i = 2; $i <= $result; $i++)
	{
	    $array[$i] = mysql_real_escape_string($_POST["questionName".$i]);
	    $quizID[$i] = getQuizID($array[$i]);
	}

	for($i = 2; $i <= $result; $i++)
	{
		echo $quizID[$i];
		echo "<br />";
	}

	function writeToDB()
	{
 		global $con, $array, $quizID, $surveyID, $surveyName, $completed, $result;
 		for($i = 2; $i <= $result; $i++)
		{	
			echo $array[$i]." <br />";
 			$insert = mysqli_query($con,"INSERT INTO Question (`question`, `surveyID`, `questionID`) VALUES (".$array[$i].", ". $surveyID. ", ".$quizID.")");
 			if(!$insert)
 				echo mysql_error();
 		}

 		mysqli_query($con, "INSERT INTO Survey (SurveyName, surveyID) VALUES ($surveyName, $surveyID)");

 		$completed = true;
 	}

	function getQuizID()
	{
		global $questionIdCount, $con;
 		$query = mysqli_query($con, "SELECT * FROM Question ORDER BY questionID DESC LIMIT 1");
 		while($row = mysqli_fetch_array($query))
 		{
 			$temp = $row['questionID'] + $questionIdCount;
 			$questionIdCount++;
 			return $temp;
		}
	}

 	function getSurveyID()
 	{
 		global $con;
 		$query = mysqli_query($con, "SELECT * FROM Question ORDER BY surveyID DESC LIMIT 1");
 		while($row = mysqli_fetch_array($query))
 		{
 			return $row['surveyID'] + 1;
 		}
 	}

 	writeToDB();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Polley</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:white;">Polley!</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          </ul>
          <h3 class="navbar-form navbar-right" style="color:white;">Hello Jim's Coffee Shop!</h3>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="createsurvey.php">Create Survey</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Create Survey</h1>
          <div class="table-responsive">


              <h3>Success! People will now be able to take your surveys!</h3>


            <pre id="result">
            </pre> 
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
