<aside class="sidebar">
   <a href="<?php echo home_url() ?>" class="sidebar__start">
      <picture>
         <img src="<?php echo get_template_directory_uri() ?>/assets/image/head.png" alt="Marco Cuel">
      </picture>

      <h1>Marco Cuel</h1>
   </a>
   <footer class="sidebar__end">
      <div>
         <a href="#">Contact</a>
         <a href="#">Playground</a>
         <a href="#">LinkedIn</a>
         <a href="#">Github</a>
         <a href="#">CodePen</a>
         <a href="#">Awwwards</a>
      </div>
      <div>
         <span>© <?php echo date_i18n('Y', current_time('timestamp')); ?></span>
         <span><?php echo date_i18n('d M', current_time('timestamp')); ?></span>
         <span><?php echo date_i18n('h:i A', current_time('timestamp')); ?> (GMT -3)</span>
      </div>
   </footer>
</aside>