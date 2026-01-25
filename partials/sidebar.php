<aside class="sidebar">
   <a href="<?php echo home_url() ?>" class="sidebar__start">
      <picture>
         <img src="<?php echo get_template_directory_uri() ?>/assets/image/head.png" alt="Marco Cuel">
      </picture>

      <h1><?php echo get_bloginfo('title') ?></h1>

      <div class="tag"><span></span> Available for Work</div>
   </a>

   <div class="sidebar__text">
      <?php if (have_posts()) : ?>
         <?php while (have_posts()) : the_post() ?>
            <?php the_content() ?>
         <?php endwhile ?>
      <?php endif ?>
   </div>

   <footer class="sidebar__end">
      <div>
         <a href="mailto:hi@marcocuel.com">Email</a>
         <a href="https://www.linkedin.com/in/marcocuel/" target="_blank" rel="noreferrer noopener">LinkedIn</a>
         <a href="https://github.com/MarcoCuel" target="_blank" rel="noreferrer noopener">GitHub</a>
         <a href="https://codepen.io/MarcoCuel" target="_blank" rel="noreferrer noopener">CodePen</a>
         <a href="https://www.awwwards.com/marcocuel/" target="_blank" rel="noreferrer noopener">Awwwards</a>
      </div>
      <div>
         <span>© <?php echo date_i18n('Y', current_time('timestamp')); ?></span>
         <span id="time"><?php echo date_i18n('h:i A', current_time('timestamp')); ?> (GMT -3)</span>
      </div>
   </footer>
</aside>