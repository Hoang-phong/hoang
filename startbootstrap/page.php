<?php 
/**
 * Template Name: Page
 *
 */

get_header(); ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <!-- Title -->
          <h1 class="mt-4"><?php the_title(); ?></h1>

          <!-- Author -->
          <p class="lead">
           <?php printf(' by <a href="%1$s">%2$s</a>', get_author_posts_url( get_the_author_meta('ID') ), get_the_author() ); ?>
          </p>
          <hr>
          <!-- Date/Time -->
          <p>Posted on <?php the_date(); ?> at <?php the_time('g-i-a'); ?></p>
          <hr>
          <!-- Preview Image -->
           <?php if(has_post_thumbnail(  )): ?>
                  <img class="img-fluid rounded" src="<?php the_post_thumbnail_url('full');?>" alt="">
                <?php endif; ?>
          <hr>
          <p class="lead"><?php the_content(); ?></p>
          <hr>
          <!-- Comments Form -->
          <?php
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
           ?>
           <?php endwhile; ?>
          <?php else : ?>
                  <?php _e( 'Sorry, Nothing Found', 'Startbootstrap' ); ?>
          <?php endif; ?>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
           <?php get_sidebar(); ?>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php get_footer(); ?>