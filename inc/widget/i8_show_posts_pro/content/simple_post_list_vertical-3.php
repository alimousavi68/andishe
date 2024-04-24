<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7  me-2"  style="color:' . $cat_color . '">';
if ($hide_title != 'on') {
  echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';
?>
<div class="row row-gap-2">
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
      <div
        class="col-12 col-xl-6 col-md-6 col-sm-12 vitrin-2-small-item1 position-relative px-1 px-xl-2 px-lg-2 px-sm-2 d-flex flex-column row-gap-2">
        <a href="<?php the_permalink(); ?>" class="image_frame h-auto">
          <?php echo i8_the_thumbnail('i8-lg-290-163', 'w-100 h-auto  object-fit-cover overflow-hidden hover i8-img-fit ', $dimenition = array('width' => $thumb_width, 'height' => $thumb_height) , true, '', false, true); ?>
        </a>
        <div class="p-1">
          <span class="display-6">
            <?php
            if ($hide_category):
              echo i8_primary_category(get_the_ID());
            endif;
            ?>
          </span>
          <a class="<?php echo $title_font_size; ?> <?php echo $title_font_weight; ?> " href="<?php echo get_the_permalink(); ?>">
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