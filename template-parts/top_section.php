<?php
$bigSliderCat = 17;


$one_post_query_args = array(
    'posts_per_page' => '1',
    'cat' => $bigSliderCat,
    'order' => 'DESC',
);
// The Query
$one_post_query = new WP_Query($one_post_query_args);

$two_post_query_args = array(
    'posts_per_page' => '4',
    'cat' => $bigSliderCat,
    'offset' => '1',
    'order' => 'DESC',
);
// The Query
$two_post_query = new WP_Query($two_post_query_args);
?>

<div class="row row-gap-4 border-end border-start no-border-on-mobile p-0 p-xl-3 px-lg-3 p-md-3 top-section">
    <!--  top-right-sidebar -->
    <div class="col-24 col-xl-18 col-lg-18 col-md-24 main-slider-2 d-flex px-0 gap-0">
        <div class="row row-gap-4">
        <?php
            dynamic_sidebar('top_section_right');
        ?>
        </div>
    </div>

    <!--  top-left-sidebar -->
    <div class="col-24 col-lg-6 col-md-24 px-lg-3 ">
        <?php
        dynamic_sidebar('top_section_left');
        ?>
    </div>
</div>