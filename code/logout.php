<?php 
  include 'inc_head.php';
  userOnly();
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if ( $session_login ) {
        session_destroy();
       	echo "<script type='text/javascript'>
   	alert( '로그아웃 하였습니다.');
	</script>";
      } else {
  	echo "<script type='text/javascript'>
	alert('로그인 상태가 아닙니다.');
	</script>";
      }
    ?>
  </body>
</html>
<?php
echo "<script type='text/javascript'>
    document.location.href = '/5025/';
    </script>";
?>
