<?php
session_start();

include_once ('config.php');
include_once ('saetv2.ex.class.php');

if (isset($_SESSION['token']['access_token'])) {
	$c = new SaeTClientV2(WB_AKEY, WB_SKEY, $_SESSION['token']['access_token']);
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
		$v;
		if( $_POST[postnum] == 1) {
			$fileName = $uid."fri11.jpg";
			$txtname11 = $uid."fri11.txt";
			$s = new SaeStorage();
			$v = 1;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname11);
		}
		else if( $_POST[postnum] == 2) {
			$fileName = $uid."fri17.jpg";
			$txtname17 = $uid."fri17.txt";
			$s = new SaeStorage();
			$v = 2;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname17);
		}
		else if( $_POST[postnum] == 3) {
			$fileName = $uid."fri15.jpg";
			$txtname15 = $uid."fri15.txt";
			$s = new SaeStorage();
			$v = 3;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname15);
		}
		else if( $_POST[postnum] == 4) {
			$fileName = $uid."fri18.jpg";
			$txtname18 = $uid."fri18.txt";
			$s = new SaeStorage();
			$v = 4;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname18);
		}
		else if( $_POST[postnum] == 5) {
			$fileName = $uid."fri21.jpg";
			$txtname21 = $uid."fri21.txt";
			$s = new SaeStorage();
			$v = 1;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname21);
		}
		else if( $_POST[postnum] == 6) {
			$fileName = $uid."fri27.jpg";
			$txtname27 = $uid."fri27.txt";
			$s = new SaeStorage();
			$v = 2;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname27);
		}
		else if( $_POST[postnum] == 7) {
			$fileName = $uid."fri25.jpg";
			$txtname25 = $uid."fri25.txt";
			$s = new SaeStorage();
			$v = 3;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname25);
		}
		else if( $_POST[postnum] == 8) {
			$fileName = $uid."fri28.jpg";
			$txtname28 = $uid."fri28.txt";
			$s = new SaeStorage();
			$v = 4;
			$newImg = $s->getUrl('pics', $fileName);
			$username = $s->read('files',$txtname28);
		}
		$SendText = "@中山大学_1758翩翩喜欢你，时光深处(somewhere in time)！@".$username." 1758，你在我的第".$v."个位置！今年冬夜，你愿意做我的舞伴么？12月23日，约定你...想要发飞舞函给1758中的谁？点击进入：http://1758sixth.sinaapp.com";
		$ret = $c->upload($SendText, $newImg);
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