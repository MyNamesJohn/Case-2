<!DOCTYPE html>
<html>
<head>
	<title>Milaha Shipping PDA Results</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="pdaheader">
<h1>PDA Results:</h1>
</div>
<?php
$grossTonnage = $_POST["gt"];

$lengthofstay = $_POST['los'];

$anchorage = $_POST['anchorage'];

$bfunctional = $_POST['berthing'];

$lengthofmaneouvre = $_POST['lobm'];

$gcstevedoring = $_POST['gcstevedoring'];
$svehicle = $_POST['svehicle'];
$livestock = $_POST['livestock'];
$livestocknum = $_POST['livestocknum'];

// grossTonnage = 5000;
// lengthofstay = 7;


    // Find minimum charge of port dues
    if ($grossTonnage >= 5001) {
        $minimumCharge = 2000; //Per 24 hours
    } elseif ($grossTonnage <= 5000) {
        $minimumCharge = 1000; //Per 24 hours
    } elseif ($grossTonnage <= 1001) {
        $minimumCharge = 300;  //Per 24 hours   
    }

    //Find minimum charge of anchorage
    if ($anchorage = "ain" and $lengthofstay <=5){
        $anchorage = 0.03; //Per 24 hours
    }elseif ($anchorage = "ain" and $lengthofstay >=5){
        $anchorage = 0.05; //Per 24 hours
        }elseif ($anchorage = "aout" and $lengthofstay <=5){
            $anchorage = 0.02; //Per 24 hours
            }elseif ($anchorage = "aout" and $lengthofstay >=5){
              $anchorage = 0.04; //Per 24 hours 
    }

    if ($grossTonnage >=999999){
        $pilotageCharges = 1800; //Per 24 hours
    }elseif ($grossTonnage >=80000){
        $pilotageCharges = 1200; //Per 24 hours
    }elseif ($grossTonnage >=20000){
        $pilotageCharges = 600; //Per 24 hours
    }elseif ($grossTonnage >=2500){
        $pilotageCharges = 300; //Per 24 hours
    }
    
    //Tug charges?
    if ($bfunctional = "bf"){
        $bfunctional = 2000;
    }elseif ($bfunctional = "bin"){
        $bfunctional = 4000;
    }elseif ($bfunctional = "bout"){
        $bfunctional = 6000;
    }

    if($gcstevedoring = "ggear"){
        $gcstevedoring = 24;
    }elseif($gcstevedoring = "gcrane"){
        $gcstevedoring = 27;
    }elseif($gcstevedoring = "gmhc"){
        $gcstevedoring = 29;
    }

    if($svehicle = "rbel30"){
        $svehicle = 18;
    }elseif($svehicle = "rabv30"){
        $svehicle = 15;
    }elseif($svehicle = "cbel30"){
        $svehicle = 38;
    }elseif($svehicle = "cabv30"){
        $svehicle = 42;
    }

    //if($svehicle = "rbel30"){
    //    $storageCharges = 10;
    //}elseif($svehicle = "rabv30"){
    //    $storageCharges = 20;
    //}elseif($svehicle = "cbel30"){
    //    $storageCharges = 10;
    //}elseif($svehicle = "cabv30"){
    //    $storageCharges = 20;
    //  }

    if($livestock = "lsheep"){
        $livestock1 = 3;
    }elseif($livestock = "lcow"){
        $livestock1 = 7;
    }

$portDues = $minimumCharge + ($grossTonnage * $lengthofstay * 0.15);
$anchorageFees = $minimumCharge + ($grossTonnage * $lengthofstay * $anchorage);
$towageCharges = ($bfunctional-$bfunctional)+$bfunctional*($lengthofstay-2); //Tug charges?
$stevedoringimportexport = ($gcstevedoring*$grossTonnage)/2.5; //Freight Ton
$stevedoringandhandling = ($svehicle*$grossTonnage)/2.5; //Freight Ton
//$storageCharges1 = ($storageCharges*$grossTonnage)/2.5;
$livestock2 = ($livestock1*$livestocknum)+1500;
$total = $portDues + $anchorageFees + $stevedoringimportexport + $stevedoringandhandling + $stevedoringandhandling +$livestock2;

?>
<div class="table">
<table style='
position:absolute;top:265px;left:270px;
backround-color:solid yellow;
padding-bottom:10px;
font-family:calibri;
font-size:19px;
'border='0.5' height='35' width='400'>

<th width="450">
<tr bgcolor="Sienna">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
> &emsp; Port Dues</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Anchorage Fees</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Pilotage Charges</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Towage Charges - Tug Assistance</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Berthing/Unberthing and Shifting</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Stevedoring - Import/Export</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Stevedoring and Handling</td>
</tr>

<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Storage Charges</td>
</tr>


<th width="450">
<tr bgcolor="Sienna">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Livestock Stevedoring</td>
</tr>

<th width="450">
<tr bgcolor="SaddleBrown">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; Total:</td>
</tr>
</table>

<table style='
position:absolute;top:265px;left:672.5px;
backround-color:solid yellow;
padding-bottom:10px;
font-family:calibri;
font-size:19px;
'border='0.5' height='35' width='270'>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp;
<?php
echo   $portDues;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp;
<?php
echo   $anchorageFees;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp; 
<?php
echo   $pilotageCharges;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp; 
<?php
echo   $towageCharges;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp;
<?php
echo   $pilotageCharges;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp; 
<?php
echo   $stevedoringimportexport;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="Tan ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp; 
<?php
echo   $stevedoringandhandling;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="BurlyWood ">
<td style='
backround-color:solid yellow;
color:white;
height='30' width='400'
position:relative;top:500px;
border-top:100px;
>&emsp; 
<?php
echo   $stevedoringandhandling;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="BurlyWood">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; 
<?php
echo   $livestock2;
echo   " QR";
?>
</td>
</tr>

<th width="450">
<tr bgcolor="SaddleBrown">
<td style='
position:relative:top:10px;
backround-color:solid yellow;
color:white;
height='30' width='400'
backround-color:rgb(0,256,0);
position:relative;top:200px;
>&emsp; 
<?php
echo   $total;
echo   " QR";
?>
</td>
</tr>

</table>
</div>
</body>
</html>