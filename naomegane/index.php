<?php get_header(); ?>


<!--================= Content start ==================-->
<div id="content">

  <!--============== Content Main start ==============-->
  <div id="content-main">
    <div class="inner clearfix">

      <!--============ Main start ============-->
      <div id="main">

        <!--====== Section start ======-->
        <section class="section indexnav-section">

        </section>
        <!--====== //Section end ======-->


        <!--====== Section start ======-->
        <section class="section blog-section">

          <h2 class="ttl ttl-style7 txt-mincho float-left">Blog</h2>
          <p class="float-right"><a class="btn btn-outline-default icn-arw2" href="/blog/">一覧を見る</a></p>

          <!--====== Blog List start ======-->
          <div class="blog-list list list-dl">
            <ul class="clearfix">

              <?php
              $posts = get_posts( array(
                'posts_per_page'   => 10,
                'post_type'        => 'blog',
                'post_status'      => 'publish',
              ));
              if ( $posts ):
                foreach( $posts as $post ):
                  setup_postdata( $post ); ?>

                  <? get_template_part('parts/blog-list'); ?>

                <?php
                endforeach;
              endif;
              wp_reset_postdata(); ?>

            </ul>
          </div>
          <!--====== //Blog List end ======-->

        </section>
        <!--====== //Section end ======-->



        <!--====== Section start ======-->
        <section class="section blog-section">

          <h2 class="ttl ttl-style7 txt-mincho float-left">Information</h2>
          <p class="float-right"><a class="btn btn-outline-default icn-arw2" href="/info/">一覧を見る</a></p>

          <!--====== Blog List start ======-->
          <div class="blog-list list list-dl">
            <ul class="clearfix">

              <?php
              $posts = get_posts( array(
                'posts_per_page'   => 3,
                'post_type'        => 'info',
                'post_status'      => 'publish',
              ));
              if ( $posts ):
                foreach( $posts as $post ):
                  setup_postdata( $post ); ?>

                  <? get_template_part('parts/info-list'); ?>

                <?php
                endforeach;
              endif;
              wp_reset_postdata(); ?>

            </ul>
          </div>
          <!--====== //Blog List end ======-->

        </section>
        <!--====== //Section end ======-->
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
