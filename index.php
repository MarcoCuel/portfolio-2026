<?php get_header() ?>

<header class="header">
   <div class="header__icon">
      <canvas></canvas>
   </div>
   <div class="header__title">
      <h1>specifics.design</h1>
   </div>
</header>

<?php if (have_posts()) : ?>
   <?php while (have_posts()) : the_post() ?>
      <?php the_content() ?>
   <?php endwhile ?>
<?php endif ?>

<?php get_footer() ?>

