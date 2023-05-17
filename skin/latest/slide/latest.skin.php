<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');  // 이미지 갤러리를 위해서는 해당 소스를 불러와야 함 

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- 배너 하단 개수 버튼 -->
    <div class="carousel-indicators">
        <?php
        $s = 1;
        for ($i=0; $i<$list_count; $i++) {
        ?>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?=$i;?>" class="active"
            aria-current="true" aria-label="Slide <?=$s;?>"></button>
        <?php 
            $s++;
        }
         ?>
    </div>
    <!-- 배너 1번 -->
    <div class=" carousel-inner">

        <?php
        for ($i=0; $i<$list_count; $i++) {
        
        $img_link_html = '';        
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['src'];
        } else {
            $img = G5_IMG_URL.'/no_img.png';
            $thumb['alt'] = '이미지가 없습니다.';
        }
        $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" style="width:100%;">';
        $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';
        ?>

        <div class="carousel-item active">
            <!-- 이미지 정보 -->
            <?php echo $img_link_html; ?>
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>
                        Some representative placeholder content for the first slide of
                        the carousel.
                    </p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#">Sign up today</a>
                    </p>
                </div>
            </div>
        </div>
        <?php }  ?>

    </div>

    <!-- 좌우버튼 -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>