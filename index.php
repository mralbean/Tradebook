<?php
date_default_timezone_set('America/Los_Angeles'); //set timezone
$submitted = $_POST['submitted'];
$reset = $_POST['reset'];
$email = htmlentities($_POST['email']);
$pass = htmlentities($_POST['passwd']);
$modal = "";

if ($submitted == "1") {
	if ($email && $pass) {
		if (strpos($email,"@ucsd.edu") !== false) {
			$modal .= "<div class=\"alert alert-success alert-dismissable\">";
			$modal .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
			$modal .= "<strong>Congrats!</strong> You go to UCSD!</div>";
		} else {
			$modal .= "<div class=\"alert alert-danger alert-dismissable\">";
			$modal .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
			$modal .= "You must have a UCSD email address.</div>";
		}
	} else {
		$modal .= "<div class=\"alert alert-warning alert-dismissable\">";
		$modal .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
		$modal .= "Please fill in both Email and Password.</div>";
	}
}
if ($reset == "1") {
	unset($submitted,$email,$pass,$modal,$reset);
}

// Get things
$stmt = "SELECT id,need,give,date,location,user FROM tradebook ORDER BY date DESC";

// Get table data
$mysqli = new mysqli("kaceykaso.db.7774154.hostedresource.com", "kaceykaso", "Bazinga83!", "kaceykaso");
if($mysqli->connect_errno > 0){ echo "Cannot connect: (".$mysqli->connect_errno.") ".$mysqli->connect_error; }
if(!$result = $mysqli->query($stmt)){
    die('Bad query: '. $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tradebook :: Need Something Give Something</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tradebook</a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Food</a></li>
		          <li><a href="#">Electronics</a></li>
		          <li><a href="#">Rides</a></li>
		          <li><a href="#">Beds</a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Locations <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">ERC</a></li>
		          <li><a href="#">Marshall</a></li>
		          <li><a href="#">Muir</a></li>
		          <li><a href="#">Revelle</a></li>
		          <li><a href="#">Sixth</a></li>
		          <li><a href="#">Warren</a></li>
		        </ul>
		      </li>
		    </ul>
          <form class="navbar-form navbar-right" method="post" action="">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="passwd" placeholder="Password" class="form-control">
            </div>
            <input type="hidden" value="1" name="submitted">
            <button type="submit" class="btn btn-success">Sign in</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#signUp">Sign up</button>
            <button type="submit" value="1" name="reset" class="btn btn-danger">Reset</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      	<?php echo $modal; ?>
        <img src="img/logo.jpg" alt="Tradebook" />
      </div>
    </div>
	
	<!-- Modal -->
	<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Sign Up for Tradebook</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form-horizontal" role="form" method="post" action="">
	        	<div class="form-group">
				    <label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="signUpEmail" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="signUpPasswd" placeholder="Password">
				    </div>
				  </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				    	<input type="hidden" value="1" name="signUpSubmitted">
				      <button type="submit" class="btn btn-default">Sign in</button>
				    </div>
				  </div>
	        </form>
	        	<br><br><br>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <div class="container main">
    	<!-- Modal -->
      <!-- Data table -->
      <div class="row">
        <div class="col-lg-10 cntr">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>Date</th>
        				<th>Need</th>
        				<th>Give</th>
        				<th>User</th>
        				<th>Location</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php while($row = $result->fetch_assoc()){ 
        				echo "<td>".date('g:i a  D, M. j, Y', strtotime($row['date']))."</td>";
        				echo "<td>".$row['need']."</td>";
        				echo "<td>".$row['give']."</td>";
        				echo "<td>".$row['user']."</td>";
        				echo "<td>".$row['location']."</td>";
        		 } ?>
        		</tbody>
        	</table>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Tradebook 2013</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
