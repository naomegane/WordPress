<nav class="sidenav">
  <?php
  $args = array(
    'orderby'       => 'id',
    'order'         => 'ASC',
  );
  $terms = get_terms( 'blog_cat', $args ); ?>
  <ul class="clearfix">
    <?php
    foreach ( $terms as $term ) :?>
      <li class="icn-arw">
        <a href="/blog/<?php echo $term->slug; ?>">
          <?php echo $term->name; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
