<?php get_header(); ?>

<?php get_template_part('partials/sidebar') ?>

<?php $args = array(
   'post_type' => 'work',
   'posts_per_page' => 0,
);

$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
   <div class="list">
   <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php get_template_part('partials/work') ?>
   <?php endwhile; ?>
   </div>
   <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer(); ?>
