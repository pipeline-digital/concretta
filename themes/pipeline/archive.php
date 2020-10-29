<?php get_header('internas'); ?>

    <main id="interna-blog">
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-sm-8">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="row">
                            <div class="col-12">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <br>
                            </div>
                            <div class="col-sm-4 text-center">
                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt=""/><br>
                            </div>

                            <div class="col-sm-8 text-justify">
                                <p>
                                    <?php echo wp_trim_words( get_the_content(), 80, '...' ); ?>
                                </p>
                                <a 
                                    class="button-more link" 
                                    href="<?php the_permalink();?>" 
                                    aria-label="Vá para a página <?php the_title()?>"
                                >
                                    MAIS
                                </a>
                            </div>
                        </div>
                        <br><br>
                    <?php endwhile; endif; ?>
                </div>
                <div id="side-bar" class="col-sm-4">
					<?php 
						
                        $thisCat = get_category(get_query_var('cat'),false);
						//print("<pre>".print_r($thisCat,true)."</pre>");

						if($thisCat->slug !== 'artigos'){
							get_template_part('includes/sidebar/sidebar-archive-blog'); 
						} else {
							get_template_part('includes/sidebar/sidebar-archive-clients'); 
						}
					?>
				</div>
            </div>
            
            <div class="row">
                <div class="col-12 text-center">
                    <?php 
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $query->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Página anterior', 'text-domain' ) ),
                            'next_text'    => sprintf( '%1$s <i></i>', __( 'Próxima página', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                    ?>
                </div>
            </div>
            <br><br>
        </div>
    </main>
<?php get_footer(); ?>