<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content='<?php echo the_author(); ?>' />
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"... "); ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="format-detection" content="telephone=no" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title><?php the_title(); ?> - 夜雨绸缪</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

<body>

<div id="all">
    <?php get_header();?>

    <div id="container" class="container">
        <div class="container-filter"></div>
        <?php
            if(have_posts()) : while (have_posts()) : the_post();setPostViews(get_the_ID());
        ?>
        <div class="container-left" style="background: none;padding-bottom:0;">
            <!-- <div class="mod-crumbs">
                <span class="mod-breadcrumb">
                    <?php wheatv_breadcrumbs(); ?>
                </span>
            </div> -->
            <div class="text-box">
                <h2 class="title">
                    <?php the_title(); ?>
                </h2>
                <p class="data">
                    <span>
                        <i class="fa fa-clock-o"></i>
                        <?php the_time('Y-m-d G:i') ?>
                    </span>
                    <span>
                        <i class="fa fa-eye"></i>
                        <?php echo getPostViews(get_the_ID()); ?>人阅读
                    </span>
                    <span>
                        <i class="fa fa-comments-o"></i>
                        <?php echo get_comments_number(get_the_ID()); ?>条评论
                    </span>
                    <span class="sidebar-hide">
                        <input type="checkbox" id="btn">
                        <label for="btn"></label>
                    </span>
                </p>
                <div class="text-content">
                    <?php the_content(); ?>
                </div>
            </div>        
            <div class="key-w">
                <div class="post clear">
                    <div class="like-box">
                        <a href="javascript:;" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>" data-id="<?php the_ID(); ?>" data-key='very_good'>
                            <span class="people">
                                <i class="people-num"><?php echo getPostLike(get_the_ID())['very_good']; ?></i>人
                            </span>
                            <img src="<?php bloginfo('template_url'); ?>/images/like_love.png" alt="Love">
                            <span>Love</span>
                        </a>
                        <a href="javascript:;" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>" data-id="<?php the_ID(); ?>" data-key='good'>
                            <span class="people">
                                <i class="people-num"><?php echo getPostLike(get_the_ID())['good'] ?></i>人
                            </span>
                            <img src="<?php bloginfo('template_url'); ?>/images/like_haha.png" alt="haha">
                            <span>Haha</span>
                        </a>
                        <a href="javascript:;" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>" data-id="<?php the_ID(); ?>" data-key='commonly'>
                            <span class="people">
                                <i class="people-num"><?php echo getPostLike(get_the_ID())['commonly'] ?></i>人
                            </span>
                            <img src="<?php bloginfo('template_url'); ?>/images/like_wow.png" alt="wow">
                            <span>Wow</span>
                        </a>
                        <a href="javascript:;" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>" data-id="<?php the_ID(); ?>" data-key='bad'>
                            <span class="people">
                                <i class="people-num"><?php echo getPostLike(get_the_ID())['bad'] ?></i>人
                            </span>
                            <img src="<?php bloginfo('template_url'); ?>/images/like_sad.png" alt="sad">
                            <span>Sad</span>
                        </a>
                        <a href="javascript:;" class="favorite<?php if(isset($_COOKIE['post_link_' . $post->ID])) echo ' done'; ?>" data-id="<?php the_ID(); ?>" data-key='very_bad' >
                            <span class="people">
                                <i class="people-num"><?php echo getPostLike(get_the_ID())['very_bad'] ?></i>人
                            </span>
                            <img src="<?php bloginfo('template_url'); ?>/images/like_angry.png" alt="angry">
                            <span>Angry</span>
                        </a>
                    </div>

                    <div class="text-post-classify">
                        <span>来自于：</span>
                        <?php the_category() ?>
                    </div>
                    <p class="text-post text-prev-post">
                        <?php if (get_next_post()) { next_post_link('<span>上一篇：</span>%link');} else {echo "上一篇：没有了，已经是最新文章";} ?>
                    </p>
                    <p class="text-post text-next-post">
                        <?php if (get_previous_post()) { previous_post_link('<span>下一篇：</span>%link');} else {echo "下一篇：没有了，已经是最后文章";} ?>
                    </p>

                    
                </div>
            </div>

            <?php comments_template('/guestcomments.php'); ?>

            <?php endwhile; else : ?>
                <h2>
                    <?php _e('Not Found'); ?>
                </h2>
            <?php endif; ?>
        </div>
        <div class="container-sidebar">
            <?php get_sidebar( $name ); ?>
        </div>


    </div>
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