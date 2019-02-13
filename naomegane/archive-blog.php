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

                <? get_template_part('parts/blog-list'); ?>

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

            <?php wp_reset_postdata(); ?>

          </ul>


        </div>
        <!--====== //Blog List end ======-->

      </div>
      <!--============ //Main end ============-->

      <!--============ Side start ============-->
      <div id="side">
        <?php get_template_part( 'parts/side-blog' ); ?>
        <?php get_sidebar(); ?>
      </div>
      <!--============ //Side end ============-->

    </div>
  </div>
  <!--============== //Content Main end ==============-->

</div>
<!--================= //Content end ==================-->

<?php get_footer(); ?>
