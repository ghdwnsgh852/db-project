<?php 
include 'inc_head.php';
include 'db_head.php';
userOnly();
if($session_permission == "member"){
	echo "<script type='text/javascript'>
	alert( '접근할 수 없습니다.');
	</script>";
	echo "<script type='text/javascript'>
	document.location.href = '/5025/401.html';
	</script>";	
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>수강생 목록</title>

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
        <h4 class="mb-3">수강생 조회</h4>
        <form class="validation-form" name="login" method="post" action ="" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
              <label for="ID">수업ID</label>
              <input type="text" name="ID" class="form-control" id="ID" placeholder=""value="<?php echo $_GET["cno"];?>" readonly>
	    </div>
	    <?php
            $sql ="select * from CLASS where CNO='".$_GET["cno"]."'";
            $stid = oci_parse($connect, $sql);
//send SQL
            $re=oci_execute($stid);
            while (($row = oci_fetch_row($stid)) != false) {
                $cname = $row[1];
                $mid = $row[3];
	    }
	    ?>
            <div class="col-md-6 mb-3">
              <label for="ID">수업 이름</label>
              <input type="text" name="NAME" class="form-control" id="NAME" placeholder=""value="<?php echo $cname;?>" readonly>
	    </div>
	    <div class="col-md-6 mb-3">
              <label for="ID">강사 ID</label>
              <input type="text" name="mid" class="form-control" id="mid" placeholder=""value="<?php echo $mid;?>" readonly>
	    </div>
            <div class="col-md-6 mb-3">
            </div>
	    <div class= "card card-body">
	        <table id="datatablesSimple">
	       		<thead>
				<tr>
    					<th>회원 ID</th>
					<th>이름</th>
					<th>성별</th>
					<th>신청 일자</th>
				</tr>
			</thead>
			<tbody>
<?php        
            $sql ="select * from CLASSMEMBER where CNO='".$_GET["cno"]."'";
            $stid = oci_parse($connect, $sql);
//send SQL
            $re=oci_execute($stid);
	    while (($row = oci_fetch_row($stid)) != false) {
    		$sql1= "SELECT * FROM MEMBER WHERE ID = '".$row[1]."'";
		$stid1 = oci_parse($connect, $sql1);
		$re1=oci_execute($stid1);
		while (($row1 = oci_fetch_row($stid1)) != false) {
			$sname = $row1[2];
			$sex = $row1[5];
		}
		if($session_permission == "admin"){
			echo("<tr onclick = \"location.href='cancel_class.php?cid=".$row[0]."&mid=".$row[1]."'\">");
		}elseif($session_permission == "trainer"){
			echo("<tr>");
		}
		echo("<td>".$row[1]."</td>");
		echo("<td>".$sname."</td>");
		echo("<td>".$sex."</td>");
		echo("<td>".$row[2]."</td>");
		echo("</tr>");
	    }
?>
                        </tbody>
	  </table>
          </div>
          </div>
          <div class="mb-4"></div>
	</form>
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
