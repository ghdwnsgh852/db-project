<?php
include 'inc_head.php';
include 'db_head.php';
adminOnly();

$sql= "DELETE FROM class WHERE CNO = '".$_POST['id']."'";
 $stid = oci_parse($connect, $sql);
    //send SQL
$re=oci_execute($stid);
 echo "<script type='text/javascript'>
          alert( '수업<".$_POST['id']."> 삭제가  완료되었습니다.');
          </script>";
echo "<script type='text/javascript'>
document.location.href = '/5025/manage_class.php';
</script>";
?>
