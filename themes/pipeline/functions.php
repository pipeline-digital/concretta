<?php
    /*==================================*/
    /*FUNÇÕES PADRÃO - TODAS INSTALAÇÕES*/
    /*==================================*/
    /*==================================*/
    /*==================================*/
    /*==================================*/


     /*******************************************************/
    /************************ ASSETS ***********************/
    /*******************************************************/
    function pipe_add_scripts(){
        wp_enqueue_style('pipe_main_css',  get_stylesheet_directory_uri().'/css/main.css');
        wp_enqueue_script('pipe_main_js', get_stylesheet_directory_uri() . '/js/main.js', array(), false, true );
    }

    add_action( 'wp_enqueue_scripts', 'pipe_add_scripts' );


    /*******************************************************/
    /*********************** WIDGETS ***********************/
    /*******************************************************/

    if (function_exists('register_sidebar'))
    {
        register_sidebar(array(
            'name'			=> 'Sidebar',
            'before_widget'	=> '<div class="widget">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h3>',
            'after_title'	=> '</h3>',
        ));
    }

    function imagem_destacada() {
        $src = get_field('thumb', $post->ID);
        if($src){
            echo '<img src = '.$src.' />';
            }
        else {echo'';}
    }

    add_theme_support('post-thumbnails');


    /*******************************************************/
    /************************* MENUS ***********************/
    /*******************************************************/
    add_action('init', 'register_main_menu');

    function register_main_menu(){
        register_nav_menu('main-menu', 'Menu principal do header');
    }
    
    function get_custom_menu($id){
        $menuLocations = get_nav_menu_locations(); 
        $menuID = $menuLocations[$id]; 
        $primaryNav = wp_get_nav_menu_items($menuID); 
        $menu = array();
        foreach ($primaryNav as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['slug'] = $m->slug;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['children'] = array();
            }
        }
        return $menu;
    }

    /*******************************************************/
    /********************* PRINT THAT **********************/
    /*******************************************************/
    function print_var($var_to_print) {
        echo '<pre>';
        print_r ($var_to_print);
        echo '</pre>';
    }


    /**************************************************************************/
    /********************* LIMITE DE TENTATIVAS DE LOGIN **********************/
    /**************************************************************************/
    function check_attempted_login( $user, $username, $password ) {
        if ( get_transient( 'attempted_login' ) ) {
            $datas = get_transient( 'attempted_login' );
                if ( $datas['tried'] >= 3 ) {
                $until = get_option( '_transient_timeout_' . 'attempted_login' );
                $time = time_to_go( $until );
                return new WP_Error( 'too_many_tried', sprintf( __( '<strong>ERRO</strong>: o limite de tentativas de login foi atingido, tente novamente novamente em %1$s.' ) , $time ) );
            }
        }
        return $user;
    }
    add_filter( 'authenticate', 'check_attempted_login', 30, 3 ); 
    function login_failed( $username ) {
        if ( get_transient( 'attempted_login' ) ) {
            $datas = get_transient( 'attempted_login' );
            $datas['tried']++;
            
            if ( $datas['tried'] <= 3 )
            set_transient( 'attempted_login', $datas , 300 );
        } else {
            $datas = array( 'tried' => 1 );
            set_transient( 'attempted_login', $datas , 300 );
        }
    }
    add_action( 'wp_login_failed', 'login_failed', 10, 1 );
    
    function time_to_go($timestamp) {
        
        // convertendo o timestamp do mysql em php time
        $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
        );
        $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
        );
        $current_timestamp = time();
        $difference = abs($current_timestamp - $timestamp);
        for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
            $difference /= $lengths[$i];
        }
        $difference = round($difference);
        if (isset($difference)) {
            if ($difference != 1)
                $periods[$i] .= "s";
                $output = "$difference $periods[$i]";
            return $output;
        }
    }

    /*******************************************************/
    /********************* VERSAO WP ***********************/
    /*******************************************************/
    add_filter('the_generator', function(){
		return;
    }); //esconde a meta tag generator
    
    /*******************************************************/
    /************************* TITLE ***********************/
    /*******************************************************/
    add_theme_support( 'title-tag' );


    /*======================================*/
    /*======================================*/
    /*======================================*/
    /*======================================*/
    /*FUNÇÕES ESPECÍFICAS DE CADA INSTALAÇÃO*/
    /*======================================*/   


    /*******************************************************/
    /***************** POSTTYPE SERVIÇOS *******************/
    /*******************************************************/
    add_action('init', 'type_post_servicos');
    
    function type_post_servicos() { 
        $labels = array(
            'name' => _x('Serviços', 'post type general name'),
            'singular_name' => _x('Serviços', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Serviços'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,           
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            //'register_meta_box_cb' => 'servicos_meta_box',       
            'supports' => array('title','editor','thumbnail','comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks', 'page-attributes')
        );

        register_post_type( 'servicos' , $args );
        flush_rewrite_rules();
    } //feca post type serviços


    /*******************************************************/
    /***************** POSTTYPE PORTFOLIO ******************/
    /*******************************************************/

    add_action('init', 'type_post_portfolio');
    
    function type_post_portfolio() { 
        $labels = array(
            'name' => _x('Portfólio', 'post type general name'),
            'singular_name' => _x('Portfólio', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Portfólio'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,           
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            //'register_meta_box_cb' => 'servicos_meta_box',       
            'supports' => array('title','editor','thumbnail','comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
        );

        register_post_type( 'portfolio' , $args );
        flush_rewrite_rules();
    } //feca post type serviços




    /*******************************************************/
    /********************* HTML EMAIL **********************/
    /*******************************************************/
    function wpse27856_set_content_type(){
        return "text/html";
    }
    add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

    
    
?>