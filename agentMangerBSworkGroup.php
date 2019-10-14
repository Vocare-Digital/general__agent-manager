<?php
error_reporting(0);
$wgFile = $_GET["wgroup"];

$agent_data = "/var/opt/shoretel_data/agentData_new/$wgFile";

$dnisJSON = file_get_contents($agent_data);

$obj = json_decode($dnisJSON);

#print $dnisJSON;

$groupName = $obj->{'group-name'};

#print "<div class=\"boxtitle top-box_grn_title \">$groupName</div>";

$timeNow = date('Y-m-d H:i:s', time());
$timeNowTimestapmp = strtotime($timeNow);


#########arrays of success

$array_state = array(

'0'=>"Logged Out",
'1'=>"Idle",
'2'=>"ACD alerting",
'3'=>"On Call",
'4'=>"Wrap up",
'5'=>"Non-ACD Incoming",
'6'=>"Non-ACD Outgoing",
'7'=>"Release",
'8'=>"Non-ACD outgoing while in release",
'9'=>"Non-ACD incoming while in release",
'10'=>"Busy while in release",
'11'=>"Busy",
'21'=>"Split",
'24'=>"Outbound ACD Reserved",
'25'=>"Outbound ACD Alerting",
'26'=>"Outbound ACD Talking",
'27'=>"Handling email",
'28'=>"Handling email while on outgoing voice call",
'29'=>"Handling email while on incoming voice call",
'30'=>"Handling email while in busy state with voiceactivities"

	);


$array_irn = array(


/*
'6151'=>"Croydon Admin",
'6152'=>"Croydon Care Plan",
'6153'=>"Croydon Standard",
'6154'=>"Croydon Repeat Caller",
'6155'=>"Croydon Dental",
'6193'=>"Croydon Medication",
'6156'=>"Kingston Admin",
'6157'=>"Kingston Care Plan",
'6158'=>"Kingston Standard",
'6159'=>"Kingston Repeat Caller",
'6160'=>"Kingston Dental",
'6194'=>"Kingston Medication",
'6161'=>"Merton Admin",
'6162'=>"Merton Care Plan",
'6163'=>"Merton Standard",
'6164'=>"Merton Repeat Caller",
'6165'=>"Merton Dental",
'6195'=>"Merton Medication",
'6166'=>"Wandsworth Admin",
'6167'=>"Wandsworth Care Plan",
'6168'=>"Wandsworth Standard",
'6169'=>"Wandsworth Repeat Caller",
'6170'=>"Wandsworth Dental",
'6196'=>"Wandsworth Medication",
'6171'=>"Richmond Admin",
'6172'=>"Richmond Care Plan",
'6173'=>"Richmond Standard",
'6174'=>"Richmond Repeat Caller",
'6175'=>"Richmond Dental",
'6197'=>"Richmond Medication",
'6176'=>"Sutton Admin",
'6177'=>"Sutton Care Plan",
'6178'=>"Sutton Standard",
'6179'=>"Sutton Repeat Caller",
'6180'=>"Sutton Dental",
'6198'=>"Sutton Medication",
'6181'=>"National Unknown",
'6182'=>"National Call",
'6191'=>"SWL Redwood",
'6192'=>"Wandsworth SPOC",
'6186'=>"SWL HCP",
'6200'=>"111 SWL ClinLead",
'6201'=>"111 SWL ClinAdvL",
'6202'=>"111 SWL ALD",
'6183'=>"111 Clin WT",
'6184'=>"SWL CHUB Clin",
'6185'=>"SWL CHUB Phar",
'6187'=>"Dev Dental",
'6188'=>"Dev HCP",
'6189'=>"Dev Repeat",
'6190'=>"Dev 111",
'6199'=>"DEV WT"




*/









'6001'=>"6001",
'6002'=>"6002",
'6003'=>"6003",
'6004'=>"6004",
'6051'=>"Backup Login",
'6052'=>"DNIS 6138",
'6053'=>"DNIS 6138",
'6054'=>"DNIS 6138",
'6100'=>"6100",
'6101'=>"STF Clinical Advisors",
'6102'=>"DEV SWAST",
'6103'=>"STF Clinical Hot Line",
'6104'=>"SOM Call Handlers",
'6105'=>"WMI NQ (Call Advisors)",
'6106'=>"STF NQ (Call Advisors)",
'6107'=>"SOM NQ Call Advisors)",
'6108'=>"WMI Dental Support",
'6109'=>"STF Dental Support",
'6110'=>"SOM Dental Support",
'6111'=>"WMI HCP Support",
'6112'=>"STF HCP Support",
'6113'=>"SOM HCP Support",
'6114'=>"WMI RC Support",
'6115'=>"STF RC Support",
'6116'=>"SOM RC Support",
'6117'=>"SOM Clinical Advisor",
'6118'=>"STF Call Handlers",
'6119'=>"WMI Clinical Huntgroup",
'6120'=>"WMI ALD",
'6121'=>"WMI Clinical Managers",
'6122'=>"WMI Team Managers",
'6123'=>"WMI Shift Managers",
'6124'=>"WMI Dental Advisors",
'6125'=>"WMI Clinical Advisors",
'6126'=>"WMI Call Handlers",
'6127'=>"IT HelpDesk",
'6128'=>"HQ MOD Leconfield",
'6129'=>"DNIS 8000",
'6131'=>"HQ MOD Albermarie",
'6132'=>"TYN District Nurse",
'6133'=>"TYN Clinical Hotline",
'6134'=>"CHNS",
'6135'=>"CHSS",
'6137'=>"WMI Test IRN",
'6140'=>"DNIS 8000",
'6142'=>"CW Dental",
'6143'=>"CW Prescription",
'6144'=>"CW Appointment",
'6145'=>"CW NoW",
'6146'=>"CW *5 Ambulance",
'6147'=>"CW *6 Care Home",
'6148'=>"CW *7 RRT ",
'6149'=>"CW Clinical Adv",
'6150'=>"DNIS 8000",
'6151'=>"Croydon Admin",
'6152'=>"Croydon Care Plan",
'6153'=>"Croydon Standard",
'6154'=>"Croydon Repeat Caller",
'6155'=>"Croydon Dental",
'6156'=>"Kingston Admin",
'6157'=>"Kingston Care Plan",
'6158'=>"Kingston Standard",
'6159'=>"Kingston Repeat Caller",
'6160'=>"Kingston Dental",
'6161'=>"Merton Admin",
'6162'=>"Merton Care Plan",
'6163'=>"Merton Standard",
'6164'=>"Merton Repeat Caller",
'6165'=>"Merton Dental",
'6166'=>"Wandsworth Admin",
'6167'=>"Wandsworth Care Plan",
'6168'=>"Wandsworth Standard",
'6169'=>"Wandsworth Repeat Caller",
'6170'=>"Wandsworth Dental",
'6171'=>"Richmond Admin",
'6172'=>"Richmond Care Plan",
'6173'=>"Richmond Standard",
'6174'=>"Richmond Repeat Caller",
'6175'=>"Richmond Dental",
'6176'=>"Sutton Admin",
'6177'=>"Sutton Care Plan",
'6178'=>"Sutton Standard",
'6179'=>"Sutton Repeat Caller",
'6180'=>"Sutton Dental",
'6181'=>"National Unknown",
'6182'=>"National Call Balancing",
'6183'=>"111 Clin WT",
'6184'=>"SWL CHUB Clin",
'6185'=>"SWL CHUB Phar",
'6186'=>"SWL HCP",
'6187'=>"DEV Dental",
'6188'=>"DEV HCP",
'6189'=>"DEV Repeat",
'6190'=>"Dev 111",
'6191'=>"SWL Redwood Fail",
'6192'=>"Wandsworth SPOC",
'6193'=>"Croydon Scrip",
'6194'=>"Kingston Scrip",
'6195'=>"Merton Scrip",
'6196'=>"Wandsworth Scrip",
'6197'=>"Richmond Scrip",
'6198'=>"Sutton Scrip",
'6199'=>"Dev CA WT",
'6200'=>"111 SWL ClinLead",
'6201'=>"111 SWL ClinAdvL",
'6202'=>"111 SWL ALD",
'6203'=>"BS TEST",
'6204'=>"DEV BKDOOR",
'6205'=>"DEVCLinLead",
'6206'=>"111DEVClinAdvL",
'6207'=>"111 DEV ALD",
'6208'=>"SWL HAQ",
'6209'=>"111 STF ALD",
'6210'=>"STF CLINADVL",
'6211'=>"*5 SWL LAS Calls",
'6212'=>"SWL *6 Care Homes",
'6213'=>"SWL *7 Community Nursing",
'6214'=>"STF *5 Ambulance Crews",
'6215'=>"STF *6 Care Homes",
'6216'=>"STF *7 Community Nurse",
'6217'=>"DEV *5 Ambulance Crew",
'6218'=>"DEV *6 Care Homes",
'6219'=>"DEV *7 Community Nurse",
'6220'=>"SOM *5 Ambulance Crew",
'6221'=>"SOM *6 Care Homes",
'6222'=>"SOM *7 Community Nurse",
'6227'=>"DNIS 8000",
'6242'=>"DNIS 8000",
'6243'=>"DNIS 8000",
'6245'=>"DNIS 8000",
'6246'=>"DNIS 8000",
'6247'=>"DNIS 8000",
'6248'=>"DNIS 8000",
'6251'=>"DNIS 6338",
'6252'=>"DNIS 6338",
'6253'=>"DNIS 6338",
'6254'=>"DNIS 6338",
'6255'=>"DNIS 6338",
'6256'=>"DNIS 6338",
'6257'=>"DNIS 6338",
'6258'=>"DNIS 6338",
'6259'=>"DNIS 6338",
'6260'=>"DNIS 6338",
'6261'=>"DNIS 6338",
'6262'=>"DNIS 6338",
'6263'=>"DNIS 6338",
'6264'=>"DNIS 6338",
'6265'=>"DNIS 6338",
'6266'=>"DNIS 6338",
'6267'=>"DNIS 6338",
'6268'=>"DNIS 6338",
'6269'=>"DNIS 6338",
'6270'=>"DNIS 6338",
'6271'=>"DNIS 6338",
'6272'=>"DNIS 6338",
'6273'=>"DNIS 6338",
'6274'=>"DNIS 6338",
'6275'=>"DNIS 6338",
'6276'=>"DNIS 6338",
'6277'=>"DNIS 6338",
'6278'=>"DNIS 6338",
'6279'=>"DNIS 6338",
'6280'=>"DNIS 6338",
'6281'=>"DNIS 6338",
'6282'=>"DNIS 6338",
'6283'=>"DNIS 6338",
'6284'=>"DNIS 6338",
'6285'=>"DNIS 6338",
'6286'=>"DNIS 6338",
'6287'=>"DNIS 6338",
'6288'=>"DNIS 6338",
'6289'=>"DNIS 6338",
'6290'=>"DNIS 6338",
'6291'=>"DNIS 6338",
'6292'=>"DNIS 6338",
'6293'=>"DNIS 6338",
'6294'=>"DNIS 6338",
'6295'=>"DNIS 6338",
'6296'=>"DNIS 6338",
'6297'=>"DNIS 6338",
'6298'=>"DNIS 6338",
'6299'=>"DNIS 6338",
'6300'=>"DNIS 6338",
'6301'=>"DNIS 6138",
'6302'=>"DNIS 6338",
'6303'=>"DNIS 6302",
'6304'=>"DNIS 6304",
'6305'=>"DNIS 6305",
'6306'=>"DNIS 6306",
'6307'=>"DNIS 6307",
'6308'=>"DNIS 6308",
'6309'=>"DNIS 6309",
'6310'=>"DNIS 6310",
'6311'=>"DNIS 6311",
'6312'=>"DNIS 6312",
'6313'=>"DNIS 6313",
'6314'=>"DNIS 6314",
'6315'=>"DNIS 6315",
'6316'=>"DNIS 6316",
'6317'=>"DNIS 6317",
'6318'=>"DNIS 6318",
'6319'=>"DNIS 6319",
'6320'=>"DNIS 6320",
'6321'=>"DNIS 6321",
'6322'=>"DNIS 6322",
'6323'=>"DNIS 6323",
'6324'=>"DNIS 6324",
'6325'=>"DNIS 6325",
'6326'=>"DNIS 6326",
'6327'=>"DNIS 6338",
'6328'=>"DNIS 6327",
'6331'=>"DNIS 6331",
'6332'=>"DNIS 6332",
'6333'=>"DNIS 6333",
'6334'=>"DNIS 6334",
'6335'=>"DNIS 6335",
'6337'=>"DNIS 6336",
'6338'=>"DNIS 6338",
'6339'=>"DNIS 6339",
'6340'=>"DNIS 6340",
'6341'=>"DNIS 6341",
'6344'=>"DNIS 6346",
'6345'=>"DNIS 6342",
'6346'=>"DNIS 6346",
'6347'=>"DNIS 6347",
'6348'=>"DNIS 6348",
'6349'=>"STF CAS EMD",
'6350'=>"STF CAS ANP",
'6401'=>"DNIS 8000",
'6402'=>"DNIS 8000",
'7000'=>"DNIS 6351",
'7999'=>"DNIS 7001",
'No DNIS'=>"No DNIS"









	);


##########end of arrays



?>

<table class="table">

<?php

print "<tr class='titlerow'>";
print "<td align='left'>Agent Name</td>";
print "<td>Agent ID</td>";
print "<td>Ext</td>";
print "<td align='left'>State</td>";
print "<td>Time</td>";
print "<td align='left'>Release</td>";
print "<td align='left'>Line</td>";
print "<td>Wrap Code</td>";
print "<td>Location</td>";
print "</tr>";

foreach($obj->{'agents'} as $thisAgent)
{


	#print_r($thisAgent);
	#print "\n\n<br>";
	#print $thisAgent->{'agent-name'};
	#print "<br>\n\n";

	$stateStart = $thisAgent->{'state-start-time'};

	$statestartTimestamp = strtotime($stateStart);
	$timeinstate = $timeNowTimestapmp - $statestartTimestamp;

	$timeclass = "";
	if ($timeinstate >900)
	{
		$timeclass = "class=\"warning\"";
	}

	$timeinstate = gmdate("H:i:s", $timeinstate);

	$astate = $array_state[$thisAgent->{'agent-state'}];
	$dnis =  $array_irn[$thisAgent->{'dnis'}];

	$stateclass="";
	if (($astate=="On Call")||($astate=="Non-ACD Outgoing"))
	{

		$stateclass = "class=\"active\"";
	}

	if ($astate=="Release")
	{

		$stateclass = "class=\"warning\"";
	}

	if ($astate=="Idle")
	{

		$stateclass = "class=\"info\"";
	}

	if ($astate=="Split")
	{

		$stateclass = "class=\"other\"";
	}

$location = substr($thisAgent->{'agent-number'}, 0, 2);

$locationPlace="";
if ($location == "80"){$locationPlace = "Hannover House";}
if ($location == "10"){$locationPlace = "Vocare House";}


print "<tr>";
print "<td align='left'>".$thisAgent->{'agent-name'}."</td>";
print "<td>".$thisAgent->{'agent-number'}."</td>";
print "<td>".$thisAgent->{'agent-ext'}."</td>";
#print "<td>".$thisAgent->{'agent-state'}."</td>";
print "<td $stateclass>".$astate."</td>";
print "<td $timeclass>".$timeinstate."</td>";
print "<td align='left'>".$thisAgent->{'release-code'}."</td>";
#print "<td>".$thisAgent->{'dnis'}."</td>";
print "<td align='left'>".$dnis."</td>";
print "<td>".$thisAgent->{'wrapup-code'}."</td>";
print "<td>$locationPlace ($location)</td>";
print "</tr>";


}



?>
	
</table>

