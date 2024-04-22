<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7 me-lg-2 me-md-2"  style="color:'. $cat_color. '">';
if ($hide_title != 'on') {
    // echo $args['before_title'] . $title . $args['after_title'];
    echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';

echo '<div class="row mini-article simple-list">';
?>
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
        $author_name = (get_post_meta(get_the_ID(), 'hasht-author-name', true)) ? get_post_meta(get_the_ID(), 'hasht-author-name', true) : '';

        ?>

        <div
            class="<?php echo $col; ?> d-flex mb-3 justify-content-between gap-2 align-items-start  px-xl-3 px-lg-3 px-md-3 px-sm-1 px-1  pb-3 <?php echo ($category_posts->current_post + 1 == $category_posts->post_count) ? '' : 'border-bottom'; ?>">

            <div class="post-title">
                <a class=" <?php echo $title_font_size; ?> <?php echo $title_font_weight; ?> l22-05 text-normal"
                    href="<?php echo get_the_permalink(); ?>">
                    <?php i8_limit_text(get_the_title(), 150, '...'); ?>
                </a>

                <?php if ($author_name): ?>
                    <div class="auhtor-name f13 fw-1 mt-2" style="color:var(--i8-light-title-color);">
                        <span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.67704 10.625C7.60778 11.2701 7.42109 11.785 7.0955 12.2409C6.65976 12.8509 5.92968 13.4196 4.72041 14.0243C4.41168 14.1786 4.28654 14.554 4.4409 14.8628C4.59527 15.1715 4.97069 15.2967 5.27943 15.1423C6.57016 14.497 7.50674 13.8157 8.11267 12.9674C8.73 12.1031 8.95825 11.1309 8.95825 9.99996V6.24996C8.95825 5.44455 8.30533 4.79163 7.49992 4.79163H4.16659C3.36118 4.79163 2.70825 5.44455 2.70825 6.24996V9.16663C2.70825 9.97204 3.36119 10.625 4.16659 10.625H7.67704Z"
                                    fill="#535353" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.0105 10.625C15.9412 11.2701 15.7546 11.785 15.429 12.2409C14.9932 12.8509 14.2632 13.4196 13.0539 14.0243C12.7452 14.1786 12.62 14.554 12.7744 14.8628C12.9287 15.1715 13.3042 15.2967 13.6129 15.1423C14.9037 14.497 15.8402 13.8157 16.4462 12.9674C17.0635 12.1031 17.2917 11.1309 17.2917 9.99996V6.24996C17.2917 5.44456 16.6388 4.79163 15.8334 4.79163H12.5001C11.6947 4.79163 11.0417 5.44456 11.0417 6.24996V9.16663C11.0417 9.97204 11.6947 10.625 12.5001 10.625H16.0105Z"
                                    fill="#535353" />
                            </svg>
                            <?php echo $author_name; ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ($hide_excerpt != 'on'): ?>
                    <p class="lead text-gray mb-0 d-lg-block d-md-block d-none lead mb-0 text-gray pt-1 text-justify f13 fw-2">
                        <?php i8_limit_text(get_the_excerpt(), 135, '...'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <a href="<?php the_permalink(); ?>" class="image_frame">
                    <?php echo i8_the_thumbnail('i8-80-63', 'author_img_style ' , array("width" => $thumb_width, "height" => $thumb_height)); ?>
                </a>
            </div>

        </div>

        <?php
    }
    wp_reset_postdata();
}

if ($hide_thumb != 'on'):
    echo '</div>';
else:
    echo '</ul>';
endif;

echo $args['after_widget'];


?>