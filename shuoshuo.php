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
<title>微言细语</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
</head>
<body class="container-loading">

<?php /*
    Template Name: 说说
*/
?>

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
    <?php get_header(); ?>
    <div id="container" class="container">
        <div class="container-filter"></div>
        <div class="shuoshuo-container">
            <ul class="shuoshuo-list">
                <?php query_posts("post_type=shuoshuo & post_status=publish & posts_per_page=-1"); if (have_posts()) { while( have_posts()) { the_post(); ?>
                <li>
                    <div class="shuoshuo-ico"></div>
                    <div class="shuoshuo-text clear">
                        <!-- <p class="shuoshuo-text-title"><?php the_title(); ?></p> -->
                        <?php the_content(); ?>
                        <time class="shuoshuo-text-time"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d H:i'); ?></time>
                    </div>
                </li>
                <?php }} ?>
            </ul>
        </div>
        <style>
            body{ background: #E5E6D0 url(<?php bloginfo('template_url'); ?>/img/shuoshuo-bg.jpg) repeat 0 0 }
            /* body{ background: #DEE4EA; } */
        </style>
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