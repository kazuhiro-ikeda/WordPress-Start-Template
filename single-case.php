<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
	<div class="ttl_page_sub">募集要項</div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php remove_filter ( 'the_content', 'wpautop' ); ?>

	<article id="case">
		
		<div class="inner">		
			<section class="primary">
				<div class="data<?php if(get_field( 'img_main' )) { echo ' narrow';} ?>">
					<span class="style <?php
						$terms_name = wp_get_object_terms($post->ID, 'genre');
					
						//タームを出力
						if(!empty($terms_name)){
						  if(!is_wp_error( $terms_name )){
						    foreach($terms_name as $term){
						      echo $term->slug; 
						    }
						  }
						}
					?>"><?php
					
					$terms_name = wp_get_object_terms($post->ID, 'genre');
					
					//タームを出力
					if(!empty($terms_name)){
					  if(!is_wp_error( $terms_name )){
					    foreach($terms_name as $term){
					      echo $term->name; 
					    }
					  }
					}
					
					?></span>
					
					<h1 class="ttl_job"><?php the_title(); ?></h1>
					
					<h2 class="lead <?php
						$terms_name = wp_get_object_terms($post->ID, 'genre');
					
						//タームを出力
						if(!empty($terms_name)){
						  if(!is_wp_error( $terms_name )){
						    foreach($terms_name as $term){
						      echo $term->slug; 
						    }
						  }
						}
					?>"><?php the_field( "lead", $post->ID); ?></h2>
					
					<div class="single-content">
						<?php the_field( "text", $post->ID); ?>
					</div>
					<!-- /.single-content -->
		
				</div>
				<!-- /.data -->
				
				<?php 
					$image = get_field( 'img_main' );
					if( !empty($image) ): 
					
					// vars
					$url = $image['url'];
					$alt = $image['alt'];
				
					// thumbnail
					$size = '案件';
					$thumb = $image['sizes'][ $size ];
				
					 ?>
					 
				<figure class="img_case_main"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
						
				<?php endif; ?>
				
			</section>
			<!-- /.primary -->
			
			<a id="btn_requirements" href="#requirements">募集要項を見る<i class="fa fa-caret-right" aria-hidden="true"></i></a>
			
			
			<?php 
				$pr = get_field('pr');
				$img_wide = get_field('img_wide');
				$gallery = get_field('gallery');
				if( !empty($pr) || !empty($img_wide) || !empty($gallery)):
			?>
			<h2 class="ttl_sec_case branch"><img src="<?php bloginfo( 'template_url' ); ?>/images/entry/ttl_pr.png" alt="PR Contents"></h2>
			
			<?php endif; ?>
			
			<?php 
					$image = get_field( 'img_wide' );
					if( !empty($image) ): 
					
					// vars
					$url = $image['url'];
					$alt = $image['alt'];
				
					// thumbnail
					$size = '案件WIDE';
					$thumb = $image['sizes'][ $size ];
				
					 ?>
					 
				<figure class="img_case_wide"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
						
				<?php endif; ?>
			
			<section id="pr">
				<?php if( have_rows( 'pr' ) ): ?>
					
				<?php while( have_rows( 'pr' ) ): the_row(); 
					// vars
					$image = get_sub_field( 'img_pr' );
					$ttl = get_sub_field( 'ttl' );
					$text = get_sub_field( 'text' );
					
					// vars img
					$url = $image['url'];
					$alt = $image['alt'];
					$size = '案件';
					$thumb = $image['sizes'][ $size ];
				?>
				<section class="box_block">
					<div class="data<?php if(get_sub_field( 'img_pr' )) { echo ' narrow';} ?>">
						<h3 class="ttl <?php
						$terms_name = wp_get_object_terms($post->ID, 'genre');
					
						//タームを出力
						if(!empty($terms_name)){
						  if(!is_wp_error( $terms_name )){
						    foreach($terms_name as $term){
						      echo $term->slug; 
						    }
						  }
						}
					?>"><?php echo $ttl; ?></h3>
						<p class="text"><?php echo $text; ?></p>
						
					</div>
					<!-- /.data -->
					
					<?php if(get_sub_field( 'img_pr' )): ?>			
					<figure class="img_pr"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
					
					<?php endif; ?>
									
				</section>
				<!-- /.box_block -->
				
				<?php endwhile; ?>
				
				<?php endif; ?>
				
			</section>
			<!-- /#pr -->
			
			<section id="gallery">
				<?php if( have_rows( 'gallery' ) ): ?>
					
				<?php while( have_rows( 'gallery' ) ): the_row(); 
					// vars
					$image = get_sub_field( 'img_gallery' );
					$text = get_sub_field( 'text_caption' );
					
					// vars img
					$url = $image['url'];
					$alt = $image['alt'];
					$size = '案件';
					$thumb = $image['sizes'][ $size ];
				?>
				
				<figure class="img_gallery"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"><figcaption class="caption_gllery"><?php echo $text; ?></figcaption></figure>
				
				<?php endwhile; ?>
				
				<?php endif; ?>
				
			</section>
			<!-- /#gallery -->
			
			<section id="requirements">
				<h2 class="ttl_sec_case branch"><img src="<?php bloginfo( 'template_url' ); ?>/images/entry/ttl_requirements.png" alt="募集要項"></h2>
				<table>
					<?php if( get_field("job")): ?>
					<tr>
						<th>職種</th>
						<td><?php the_field( "job", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("style")): ?>
					<tr>
						<th>雇用形態</th>
						<td><?php the_field( "style", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("detail")): ?>
					<tr>
						<th>仕事内容</th>
						<td><?php the_field( "detail", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("target")): ?>
					<tr>
						<th>対象となる方</th>
						<td><?php the_field( "target", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("license")): ?>
					<tr>
						<th>資格</th>
						<td><?php the_field( "license", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("place")): ?>
					<tr>
						<th>勤務地</th>
						<td><?php the_field( "place", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("time")): ?>
					<tr>
						<th>勤務時間</th>
						<td><?php the_field( "time", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("salary")): ?>
					<tr>
						<th>給与</th>
						<td><?php the_field( "salary", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("dayoff")): ?>
					<tr>
						<th>休日休暇</th>
						<td><?php the_field( "dayoff", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("treatment")): ?>
					<tr>
						<th>待遇・福利厚生</th>
						<td><?php the_field( "treatment", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("entry")): ?>
					<tr>
						<th>応募方法</th>
						<td><?php the_field( "entry", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if( get_field("memo")): ?>
					<tr>
						<th>その他</th>
						<td><?php the_field( "memo", $post->ID); ?></td>
					</tr>
					<?php endif; ?>
	
				</table>
				
				<?php 
					$location = get_field('map');
					if( !empty($location) ):
				?>
				<?php get_template_part( 'parts/googlemap' ); ?>
				
				<h2 class="ttl_sec_case">勤務地・所在地</h2>
				
				<div class="acf-map" style="width: 100%; height: 220px; margin-bottom: 10px;">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					
				</div>
				
				<p id="mapurl"><a target="_blank" href="<?php the_field( "url", $post->ID); ?>">▶︎GoogleMAPで見る</a></p>
				<!-- /#mapurl -->
				
				<?php endif; ?>
				
			</section>
			<!-- /#requirements -->
			
			<a id="btn_entry" href="<?php echo esc_url(home_url('/')); ?>?page_id=35&post_id=<?php echo $post->ID; ?>">応募フォームに進む</a>
			
			<?php $state = get_field("link_tel"); if($state == 'ON'): ?>
			<p class="block_p linktel_p"><span class="label">お電話でのご応募</span>TEL <span class="number">0120-23-1055</span></p>
			
			<p class="block_s linktel_s"><a href="tel:0120231055"><span class="label">お電話でのご応募</span>TEL 0120-23-1055</a></p>
			
			<?php else: ?>
			
			<?php endif; ?>
			
		<?php endwhile; else: //loop ?>
			<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの募集は現在ございません。</p>
			
		<?php endif; //loop ?>
	
		</div>
		<!-- /.inner -->
		
		<div id="historyback">
			<a href="javascript:history.back()">募集一覧へもどる</a>
			
		</div>
		<!-- /#historyback -->
	
	</article>
	<!-- /#case -->

</div><!-- /#main post_class -->

<?php get_footer(); ?>