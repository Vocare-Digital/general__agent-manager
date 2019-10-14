
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    .tdgreen{

    	text-align : right;
    	background-color : #009107;


    }

    .tdred{

    	text-align : right;
    	background-color: #910000;
    	color:  #ECF0F1;

    }

    .tdamber{

    	text-align : right;
    	background-color: #BD8100;
    	color:  #ECF0F1;

    }

    body{

    	background-color: #2980b9;
    	color:  #34495E;
    	font-family: 'Open Sans', sans-serif;
    }

    .statusheader{

    	color: #fff;
    	background-color: #143F52;
    	padding-top: 10px;
    	padding-bottom: 10px;
    }

    .maintable{

    	background-color: #2980b9;
    	padding-top: 10px;
    	padding-bottom: 40px;
    	color: #fff;
    }

    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 4px solid #2980b9;
	}

	.tdheader_tbl{
		background-color: #1E628E;
		font-size: 0.8em;

	}


	.tdheader{
		background-color: #1E628E;
		font-size: 0.8em;
		text-align: center;

	}

	.tdheader_we{
		background-color: #0F344C;
		font-size: 0.8em;
		text-align: center;

	}

	.tdheadertitle{
		background-color: #1E628E;
		font-size: 1.2em;

	}

    </style>

  </head>
  <body>
    
    <div class="container-fluid statusheader">
    	<div class="container statusheader">
    		<h1>Agent Status</h1>
    	</div>
    </div>




    <div class="container-fluid maintable">
    	<div class="container maintable">
    	
<div class="row" style="padding-top: 100px; padding-bottom:100px;">
  <div class="col-md-6">


<h4>Please enter your login details below</h4>

<form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-default">Login</button>
</form>

</div>


</div>
</div>



 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
