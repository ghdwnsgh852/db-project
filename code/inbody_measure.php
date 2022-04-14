<?php
include 'inc_head.php';
include 'db_head.php';
memberOnly();
	  $height = rand(1550,1950)/10;
	  $bmi = rand(160,300)/10;
	  $weight = round($bmi * (($height/100)*($height/100)),1);
	  $perfat = round($bmi * (rand(70,150)/100),1);
	  $fat = round($weight * $perfat / 100,1);
	  $muscle = $weight - $fat;
 
	// 인바디 정보 가져오기

			 $sql = "delete  from INBODY where ID ='".$_SESSION['id']."'"; // deleate sql 작성하기
			 $stid = oci_parse($connect, $sql);
			 //send SQL
			 $re=oci_execute($stid);
			 //insert 문 장것
			 $sql = "INSERT INTO INBODY(INBODYNUM,HEIGHT,BMI,WEIGHT,PERCENTBODYGAT,BODYFATMASS,MUSCLEMASS,ID) VALUES(NO_ID.NEXTVAL,'".$height."','".$bmi."','".$weight."','".$perfat."','".$fat."','".$muscle."','".$_SESSION['id']."')";
		          $stid = oci_parse($connect, $sql);
			//send SQL
			 $re=oci_execute($stid);
			 echo "<script type='text/javascript'>
                         alert( '인바디 측정이 완료되었습니다.');
			 </script>";
			 echo "<script type='text/javascript'>
                         window.open('/5025/inbody.php','인바디정보','width=430,height=700,location=no,status=no,scrollbars=yes');
                         </script>";
		 	 echo "<script type='text/javascript'>
                         document.location.href = history.back();
                         </script>";

			//alter 인바디 측정이 완료되었습니다.
			  //바로 인바디 확인페이지로 넘어가게 
			  //
			
/* 유의사항
id 값 자동으로 늘어나게 순차적으로 (ex 1, 2, 3, 4, 5, 6)
회원 기존 인바디 있을시 데이터 삭제 후 다시 측정 -> 번호는 새로운 번호 발급
 */
         





	 
 









/*
echo "<script type='text/javascript'>
document.location.href = history.back();
</script>";
 */
?>
