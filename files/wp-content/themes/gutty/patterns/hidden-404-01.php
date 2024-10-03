<?php
/**
 * Title: 404 01
 * Slug: gutty/hidden-404-01
 * Inserter: no
 */
?>

<!-- wp:group {"tagName":"main","metadata":{"name":"404"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"base","layout":{"type":"default"}} -->
<main class="wp-block-group has-base-background-color has-background" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"align":"wide","className":"alignfull has-base-background-color has-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide alignfull has-base-background-color has-background"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<p class="has-text-align-center has-text-color" style="font-style:normal;font-weight:600"><?php esc_html_e( 'Page not found', 'gutty' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"align":"full","className":"wp-block-heading"} -->
<h1 class="wp-block-heading alignfull has-text-align-center"><?php esc_html_e( 'Error 404', 'gutty'); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size"><?php esc_html_e( 'The page you‘re looking for can‘t be found.', 'gutty'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"className":"alignfull has-base-background-color has-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide alignfull has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'gutty' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search...', 'search form placeholder', 'gutty' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'search form label', 'gutty' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true} /--></div>
<!-- /wp:group --></main>
<!-- /wp:group -->