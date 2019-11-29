<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="baidu-site-verification" content="cNP7vhhXuw" />
<meta name="Author" content="Libai" />
<meta name="description" content="夜雨绸缪的个人网站，关注Web前端开发技术，移动前端开发，后端开发，记录生活的点点滴滴，为追求所向往的生活而努力坚持奋斗着，永远相信美好的事情即将发生！！！" />
<meta name="keywords" content="夜雨绸缪，夜雨绸缪个人网站，夜雨绸缪个人博客，web前端博客，网页制作，夜雨博客，夜雨绸缪博客，夜雨，李白，前端开发" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<title><?php single_cat_title(); ?> | 夜雨绸缪</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
</head>
<body>
<div id="all">
	<?php get_header();?>
	<div id="container" class="container">
		
		<style>
		.container{ padding-top: 400px; }
		@media screen and (max-width: 768px){
			.container{ padding-top: 200px; }
		}
		</style>

		<div class="container-filter"></div>
		<aside class="mo-banner">
			<figure class="mo-banner-bg">
				<div class="mo-banner-bg_body">
					<div class="svg svg-block image1"></div>
					<div class="svg svg-diamond image2"></div>
					<div class="svg svg-leaf image3"></div>
					<div class="svg svg-small-circle"></div>
					<div class="svg svg-big-circle"></div>
					<div class="svg svg-triangle image4"></div>
				</div>
			</figure>
			<div class="mo-container">
				<h1 class="mo-banner__title"><?php single_cat_title(); ?></h1>
				<p class="mo-banner__desc">一共有
					<?php
						global $wp_query;
						$cat_ID = get_query_var('cat');
						echo get_category($cat_ID)->count;
					?>
					篇文章</p>
			</div>
		</aside>
	
		<div class="container-left">
			<!-- 面包屑导航 -->
			<!-- <div class="mod-crumbs" style="border-bottom: 1px solid #f6f7f8; padding-bottom: 0;display: block;">
			    <span class="mod-breadcrumb" style="border:none;">
			        <?php wheatv_breadcrumbs(); ?>
			    </span>
			</div> -->
			<?php 
				query_posts(array(
					"category__in" => array(get_query_var("cat")), 
					"post__in" => get_option("sticky_posts")
					)
				);
				while(have_posts()) : the_post(); 
			?>
				<div class="text">
					<div class="img-left">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
								if ( $values = get_post_custom_values("thumb") ) { ?>
									<img src="<?php bloginfo('template_url'); ?>/img/loading.gif" data-echo="<?php $values = get_post_custom_values("thumb"); echo $values[0]; ?>" alt="<?php the_title(); ?>" />
								<?php } else { ?>
									<img src="<?php bloginfo('template_url'); ?>/img/loading.gif" data-echo="<?php bloginfo('template_url'); ?>/img/default.png" alt="<?php the_title(); ?>" />
							<?php } ?>
						</a>
					</div>
					<div class="text_right">
						<h2>
							<!-- <span><?php the_category() ?><i></i></span> -->
							<div class="text_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						</h2>
						<h3>
							<?php 
								if(has_excerpt()){
									the_excerpt();	
								}else{
									echo mb_strimwidth(strip_tags($post->post_content),0,150,'...');	
								} 
							?>
						</h3>
						<p class="l">
							<span><i class="fa fa-clock-o"></i>&nbsp;<?php the_time('Y-m-d G:i') ?></span>
							<span><i class="fa fa-eye"></i>&nbsp;<?php echo getPostViews(get_the_ID()); ?>℃ </span>
							<span><i class="fa fa-comments-o"></i>&nbsp;<?php echo get_comments_number(get_the_ID()); ?></span>
							<span class="post-like">
								<a href="javascript:;" data-key='very_good' data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>">
									<i class="fa <?php 
													if( isset($_COOKIE['post_link_' . $post->ID]) ){ 
														echo 'fa-heart'; 
													}else{ 
														echo 'fa-heart-o'; 
													}?>">
									</i>	  
									<span class="count people-num">   
										<?php if( getPostLike(get_the_ID()) ){            
											echo getPostLike(get_the_ID())['very_good'];
										} else {
											echo '0';
										}?>
									</span> 
								</a>   
							</span>
						</p>
						<?php if( is_sticky() ) echo '<em>顶</em>'; ?>
					</div>
				</div>
			<?php 
				endwhile;
				wp_reset_query();
			?>

			<?php while(have_posts()) : the_post(); ?>
				<?php if(!is_sticky()){?>
				<div class="text">
					<div class="img-left">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
								if ( $values = get_post_custom_values("thumb") ) { ?>
									<img src="<?php bloginfo('template_url'); ?>/img/loading.gif" data-echo="<?php $values = get_post_custom_values("thumb"); echo $values[0]; ?>" alt="<?php the_title(); ?>" />
								<?php } else { ?>
									<img src="<?php bloginfo('template_url'); ?>/img/loading.gif" data-echo="<?php bloginfo('template_url'); ?>/img/default.png" alt="<?php the_title(); ?>" />
							<?php } ?>
						</a>
					</div>
					<div class="text_right">
						<h2>
							<!-- <span><?php the_category() ?><i></i></span> -->
							<div class="text_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						</h2>
						<h3>
							<?php 
								if(has_excerpt()){
									the_excerpt();	
								}else{
									echo mb_strimwidth(strip_tags($post->post_content),0,150,'...');	
								} 
							?>
						</h3>
						<p class="l">
							<span><i class="fa fa-clock-o"></i>&nbsp;<?php the_time('Y-m-d G:i') ?></span>
							<span><i class="fa fa-eye"></i>&nbsp;<?php echo getPostViews(get_the_ID()); ?>℃ </span>
							<span><i class="fa fa-comments-o"></i>&nbsp;<?php echo get_comments_number(get_the_ID()); ?></span>
							<span class="post-like">
								<a href="javascript:;" data-key='very_good' data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>">
									<i class="fa <?php 
													if( isset($_COOKIE['post_link_' . $post->ID]) ){ 
														echo 'fa-heart'; 
													}else{ 
														echo 'fa-heart-o'; 
													}?>">
									</i>	  
									<span class="count people-num">   
										<?php if( getPostLike(get_the_ID()) ){            
											echo getPostLike(get_the_ID())['very_good'];
										} else {
											echo '0';
										}?>
									</span> 
								</a>   
							</span>
						</p>
						<?php if( is_sticky() ) echo '<em>顶</em>'; ?>
					</div>
				</div>
			<?php } endwhile;?>


			<!-- 翻页 -->
			<?php lingfeng_pagenavi();?>

		</div>
		<div id="sidebar" class="container-sidebar">
			<?php get_sidebar( $name ); ?>
		</div>

	</div>
	<?php wp_footer(); ?> 
</div>
<?php get_footer()?>
<div class="filter">
    <div class="circle-loader">
        <div class="circle-line">
            <div class="circle circle-blue"></div>
            <div class="circle circle-blue"></div>
            <div class="circle circle-blue"></div>
        </div>
        <div class="circle-line">
            <div class="circle circle-yellow"></div>
            <div class="circle circle-yellow"></div>
            <div class="circle circle-yellow"></div>
        </div>
        <div class="circle-line">
            <div class="circle circle-red"></div>
            <div class="circle circle-red"></div>
            <div class="circle circle-red"></div>
        </div>
        <div class="circle-line">
            <div class="circle circle-green"></div>
            <div class="circle circle-green"></div>
            <div class="circle circle-green"></div>
        </div>
    </div>
</div>
<!-- back Top -->
<div class="get-back-top">
	<img class="static" src="<?php bloginfo('template_url'); ?>/images/super-monkey-static.gif" alt="想干嘛 一边玩去！！">
	<img class="flying" src="<?php bloginfo('template_url'); ?>/images/super-monkey-flying.gif" alt="想干嘛 一边玩去！！">
</div>

</body>
</html>