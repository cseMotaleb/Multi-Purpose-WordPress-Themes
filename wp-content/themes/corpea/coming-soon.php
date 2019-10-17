<?php 
/*
 * Template Name: Coming Soon
 */
get_header('alternative'); ?>

<?php
    global $themesmoon_options;
    $comingsoon_date = '';
    if (isset($themesmoon_options['comingsoon-date'])) {
        $comingsoon_date = esc_attr($themesmoon_options['comingsoon-date']);
    }
?>

<div class="comingsoon" style="background-image: url(<?php echo esc_url($themesmoon_options['comingsoon']['url']); ?>);">
   
    <div class="container">

    <div class="comingsoon-content col-md-8 col-md-offset-2">

        <script type="text/javascript">
        jQuery(function($) {
            $('#comingsoon-countdown').countdown("<?php echo str_replace('-', '/', $comingsoon_date); ?>", function(event) {
                $(this).html(event.strftime('<div class="countdown-section"><span class="countdown-amount first-item countdown-days">%-D </span><span class="countdown-period">%!D:<?php echo esc_html__("DAY", "newedge"); ?>,<?php echo esc_html__("DAYS", "newedge"); ?>;</span></div><div class="countdown-section"><span class="countdown-amount countdown-hours">%-H </span><span class="countdown-period">%!H:<?php echo esc_html__("HOUR", "newedge"); ?>,<?php echo esc_html__("HOURS", "newedge"); ?>;</span></div><div class="countdown-section"><span class="countdown-amount countdown-minutes">%-M </span><span class="countdown-period">%!M:<?php echo esc_html__("MINUTE", "newedge"); ?>,<?php echo esc_html__("MINUTES", "newedge"); ?>;</span></div><div class="countdown-section"><span class="countdown-amount countdown-seconds">%-S </span><span class="countdown-period">%!S:<?php echo esc_html__("SECOND", "newedge"); ?>,<?php echo esc_html__("SECONDS", "newedge"); ?>;</span></div>'));
            });
        });
        </script>

        <?php if(isset($themesmoon_options['comingsoon-logo']['url'])): ?>
            <div class="logo-top">
                <img src="<?php echo esc_url($themesmoon_options['comingsoon-logo']['url']); ?>" alt="404 error">
            </div>
        <?php endif; ?>

        <div id="comingsoon-countdown"></div>

        <h2 class="page-header"><?php if (isset($themesmoon_options['comingsoon-title'])) echo $themesmoon_options['comingsoon-title']; ?></h2>

    
        <div class="social-share">
            <ul>
                <?php if ( isset($themesmoon_options['wp-facebook']) && $themesmoon_options['wp-facebook'] ) { ?>
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>   
                <?php if ( isset($themesmoon_options['wp-twitter']) && $themesmoon_options['wp-twitter'] ) { ?>
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>    
                <?php if ( isset($themesmoon_options['wp-google-plus']) && $themesmoon_options['wp-google-plus'] ) { ?>
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-google-plus']); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-pinterest']) && $themesmoon_options['wp-pinterest'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-youtube']) && $themesmoon_options['wp-youtube'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-youtube']); ?>"><i class="fa fa-youtube"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-linkedin']) && $themesmoon_options['wp-linkedin'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-dribbble']) && $themesmoon_options['wp-dribbble'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-behance']) && $themesmoon_options['wp-behance'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-behance']); ?>"><i class="fa fa-behance"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-flickr']) && $themesmoon_options['wp-flickr'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-flickr']); ?>"><i class="fa fa-flickr"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-vk']) && $themesmoon_options['wp-vk'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-vk']); ?>"><i class="fa fa-vk"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-skype']) && $themesmoon_options['wp-skype'] ) { ?>  
                <li><a target="_blank" href="skype:#<?php echo esc_url($themesmoon_options['wp-skype']); ?>?chat"><i class="fa fa-skype"></i></a></li>
                <?php } ?>
                <?php if ( isset($themesmoon_options['wp-instagram']) && $themesmoon_options['wp-instagram'] ) { ?>  
                <li><a target="_blank" href="<?php echo esc_url($themesmoon_options['wp-instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
            </ul>
        </div>
        
        
    </div>
</div>
</div>


<?php get_footer('alternative');