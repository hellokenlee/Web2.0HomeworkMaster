<?php
include 'hashmap.php';
session_start();
include_once ('config.php');
include_once ('saetv2.ex.class.php');

if (isset($_SESSION['token']['access_token'])) {
$c = new SaeTClientV2(WB_AKEY, WB_SKEY, $_SESSION['token']['access_token']);
$ms = $c -> home_timeline();// done
$uid_get = $c -> get_uid();
$uid = $uid_get['uid'];
$user_message = $c -> show_user_by_id($uid);//根据ID获取用户等基本信息
$user_gender = $user_message['gender'];
$user_images = $user_message['avatar_large'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>1758翩翩喜欢你-时光深处</title>
        <meta content="Xinliang Wei" name="Author"/>
        <meta content="Sun Yat-Sen University" name="College"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"; charset="UTF-8">
        <link rel="shortcut icon" href="http://1.1758sixth.sinaapp.com/images/1758.ico" type="image/x-icon"/>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="../style-projects-jquery.css" />    
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/1758wh.css" />
        <link rel="stylesheet" type="text/css" href="css/count.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.countdown.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
        <!--JS-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/modernizr.custom.34978.js"></script>
		<script type="text/javascript" src="js/jquery.countdown.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/script2.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript" src="js/show_ads.js"></script>
		<script type="text/javascript">
    		$(function() {
       			$('#gallery a').lightBox();
    		});
    	</script>
        <script type="text/javascript" src="js/jquery.jmpopups-0.5.1.js"></script>
		<script type="text/javascript">
				$.setupJMPopups({
					screenLockerBackground: "#003366",
					screenLockerOpacity: "0.5"
				});
				function openStaticPopup() {
					$.openPopupLayer({
						name: "myStaticPopup",
						width: 820,
						target: "myHiddenDiv"
					});
				}
		</script>
    </head>
    <body>
    	<embed src="music/bg2.mp3" autostart="true" loop="true" hidden="true" ></embed>
    	<?
		$sum = 0;
		$count1 = new HashMap();
		$count2 = new HashMap();

		$comment1 = $c -> comments_timeline(1, 200);
		$comment2 = $c -> comments_timeline(2, 200);
		$comments = array_merge_recursive($comment1, $comment2);
		
		$mentions = $c -> comments_mentions(1, 200);
		$whole = array_merge_recursive($mentions, $comments);
		
		foreach ($whole['comments'] as $item) {
			if ($item['user']['gender'] != $user_gender) {
				if ($count1 -> containsKey($item['user']['id'])) {
					$temp = $count1 -> get($item['user']['id']);
					$count1 -> remove($item['user']['id']);
					$count1 -> put($item['user']['id'], $temp + 1);
				} else
					$count1 -> put($item['user']['id'], 1);
			}
			else {
				if ($count2 -> containsKey($item['user']['id'])) {
					$temp = $count2 -> get($item['user']['id']);
					$count2 -> remove($item['user']['id']);
					$count2 -> put($item['user']['id'], $temp + 1);
				} else
					$count2 -> put($item['user']['id'], 1);
			}
		}
		
		$array1 = $count1 -> returnArray();
		$keys1 = $count1 -> keys();
		
		$array2 = $count2 -> returnArray();
		$keys2 = $count2 -> keys();
		
		$friend1;
		$friend2;
		$choose = 0;
		$chooseIndex;
		// friend1
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[0] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[1] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[1] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[2] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[3] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[4] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[5] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[6] = $chooseIndex;
		unset($array1[$chooseIndex]);
		
		$choose = 0;
		foreach($keys1 as $item)  {
			if ($array1[$item] >= 1 && $array1[$item] > $choose)  {
				$choose = $array1[$item];
				$chooseIndex = $item;
			}
		}
		$friend1[7] = $chooseIndex;
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[0] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[1] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[2] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[3] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[4] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[5] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[6] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[7] = $chooseIndex;
		unset($array2[$chooseIndex]);
		
		$choose = 0;
		foreach($keys2 as $item)  {
			if ($array2[$item] >= 1 && $array2[$item] > $choose)  {
				$choose = $array2[$item];
				$chooseIndex = $item;
			}
		}
		$friend2[8] = $chooseIndex;
		
		if ($friend1[0] == null&&$friend2[0] == null) {
			echo "对不起，获取失败，请重新登录。";
			echo '<script type="text/javascript" language="JavaScript">window.location.href="index.php";</script>';
		}
		// friend1 1758
		$fri11 = $c->show_user_by_id($friend1[0]);
		$urlfri11 = $fri11['avatar_large'];
		$namefri11 = $fri11['screen_name'];
		$fri17 = $c->show_user_by_id($friend1[1]);
		$urlfri17 = $fri17['avatar_large'];
		$namefri17 = $fri17['screen_name'];
		$fri15 = $c->show_user_by_id($friend1[2]);
		$urlfri15 = $fri15['avatar_large'];
		$namefri15 = $fri15['screen_name'];
		$fri18 = $c->show_user_by_id($friend1[3]);
		$urlfri18 = $fri18['avatar_large'];
		$namefri18 = $fri18['screen_name'];
		// friend2 1758
		$fri21 = $c->show_user_by_id($friend2[1]);
		$urlfri21 = $fri21['avatar_large'];
		$namefri21 = $fri21['screen_name'];
		$fri27 = $c->show_user_by_id($friend2[2]);
		$urlfri27 = $fri27['avatar_large'];
		$namefri27 = $fri27['screen_name'];
		$fri25 = $c->show_user_by_id($friend2[3]);
		$urlfri25 = $fri25['avatar_large'];
		$namefri25 = $fri25['screen_name'];
		$fri28 = $c->show_user_by_id($friend2[4]);
		$urlfri28 = $fri28['avatar_large'];
		$namefri28 = $fri28['screen_name'];
		
	    $ShowText = "温馨提示：如果想给谁发送飞舞函，点击相应的图片进入浏览模式并且按发送键即可哦！<br />
		             在浏览模式下只会发送你点击的那位好友的信息，要想发送其他好友的信息，请退出浏览模式再点击进入！O(∩_∩)O";
		
		if ($user_gender == 'm') {
			$img1 = file_get_contents('images/feiwuhan_girl.jpg');
			$img111 = file_get_contents('images/feiwuhan_boy.jpg');
		}
		else {
			$img1 = file_get_contents('images/feiwuhan_boy.jpg');
			$img111 = file_get_contents('images/feiwuhan_girl.jpg');
		}
		
		$imgfri11 = file_get_contents($urlfri11);
		$imgfri17 = file_get_contents($urlfri17);
		$imgfri15 = file_get_contents($urlfri15);
		$imgfri18 = file_get_contents($urlfri18);
		
		$imgfri21 = file_get_contents($urlfri21);
		$imgfri27 = file_get_contents($urlfri27);
		$imgfri25 = file_get_contents($urlfri25);
		$imgfri28 = file_get_contents($urlfri28);
		
		$img11 = new SaeImage($img1);
		$size = $img11->getImageAttr();
		$img11->clean();
		$img11->setData( array(
				array( $img1, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri11, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img11->composite($size[0], $size[1]);
		$data = $img11->exec();
		$fileName = $uid."fri11.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg11 = $s->getUrl('pics', $fileName);
		$txtname11 = $uid."fri11.txt";
		if($s->fileExists('files', $txtname11)) {
			$s->delete('files', $txtname11);
		}
		$s->write('files', $txtname11, $namefri11);
		
		$img17 = new SaeImage($img1);
		$size = $img17->getImageAttr();
		$img17->clean();
		$img17->setData( array(
				array( $img1, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri17, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img17->composite($size[0], $size[1]);
		$data = $img17->exec();
		$fileName = $uid."fri17.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg17 = $s->getUrl('pics', $fileName);
		$txtname17 = $uid."fri17.txt";
		if($s->fileExists('files', $txtname17)) {
			$s->delete('files', $txtname17);
		}
		$s->write('files', $txtname17, $namefri17);
		
		$img15 = new SaeImage($img1);
		$size = $img15->getImageAttr();
		$img15->clean();
		$img15->setData( array(
				array( $img1, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri15, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img15->composite($size[0], $size[1]);
		$data = $img15->exec();
		$fileName = $uid."fri15.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg15 = $s->getUrl('pics', $fileName);
		$txtname15 = $uid."fri15.txt";
		if($s->fileExists('files', $txtname15)) {
			$s->delete('files', $txtname15);
		}
		$s->write('files', $txtname15, $namefri15);
		
		$img18 = new SaeImage($img1);
		$size = $img18->getImageAttr();
		$img18->clean();
		$img18->setData( array(
				array( $img1, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri18, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img18->composite($size[0], $size[1]);
		$data = $img18->exec();
		$fileName = $uid."fri18.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg18 = $s->getUrl('pics', $fileName);
		$txtname18 = $uid."fri18.txt";
		if($s->fileExists('files', $txtname18)) {
			$s->delete('files', $txtname18);
		}
		$s->write('files', $txtname18, $namefri18);
		
		$img21 = new SaeImage($img111);
		$size = $img21->getImageAttr();
		$img21->clean();
		$img21->setData( array(
				array( $img111, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri21, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img21->composite($size[0], $size[1]);
		$data = $img21->exec();
		$fileName = $uid."fri21.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg21 = $s->getUrl('pics', $fileName);
		$txtname21 = $uid."fri21.txt";
		if($s->fileExists('files', $txtname21)) {
			$s->delete('files', $txtname21);
		}
		$s->write('files', $txtname21, $namefri21);
		
		$img27 = new SaeImage($img111);
		$size = $img27->getImageAttr();
		$img27->clean();
		$img27->setData( array(
				array( $img111, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri27, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img27->composite($size[0], $size[1]);
		$data = $img27->exec();
		$fileName = $uid."fri27.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg27 = $s->getUrl('pics', $fileName);
		$txtname27 = $uid."fri27.txt";
		if($s->fileExists('files', $txtname27)) {
			$s->delete('files', $txtname27);
		}
		$s->write('files', $txtname27, $namefri27);
		
		$img25 = new SaeImage($img111);
		$size = $img25->getImageAttr();
		$img25->clean();
		$img25->setData( array(
				array( $img111, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri25, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img25->composite($size[0], $size[1]);
		$data = $img25->exec();
		$fileName = $uid."fri25.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg25 = $s->getUrl('pics', $fileName);
		$txtname25 = $uid."fri25.txt";
		if($s->fileExists('files', $txtname25)) {
			$s->delete('files', $txtname25);
		}
		$s->write('files', $txtname25, $namefri25);
		
		$img28 = new SaeImage($img111);
		$size = $img28->getImageAttr();
		$img28->clean();
		$img28->setData( array(
				array( $img111, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imgfri28, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img28->composite($size[0], $size[1]);
		$data = $img28->exec();
		$fileName = $uid."fri28.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg28 = $s->getUrl('pics', $fileName);
		$txtname28 = $uid."fri28.txt";
		if($s->fileExists('files', $txtname28)) {
			$s->delete('files', $txtname28);
		}
		$s->write('files', $txtname28, $namefri28);
		?>
        <div class="container">
			<header>
				<h1>You are in my<span>sixth 1758</span></h1>
				<h2>1758翩翩喜欢你-时光深处(Somewhere in time)</h2>
                <h2 id="note"></h2>
			</header>
			<section class="ib-container" id="ib-container">
				<article id="gallery">
                	<a href="<?=$newImg11?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri11?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri11?>"/>
						<span>一声朋友，一起走过</span>
					</header>
					<p>1758，时光深处，@<?=$namefri11?>，你在我的第<strong>1</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg17?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri17?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri17?>"/>
						<span>起航，追梦，未来，无悔</span>
					</header>
					<p>1758，时光深处，@<?=$namefri17?>，你在我的第<strong>2</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg15?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri15?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri15?>"/>
						<span>舞动青春，悦动年华</span>
					</header>
					<p>1758，时光深处，@<?=$namefri15?>，你在我的第<strong>3</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg18?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri18?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri18?>"/>
						<span>吧啦吧啦，我代表时间惩罚你</span>
					</header>
					<p>1758，时光深处，@<?=$namefri18?>，你在我的第<strong>4</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg21?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri21?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri21?>"/>
						<span>时间是个伟大的使者</span>
					</header>
					<p>1758，时光深处，@<?=$namefri21?>，你在我的第<strong>1</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg27?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri27?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri27?>"/>
						<span>光阴似箭，似水流年</span>
					</header>
					<p>1758，时光深处，@<?=$namefri27?>，你在我的第<strong>2</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg25?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri25?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri25?>"/>
						<span>深深感动，在你我之间</span>
					</header>
					<p>1758，时光深处，@<?=$namefri25?>，你在我的第<strong>3</strong>个位置...</p>
                    </a>
				</article>
				<article id="gallery">
                	<a href="<?=$newImg28?>" title="1758翩翩喜欢你-时光深处(somewhere in time)，@<?=$namefri28?>，你愿意做我的舞伴么？">
					<header>
						<img class="pic" src="<?=$urlfri28?>"/>
						<span>处处喧嚣，偶尔感受平静</span>
					</header>
					<p>1758，时光深处，@<?=$namefri28?>，你在我的第<strong>4</strong>个位置...</p>
                    </a>
				</article>
			</section>
        </div>
       	<div id="sendW"><span><?=$ShowText?></span></div>
        
        <div id="myHiddenDiv">
			<form id="get" name="get" action="send.php" method="post" >
			<div class="popup">
				<div class="popup-header">
					<h2>1758翩翩喜欢你舞会</h2>
				</div>
				<div class="popup-body">
					<div class="con">
						<p></p>
						<b>时光深处(somewhere in time)</b>
						<p>是不是心仪的TA没有出现在上面的几个位置？在下面的选框内填入心仪TA的微博昵称吧，然后发送微博，我们会帮你发飞舞函给TA哦！</p>
						<div id="search_box">
							<p><input type="text" id="s" name="postname" value="中山大学_1758翩翩喜欢你"/></p><br />
							<p><input type="submit" id="go" value="" /></p>
						</div> 
                    </div>
				</div>
			</div>
			</form>
		</div>
		<div id="aa" style="width:100px;height:100px" >
			<a href="javascript:;" onclick="openStaticPopup()" ><img src="images/1758.png" width="100px" height="100px"/></a>
		</div>
		<script>
            function scroll(p){
            var d = document,w = window,o = d.getElementById(p.id),ie6 = /msie 6/i.test(navigator.userAgent);
            if(o){
            	o.style.cssText +=";position:"+(p.f&&!ie6?'fixed':'absolute')+";"+(p.r?'left':"right")+":0;"+(p.t!=undefined?'top:'+p.t+'px':'bottom:0');
            	if(!p.f||ie6){
            		-function(){
            			var t = 500,st = d.documentElement.scrollTop||d.body.scrollTop,c;
            			c = st  - o.offsetTop + (p.t!=undefined?p.t:(w.innerHeight||d.documentElement.clientHeight)-o.offsetHeight);
            			c!=0&&(o.style.top = o.offsetTop + Math.ceil(Math.abs(c)/10)*(c<0?-1:1) + 'px',t=5);
           				setTimeout(arguments.callee,t)
            		}()
            	}
            }
            }
            scroll({
            id:'aa'
            })
         </script>
    </body>
</html>

<?
}
else echo '<script type="text/javascript" language="JavaScript">window.location.href="index.php";</script>';
?>