<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content="李俊" />
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200," ... "); ?>" />
<meta name="keywords" content="个人博客,唯品秀个人博客,个人博客网站,唯品秀，web前端博客，网页制作，博客，HTML5/CSS3，Javascript" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title>找到你想要的文章了么！！！</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font-awesome-4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" media="screen and (max-width:767px)" href="<?php bloginfo('template_url'); ?>/css/style-ios.css"> -->
<!-- <link rel="stylesheet" type="text/css" media="screen and (min-width:768px) and (max-width:1199px)" href="<?php bloginfo('template_url'); ?>/css/style-ipd.css"> -->
<!-- <link rel="stylesheet" type="text/css" media="screen and (min-width:1200px)" href="<?php bloginfo('template_url'); ?>/style.css"> -->
</head>
<body>

<div id="all">
    <?php get_header();?>
    <div id="container" class="container">
        <div class="container-filter"></div>
        <div class="search-page clear">

            <!-- <?php ?> -->

            <?php if( have_posts() ): ?>

                <?php while ( have_posts() ) : the_post(); ?>
                <div class="search-text">
                    <div class="text-box">
                        <div class="img-top">
                            <a href="<?php the_permalink(); ?>">
                                <span class="search-eye">
                                    <i class="fa fa-eye"></i>
                                    <?php echo getPostViews(get_the_ID()); ?>℃ 
                                </span>
                                <div class="like">
                                        <i class="fa fa-thumbs-o-up"></i>      
                                        <span class="count">   
                                            <?php if( get_post_meta($post->ID,'bigfa_ding',true) ){            
                                                echo get_post_meta($post->ID,'bigfa_ding',true);
                                            } else {
                                                echo '0';
                                            }?>
                                        </span> 
                                </div>
                                <?php
                                    if ( $values = get_post_custom_values("thumb") ) { ?>
                                        <img src="wp-content/themes/wsydxiangwang/img/loading.gif" data-echo="<?php $values = get_post_custom_values("thumb"); echo $values[0]; ?>" alt="<?php the_title(); ?>" />
                                    <?php } else { ?>
                                        <img src="wp-content/themes/wsydxiangwang/img/loading.gif" data-echo="<?php bloginfo('template_url'); ?>/img/default.png" alt="<?php the_title(); ?>" />
                                <?php } ?>
                                <div class="box-hide">
                                    <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="con-bottom">
                            <h2>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="details clear">
                                <span class="classify"><?php the_category() ?></span>
                                <span class="time"><i class="fa fa-clock-o"></i>&nbsp;<?php the_time('Y-m-d') ?></span>                            
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            <?php else: ?>

                <h1 class="entry-title">
                    <?php _e( '没有找到您搜索的内容', 'leizi' ); ?>
                </h1>
        
            <?php endif; ?>

            <!-- 翻页 -->
            <?php lingfeng_pagenavi();?>
        </div>
    </div>

    <?php get_footer()?>
</div>

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