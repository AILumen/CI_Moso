<?php
$title = "Moso App";
$file = '';
$description = '';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<META NAME="MSSmartTagsPreventParsing" CONTENT="True">
<META HTTP-EQUIV="Expires" CONTENT="0">
<META HTTP-EQUIV="Pragma" CONTENT="No-Cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="No-Cache,Must-Revalidate,No-Store"> 
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo trim($title); ?>" />
<meta property="og:description" content="<?php echo trim($description); ?>" />
<meta property="og:image" content="<?php echo $file; ?>" />
<meta property="og:site_name" content="Gospic Application" />
</head>

<script src='//code.jquery.com/jquery-1.11.2.min.js'></script>
<script src='//mobileesp.googlecode.com/svn/JavaScript/mdetect.js'></script>
<script type="text/javascript">
(window.onload = function() {
	
 var ua = navigator.userAgent.toLowerCase();
 var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
 var isIphone = ua.indexOf("iphone") > -1;
 var url = window.location.href;
 var uid = url.split("userId=")[1]; 
 var eid = url.split("eventId=")[1];

 if(isAndroid) {
if(uid){
    var url = 'moso://com.moresocial.ly?userId='+uid;
}
if(eid){
    var url = 'moso://com.moresocial.ly?eventId='+eid;
}
 var appURL = 'https://play.google.com/';
 window.location = url;
 setTimeout(function(){  window.location = appURL; }, 1000);
 
 } else if (isIphone) {
 if(uid){
    url = "moso://userId="+uid; 
}
if(eid){
    url = "moso://eventId="+eid; 
}
window.location = url;
 var iosUrl = 'https://itunes.apple.com/';
 setTimeout(function(){  window.location = iosUrl; }, 1000);
 // this.timer = setTimeout(window.location.replace(iosUrl), 5000);
 } else {
 window.location.href = 'https://moresocial.ly/'; 
 }

})();
</script>

</html>
