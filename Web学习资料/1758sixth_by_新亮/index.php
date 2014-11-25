<?php
session_start();
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
//$code_url = "http://www.baidu.com" ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <title>1758翩翩喜欢你-时光深处</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="The 1758 dancing padty's index page" />
        <meta name="keywords" content="1758, index, dancing party"/>
		<link rel="shortcut icon" href="http://1.1758sixth.sinaapp.com/images/1758.ico" type="image/x-icon"/>
		<!-- CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/style2.css" type="text/css" />
        
		<!-- JS -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/Cantarell.font.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/action.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
			Cufon.replace('a,h3');
			Cufon.replace('h1', {
				textShadow: '0px 1px #fff'
			});
			Cufon.replace('h2', {
				textShadow: '0px 1px #fff'
			});
		</script>
    </head>

    <body>
   		<embed src="music/bg.mp3" autostart="true" loop="true" hidden="true" ></embed>
		<div class="content">
			<h1></h1>
			<h2></h2>
			<div id="hs_container" class="hs_container">
				<div class="hs_area hs_area1">
					<img class="hs_visible" src="images/area1/1.jpg" alt=""/>
					<img src="images/area1/2.jpg" alt=""/>
					<img src="images/area1/3.jpg" alt=""/>
				</div>
				<div class="hs_area hs_area2">
					<img class="hs_visible" src="images/area2/1.jpg" alt=""/>
					<img src="images/area2/2.jpg" alt=""/>
					<img src="images/area2/3.jpg" alt=""/>
				</div>
				<div class="hs_area hs_area3">
					<img class="hs_visible" src="images/area3/1.jpg" alt=""/>
					<img src="images/area3/2.jpg" alt=""/>
					<img src="images/area3/3.jpg" alt=""/>
				</div>
				<div class="hs_area hs_area4">
					<img class="hs_visible" src="images/area4/1.jpg" alt=""/>
					<img src="images/area4/2.jpg" alt=""/>
					<img src="images/area4/3.jpg" alt=""/>
				</div>
				<div class="hs_area hs_area5">
					<img class="hs_visible" src="images/area5/1.jpg" alt=""/>
					<img src="images/area5/2.jpg" alt=""/>
					<img src="images/area5/3.jpg" alt=""/>
				</div>
			</div>
            <div id="main">
       		 	<p class="intro"></p>
				<p class="intro"></p>
				<p class="intro"></p>
				<p class="intro"></p>
        	</div>
			<div>
				<span class="reference">
					<a href="http://weibo.com/sysu1758" target="_blank">The Weibo of 1758</a><br />
                    温馨提示： 为了能有更好的浏览效果，请登录前清空浏览器缓存并刷新！谢谢！O(∩_∩)O
				</span>
				<!-- 授权按钮 -->
				<p id="logo">
                <a href="<?=$code_url?>"><img src="images/weibo_login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>
                </p>
			</div>
		</div>  
    </body>
</html>