<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if(post_password_required()){ return; }
?>

<div id="comments" class="comments-area">

    <?php if(comments_open()) : ?>
        <div id="respond" class="respond" role="form">
            <h2 id="reply-title" class="comments-title"><?php comment_form_title( '', '回复给 %s' ); ?> <small>
                    <?php cancel_comment_reply_link(); ?>
                </small></h2>
            
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="commentform clear" id="commentform">
                    <?php if ( $user_ID ) : ?>
                        <p class="warning-text" style="margin-bottom:10px">一位时间的朋友<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> | <a class="link-logout" href="<?php echo wp_logout_url(get_permalink()); ?>">注销 »</a></p>
                        <textarea class="form-control" rows="3" id="comment" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="留点空白给你说..." class="form-control" tabindex="1" name="comment"></textarea>
                    <?php else : ?>
                        <textarea class="form-control" rows="3" id="comment" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="留点空白给你说..." tabindex="1" name="comment"></textarea>
                        <div class="commentform-info">
                        	<label id="author_qqinfo">
	                        	<input class="form-control" id="qqinfo" maxlength="12" tabindex="2" name="new_field_qq" type="text" value="<?php echo esc_attr($comment_author); ?>" placeholder="QQ号码[推荐]" />
                            </label>
                            <label id="author_name" for="author">
                                <input class="form-control" id="author" type="text" tabindex="3" value="<?php echo $comment_author; ?>" name="author" placeholder="昵称[必填]" required>
                            </label>
                            <label id="author_email" for="email">
                                <input class="form-control" id="email" type="text" tabindex="4" value="<?php echo $comment_author_email; ?>" name="email" placeholder="QQ邮箱[必填]" required>
                            </label>
                            <label id="author_website" for="url">
                                <input class="form-control" id="url" type="text" tabindex="5" value="<?php echo $comment_author_url; ?>" name="url" placeholder="网址[选填]">
                            </label>
                        </div>
                    <?php endif; ?>
                    <div class="btn-group commentBtn" role="group">
                        <input name="submit" type="submit" id="submit" class="btn btn-sm btn-danger btn-block" tabindex="6" value="发表评论" />
                    </div>
                    <?php comment_id_fields(); ?>
                </form>
        </div>

        
        <div class="comments-null <?php if( number_format_i18n( get_comments_number() == 0 )){ echo 'zero'; } ?>">恭喜你啊！！你是第一个评论的，如此有缘，那就留下个脚印吧！！</div>

        <div class="comments-box <?php if( number_format_i18n( get_comments_number() != 0 )){ echo 'exist'; } ?>">

            <meta content="UserComments:<?php echo number_format_i18n( get_comments_number() );?>" itemprop="interactionCount">

            <h3 class="comments-title">共有 <span class="commentCount"><?php echo number_format_i18n( get_comments_number() );?></span> 条评论</h3>

            <nav class="navigation comment-navigation u-textAlignCenter" data-fuck="<?php the_ID();?>">
                <?php paginate_comments_links(array('prev_next'=>true)); ?>
            </nav>
            <ol class="commentList clear">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => 48,
                        'type'        =>'comment',
                        'callback'    =>'simple_comment',
                        'reverse_top_level' => true,
                    ) );
                ?>
            </ol>

        </div>

	<?php endif; ?>
</div>
