<section id="blog" aria-label="Blog. Notícias e novidades da empresa.">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-light text-center">BLOG <strong class="font-weight-normal">AND NEWS</strong></h2>  
                </div>
                <br>
                <?php
                    global $post;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'paged' => $paged
                    );
                    $the_query = new WP_Query($args);
                    //print("<pre>".print_r($the_query->posts,true)."</pre>");
                    if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
                        <div class="col-md-4" aria-label="<?php the_title()?>">
                            <div class="infos">
                                <img src="<?php echo get_the_post_thumbnail_url()?>" class="square" alt=""/><br>
                                <h3><?php the_title(); ?></h3><br>
                                <p>
                                    <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                                </p>
                                <a class="button-more" href="<?php the_permalink();?>" aria-label="Vá para a página <?php the_title()?>">MAIS</a>
                            </div>
                        </div>
                    <?php }}
                    wp_reset_postdata();
                ?>
                <div class="col-12 text-center">
                    <a href="<?php bloginfo('home')?>/blog" class="button-more">VER TODOS OS POSTS</a>
                </div>
            </div>
            
        </div>
    </section>