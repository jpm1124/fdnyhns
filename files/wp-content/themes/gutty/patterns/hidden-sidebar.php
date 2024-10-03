<?php
/**
 * Title: Sidebar
 * Slug: gutty/hidden-sidebar
 * Inserter: no
 */
?>

<!-- wp:group {"metadata":{"name":"Sidebar"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:avatar {"size":80,"style":{"border":{"radius":"16px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
<h2 class="wp-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'About the author', 'gutty' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:post-author-biography {"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
<h2 class="wp-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Popular Categories', 'gutty' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:categories {"showHierarchy":true,"showPostCounts":true,"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
<h2 class="wp-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Useful Links', 'gutty' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Links I found useful and wanted to share.', 'gutty' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|20"}},"fontSize":"small"} -->
<!-- wp:navigation-link {"label":"Latest inflation report","url":"#","className":"is-style-arrow-link","style":{"typography":{"textDecoration":"underline"}}} /-->

<!-- wp:navigation-link {"label":"Financial apps for families","url":"#","className":"is-style-arrow-link","style":{"typography":{"textDecoration":"underline"}}} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
<h2 class="wp-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Search the website', 'gutty' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'gutty' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search...', 'search form placeholder', 'gutty' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr_x( 'Search', 'search form label', 'gutty' ); ?>"} /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|20"} -->
<div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->