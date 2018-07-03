<?php  get_header(); ?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4"><?php the_title(); ?>
          </h1>
          <!-- Blog Post -->
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" class="card mb-4">
            <?php if(has_post_thumbnail(  )): ?>
                  <img class="card-img-top" src="<?php the_post_thumbnail_url('full');?>" alt="Card image cap">
              <?php endif; ?>
            <div class="card-body">
              <h2 class="card-title"><?php the_title();?></h2>
              <p class="card-text"><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink();?>" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php the_date(); ?> by
              <a href="" title=""><?php the_author() ?></a>
            </div>
          </div>
          <?php endwhile; ?>
          <?php else : ?>
                  <?php _e( 'Sorry, Nothing Found', 'Startbootstrap' ); ?>
          <?php endif; ?>
          <!-- Pagination -->
         <?php Startbootstrap_pagination(); ?>
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
