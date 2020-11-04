<?php	/*		Settings Page	*/	function msr_elearn_settings(){	add_menu_page( 'elearn-WestMacGR Settings', 'elearn-WestMacGR', 'publish_diagonismata', 'msr-elearn-settings', 'msr_elearn_settings_page' );	}add_action('admin_menu', 'msr_elearn_settings');function msr_elearn_settings_register() {	register_setting( 'msr_elearn_group', 'msr_diagonismata_page' );	register_setting( 'msr_elearn_group', 'msr_diagonisma_single' );}add_action( 'admin_init', 'msr_elearn_settings_register' ); function msr_elearn_settings_page(){ ?>	<div class="wrap">		<h1>Page Settings</h1>		<p>Specify the pages you have created.</p>		<form method="post" action="options.php">		<?php		settings_fields( 'msr_elearn_group' );		do_settings_sections( 'msr_elearn_group' );		?>			<table class="form-table">				<?php				$args = array(					'sort_order' => 'asc',					'sort_column' => 'post_title',					'hierarchical' => 0,					'post_type' => 'page',					'post_status' => 'publish',				);				$pages = get_pages( $args );				?>				<tr valign="middle">					<th scope="row"><label for="msr_diagonismata_page">Test Page: </label></th>					<td>						<select name="msr_diagonismata_page">							<option value=""><?php echo 'επιλέξτε'; ?></option>							<?php							foreach( $pages as $page ) { ?>								<option value="<?php echo $page->ID; ?>" <?php selected( esc_attr( get_option( 'msr_diagonismata_page' ) ), $page->ID ); ?>><?php echo $page->post_title; ?></option>							<?php							}							?>						</select>					</td>				</tr>			</table>			<?php submit_button(); ?>		</form>	</div><?php}include( 'templates/admin-results.php' );