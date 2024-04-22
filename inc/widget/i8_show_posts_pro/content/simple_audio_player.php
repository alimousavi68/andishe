<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7  me-2"  style="color:' . $cat_color . '">';
if ($hide_title != 'on') {
  echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';
?>
<div class="radio-list-items d-flex flex-column justify-content-between row-gap-3">
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
        class="radio-item border rounded-4 align-items-center d-flex justify-content-between justify-content-sm-start p-0 column-gap-2">
  
        <a href="<?php the_permalink(); ?>" class="image_frame col-auto">
          <?php echo i8_the_thumbnail('i8-129-100', 'round-15px object-fit-cover hover i8-img-fit', $dimenition = array('width' => 129, 'height' => 100), true, '', false, true); ?>
        </a>

        <div class="radio-title">
          <span class="f11 fw-2">
            <?php
            if ($hide_category):
              echo i8_primary_category(get_the_ID());
            endif;
            ?>
          </span>
          

          <a href="<?php the_permalink(); ?>" class="display-4 fw-3 radio-item-title">
            <?php i8_limit_text(get_the_title(), 89, '...'); ?>
          </a>

        </div>
        <span class="p-3 player-btn">
          <svg width="52" height="53" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M14.9627 10.0882C14.0962 9.57461 13 10.1992 13 11.2065V41.3102C13 42.3175 14.0962 42.9421 14.9627 42.4286L40.3628 27.3768C41.2124 26.8733 41.2124 25.6435 40.3628 25.1399L14.9627 10.0882Z"
              fill="" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </span>
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