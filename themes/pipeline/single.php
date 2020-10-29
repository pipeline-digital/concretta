<?php get_header('internas'); ?>
    <section id="interna-blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php 
                        foreach (get_field('orientacao') as $key => $value) {
                            //print("<pre>".print_r($value, true)."</pre>");
                            switch($value){
                                case'HORIZONTAL': ?>


                                    <div class="col-sm-12 text-center">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" /><br>
                                    </div>
                                    <br><br>
                                    <div class="col-12 blog-content">
                                        <?php the_content(); ?>
                                    </div>

                                    <?php break;?>
                                <?php case 'VERTICAL' :?>
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" /><br>
                                        </div>
                                        <br><br>
                                        <div class="col-8 blog-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                <?php break;?>  
                             <?php }
                        }
                    ?>
                </div>
				<div id="side-bar" class="col-sm-4">
					<?php 
						$post_id = get_the_ID();
						$category = get_the_category($post_id);
						$category_slug = $category[0]->slug; //blog
						//print("<pre>".print_r($category_slug,true)."</pre>");

						if($category_slug == 'artigos'){
							get_template_part('includes/sidebar/sidebar-single-blog'); 
						} else {
							get_template_part('includes/sidebar/sidebar-single-client'); 
						}
					?>
				</div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
<?php get_footer(); ?>