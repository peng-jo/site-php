<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>댓글</title>

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
                <section class="cardType" >
                    <div class="cardType01">
                        <h2>HOBBIES</h2>
                        <p>동호회 웹 사이트 입니다.<br/>
                            자신의 취미생활을 다른사람과 즐겨보세요.</p>                
                        <div class="card-wrap">
                            <!-- card -->
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card01.jpg" alt="게임 관련 이미지 입니다." class="card-img">
                                    <strong class="card-title">게임 동호회 즐기기 동호회 즐기기</strong>
                                    <span class="card-desc">콘솔게임부터 PC 게임 까지 다양한 게임들을
                                        다른사람과 함께 즐겨보세요.다른사람과 함께 즐겨보세요.다른사람과 함께 즐겨보세요.</span>
                                    <span class="card-keyword">
                                        <span>#pc게임</span>
                                        <span>#콘솔게임</span>
                                    </span>
                                </a>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card02.jpg" alt="큐브 관련 이미지 입니다." class="card-img">
                                    <strong class="card-title">큐브 동호회 즐기기</strong>
                                    <span class="card-desc">루빅스 큐브, 미러큐브등 다양한 큐브들을 다
                                        른사람과 함께 즐겨보세요.</span>
                                    <span class="card-keyword">
                                        <span>#루빅스큐브</span>
                                        <span>#미러큐브</span>
                                    </span>
                                </a>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card03.jpg" alt="낚시 관련 이미지 입니다." class="card-img">
                                    <strong class="card-title">낚시 동호회 즐기기</strong>
                                    <span class="card-desc">바다 낚시,  민물 낚시, 얼음 낚시를 다른 사람
                                        과함께 즐겨보세요.</span>
                                    <span class="card-keyword">
                                        <span>#도시어부</span>
                                        <span>#월척</span>
                                        <span>#바다낚시</span>
                                        <span>#민물낚시</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>                 
                </section>
            </article>
            <article class="flow-article">
                <h3 class="ir_so">동호회 신청하기</h3>
                <section id="comment" class="section-comment">
                    <h4>동호회 신청하기</h4>
                    <p>동호회 수강을 원하는 분들은 댓글로 참여 신청을 남겨주세요!</p>
                    <div class="comment-form">
                        <form action="commentSave.php" method="post" name="comment">
                            <fieldset>
                                <legend class="ir_so">댓글 영역</legend>
                                <div class="comment-wrap">
                                    <div>
                                        <label for="youName" class="ir_so">이름</label>
                                        <input type="text" name="youName" id="youName" class="input_write2" placeholder="이름" autocomplete="off" maxlength="10" required="">
                                    </div>
                                    <div>
                                        <label for="youText" class="ir_so">신청하기</label>
                                        <input type="text" name="youText" id="youText" class="input_write2 w100" placeholder="신청 동호회명을 적어주세요!" autocomplete="off" required="">
                                    </div>
                                    <button class="btn_submit2" type="submit" value="신청하기">go</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="comment-list">

                    <?php 
                        include "../connect/connect.php";

                        $sql = "SELECT * FROM myComment LIMIT 10";
                        $result = $connect -> query($sql);

                        while( $info = mysqli_fetch_array($result)){
                    ?>
                            <div>
                            <p><?= $info['youText']?></p>
                            <div>
                                <img src="http://chobs98.dothome.co.kr/assets/ico/icon14.jpg" alt="신청자">
                                <span><?= $info['youName']?></span>
                                <span><?=date('Y-m-d H:i', $info['regTime'])?></span>
                            </div>
                        </div>
                    <?php      
                        }
                    ?>

                        <!-- <div>
                            <p>저 동호회 신청합니다.! 꼭 받아주세요!</p>
                            <div>
                                <img src="http://chobs98.dothome.co.kr/assets/ico/icon14.jpg" alt="신청자">
                                <span>조범수</span>
                                <span>2019-09-30</span>
                            </div>
                        </div> -->
                    </div>
                </section>
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