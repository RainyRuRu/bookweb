<?php
if (isset($_SESSION['u_id'])) {
	$login = '<button type="button" class="btn HeaderLoginBtn" onclick="location.href=\'API/Logout.php\'">登出</button>';
} else {
	$login = '<button type="button" class="btn HeaderLoginBtn" onclick="location.href=\'Login.php\'">登入</button>';
}
echo '<div class="header">
		<span class="glyphicon glyphicon-home homeIcon" aria-hidden="true" onclick="location.href=\'Homepage.php\'"></span>' . 
		$login .
		'<button type="button" class="btn HeaderLoginBtn" onclick="location.href=\'MemberCenter.php\'">會員中心</button>
	</div>';