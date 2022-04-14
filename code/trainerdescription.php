<?php
include 'inc_head.php';
include 'db_head.php';

?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>트레이너 정보</title>

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
        <h4 class="mb-3">트레이너 정보</h4>
        <form class="validation-form" name="login" method="post" action ="/5025/enrolment_pt.php" novalidate>
<?php
            $sql ="select * from TRAINER where ID='".$_GET['id']."'";
            $stid = oci_parse($connect, $sql);
//send SQL
            $re=oci_execute($stid);
            while (($row = oci_fetch_row($stid)) != false) {

                $ID = $row[0];
                $password = $row[1];
                $name = $row[2];
                $age = $row[3];
                $phone = $row[4];
                $sex = $row[5];
                $career = $row[6];
            
        } ?>
	  <input type="hidden" id="ID" name="ID" value="<?php echo $ID;?>">
          <div class="mb-3">
            <label for="name">이름</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>" readonly>
            <div class="invalid-feedback">
              이름을 입력해주세요.
            </div>
          </div>

          <div class="mb-3">
            <label for="phone">전화번호</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $phone;?>" readonly>
            <div class="invalid-feedback">
              전화번호를 입력해주세요.
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 mb-3">
              <label for="root">성별</label>
              <select class="custom-select d-block w-100" name="sex" id="sex">
                <?php  if($sex == "남자"): ?>
                <option type="radio" name="sex" value="남자" id="남자" selected >남자(선택됨)</option>
                <?php elseif($sex == "여자"):  ?>
                <option type="radio" name="sex" value="여자" id="여자" selected >여자(선택됨)</option>
                <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                성별을 선택해주세요.
              </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="age">나이</label>
                <input type="text" name="age" class="form-control" id="age" value="<?php echo $age;?>" readonly>
                <div class="invalid-feedback"> 나이를 입력해주세요.
                </div>
              </div>
          </div>
          <div class="mb-3">
            <label for="career">경력</label>
            <textarea name="career"cols="50" class="form-control" rows="10" readonly><?php echo $career;?></textarea>

            <div class="invalid-feedback">
              경력를 입력해주세요.
            </div>
          </div>

          <hr class="mb-4">
	  <div class="mb-4"></div>
<?php if($session_permission == "member"){
echo "<button class=\"btn btn-primary btn-lg btn-block\" name = \"update\" type=\"submit\" id = \"update\">수강신청</button>";
echo "</form>";
		}elseif($session_username == "$ID" || $session_permission){
			echo "</form>";
echo "<button class=\"btn btn-primary btn-lg btn-block\" onClick=\"window.open('/5025/studentlistpt.php?mid=".$ID."','수강생목록','width=430,height=700,location=no,status=no,scrollbars=yes');\" >수강생 목록</button>";
}
?>
</form>
          &nbsp;
          <button class="btn btn-primary btn-lg btn-block" onClick="history.back()" >목록으로</button>

      </div>
    </div>
  </div>
  <script>
    window.addEventListener('load', () => {
      const forms = document.getElementsByClassName('validation-form');
      Array.prototype.filter.call(forms, (form) => {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
 event.stopPropagation();
          }

          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  </script>
</body>
</html>

