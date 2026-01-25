<div class="card">
   <?php
      $tag = get_field('tag');
      $color = get_field('color');
      if($tag) : ?>
      <div class="tag" <?php if($color) : ?>style="background-color: <?php echo $color ?>"<?php endif; ?>><?php echo $tag ?></div>
   <?php endif; ?>
   <h2><?php the_title(); ?></h2>
   <div class="card__info">
      <?php
      $link = get_field('link');
      if( $link ):
         $link_url = $link['url'];
         $link_title = $link['title'];
         $link_target = $link['target'] ? $link['target'] : '_self';
         ?>
         <a class="button button--outline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noreferrer noopener"><?php echo esc_html( $link_title ); ?> <?php if($link_target == "_blank") : ?><?php get_template_part('partials/icon/arrow') ?><?php else : ?><?php get_template_part('partials/icon/load') ?><?php endif; ?></a>
      <?php endif; ?>
      <span><?php the_field('year'); ?></span>
   </div>

   <?php $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>

   <div
      class="card__desktop"
      style="--thumb:url('<?php echo esc_url($thumb_url); ?>')"
   >
      <?php if ( get_field('video') ) : ?>
         <video
            poster="<?php echo esc_url($thumb_url); ?>"
            autoplay
            muted
            loop
            playsinline
            preload="none"
            isvisible="true"
         >
            <source
               src="<?php echo esc_url( get_field('video') ); ?>"
               type="video/mp4"
            >
         </video>
      <?php endif; ?>

      <?php echo get_the_post_thumbnail(); ?>
   </div>

   <div class="card__mobile">
      <?php
      $image = get_field('mobile');
      $size = 'full';

      if( $image ) {
         echo wp_get_attachment_image( $image, $size );
      } ?>
   </div>
</div>