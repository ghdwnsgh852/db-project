<?php
include 'inc_head.php';
include 'db_head.php';
adminOnly();

  if($_POST['ID'] ==NULL || $_POST['name'] ==NULL || $_POST['instructor'] ==NULL || $_POST['capacity']==NULL || $_POST['description'] ==NULL){
    echo"<script type='text/javascript'>
        alert('수업 정보를 모두 입력해주세요.');
        </script>";
    echo "<script type='text/javascript'>
        document.location.href = '/5025/manage_class.php';
        </script>";
  }else{
    $sql ="update class SET CNAME='".$_POST['name']."', INSTID='".$_POST['instructor'];
    $sql = $sql."', CAPACITY = '".$_POST['capacity']."',DESCR ='".$_POST['description']."'";
    $sql = $sql."where CNO='".$_POST['ID']."'";
    $stid = oci_parse($connect, $sql);
    //send SQL
    $re=oci_execute($stid);
    echo "<script type='text/javascript'>
          alert( '<회원정보> 수정이 완료되었습니다.');
          </script>";
}
echo "<script type='text/javascript'>
document.location.href = '/5025/manage_class.php';
</script>";
?>


