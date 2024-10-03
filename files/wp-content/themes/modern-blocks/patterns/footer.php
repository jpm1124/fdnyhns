<?php
/**
 * Title: Footer
 * Slug: modern-blocks/footer
 * Categories: modern-blocks
 * Keywords: footer
 *
 * @package Modern Blocks
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}}},"backgroundColor":"senary","textColor":"white","className":"site-footer","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull site-footer has-white-color has-senary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)"><!-- wp:columns {"align":"wide","style":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"},"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4,"textColor":"white"} -->
<h4 class="wp-block-heading has-white-color has-text-color">Company</h4>
<!-- /wp:heading -->

<!-- wp:list {"style":{"typography":{"textDecoration":"none","lineHeight":"2"}},"className":"is-style-none"} -->
<ul style="line-height:2;text-decoration:none" class="is-style-none"><!-- wp:list-item -->
<li><a href="#">About</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#">News</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#">Contact Us</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#">Meet Our Team</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4,"textColor":"white"} -->
<h4 class="wp-block-heading has-white-color has-text-color">Quick Links</h4>
<!-- /wp:heading -->

<!-- wp:list {"style":{"typography":{"lineHeight":"2"}},"className":"is-style-none"} -->
<ul style="line-height:2" class="is-style-none"><!-- wp:list-item -->
<li><a href="#"></a><a href="https://wp-themes.com/spectra-one/#">Knowledge Base</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"></a><a href="https://wp-themes.com/spectra-one/#">Contact Support</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#">Privacy Policies</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#">Terms &amp; Conditions</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"level":4,"textColor":"white"} -->
<h4 class="wp-block-heading has-white-color has-text-color">About</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","iconBackgroundColor":{},"openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xx-small","left":"var:preset|spacing|xx-small"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-default"><!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://www.youtube.com/","service":"youtube"} /-->

<!-- wp:social-link {"url":"https://www.tiktok.com/","service":"tiktok"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"var:preset|spacing|small"},"margin":{"top":"0px","bottom":"0px"}},"border":{"top":{"color":"#ffffff21","width":"1px"},"right":{"width":"0px","style":"none"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}},"backgroundColor":"senary","textColor":"white","className":"site-footer","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull site-footer has-white-color has-senary-background-color has-text-color has-background" style="border-top-color:#ffffff21;border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">
	<?php
		printf(
			/* translators: %s: Copyright text. */
			esc_html__( 'Copyright © %s. All Rights Reserved.', 'modern-blocks' ),
			esc_attr( date_i18n( 'Y' ) )
		);
		?>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
