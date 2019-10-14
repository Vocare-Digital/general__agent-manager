<?php



#check for login cookie
$login="false";
if (isset($_COOKIE['DWSTATUS']))
{

  if (($_COOKIE['DWSTATUS'])=="true")
  {
    $login="true";
  }

}



if($login=="false")
{
  header('Location: index.php');
  exit;
}






$title = "";

// if ($_GET["area"]=="devon")
// {

//   $areaArray = array("43-111DEVCallAdv.txt","44-111DEVClinAdv.txt","55-111DEVALD.txt");
//   $devonActive = "class=\"active\"";
//   $title = "Devon";

// }


if ($_GET["area"]=="london")
{

  $areaArray = array("48-111SWLClinWT.txt","50-111SWLClinAdvL.txt","49-111SWLClinLead.txt","51-111SWLALD.txt","41-111SWLCallAdv.txt","40-111SWLClinAdv.txt","45-111SWLSA.txt","46-111SWLHubClin.txt","47-111SWLHubPhar.txt");
  $londonActive = "class=\"active\"";
  $title = "London";
}


// if ($_GET["area"]=="somerset")
// {

//   $areaArray = array("3-111ClinAdv.txt","39-111SUPSOM.txt","38-111SOMCallAdv.txt");
//   $somersetActive = "class=\"active\"";
//   $title = "Somerset";

//}


if ($_GET["area"]=="staffordshire")
{

  $areaArray = array("57-111STFClinAdvL.txt","37-111SUPSTF.txt","14-111STFCallAdv.txt");
  $staffsActive = "class=\"active\"";
  $title = "Staffordshire";

}


if ($_GET["area"]=="westmidlands")
{

  $areaArray = array("26-111WMICallAdv.txt","31-111WMTeamMgr.txt","42-111SUPWM.txt","34-111WMIDALD.txt","29-111WMDentAdv.txt","28-111WMClinAdv.txt","32-111WMCliMgr.txt","30-111WMSftMgr.txt");
  $wmActive = "class=\"active\"";
  $title = "West Midlands";

}


if ($_GET["area"]=="cornwall")
{

  $areaArray = array("62-111CWCallAdv.txt","63-111CWClinAdv.txt","64-111CWSA.txt","65-111CWEDVal.txt","66-111CWLeadClin.txt");
  $cornActive = "class=\"active\"";
  $title = "Cornwall";

}


if ($_GET["area"]=="bsw")
{

  $areaArray = array("79-111BSWClinLead.txt","68-111BSWCallAdv.txt","69-111BSWDental.txt"," 70-111BSWmCAS.txt","71-111BSWvCAS.txt","67-111BSWVal.txt");
  $bswActive = "class=\"active\"";
  $title = "BSW";

}




if ($title=="")
{
  exit;

}





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <title>Agent Manager - <?php echo $title ?></title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
   

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
      body {
       /* Margin bottom by footer height */
        margin-bottom: 0px;
      }
        
        
    .item  {
    width: 100%;
}    

.TimerRow{

  color:#6f6f6f;
}

.boxdata {
    font-size: 700%;
    font-weight: 500;
    color: #fff;
    padding-top: 0%;
    padding-bottom: 0%;

}


.boxdata2 {
    font-size: 330%;
    font-weight: 500;
    color: #fff;
    padding-top: 1%;
    padding-bottom: 1%;
}

.boxdata3 {
    font-size: 170%;
    font-weight: 200;
    color: #fff;
    padding-top: 1%;
    padding-bottom: 1%;
}

.boxtitle {
    font-size: 230%;
    font-weight: 200;
    color: #fff;
    padding-bottom: 2%;
}

.footer {
    position: relative;
    bottom: 0;
    width: 100%;
    height: 130px;
    background-color: #000;
    padding-right: 5%;
    padding-right: 5%;
}

.lebox {
    padding-top: 0px;
    padding-left: 0px;
    padding-right: 0px;
    color: #fff;
    font-size: 60%;
    text-align: center;
    height: 60%;
    border-radius: 10px;
}

.col-md-1 {

  width: 32%;
}

.top-box_red {
    background-color: #e74c3c;
    border-top: 16px solid #c0392b;
    margin: 10px;
}

.top-box_grn {
    background-color: #25718e;
    border-top: 16px solid #1b3c50;
    margin: 10px;

}

.top-box_amb {
    background-color: #e67e22;
    border-top: 16px solid #d35400;
    margin: 10px;
}


.top-box_gry {
    background-color: #5d5d5d;
    border-top: 16px solid #3e3e3e;
    margin: 10px;
}

.top-box_grn_title {
    background-color: #1b3c50;
}


.spacer{
  background-color: #777777;
  padding: 1px;
  height: 1px;
  width: 13%;

}

.col-md-7 {
        width: auto;
      }




td{

	font-size: 130%;
}

.titlerow{

	font-weight:600;
}
        

.table > thead > tr > td.active, .table > tbody > tr > td.active, .table > tfoot > tr > td.active, .table > thead > tr > th.active, .table > tbody > tr > th.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > tbody > tr.active > td, .table > tfoot > tr.active > td, .table > thead > tr.active > th, .table > tbody > tr.active > th, .table > tfoot > tr.active > th {
    background-color: #248023;
}



.table > thead > tr > td.warning, .table > tbody > tr > td.warning, .table > tfoot > tr > td.warning, .table > thead > tr > th.warning, .table > tbody > tr > th.warning, .table > tfoot > tr > th.warning, .table > thead > tr.warning > td, .table > tbody > tr.warning > td, .table > tfoot > tr.warning > td, .table > thead > tr.warning > th, .table > tbody > tr.warning > th, .table > tfoot > tr.warning > th {

	background-color: #802323;
}


.table > thead > tr > td.info, .table > tbody > tr > td.info, .table > tfoot > tr > td.info, .table > thead > tr > th.info, .table > tbody > tr > th.info, .table > tfoot > tr > th.info, .table > thead > tr.info > td, .table > tbody > tr.info > td, .table > tfoot > tr.info > td, .table > thead > tr.info > th, .table > tbody > tr.info > th, .table > tfoot > tr.info > th {

	background-color: #2d2380;
}


.table > thead > tr > td.other, .table > tbody > tr > td.other, .table > tfoot > tr > td.other, .table > thead > tr > th.other, .table > tbody > tr > th.other, .table > tfoot > tr > th.other, .table > thead > tr.other > td, .table > tbody > tr.other > td, .table > tfoot > tr.other > td, .table > thead > tr.other > th, .table > tbody > tr.other > th, .table > tfoot > tr.other > th {

	background-color: #7f2380;
}


@media screen and (max-width: 1400px) {

  .col-md-1 {

      width: 48%;
  }




}


    </style>



<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}


function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }   
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
     return dateTime;
}


// -->
</script>



  </head>

  <body role="document" onload="updateClock(); setInterval('updateClock()', 1000 );">


  <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?area=bsw"><span id="clock" style="padding-right:20px;">&nbsp;</span> <?php echo $title ?> NHS 111 </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="width: 200px; float:right">
            
           <li><a href="#" style="color: #ff0000">TEST VERSION</a></li>
            <li><a href="help.php?area=bsw">HELP</a></li>
	    
	
          </ul>

        </div><!--/.nav-collapse -->
	
      </div>
    </nav>




<div align="center">


  
<div class="container" role="main" style="margin-top:60px;">




<div class="row" style="background-color:#2a2a2a; padding-left:4%">
    <div class="col-md-7 TimerRow"> 
         
        

    </div>
</div>





<ul class="nav nav-tabs">
  <!-- <li role="presentation" <?php echo $devonActive; ?>><a href="agentManagerBS.php?area=devon">Devon</a></li> -->
  <li role="presentation" <?php echo $londonActive; ?>><a href="agentManagerBS.php?area=london">London</a></li>
  <!-- <li role="presentation" <?php echo $somersetActive; ?>><a href="agentManagerBS.php?area=somerset">Somerset</a></li> -->
  <li role="presentation" <?php echo $staffsActive; ?>><a href="agentManagerBS.php?area=staffordshire">Staffordshire</a></li>
  <li role="presentation" <?php echo $cornActive; ?>><a href="agentManagerBS.php?area=cornwall">Cornwall</a></li>
  <li role="presentation" <?php echo $bswActive; ?>><a href="agentManagerBS.php?area=bsw">BSW</a></li>
</ul>


<?php

foreach($areaArray as $thisArea)
{

	list($crap, $name) = explode("-", $thisArea);
	list($name, $crap) = explode(".", $name);

	?>

  <div class="col-md-1 top-box_grn lebox" >  <div class="boxtitle top-box_grn_title"><?php echo $name ?></div>
<div class="container whiteText" role="main" style="margin-top: 10px; " id="dataTable_<?php echo $name ?>">loading.....</div>
</div>

  

<?php
}

?>
 </div> <!-- /container -->  

   </div>



   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    

<?php

foreach($areaArray as $thisArea)
{

	list($crap, $name) = explode("-", $thisArea);
	list($name, $crap) = explode(".", $name);

	?>


   <script>
        $(document).ready(function () {
    $.get("agentMangerBSworkGroup.php?tc=20161003235207&wgroup=<?php echo $thisArea ?>", function (result) {
            $('#dataTable_<?php echo $name ?>').html(result);
        });
    
    setInterval(function() {
    $.get("agentMangerBSworkGroup.php?tc=20161003235207&wgroup=<?php echo $thisArea ?>", function (result) {
            $('#dataTable_<?php echo $name ?>').html(result);
        });
    }, 5000);
});

</script>  

        
<?php
}

?>
        
    
    


    
     
      

  </body>
</html>
