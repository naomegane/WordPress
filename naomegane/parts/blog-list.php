<!--== List Box start ==-->
<li>
  <dl>
    <dt>
      <time class="blog-date"><?php the_time('Y.m.d'); ?></time>
      <?php
      $terms = get_the_terms( $post->ID, 'blog_cat' );
      foreach ( $terms as $term ) {
        $term_slug = $term->slug;
        $term_name = $term->name;
      }
      ?>
      <a class="tag tag-blog tag-<?php echo $term_slug; ?>" href="/blog/<?php echo $term_slug; ?>"><?php echo $term_name; ?></a>
    </dt>
    <?php
    $link_url = get_post_meta( get_the_ID(), 'link_url', true );
    if ( $link_url ):
      $link_target = get_post_meta( get_the_ID(), 'link_target', true );
      if ( $link_target === '1' ){
        $link_target = ' target="_blank"';
      } ?>
      <dd><a href="<?php echo esc_url($link_url); ?>"<?php echo $link_target; ?>><?php the_title(); ?></a></dd>
    <?php else: ?>
      <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
    <?php endif; ?>
  </dl>
</li>
<!--== //List Box end ==-->
