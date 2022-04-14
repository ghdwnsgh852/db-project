<?php
include 'inc_head.php';
include 'db_head.php';
userOnly();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>인바디 정보보기</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    body {
      min-height: 100vh;

      background: -webkit-gradient(linear, left bottom, right top, from(#92b5db), to(#1d466c));
      background: -webkit-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: -moz-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: -o-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: linear-gradient(to top right, #92b5db 0%, #1d466c 100%);
    }

    .input-form {
      max-width: 680px;

      margin-top: 80px;
      padding: 32px;

      background: #fff;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
      box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
    }
</style>
</head>
<body>
<div class="container">
    <div class="input-form-backgroud row">
      <div class="input-form col-md-12 mx-auto">
        <h4 class="mb-3">인바디</h4>
        <form class="validation-form" name="login" method="post" action ="/5025/inbody_measure_paste.php" novalidate>
<?php
$exist = false;
if($session_permission == "member"){
            $sql ="select * from MEMBER,INBODY where MEMBER.ID=INBODY.ID AND MEMBER.ID='".$session_username."'";
            $stid = oci_parse($connect, $sql);
//send SQL
	    $re=oci_execute($stid);
            while (($row = oci_fetch_row($stid)) != false) {
                $exist = true;
                $ID = $row[0];
                $password = $row[1];
                $name = $row[2];
                $age = $row[3];
                $phone = $row[4];
                $sex = $row[5];
                $INBODYNUM = $row[6];
                $HEIGHT = $row[7];
                $WEIGHT = $row[8];
                $BODYFATMASS = $row[9];
                $MUSCLEMASS = $row[10];
                $PERCENTBODYGAT = $row[11];
                $BMI = $row[12];
                    }
        }else{
	    $sql ="select * from MEMBER,INBODY where MEMBER.ID=INBODY.ID AND MEMBER.ID='".$_GET["id"]."'";
            $stid = oci_parse($connect, $sql);
//send SQL
	    $re=oci_execute($stid);
            while (($row = oci_fetch_row($stid)) != false) {
                $exist = true;
                $ID = $row[0];
                $password = $row[1];
                $name = $row[2];
                $age = $row[3];
                $phone = $row[4];
                $sex = $row[5];
                $INBODYNUM = $row[6];
                $HEIGHT = $row[7];
                $WEIGHT = $row[8];
                $BODYFATMASS = $row[9];
                $MUSCLEMASS = $row[10];
                $PERCENTBODYGAT = $row[11];
                $BMI = $row[12];
            }
        } 
    if(!$exist){
	    echo "<script type='text/javascript'>
                        alert( '인바디 정보가 없습니다.');
			</script>";
            echo "<script type='text/javascript'>
            document.location.href = '/5025/inbody_measure_paste.php';
            </script>";
            echo "<script type='text/javascript'>
            document.location.href = history.back();
            </script>";
    }
?>


          인바디 번호
	  <input type="text" name="인바디 번호" class="form-control" id="INBODYNUM" value="<?php echo $INBODYNUM;?>" readonly>
          키
	   <input type="text" name="키" class="form-control" id="HEIGHT" value="<?php echo $HEIGHT;?>" readonly>
          몸무게
	  <input type="text" name="몸무게" class="form-control" id="WEIGHT" value="<?php echo $WEIGHT;?>" readonly>
          체지방량
	  <input type="text" name="체지방량" class="form-control" id="BODYFATMASS" value="<?php echo $BODYFATMASS;?>" readonly>
          골격근량
	   <input type="text" name="골격근량" class="form-control" id="MUSCLEMASS" value="<?php echo $MUSCLEMASS;?>" readonly>
          체지방률
	  <input type="text" name="체지방률" class="form-control" id="PERCENTBODYGAT" value="<?php echo $PERCENTBODYGAT;?>" readonly>
          BMI
          <input type="text" name="BMI" class="form-control" id="BMI" value="<?php echo $BMI;?>" readonly>
</form>
</body>
