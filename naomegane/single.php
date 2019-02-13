<?php get_header(); ?>

<!--================= Content start ==================-->
<div id="content">

  <!--============== Content Top start ==============-->
  <?php get_template_part('parts/content-top'); ?>
  <!--============== //Content Top end ==============-->

  <!--============== Content Main start ==============-->
  <div id="content-main">
    <div class="inner clearfix">

      <!--============ Main start ============-->
      <div id="main">

        <?php
        if ( have_posts() ):
          while ( have_posts() ):
            the_post(); ?>

        <!--========== Entry Body start ==========-->
        <article class="entry-body">
          <h1>Blog</h1>

            <?php the_content(); ?>

            <?php
            endwhile;
          endif; ?>

        </article>
        <!--========= //Entry Body end =========-->
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
