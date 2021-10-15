<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContent = $_POST['boardContent'];
    $boardPass = $_POST['boardPass'];
    
    echo $boardID, $boardTitle, $boardContent, $boardPass;

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContent = $connect -> real_escape_string($boardContent);
    $memberID = $_SESSION['myMemberID'];
    


    $sql = "SELECT * FROM member WHERE mymemberID='$memberID'";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        if( $info['youPass'] == $boardPass ){
            $sql = "UPDATE myBoard set myBoardTitle = '{$boardTitle}', boardContent = '{$boardContent}' WHERE myBoardID ='{$boardID}'";
            $result = $connect -> query($sql);
            
        } else {
            echo "<script> alert('비밀번호가 일치하기 않습니다. 다시 한번 확인해 주세요')</script>";
            echo "<script> history.back(1);</script>";
        }
    }

?> 

<script>
    location.href="board.php";
</script>
</body>
</html>

