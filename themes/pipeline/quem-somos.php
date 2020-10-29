<?php 
// Template name: Quem somos
get_header(); ?>
<main id="page">
        <section id="content" class="first">
            <div class="banner">
                <?php the_post_thumbnail();?>
            </div>
            <div class="container">
                <div class="row page-container">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                <div class="col-sm-8">
                                    <div class="page-content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    <?php ?>
                </div>
            </div>
        </section>

        <section id="fundadoras">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">
                            Fundadoras
                        </h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php the_field('adriana_imagem');?>" alt="">
                    </div>
                    <div class="col-sm-8">
                        <?php the_field('adriana_apresentacao');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php the_field('karine_imagem');?>" alt="">
                    </div>
                    <div class="col-sm-8">
                        <?php the_field('karine_apresentacao');?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">
                            Onde estamos
                        </h2>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center">
                        <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/img/mapa.png" alt="">
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </section>

<?php get_footer(); ?>