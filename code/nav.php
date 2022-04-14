<?php
function nav(){
?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">소융 헬스클럽</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method = "post" action = "search.php">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name = "addr"/>
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
			<?php if(isset( $_SESSION[ 'id'])) : ?>
                        <?php if($_SESSION['permission'] == "admin") : ?>
			<li><a class="dropdown-item" href="manage_member.php">회원 관리</a></li>
			<li><a class="dropdown-item" href="manage_trainer.php">직원 관리</a></li>
                        <li><a class="dropdown-item" href="manage_class.php">수업 관리</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <?php endif; ?>
			<li><a class="dropdown-item" href="mypage.php">내 정보</a></li>
                        <li><a class="dropdown-item" href="logout.php">로그아웃</a></li>
                        <?php else : ?>
                        <li><a class="dropdown-item" href="member_login.html">회원 로그인</a></li>
		        <li><a class="dropdown-item" href="trainer_login.html">직원 로그인</a></li>
			<?php endif; ?>
                    </ul>
                </li>
            </ul>
	</nav>
<?php
}
?>

<?php
function layoutSidenav_nav(){
?>
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
			<div class="nav">
                            <div class="sb-sidenav-menu-heading"> 공용(좋은 명칭 추천 받아요)</div>
                            <a class="nav-link" href="classlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                수업목록
			    </a>
                            <a class="nav-link" href="ptlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                트레이너목록
                            </a>
                            <div class="sb-sidenav-menu-heading">회원 전용</div>
                            <a class="nav-link" href="inbody_measure.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                인바디 측정
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                            if ( isset( $_SESSION[ 'id']) ) {
			     echo $_SESSION['id']."님, 안녕하세요";
			    }else{
			    echo '로그인하세요.';
                            }
                        ?>
                    </div>
		</nav>
	</div>
<?php
}
?>
<?php
function footer(){
?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; DB502GROUP5 2021</div>
                            <div>
                                <a href="sample.php">Privacy Policy</a>
                                &middot;
                                <a href="sample.php">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
<?php
}
?>
