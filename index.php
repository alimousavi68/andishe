<?php
//header
get_header();
?>
<div class="container px-0">
    <div class="top-section container d-flex flex-column gap-4 px-0">
        <?php
        // // todo: if top main is active
        get_template_part('template-parts/top_section'); ?>
    </div>
    <div class="home-main-box py-3  d-flex flex-column gap-4">
        <?php
        // // Main box
        get_template_part('template-parts/home-main-box');
        ?>
    </div>
    <div class="page-bottom-sidebar py-3">
            <?php
            dynamic_sidebar('hf-sidebar');
            ?>
    </div>
</div>
<?php
// //footer
get_footer();
?>