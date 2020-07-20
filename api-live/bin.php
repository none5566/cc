<?php
error_reporting(0);
$cc = $_GET['lista'];
    $bin = substr($cc, 0, 6);
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
 $fim1 = curl_exec($ch);
$fim = json_decode($fim1,true);
 $bank = $fim['bank']['name'];
  $country = $fim['country']['name'];
 $type1 = strtoupper($fim['scheme']);
 $type =strtoupper($fim['brand']);
$flag = $fim['country']['emoji'];
 $currency = $fim['country']['currency'];
 $type3 = strtoupper($fim['type']);


   $bin =''.$type1.' '.$type.' '.$type3.'「'.$bank.' BANK」</br> '.$flag.' '.$country.'-'.$currency.''; 
if (strpos($type1,"MASTERCARD")!==FALSE) {
    echo '<img src="dist/img/master-d.png" height="20" width="32" alt="Master" />'.$bin.'</br>';
 }
 elseif(strpos($type1, "VISA")!==FALSE) {
  echo '<img src="dist/img/visa-d.png" height="20" width="32" alt="Master" />'.$bin.'</br>';

 }
 elseif(strpos($type1, "AMEX")!==FALSE) {
  echo '<img src="dist/img/amex-d.png" height="20" width="32" alt="Master" />'.$bin.'<br>';

 }
  else(strpos($type1, "discover")==1) {
     '<img src="dist/img/Discover.png" height="20" width="32" alt="Master" />'.$bin.'<br>'

 }
?>