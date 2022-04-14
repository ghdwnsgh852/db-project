<?php
include 'inc_head.php';
userOnly();
$db = '
(DESCRIPTION =
        (ADDRESS_LIST =
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';
//enter user name & password
$username = "db502group5";
$password = "test1234";

//connect with oracle_db
$connect = oci_connect($username, $password, $db, 'AL32UTF8');

//oracle db connection error message
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
if($session_permission == "member"){
  if($_POST['ID'] ==NULL || $_POST['pw1'] ==NULL || $_POST['name']==NULL || $_POST['phone'] ==NULL || $_POST['age'] ==NULL || $_POST['sex'] ==NULL){	
    echo"<script type='text/javascript'>
        alert('회원 정보를 모두 입력해주세요.');
        </script>";
    echo "<script type='text/javascript'>
        document.location.href = '/5025/mypage.php';
        </script>";
  }else{
    $sql ="update MEMBER SET  ID='".$_POST['ID']."', PASSWD='".$_POST['pw1'];
    $sql = $sql."', NAME = '".$_POST['name']."',PHONE ='".$_POST['phone']."',AGE='".$_POST['age'];
    $sql = $sql."',SEX = '".$_POST['sex']."' where ID='".$_POST['ID']."'";
    $stid = oci_parse($connect, $sql);
    //send SQL
    $re=oci_execute($stid);
    echo "<script type='text/javascript'>
          alert( ' 수정이 완료되었습니다.');
          </script>";
  }
} elseif($session_permission == "trainer" ){
  if($_POST['ID'] ==NULL || $_POST['pw1'] ==NULL || $_POST['name']==NULL || $_POST['phone'] ==NULL || $_POST['age'] ==NULL || $_POST['sex'] ==NULL || $_POST['career'] ==NULL){
    echo"<script type='text/javascript'>
         alert('직원 정보를 모두 입력해주세요.');
         </script>";
    echo "<script type='text/javascript'>
         document.location.href = '/5025/mypage.php';
         </script>";
  }else {
    $sql ="update TRAINER SET  ID='".$_POST['ID']."', PASSWD='".$_POST['pw1'];
    $sql = $sql."', NAME = '".$_POST['name']."',PHONE ='".$_POST['phone']."',AGE='".$_POST['age'];
    $sql = $sql."', career = '".$_POST['career']."',SEX = '".$_POST['sex']."' where ID='".$_POST['ID']."'";
    $stid = oci_parse($connect, $sql);
    //send SQL
    $re=oci_execute($stid);
    echo "<script type='text/javascript'>
          alert( ' 수정이 완료되었습니다.');
	  </script>";
  }
}
echo "<script type='text/javascript'>
document.location.href = '/5025/mypage.php';
</script>";
?>
