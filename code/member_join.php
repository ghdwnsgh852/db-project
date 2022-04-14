<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
include 'db_head.php';

?>
<?php
//oracle data base address
$ID = $_POST['ID'];
$password1 = $_POST['pw1'];
$name = $_POST['name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];

if($ID ==NULL||$password1 ==NULL||$name==NULL||$age ==NULL||$phone ==NULL||$sex ==NULL){
    echo"<script type='text/javascript'>

    alert('회원 정보를 모두 입력해주세요.');

    </script>";

    echo "<script type='text/javascript'>
    document.location.href = '/5025/member_register.html';
    </script>";
}
  
$sql = "INSERT INTO MEMBER(ID,PASSWD,NAME,AGE,PHONE,SEX) VALUES('$ID','$password1','$name','$age','$phone','$sex')";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
if($re){
$sql = "INSERT INTO INBODY(inbodynum,height,bmi,weight,PERCENTBODYGAT,BODYFATMASS,MUSCLEMASS,id) VALUES(NO_ID.NEXTVAL,0,0,0,0,0,0,'$ID')";
                          $stid = oci_parse($connect, $sql);
                        //send SQL
                          $re=oci_execute($stid);


    echo"<script type='text/javascript'>

    alert('회원가입 완료되었습니다.');

    </script>";

    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/member_login.html';
    </script>";
}else{
    echo"<script type='text/javascript'>

    alert('아이디가 존재합니다.');

    </script>";

    oci_free_statement($stid);
    oci_close($connect);
    echo "<script type='text/javascript'>
    document.location.href = '/5025/member_register.html';
    </script>";
    exit();
}
?>
