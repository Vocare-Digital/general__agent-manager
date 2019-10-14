<?php

#error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

#print_r($_POST);

$login_result = check_user_details($_POST['username'],$_POST['password']);

#print "login result - $login_result";

if ($login_result == "LOGINTRUE")
{

	header('Location: agentManagerBS.php?area=devon');
}
else
{

	$msg = "Sorry you could not be logged in. <a href='index.php' style='color:#fff;'>Click here to try again.</a> <br> <br> Alternatively, please email <a href='mailto:business.systems@vocare.nhs.uk?Subject=Agent%20Manager%20Access' style='color:#ffffff'>Business Systems</a> for access.";
}

function check_user_details($username,$password)
	{
		#print "<br><br>start - $username - $password<br><br>";
	$adServer = "10.10.0.14";
	$ldap = ldap_connect($adServer);
	$ldaprdn = 'nduc' . "\\" . $username;

#print "<br><br>start2<br><br>";

	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    	#print "<br><br>start3 - $ldap, $ldaprdn, $password<br><br>";
	
	$bind = @ldap_bind($ldap, $ldaprdn, $password);
	if ($bind) {


#print "<br><br>start4<br><br>";

        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"DC=nduc,DC=local",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
	
	#print "<br><br>start5<br><br>";

#print_r($info);

	//print "before for loop<br>";
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
             break;
			//var_dump($info[$i]["memberof"]["count"]);
			//print $info[$i]["memberof"]["count"];
			$mocount = "0";
			//print "before group while<br>";

			$nav="fail";
			
		$defaultPage = "";
			while($mocount < $info[$i]["memberof"]["count"])
				{
					
					list($cn,$notneeded) = explode(",",$info[$i]["memberof"][$mocount]);
					list($cn,$groupname) = explode("CN=",$cn);
					
					#$this->session->set_userdata("group".$mocount,$groupname);
					
					
			/*	
			
			if($groupname == "Team Leaders")
				{
					$nav = "otl";
					$defaultPage = "OTL";
				}


			
			
			if($groupname == "NDUC 111 Team Leaders")
				{
					$nav = "otl";
					$defaultPage = "OTL";
				}
			
			if($groupname == "NDUC 111 Clinical Lead")
				{
					$nav = "ctl";
					$defaultPage = "CLINICAL";

				}

		*/


				$myMSG .= "GN - $groupname - ";


			if($groupname == "Business Systems")
				{
					$nav = "allow";
				}
			

			if($groupname == "SDUC111TeamLeaders")
				{
					$nav = "allow";
				}
			
			if($groupname == "SW Team Leaders")
				{
					$nav = "allow";
				}

			if($groupname == "ClinicalLeadLondonDevon"){
					$nav = "allow";
			}
	
			if($groupname == "SW Clinical Lead"){
					$nav = "allow";
			}


			if($groupname == "Vocare Operations Management")
				{
					$nav = "allow";
				}
			

			if($groupname == "Tech Support")
				{
					$nav = "allow";
				}


			if($groupname == "111 Clinical Lead")
				{
					$nav = "allow";
				}
			

			if($groupname == "Testytester")
				{
					$nav = "allow";
				}

			if($groupname == "Vocare 111 Team Leaders")
			 {
					$nav = "allow";
			 }





			$mocount++;
			}
			
			//echo $nav;
			switch(strtolower($username)){
			
	
			case "barry.cooper":
				$nav = "allow";
				break;

			case "emma.doughty":
				$nav = "allow";
				break;


			case "judith.parker":
				$nav = "allow";
				break;

			case "avril.mccartney":
				$nav = "allow";
				break;

			case "jeanette.Robinson":
				$nav = "allow";
				break;

			case "joanna.richardson":
				$nav = "allow";
				break;

			case "alison.mcaree":
				$nav = "allow";
				break;

			case "shaun.crinion":
				$nav = "allow";
				break;

			case "dawn.thornton":
				$nav = "allow";
				break;

			case "sue.lewis":
				$nav = "allow";
				break;

			case "jessica.barnish":
				$nav = "allow";
				break;

			case "jessica.ford":
				$nav = "allow";
				break;

			case "gary.holroyd":
				$nav = "allow";
			break;

			case "charlotte.laidler":
				$nav = "allow";
			break;

			case "clare.white":
				$nav = "allow";
			break;

			case "beth.pell":
				$nav = "allow";
			break;

			case "rosaline.ducasse":
				$nav = "allow";
			break;

			case "katie.hackett":
				$nav = "allow";
			break;

			case "philippa.buckley":
				$nav = "allow";
			break;

			case "ellie.brown":
				$nav = "allow";
			break;

			case "barry.moran":
				$nav = "allow";
			break;

			case "hannah.eaves":
				$nav = "allow";
				break;

			case "sherene.taft":
				$nav = "allow";
				break;
			

			case "deirdre.jones":
				$nav = "allow";
			break;

			case "elizabeth.banks":
			$nav = "allow";
			break;

			case "emma.campbell":
				$nav = "allow";
			break;

			case "helen.brown":
				$nav = "allow";
			break;

			case "lorraine.lowe":
				$nav = "allow";
			break;

			case "louise.knight":
				$nav = "allow";
			break;

			case "mary.osborne":
				$nav = "allow";
			break;

			case "victoria.warren":
				$nav = "allow";
			break;

                        case "elizabeth.green":
                                $nav = "allow";
												break;
												
			case "christine.ryan":
				$nav = "allow";
			break;

			case "kerry.hutchinson":
				$nav = "allow";
			break;
			}

$myMSG .= " | nav - $nav\n";
			
		
			#if($defaultPage == "")
		#		{
		#		$defaultPage = "OTL";
		#		
		#		}	
			
			//echo $defaultPage;
			#$this->session->set_userdata('defaultPage', $defaultPage);
			#$this->session->set_userdata('nav',$nav);

			#setcookie('USERGROUP',$groupname,"0");
				$logintrue =  "NOACCESS";
				$msg = "No permission";

			if ($nav == "allow")
			{

				setcookie('DWSTATUS',"true",time()+1800);




			$msg = "Login Valid";
			$logintrue =  "LOGINTRUE";

			}


			//log access
			$file = ".loginaccess.txt";
			$theline = date("Y-m-d H:i:s") . " | $username | $nav | $myMSG \n";
			file_put_contents($file, $theline, FILE_APPEND);
			
			
	    		//return login valid
			#$msg = "Login Valid";

			#$this->log_requests("Login",$logURL,$page,$uname,'');
			
			#return "LOGINTRUE";
			return $logintrue;
			
             //$userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Login Failed";
	
	
        return "NOLOGIN";
    }	


	}
		


?>
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










<h4><?php echo $msg ?></h4>


</div>


</div>
</div>



 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


