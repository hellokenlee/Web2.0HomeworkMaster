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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="http://1.1758sixth.sinaapp.com/images/1758.ico" type="image/x-icon"/>
		<title>1758翩翩喜欢你-时光深处</title>
	</head>
	<body>
		<?
		$username = $_POST['postname'];
		$userTA = $c->show_user_by_name($username);
		$urlTA = $userTA['avatar_large'];
		$nameTA = $userTA['screen_name'];
		$genderTA = $userTA['gender'];
		if( $genderTA == 'm' )
			$img = "images/feiwuhan_boy.jpg";
		else
		    $img = "images/feiwuhan_girl.jpg";
		/*
		$imageTA = file_get_contents($urlTA);
		
		$img1 = new SaeImage($img);
		$size = $img1->getImageAttr();
		$img1->clean();
		$img1->setData( array(
				array( $img, 0, 0, 0, SAE_TOP_LEFT ),
				array( $imageTA, 40, -40, 0, SAE_TOP_LEFT ),
			));
		$img1->composite($size[0], $size[1]);
		$data = $img1->exec();
		$fileName = $uid."sTA.jpg";
		$s = new SaeStorage();
		if ($s->fileExists('pics', $fileName)) {
			$s->delete('pics', $fileName);
		}
		$s->write('pics' ,$fileName ,$data);
		$newImg = $s->getUrl('pics', $fileName);
		*/
		$newImg = $img;
		$newTxt = "@中山大学_1758翩翩喜欢你，时光深处(somewhere in time)！@".$nameTA." 不管时间过去多少，我依然不会忘记你！今年冬夜，你愿意做我的舞伴么？12月23日，约定你...想要发飞舞函给1758中的谁？点击进入：http://1758sixth.sinaapp.com";
		$ret = $c->upload($newTxt, $newImg);
		if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
			echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
			echo '<script type="text/javascript" language="JavaScript">window.location.href="index.php";</script>';
		} else {
			echo "<p>发送成功，正在返回你的微博。</p>";
			echo '<script type="text/javascript" language="JavaScript">window.location.href="http://weibo.com";</script>';
		}
		?>
	</body>
</html>
<?
}
else {
	echo "错误，正在返回";
	echo '<script type="text/javascript" language="JavaScript">window.location.href="index.php";</script>';
}
?>
