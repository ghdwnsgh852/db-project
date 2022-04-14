<?php
include "db_head.php";
include "inc_head.php";
trainerOnly();

$name = $_POST['name'];
$capacity = $_POST['capacity'];
$instructor = $_POST['instructor'];
$description = $_POST['description'];
if($name ==NULL||$capacity ==NULL||$instructor ==NULL||$description == NULL){
    echo"<script type='text/javascript'>

    alert('수업 정보를 모두 입력해주세요.');

    </script>";

    echo "<script type='text/javascript'>
    document.location.href = '/5025/add_class.html';
    </script>";
}

$sql = "INSERT INTO class(CNO,CNAME,CAPACITY,INSTID,DESCR) VALUES(NO_CLASS.NEXTVAL,'".$name."',".$capacity.",'".$instructor."','".$description."')";

//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
if($re){
    echo"<script type='text/javascript'>

    alert('수업 추가가  완료되었습니다.');

    </script>";

    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = \"classlist.php\";
    </script>";
    exit();
}
?>

