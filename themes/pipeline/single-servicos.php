<?php get_header('internas'); ?>
    <section id="interna-servicos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
        global $post;
        $post_slug = $post->post_name;
        $args = array(
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'servicos_prestados',
                    'value'   => $post_slug,
                    'compare' => 'LIKE'
                )
            )
        );
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {
    ?>
        <section id="portfolio" aria-label="Portfolio da empresa">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="font-weight-light text-center">
                            Portfólio deste serviço
                        </h2>  
                    </div>
                    <br>
                    <?php while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 infos" aria-label="<?php the_title()?>">
                            <h3><?php the_title(); ?></h3>
                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" /><br>
                            <a class="button-more" href="<?php the_permalink();?>" aria-label="Vá para a página <?php the_title()?>">MAIS</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } wp_reset_postdata(); ?>

    
    <section id="outros-servicos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <p class="text-center">
                        OUTROE SERVIÇOS
                        <hr>
                    </p>
                   
                <ul class="nav justify-content-center">
                    <?php
                        $post_id = get_the_ID();
                        $args = array(
                            'post_type' => 'servicos',
                            'post__not_in' => array($post_id), 
                        );
                        $the_query = new WP_Query($args);
                        if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                            <li class="nav-item">
                                <a class="nav-link text-center" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?> <br> <br>
                                    <?php the_post_thumbnail(); ?> 
                                    
                                </a>
                            </li>
                        <?php }}
                        wp_reset_postdata();
                    ?>
                    </ul>
                </div>
               
            </div>
        </div>
        <br>
    </section>

<?php get_footer(); ?>