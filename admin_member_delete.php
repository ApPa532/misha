<?php
    include "define.php";

    session_start();

    //회원 레벨 가져오기: 로그인한 사용자의 회원 레벨을 가져와라 $userlevel에 저장
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    //관리자가 아닌경우 경고창 띄우기
    //1이 아니면 관리자가 아니므로 '관리자가 아닙니다!' 라는 메세지 경고창을 띄움
    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
                exit;
    }

    $num   = $_GET["num"];

    $con = mysqli_connect("localhost", DBuser, DBpass, DBname);

    //members 테이블에서 레코드 번호 $num의 값을 가진 레코드를 삭제
    $sql = "delete from members where num = $num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

