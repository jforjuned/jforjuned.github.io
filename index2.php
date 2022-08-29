<!DOCTYPE html>
<html lang="en">

<head>
    <title>Juned's Lab</title>
    <link rel="stylesheet" href="style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/site.webmanifest">
</head>


<body>
    <?php 

include('visitor/Mobile_Detect.php');
include('visitor/BrowserDetection.php');

$browser=new Wolfcast\BrowserDetection;

$browser_name=$browser->getName();
$browser_version=$browser->getVersion();

$detect=new Mobile_Detect();

if($detect->isMobile()){
	$type='Mobile';
}elseif($detect->isTablet()){
	$type='Tablet';
}else{
	$type='PC';
}

if($detect->isiOS()){
	$os='IOS';
}elseif($detect->isAndroidOS()){
	$os='Android';
}else{
	$os='Window';
}

$url=(isset($_SERVER['HTTPS'])) ? "https":"http";
$url.="//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ref='-';
$remotehost='-';

if(isset($_SERVER['HTTP_REFERER'])){
    $ref=$_SERVER['HTTP_REFERER'];
}
if (isset($_SERVER['REMOTE_HOST'])) {
    $remotehost= $_SERVER['REMOTE_HOST'];
}


date_default_timezone_set('Asia/Kolkata');
$ip = $_SERVER['REMOTE_ADDR'];
$date = date(' H:i:s m/d/Y', time());
$useragent=$_SERVER['HTTP_USER_AGENT'];
//echo '<h1>' . $ip.' '.$date.' '.$useragent.'</h1>';



$fp=fopen('users.csv','a+');

// time-date  os  type  browser  bversion  ip  url  ref  useragent remotehost  

fwrite($fp,$date.",");
fwrite($fp,$os.",");
fwrite($fp,$type.",");
fwrite($fp,$browser_name.",");
fwrite($fp,$browser_version.",");
fwrite($fp,$ip.",");
fwrite($fp,$url.",");
fwrite($fp,$ref.",");
fwrite($fp,$useragent.",");
fwrite($fp,$remotehost."\n");

fclose($fp);
copy('users.csv','user.txt');

?>
    <header>
     
        <a href="private/tt.jpg" target="_blank" id="TT">See TimeTable</a>
            <li onmouseenter="startTime()" id="txt">See Time</li>
        
    </header>
    <div>
        <h2>
            
            <a class="bg1" href="Lab1">Lab1</a><br>
            <a class="bg2" href="Lab2">Lab2</a><br>
            <a class="bg3" href="Lab3">Lab3</a><br>
            <a class="bg4" href="Lab4">Lab4</a><br>
            <a class="disabled" href="Lab5">Lab5</a><br>
            <a class="disabled" href="Lab6">Lab6</a><br>
        </h2>
    </div>
  <footer>Copyright &copy; Juned &nbsp&nbsp2021</footer>
  <img class='hidden' src="private/bg1.jpg">
  <img class='hidden' src="private/bg2.jpg">
  <img class='hidden' src="private/bg3.jpg">
  <img class='hidden' src="private/bg4.jpg">
  <img class='hidden' src="private/tt.jpg">
</body>
<script>
    function startTime() {
        const today = new Date();
        let hr = today.getHours();
        let mn = today.getMinutes();
        let sc = today.getSeconds();
        let ms = today.getMilliseconds();
        let dt = today.getDate();
        let mnt = today.getMonth()+1;
        let yr = today.getFullYear();
        mn = checkTime(mn);
        hr = checkTime(hr);
        sc = checkTime(sc);
        let fullTime=hr + ":" + mn + ":" + sc+"\n"+dt+"/"+mnt+"/"+yr ;
        document.getElementById('txt').innerHTML = fullTime;
        setTimeout(startTime, 1);
    }

    function checkTime(i) {
        if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
        return i;
    }

$(window).on("load",function(){
$(".loading").fadeOut("slow");
});
   
</script>
</html>
