<?php
include 'inc_head.php';
include 'db_head.php';
memberOnly();
//get을 통해서 들을 수업의 id 가져오기
$tid = $_POST['ID'];
//class 테이블에서 정원 가져오기
//classmemeber 테이블에서 count 이용해서 수강중인 인원 구하기
$sql= "SELECT COUNT(CASE WHEN TID = '".$tid."' THEN 1 END)  FROM pt";
$stid = oci_parse($connect, $sql);
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
   $now = $row[0];
}
$date = date("Y/m/d");
// if 정원이 가득차지 않은경우
if( $now < 15 )  {
        $sql= "SELECT COUNT(CASE WHEN MID = '".$session_username."' THEN 1 END)  FROM pt";
        $stid = oci_parse($connect, $sql);
        $re=oci_execute($stid);
        while (($row = oci_fetch_row($stid)) != false) {
                $classes = $row[0];
        }
        if($classes == 1){
    echo"<script type='text/javascript'>
    alert('동시에 2개의 수업을 들을 수 없습니다.');
    </script>";
    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/ptlist.php';
    </script>";
        }
        $sql= "SELECT COUNT(CASE WHEN TID = '".$tid."' AND MID = '".$session_username."' THEN 1 END)  FROM pt";
        $stid = oci_parse($connect, $sql);
        $re=oci_execute($stid);
        while (($row = oci_fetch_row($stid)) != false) {
                $registered = $row[0];
        }
        if($registered > 0){
    echo"<script type='text/javascript'>
    alert('이미 이 수업을 수강중입니다.');
    </script>";
    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/ptlist.php';
    </script>";
        }
// classmember 테이블로 insert
$sql= "INSERT INTO pt(TID, MID, REGDATE) VALUES('$tid', '$session_username', '$date')";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
if($re){
    echo"<script type='text/javascript'>

    alert('수강신청이  완료되었습니다.');

    </script>";
    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/ptlist.php';
    </script>";
}}else{
    echo"<script type='text/javascript'>
    alert('정원초과.');

    </script>";

    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/ptlist.php';
    </script>";
    exit();
}

?>

