<?php
    include "define.php"; 
    
    session_start(); //세션의 시작. 세션을 저장하거나 저장된 세션을 사용할 때 미리 선언해야 함.

    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    //isset()함수는 id값이 있는지 검사하여 값이 있으면 true, 없다면 false를 반환

    else $userid = ""; //값을 null로 설정.

    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    
    else $username = ""; 

    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";

?>		
        <div id="top">
            <h1>
                <a href="index.php"><img src="./img/fix_logo.png" width="180"></a>
            </h1>
            <ul id="top_menu">  

<?php
    if(!$userid) { 
       
?>           

                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>

<?php
    } else {  //로그인 상태. 사용자 이름, 아이디, 레벨, 포인트가 출력됨.
       

        $logged = $username."님 [Level:".$userlevel.", Point:".$userpoint."]";
        

?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">마이페이지</a></li>
<?php
    }
?>


<?php
    if($userlevel==1) { //관리자모드 버튼. 로그인한 사용자가 관리자인지 확인. 관리자라면 관리자 페이지 접속할 메뉴가 생성
   
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>
                <li>
                   <div class="ani_box">
                     <div class="line1"></div>
                     <div class="line2"></div>
                     <div class="line3"></div>
                   </div>  
                   <ul class="toggle_menu">
                        <li class="sub_menu"><a href="#none">기초 스킨케어</a></li>
                        <li class="sub_menu"><a href="#none">메이크업</a></li>
                        <li class="sub_menu"><a href="#none">바디</a></li>
                        <li class="sub_menu"><a href="#none">헤어</a></li>
                        <li class="sub_menu"><a href="#none">남성</a></li>
                        <li class="sub_menu"><a href="#none">립/풋/핸드</a></li>
                        <li class="sub_menu"><a href="#none">뷰티_소품/기기</a></li>
                   </ul>
               </li>
                <li><a href="sub1.php">회사기술</a></li>
                <li><a href="sub2.php">제품소개</a></li>                                
                <li><a href="board_list.php">공지사항</a></li>
                <li><a href="login_form.php">마이페이지</a></li>
            </ul>
        </div>
