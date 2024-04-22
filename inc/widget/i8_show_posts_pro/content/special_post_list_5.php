<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7  me-2"  style="color:'. $cat_color. '">';
if ($hide_title != 'on') {
  echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';

?>
<style>
  .multi-items {
    border-bottom: 1px solid #ccc;
  }

  .multi-items:last-child {
    border-bottom: 0px;
  }
</style>


<div class="col-24 col-xl-24 col-lg-24 col-md-24 col-sm-24 multi-items d-flex gap-2 px-0">
  <div class="row row-gap-3">
    <?php

    $category_posts2 = new WP_Query(
      array(
        'posts_per_page' => 1,
        'cat' => $cat,
        'order' => 'DESC',
        'orderby' => $orderby
      )
    );

    // left
    if ($category_posts2->have_posts()) { ?>
      <?php
      while ($category_posts2->have_posts()) {
        $category_posts2->the_post();
        ?>
        <div class=" vitrin-2-small-item1  position-relative d-flex justify-content-center flex-row p-0 vitrin-img image_frame_2 ">

          <?php echo i8_the_thumbnail('i8-294-184', 'hover multi-item-thumb w-100 i8-img-fit ' . $thumb_radius, $dimenition = array('width' => $thumb_width, 'height' => $thumb_height), true, '', false, true); ?>
          
          <div class="post-flip-box-link-wrapper">
            <a href="<?php echo get_the_permalink(); ?>" class="post-flip-box-link "></a>
          </div>

          <div class="item-caption ">
            <?php
            if ($hide_category):
              echo i8_primary_category(get_the_ID());
            endif;
            ?>
            <h1 class="post-title <?php echo $title_font_size; ?> <?php echo $title_font_weight; ?> l1">
              <a href="<?php echo get_the_permalink(); ?>" class="">
                <?php i8_limit_text(get_the_title(), 100, '...'); ?>
              </a>
            </h1>
          </div>

        </div>
        <?php
      }
      wp_reset_postdata();
    }

    // نمایش محتویات ویجت- نمایش پست ها
    $category_posts = new WP_Query(
      array(
        'posts_per_page' => $num - 1,
        'cat' => $cat,
        'order' => 'DESC',
        'offset' => 1,
        'orderby' => $orderby
      )
    );
    ?>

    <?php
    if ($category_posts->have_posts()) { ?>
      <?php
      while ($category_posts->have_posts()) {
        $category_posts->the_post();
        ?>

        <div
          class="<?php echo $col; ?>  mini-article d-flex   <?php echo ($category_posts->current_post + 1 == $category_posts->post_count) ? '' : 'border-bottom'; ?> pb-2 mb-2 px-0 ">
          <div>

            <a href="<?php the_permalink(); ?>" class="image_frame">
              <?php echo i8_the_thumbnail('i8-80-63', 'hover round-15px object-fit-cover', $dimenition = array('width' => 80, 'height' => 63), true, '', false, true); ?>
            </a>

          </div>
          <div class="d-flex flex-column ">
            <h3 class="me-2 l22-05 post-title">
              <a class=" display-5 l1" href="<?php echo get_the_permalink(); ?>">
                <?php i8_limit_text(get_the_title(), 65, '...'); ?>
              </a>
            </h3>
            <!-- <p class="post-publish-date f12 text-end text-subtitle my-0 me-2">
                <?php // the_date()    ?>
              </p> -->
          </div>

        </div>

        <?php
      }
      wp_reset_postdata();
    }
    ?>




  </div>
</div>

<?php
echo $args['after_widget'];
?>