<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

if ( ! function_exists( 'theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function theme_setup() {
        /*
           * Let WordPress manage the document title.
           * By adding theme support, we declare that this theme does not use a
           * hard-coded <title> tag in the document head, and expect WordPress to
           * provide it for us.
           */
        add_theme_support( 'title-tag' );

        /*
           * Enable support for Post Thumbnails on posts and pages.
           *
           * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
           */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'theme' ),
            'menu-2' => esc_html__( 'Secondary', 'theme' ),
            'menu-3' => esc_html__( 'Pages', 'theme' ),
        ) );

        /*
           * Switch default core markup for search form, comment form, and comments
           * to output valid HTML5.
           */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'About', 'theme' ),
        'id'            => 'col-1',
        'description'   => esc_html__( 'Add widgets here.', 'theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Category navigation', 'theme' ),
        'id'            => 'col-2',
        'description'   => esc_html__( 'Add widgets here.', 'theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Additional navigation', 'theme' ),
        'id'            => 'col-3',
        'description'   => esc_html__( 'Add widgets here.', 'theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Social links', 'theme' ),
        'id'            => 'col-4',
        'description'   => esc_html__( 'Add widgets here.', 'theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
    // Styles
    //wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
    wp_enqueue_style( 'theme-main-style', get_template_directory_uri() . '/assets/dist/main.css' );
    wp_enqueue_style( 'theme-custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
    wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/style.css' );
    // Scripts
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Clear WP HEAD
 */
require get_template_directory() . '/include/clear-wp-head.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

/**
 * Create custom post types.
 */
require get_template_directory() . '/include/custom-post-type.php';

function true_load_posts(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $q = new WP_Query($args);
    if( $q->have_posts() ):
        while($q->have_posts()): $q->the_post();
            ?>
          <article class="article offset" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <?php $categories = get_the_category();
              if($categories[0]){
                  echo '<a href="' . get_category_link($categories[0]->term_id ) . '" class="category-link">'. $categories[0]->name . '</a>';
              } ?>
            <div class="news-article">
              <h2><a href="<?php echo get_permalink();?>" class="headline-link"><?php the_title(); ?></a></h2>
              <div class="top-holder flex content-between">
                <p class="author">By <span><?php echo get_the_author(); ?></span></p>
                <p class="post-date"><?php the_time('F j, Y'); ?></p>
              </div>
                <?php if(get_the_post_thumbnail_url()){ ?>
                  <div class="news-article__image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
                  </div>
                <?php } ?>
              <div class="inner-block">
                <p class="excerpt"><?php $exs = get_the_excerpt(); print $exs;?></p>
                <a href="<?php echo get_permalink();?>" class="more">read more</a>
              </div>
            </div>
          </article>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

/****************************************************/

add_action( 'wp_ajax_load_search_results', 'load_search_results' );
add_action( 'wp_ajax_nopriv_load_search_results', 'load_search_results' );

function load_search_results() {
    $query = $_POST['s'];

    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $args['s']=$query;
    $search = new WP_Query( $args );

    ob_start();

    if ( $search->have_posts() ) :
         while ( $search->have_posts() ) : $search->the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'search' ); ?>

    <?php endwhile;

    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;

    $content = ob_get_clean();

    echo $content;
    die();
}

/****************************************************/

add_filter('register_post_type_args', function($args, $post_type) {
    if (!is_admin() && $post_type == 'page') {
        $args['exclude_from_search'] = true;
    }
    return $args;
}, 10, 2);

/**
 * Testimonial Shortcode
 * */