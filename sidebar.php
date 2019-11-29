<aside class="gallery">
    <a href="javascript:;" class="gallery-big">
        <img src="<?php bloginfo('template_url'); ?>/images/gallery1.jpg" alt="钢牙妹，我们一起学习吧！！" title="钢牙妹，我们一起学习吧！！">
        <span>世间所有的相遇都是久别的重逢 | 别来无恙你在心上</span>
    </a>
    <div class="gallery-small clear">
        <div class="gallery-small-box small">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery2.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>Music</h2>
                    <p>心情</p>
                    <p>在旋律中释放</p>
                </div>
            </a>
        </div>
        <div class="gallery-small-box big">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery3.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>Movie</h2>
                    <p>时光</p>
                    <p>在画面里穿梭</p>
                </div>
            </a>
        </div>
        <div class="gallery-small-box big">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery4.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>坚持</h2>
                    <p>每当孤独我回首</p>
                    <p>请相信坚持的力量</p>
                </div>
            </a>
        </div>
        <div class="gallery-small-box small">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery5.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>选择</h2>
                    <p>没有标准答案</p>
                    <p>唯有笃定坚持</p>
                </div>
            </a>
        </div>
        <div class="gallery-small-box small">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery6.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>时间</h2>
                    <p>读书不觉已春深</p>
                    <p>一寸光阴一寸金</p>
                </div>
            </a>
        </div>
        <div class="gallery-small-box big">
            <a href="" class="">
                <img src="<?php bloginfo('template_url'); ?>/images/gallery7.jpg" alt="">
                <div class="gallery-small-text">
                    <h2>文字</h2>
                    <p>心若能发现</p>
                    <p>万般景色皆成诗情</p>
                </div>
            </a>
        </div>
    </div>
</aside>
<aside>
    <div class="eevee">
        <div class="body">
            <div class="head">
                <div class="ears">
                    <div class="ear">
                        <div class="lobe"></div>
                    </div>
                    <div class="ear">
                        <div class="lobe"></div>
                    </div>
                </div>
                <div class="face">
                    <div class="eyes">
                        <div class="eye">
                            <div class="eyelid"></div>
                        </div>
                        <div class="eye">
                            <div class="eyelid"></div>
                        </div>
                    </div>
                    <div class="nose"></div>
                    <div class="mouth"></div>
                </div>
            </div>
            <div class="chest">
                <div class="fur">
                    <div class="patch"></div>
                </div>
                <div class="fur">
                    <div class="patch"></div>
                </div>
                <div class="fur">
                    <div class="patch"></div>
                </div>
            </div>
            <div class="legs">
                <div class="leg">
                    <div class="inner-leg"></div>
                </div>
                <div class="leg">
                    <div class="inner-leg"></div>
                </div>
                <div class="leg">
                    <div class="inner-leg"></div>
                </div>
                <div class="leg">
                    <div class="inner-leg"></div>
                </div>
            </div>
            <div class="tail">
                <div class="tail">
                    <div class="tail">
                        <div class="tail">
                            <div class="tail">
                                <div class="tail -end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</aside>
<aside class="widget">
    <h3 class="widget-title">
        <span><i class="fa fa-mortar-board" aria-hidden="true"></i>雅俗共赏</span>
    </h3>
     <ul>
        <?php
        $args = array(
          'post_password' => '',
              'post_status' => 'publish', // 只选公开的文章.
              'post__not_in' => array($post->ID),//排除当前文章
              'caller_get_posts' => 1, // 排除置頂文章.
              'orderby' => 'rand', // 依評論數排序.
              'posts_per_page' => 10 // 设置调用条数
          );
        $query_posts = new WP_Query();
        $query_posts->query($args);
        while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
        <li>
            <em></em>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
        <?php } wp_reset_query();?>
    </ul>

</aside>
<aside class="label">
    <h3 class="widget-title">
        <span><i class="fa fa-paper-plane" aria-hidden="true"></i>平行宇宙</span>
    </h3>
    <div class="items">
        <!-- <aside class="tags"><?php wp_tag_cloud('smallest=9&largest=9') ?></aside> -->
        <aside class="tags">
            <?php
                $args=array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                );
                $categories=get_categories($args);
                foreach($categories as $category) {
                    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts there are %s" ), $category->count ) . '" ' . '>' . $category->name.'</a>';
                }
            ?>
        </aside>
    </div>
</aside>
<aside class="statistics">
    <h3 class="widget-title">
        <span><i class="fa fa-pie-chart" aria-hidden="true"></i>想象之中</span>
    </h3>
    <ul>
        <li>文章：
            <?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish; ?> 篇
        </li>
        <li>分类：
            <?php echo $count_categories = wp_count_terms('category'); ?> 个
        </li>
        <li>标签：
            <?php echo $count_tags = wp_count_terms('post_tag'); ?> 个
        </li>
        <li>运行：
            <?php echo floor((time()-strtotime("2018-11-02"))/86400);?> 天
        </li>
        <li>访问：6,587,558次</li>
        <li>更新：
            <?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
        </li>
    </ul>
</aside>
