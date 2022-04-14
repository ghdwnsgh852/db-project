<?php
include 'inc_head.php';
include 'db_head.php';
include 'nav.php';
adminOnly();
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>트레이너 관리</title>
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
                        <h1 class="mt-4">트레이너관리</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             트레이너 정보
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>아이디</th>
                                            <th>비밀번호</th>
                                            <th>이름</th>
                                            <th>나이</th>
                                            <th>전화번호</th>
					    <th>성별</th>
                                            <th>경력</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>아이디</th>
                                          <th>비밀번호</th>
                                          <th>이름</th>
                                          <th>나이</th>
                                          <th>전화번호</th>
					  <th>성별</th>
                                          <th>경력</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql ="select * from trainer";
                                    $stid = oci_parse($connect, $sql);                                                  //send SQL
                                    $re=oci_execute($stid);
                                    while (($row = oci_fetch_row($stid)) != false) {
                                    echo("<tr onclick = \"location.href='userinfo.php?id=".$row[0]."&type=trainer'\">");
                                    echo("<td>".$row[0]."</td>");
                                    echo("<td>".$row[1]."</td>");
                                    echo("<td>".$row[2]."</td>");
                                    echo("<td>".$row[3]."</td>");
                                    echo("<td>".$row[4]."</td>");
				    echo("<td>".$row[5]."</td>");
				    echo("<td>".$row[6]."</td>");
                                    echo("</tr>");
                                    }?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>


