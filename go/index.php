 <?php 
$t_url=$_GET['url'];
if(!empty($t_url)) {
 preg_match('/(http|https):\/\//',$t_url,$matches);
 if($matches){
 $url=$t_url;
 $title='亲爱的朋友记得常回来哦...';
 } else {
 preg_match('/\./i',$t_url,$matche);
 if($matche){
 $url='http://'.$t_url;
 $title='亲爱的朋友记得常回来哦...';
 } else {
 $url='https://pan.dyboy.cn';
 $title='参数错误，正在返回首页...';
 }
 }
} else {
 $title='参数缺失，正在返回首页...';
 $url='https://pan.dyboy.cn';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="1;url='<?php echo $url;?>';">
<title><?php echo $title;?></title>
<div id="circle"></div>
<div id="circletext"></div>
<div id="circle1"></div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="1;url='<?php echo $url;?>';">
<title><?php echo $title;?></title>
<style>
<style type="text/css">
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}body{background:#3498db;}#loader-container{width:188px;height:188px;color:white;margin:0 auto;position:absolute;top:50%;left:50%;margin-right:-50%;transform:translate(-50%,-50%);border:5px solid #3498db;border-radius:50%;-webkit-animation:borderScale 1s infinite ease-in-out;animation:borderScale 1s infinite ease-in-out;}#loadingText{font-family:'Raleway',sans-serif;font-size:1.4em;position:absolute;top:50%;left:50%;margin-right:-50%;transform:translate(-50%,-50%);}@-webkit-keyframes borderScale{0%{border:5px solid white;}50%{border:25px solid #3498db;}100%{border:5px solid white;}}@keyframes borderScale{0%{border:5px solid white;}50%{border:25px solid #3498db;}100%{border:5px solid white;}}
</style>
</style></head>
<body>
<div id="loader-container"><p id="loadingText">页面加载中</p></div>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1264449021'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1264449021' type='text/javascript'%3E%3C/script%3E"));</script></script>
</body>
</html>
