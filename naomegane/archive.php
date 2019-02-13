<?php get_header(); ?>

<!--================= Content start ==================-->
<div id="content">

  <!--============== Content Top start ==============-->
  <? get_template_part('parts/content-top'); ?>
  <!--============== //Content Top end ==============-->

  <!--============== Content Main start ==============-->
  <div id="content-main">
    <div class="inner clearfix">

      <!--============ Main start ============-->
      <div id="main">

        <h1 class="ttl ttl-style1">Blog</h1>

        <?php if ( is_category() ): ?>
          <h2 class="ttl ttl-style2"><?php single_category_title(); ?></h2>
        <?php endif ?>

        <!--====== Blog List start ======-->
        <div class="blog-list list list-dl">
          <ul class="clearfix">

            <?php
            if ( have_posts() ):
              while ( have_posts() ):
                the_post(); ?>

                <!--== List Box start ==-->
                <li>
                  <dl>
                    <dt>
                      <time class="blog-date"><?php the_time('Y.m.d'); ?></time>
                      <?php
                      $terms = get_the_terms( $post->ID, 'blog_cat' );
                      foreach ( $terms as $term ) {
                        $term_url = $term->slug;
                        $term_name = $term->name;
                      }
                      ?>
                      <a class="tag tag-blog" href="/blog/<?php echo $term_url; ?>"><?php echo $term_name; ?></a>
                    </dt>
                    <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                  </dl>
                </li>
                <!--== //List Box end ==-->

              <?php
              endwhile;
            endif; ?>

            <!--===== Pagination start =====-->
            <div class="pagination">
              <div class="clearfix">
                <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
              </div>
            </div>
            <!--===== //Pagination end =====-->

          </ul>


        </div>
        <!--====== //Blog List end ======-->

      </div>
      <!--============ //Main end ============-->

      <!--============ Side start ============-->
      <div id="side">
        <?php get_sidebar(); ?>
      </div>
      <!--============ //Side end ============-->

    </div>
  </div>
  <!--============== //Content Main end ==============-->

</div>
<!--================= //Content end ==================-->

<?php get_footer(); ?>
