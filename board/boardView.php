<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시판</title>

  <!-- style -->
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/var.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <div id="skip">
        <a href="#contents">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- header -->
    <main id="contetns">
        <section id="mainCont">
            <h2 class="ir_so">메인 컨텐츠</h2>
            <article class="content-article">
            <div class="boardType">
            <h3>게시판</h3>
            <p>가장 빠른 새소식 업데이트</p>
                <div class="board">
                    <div class="board-table mt30">
                        <table>
                            <colgroup>
                                <col style="width: 30%"/>
                                <col style="width: 70%"/>
                            </colgroup>
                            <tbody>
                                <?php
                                    $boardID = $_GET['boardID'];
                                    $sql = "SELECT b.myboardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM myBoard b JOIN member m ON (b.myMemberID = m.myMemberID) where b.myBoardID = {$boardID}";
                                    $result = $connect -> query($sql);

                                    $view = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$boardID}";
                                    $connect = $connect -> query($view);

                                    if( $result ){
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);

                                        echo "<tr><th>제목</th><td class='left'>".$info['myboardTitle']."</td></tr>";
                                        echo "<tr><th>글쓴이</th><td class='left'>".$info['youName']."</td></tr>";
                                        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
                                        echo "<tr><th>조회수</th><td class='left'>".$info['boardView']."</td></tr>";
                                        echo "<tr><th class='height'>내용</th><td class='left height'>".$info['boardContent']."</td></tr>";   

                                    } else {
                                        echo "오류";
                                    }
                                ?>
                                <!-- <tr>
                                    <th>제목</th>
                                    <td class="left">안녕하세요!</td>
                                </tr>
                                <tr>
                                    <th>글쓴이</th>
                                    <td class="left">김범수</td>
                                </tr>
                                <tr>
                                    <th>등록일</th>
                                    <td class="left">123123</td>
                                </tr>
                                <tr>
                                    <th>조회수</th>
                                    <td class="left">12312312312312</td>
                                </tr>
                                <tr>
                                    <th class="height">내용</th>
                                    <td class="left height">------------</td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div class="btn">
                            <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
                            <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="confirm('정말 삭제 하시겠읍니까?')">삭제하기</a>
                            <a href="board.php">목록보기</a>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <!-- contents -->
    <footer id="footer">
      footer
    </footer>
    <!-- footer -->

</body>
</html>