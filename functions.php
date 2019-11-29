<?php  
     
    //remove insert images attribute
    add_filter( 'post_thumbnail_html', 'fanly_remove_images_attribute', 10 );
    add_filter( 'image_send_to_editor', 'fanly_remove_images_attribute', 10 );
    function fanly_remove_images_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        $html = preg_replace('/class="([^\"]*)"/isU','',$html);
        return $html;
    }

    // 点赞 start
    add_action( 'wp_ajax_setPostLike', 'setPostLike' );
    add_action( 'wp_ajax_nopriv_setPostLike', 'setPostLike' );
    //获取点赞数据
    function getPostLike($id){
        $count_key = 'post_likes_count';
        // 获取自定义字段
        $count = get_post_meta($id, $count_key, true);
        // 判断自定义字段是否存在，不存在就添加一个
        if ($count == '') {
            delete_post_meta($id, $count_key);
            add_post_meta($id, $count_key, array(
                'very_good' => 0,
                'good'      => 0,
                'commonly'  => 0,
                'bad'       => 0,
                'very_bad'  => 0
            ));
        }
        return $count;
    }
    // 数据请求更新到数据库
    function setPostLike(){
        $count_key = 'post_likes_count';
        $id = $_POST['post_id'];
        $key = $_POST['post_key'];
        $count = get_post_meta($id, $count_key, true);
        // 将请求到的数据和原来的数据进行合并
        update_post_meta($id, $count_key, array_merge($count, array($key => $count[$key] + 1)));
        echo $count[$key] + 1;
        // 这里用的是wordpress的admin_ajax.php，需要加上die()结束，因为admin_ajax.php默认输出0
        die();
    }
    // 点赞 end 

    //文章分类统计
    function wt_get_category_count($input = '') { 
        global $wpdb; 
        if($input == '') { 
            $category = get_the_category(); 
            return $category[0]->category_count; 
        } 
        elseif(is_numeric($input)) { 
            $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input"; 
            return $wpdb->get_var($SQL); 
        } 
        else { 
            $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'"; 
            return $wpdb->get_var($SQL); 
        } 
    }

    //获取浏览数-参数文章ID      
    function getPostViews($postID){      
        //字段名称      
        $count_key = 'post_views_count';      
        //获取字段值即浏览次数      
        $count = get_post_meta($postID, $count_key, true);      
        //如果为空设置为0      
        if($count==''){      
            delete_post_meta($postID, $count_key);      
            add_post_meta($postID, $count_key, '0');      
            return "0";      
        }      
        return $count;      
    }      
    //设置浏览数-参数文章ID      
    function setPostViews($postID) {      
        //字段名称      
        $count_key = 'post_views_count';      
        //先获取获取字段值即浏览次数      
        $count = get_post_meta($postID, $count_key, true);      
        //如果为空就设为0      
        if($count==''){      
            $count = 0;      
            delete_post_meta($postID, $count_key);      
            add_post_meta($postID, $count_key, '0');      
        }else{      
            //如果不为空，加1，更新数据      
            $count++;      
            update_post_meta($postID, $count_key, $count);      
        }      
    } 
    add_filter('show_admin_bar', '__return_false');//去掉默认顶端导航条

    // 更改后台字体
    function Bing_admin_lettering(){
        echo'<style type="text/css">
            * { font-family: "Microsoft YaHei" !important; }
            i, .ab-icon, .mce-close, i.mce-i-aligncenter, i.mce-i-alignjustify, i.mce-i-alignleft, i.mce-i-alignright, i.mce-i-blockquote, i.mce-i-bold, i.mce-i-bullist, i.mce-i-charmap, i.mce-i-forecolor, i.mce-i-fullscreen, i.mce-i-help, i.mce-i-hr, i.mce-i-indent, i.mce-i-italic, i.mce-i-link, i.mce-i-ltr, i.mce-i-numlist, i.mce-i-outdent, i.mce-i-pastetext, i.mce-i-pasteword, i.mce-i-redo, i.mce-i-removeformat, i.mce-i-spellchecker, i.mce-i-strikethrough, i.mce-i-underline, i.mce-i-undo, i.mce-i-unlink, i.mce-i-wp-media-library, i.mce-i-wp_adv, i.mce-i-wp_fullscreen, i.mce-i-wp_help, i.mce-i-wp_more, i.mce-i-wp_page, .qt-fullscreen, .star-rating .star { font-family: dashicons !important; }
            .mce-ico { font-family: tinymce, Arial !important; }
            .fa { font-family: FontAwesome !important; }
            .genericon { font-family: "Genericons" !important; }
            .appearance_page_scte-theme-editor #wpbody *, .ace_editor * { font-family: Monaco, Menlo, "Ubuntu Mono", Consolas, source-code-pro, monospace !important; }
            </style>';
    }
    add_action('admin_head', 'Bing_admin_lettering');

    // 面包屑导航注册代码
    function wheatv_breadcrumbs() {
        $delimiter = '<i>></i>';
        $name = '首页'; //text for the 'Home' link
        $currentBefore = '';
        $currentAfter = '';

        if( !is_home() && !is_front_page() || is_paged() ){
            echo '';
            global $post;
            // $home = get_bloginfo('url');
            $home = get_option('home');
            echo '<a href="'.$home.'" >'. $name . ' </a>' . $delimiter . ' ';

            if ( is_category() ) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                    echo $currentBefore . '';
                    single_cat_title();
                    echo '' . $currentAfter;

                } elseif ( is_day() ) {
                    echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
                    echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
                    echo $currentBefore . get_the_time('d') . $currentAfter;

                } elseif ( is_month() ) {
                    echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
                    echo $currentBefore . get_the_time('F') . $currentAfter;

                } elseif ( is_year() ) {
                    echo $currentBefore . get_the_time('Y') . $currentAfter;

                } elseif ( is_single() ) {
                    $cat = get_the_category(); $cat = $cat[0];
                    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                    echo $currentBefore;
                    the_title();
                    echo $currentAfter;

                } elseif ( is_page() && !$post->post_parent ) {
                    echo $currentBefore;
                    the_title();
                    echo $currentAfter;

                } elseif ( is_page() && $post->post_parent ) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '' . get_the_title($page->ID) . '';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
                echo $currentBefore;
                the_title();
                echo $currentAfter;

            } elseif ( is_search() ) {
                echo $currentBefore . '搜索结果' . get_search_query() . '' . $currentAfter;

            } elseif ( is_tag() ) {
                echo $currentBefore . '搜索标签： ';
                single_tag_title();
                echo '' . $currentAfter;

            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

            } elseif ( is_404() ) {
                echo $currentBefore . 'Error 404' . $currentAfter;
            }

            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo __('第') . '' . get_query_var('paged') . '页';
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
            echo '';
        }
    }
  
    // 开启说说页面
    add_action('init', 'my_custom_init');
    function my_custom_init(){ 
        $labels = array(
            'name' => '说说',
            'singular_name' => '说说',
            'add_new' => '发表说说',
            'add_new_item' => '发表说说',
            'edit_item' => '编辑说说',
            'new_item' => '新说说',
            'view_item' => '查看说说',
            'search_items' => '搜索说说',
            'not_found' => '暂无说说',
            'not_found_in_trash' => '没有已放弃的说说',
            'parent_item_colon' => '', 'menu_name' => '说说' 
        );
        $args = array( 'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'exclude_from_search' =>true,
            'query_var' => true,
            'rewrite' => true, 'capability_type' => 'post',
            'has_archive' => false, 'hierarchical' => false,
            'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields') 
        );
        register_post_type('shuoshuo',$args);
    }
    // 说说页面

    /**
    * 数字分页函数
    * 因为wordpress默认仅仅提供简单分页
    * 所以要实现数字分页，需要自定义函数
    * @Param int $range            数字分页的宽度
    * @Return string|empty        输出分页的HTML代码        
    */
    function lingfeng_pagenavi( $range = 4 ) {
        global $paged, $wp_query;
        if ( !$max_page ) {
            $max_page = $wp_query->max_num_pages;
        }
        if( $max_page >1 ) {
            echo "<div class='fenye'>"; 
                if( !$paged ){
                    $paged = 1;
                }
                // if( $paged != 1 ) {
                //     echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>Home</a>";
                // }

                previous_posts_link('Prev');

                if ( $max_page >$range ) {
                    if( $paged <$range ) {
                        for( $i = 1; $i <= ($range +1); $i++ ) {
                            echo "<a href='".get_pagenum_link($i) ."'";
                            if($i==$paged) echo " class='current'";echo ">$i</a>";
                        }
                    }elseif($paged >= ($max_page -ceil(($range/2)))){
                        for($i = $max_page -$range;$i <= $max_page;$i++){
                            echo "<a href='".get_pagenum_link($i) ."'";
                            if($i==$paged)echo " class='current'";echo ">$i</a>";
                        }
                    }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                        for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                            echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                        }
                    }
                }else{
                    for($i = 1;$i <= $max_page;$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";
                        if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }

                next_posts_link('Next');

                // if($paged != $max_page){
                //     echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
                // }
                // echo '<span>共['.$max_page.']页</span>';
            echo "</div>\n";  
        }
    }

    // 留言 评论 start
    function fail($s) {//虚拟错误头部分
        header('HTTP/1.0 500 Internal Server Error');
        echo $s;
        exit;
    }
    function ajax_post_comment_slow (){
        fail('用不用说这么快？想好了再说！');
    }
    add_filter('comment_flood_trigger','ajax_post_comment_slow', 0);

    function ajax_comment(){
        if($_POST['action'] == 'ajax_comment') {
            global $wpdb, $db_check;
            // Check DB
            if(!$wpdb->dbh) {
                echo('Our database has issues. Try again later.');
                die();
            } 
            nocache_headers();
            $comment_post_ID = (int) $_POST['comment_post_ID'];
            $status = $wpdb->get_row("SELECT post_status, comment_status FROM $wpdb->posts WHERE ID = '$comment_post_ID'");

            //这一套判断貌似抄的 wp 源代码 。详见：include/comment.php
            if ( empty($status->comment_status) ) {
                do_action('comment_id_not_found', $comment_post_ID);
                fail('The post you are trying to comment on does not currently exist in the database.');
            } elseif ( 'closed' == $status->comment_status ) {
                do_action('comment_closed', $comment_post_ID);;
                fail('Sorry, comments are closed for this item.');
            } elseif ( in_array($status->post_status, array('draft', 'pending') ) ) {
                do_action('comment_on_draft', $comment_post_ID);
                fail('The post you are trying to comment on has not been published.');
            }
            $comment_author    = trim(strip_tags($_POST['author']));
            $comment_author_email = trim($_POST['email']);
            $comment_author_url  = trim($_POST['url']);
            $comment_content   = trim($_POST['comment']);

            // If the user is logged in
            $user = wp_get_current_user();
            if ( $user->ID ) {
                $comment_author    = $wpdb->escape($user->display_name);
                $comment_author_email = $wpdb->escape($user->user_email);
                $comment_author_url  = $wpdb->escape($user->user_url);
                if ( current_user_can('unfiltered_html') ) {
                    if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                        kses_remove_filters(); // start with a clean slate
                        kses_init_filters(); // set up the filters
                    }
                }
            } else {
                if ( get_option('comment_registration') )
                fail('火星人？注册个?');
            }
            $comment_type = '';

            if ( get_option('require_name_email') && !$user->ID ) {
                if ( 6> strlen($comment_author_email) || '' == $comment_author ){
                    fail('Oopps,名字[Name]或邮箱[email]不对。');
                } elseif ( !is_email($comment_author_email)){
                    fail('Oopps,邮箱地址[Email]不对。');
                }
            }
            if ( '' == $comment_content ){
                fail('是不是应该写点什么再提交？');
            }

            // Simple duplicate check
            $dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
            if ( $comment_author_email ) {

                $dupe .= "OR comment_author_email = '$comment_author_email' ";

                $dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
            }
            if ( $wpdb->get_var($dupe) ) {
                fail('评论重复了!有木有!');
            }
            $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'user_ID');
            // if( !$user->ID ){
            //     $result_set = $wpdb->get_results("SELECT display_name, user_email FROM $wpdb->users WHERE display_name = '" . $comment_author . "' OR user_email = '" . $comment_author_email . "'");
            //     if ($result_set) {
            //         if ($result_set[0]->display_name == $comment_author){
            //             fail('博主你也敢冒充？');
            //         } else {
            //             fail('博主你也敢冒充？');
            //         }
            //     }
            // }
            $comment_id = wp_new_comment( $commentdata );
            $comment = get_comment($comment_id);

            if( !$user->ID ){
                setcookie('comment_author_' . COOKIEHASH, $comment->comment_author, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
                setcookie('comment_author_email_' . COOKIEHASH, $comment->comment_author_email, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
                setcookie('comment_author_url_' . COOKIEHASH, clean_url($comment->comment_author_url), time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
            }
            @header('Content-type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
            simple_comment($comment);//这是我的调用评论函数，换成你的函数名。
            die();
        }
    }
    add_action('init', 'ajax_comment');

    function simple_comment($comment) {
        $GLOBALS['comment'] = $comment; ?>
           <li class="comment" id="li-comment-<?php comment_ID(); ?>">
                <div class="media">
                    <div class="media-left">
                        <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
                    </div>
                    <div class="media-body">
                        <div class="media-head">
                            <?php printf(__('<span class="author_name">%s</span>'), get_comment_author_link()); ?>
                            <span class="comment-pub-time">
                                <?php echo get_comment_time('Y-m-d'); ?>
                            </span>
                        </div>                

                        <?php if ($comment->comment_approved == '0') : ?>
                            <em>评论等待审核...</em><br />
                        <?php endif; ?>

                        <?php comment_text(); ?>
                            
                    </div>

                </div>
                <!-- <div class="comment-metadata"> -->
                    
                    <!-- <span class="comment-btn-reply"> -->
                        <!-- <i class="fa fa-reply"></i>  -->
                        <!-- <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  -->
                    <!-- </span> -->
                <!-- </div> -->
            </li>
        <?php
    }


    // 数据库插入评论表单的qq字段 
    add_action('wp_insert_comment','inlojv_sql_insert_qq_field',10,2);
    function inlojv_sql_insert_qq_field($comment_ID,$commmentdata) {
        $qq = isset($_POST['new_field_qq']) ? $_POST['new_field_qq'] : false;  
        update_comment_meta($comment_ID,'new_field_qq',$qq); // new_field_qq 是表单name值，也是存储在数据库里的字段名字
    }

    // 后台评论中显示qq字段
    add_filter( 'manage_edit-comments_columns', 'add_comments_columns' );
    add_action( 'manage_comments_custom_column', 'output_comments_qq_columns', 10, 2 );
    function add_comments_columns( $columns ){
        $columns[ 'new_field_qq' ] = __( 'QQ号' );        // 新增列名称
        return $columns;
    }
    function output_comments_qq_columns( $column_name, $comment_id ){
        switch( $column_name ) {
            case "new_field_qq" :
             // 这是输出值，可以拿来在前端输出，这里已经在钩子manage_comments_custom_column上输出了
            echo get_comment_meta( $comment_id, 'new_field_qq', true );
            break;
        }
    }
    /**
     * 修改后台头像 
     * 若有qq字段则显示qq头像，没有则显示定义好的
     */
    add_filter( 'get_avatar', 'inlojv_change_avatar', 10, 3 );
    function inlojv_change_avatar($avatar){
        global $comment;
        if( get_comment_meta( $comment->comment_ID, 'new_field_qq', true ) ){
            $qq_number =  get_comment_meta( $comment->comment_ID, 'new_field_qq', true );
            $qqavatar = file_get_contents('http://ptlogin2.qq.com/getface?appid=1006102&imgtype=3&uin='.$qq_number);

            $regex = '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)(?=")@';
            preg_match($regex,$qqavatar,$m);

            return '<img src="'.$m[0].'" class="avatar" alt="qq_avatar" />';
        }else{
            return '<img src="https://image.yeyucm.cn/other/comment-avatar.png" class="avatar" width="40" height="40" alt="comment_avatar" />';
        }
    }

    // 留言 评论 end 


    // 页面链接添加html后缀    
    function html_page_permalink() {
        global $wp_rewrite;
        if ( !strpos($wp_rewrite->get_page_permastruct(), '.html')){
            $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
        }
    }
    add_action('init', 'html_page_permalink', -1);

    // 分类 标签添加斜杠
    function nice_trailingslashit($string, $type_of_url) {
        if ( $type_of_url != 'single' && $type_of_url != 'page' )
            $string = trailingslashit($string);
        return $string;
    }
    add_filter('user_trailingslashit', 'nice_trailingslashit', 10, 2);
?>