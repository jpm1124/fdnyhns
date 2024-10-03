<?php
/**
 * Title: Footer bar with centered copyright
 * Slug: begnas/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>

<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-0"},":hover":{"color":{"text":"var:preset|color|gray-400"}}}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"gray-900","textColor":"gray-400","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-400-color has-gray-900-background-color has-text-color has-background has-link-color"
    style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide"><!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">
            <?php
            echo sprintf(
                /* Translators: Copyright Year */
                esc_html__( 'Copyright © %d - ', 'begnas' ),
                date_i18n( 'Y' )
            );
            ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:site-title {"level":0} /-->

        <!-- wp:paragraph -->
        <p>
            <?php
            /* Translators: Link to ArtifyWeb */
            $artifyweb_link = '<a href="' . esc_url( 'https://artifyweb.com/' ) . '" rel="nofollow">ArtifyWeb</a>';

            echo sprintf(
                /* Translators: WordPress Theme by ArtifyWeb */
                esc_html__( ' - WordPress Theme by %1$s.', 'begnas' ),
                $artifyweb_link
            );
            ?>
        </p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
