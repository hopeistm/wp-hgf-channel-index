<?php

    class CHILD_ET_Builder_Module_HGF_Channel_Index extends ET_Builder_Module {
      function init() {
        $this->name = esc_html__( 'HGF Channel Index', 'et_builder' );
        $this->slug = 'et_pb_hgf_channel_index';

        $this->whitelisted_fields = array(
          'fullwidth',
          'posts_number',
          'include_categories',
          'show_title',
          'show_categories',
          'show_pagination',
          'background_layout',
          'admin_label',
          'module_id',
          'module_class',
          'hover_icon',
          'zoom_icon_color',
          'hover_overlay_color',
        );

        $this->fields_defaults = array(
          'fullwidth'         => array( 'on' ),
          'posts_number'      => array( 200, 'add_default_setting' ),
          'show_title'        => array( 'off' ),
          'show_categories'   => array( 'on' ),
          'show_pagination'   => array( 'on' ),
          'background_layout' => array( 'light' ),
        );

        $this->main_css_element = '%%order_class%%.et_pb_filterable_portfolio';
        $this->advanced_options = array(
          'fonts' => array(
            'title'   => array(
              'label'    => esc_html__( 'Title', 'et_builder' ),
              'css'      => array(
                'main' => "{$this->main_css_element} h2",
                'important' => 'all',
              ),
            ),
            'caption' => array(
              'label'    => esc_html__( 'Meta', 'et_builder' ),
              'css'      => array(
                'main' => "{$this->main_css_element} .post-meta, {$this->main_css_element} .post-meta a",
              ),
            ),
            'filter' => array(
              'label'    => esc_html__( 'Filter', 'et_builder' ),
              'css'      => array(
                'main' => "{$this->main_css_element} .et_pb_portfolio_filter",
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
          'portfolio_filters' => array(
            'label'    => esc_html__( 'Portfolio Filters', 'et_builder' ),
            'selector' => '.et_pb_filterable_portfolio .et_pb_portfolio_filters',
          ),
          'active_portfolio_filter' => array(
            'label'    => esc_html__( 'Active Portfolio Filter', 'et_builder' ),
            'selector' => '.et_pb_filterable_portfolio .et_pb_portfolio_filters li a.active',
          ),
          'portfolio_image' => array(
            'label'    => esc_html__( 'Portfolio Image', 'et_builder' ),
            'selector' => '.et_portfolio_image',
          ),
          'overlay' => array(
            'label'    => esc_html__( 'Overlay', 'et_builder' ),
            'selector' => '.et_overlay',
          ),
          'overlay_icon' => array(
            'label'    => esc_html__( 'Overlay Icon', 'et_builder' ),
            'selector' => '.et_overlay:before',
          ),
          'portfolio_title' => array(
            'label'    => esc_html__( 'Portfolio Title', 'et_builder' ),
            'selector' => '.et_pb_portfolio_item h2',
          ),
          'portfolio_post_meta' => array(
            'label'    => esc_html__( 'Portfolio Post Meta', 'et_builder' ),
            'selector' => '.et_pb_portfolio_item .post-meta',
          ),
          'portfolio_pagination' => array(
            'label'    => esc_html__( 'Portfolio Pagination', 'et_builder' ),
            'selector' => '.et_pb_portofolio_pagination',
          ),
          'portfolio_pagination_active' => array(
            'label'    => esc_html__( 'Pagination Active Page', 'et_builder' ),
            'selector' => '.et_pb_portofolio_pagination a.active',
          ),
        );
      }

      function get_fields() {
        $fields = array(
          'fullwidth' => array(
            'label'           => esc_html__( 'Layout', 'et_builder' ),
            'type'            => 'select',
            'option_category' => 'layout',
            'options'         => array(
              'on'  => esc_html__( 'Fullwidth', 'et_builder' ),
              'off' => esc_html__( 'Grid', 'et_builder' ),
            ),
            'description'        => esc_html__( 'Choose your desired portfolio layout style.', 'et_builder' ),
          ),
          'posts_number' => array(
            'label'             => esc_html__( 'Posts Number', 'et_builder' ),
            'type'              => 'text',
            'option_category'   => 'configuration',
            'description'       => esc_html__( 'Define the number of videos that should be displayed per page.', 'et_builder' ),
          ),
          'include_categories' => array(
            'label'           => esc_html__( 'Include Categories', 'et_builder' ),
            'renderer'        => 'et_builder_include_categories_option',
            'option_category' => 'basic_option',
            'description'     => esc_html__( 'Select the categories that you would like to include in the feed.', 'et_builder' ),
          ),
          'show_title' => array(
            'label'             => esc_html__( 'Show Title', 'et_builder' ),
            'type'              => 'yes_no_button',
            'option_category'   => 'configuration',
            'options'           => array(
              'on'  => esc_html__( 'Yes', 'et_builder' ),
              'off' => esc_html__( 'No', 'et_builder' ),
            ),
            'description'        => esc_html__( 'Turn project titles on or off.', 'et_builder' ),
          ),
          'show_categories' => array(
            'label'             => esc_html__( 'Show Categories', 'et_builder' ),
            'type'              => 'yes_no_button',
            'option_category'   => 'configuration',
            'options'           => array(
              'on'  => esc_html__( 'Yes', 'et_builder' ),
              'off' => esc_html__( 'No', 'et_builder' ),
            ),
            'description'        => esc_html__( 'Turn the category links on or off.', 'et_builder' ),
          ),
          'show_pagination' => array(
            'label'             => esc_html__( 'Show Pagination', 'et_builder' ),
            'type'              => 'yes_no_button',
            'option_category'   => 'configuration',
            'options'           => array(
              'on'  => esc_html__( 'Yes', 'et_builder' ),
              'off' => esc_html__( 'No', 'et_builder' ),
            ),
            'description'        => esc_html__( 'Enable or disable pagination for this feed.', 'et_builder' ),
          ),
          'background_layout' => array(
            'label'           => esc_html__( 'Text Color', 'et_builder' ),
            'type'            => 'select',
            'option_category' => 'color_option',
            'options' => array(
              'light'  => esc_html__( 'Dark', 'et_builder' ),
              'dark' => esc_html__( 'Light', 'et_builder' ),
            ),
            'description'        => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
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
        $module_id          = $this->shortcode_atts['module_id'];
        $module_class       = $this->shortcode_atts['module_class'];
        $fullwidth          = $this->shortcode_atts['fullwidth'];
        $posts_number       = $this->shortcode_atts['posts_number'];
        $include_categories = $this->shortcode_atts['include_categories'];
        $show_title         = $this->shortcode_atts['show_title'];
        $show_categories    = $this->shortcode_atts['show_categories'];
        $show_pagination    = $this->shortcode_atts['show_pagination'];
        $background_layout  = $this->shortcode_atts['background_layout'];
        $hover_icon          = $this->shortcode_atts['hover_icon'];
        $zoom_icon_color     = $this->shortcode_atts['zoom_icon_color'];
        $hover_overlay_color = $this->shortcode_atts['hover_overlay_color'];

        $module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

        wp_enqueue_script( 'hashchange' );

        $args = array();

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

        if( 'on' === $show_pagination ) {
          $args['nopaging'] = true;
        } else {
          $args['posts_per_page'] = (int) $posts_number;
        }

        if ( '' !== $include_categories ) {
          $args['tax_query'] = array(
            array(
              'taxonomy' => 'project_category',
              'field' => 'id',
              'terms' => explode( ',', $include_categories ),
              'operator' => 'IN'
            )
          );
        }

        $videos = et_divi_get_hgf_videos( $args );

        $categories_included = array();
        ob_start();
        if( $videos->post_count > 0 ) {
          while ( $videos->have_posts() ) {
            $videos->the_post();

            $category_classes = array();
            $categories = get_the_terms( get_the_ID(), 'project_category' );
            if ( $categories ) {
              foreach ( $categories as $category ) {
                $category_classes[] = 'project_category_' . urldecode( $category->slug );
                $categories_included[] = $category->term_id;
              }
            }

            $category_classes = implode( ' ', $category_classes );

            $main_post_class = sprintf(
              'et_pb_portfolio_item%1$s %2$s',
              ( 'on' !== $fullwidth ? ' hgf-channel-grid-item' : '' ),
              $category_classes
            );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $main_post_class ); ?>>
  <?php
            $thumb = '';

            $width = 'on' === $fullwidth ?  1080 : 400;
            $width = (int) apply_filters( 'et_pb_portfolio_image_width', $width );

            $height = 'on' === $fullwidth ?  9999 : 284;
            $height = (int) apply_filters( 'et_pb_portfolio_image_height', $height );
            $classtext = 'on' === $fullwidth ? 'et_pb_post_main_image' : '';
            $titletext = get_the_title();
            $thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
            $thumb = $thumbnail["thumb"];

    // set a default featured image
    if ( '' == $thumb ) :
      $thumb = 'http://hopeglobalforums.org/wp-content/uploads/2015/09/hgf-logo-e1462571037600.jpg'
    ?>
    <?php endif; ?>
      <a href="<?php esc_url( the_permalink() ); ?>">
    <?php if ( 'on' !== $fullwidth ) : ?>
    <span class="et_portfolio_image">
      <?php endif; ?>
      <?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
      <?php if ( 'on' !== $fullwidth ) :

            $data_icon = '' !== $hover_icon
              ? sprintf(
              ' data-icon="%1$s"',
              esc_attr( et_pb_process_font_icon( $hover_icon ) )
            )
              : '';

            printf( '<span class="et_overlay%1$s"%2$s><div class="hgf-video-thumbnail-title">%3$s<hr></div></span>', ( '' !== $hover_icon ? ' et_pb_inline_icon' : '' ), $data_icon, $titletext);
            ?>
    </span>
  </a>
  <?php
            endif;
  ?>

  <?php if ( 'on' === $show_title ) : ?>
  <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
  <?php endif; ?>

  <?php if ( 'on' === $show_categories ) : ?>
  <p class="post-meta">
    <?php echo get_post_meta(get_the_ID(), Title, true); ?>
    <br>
    <?php echo get_post_meta(get_the_ID(), Company, true); ?>
  </p>
  <?php endif; ?>

</div>
<!-- .et_pb_portfolio_item -->
<?php
          }
        }

        wp_reset_postdata();

        $posts = ob_get_clean();

        $categories_included = explode ( ',', $include_categories );
        $terms_args = array(
          'include' => $categories_included,
          'orderby' => 'name',
          'order' => 'ASC',
        );
        $terms = get_terms( 'project_category', $terms_args );

        $category_filters = '<ul class="clearfix">';
        $category_filters .= sprintf( '<li class="et_pb_portfolio_filter et_pb_portfolio_filter_all"><a href="#" class="active" data-category-slug="all">%1$s</a></li>',
                                     esc_html__( 'All', 'et_builder' )
                                    );
        foreach ( $terms as $term  ) {
          $category_filters .= sprintf( '<li class="et_pb_portfolio_filter"><a href="#" data-category-slug="%1$s">%2$s</a></li>',
                                       esc_attr( urldecode( $term->slug ) ),
                                       esc_html( $term->name )
                                      );
        }
        $category_filters .= '</ul>';

        $class = " et_pb_module et_pb_bg_layout_{$background_layout}";

        // $output = sprintf(
        //   '<div%5$s class="et_pb_filterable_portfolio %1$s%4$s%6$s" data-posts-number="%7$d"%10$s>
        // <div class="et_pb_portfolio_filters clearfix">%2$s</div><!-- .et_pb_portfolio_filters -->
        $output = sprintf(
          '<div%5$s class="et_pb_filterable_portfolio %1$s%4$s%6$s" data-posts-number="%7$d"%10$s>

        <div class="et_pb_portfolio_items_wrapper %8$s">
          <div class="et_pb_portfolio_items">%3$s</div><!-- .et_pb_portfolio_items -->
        </div>
        %9$s
      </div> <!-- .et_pb_filterable_portfolio -->',
          ( 'on' === $fullwidth ? 'et_pb_filterable_portfolio_fullwidth' : 'et_pb_filterable_portfolio_grid clearfix' ),
          $category_filters,
          $posts,
          esc_attr( $class ),
          ( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
          ( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
          esc_attr( $posts_number),
          ('on' === $show_pagination ? '' : 'no_pagination' ),
          ('on' === $show_pagination ? '<div class="et_pb_portofolio_pagination"></div>' : '' ),
          is_rtl() ? ' data-rtl="true"' : ''
        );

        return $output;
      }
    }

    new CHILD_ET_Builder_Module_HGF_Channel_Index();
    // add_shortcode( 'et_pb_hgf_channel_index', array($cgm, '_shortcode_callback') );


function et_divi_get_hgf_videos( $args = array() ) {
  $default_args = array(
    'post_type' => 'hgf_video',
  );
  $args = wp_parse_args( $args, $default_args );
  return new WP_Query( $args );
}
