<?php
/**
 * Plugin Name: EarthBnB Banner
 * Description: Une bannière pour EarthBnB.
 * Version: 6.6.6
 * Author: EarthBnB
 *
 * @package EarthBnB Banner
 * @version 6.6.6
 * @author EarthBnB
 */
define ('VERSION', '6.6.6');

# security
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );


register_activation_hook( __FILE__, 'earthbnb_banner_activate' );
function earthbnb_banner_activate() {
	add_action('admin_menu', 'earthbnb_banner_menu');
}

// Disabled Pages/Posts functionns
function get_disabled_pages_array() {
	return array_filter(explode(',', get_option('disabled_pages_array')));
}
function get_disabled_on_current_page() {
	$disabled_on_current_page = (!empty(get_disabled_pages_array()) && in_array(get_the_ID(), get_disabled_pages_array()));
	return $disabled_on_current_page;
}


add_action( 'wp_enqueue_scripts', 'earthbnb_banner' );
function earthbnb_banner() {
    // Enqueue the style
	wp_register_style('earthbnb-banner-style',  plugin_dir_url( __FILE__ ) .'earthbnb-banner.css', '', VERSION);
    wp_enqueue_style('earthbnb-banner-style');
	// Set Script parameters
	$disabled_on_current_page = get_disabled_on_current_page();
	$script_params = array(
		// script specific parameters
		'version' => VERSION,
		'hide_earthbnb_banner' => get_option('hide_earthbnb_banner'),
		'earthbnb_banner_text' => get_option('earthbnb_banner_text'),
		'disabled_on_current_page' => $disabled_on_current_page,
		'id' => get_the_ID(),
		'disabled_pages_array' => get_disabled_pages_array(),
		'earthbnb_banner_font_size' => get_option('earthbnb_banner_font_size'),
		'earthbnb_banner_color' => get_option('earthbnb_banner_color'),
		'earthbnb_banner_text_color' => get_option('earthbnb_banner_text_color'),
		'earthbnb_banner_link_color' => get_option('earthbnb_banner_link_color'),
		'earthbnb_banner_close_color' => get_option('earthbnb_banner_close_color'),
		'earthbnb_banner_text' => $disabled_on_current_page ? '' : get_option('earthbnb_banner_text'),
		'close_button_enabled' => true,
	);
	// Enqueue the script
    wp_register_script('earthbnb-banner-script', plugin_dir_url( __FILE__ ) . 'earthbnb-banner.js', array( 'jquery' ), VERSION);
	wp_localize_script('earthbnb-banner-script', 'earthbnbBannerScriptParams', $script_params);
    wp_enqueue_script('earthbnb-banner-script');
}

// Prevent CSS removal from optimizer plugins by putting a dummy item in the
add_action( 'wp_footer', 'prevent_css_removal');
function prevent_css_removal()
{
	echo '<div class="earthbnb-banner earthbnb-banner-text" style="display:none !important"></div>';
}

// Add custom CSS/JS
add_action( 'wp_head', 'earthbnb_banner_custom_options');
function earthbnb_banner_custom_options()
{
	$disabled_on_current_page = get_disabled_on_current_page();
	$banner_is_disabled = $disabled_on_current_page || get_option('hide_earthbnb_banner') == "yes";

	if ($banner_is_disabled){
		echo '<style type="text/css">.earthbnb-banner{display:none;}</style>';
	}

	if (get_option('earthbnb_banner_font_size') != ""){
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-text{font-size:' . get_option('earthbnb_banner_font_size') . ';}</style>';
	}

	if (get_option('earthbnb_banner_color') != ""){
		echo '<style type="text/css">.earthbnb-banner{background:' . get_option('earthbnb_banner_color') . ';}</style>';
	} else {
		echo '<style type="text/css">.earthbnb-banner{background: #8000ff;}</style>';
	}

	if (get_option('earthbnb_banner_text_color') != ""){
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-text{color:' . get_option('earthbnb_banner_text_color') . ';}</style>';
	} else {
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-text{color: #ffffff;}</style>';
	}

	if (get_option('earthbnb_banner_link_color') != ""){
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-text a{color:' . get_option('earthbnb_banner_link_color') . ';}</style>';
	} else {
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-text a{color:#f16521;}</style>';
	}

	if (get_option('earthbnb_banner_close_color') != ""){
		echo '<style type="text/css">.earthbnb-banner .earthbnb-banner-button{color:' . get_option('earthbnb_banner_close_color') . ';}</style>';
	}
}

add_action('admin_menu', 'earthbnb_banner_menu');
function earthbnb_banner_menu() {
	$manage_earthbnb_banner = 'manage_earthbnb_banner';
	$manage_options = 'manage_options';
	//Add admin access
	$admin = get_role( 'administrator' );
	if ($admin) {
		$admin->add_cap( $manage_earthbnb_banner );
	}

	add_menu_page('EarthBnB Banner Settings', 'EarthBnB Banner', $manage_earthbnb_banner, 'earthbnb-banner-settings', 'earthbnb_banner_settings_page', 'dashicons-button');
}


//script input sanitization function
function theme_slug_sanitize_js_code($input){
    return base64_encode($input);
}
  
  
//output escape function    
function theme_slug_escape_js_output($input){
    return esc_textarea( base64_decode($input) );
}

add_action( 'admin_init', 'earthbnb_banner_settings' );
function earthbnb_banner_settings() {
	register_setting( 'earthbnb-banner-settings-group', 'hide_earthbnb_banner',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_font_size',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_color',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_text_color',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_link_color',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_close_color',
		array(
	    	'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
    );
	register_setting( 'earthbnb-banner-settings-group', 'earthbnb_banner_text',
		array(
	    	'sanitize_callback' => 'wp_kses_post'
		)
    );
}

function earthbnb_banner_settings_page() {
	?>

	<style type="text/css" id="settings_stylesheet">
		.earthbnb-banner-settings-form th {width: 30%;}
	</style>

	<div class="wrap">
		<div style="display: flex;justify-content: space-between;">
			<h2>Paramètres de la bannière EarthBnB</h2>
		</div>


		<p>Les liens dans le texte de la bannière doivent être saisis avec les balises HTML <code>&lt;a&gt;</code>.
		<br />ex. : <code>Ceci est un &lt;a href=&#34;http:&#47;&#47;www.wordpress.com&#34;&gt;Lien vers Wordpresss&lt;&#47;a&gt;</code>.</p>

		<!-- Preview Banner -->
		<div id="preview_banner_outer_container" style="min-height: 40px;">
			<div id="preview_banner_inner_container">
				<div id="preview_banner" class="earthbnb-banner" style="width: 100%;text-align: center;">
					<div id="preview_banner_text" class="earthbnb-banner-text" style="font-weight: 700;padding: 10px;">
						<span>Aperçu de votre bannière avec un <a href="/">lien</a>.</span>
					</div>
				</div>
			</div>
		</div>
		<br>

		<!-- Settings Form -->
		<form class="earthbnb-banner-settings-form" method="post" action="options.php">
			<?php settings_fields( 'earthbnb-banner-settings-group' ); ?>
			<?php do_settings_sections( 'earthbnb-banner-settings-group' ); ?>

			<table class="form-table">
				<!-- Hide -->
				<tr valign="top">
					<th scope="row">
						Cacher la bannière
						<br><span style="font-weight:400;">Cacher la bannière en appliquant <code>display: none;</code></span>
					</th>
					<td style="vertical-align:top;">
						<!-- -->
						<input type="radio" id="yes" name="hide_earthbnb_banner" value="yes" <?php echo ((get_option('hide_earthbnb_banner') == 'yes') ? 'checked' : '' ); ?>>
						<label for="yes">Oui</label>
						<!-- -->
						<input type="radio" id="no" name="hide_earthbnb_banner" value="no" <?php echo ((get_option('hide_earthbnb_banner') == 'yes') ? '' : 'checked' ); ?>>
						<label for="no">Non</label>
						<!-- -->
					</td>
				</tr>
				<!-- Font Size -->
				<tr valign="top">
					<th scope="row">
						Taille de la police
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la valeur par défaut sera celle de votre thème CSS</span>
					</th>
					<td style="vertical-align:top;">
						<input type="text" id="earthbnb_banner_font_size" name="earthbnb_banner_font_size" placeholder="Taille en px"
										value="<?php echo esc_attr( get_option('earthbnb_banner_font_size') ); ?>" />
						<span>ex. : 16px</span>
					</td>
				</tr>
				<!-- Background Color -->
				<tr valign="top">
					<th scope="row">
						Couleur de fond
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la couleur par défaut sera la valeur #8000ff</span>
					</th>
					<td style="vertical-align:top;">
						<input type="text" id="earthbnb_banner_color" name="earthbnb_banner_color" placeholder="Code HEX"
										value="<?php echo esc_attr( get_option('earthbnb_banner_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="earthbnb_banner_color_show"
										value="<?php echo ((get_option('earthbnb_banner_color') == '') ? '#8000ff' : esc_attr( get_option('earthbnb_banner_color') )); ?>">
					</td>
				</tr>
				<!-- Text Color -->
				<tr valign="top">
					<th scope="row">
						Couleur du texte
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la couleur par défaut sera le blanc</span>
					</th>
					<td style="vertical-align:top;">
						<input type="text" id="earthbnb_banner_text_color" name="earthbnb_banner_text_color" placeholder="Code HEX"
										value="<?php echo esc_attr( get_option('earthbnb_banner_text_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="earthbnb_banner_text_color_show"
										value="<?php echo ((get_option('earthbnb_banner_text_color') == '') ? '#ffffff' : esc_attr( get_option('earthbnb_banner_text_color') )); ?>">
					</td>
				</tr>
				<!-- Link Color-->
				<tr valign="top">
					<th scope="row">
						Couleur du lien
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la couleur par défaut sera la valeur #f16521</span>
					</th>
					<td style="vertical-align:top;">
						<input type="text" id="earthbnb_banner_link_color" name="earthbnb_banner_link_color" placeholder="Code HEX"
										value="<?php echo esc_attr( get_option('earthbnb_banner_link_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="earthbnb_banner_link_color_show"
										value="<?php echo ((get_option('earthbnb_banner_link_color') == '') ? '#f16521' : esc_attr( get_option('earthbnb_banner_link_color') )); ?>">
					</td>
				</tr>
				<!-- Close Color-->
				<tr valign="top">
					<th scope="row">
					Couleur du bouton de fermeture 
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la couleur par défaut sera le noir</span>
					</th>
					<td style="vertical-align:top;">
						<input type="text" id="earthbnb_banner_close_color" name="earthbnb_banner_close_color" placeholder="Code HEX"
										value="<?php echo esc_attr( get_option('earthbnb_banner_close_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="earthbnb_banner_close_color_show"
										value="<?php echo ((get_option('earthbnb_banner_close_color') == '') ? 'black' : esc_attr( get_option('earthbnb_banner_close_color') )); ?>">
					</td>
				</tr>
				<!-- Text Contents -->
				<tr valign="top">
					<th scope="row">
						Texte de la bannière
						<br><span style="font-weight:400;">Si vous laissez ce champ vide, la bannière sera supprimée</span>
					</th>
						<td>
							<textarea id="earthbnb_banner_text" class="large-text code" style="height: 150px;width: 97%;" name="earthbnb_banner_text"><?php echo get_option('earthbnb_banner_text'); ?></textarea>
						</td>
				</tr>
			</table>


			<!-- Save Changes Button -->
			<?php submit_button(); ?>
		</form>
	</div>

	<!-- Script to apply styles to Preview Banner -->
	<script type="text/javascript">
		// Banner Default Stylesheet
		var earthbnb_banner_css = document.createElement('link');
		earthbnb_banner_css.id = 'earthbnb-banner-stylesheet';
		earthbnb_banner_css.rel = 'stylesheet';
		earthbnb_banner_css.href = "<?php echo plugin_dir_url( __FILE__ ) .'earthbnb-banner.css' ?>";
		document.getElementsByTagName('head')[0].appendChild(earthbnb_banner_css);

		// Fixed Preview Banner on scroll
		window.onscroll = function() {fixedBanner()};
        function fixedBanner() {			
			var elementContainer = document.getElementById('preview_banner_outer_container');
			var elementTarget = document.getElementById('preview_banner_inner_container');
			if (window.scrollY > (elementContainer.offsetTop)) {
				elementTarget.style.position = 'fixed';
				elementTarget.style.width = '83.671%';
				elementTarget.style.top = '40px';
			} else {
				elementTarget.style.position = 'relative';
				elementTarget.style.width = '100%';
				elementTarget.style.top = '0';
			}
        }

		var style_font_size = document.createElement('style');
		var style_background_color = document.createElement('style');
		var style_link_color = document.createElement('style');
		var style_text_color = document.createElement('style');
		var style_close_color = document.createElement('style');
		var style_custom_css = document.createElement('style');
		var style_custom_text_css = document.createElement('style');
		var style_custom_button_css = document.createElement('style');

		// Banner Text
		var hrefRegex = /href\=[\'\"](?!http|https)(.*?)[\'\"]/gsi;
		var scriptStyleRegex = /<(script|style)[^>]*?>.*?<\/(script|style)>/gsi;
		function stripBannerText(string) {
			let strippedString = string;
			while (strippedString.match(scriptStyleRegex)) { 
			    strippedString = strippedString.replace(scriptStyleRegex, '')
			};
			return strippedString.replace(hrefRegex, "href=\"https://$1\"");
		}
		document.getElementById('preview_banner_text').innerHTML = document.getElementById('earthbnb_banner_text').value != "" ? 
						'<span>'+stripBannerText(document.getElementById('earthbnb_banner_text').value)+'</span>' : 
						'<span>Aperçu de votre bannière avec un <a href="/">lien</a>.</span>';
		document.getElementById('earthbnb_banner_text').onchange=function(e){
			document.getElementById('preview_banner_text').innerHTML = e.target.value != "" ? '<span>'+stripBannerText(e.target.value)+'</span>' : '<span>Aperçu de votre bannière avec un <a href="/">lien</a>.</span>';
		};

		// Close Button
		var closeButton = '<button id="earthbnb-banner-close-button" class="earthbnb-banner-button">✕</button>';
		document.getElementById('preview_banner').innerHTML = document.getElementById('preview_banner').innerHTML + closeButton;


		// Font Size
		style_font_size.type = 'text/css';
		style_font_size.id = 'preview_banner_font_size'
		style_font_size.appendChild(document.createTextNode('.earthbnb-banner .earthbnb-banner-text{font-size:' + (document.getElementById('earthbnb_banner_font_size').value || '1em') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_font_size);

		document.getElementById('earthbnb_banner_font_size').onchange=function(e){
			var child = document.getElementById('preview_banner_font_size');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_font_size';
			style_dynamic.appendChild(
				document.createTextNode(
					'.earthbnb-banner .earthbnb-banner-text{font-size:' + (document.getElementById('earthbnb_banner_font_size').value || '1em') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};

		// Background Color
		style_background_color.type = 'text/css';
		style_background_color.id = 'preview_banner_background_color'
		style_background_color.appendChild(document.createTextNode('.earthbnb-banner{background:' + (document.getElementById('earthbnb_banner_color').value || '#8000ff') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_background_color);

		document.getElementById('earthbnb_banner_color').onchange=function(e){
			document.getElementById('earthbnb_banner_color_show').value = e.target.value || '#8000ff';
			var child = document.getElementById('preview_banner_background_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_background_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.earthbnb-banner{background:' + (document.getElementById('earthbnb_banner_color').value || '#8000ff') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('earthbnb_banner_color_show').onchange=function(e){
			document.getElementById('earthbnb_banner_color').value = e.target.value;
			document.getElementById('earthbnb_banner_color').dispatchEvent(new Event('change'));
		};

		// Text Color
		style_text_color.type = 'text/css';
		style_text_color.id = 'preview_banner_text_color'
		style_text_color.appendChild(document.createTextNode('.earthbnb-banner .earthbnb-banner-text{color:' + (document.getElementById('earthbnb_banner_text_color').value || '#ffffff') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_text_color);

		document.getElementById('earthbnb_banner_text_color').onchange=function(e){
			document.getElementById('earthbnb_banner_text_color_show').value = e.target.value || '#ffffff';
			var child = document.getElementById('preview_banner_text_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_text_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.earthbnb-banner .earthbnb-banner-text{color:' + (document.getElementById('earthbnb_banner_text_color').value || '#ffffff') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('earthbnb_banner_text_color_show').onchange=function(e){
			document.getElementById('earthbnb_banner_text_color').value = e.target.value;
			document.getElementById('earthbnb_banner_text_color').dispatchEvent(new Event('change'));
		};

		// Link Color
		style_link_color.type = 'text/css';
		style_link_color.id = 'preview_banner_link_color'
		style_link_color.appendChild(document.createTextNode('.earthbnb-banner .earthbnb-banner-text a{color:' + (document.getElementById('earthbnb_banner_link_color').value || '#f16521') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_link_color);

		document.getElementById('earthbnb_banner_link_color').onchange=function(e){
			document.getElementById('earthbnb_banner_link_color_show').value = e.target.value || '#f16521';
			var child = document.getElementById('preview_banner_link_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_link_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.earthbnb-banner .earthbnb-banner-text a{color:' + (document.getElementById('earthbnb_banner_link_color').value || '#f16521') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('earthbnb_banner_link_color_show').onchange=function(e){
			document.getElementById('earthbnb_banner_link_color').value = e.target.value;
			document.getElementById('earthbnb_banner_link_color').dispatchEvent(new Event('change'));
		};

		// Close button color
		style_close_color.type = 'text/css';
		style_close_color.id = 'preview_banner_close_color'
		style_close_color.appendChild(document.createTextNode('.earthbnb-banner .earthbnb-banner-button{color:' + (document.getElementById('earthbnb_banner_close_color').value || 'black') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_close_color);

		document.getElementById('earthbnb_banner_close_color').onchange=function(e){
			document.getElementById('earthbnb_banner_close_color_show').value = e.target.value || 'black';
			var child = document.getElementById('preview_banner_close_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_close_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.earthbnb-banner .earthbnb-banner-button{color:' + (document.getElementById('earthbnb_banner_close_color').value || 'black') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('earthbnb_banner_close_color_show').onchange=function(e){
			document.getElementById('earthbnb_banner_close_color').value = e.target.value;
			document.getElementById('earthbnb_banner_close_color').dispatchEvent(new Event('change'));
		};


		// remove banner text newlines on submit
		document.getElementById('submit').onclick=function(e){
			document.getElementById('earthbnb_banner_text').value = document.getElementById('earthbnb_banner_text').value.replace(/\n/g, "");
		};
	</script>
	<?php
}
?>
