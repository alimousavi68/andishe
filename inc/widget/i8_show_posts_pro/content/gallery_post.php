<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7 m-0 me-lg-2 me-md-2 mb-3">';
if ($hide_title != 'on') {
    echo $args['before_title'] . $icon_print . $title  .  $args['after_title'];
}
echo $sub_title_print . '</div>';


// نمایش محتویات ویجت- نمایش پست ها
$category_posts = new WP_Query(array(
    'posts_per_page' => 1,
    'cat'            => $cat,
    'order' => 'DESC',
    'orderby' => $orderby
));
// نمایش محتویات ویجت- نمایش پست ها
$category_posts2 = new WP_Query(array(
    'posts_per_page' => 4,
    'cat'            => $cat,
    'order' => 'DESC',
    'offset'    => 1,
    'orderby' => $orderby
));
echo '<div class="row gallery row-gap-4">';
if ($category_posts->have_posts()) {
    while ($category_posts->have_posts()) {
        $category_posts->the_post();
        $primary_cat = get_post_meta(get_the_ID(), 'hasht_primary_category');
        // $primary_cat_color = get_term_meta($primary_cat[0], 'i8_CustomTerm_color', true) ? get_term_meta($primary_cat[0], 'i8_CustomTerm_color', true) : '#000000';
        // $primary_cat_color_transparent = $primary_cat_color . 'c4';
?>
        <div class="col-xl-12 col-lg-24 col-md-24 col-sm-12 px-xl-1 px-lg-1 px-md-1 px-3 px-md-3" >
            <div class="post-flip-box-container image_frame <?php echo $thumb_radius; ?>" >
                <?php echo i8_the_thumbnail('i8-590-370', 'post-flip-box-image object-fit-cover ' . $thumb_radius , array("width" => 590, "height" => 370)); ?>

                <div class="post-flip-box-link-wrapper">
                    <a href="<?php echo get_the_permalink(); ?>" class="post-flip-box-link i8-blink "></a>
                </div>
                <div class="post-flip-box-overlay d-flex align-items-end">
                    <h2 class="post-flip-box-title0">
                        <a class="display-3 post-flip-box-link l1 fw-7 fd-7  text-white i8-blink" href="<?php echo get_the_permalink(); ?>"><?php i8_limit_text(get_the_title(), 100, '...'); ?></a>
                    </h2>
                </div>
            </div>
        </div>
    <?php
    }
    wp_reset_postdata();
}

if ($category_posts2->have_posts()) {
    echo '<div class="col-xl-12 col-md-24 col-sm-24 col-24 row row-gap-4">';
    while ($category_posts2->have_posts()) {
        $category_posts2->the_post();
        $primary_cat = get_post_meta(get_the_ID(), 'hasht_primary_category');
        // $primary_cat_color = get_term_meta($primary_cat[0], 'i8_CustomTerm_color', true) ? get_term_meta($primary_cat[0], 'i8_CustomTerm_color', true) : '#000000';
        // $primary_cat_color_transparent = $primary_cat_color . 'c4';
    ?>
        <div class="col-24 col-lg-12 col-md-12 col-sm-24 col-xl-12 px-1">
            <div class="post-flip-box-container <?php echo $thumb_radius; ?> " class="image_frame">
                <?php echo i8_the_thumbnail('i8-275-172', 'post-flip-box-image object-fit-cover ' . $thumb_radius, array("width" => 279, "height" => 172)); ?>

                <div class="post-flip-box-link-wrapper">
                    <a href="<?php echo get_the_permalink(); ?>" class="post-flip-box-link i8-blink"></a>
                </div>
                <div class="post-flip-box-overlay d-flex align-items-end">
                    <h2 class="post-flip-box-title0">
                        <a class="<?php echo $title_font_size; ?> post-flip-box-link l1 i8-blink fw-4 fd-7 text-white" href="<?php echo get_the_permalink(); ?>"><?php i8_limit_text(get_the_title(), 110, '...'); ?></a>
                    </h2>
                </div>
            </div>
        </div>
<?php
    }
    wp_reset_postdata();
}
echo '</div>';

echo '</div>';
echo $args['after_widget'];


?>