<?php get_header('internas'); ?>    
    <div id="interna-portfolio">
        <section id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <?php 
                            the_content();
                        ?>
                    </div>
                    <div id="side-bar" class="col-sm-4">
                        <?php if(get_field('depoimento')){ ?>
                            <h3>
                                Depoimento do cliente
                            </h3>
                            <?php the_field('depoimento'); ?>
                        <?php }?>
                        <br>
                        <hr>
                        <br>
                        <div id="container-bt" class="col-sm-12 text-center">
                            <?php if(get_field('endereco_do_site')){ ?>
                                <a class="button-more" href="<?php the_field('endereco_do_site'); ?>" target="_blank">
                                    VISITAR O SITE
                                </a>
                            <?php }?>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <h3>Serviços prestados</h3>
                        </div>
                        <div class="row">
                            <?php 
                                foreach (get_field('servicos_prestados') as $key => $value) {
                                    //print("<pre>".print_r($value, true)."</pre>");
                                    switch($value){
                                        case'sites': ?>
                                            <div class="col-3 text-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/sites-icon.png" >
                                                <br>
                                                SITE
                                            </div>
                                        <?php break;

                                        case's-e-o': ?>
                                            <div class="col-3 text-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/seo-icon.png" >
                                                <br>
                                                S.E.O
                                            </div>
                                        <?php break;

                                        case'emm': ?>
                                            <div class="col-3 text-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/emm-icon.png" >
                                                <br>
                                                EMAIL MKT
                                            </div>
                                        <?php break;

                                        case'producao-digital': ?>
                                            <div class="col-3 text-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/code.png" >
                                                <br>
                                                PRODUÇÃO DIGITAL
                                            </div>
                                        <?php break;
                                    }
                                }
                            ?>
                        </div>
                        <br>
                        <hr>
                        <br>                    
                        <h3>Blog do projeto</h3>
                        <?php
                            global $post;
                            $args = array(
                                'category_name' => get_field('categoria'),
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                            );
                            $the_query = new WP_Query($args);
                            //print("<pre>".print_r($the_query->posts,true)."</pre>");
                            if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                            <div class="list-group">
                                <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php the_title();?></h5>
                                        <medium>
                                            <span class="badge badge-warning">
                                                <?php echo get_the_date('d/m/yy');?>									
                                            </span>
                                        </medium>
                                    </div>
                                    <small class="sidebar-post-content"> 
                                        <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                                    </small>
                                </a>
                            </div>
                            <?php }}
                            wp_reset_postdata();
                        ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section id="proj-infos">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php if(get_field('depoimento')){ ?>
                            <h3>
                                Depoimento do cliente
                            </h3>
                            <?php the_field('depoimento'); ?>
                        <?php }?>
                        <br><br>
                    </div>   

                    <div id="serv-prest" class="col-md-6">
                        <h3>
                            Serviços Prestados
                        </h3>

                        <div class="row">
                        <?php 
                            foreach (get_field('servicos_prestados') as $key => $value) {
                                //print("<pre>".print_r($value, true)."</pre>");
                                switch($value){
                                    case'SITE': ?>
                                        <div class="col-3 text-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/sites-icon.png" >
                                            <br>
                                            SITE
                                        </div>
                                    <?php break;

                                    case'S.E.O': ?>
                                        <div class="col-3 text-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/seo-icon.png" >
                                            <br>
                                            S.E.O
                                        </div>
                                    <?php break;

                                    case'EMM': ?>
                                        <div class="col-3 text-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/emm-icon.png" >
                                            <br>
                                            EMAIL MKT
                                        </div>
                                    <?php break;

                                    case'PROD. DIGITAL': ?>
                                        <div class="col-3 text-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/code.png" >
                                            <br>
                                            PRODUÇÃO DIGITAL
                                        </div>
                                    <?php break;
                                }
                            }
                        ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section> -->

        <!-- <section id="proj-blog">
            <div class="container">
                    <div id="blog-projeto" class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2>Blog do projeto</h2><br>
                            </div>
                            <?php
                                global $post;
                                $args = array(
                                    'category_name' => get_field('categoria'),
                                    'post_status' => 'publish',
                                    'posts_per_page' => 3,
                                );
                                $the_query = new WP_Query($args);
                            ?>
                            <?php if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                                <div class="col-sm-4">
                                    <div class="col-12">
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                    
                                    <div class="col-12 text-center">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt=""/><br>
                                    </div>

                                    <-- <div class="col-12 text-justify">
                                        <p>
                                            <?php echo wp_trim_words( get_the_content(), 80, '...' ); ?>
                                        </p>
                                    </div> --
                                    <div class="col-12">
                                        <a 
                                            class="button-more link" 
                                            href="<?php the_permalink();?>" 
                                            aria-label="Vá para a página <?php the_title()?>"
                                        >
                                            MAIS
                                        </a>
                                    </div>
                                </div>
                            <?php }}
                                wp_reset_postdata();   
                                                
                            ?>
                        </div>
                        <br><br><br><br>
                        <div class="row">
                            <div class="col-12 text-center">
                                <?php 
                                     $category = get_category_by_slug(get_field('categoria'));    
                                     $catName = $category->name;
                                     $link = get_category_link(get_cat_ID($catName));                                
                                ?>
                                <a 
                                    href="<?php echo $link; ?>" 
                                    class="button-more"
                                >
                                        VER TODOS OS POSTS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section> -->

        
    </div>
<?php get_footer(); ?>