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

        <h1 class="ttl ttl-style1">キーワード：<?php the_search_query(); ?></h1>

        <h2 class="ttl ttl-style2"><?php echo $wp_query->found_posts; ?>件の検索結果</h2></h2>

        <!--====== List start ======-->
        <div class="linknav list list-line">
          <ul class="clearfix">

            <?php
            if ( have_posts() ):
              while ( have_posts() ):
                the_post(); ?>

                <!--== List Box start ==-->
                <li>
                  <a class="icn-arw" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <p><?php the_excerpt(); ?></p>
                  </a>
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
        <!--====== //List end ======-->

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
