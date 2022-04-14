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
  <title>수업정보보기</title>

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
        <h4 class="mb-3">수업정보 보기</h4>
        <form class="validation-form" name="login" method="post" action ="/5025/enrolment_class.php" novalidate>
        <?php

            $sql ="SELECT * FROM class WHERE CNO ='".$_GET['id']."'";
            $stid = oci_parse($connect, $sql);
//send SQL
            $re=oci_execute($stid);
	    while (($row = oci_fetch_row($stid)) != false) {
		$cno = $row[0];    
                $name = $row[1];
                $capacity = $row[2];
                $instructor = $row[3];
                $description = $row[4];
            }
         ?>
            <div class="row">
            <div class="col-md-6 mb-3">
                    <label for="ID">수업번호</label>
              <input type="text" name="ID" class="form-control" id="ID" placeholder="" value="<?php echo $cno;?>" readonly>
              <div class="invalid-feedback">
                번호를  입력해주세요.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
                    <label for="instructor">강사</label>
              <input type="text" name="instructor" class="form-control" id="instructor" placeholder="" value="<?php echo $instructor;?>"readonly>
              <div class="invalid-feedback">
                이름을  입력해주세요.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="name">수업제목</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="" value="<?php echo $name;?>" readonly>
            <div class="invalid-feedback">
              수업제목을 입력해주세요.
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 mb-3">
              <label for="capacity">정원</label>
              <select class="custom-select d-block w-100" name="capacity" id="capacity">
		<?php if($capacity == "5"): ?>
		<option type="radio" name="5" value="5" id="capacity">5(선택됨)</option>
                <?php elseif($capacity == "10"): ?>
		<option type="radio" name="10" value="10" id="capacity">10(선택됨)</option>
		<?php elseif($capacity == "15"): ?>
		<option type="radio" name="15" value="15" id="capacity">15(선택됨)</option>
                <?php elseif($capacity == "20"): ?>
		<option type="radio" name="20" value="20" id="capacity">20(선택됨)</option>
		<?php endif; ?>
              </select>
              <div class="invalid-feedback">
                정원을 선택해주세요.
              </div>
               </div>
          </div>
          <div class="mb-3">
            <label for="description">설명</label>
            <textarea name="description"cols="50" class="form-control" rows="10" value=""  readonly><?php echo $description;?></textarea>
            <div class="invalid-feedback">
              설명을 입력해주세요.
            </div>
          </div>


          <hr class="mb-4">
          <div class="mb-4"></div>
<?php if($session_permission == "member"){
echo "<button class=\"btn btn-primary btn-lg btn-block\" name = \"update\" type=\"submit\" id = \"update\">수강신청</button>";
echo "</form>";
                }elseif($session_username == "$instructor"){
              echo "</form>";
              echo "<button class=\"btn btn-primary btn-lg btn-block\" onClick=\"window.open('/5025/studentlist.php?cno=".$cno."','>수강생목록','width=430,height=700,location=no,status=no,scrollbars=yes');\">수강생 목록</button>";
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

