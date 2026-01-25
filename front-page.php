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

<div class="contact__modal">
   <h5>Contact form</h5>
   <?php echo do_shortcode('[contact-form-7 id="1c34891" title="Contact form"]') ?>
</div>

<?php get_footer(); ?>
