<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 게시판 관리의 상단 내용
if (G5_IS_MOBILE) {
    // 모바일의 경우 설정을 따르지 않는다.
    include_once(G5_BBS_PATH.'/_head.php');
    echo html_purifier(stripslashes($board['bo_mobile_content_head']));
} else {
    // 상단 파일 경로를 입력하지 않았다면 기본 상단 파일도 include 하지 않음
    if (trim($board['bo_include_head'])) {
        if (is_include_path_check($board['bo_include_head'])) {  //파일경로 체크
            @include ($board['bo_include_head']);
        } else {    //파일경로가 올바르지 않으면 기본파일을 가져옴
            include_once(G5_BBS_PATH.'/_head.php');
        }
    }
    echo html_purifier(stripslashes($board['bo_content_head']));
}
?>
<div
    style="margin-top: 0px; height:300px; width: 100%; overflow: hidden; background: url('https://s3.ap-northeast-2.amazonaws.com/icunow.co.kr/2017/04/23165142/coverr.png');">
    <h1 style="width: 100%; height:200px; margin: 120px auto; color:#fff ;font-weight:bold; text-align:center;">
        <?= $board['bo_subject']?>
    </h1>
</div>

<div class="container">
    <!-- <div
        style="margin-top: 20px; height:300px; width: 100%; overflow: hidden; background: url('https://s3.ap-northeast-2.amazonaws.com/icunow.co.kr/2017/04/23165142/coverr.png');">
        <h1 style="width: 100%; height:200px; margin: 120px auto; color:#fff ;font-weight:bold; text-align:center;">
            <?= $board['bo_subject']?>
        </h1>
    </div> -->