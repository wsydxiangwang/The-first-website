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
<title>夜雨绸缪</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
</head>
<body class="container-loading">

<div id="container-loading">
	<div class="wrap-box">
	    <div class='wrap' id='wrap1'>
	        <div class='ball' id='ball1'></div>
	    </div>
	    <div class='wrap' id='wrap2'>
	        <div class='ball' id='ball2'></div>
	    </div>
	    <div class='wrap' id='wrap3'>
	        <div class='ball' id='ball3'></div>
	    </div>
	    <div class='wrap' id='wrap4'>
	        <div class='ball' id='ball4'></div>
	    </div>
	    <div class='wrap' id='wrap5'>
	        <div class='ball' id='ball5'></div>
	    </div>
	</div>
</div>

<div id="all">
	<?php get_header();?>
	<div id="container" class="container">
		<style>
			.container{ padding-top: 600px; }
			.header{ display: none; }
			@media screen and (max-width: 768px){
				.container{ padding-top: 550px; }
			}
		</style>
		<div class="container-filter"></div>

		<div class="indexHeader">
			<div class="indexHeader-wrapper">
				<div class="site-name">
					<a href="/">李白小道</a>
					<span>- 认真，是一种态度！ -</span>
				</div>
				<div class="site-nav">
					<ul class="site-nav-list">
						<li>
							<a href="/" style="border-color:#000;color:#000;">
								<i class="fa fa-home"></i>
								<span>首页</span>
							</a>
						</li>
						<li>
							<a href="/category/mood-town">
								<i class="fa fa-star-half-o"></i>
								<span>心情小镇</span>
							</a>
						</li>
						<li>
							<a href="/phrase.html">
								<i class="fa fa-paper-plane"></i>
								<span>微言细语</span>
							</a>
						</li>
						<li class="list">
							<a href="javascript:void(0);">
								<i class="fa fa-gitlab"></i>
								<span>技术世界</span>
							</a>
							<div class="index-list">
								<a href="/category/mood-town">JavaScript</a>
								<a href="/category/jquery/">jquery</a>
								<a href="/category/vue/">Vue</a>
								<a href="/category/css/">CSS</a>
							</div>
						</li>
						<li>
							<a href="/RainyDay.html" target="_blank">
								<i class="fa fa-umbrella"></i>
								<span>Raing Day</span>
							</a>
						</li>
						<li>
							<a href="/links.html">
								<i class="fa fa-object-ungroup"></i>
								<span>夜雨导航</span>
							</a>
						</li>
						<li>
							<a href="/comments.html">
								<i class="fa fa-comments-o"></i>
								<span>偶然相遇</span>
							</a>
						</li>
						<li>
							<a href="/myself.html">
								<i class="fa fa-user"></i>
								<span>蓦然回首</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="motto">
					<div class="motto-slide">
						<p>『 永远相信美好的事情即将发生 』</p>
						<p>『 世界上没有什么事情是不可能的 』</p>
						<p>[ 心没有栖息的地方到哪都是流浪 ]</p>
						<p>[ 人生风景在游走，每当孤独我回首。 ]</p>
						<p>« 这个世界上原本就有很多东西是没有什么意义的 »</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container-left">
			<div class="container-left-top">
				<?php 
				$args = array( 
					'post_password' => '',
						'post_status' => 'publish', // 只选公开的文章.
						  //'post__not_in' => array($post->ID),//排除当前文章
						  'caller_get_posts' => 1, // 排除置頂文章.
						  //'orderby' => 'rand', // 依評論數排序.
						'posts_per_page' => 1 // 设置调用条数
					); 
				$query_posts = new WP_Query(); 
				$query_posts->query($args); 
				
				while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
				<h1>
					<a href="<?php the_permalink(); ?>">
						<span>【最新焦点】</span><?php the_title(); ?>
						<img src="<?php bloginfo('template_url'); ?>/images/new.gif" width="26" height="14" alt="最新文章">
					</a>
				</h1>
				<span>
					<?php 
						if(has_excerpt()){
							the_excerpt();	
						}else{
							echo mb_strimwidth(strip_tags($post->post_content),0,200,'...');	
						} 
					?>
				</span>
				<?php } wp_reset_query();?> 
			</div> 
			<?php if(have_posts()): while(have_posts()):the_post(); ?>
				<div class="text<?php if( is_sticky() ){ echo ' text-stick'; }else{ echo ' text-show'; } ?>">
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
							<span><?php the_category() ?><i></i></span>
							<div class="text_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						</h2>
						<!-- 摘要 -->
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
								<a href="javascript:;" data-key='very_good' data-id="<?php the_ID(); ?>" class="favorite <?php if(isset($_COOKIE['post_link_' . $post->ID])) echo 'done'; ?>">
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
			<?php endwhile; else : ?>
				<h2><?php _e('Not Found'); ?></h2>
			<?php endif; ?>
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
