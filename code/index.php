<?php
include 'inc_head.php';
include 'nav.php';
include 'db_head.php';
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>소융 헬스클럽</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
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
                        <h1 class="mt-4">헬스장 통계 현황</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">헬스장 통계 현황</li>
                        </ol>
                        <div class="row">
 <?php
                        $data_array = array();
                                    $sql ="select CNO ,CNAME from CLASS";
                                    $stid = oci_parse($connect, $sql);                                                  //send SQL
                                    $re=oci_execute($stid);
                                    while (($row = oci_fetch_row($stid)) != false) {
                                            $class_name = $row[0];
                                            $cname=$row[1];
                                    $sql1= "select count(*) from classmember where CNO= '$class_name'";
                                    $stid1 = oci_parse($connect, $sql1);
                                    $re1=oci_execute($stid1);
                                    while (($row1 = oci_fetch_row($stid1)) != false) {
                                            $count = $row1[0];

                                    }
                                    array_push($data_array, array("y" => $count, "label" => $cname  ));
                                    }
?>

 <?php
                        $pt_array = array();
                                    $sql ="select ID,NAME from TRAINER";
                                    $stid = oci_parse($connect, $sql);                                                  //send SQL
                                    $re=oci_execute($stid);
                                    while (($row = oci_fetch_row($stid)) != false) {
                                            $trainer_id = $row[0];
                                            $trainer_name=$row[1];
                                    $sql1= "select count(*) from PT where TID= '$trainer_id'";
                                    $stid1 = oci_parse($connect, $sql1);
                                    $re1=oci_execute($stid1);
                                    while (($row1 = oci_fetch_row($stid1)) != false) {
                                            $count = $row1[0];

                                    }
                                    array_push($pt_array, array("y" => $count, "label" => $trainer_name  ));
                                    }
?>
<?php $sql = "select count(*) from MEMBER";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $member_num=$row[0];
}
$sql = "select count(*) from TRAINER";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $trainer_num=$row[0];
}


$sql = "select count(*) from CLASS";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $class_num=$row[0];
}
$dataPoints = array(
        array("y" => $member_num, "label" => "회원 수" ),
        array("y" => $trainer_num, "label" => "트레이너 수" ),
        array("y" => $class_num, "label" => "수업 수" )
);
?>
<?php $sql = "select count(*) from MEMBER";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $member_num=$row[0];
}
$sql = "select count(*) from TRAINER";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $trainer_num=$row[0];
}


$sql = "select count(*) from CLASS";
//parse SQL
$stid = oci_parse($connect, $sql);
//send SQL
$re=oci_execute($stid);
while (($row = oci_fetch_row($stid)) != false) {
        $class_num=$row[0];
}
$dataPoints = array(
        array("y" => $member_num, "label" => "회원 수" ),
        array("y" => $trainer_num, "label" => "트레이너 수" ),
        array("y" => $class_num, "label" => "수업 수" )
);
?>

<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>

            </div>
<div id="classNum" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                </div>
                            </div>




<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>

            </div>

<div id="chart" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                                </div>
                            </div>

<div class="col-xl-6">
                                <div class="card mb-4">
<div class="card-header">
            </div>


<div id="PT" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                                </div>
                            </div>






</div>
                            </div>

<script>

window.onload = function() {
var chart = new CanvasJS.Chart("chart", {
        animationEnabled: true,
        theme: "light2",
        title:{
                text: "회원현황"
        },
        axisY: {
                title: ""
        },
        data: [{
                type: "bar",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
});
var chart1 = new CanvasJS.Chart("classNum", {
        animationEnabled: true,
        theme: "light2",
        title:{
                text: "수업 별 수강 인원 현황"
        },
        axisY: {
                title: ""
        },
        data: [{
                type: "bar",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($data_array , JSON_NUMERIC_CHECK); ?>
        }]
});
var chart2 = new CanvasJS.Chart("PT", {
        animationEnabled: true,
        theme: "light2",
        title:{
                text:"트레이너별 pt 현황 "
        },
        axisY: {
                title: ""
        },
        data: [{
                type: "bar",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($pt_array , JSON_NUMERIC_CHECK); ?>
        }]
});
chart.render();
chart1.render();
chart2.render();
}
</script><br><br>
<div id="chart" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script><br><br>
<div id="PT" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

