<section id="servicos" aria-label="Serviços prestados">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-light text-center">NOSSOS <strong class="font-weight-normal">SERVIÇOS</strong></h2>  
                </div>
                <br>
                <?php
                    global $post;
                    $args = array(
                        'post_type' => 'servicos',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    );
                    $the_query = new WP_Query($args);
                    //print("<pre>".print_r($the_query->posts,true)."</pre>");
                    if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                        <div class="col-sm-6 col-md-3 servico text-center" aria-label="<?php the_title()?>">
                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" /><br>
                            <h3><?php the_title();?></h3><br>
                            <P>
                                <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                            </P>  
                            <a class="button-more" href="<?php the_permalink()?>" aria-label="Vá para a página <?php the_title()?>">
                                MAIS
                            </a> 
                        </div>
                    <?php }}
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>