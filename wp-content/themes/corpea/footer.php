<?php global $themesmoon_options;?>    

    <!--START BOTTOM AREA-->
    <?php if(is_active_sidebar('bottom')){ ?>
    <div class="bottom_area">

      <div class="container">
        <div class="row">
          <?php dynamic_sidebar('bottom'); ?>
          
        
        </div>
      </div>
    </div>
    <?php } ?>
    <!--END BOTTOM AREA-->
    <!--START FOOTER AREA-->
     <?php if($themesmoon_options['copyright-en']){ ?>   
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-12 wow fadeInLeft">
      <?php if(isset($themesmoon_options['copyright-text'])){ ?> 
            <div class="footer_copright">
              <p><?php echo balanceTags($themesmoon_options['copyright-text']); ?></p>
            </div>
 <?php } ?> 
          </div>
         <!--  <div class="col-md-6 col-12 wow fadeInRight">
           <div class="footer_copright text-right">
             <p>Design & Development By Subra Systems Ltd</p>
           </div>
         </div> -->
        </div>
      </div>
    </footer> 
  <?php } ?> 

    <!--END FOOTER AREA-->
     <!--SCROLL TOP-->
    <a id="scroll_top" class="back-to-top page-scroll" href="#main" style="display: inline;"><i class="fas fa-arrow-up"></i></a> 
    <!--SCROLL TOP--> 
<?php wp_footer(); ?>

</div>
</body>
</html>
