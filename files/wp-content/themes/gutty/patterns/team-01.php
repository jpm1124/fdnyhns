<?php
/**
 * Title: Team 01
 * Slug: gutty/team-01
 * Description: A team section
 * Categories: gutty/team
 * Keywords: team
 * Viewport Width:
 * Block Types:
 * Post Types:
 * Inserter: true
 */
require_once( GUTTY_UTILITIES_DIR . '/dummy-data.php' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"},"metadata":{"name":"Team 01"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)">
	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","className":"has-text-color"} -->
			<p class="has-text-align-center has-text-color has-primary-color has-link-color" style="font-style:normal;font-weight:500"><?php esc_html_e( 'Join our team!', 'gutty' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","align":"wide","className":"wp-block-heading"} -->
		<h2 class="wp-block-heading alignwide has-text-align-center"><?php esc_html_e( 'Meet the Crew', 'gutty' ); ?></h2>
		<!-- /wp:heading --></div>
	<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
		<p class="has-text-align-center has-medium-font-size"><?php esc_html_e( 'Embark on a journey of professional growth and fulfillment by exploring exciting career opportunities with us. Uncover a world where innovation, collaboration, and personal development converge to shape a rewarding career path. Join us in making a meaningful impact and realizing your full potential. Your future awaits – discover it with us!', 'gutty' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php
	if ( ! empty( $team_members ) ) {
		$team_members_chunks = array_chunk( $team_members, 4 );
		foreach ( $team_members_chunks as $team_members_chunk ) {
			?>
			<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)">
				<?php
				foreach ( $team_members_chunk as $team_member ) {
					?>
					<!-- wp:column {"verticalAlignment":"center"} -->
					<div class="wp-block-column is-vertically-aligned-center">

						<!-- wp:image {"align":"center","id":278,"width":"116px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"100px"},"color":{}},"className":"is-style-rounded"} -->
						<figure class="wp-block-image aligncenter size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url( GUTTY_DIR_URL ); ?>/assets/img/avatar.jpg" class="wp-image-278" alt="" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:116px" /></figure>
						<!-- /wp:image -->

						<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
							<p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html( $team_member[ 'name' ] ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
							<p class="has-text-align-center has-primary-color has-text-color has-link-color"><?php echo esc_html( $team_member[ 'job_title' ] ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
					<?php
				}
				?>
			</div>
			<!-- /wp:columns -->
			<?php
		}
	}
	?>
</div>
<!-- /wp:group -->