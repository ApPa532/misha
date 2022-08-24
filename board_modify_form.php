<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<!-- 글보기 페이지의 하단 수정 버튼을 클릭하여 연결된 페이지 글 수정페이지. 해당 레코드의 $num과 $page가 함께 전달됨. -->
<script>
	function check_input() {
		if (!document.board_form.subject.value)
		{
			alert("제목을 입력하세요!");
			document.board_form.subject.focus();
			return;
		}
		if (!document.board_form.content.value)
		{
			alert("내용을 입력하세요!");    
			document.board_form.content.focus();
			return;
		}
		document.board_form.submit();
	 }
</script>
</head>
<body> 
<header>
	<?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
		
	</div>
	<div id="board_box">
		<h3 id="board_title">
			게시판 > 글 쓰기
		</h3>
<?php
	//board_view.php로 부터 레코드 번호와 페이지 번호 전달받기.
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	//DB에서 글 정보를 가져옴.
	$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];



	include "define.php";
	
    session_start();
	//회원 레벨 가져오기: 로그인한 사용자의 회원 레벨을 가져와라 $userlevel에 저장
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
	if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 작성글 수정 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
                exit;
    }

    $num   = $_GET["num"];

    $con = mysqli_connect("localhost", DBuser, DBpass, DBname);
?>
		<!-- 수정하기 버튼을 클릭하면 DB에 저장된 글을 수정할 수 있도록 action 속성을 아래와 같이 지정 -->
		<!-- board_modify.php 파일에서 글 수정 폼양식의 데이터를 전달받아 DB로 업데이트 시킴. -->
		<form  name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
			<ul id="board_form">
				<li> 
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
				<li> 
					<span class="col1">제목 : </span>
					<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
				</li>
				<li id="text_area">	
					
					<span class="col1">내용 : </span>
					<span class="col2">
						<textarea name="content"><?=$content?></textarea>
					</span>
				</li>
				<li> 
					<span class="col1"> 첨부 파일 : </span>
					<span class="col2"><?=$file_name?></span>
				</li>
			</ul>
			<ul class="buttons"> 
				<!-- 서버로 수정한 내용을 전송하기 위한 함수이자 버튼 -->
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
		</form>
	</div> <!-- board_box -->
</section> 
<footer>
	<?php include "footer.php";?>
</footer>
</body>
</html>