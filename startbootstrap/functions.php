<?php
/**
  @ THEME_URL = get_stylesheet_directory() - Path to the theme folder
  **/
  define( 'THEME_URL', get_stylesheet_directory() );

  if ( !function_exists('hoangphong_them_setup')){
  	function hoangphong_theme_setup(){
  		/*
		* Insert RSS feed links in <head>
		*/
		add_theme_support( 'automatic-feed-links' );
		/*
		* Add thumbnail post function
		*/
		add_theme_support( 'post-thumbnails' );
		/*
		* Add title-tag để tự thêm <title>
		*/
		add_theme_support( 'title-tag' );
		/*
		* Add post format
		*/
		add_theme_support( 'post-formats',
		    array(
		       'image',
		       'video',
		       'gallery',
		       'quote',
		       'link'
		    )
		 );
		/*
		* Add custom background
		*/
		$default_background = array(
		   'default-color' => '#fff',
		);
		add_theme_support( 'custom-background', $default_background );
		/*
		* Create Menu
		*/
		register_nav_menu ( 'primary-menu', __('Primary Menu', 'Startbootstrap') );
		/*
		* Create sidebar
		*/
		$sidebar = array(
		   'name' => __('Main Sidebar', 'Startbootstrap'),
		   'id' => 'main-sidebar',
		   'description' => 'Main sidebar for Startbootstrap theme',
		   'class' => 'main-sidebar',
		   'before_title' => '<h3 class="widgettitle">',
		   'after_title' => '</h3>'
		);
		register_sidebar( $sidebar );

  	}
  	add_action( 'init', 'hoangphong_theme_setup');
  }

	/**
	@ Display Function Settings menu
	@ Startbootstrap_menu( $slug )
	**/
	if ( ! function_exists( 'Startbootstrap_menu' ) ) {
	  function Startbootstrap_menu( $menu ) {
	    $menu = array(
    	'theme_location' => $menu,
         'container' => 'ul',
         'menu_class' => 'navbar-nav ml-auto',
	         'menu_id' => 'primary-menu',
		    );
		    wp_nav_menu( $menu );
		  }
		}
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	/**
	@ add class for tag <li>
	**/
	function special_nav_class ($classes, $item) {

	    $classes[] = 'nav-item';

	    if (in_array('current-menu-item', $classes) ){

	        $classes[] = 'nav-item active';

	    }

	    return $classes;
	}
	/**
	@ Create paging function for index, archive.
	@ Startbootstrap_pagination()
	**/
	if ( ! function_exists( 'Startbootstrap_pagination' ) ) {
	  function Startbootstrap_pagination() {
	    /*
	     * Do not show pagination if the page has less than 2 pages
	     */
	    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
	      return '';
	    }
	  ?>
	   <ul class="pagination justify-content-center mb-4">
	    <?php if ( get_next_post_link() ) : ?>
	    	<li class="page-item">
              <span class="page-link">&larr;<?php previous_posts_link( __('Older', 'Startbootstrap') ); ?> </span>
            </li>
	    <?php endif; ?>
	    <?php if ( get_previous_post_link() ) : ?>
	    	<li class="page-item">
              <span class="page-link"> <?php next_posts_link( __('Newer', 'Startbootstrap') ); ?>&rarr;</span>
            </li>
	    <?php endif; ?>
	  </ul>
	  <?php
	  }
	}


	/**
	@ Insert CSS and Javascript in theme
	**/
	function Startbootstrap_styles() {
	  wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', 'all' );
	  wp_enqueue_style( 'bootstrap-style' );
	  //More css script
	  wp_register_style( 'more-style', get_template_directory_uri() . '/css/blog-home.css', 'all' );
	  wp_enqueue_style( 'more-style' );
	  //jquery script
	  wp_register_script('jquery-script', get_template_directory_uri() . "/vendor/jquery/jquery.min.js", array('jquery'));
	  wp_enqueue_script('jquery-script');
		 //bootstrap script
	  wp_register_script('bootstrap-script', get_template_directory_uri() . "/vendor/bootstrap/js/bootstrap.bundle.min.js", array('jquery'));
	  wp_enqueue_script('bootstrap-script');
	}
	add_action( 'wp_enqueue_scripts', 'Startbootstrap_styles' );


	//* Move JavaScript to the Footer

	function remove_head_scripts() { 
	   remove_action('wp_head', 'wp_print_scripts'); 
	   remove_action('wp_head', 'wp_print_head_scripts', 9); 
	   remove_action('wp_head', 'wp_enqueue_scripts', 1);

	   add_action('wp_footer', 'wp_print_scripts', 5);
	   add_action('wp_footer', 'wp_enqueue_scripts', 5);
	   add_action('wp_footer', 'wp_print_head_scripts', 5); 
	}
	add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

	/**
	@ change comment form
	**/
	function Startbootstrap_comment($comment, $args, $depth)    {
	    $GLOBALS['comment'] = $comment; ?>
	    <div class="media mb-4" id="<?=get_comment_ID();?>">
	                <?php echo get_avatar($comment, $size='50', ''); ?>
	             <!-- end comment autho vcard-->
		         <div class="media-body">
		         	<h5 class="mt-0"> <?php printf(__('<p class="fn">%s</p>'), get_comment_author_link()); ?></h5>
		        	 <!--end .comment-meta-->
		            <?php if($comment->comment_approved == '0') : ?>
		                <em><?php echo 'Your coment is waiting for moderation.';?></em>
		                <?php endif; ?>
		            	<?php comment_text(); ?>
		            <div class="tools_comment">
			            <?php comment_reply_link(array_merge($args,array('respond_id' => 'formcmmaxweb','depth' => $depth, 'max_depth'=> $args['max_depth'])));?>
	              		<?php edit_comment_link(__('Edit'),' ',''); ?>
	              		<?php printf(__('<a href="#comment-%d" class="date">- %s</a>'),get_comment_ID(),get_comment_date('d/m/Y'));?>
		            </div>
		        </div><!--end #commentBody-->
		</div>
	<?php }




