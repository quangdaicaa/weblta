<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Startup_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-startup' ),
				'family'      => esc_html__( 'Font Family', 'vw-startup' ),
				'size'        => esc_html__( 'Font Size',   'vw-startup' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-startup' ),
				'style'       => esc_html__( 'Font Style',  'vw-startup' ),
				'line_height' => esc_html__( 'Line Height', 'vw-startup' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-startup' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-startup-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-startup-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-startup' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-startup' ),
        'Acme' => __( 'Acme', 'vw-startup' ),
        'Anton' => __( 'Anton', 'vw-startup' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-startup' ),
        'Arimo' => __( 'Arimo', 'vw-startup' ),
        'Arsenal' => __( 'Arsenal', 'vw-startup' ),
        'Arvo' => __( 'Arvo', 'vw-startup' ),
        'Alegreya' => __( 'Alegreya', 'vw-startup' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-startup' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-startup' ),
        'Bangers' => __( 'Bangers', 'vw-startup' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-startup' ),
        'Bad Script' => __( 'Bad Script', 'vw-startup' ),
        'Bitter' => __( 'Bitter', 'vw-startup' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-startup' ),
        'BenchNine' => __( 'BenchNine', 'vw-startup' ),
        'Cabin' => __( 'Cabin', 'vw-startup' ),
        'Cardo' => __( 'Cardo', 'vw-startup' ),
        'Courgette' => __( 'Courgette', 'vw-startup' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-startup' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-startup' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-startup' ),
        'Cuprum' => __( 'Cuprum', 'vw-startup' ),
        'Cookie' => __( 'Cookie', 'vw-startup' ),
        'Chewy' => __( 'Chewy', 'vw-startup' ),
        'Days One' => __( 'Days One', 'vw-startup' ),
        'Dosis' => __( 'Dosis', 'vw-startup' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-startup' ),
        'Economica' => __( 'Economica', 'vw-startup' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-startup' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-startup' ),
        'Francois One' => __( 'Francois One', 'vw-startup' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-startup' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-startup' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-startup' ),
        'Handlee' => __( 'Handlee', 'vw-startup' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-startup' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-startup' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-startup' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-startup' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-startup' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-startup' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-startup' ),
        'Kanit' => __( 'Kanit', 'vw-startup' ),
        'Lobster' => __( 'Lobster', 'vw-startup' ),
        'Lato' => __( 'Lato', 'vw-startup' ),
        'Lora' => __( 'Lora', 'vw-startup' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-startup' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-startup' ),
        'Merriweather' => __( 'Merriweather', 'vw-startup' ),
        'Monda' => __( 'Monda', 'vw-startup' ),
        'Montserrat' => __( 'Montserrat', 'vw-startup' ),
        'Muli' => __( 'Muli', 'vw-startup' ),
        'Marck Script' => __( 'Marck Script', 'vw-startup' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-startup' ),
        'Open Sans' => __( 'Open Sans', 'vw-startup' ),
        'Overpass' => __( 'Overpass', 'vw-startup' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-startup' ),
        'Oxygen' => __( 'Oxygen', 'vw-startup' ),
        'Orbitron' => __( 'Orbitron', 'vw-startup' ),
        'Patua One' => __( 'Patua One', 'vw-startup' ),
        'Pacifico' => __( 'Pacifico', 'vw-startup' ),
        'Padauk' => __( 'Padauk', 'vw-startup' ),
        'Playball' => __( 'Playball', 'vw-startup' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-startup' ),
        'PT Sans' => __( 'PT Sans', 'vw-startup' ),
        'Philosopher' => __( 'Philosopher', 'vw-startup' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-startup' ),
        'Poiret One' => __( 'Poiret One', 'vw-startup' ),
        'Quicksand' => __( 'Quicksand', 'vw-startup' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-startup' ),
        'Raleway' => __( 'Raleway', 'vw-startup' ),
        'Rubik' => __( 'Rubik', 'vw-startup' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-startup' ),
        'Russo One' => __( 'Russo One', 'vw-startup' ),
        'Righteous' => __( 'Righteous', 'vw-startup' ),
        'Slabo' => __( 'Slabo', 'vw-startup' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-startup' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-startup'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-startup' ),
        'Sacramento' => __( 'Sacramento', 'vw-startup' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-startup' ),
        'Tangerine' => __( 'Tangerine', 'vw-startup' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-startup' ),
        'VT323' => __( 'VT323', 'vw-startup' ),
        'Varela Round' => __( 'Varela Round', 'vw-startup' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-startup' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-startup' ),
        'Volkhov' => __( 'Volkhov', 'vw-startup' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-startup' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-startup' ),
			'100' => esc_html__( 'Thin',       'vw-startup' ),
			'300' => esc_html__( 'Light',      'vw-startup' ),
			'400' => esc_html__( 'Normal',     'vw-startup' ),
			'500' => esc_html__( 'Medium',     'vw-startup' ),
			'700' => esc_html__( 'Bold',       'vw-startup' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-startup' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-startup' ),
			'italic'  => esc_html__( 'Italic', 'vw-startup' ),
			'oblique' => esc_html__( 'Oblique', 'vw-startup' )
		);
	}
}
