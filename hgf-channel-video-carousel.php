<?php

class CHILD_ET_Builder_Module_HGF_Channel_Carousel extends ET_Builder_Module {
  function init() {
    $this->name            = esc_html__( 'HGF Channel Carousel', 'et_builder' );
    $this->slug            = 'et_pb_hgf_channel_carousel';
    $this->fullwidth       = true;

    // need to use global settings from the slider module
    $this->global_settings_slug = 'et_pb_hgf_channel_carousel';

    $this->whitelisted_fields = array(
      'title',
      'fullwidth',
      'include_categories',
      'posts_number',
      'show_title',
      'show_date',
      'background_layout',
      'auto',
      'auto_speed',
      'hover_icon',
      'hover_overlay_color',
      'zoom_icon_color',
      'admin_label',
      'module_id',
      'module_class',
    );

    $this->main_css_element = '%%order_class%%';

    $this->advanced_options = array(
      'fonts' => array(
        'title'   => array(
          'label'    => esc_html__( 'Title', 'et_builder' ),
          'css'      => array(
            'main' => "{$this->main_css_element} h3",
            'important' => 'all',
          ),
        ),
        'caption' => array(
          'label'    => esc_html__( 'Meta', 'et_builder' ),
          'css'      => array(
            'main' => "{$this->main_css_element} .post-meta, {$this->main_css_element} .post-meta a",
          ),
        ),
      ),
      'background' => array(
        'settings' => array(
          'color' => 'alpha',
        ),
      ),
      'border' => array(
        'css' => array(
          'main' => "{$this->main_css_element} .et_pb_portfolio_item",
        ),
      ),
    );

    $this->custom_css_options = array(
      'portfolio_title' => array(
        'label'    => esc_html__( 'Video Carousel Title', 'et_builder' ),
        'selector' => '> h2',
      ),
      'portfolio_item' => array(
        'label'    => esc_html__( 'Portfolio Item', 'et_builder' ),
        'selector' => '.et_pb_portfolio_item',
      ),
      'portfolio_overlay' => array(
        'label'    => esc_html__( 'Item Overlay', 'et_builder' ),
        'selector' => 'span.et_overlay',
      ),
      'portfolio_item_title' => array(
        'label'    => esc_html__( 'Item Title', 'et_builder' ),
        'selector' => '.meta h3',
      ),
      'portfolio_meta' => array(
        'label'    => esc_html__( 'Meta', 'et_builder' ),
        'selector' => '.meta p',
      ),
      'portfolio_arrows' => array(
        'label'    => esc_html__( 'Navigation Arrows', 'et_builder' ),
        'selector' => '.et-pb-slider-arrows a',
      ),
    );

    $this->fields_defaults = array(
      'fullwidth'         => array( 'on' ),
      'show_title'        => array( 'on' ),
      'show_date'         => array( 'on' ),
      'background_layout' => array( 'light' ),
      'auto'              => array( 'off' ),
      'auto_speed'        => array( '7000' ),
    );
  }

  function get_fields() {
    $fields = array(
      'title' => array(
        'label'           => esc_html__( 'Video Carousel Title', 'et_builder' ),
        'type'            => 'text',
        'option_category' => 'basic_option',
        'description'     => esc_html__( 'Title displayed above the video carousel.', 'et_builder' ),
      ),
      'fullwidth' => array(
        'label'             => esc_html__( 'Layout', 'et_builder' ),
        'type'              => 'select',
        'option_category'   => 'layout',
        'options'           => array(
          'on'  => esc_html__( 'Carousel', 'et_builder' ),
          'off' => esc_html__( 'Grid', 'et_builder' ),
        ),
        'affects'           => array(
          '#et_pb_auto',
        ),
        'description'        => esc_html__( 'Choose your desired portfolio layout style.', 'et_builder' ),
      ),
      'include_categories' => array(
        'label'           => esc_html__( 'Include Categories', 'et_builder' ),
        'renderer'        => 'et_builder_include_categories_option',
        'option_category' => 'basic_option',
        'description'     => esc_html__( 'Select the categories that you would like to include in the feed.', 'et_builder' ),
      ),
      'posts_number' => array(
        'label'           => esc_html__( 'Posts Number', 'et_builder' ),
        'type'            => 'text',
        'option_category' => 'configuration',
        'description'     => esc_html__( 'Control how many videos are displayed. Leave blank or use 0 to not limit the amount.', 'et_builder' ),
      ),
      'show_title' => array(
        'label'             => esc_html__( 'Show Title', 'et_builder' ),
        'type'              => 'yes_no_button',
        'option_category'   => 'configuration',
        'options'           => array(
          'on'  => esc_html__( 'Yes', 'et_builder' ),
          'off' => esc_html__( 'No', 'et_builder' ),
        ),
        'description'        => esc_html__( 'Turn video titles on or off.', 'et_builder' ),
      ),
      'show_date' => array(
        'label'             => esc_html__( 'Show Date', 'et_builder' ),
        'type'              => 'yes_no_button',
        'option_category'   => 'configuration',
        'options'           => array(
          'on'  => esc_html__( 'Yes', 'et_builder' ),
          'off' => esc_html__( 'No', 'et_builder' ),
        ),
        'description'        => esc_html__( 'Turn the date display on or off.', 'et_builder' ),
      ),
      'background_layout' => array(
        'label'             => esc_html__( 'Text Color', 'et_builder' ),
        'type'              => 'select',
        'option_category'   => 'color_option',
        'options'           => array(
          'light'  => esc_html__( 'Dark', 'et_builder' ),
          'dark' => esc_html__( 'Light', 'et_builder' ),
        ),
        'description'        => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
      ),
      'auto' => array(
        'label'             => esc_html__( 'Automatic Carousel Rotation', 'et_builder' ),
        'type'              => 'yes_no_button',
        'option_category'   => 'configuration',
        'options'           => array(
          'off'  => esc_html__( 'Off', 'et_builder' ),
          'on' => esc_html__( 'On', 'et_builder' ),
        ),
        'affects'           => array(
          '#et_pb_auto_speed',
        ),
        'depends_show_if' => 'on',
        'description'        => esc_html__( 'If you the carousel layout option is chosen and you would like the carousel to slide automatically, without the visitor having to click the next button, enable this option and then adjust the rotation speed below if desired.', 'et_builder' ),
      ),
      'auto_speed' => array(
        'label'             => esc_html__( 'Automatic Carousel Rotation Speed (in ms)', 'et_builder' ),
        'type'              => 'text',
        'option_category'   => 'configuration',
        'depends_default'   => true,
        'description'       => esc_html__( "Here you can designate how fast the carousel rotates, if 'Automatic Carousel Rotation' option is enabled above. The higher the number the longer the pause between each rotation. (Ex. 1000 = 1 sec)", 'et_builder' ),
      ),
      'zoom_icon_color' => array(
        'label'             => esc_html__( 'Zoom Icon Color', 'et_builder' ),
        'type'              => 'color',
        'custom_color'      => true,
        'tab_slug'          => 'advanced',
      ),
      'hover_overlay_color' => array(
        'label'             => esc_html__( 'Hover Overlay Color', 'et_builder' ),
        'type'              => 'color-alpha',
        'custom_color'      => true,
        'tab_slug'          => 'advanced',
      ),
      'hover_icon' => array(
        'label'               => esc_html__( 'Hover Icon Picker', 'et_builder' ),
        'type'                => 'text',
        'option_category'     => 'configuration',
        'class'               => array( 'et-pb-font-icon' ),
        'renderer'            => 'et_pb_get_font_icon_list',
        'renderer_with_field' => true,
        'tab_slug'            => 'advanced',
      ),
      'disabled_on' => array(
        'label'           => esc_html__( 'Disable on', 'et_builder' ),
        'type'            => 'multiple_checkboxes',
        'options'         => array(
          'phone'   => esc_html__( 'Phone', 'et_builder' ),
          'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
          'desktop' => esc_html__( 'Desktop', 'et_builder' ),
        ),
        'additional_att'  => 'disable_on',
        'option_category' => 'configuration',
        'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
      ),
      'admin_label' => array(
        'label'       => esc_html__( 'Admin Label', 'et_builder' ),
        'type'        => 'text',
        'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
      ),
      'module_id' => array(
        'label'           => esc_html__( 'CSS ID', 'et_builder' ),
        'type'            => 'text',
        'option_category' => 'configuration',
        'tab_slug'        => 'custom_css',
        'option_class'    => 'et_pb_custom_css_regular',
      ),
      'module_class' => array(
        'label'           => esc_html__( 'CSS Class', 'et_builder' ),
        'type'            => 'text',
        'option_category' => 'configuration',
        'tab_slug'        => 'custom_css',
        'option_class'    => 'et_pb_custom_css_regular',
      ),
    );
    return $fields;
  }

  function shortcode_callback( $atts, $content = null, $function_name ) {
    $title               = $this->shortcode_atts['title'];
    $module_id           = $this->shortcode_atts['module_id'];
    $module_class        = $this->shortcode_atts['module_class'];
    $fullwidth           = $this->shortcode_atts['fullwidth'];
    $include_categories  = $this->shortcode_atts['include_categories'];
    $posts_number        = $this->shortcode_atts['posts_number'];
    $show_title          = $this->shortcode_atts['show_title'];
    $show_date           = $this->shortcode_atts['show_date'];
    $background_layout   = $this->shortcode_atts['background_layout'];
    $auto                = $this->shortcode_atts['auto'];
    $auto_speed          = $this->shortcode_atts['auto_speed'];
    $zoom_icon_color     = $this->shortcode_atts['zoom_icon_color'];
    $hover_overlay_color = $this->shortcode_atts['hover_overlay_color'];
    $hover_icon          = $this->shortcode_atts['hover_icon'];

    $module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

    if ( '' !== $zoom_icon_color ) {
      ET_Builder_Element::set_style( $function_name, array(
        'selector'    => '%%order_class%% .et_overlay:before',
        'declaration' => sprintf(
          'color: %1$s !important;',
          esc_html( $zoom_icon_color )
        ),
      ) );
    }

    if ( '' !== $hover_overlay_color ) {
      ET_Builder_Element::set_style( $function_name, array(
        'selector'    => '%%order_class%% .et_overlay',
        'declaration' => sprintf(
          'background-color: %1$s;
          border-color: %1$s;',
          esc_html( $hover_overlay_color )
        ),
      ) );
    }

    $args = array();
    if ( is_numeric( $posts_number ) && $posts_number > 0 ) {
      $args['posts_per_page'] = $posts_number;
    } else {
      $args['nopaging'] = true;
    }

    if ( '' !== $include_categories ) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'hgf_video_category',
          'field' => 'id',
          'terms' => explode( ',', $include_categories ),
          'operator' => 'IN'
        )
      );
    }

    $videos = et_divi_get_hgf_videos( $args );

    ob_start();
    if( $videos->post_count > 0 ) {
      while ( $videos->have_posts() ) {
        $videos->the_post();
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_portfolio_item et_pb_grid_item ' ); ?>>
        <?php
          $thumb = '';

          $width = 510;
          $width = (int) apply_filters( 'et_pb_portfolio_image_width', $width );

          $height = 382;
          $height = (int) apply_filters( 'et_pb_portfolio_image_height', $height );

          list($thumb_src, $thumb_width, $thumb_height) = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( $width, $height ) );

          $orientation = ( $thumb_height > $thumb_width ) ? 'portrait' : 'landscape';
          $video_title = get_the_title();
          $max_characters = 50;

          if (strlen($video_title) > $max_characters) {
            $video_title = mb_strimwidth($video_title, 0, $max_characters, "...");
            // $video_title = substr($video_title, 0, $max_characters). "...";
          }
          // $video_title = mb_strwidth();

          if ( '' !== $thumb_src ) : ?>
            <div class="et_pb_portfolio_image <?php echo esc_attr( $orientation ); ?>">
              <img src="<?php echo esc_url( $thumb_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
              <div class="meta display_always">
                <a href="<?php esc_url( the_permalink() ); ?>">
                <?php
                  $data_icon = '' !== $hover_icon
                    ? sprintf(
                      ' data-icon="%1$s"',
                      esc_attr( et_pb_process_font_icon( $hover_icon ) )
                    )
                    : '';

                  printf( '<span class="et_overlay%1$s display_always hgf-front-page-video-overlay"%2$s>%3$s</span>',
                    ( '' !== $hover_icon ? ' et_pb_inline_icon' : '' ),
                    $data_icon,
                    ( 'on' === $show_title ? '<h3>' . $video_title . '</h3>' : '')
                  );
                ?>

                  <?php if ( 'on' === $show_date ) : ?>
                    <p class="post-meta"><?php echo get_the_date(); ?></p>
                  <?php endif; ?>
                </a>
              </div>
            </div>
        <?php endif; ?>
        </div>
        <?php
      }
    }

    wp_reset_postdata();

    $posts = ob_get_clean();

    $class = " et_pb_module et_pb_bg_layout_{$background_layout}";

    $output = sprintf(
      '<div%4$s class="et_pb_fullwidth_portfolio %1$s%3$s%5$s" data-auto-rotate="%6$s" data-auto-rotate-speed="%7$s">
        %8$s
        <div class="et_pb_portfolio_items clearfix" data-portfolio-columns="">
          %2$s
        </div><!-- .et_pb_portfolio_items -->
      </div> <!-- .et_pb_fullwidth_portfolio -->',
      ( 'on' === $fullwidth ? 'et_pb_fullwidth_portfolio_carousel' : 'et_pb_fullwidth_portfolio_grid clearfix' ),
      $posts,
      esc_attr( $class ),
      ( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
      ( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
      ( '' !== $auto && in_array( $auto, array('on', 'off') ) ? esc_attr( $auto ) : 'off' ),
      ( '' !== $auto_speed && is_numeric( $auto_speed ) ? esc_attr( $auto_speed ) : '7000' ),
      ( '' !== $title ? sprintf( '<h2>%s</h2>', esc_html( $title ) ) : '' )
    );

    return $output;
  }
}

new CHILD_ET_Builder_Module_HGF_Channel_Carousel();
    // add_shortcode( 'et_pb_hgf_channel_carousel', array($cgm, '_shortcode_callback') );


// function et_divi_get_hgf_videos( $args = array() ) {
//   $default_args = array(
//     'post_type' => 'hgf_video',
//   );
//   $args = wp_parse_args( $args, $default_args );
//   return new WP_Query( $args );
// }
