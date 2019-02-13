<?php
/*
  template name: 404
*/
?>
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

        <!--========== Entry Body start ==========-->
        <article class="entry-body">

          <h1>404</h1>
          <h2>指定されたページが見つかりません。</h2>
          <p>
            ・URL、ファイル名にタイプミスがないかご確認ください。<br>
            ・指定されたページは削除されたか、移動した可能性があります。
          </p>

        </article>
        <!--========= //Entry Body end =========-->

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
