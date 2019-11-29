<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content='<?php echo the_author(); ?>' />
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"... "); ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="format-detection" content="telephone=no" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title><?php the_title(); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="wp-content/themes/wsydxiangwang/favicon.ico" />
<body>

<div id="all">
    <?php
    /*
    Template Name: Guestbook
    */
    ?>
    <?php get_header();?>

    <div id="container" class="container">
        <div class="container-filter"></div>
        <div class="comments-page">
            <div class="sky">
                <div class="clouds_one"></div>
                <div class="clouds_two"></div>
                <div class="clouds_three"></div>
                <div class="stranger">
                    <span class="stranger-text-cut">
                        <span>陌生人，愿你所有快乐，无需假装</span>
                    </span>
                    <span class="stranger-text-mid">即使生活艰辛，依然要记得保持微笑哦~~</span>
                    <span class="stranger-text-cut">
                        <span>陌生人，愿你所有快乐，无需假装</span>
                    </span>
                </div>
            </div>
            <?php comments_template('/guestcomments.php'); ?>
        </div>
        <style>
            body{ background: #dee4ea; }
            .header{
                box-shadow: 0 0 10px #ddd;
                background: rgba(255, 255, 255, .8)
            }
            .container{ width: 100% !important; }
            @media screen and (max-width: 768px){
                body{ background: #fff; }
            }
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