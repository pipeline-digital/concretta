<?php get_header(); ?>
    <main id="page">

        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-ts-12">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="row">
                                <div class="col-ts-12">
                                    <div class="gutter">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                </div>
                                <div class="col-ts-12">
                                    <div class="gutter">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div><?php //coluna conteudo ?>
                </div>
            </div>
        </section>
        <!-- <section id="comentarios">
            <div class="container">
                <div class="row">
                    <div id="comentarios" class="col-ts-12">
                        <div class="gutter">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


        
            
    
    </main>
<?php get_footer(); ?>