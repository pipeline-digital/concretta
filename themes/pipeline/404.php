<?php get_header('internas'); ?>
<br><br>
	<div id="not-found">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="font-weight-light text-center">
						Página não encontrada
					</h2>  
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-12">
					<p>
						A página que covê procura não foi encontrada. <br>
						Escolha um dos itens abaixo para continuar sua navegação.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h3>Evolução dos clientes</h3>
					<?php
						global $post;
						$args = array(
							'post_type' => 'post',
							'category_name' => 'clientes',
							'post_status' => 'publish',
							'posts_per_page' => 3,
							'paged' => $paged
						);
						$the_query = new WP_Query($args);
						//print("<pre>".print_r($the_query->posts,true)."</pre>");
						if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
						<div class="list-group">
							<a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-1"><?php the_title();?></h5>
									<medium>
										<span class="badge badge-secondary">
											<?php echo get_the_date('d/m/yy');?>									
										</span>
									</medium>
								</div>
								<small><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></small>
							</a>
						</div>
						<?php }}
						wp_reset_postdata();
					?>
				</div>
				<div class="col-sm-6">
					<h3>Blog</h3>
					<?php
						global $post;
						$args = array(
							'post_type' => 'post',
							'category_name' => 'blog',
							'post_status' => 'publish',
							'posts_per_page' => 3,
							'paged' => $paged
						);
						$the_query = new WP_Query($args);
						//print("<pre>".print_r($the_query->posts,true)."</pre>");
						if ( $the_query->have_posts() ) {while ( $the_query->have_posts() ) {$the_query->the_post(); ?>
						<div class="list-group">
							<a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-1"><?php the_title();?></h5>
									<medium>
										<span class="badge badge-secondary">
											<?php echo get_the_date('d/m/yy');?>									
										</span>
									</medium>
								</div>
								<small><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></small>
							</a>
						</div>
						<?php }}
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
	<br><br>
<?php get_footer(); ?>