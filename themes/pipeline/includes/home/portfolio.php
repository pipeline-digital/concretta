<section id="portfolio" aria-label="Portfolio da empresa">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-light text-center">
                    PORT<strong class="font-weight-normal">FOLIO</strong>
                </h2>  
            </div>
            <br>
            <?php
                global $post;
                $args = array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish'
                );
                $the_query = new WP_Query($args);
                //print("<pre>".print_r($the_query->posts,true)."</pre>");
                if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 infos" aria-label="<?php the_title()?>">
                        <h3><?php the_title(); ?></h3>
                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" /><br>
                        <a class="button-more" href="<?php the_permalink();?>" aria-label="Vá para a página <?php the_title()?>">MAIS</a>
                    </div>
                <?php }}
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>