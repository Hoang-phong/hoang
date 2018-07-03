
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="<?php echo get_site_url(); ?>" id="searchform" method="get"> 
              <div class="input-group" id="search">
                <input type="text" class="form-control"  onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '')  {this.value = 'Search';}" id="s" name="s" value="Search" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" id="s" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" type="button">Go!</button>
                </span>
              </div>
              </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">

                    <?php {
                      $categories =  get_categories();
                      foreach  ($categories as $category) {
                        echo '<li><a href="' . get_category_link($category) . '">'. $category->cat_name .'</a></li>';
                      }
                  } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              <ul>
                <?php
                  register_sidebar( $sidebar );
                  if ( is_active_sidebar('main-sidebar') ) {
                          dynamic_sidebar( 'main-sidebar' );
                  } else {
                          _e('You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!', 'Start Bootstrap');
                  }
              ?>
              </ul>
            </div>
          </div>
