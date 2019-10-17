<?php global $themesmoon_options; ?>
<div id="sidebar" class="col-sm-3 <?php if(isset( $themesmoon_options['sticky-control'] )){ if($themesmoon_options['sticky-control']){ echo 'stickys'; } } ?>" role="complementary">
    <aside class="widget-area">
        <?php 
          if ( is_active_sidebar( 'sidebar' ) ) {
            dynamic_sidebar('sidebar');
          }
         ?>
    </aside>
</div> <!-- #sidebar -->
