<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
include 'db_head.php';
?>
<?php


$login_id = isset($_POST['ID']) ? $_POST['ID'] : null;
$login_pw = isset($_POST['passwd']) ? $_POST['passwd'] : null;


/*
// 파라미터 체크
if ($login_id == null || $login_pw == null){    
    header("Location: /5025/login.php");
    exit();
}
*/
// 회원 데이터
$sql = "SELECT * FROM MEMBER WHERE ID ='$login_id'";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
    if ($row[0]!==$login_id){
        $member_data=NULL;
    }else{
        $member_data=1;
        $member_id=$row[0];
        $member_passwd=$row[1];
    }
}
// 회원 데이터가 없다면
if ($member_data == NULL){
    echo"<script type='text/javascript'>
    alert('회원 정보가 없습니다');
    </script>";
    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/member_login.html';
    </script>";
    exit();
}
// 비밀번호 일치 여부 검증
$is_match_password = ($login_pw==$member_passwd)? true:false;
// 비밀번호 불일치
if ($is_match_password === false){
    echo"<script type='text/javascript'>
    alert('비밀번호가 일치하지 않습니다.');
    </script>";
    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/member_login.html';
    </script>";
    exit();
}

session_start();
$_SESSION['id'] = $member_id;
$_SESSION['permission'] = "member";
echo "<script type='text/javascript'>
    document.location.href = '/5025/';
    </script>";
// 목록으로 이동
//header("Location: /list.php");
oci_free_statement($stid);
oci_close($connect);
?>
