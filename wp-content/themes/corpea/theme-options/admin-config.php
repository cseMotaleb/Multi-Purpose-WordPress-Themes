<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css, $changed_values) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r($changed_values); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => esc_html__('Section via hook', 'redux-framework-demo'),
                'desc' => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(esc_html__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo esc_url(wp_customize_url()); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','corpea'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_html_e('Current theme preview','corpea'); ?>" />
                <?php endif; ?>

                <h4><?php echo esc_html($this->theme->display('Name')); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(esc_html__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(esc_html__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . esc_html__('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . esc_html__('This child theme requires its parent theme','corpea') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'corpea'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            // ACTUAL DECLARATION OF SECTIONS


            /**********************************
            ********* Header Setting ***********
            ***********************************/
            $this->sections[] = array(
                'title'     => esc_html__('Header', 'Home Setting'),
                'icon'      => 'el-icon-bookmark',
                'icon_class' => 'el-icon-large',
                'fields'    => array(

                

                    array(
                        'id'       => 'header-layout',
                        'type'     => 'select',
                        'title'    => esc_html__('Select Layout', 'corpea'), 
                        'subtitle' => esc_html__('Select BoxWidth of FullWidth', 'corpea'),
                        'options'  => array(
                            'header1' => 'Header 1',
                            'header2' => 'Header 2'
                        ),
                        'default'  => 'header1',
                    ),

                    array(
                        'id'        => 'header_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Header Background Color', 'corpea'),
                        'subtitle'  => esc_html__('Header background color Defalt(#fff )', 'corpea'),
                        'default'   => '#fff',
                        'validate'  => 'color',
                    ),

                    array(
                        'id'        => 'header_text_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Header Text Color', 'corpea'),
                        'subtitle'  => esc_html__('Header Text color Defalt(#b9b9b9 )', 'corpea'),
                        'default'   => '#b9b9b9',
                        'validate'  => 'color',
                    ),                    

                    array(
                        'id'        => 'header_text_hover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Header Hover Color', 'corpea'),
                        'subtitle'  => esc_html__('Header hover color', 'corpea'),
                        'default'   => '',
                        'validate'  => 'color',
                    ), 

                    array(
                        'id'        => 'header_border_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Header Border Color', 'corpea'),
                        'subtitle'  => esc_html__('Header border color', 'corpea'),
                        'default'   => '#e9eaed',
                        'validate'  => 'color',
                    ), 

                    array(
                        'id'=>'header-banner',
                        'url'=> false,
                        'type' => 'media', 
                        'title' => esc_html__('Header Ads', 'corpea'),
                        'subtitle' => esc_html__('Upload your Header Ads.', 'corpea'),
                    ),

                    array(
                        'id'        => 'header-banner-link',
                        'type'      => 'text',
                        'title'     => esc_html__('Header Ads Link', 'corpea'),
                        'subtitle' => esc_html__('Header Ads Link', 'corpea'),
                        'default'   => '',
                    ),  

                   array( 
                        'id'        => 'header_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('.corpea-topbar,.header2 .corpea-topbar'),
                        'title'     => esc_html__('Header Padding','corpea-core'),
                        'subtitle'  => esc_html__('Header Padding Top &amp; Bottom', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '', 
                            'padding-bottom'  => '', 
                            'units'          => 'px', 
                        ),
                    ), 

                    array(
                        'id'        => 'Top-Header-address',
                        'type'      => 'text',
                        'title'     => esc_html__('Top Header Address Text', 'corpea'),
                        'subtitle'  => esc_html__('Add Top Header Text', 'corpea'),
                        'default'   => esc_html__('121 Park Drive, Nework, USA', 'corpea'),
                        'required'  => array('top-header-en', "=", 1),
                    ),

                    array(
                        'id'        => 'Top-Header-address',
                        'type'      => 'text',
                        'title'     => esc_html__('Top Header Address Text', 'corpea'),
                        'subtitle'  => esc_html__('Add Top Header Text', 'corpea'),
                        'default'   => esc_html__('121 Park Drive, Nework, USA', 'corpea'),
                        'required'  => array('top-header-en', "=", 1),
                    ),
                    array(
                        'id'        => 'top-header-email',
                        'type'      => 'text',
                        'title'     => esc_html__('Top Header Email Address', 'corpea'),
                        'subtitle'  => esc_html__('Add Top Header Email Address', 'corpea'),
                        'validate' => 'email',
                        'msg'      => 'custom error message',
                        'default'   => esc_html__('corpea@gmail.com', 'corpea'),
                        'required'  => array('top-header-en', "=", 1),
                    ),
                    array(
                        'id'        => 'top-header-number',
                        'type'      => 'text',
                        'title'     => esc_html__('Top Header Phone Number', 'corpea'),
                        'subtitle'  => esc_html__('Top Header Phone Number', 'corpea'),
                        'default'   => esc_html__('+62-556-759010', 'corpea'),
                        'required'  => array('top-header-en', "=", 1),
                    ),

                    array( 
                        'id'        => 'top-header-bg-color', 
                        'type'      => 'color',
                        'title'     => esc_html__('Top Header Background Color','corpea'),
                        'subtitle'  => esc_html__('Top Header background Color (Default: #484848)', 'corpea'),
                        'default'   => '#484848',
                    ),
                     array( 
                        'id'        => 'top-header-text-color', 
                        'type'      => 'color',
                        'desc'      => 'Header Top Text Color',
                        'title'     => esc_html__('Top Header Text Color','corpea'),
                        'subtitle'  => esc_html__('Top Header Text Color (Default: #fff)', 'corpea'),
                        'default'   => '#fff',
                    ),
                    array( 
                        'id'        => 'top_header_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('.bottom-wrap'),
                        'title'     => esc_html__('Top Header Padding','corpea-core'),
                        'subtitle'  => esc_html__('Top Header Padding Top &amp; Bottom', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '45', 
                            'padding-bottom'  => '45', 
                            'units'          => 'px', 
                        ),
                    ),

                    array( 
                        'id'        => 'top_header_margin', 
                        'type'      => 'spacing',
                        'mode'      => 'margin',
                        'units'     => array('em', 'px'),
                        'output'    => array('.bottom-wrap'),
                        'title'     => esc_html__('Top Header Margin Top','corpea-core'),
                        'subtitle'  => esc_html__('Top Header Margin top', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'bottom'     => false,
                        'default'            => array(
                            'margin-top'     => '-40px', 
                            'units'          => 'px', 
                        ),
                    ),

                    array(
                        'id'        => 'top-header-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Top Header', 'corpea'),
                        'subtitle'  => esc_html__('Enable Top Header Text', 'corpea'),
                        'default'   => true,
                    ),
                   

                    array( 
                        'id'        => 'top-header-text-hover-color', 
                        'type'      => 'color',
                        'desc'      => 'Header Top Text Hover Color',
                        'title'     => esc_html__('Header Top Text Hover Color','corpea'),
                        'subtitle'  => esc_html__('Header Top Text Hover Color (Default: #555)', 'corpea'),
                        'default'   => '#555',
                    ),                                                         

                )
            );
   

            /**********************************
            ********* Menu Setting ************
            ***********************************/
            $this->sections[] = array(
                'title'     => esc_html__('Menu Settings', 'Home Setting'),
                'icon'      => 'el-align-justify',
                'icon_class' => 'el-icon-large',
                'fields'    => array(

                    array(
                        'id'        => 'menu_bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Menu Background Color', 'corpea'),
                        'subtitle'  => esc_html__('Menu background color Defalt(#fff )', 'corpea'),
                        'default'   => '#fff',
                        'validate'  => 'color',
                        'transparent'   =>false,
                    ), 

                    array(
                        'id'        => 'menu_font_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Menu Text Color', 'corpea'),
                        'subtitle'  => esc_html__('Menu Text color Defalt(#000 )', 'corpea'),
                        'default'   => '#000',
                        'validate'  => 'color',
                    ),


                    array(
                        'id'        => 'menu-hover-color',
                        'type'      => 'color',
                        'title'     => esc_html__('Menu Hover Color', 'corpea'),
                        'subtitle'  => esc_html__('Menu hover color', 'corpea'),
                        'default'   => '#dd3333',
                        'validate'  => 'color',
                        'transparent'   =>false,
                    ), 
                    array(
                        'id'        => 'submenu_bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Sub Menu Background Color', 'corpea'),
                        'subtitle'  => esc_html__('Sub menu background color Defalt(#e9eaed)', 'corpea'),
                        'default'   => '#e9eaed',
                        'validate'  => 'color',
                        'transparent'   =>false,
                    ), 
                    array(
                        'id'        => 'submenu_font_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Sub Menu Text Color', 'corpea'),
                        'subtitle'  => esc_html__('Sub menu Text color Defalt(#000 )', 'corpea'),
                        'default'   => '#000',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'submenu_hover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Sub Menu Hover Color', 'corpea'),
                        'subtitle'  => esc_html__('Sub menu hover color', 'corpea'),
                        'default'   => '#fff',
                        'validate'  => 'color',
                        'transparent'   =>false,
                    ),  
                    array(
                        'id'        => 'submenu_hover_bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Sub Menu Hover Background Color', 'corpea'),
                        'subtitle'  => esc_html__('Sub menu hover background color Defalt(#dd3333)', 'corpea'),
                        'default'   => '#dd3333',
                        'validate'  => 'color',
                        'transparent'   =>false,
                    ), 
                    array(
                        'id'        => 'submenu_border_bottom',
                        'type'      => 'color',
                        'title'     => esc_html__('Submenu Border Bottom', 'corpea'),
                        'subtitle'  => esc_html__('Submenu border bottom', 'corpea'),
                        'default'   => '#d5d5d5',
                        'validate'  => 'color',
                    ),                    
                    array( 
                        'id'        => 'menu_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('.site-header'),
                        'title'     => esc_html__('Menu Padding','corpea-core'),
                        'subtitle'  => esc_html__('Menu Padding Top &amp; Bottom', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '0', 
                            'padding-bottom'  => '0', 
                            'units'          => 'px', 
                        ),
                    ),                                                                                                                                                    
                )
            );
                

                    

            /**********************************
            ********* Logo & Favicon ***********
            ***********************************/

            $this->sections[] = array(
                'title'     => esc_html__('All Logo & favicon', 'corpea'),
                'icon'      => 'el-icon-leaf',
                'icon_class' => 'el-icon-large',
                'fields'    => array(

                    array( 
                        'id'        => 'favicon', 
                        'type'      => 'media',
                        'desc'      => 'upload favicon image',
                        'title'      => esc_html__('Favicon','corpea'),
                        'subtitle' => esc_html__('Upload favicon image', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/favicon.ico' ), 
                    ),                                        

                    array(
                        'id'=>'logo',
                        'url'=> false,
                        'type' => 'media', 
                        'title' => esc_html__('Logo', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/logo.png' ),
                        'subtitle' => esc_html__('Upload your custom site logo.', 'corpea'),
                    ),

                    array(
                        'id'        => 'logo-width',
                        'type'      => 'text',
                        'title'     => esc_html__('Logo Widtht', 'corpea'),
                        'subtitle' => esc_html__('Logo width', 'corpea'),
                        'default'   => '',
                    ), 

                    array(
                        'id'        => 'logo-height',
                        'type'      => 'text',
                        'title'     => esc_html__('Logo Height', 'corpea'),
                        'subtitle' => esc_html__('Logo height', 'corpea'),
                        'default'   => '',
                    ),

                    array(
                        'id'        => 'logo-text-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Text Type Logo', 'corpea'),
                        'subtitle' => esc_html__('Enable or disable text type logo', 'corpea'),
                        'default'   => false,
                    ),

                    array(
                        'id'        => 'logo-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Logo Text', 'corpea'),
                        'subtitle' => esc_html__('Use your Custom logo text Ex. corpea', 'corpea'),
                        'default'   => 'Corpea',
                        'required'  => array('logo-text-en', "=", 1),
                    ), 

                    array(
                        'id'=>'registration-logo',
                        'url'=> false,
                        'type' => 'media', 
                        'title' => esc_html__('Registration Page Logo', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/registration-logo.png' ),
                        'subtitle' => esc_html__('Upload your Registration page logo.', 'corpea'),
                    ),                    

                    array( 
                        'id'        => 'errorpage', 
                        'type'      => 'media',
                        'desc'      => 'upload 404 Page Logo',
                        'title'      => esc_html__('404 Page Logo','corpea'),
                        'subtitle' => esc_html__('Upload 404 Page Logo', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/404.png' ), 
                    ),   
                    
                    array( 
                        'id'        => 'comingsoon-logo', 
                        'type'      => 'media',
                        'desc'      => 'Upload Coming Soon Page Logo',
                        'title'      => esc_html__('Coming Soon Page Logo','corpea'),
                        'subtitle' => esc_html__('Upload Coming Soon Page Logo', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/coming-soon-logo.png' ), 
                    ),

                    array( 
                        'id'        => 'comingsoon', 
                        'type'      => 'media',
                        'desc'      => 'Upload Coming Soon Page Background',
                        'title'      => esc_html__('Coming Soon Page Background','corpea'),
                        'subtitle' => esc_html__('Upload Coming Soon Page Background', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/coming-soon-bg.png' ), 
                    ),

                    
                )
            );

            /**********************************
            **** Default Banner  *****
            ***********************************/
            $this->sections[] = array(
                'title'     => esc_html__('Sub Title', 'corpea'),
                'icon'      => 'sub-banner-icon',
                'icon_class' => 'el-icon-compass',
                'fields'    => array(

                    array( 
                        'id'        => 'blog-banner', 
                        'type'      => 'media',
                        'desc'      => 'Upload Blog Banner image',
                        'title'      => esc_html__('Blog Banner','corpea'),
                        'subtitle' => esc_html__('Upload Blog Banner image', 'corpea'),
                        'default' => array( 'url' => get_template_directory_uri() .'/images/blog-banner.jpg' ),
                    ),  

                    array( 
                        'id'        => 'blog-subtitle-bg-color', 
                        'type'      => 'color',
                        'desc'      => 'Blog Subtitle BG Color',
                        'title'     => esc_html__('Background Color','corpea'),
                        'subtitle'  => esc_html__('Blog Subtitle BG Color', 'corpea'),
                        'default'   => '#F24E26',
                        'transparent'   =>false,
                    ),

                    array( 
                        'id'        => 'subtitle-text-color', 
                        'type'      => 'color',
                        'desc'      => 'Subtitle Text Color',
                        'title'     => esc_html__('Subtitle Color','corpea'),
                        'subtitle'  => esc_html__('Subtitle Text Color (Default: #fff)', 'corpea'),
                        'default'   => '#fff',
                    ),

                    array(
                        'id'        => 'breadcrumb-font-size',
                        'type'      => 'text',
                        'title'     => esc_html__('Breadcrumb Font Size', 'corpea'),
                        'subtitle' => esc_html__('Enter custom Font Size', 'corpea'),
                        'default'   => '16',
                    ), 

                    array( 
                        'id'        => 'breadcrumb-text-color', 
                        'type'      => 'color',
                        'desc'      => 'Subtitle Text Color',
                        'title'     => esc_html__('Breadcrumb Color','corpea'),
                        'subtitle'  => esc_html__('Breadcrumb Text Color (Default: #fff)', 'corpea'),
                        'default'   => '#fff',
                    ),
                    array( 
                        'id'        => 'subtitle_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('.sub-title'),
                        'title'     => esc_html__('Sub Title Padding','corpea-core'),
                        'subtitle'  => esc_html__('Sub Title Padding Top &amp; Bottom', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '70', 
                            'padding-bottom'  => '70', 
                            'units'          => 'px', 
                        ),
                    ), 

                    array(
                        'id'        => 'banner-margin-bottom',
                        'type'      => 'text',
                        'title'     => esc_html__('Banner Margin Bottom', 'corpea'),
                        'subtitle' => esc_html__('Enter custom Banner Margin Bottom', 'corpea'),
                        'default'   => '50',
                    ),


                )
            );
        

            /* *********************************
            **** Category Page Setting  *****
            ********************************** */
            $this->sections[] = array(
                'title'     => esc_html__('Category Page', 'corpea'),
                'icon'      => 'sub-banner-icon',
                'icon_class' => 'el-icon-filter',
                'fields'    => array(

                   

                    array(
                        'id'        => 'post-number',
                        'type'      => 'text',
                        'title'     => esc_html__('Number Of Post', 'corpea'),
                        'subtitle' => esc_html__('Number of Post Show on the Post Listing Page', 'corpea'),
                        'default'   => '3',
                    ), 
                    

                    array(
                        'id'       => 'style-select',
                        'type'     => 'select',
                        'title'    => esc_html__('Select Style', 'corpea'), 
                        'subtitle' => esc_html__('Select style of the Category Page.', 'corpea'),
                        'options'  => array(
                            'style1' => esc_html__('Style 1','corpea'),
                            'style2' => esc_html__('Style 2','corpea'),
                        ),
                        'default'  => 'style1',
                    ),

                )
            );



            /**********************************
            ********* Layout & Styling ***********
            ***********************************/

            $this->sections[] = array(
                'icon' => 'el-icon-brush',
                'icon_class' => 'el-icon-large',
                'title'     => esc_html__('Layout & Styling', 'corpea'),
                'fields'    => array(

                   array(
                        'id'       => 'boxfull-en',
                        'type'     => 'select',
                        'title'    => esc_html__('Select Layout', 'corpea'), 
                        'subtitle' => esc_html__('Select BoxWidth of FullWidth', 'corpea'),
                        // Must provide key => value pairs for select options
                        'options'  => array(
                            'boxwidth' => 'BoxWidth',
                            'fullwidth' => 'FullWidth'
                        ),
                        'default'  => 'fullwidth',
                    ), 
                   
                    array(
                        'id'        => 'box-background',
                        'type'      => 'background',
                        'output'    => array('body'),
                        'title'     => esc_html__('Body Background', 'corpea'),
                        'subtitle'  => esc_html__('You can set Background color or images or patterns for site body tag', 'corpea'),
                        'default'   => '#fff',
                        'transparent'   =>false,
                    ), 


                    array(
                        'id'        => 'preset',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => esc_html__('Preset Layout', 'corpea'),
                        'subtitle'  => esc_html__('select any preset', 'corpea'),
                        'options'   => array(
                            '1' => array('alt' => 'Preset 1',       'img' => ReduxFramework::$_url . 'assets/img/presets/preset1.png'),
                            '2' => array('alt' => 'Preset 2',       'img' => ReduxFramework::$_url . 'assets/img/presets/preset2.png'),
                            '3' => array('alt' => 'Preset 3',       'img' => ReduxFramework::$_url . 'assets/img/presets/preset3.png'),
                            '4' => array('alt' => 'Preset 4',       'img' => ReduxFramework::$_url . 'assets/img/presets/preset4.png'),
                            ),
                        'default'   => '1'
                    ),  
                    

                    array(
                        'id'        => 'custom-preset-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Select Custom Color', 'corpea'),
                        'subtitle' => esc_html__('You can use unlimited color', 'corpea'),
                        'default'   => true,
                        
                    ),

                     array(
                        'id'        => 'link-color',
                        'type'      => 'color',
                        'title'     => esc_html__('Link Color', 'corpea'),
                        'subtitle'  => esc_html__('Pick a link color (default: #ed1c24).', 'corpea'),
                        'default'   => '#ed1c24',
                        'validate'  => 'color',
                        'transparent'   =>false,
                        'required'  => array('custom-preset-en', "=", 1),
                    ),

                     array(
                        'id'        => 'hover-color',
                        'type'      => 'color',
                        'title'     => esc_html__('Hover Color', 'corpea'),
                        'subtitle'  => esc_html__('Pick a hover color (default: #C5181E).', 'corpea'),
                        'default'   => '#C5181E',
                        'validate'  => 'color',
                        'transparent'   =>false,
                        'required'  => array('custom-preset-en', "=", 1),
                    ), 

                    // array(
                    //     'id'        => 'header-bg',
                    //     'type'      => 'color',
                    //     'title'     => esc_html__('Header Background Color', 'corpea'),
                    //     'subtitle'  => esc_html__('Pick a background color for the header (default: #fff).', 'corpea'),
                    //     'default'   => '#fff',
                    //     'validate'  => 'color',
                    //     'transparent'   =>false,
                    // ), 

                    array(
                        'id'        => 'bottom-background',
                        'type'      => 'background',
                        'output'    => array('.bottom-wrap'),
                        'title'     => esc_html__('Bottom Background', 'corpea'),
                        'subtitle'  => esc_html__('You can set Background color or images or patterns for site Bottom Background', 'corpea'),
                        'default'   => '#ed1c24',
                        'transparent'   =>false,
                    ),                     

                )
            );

            /**********************************
            ********* Typography ***********
            ***********************************/

            $this->sections[] = array(
                'icon'      => 'el-icon-font',
                'icon_class' => 'el-icon-large',                
                'title'     => esc_html__('Typography', 'corpea'),
                'fields'    => array(

                    array(
                        'id'            => 'body-font',
                        'type'          => 'typography',
                        'title'         => esc_html__('Body Font', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        //'font-size'     => ture,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('body'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Body Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#333',
                            'font-weight'    => '400',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '14px'),
                    ), 

                    array(
                        'id'            => 'menu-font',
                        'type'          => 'typography',
                        'title'         => esc_html__('Menu Font', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => false,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('#main-menu .nav>li>a, #main-menu ul.sub-menu li > a'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Menu Font', 'corpea'),
                        'default'       => array(
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '14px'),
                    ),

                    array(
                        'id'            => 'headings-font_h1',
                        'type'          => 'typography',
                        'title'         => esc_html__('Headings Font h1', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('h1'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Headings Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '42px'),
                    ),                      

                    array(
                        'id'            => 'headings-font_h2',
                        'type'          => 'typography',
                        'title'         => esc_html__('Headings Font h2', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('h2'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Headings Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '36px'),
                    ),                      

                    array(
                        'id'            => 'headings-font_h3',
                        'type'          => 'typography',
                        'title'         => esc_html__('Headings Font h3', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('h3'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Headings Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '24px'),
                    ),                     

                    array(
                        'id'            => 'headings-font_h4',
                        'type'          => 'typography',
                        'title'         => esc_html__('Headings Font h4', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('h4'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Headings Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '20px'),
                    ),                      

                    array(
                        'id'            => 'headings-font_h5',
                        'type'          => 'typography',
                        'title'         => esc_html__('Headings Font h5', 'corpea'),
                        'compiler'      => false,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'   => false,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => true, // Only appears if google is true and subsets not set to false
                        'font-size'     => true,
                        // 'text-align'    => false,
                        'line-height'   => false,
                        'word-spacing'  => false,  // Defaults to false
                        'letter-spacing'=> false,  // Defaults to false
                        'color'         => true,
                        'preview'       => true, // Disable the previewer
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        =>array('h5'),
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Select your website Headings Font', 'corpea'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-weight'    => '700',
                            'font-family'   => 'Montserrat',
                            'google'        => true,
                            'font-size'     => '18px'),
                    ),    

                )
            );



            /**********************************
            ********* Coming Soon  ***********
            ***********************************/

            $this->sections[] = array(
                'icon'      => 'el-icon-time',
                'icon_class' => 'el-icon-large',                  
                'title'     => esc_html__('Coming Soon', 'corpea'),
                'fields'    => array(

                    array(
                        'id'        => 'comingsoon-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Coming Soon', 'corpea'),
                        'subtitle'  => esc_html__('Enable or disable coming soon mode', 'corpea'),
                        'default'   => false,
                    ),

                    array(
                        'id'        => 'comingsoon-date',
                        'type'      => 'date',
                        'title'     => esc_html__('Coming Soon date', 'corpea'),
                        'subtitle' => esc_html__('Coming Soon Date', 'corpea'),
                        'default'   => esc_html__('04/30/2019', 'corpea')
                        
                    ),

                    array(
                        'id'        => 'comingsoon-title',
                        'type'      => 'text',
                        'title'     => esc_html__('Title', 'corpea'),
                        'subtitle' => esc_html__('Coming Soon Title', 'corpea'),
                        'default'   => esc_html__("We are working to bring the new site live soon! </br>Please don't forget to subscribe to our newsletter to be notified!", 'corpea')
                    ),

        


                )
            );


            /**********************************
            ********* Blog  ***********
            ***********************************/

            $this->sections[] = array(
                'icon'      => 'el-icon-edit',
                'icon_class' => 'el-icon-large',                  
                'title'     => esc_html__('Blog', 'corpea'),
                'fields'    => array(
                    array(
                        'id'        => 'sticky-control',
                        'type'      => 'switch',
                        'title'     => esc_html__('Sticky Sidebar for blog', 'corpea'),
                        'subtitle' => esc_html__('Enable or disable Sticky Sidebar for blog', 'corpea'),
                        'default'   => true,
                    ), 

                    array(
                        'id'        => 'blog-social',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Single Page Social Share', 'corpea'),
                        'subtitle'  => esc_html__('Enable or disable blog social share for single page', 'corpea'),
                        'default'   => true,
                    ),                     

                    array(
                        'id'        => 'blog-view',
                        'type'      => 'switch',
                        'title'     => esc_html__('Post View Count', 'corpea'),
                        'subtitle'  => esc_html__('Enable or disable Post View Count', 'corpea'),
                        'default'   => true,
                    ),                 

                    array(
                        'id'        => 'blog-author',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Author', 'corpea'),
                        'subtitle'  => esc_html__('Enable Blog Author ex. Admin', 'corpea'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'blog-date',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Date', 'corpea'),
                        'subtitle'  => esc_html__('Enable Blog Date ', 'corpea'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'blog-category',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Category', 'corpea'),
                        'subtitle'  => esc_html__('Enable or disable blog category', 'corpea'),
                        'default'   => true,
                    ),                     

                    array(
                        'id'        => 'blog-comment',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Comment', 'corpea'),
                        'subtitle'  => esc_html__('Enable or disable blog Comment', 'corpea'),
                        'default'   => true,
                    ), 


                    array(
                        'id'        => 'blog-tag',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Tag', 'corpea'),
                        'subtitle'  => esc_html__('Enable Blog Tag ', 'corpea'),
                        'default'   => true,
                    ),  

                    array(
                        'id'        => 'blog-single-comment-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Single Post Comment', 'corpea'),
                        'subtitle'  => esc_html__('Enable Single post comment ', 'corpea'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'post-nav-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Post navigation', 'corpea'),
                        'subtitle'  => esc_html__('Enable Post navigation ', 'corpea'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'blog-continue-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Blog Readmore', 'corpea'),
                        'subtitle'  => esc_html__('Enable Blog Readmore', 'corpea'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'blog-continue',
                        'type'      => 'text',
                        'title'     => esc_html__('Continue Reading', 'corpea'),
                        'subtitle' => esc_html__('Continue Reading', 'corpea'),
                        'default'   => esc_html__('Continue Reading', 'corpea'),
                        'required'  => array('blog-continue-en', "=", 1),
                    ),  

                )
            );

            /**********************************
            ********* Social Media Link ***********
            ***********************************/

            $this->sections[] = array(
                'icon'      => 'el-icon-asterisk',
                'icon_class' => 'el-icon-large', 
                'title'     => esc_html__('Social Media', 'corpea'),
                'fields'    => array(
                 

                    array(
                       'id' => 'social-media-user',
                       'type' => 'section',
                       'title' => __('Social Media Username(For Share Content)', 'corpea'),
                       'indent' => false 
                    ),

                    array(
                        'id'        => 'twitter-username',
                        'type'      => 'text',
                        'title'     => esc_html__('Twitter Username', 'corpea'),
                    ),

                    array(
                        'id'        => 'linkedin-username',
                        'type'      => 'text',
                        'title'     => esc_html__('Linkedin Username', 'corpea'),
                    ),

                    array(
                       'id' => 'social-media-url',
                       'type' => 'section',
                       'title' => __('Social Media URL', 'corpea'),
                       'indent' => false 
                    ),

                    array(
                        'id'        => 'wp-facebook',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Facebook URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-twitter',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Twitter URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-google-plus',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Google Plus URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-pinterest',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Pinterest URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-youtube',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Youtube URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-linkedin',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Linkedin URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-dribbble',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Dribbble URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-behance',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Behance URL', 'corpea'),
                    ), 
                    array(
                        'id'        => 'wp-flickr',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Flickr URL', 'corpea'),
                    ), 
                    array(
                        'id'        => 'wp-vk',
                        'type'      => 'text',
                        'title'     => esc_html__('Add vk URL', 'corpea'),
                    ),  
                    array(
                        'id'        => 'wp-skype',
                        'type'      => 'text',
                        'title'     => esc_html__('Add skype URL', 'corpea'),
                    ),
                    array(
                        'id'        => 'wp-instagram',
                        'type'      => 'text',
                        'title'     => esc_html__('Add Instagram URL', 'corpea'),
                    ),

                )
            );

            

            /* *********************************
            ************** Footer **************
            ********************************** */

            $this->sections[] = array(
                'icon'      => 'el-icon-bookmark',
                'icon_class' => 'el-icon-large', 
                'title'     => esc_html__('Footer', 'corpea'),
                'fields'    => array(
                 
                    array( 
                        'id'        => 'top-footer-text-color', 
                        'type'      => 'color',
                        'desc'      => 'Footer Top Text Color',
                        'title'     => esc_html__('Footer Top Text Color','corpea'),
                        'subtitle'  => esc_html__('Footer Top Text Color (Default: #fff)', 'corpea'),
                        'default'   => '#fff',
                    ),

                    array( 
                        'id'        => 'top-footer-text-hover-color', 
                        'type'      => 'color',
                        'desc'      => 'Footer Top Text Hover Color',
                        'title'     => esc_html__('Footer Top Text Hover Color','corpea'),
                        'subtitle'  => esc_html__('Footer Top Text Hover Color (Default: #555)', 'corpea'),
                        'default'   => '#555',
                    ),

                    array( 
                        'id'        => 'top_footer_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('.bottom-wrap'),
                        'title'     => esc_html__('Footer Padding','corpea-core'),
                        'subtitle'  => esc_html__('Footer Padding Top &amp; Bottom', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '45', 
                            'padding-bottom'  => '45', 
                            'units'          => 'px', 
                        ),
                    ),

                    array( 
                        'id'        => 'top_footer_margin', 
                        'type'      => 'spacing',
                        'mode'      => 'margin',
                        'units'     => array('em', 'px'),
                        'output'    => array('.bottom-wrap'),
                        'title'     => esc_html__('Footer Margin Top','corpea-core'),
                        'subtitle'  => esc_html__('Footer Margin top', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'bottom'     => false,
                        'default'            => array(
                            'margin-top'     => '-40px', 
                            'units'          => 'px', 
                        ),
                    ),

                    array(
                        'id'        => 'copyright-en',
                        'type'      => 'switch',
                        'title'     => esc_html__('Copyright', 'corpea'),
                        'subtitle'  => esc_html__('Enable Copyright Text', 'corpea'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'copyright-text',
                        'type'      => 'editor',
                        'title'     => esc_html__('Copyright Text', 'corpea'),
                        'subtitle'  => esc_html__('Add Copyright Text', 'corpea'),
                        'default'   => esc_html__('© 2019 Your Company. All Rights Reserved. Designed By Themesmoon', 'corpea'),
                        'required'  => array('copyright-en', "=", 1),
                    ), 
                    array( 
                        'id'        => 'copyright-bg-color', 
                        'type'      => 'color',
                        'title'     => esc_html__('Copyright Background Color','corpea'),
                        'subtitle'  => esc_html__('Copyright background Color (Default: #484848)', 'corpea'),
                        'default'   => '#484848',
                    ),

                    array( 
                        'id'        => 'copyright-text-color', 
                        'type'      => 'color',
                        'title'     => esc_html__('Copyright Text Color','corpea'),
                        'subtitle'  => esc_html__('Copyright text color (Default: #fff)', 'corpea'),
                        'default'   => '#fff',
                    ), 

                    array( 
                        'id'        => 'copyright-link-color', 
                        'type'      => 'color',
                        'title'     => esc_html__('Copyright Link Color','corpea'),
                        'subtitle'  => esc_html__('Copyright link color (Default: #ed1c24)', 'corpea'),
                        'default'   => '#ed1c24',
                    ), 

                    array( 
                        'id'        => 'copyright-hover-color', 
                        'type'      => 'color',
                        'title'     => esc_html__('Copyright Hover Color','corpea'),
                        'subtitle'  => esc_html__('Copyright hover color (Default: #c5181e)', 'corpea'),
                        'default'   => '#c5181e',
                    ), 

                    array( 
                        'id'        => 'copyright_padding', 
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('em', 'px'),
                        'output'    => array('#footer'),
                        'title'     => esc_html__('Copyright Area Padding','corpea-core'),
                        'subtitle'  => esc_html__('Copyright area padding', 'corpea-core'),
                        'left'      => false,
                        'right'     => false,
                        'default'            => array(
                            'padding-top'     => '30', 
                            'padding-bottom'  => '30', 
                            'units'          => 'px', 
                        ),
                    ),                     
                )
            );


            /**********************************
            *********** Custom CSS  ***********
            ***********************************/
            $this->sections[] = array(
                'title'     => esc_html__('Custom CSS', 'corpea'),
                'icon'      => 'sub-banner-icon',
                'icon_class' => 'el-icon-css',
                'fields'    => array(

                    array(
                        'id'       => 'css_editor',
                        'type'     => 'ace_editor',
                        'title'    => __('CSS Code', 'corpea'),
                        'subtitle' => __('Add your CSS code here.', 'corpea'),
                        'mode'     => 'css',
                        'theme'    => 'monokai',
                        'desc'     => 'Add your Custom CSS here.',
                        'default'  => ""
                    )

                )
            );

            /**********************************
            *********** Custom JS Code  *******
            ***********************************/
            $this->sections[] = array(
                'title'     => esc_html__('Custom JS', 'corpea'),
                'icon'      => 'sub-banner-icon',
                'icon_class' => 'el-icon-certificate',
                'fields'    => array(

                    array(
                        'id'       => 'js_editor',
                        'type'     => 'ace_editor',
                        'title'    => __('JS Code', 'corpea'),
                        'subtitle' => __('Add your JS code here.', 'corpea'),
                        'mode'     => 'css',
                        'theme'    => 'monokai',
                        'desc'     => 'Add your Custom JS here.',
                        'default'  => ""
                    )

                )
            );

            /**********************************
            ********* Import / Export ***********
            ***********************************/

            $this->sections[] = array(
                'title'     => esc_html__('Import / Export', 'corpea'),
                'desc'      => esc_html__('Import and Export your Theme Options settings from file, text or URL.', 'corpea'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => esc_html__('Import Export','corpea'),
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            ); 

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => esc_html__('Theme Information 1', 'redux-framework-demo'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => esc_html__('Theme Information 2', 'redux-framework-demo'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'themesmoon_options',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => esc_html__('Theme Options', 'corpea'),
                'page_title'        => esc_html__('Theme Options', 'corpea'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );
         }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}

/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
