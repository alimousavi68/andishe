<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7  me-2"  style="color:' . $cat_color . '">';
if ($hide_title != 'on') {
  echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';
?>

<?php

// نمایش محتویات ویجت- نمایش پست ها
$category_posts = new WP_Query(
  array(
    'posts_per_page' => 1,
    'cat' => $cat,
    'order' => 'DESC',
    'orderby' => $orderby
  )
);

if ($category_posts->have_posts()) {
  while ($category_posts->have_posts()) {
    $category_posts->the_post();
    ?>
    <div class="video-box vitrin-2-big-item d-flex justify-content-center">
      <span class="video-play-btn position-absolute" style="top: calc(50% - 40px);z-index:1;">
        <svg width="80" height="81" viewBox="0 0 80 81" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="0.572754" width="80" height="80" rx="40" fill="white" fill-opacity="0.74" />
          <path
            d="M27.9534 20.3599C26.8702 19.718 25.5 20.4987 25.5 21.7578V59.3875C25.5 60.6466 26.8702 61.4274 27.9534 60.7855L59.7035 41.9707C60.7655 41.3413 60.7655 39.804 59.7035 39.1746L27.9534 20.3599Z"
            fill="#484848" />
        </svg>
      </span>
      <a href="<?php the_permalink(); ?>" class="image_frame">
        <?php echo i8_the_thumbnail('i8-621-389', 'w-100 h-100 round-15px overflow-hidden hover i8-img-fit img-fit-size-on-mobile', $dimenition = array('width' => 585, 'height' => 390), true, 'max-height: 340px;', false, true); ?>
      </a>

      <div class="item-caption">
        <a href="<?php echo get_the_permalink(); ?>" class=" l1 fw-3 fd-0 display-2">
          <?php i8_limit_text(get_the_title(), 89, '...'); ?>
        </a>
      </div>

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