<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7  me-2"  style="color:' . $cat_color . '">';
if ($hide_title != 'on') {
  echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';
?>
<div class="row row-gap-3">
  <?php

  $category_posts2 = new WP_Query(
    array(
      'posts_per_page' => 2,
      'cat' => $cat,
      'order' => 'DESC',
      'orderby' => $orderby
    )
  );

  // left
  if ($category_posts2->have_posts()) { ?>
    <div class="col-24 col-xl-11 col-lg-11 col-md-11 col-sm-11 row px-0 row-gap-4">
      <?php
      while ($category_posts2->have_posts()) {
        $category_posts2->the_post();
        ?>
        <div
          class="col-24 col-xl-24 col-sm-24 col-md-24 vitrin-2-small-item1 ps-0 pe-0 position-relative d-flex justify-content-center flex-row">
          <a href="<?php the_permalink(); ?>" class="image_frame">
            <?php echo i8_the_thumbnail('i8-420-256', 'w-100 h-100 hover disable-w-100 round-15px overflow-hidden  object-fit-cover hover' . $thumb_radius, $dimenition = array('width' => $thumb_width, 'height' => $thumb_height), true, '', false, true); ?>

          </a>


          <div class="item-caption ">
            <a href="<?php echo get_the_permalink(); ?>" class=" display-4">
              <?php i8_limit_text(get_the_title(), 100, '...'); ?>
            </a>
          </div>
        </div>

        <?php
      }
      ?>
    </div>
    <?php
    wp_reset_postdata();
  }

  // نمایش محتویات ویجت- نمایش پست ها
  $category_posts = new WP_Query(
    array(
      'posts_per_page' => $num - 2,
      'cat' => $cat,
      'order' => 'DESC',
      'offset' => 2,
      'orderby' => $orderby
    )
  );
  ?>

  <?php
  if ($category_posts->have_posts()) { ?>
    <div
      class="col-24 col-xl-13 col-lg-13 col-md-13 col-sm-13 row mini-article simple-list align-content-start px-0 px-lg-3 px-md-3">
      <?php

      while ($category_posts->have_posts()) {
        $category_posts->the_post();
        ?>

        <div
          class="<?php echo $col; ?>  mini-article d-flex   <?php echo ($category_posts->current_post + 1 == $category_posts->post_count) ? '' : 'border-bottom'; ?> pb-2 mb-2 px-0 ">
          <div>

            <a href="<?php the_permalink(); ?>" class="image_frame">
              <?php echo i8_the_thumbnail('i8-80-63', 'hover round-15px', $dimenition = array('width' => 80, 'height' => 63), true, '', false, true); ?>
            </a>

          </div>
          <div class="d-flex flex-column ">
            <h3 class="me-2 l22-05 post-title">
              <a class=" display-4 l1 " href="<?php echo get_the_permalink(); ?>">
                <?php i8_limit_text(get_the_title(), 87, '...'); ?>
              </a>
            </h3>
            <!-- <p class="post-publish-date f12 text-end text-subtitle my-0 me-2">
                <?php // the_date()           ?>
              </p> -->
          </div>

        </div>

        <?php
      }
      ?>
    </div>
    <?php
    wp_reset_postdata();
  }
  ?>

</div>


<?php
echo $args['after_widget'];
?>