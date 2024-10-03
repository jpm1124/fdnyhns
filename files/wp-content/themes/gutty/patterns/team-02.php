<?php
/**
 * Title: Team 02
 * Slug: gutty/team-02
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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|20","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"},"metadata":{"name":"Team 02"}} -->
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
			<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|20"}}}} -->
			<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)">
				<?php
				foreach ( $team_members_chunk as $team_member ) {
					?>
					<!-- wp:column {"verticalAlignment":"center"} -->
					<div class="wp-block-column is-vertically-aligned-center">

						<!-- wp:cover {"url":"<?php echo esc_url( GUTTY_DIR_URL ); ?>/assets/img/avatar.jpg","id":456,"dimRatio":0,"contentPosition":"center center","isDark":false,"style":{"color":{}},"layout":{"type":"constrained","contentSize":""}} -->
						<div class="wp-block-cover is-light">
							<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
							<img class="wp-block-cover__image-background wp-image-456" alt="" src="<?php echo esc_url( GUTTY_DIR_URL ); ?>/assets/img/avatar.jpg" data-object-fit="cover"/>
							<div class="wp-block-cover__inner-container">
								<!-- wp:spacer {"height":"280px"} -->
								<div style="height:280px" aria-hidden="true" class="wp-block-spacer"></div>
								<!-- /wp:spacer -->
								<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"style":"solid","width":"1px","color":"#020D19","radius":"100px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
								<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:#020D19;border-style:solid;border-width:1px;border-radius:100px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center"} -->
									<p class="has-text-align-center"><?php echo esc_html( $team_member[ 'name' ] ); ?></p>
									<!-- /wp:paragraph -->
								</div><!-- /wp:group -->
							</div>
						</div>
						<!-- /wp:cover -->

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
