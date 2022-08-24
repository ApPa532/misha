<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #edbf07;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   include "define.php";

	
   $id = $_GET["id"]; //아이디 전달받기. 중복확인을 위해 사용자가 입력한 아이디를 get 방식으로 전달받음.

   if(!$id) 
   {
      echo("<li>아이디를 입력해 주세요!</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", DBuser, DBpass, DBname); //아이디를 입력했으면 메세지 창을 띄울 필요가 없으니 연결 진행
 
      $sql = "select * from members where id='$id'"; //아이디가 있는지 검사
      
      $result = mysqli_query($con, $sql); //결과를 $result에 담음

      $num_record = mysqli_num_rows($result); //$result의 결과의 갯수를 세서 넘버 레코드에 담는다.
    

      if ($num_record) //여기에 값이 있다면 동일한 아이디가 존재함을 의미
      {
         echo "<li>".$id." 아이디는 중복됩니다.</li>"; 
         echo "<li>다른 아이디를 사용해 주세요!</li>";
      }
      else //값이 없다면
      {
         echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>
