<div class="author-user-profile media">
    <div class="pull-left author-user-avater">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
    </div>
    <div class="media-body">
    <div class="author-user-heading">

        <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
            <h3><span><?php esc_html_e('Written By','corpea');?></span> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></h3>
        <?php } else { ?>
            <h3> <span><?php esc_html_e('Written By','corpea');?></span> <?php the_author_posts_link() ?></h3>
        <?php }?>


        <?php if (the_author_meta('description')) { ?>
          <p><?php echo the_author_meta('description'); ?></p>
        <?php } ?>
    </div>
    <?php
        $facebookLink = get_the_author_meta('facebook');
        $twitterLink  = get_the_author_meta('twitter');
        $gplusLink = get_the_author_meta('gplus');
        $linkedinLink = get_the_author_meta('linkedin');
        $tumblrLink = get_the_author_meta('tumblr');
        $pinterestLink = get_the_author_meta('pinterest');
        $instagramLink = get_the_author_meta('instagram');
    ?>
    <?php if ( $facebookLink || $twitterLink || $gplusLink || $linkedinLink || $tumblrLink || $pinterestLink || $instagramLink ){ ?>
        <ul class="author-social-profile">
            <?php
                if ($facebookLink) {
                    echo "<li><a href='".esc_url($facebookLink)."'><i class='fab fa-facebook'></i></a></li>";
                }
                if ($twitterLink){
                    echo "<li><a href='".esc_url($twitterLink)."'><i class='fab fa-twitter'></i></a></li>";
                } 
                if ($gplusLink){
                    echo "<li><a href='".esc_url($gplusLink)."'><i class='fa fa-google-plus'></i></a></li>";
                }
                if ( $linkedinLink ){
                    echo "<li><a href='".esc_url($linkedinLink)."'><i class='fa fa-linkedin'></i></a></li>";
                }
                if ( $tumblrLink ){
                    echo "<li><a href='".esc_url($tumblrLink)."'><i class='fa fa-tumblr'></i></a></li>";
                } 
                if ( $pinterestLink ){
                    echo "<li><a href='".esc_url($pinterestLink)."'><i class='fa fa-pinterest'></i></a></li>";
                }   
                if ( $instagramLink ){
                    echo "<li><a href='".esc_url($instagramLink)."'><i class='fa fa-instagram'></i></a></li>";
                } 
            ?>
        </ul>                           
    <?php } ?>

    </div>
</div><!-- .user-profile -->