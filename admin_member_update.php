<?php
    include "define.php";
	
    session_start();

    
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    
    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    //관리자 입력 데이터 가져오기
    $num   = $_GET["num"];
    $level = $_POST["level"]; //관리자가 입력한 데이터 레벨
    $point = $_POST["point"]; // 관리자가 입력한 데이터 포인트

    //회원 정보 업데이트
    $con = mysqli_connect("localhost", DBuser, DBpass, DBname);
    $sql = "update members set level=$level, point=$point where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
         //페이지 이동: DB 업데이트 작업을 종료하면 관리자 페이지인 admin.php로 이동.
	         location.href = 'admin.php';
	     </script>
	   ";
?>

