<?php

/**
 * Add and active theme features
 */
require_once(get_template_directory() . '/inc/functions/active-features.php');

/**
 * Add Sidebar to theme
 */
require_once(get_template_directory() . '/inc/functions/sidebar.php');

/**
 * Load Custom widgets
 * 
 */
require_once(get_template_directory() . '/inc/widget/i8_show_posts_pro/i8_show_posts_pro.php');
require_once(get_template_directory() . '/inc/widget/i8_show_ads_pro/i8_show_ads_pro.php');
require_once(get_template_directory() . '/inc/widget/i8_show_posts_two_col.php');
require_once(get_template_directory() . '/inc/widget/i8_site_info_box.php');
require_once(get_template_directory() . '/inc/widget/i8_market_data.php');
require_once(get_template_directory() . '/inc/widget/i8_menu.php');


/**
 *  helper functions 
 */
require_once(get_template_directory() . '/inc/functions/helper-functions.php');

/**
 *  Customize theme options
 */
require_once(get_template_directory() . '/inc/functions/theme-options/general_setting.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_color_pallets.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_copy_write.php');
require_once(get_template_directory() . '/inc/functions/theme-options/inline_ads/theme_inline_ads.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_custom_scripts.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_footer.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_search.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_social_links.php');


/**
 * Change Excerpt limit characters
 */
function custom_excerpt_length($length)
{
    return 350;
}
add_filter('excerpt_length', 'custom_excerpt_length');


/**
 * Custom Term Field
 * 
 */
require_once(get_template_directory() . '/inc/functions/i8_CustomTermField.php');


//Include jalali-date external library 
require_once(get_template_directory()  . '/lib/jDateTime-master/jdatetime.class.php');




add_action('wp_footer', function () {
    if (is_single()) {
?>

        <!-- <script>
            document.addEventListener("DOMContentLoaded", () => {
                const iframes = document.querySelectorAll(".pelikan_iframe");
                const relatedIframe = document.getElementById("pelikan_related");
                const pageTitle = document.title.trim();
                const baseSrc = "https://pelikan-network.ir/widget/pelikan?hash=andishemoaser-viewPelikan-f16f25279f48136e8b30587246e24be37c40aefe31d0d40551172f180e4d94f4";

                window.addEventListener("message", (event) => {
                    const {
                        data
                    } = event;
                    if (data?.height && data?.src) {
                        iframes.forEach((iframe) => {
                            if (iframe.src === data.src) {
                                iframe.style.height = `${data.height}px`;
                            }
                        });
                    }
                });

                if (relatedIframe) {
                    relatedIframe.src = pageTitle ?
                        `${baseSrc}&text=${encodeURIComponent(pageTitle)}` :
                        baseSrc;
                }
            });
        </script> -->
        <!-- <style>
            .pelikan_iframe {
                background-color: #fff;
                width: 100%;
                height: 600px;
                border: unset;
            }

            @media only screen and (min-width: 650px) {
                .pelikan_iframe {
                    display: none;
                }
            }
        </style> -->
<?php
    }
});
