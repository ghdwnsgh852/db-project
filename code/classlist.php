<?php
include 'inc_head.php';
include 'db_head.php';
include 'nav.php';
userOnly();
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>수업목록</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        nav();
        ?>
        <div id="layoutSidenav">
            <?php
            layoutSidenav_nav();
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">수업목록</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             수업정보
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>수업 번호</th>
					    <th>수업 이름</th>
				            <th>수강 인원</th>
                                            <th>정원</th>
                                            <th>수업강사 아이디</th>
                                            <th>설명</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>수업 번호</th>
					  <th>수업 이름</th>
					  <th>수강 인원</th>
                                          <th>정원</th>
                                          <th>수업강사 아이디</th>
                                          <th>설명</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql ="select * from class";
                                    $stid = oci_parse($connect, $sql);                                                  //send SQL
				    $re=oci_execute($stid);
				    while (($row = oci_fetch_row($stid)) != false) {
			            $sql1= "SELECT COUNT(CASE WHEN CNO = ".$row[0]." THEN 1 END)  FROM classmember";
                                    $stid1 = oci_parse($connect, $sql1);
				    $re1=oci_execute($stid1);
				    while (($row1 = oci_fetch_row($stid1)) != false) {
                                    $now = $row1[0];
                                    }
                                    echo("<tr onclick = \"location.href='classdescription.php?id=".$row[0]."&type=class'\">");
                                    echo("<td>".$row[0]."</td>");
				    echo("<td>".$row[1]."</td>");
				    echo("<td>".$now."</td>");
                                    echo("<td>".$row[2]."</td>");
                                    echo("<td>".$row[3]."</td>");
                                    echo("<td>".$row[4]."</td>");
                                    echo("</tr>");
                                    }?>
                                    </tbody>
                                </table>
			    </div>
<?php if($session_permission == 'trainer'){
echo "<button class=\"btn btn-primary btn-lg btn-block\" type=\"button\"  onclick=\"location.href='add_class.php'\">수업 추가</button>";
				    } ?>
			</div>

                    </div>
                </main>
                <?php
                footer();
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

