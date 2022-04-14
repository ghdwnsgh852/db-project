<?php
session_start();
if(isset( $_SESSION[ 'id'])){
	$session_login = TRUE;
	$session_username = $_SESSION['id'];
	$session_permission=$_SESSION['permission'];
}else{
	$session_login = FALSE;
}

function adminOnly(){
	if(isset($_SESSION['id'])){
 	       if($_SESSION['permission'] != "admin"){
        	        echo "<script type='text/javascript'>
               		document.location.href = '/5025/401.html';
                	</script>";
        	}
	}else{
        	echo "<script type='text/javascript'>
        	document.location.href = '/5025/404.html';
        	</script>";
	}
}
function userOnly(){
	if(!isset($_SESSION['id'])){
		echo "<script type='text/javascript'>
         	alert( '로그인 이후 접근할 수 있습니다.');
         	</script>";
                echo "<script type='text/javascript'>
                document.location.href = '/5025/401.html';
                </script>";
	}
}
function memberOnly(){
        if(isset($_SESSION['id'])){
		if($_SESSION['permission'] != "member"){
			echo "<script type='text/javascript'>
                	alert( '멤버만 접근할 수 있습니다.');
                	</script>";
                        echo "<script type='text/javascript'>
                        document.location.href = '/5025/401.html';
                        </script>";
		}
        }else{
		echo "<script type='text/javascript'>
                alert( '로그인 이후 접근할 수 있습니다.');
		</script>";
                echo "<script type='text/javascript'>
                document.location.href = '/5025/401.html';
                </script>";
	}
}
function trainerOnly(){
        if(isset($_SESSION['id'])){
                if($_SESSION['permission'] != "trainer"){
                        echo "<script type='text/javascript'>
                        alert( '트레이너만 접근할 수 있습니다.');
                        </script>";
                        echo "<script type='text/javascript'>
                        document.location.href = '/5025/401.html';
                        </script>";
                }
        }else{
                echo "<script type='text/javascript'>
                alert( '로그인 이후 접근할 수 있습니다.');
                </script>";
                echo "<script type='text/javascript'>
                document.location.href = '/5025/401.html';
                </script>";
        }
}
?>
