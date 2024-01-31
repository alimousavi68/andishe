<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7 me-lg-2 me-md-2">';
if ($hide_title != 'on') {
    // echo $args['before_title'] . $title . $args['after_title'];
    echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';
?>

<div class="timeline_list pe-2 pe-lg-2 pe-xl-2 pe-md-2 ">
    <?php
    // نمایش محتویات ویجت- نمایش پست ها
    $category_posts = new WP_Query(
        array(
            'posts_per_page' => $num,
            'cat' => $cat,
            'order' => 'DESC',
            'orderby' => $orderby
        )
    );

    if ($category_posts->have_posts()) {
        while ($category_posts->have_posts()) {
            $category_posts->the_post();
            ?>
            <!-- //echo wordpress post date in this template : 6min ago -->

            <div class="timeline-item"
                date-is='<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' پیش'; ?>'>
                <a class="i8-blink <?php echo $title_font_size; ?>  <?php echo $title_font_weight; ?> l22-05 text-normal cursor-pointer text-grey"
                    href="<?php echo get_the_permalink(); ?>">
                    <?php
                    show_post_structure_related_icon(get_the_ID());
                    i8_limit_text(get_the_title(), 100, '...'); ?>

                </a>
                <?php if ($hide_excerpt != 'on'): ?>
                    <p>
                        <?php i8_limit_text(get_the_excerpt(), 100, '...'); ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php
        }
        wp_reset_postdata();
    }
    ?>
</div>
<?php
echo $args['after_widget'];


?>