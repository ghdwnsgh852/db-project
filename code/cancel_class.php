<?php
include 'inc_head.php';
include 'db_head.php';
adminOnly();

$sql= "DELETE FROM classmember WHERE CNO = '".$_GET['cid']."'AND MID ='".$_GET['mid']."'";

 $stid = oci_parse($connect, $sql);
    //send SQL
$re=oci_execute($stid);
if($re){
 echo "<script type='text/javascript'>
          alert( '<".$_GET['mid'].">회원의 철회가  완료되었습니다.');
          </script>";
echo "<script type='text/javascript'>
document.location.href = history.back();
</script>";
}
?>

