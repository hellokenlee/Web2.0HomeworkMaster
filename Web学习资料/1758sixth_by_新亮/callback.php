<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}

if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
?>
授权完成,登陆成功，跳转中...<script type="text/javascript" language="javascript">
                          window.location.href = "1758wh.php";
						 </script>
<?php
} else {
?>
授权失败,请重新授权并登陆！<script type="text/javascript" language="javascript">
                          window.location.href = "index.php";
					   </script>
<?php
}
?>
