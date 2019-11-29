$.noConflict();

jQuery(function($) {

    $(document).pjax('a[target!=_blank]', '#container', {
        fragment: '#container',
        timeout: 8000
    });
    $(document).on('pjax:send', function() { //pjax loading ...
        $(".filter").show();
        $('#all').addClass('loading');
        $('.footer').addClass('loading');
        $('.get-back-top').addClass('loading');
        $('body').css({
            'overflow-y': 'hidden',
            'padding': 0
        });
        $(".header").removeClass("Top");
        $('.header').removeClass('scroll');
    });
    $(document).on('pjax:complete', function() { //pjax succeed
        $(".filter").hide();
        $('#all').removeClass('loading');
        $('body').removeClass('hover');
        $('.footer').removeClass('loading');
        $('.get-back-top').removeClass('loading');
        $('body').css({
            'overflow-y': 'auto',
            'padding-bottom': '220px'
        });
        active();
        prettyPrintCode();
        commentFn();

        // header 跳动动画
        $(".header").addClass("Top");

        if ($(window).width() > 768) {
            // 琴弦文字
            $(".container-sidebar .widget ul li a").qin({
                offset: 20, // default , 最大偏移量
                duration: 500, // default , 晃动时间
                recline: 0.1 // default , 每像素偏移量，越小“琴弦绷的越紧”
            });
        } else {
            $('#container').removeClass('container-scale');
            $('body').removeClass('mobile-scale');
            $('#container').css('height', 'auto');
        }
    });


    function active() {
        //去掉首页列表第一篇文章，避免同今日焦点栏目顶替文章重合
        let url = window.location.href;
        if (url == 'http://wsydxiangwang.cn/') {
            $(".container-left > .text-show").eq(0).remove();
        }
        // 手气不错 添加序列号
        let listNum = $('.container-sidebar .widget ul li');
        for (let i = 0; i < listNum.length; i++) {
            listNum.eq(i).find('em').html(i + 1)
        }
        // 所有图片禁止拖动
        $('.container-left .text-content img').attr('ondragstart', 'return false;')
            // title
        // document.addEventListener('visibilitychange', function() {
        //     if (document.visibilityState == 'hidden') {
        //         normal_title = document.title;
        //         document.title = '梦里花落知多少 ^_^ ~ ~';
        //     } else {
        //         // document.title = '永远相信美好的事情即将发生';
        //         // setTimeout(function() {
        //             document.title = normal_title;
        //         // }, 1200)
        //     }
        // });
        
        // 图片懒加载 start
        window.Echo = (function(window, document, undefined) {
            'use strict';
            var store = [],
                offset,
                throttle,
                poll;
            var _inView = function(el) {
                var coords = el.getBoundingClientRect();
                return ((coords.top >= 0 && coords.left >= 0 && coords.top) <= (window.innerHeight || document.documentElement.clientHeight) + parseInt(offset));
            };
            var _pollImages = function() {
                for (var i = store.length; i--;) {
                    var self = store[i];
                    if (_inView(self)) {
                        self.src = self.getAttribute('data-echo');
                        store.splice(i, 1);
                    }
                }
            };
            var _throttle = function() {
                clearTimeout(poll);
                poll = setTimeout(_pollImages, throttle);
            };
            var init = function(obj) {
                var nodes = document.querySelectorAll('[data-echo]');
                var opts = obj || {};
                offset = opts.offset || 0;
                throttle = opts.throttle || 250;
                for (var i = 0; i < nodes.length; i++) {
                    store.push(nodes[i]);
                }
                _throttle();
                if (document.addEventListener) {
                    window.addEventListener('scroll', _throttle, false);
                } else {
                    window.attachEvent('onscroll', _throttle);
                }
            };
            return {
                init: init,
                render: _throttle
            };
        })(window, document);
        Echo.init({
            offset: '0', //离可视区域多少像素的图片可以被加载
            throttle: '500' //图片延时多少毫秒加载
        });
        // 图片懒加载 end

            
        if ($(window).width() > 768) {
            // PC端文章页
            $('.text-box .sidebar-hide #btn + label').on('click', function() {
                if ($('.container-sidebar').css('display') === 'none') {
                    $('.container .container-left').removeClass('max-screen')
                    $('.container-sidebar').show(600);
                } else {
                    $('.container-sidebar').css('display', 'none');
                    $('.container .container-left').addClass('max-screen')
                }
            })
            if ($('.text-box .sidebar-hide #btn + label')) {
                setTimeout(function() {
                    $('.text-box .sidebar-hide #btn + label').click()
                }, 500)
            }
        } else {
            $('.container-filter').on('click', function() {
                $('#container').removeClass('container-scale');
                $('body').removeClass('mobile-scale');
                setTimeout(function() {
                    $('#container').css('height', 'auto');
                }, 500)
            })
            $('.nav ul li.mobile-front').unbind('click').on('click', function(){
                $('.nav ul li.mobile-front .nav-front-list').slideToggle();
            })
            $(document).bind('click', function(e){
                var target = $(e.target);
                if(target.closest(".nav ul li.mobile-front").length == 0){
                    $('.nav ul li.mobile-front .nav-front-list').slideUp();
                }
            })

        }
        if($(window).width() > 600){
            // 一个导航
            var off = true;

            $('.links-container .left-side ul li').click(function () {
                off = false;
                var _index = $(this).index();

                $(this).addClass('active').siblings().removeClass('active');

                // 获取内容块距顶部的距离
                var _height = $('.links-container .right-side .side-box-list').eq(_index).offset().top;
                $('html,body').animate({
                    scrollTop: _height
                }, 500, function () {
                    off = true;
                })
            })
            $(window).scroll(function () {
                if (off) {
                    var _top = $(window).scrollTop();
                    $('.links-container .right-side .side-box-list').each(function (i, index) {
                        var _index = $(this).index();
                        var _height = $(this).offset().top;
                        var _heights = $(this).height();

                        if ((_height - _top) > -_heights - 35 && (_height - _top) <= 0) {
                            $('.links-container .left-side ul li').eq(_index).addClass('active').siblings().removeClass('active')
                            return false;
                        }
                    })
                }
            })
        }else{
            // 一个导航
            $('.links-container .links-header > .links-icon').click(function(){
                $('.links-container').toggleClass('active');
            })
            var off = true;

            $('.links-container .left-side ul li').click(function () {
                off = false;
                var _index = $(this).index();

                $(this).addClass('active').siblings().removeClass('active');

                // 获取内容块距顶部的距离
                var _height = $('.links-container .right-side .side-box-list').eq(_index).offset().top;
                $('html,body').animate({
                    scrollTop: _height - 50
                }, 500, function () {
                    off = true;
                    $('.links-container').removeClass('active');
                })
            })
            $(window).scroll(function () {
                if (off) {
                    var _top = $(window).scrollTop();
                    $('.links-container .right-side .side-box-list').each(function (i, index) {
                        var _index = $(this).index();
                        var _height = $(this).offset().top;
                        var _heights = $(this).height();
                        
                        if ((_height - _top) > -_heights + 20 && (_height - _top) <= 52) {
                            $('.links-container .left-side ul li').eq(_index).addClass('active').siblings().removeClass('active')
                            return false;
                        }
                    })
                }
            })
        }
        // 文章页图片点击放大
        $('.container-left .text-content p img').on('click', function() {
            let imgText = $(this).parent().html();
            $('body').append('<div class="article-scale-img"><div>' + imgText + '</div></div>');
            $('body').css('overflow', 'hidden');
            $('.article-scale-img').animate({ opacity: '1' });
        })
        $('.shuoshuo-list>li .shuoshuo-text p img').on('click', function() {
            let imgText = $(this).parent().html();
            $('body').append('<div class="article-scale-img"><div>' + imgText + '</div></div>');
            $('body').css('overflow', 'hidden');
            $('.article-scale-img').animate({ opacity: '1' });
        })
        $(document).on('click', '.article-scale-img', function() {
            $(this).remove();
            $('body').css('overflow-y', 'auto')
            console.log(1)
        })


        $('#center .viewVideo').on('click', function(){
            $('#center .center-container .center-video').addClass('active');
            $('html').css('overflow-y', 'hidden');
        })

        $('#center .center-container .center-video span').on('click', function(){
            $('#center .center-container .center-video').removeClass('active');
            $('html').css('overflow-y', 'auto');

            $('#center .center-container .center-video video').get(0).pause(); 
        })

    }
    active();


    if ($(window).width() > 768) {

        // search
        $('.header .navto-search .fa').click(function() {
                $('.site-search').slideToggle();
                $(this).toggleClass('fa-remove');
                $(this).toggleClass('fa-search');
                if ($(this).hasClass('fa-search')) {
                    $('.header .navto-search .fa').attr('title', '打开搜索框');
                } else {
                    $('.header .navto-search .fa').attr('title', '关闭搜索框');
                }
            })
            // 琴弦文字 start
        $.extend($.easing, {
            easeOutElastic: function(x, t, b, c, d) {
                var s = 1.70158;
                var p = 0;
                var a = c;
                if (t == 0) return b;
                if ((t /= d) == 1) return b + c;
                if (!p) p = d * .3;
                if (a < Math.abs(c)) {
                    a = c;
                    var s = p / 4;
                } else {
                    var s = p / (2 * Math.PI) * Math.asin(c / a);
                    return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
                }
            }
        });
        $.fn.qin = function(options) {
            var defaults = {
                offset: 22, // 最大偏移量
                duration: 500, // 晃动时间
                recline: 0.1 // 每像素偏移量
            };
            var opt = $.extend({}, defaults, options);
            return this.each(function() {
                var $ele = $(this);
                fillSpan($ele);
                stringAnimate($ele, opt);
            });
        };

        function fillSpan($ele) {
            var baseContent = $ele.html();
            var content = '';
            for (var i = 0, len = baseContent.length; i < len; i++) {
                // content += '<span>' + baseContent[i] + '</span>' // IE8+
                content += '<span>' + baseContent.substr(i, 1) + '</span>' // 兼容到IE6...
            }
            $ele.html(content);
            var positionArr = []; //存放原始位置
            $ele.children('span').each(function() {
                var $span = $(this);
                var position = $span.position();
                positionArr.push(position);
                $span.css({
                    top: 0 + "px",
                    left: position.left + "px"
                });
                setTimeout(function() {
                    $span.css("position", "absolute");
                }, 0);
            });
            $ele.data("stringPosition", positionArr);
        }

        function stringAnimate($ele, opt) {
            var positionArr = $ele.data("stringPosition"); // 原始位置 
            var startX = 0; // 初始x轴位置
            var startY = 0; // 初始y轴位置
            $ele.mouseenter(function(ex) {
                var offset = $ele.offset();
                startX = ex.pageX - offset.left; // 鼠标在容器内 x 坐标
                startY = ex.pageY - offset.top; // 鼠标在容器内 y 坐标
            });
            $ele.mousemove(function(ex) {
                var offset = $ele.offset();
                var xPos = ex.pageX - offset.left; // 鼠标在容器内 x 坐标
                var yPos = ex.pageY - offset.top; // 鼠标在容器内 y 坐标
                var offsetY = yPos - startY; // Y轴移动距离
                if (Math.abs(offsetY) > opt.offset) { // 如果偏移超过最大值
                    return;
                }
                var ifDown = offsetY > 0; // 是否是向下移动

                $ele.children("span").each(function(index) {
                    var $span = $(this); // 当前span
                    var position = positionArr[index]; // 当前原始position
                    var reclineNum = Math.abs(xPos - position.left) * opt.recline; // Y 轴移动距离，基于原始位置
                    reclineNum *= ifDown ? 1 : (-1); // 基于向下为正方向
                    var resultY = position.top + offsetY - reclineNum;
                    if (ifDown && resultY < position.top) {
                        resultY = position.top;
                    } else if (!ifDown && resultY > position.top) {
                        resultY = position.top;
                    }
                    $span.css({
                        top: resultY + "px"
                    });
                });
            });
            $ele.mouseleave(function() {
                $ele.children("span").each(function(index) {
                    $(this).stop(true, false).animate({
                        top: 0 + "px"
                    }, {
                        duration: opt.duration,
                        easing: "easeOutElastic"
                    });
                });
            });
        };
        $(".container-sidebar .widget ul li a").qin({ // 调用
            offset: 20, // default , 最大偏移量
            duration: 500, // default , 晃动时间
            recline: 0.1 // default , 每像素偏移量，越小“琴弦绷的越紧”
        });
        //文字琴弦效果end
    } else {
        // nav-btn
        $('.header .fa-barcode').on('click', function() {
            $('#container').css({
                'height': $(window).height()
            })
            $('#container').addClass('container-scale');
            $('body').addClass('mobile-scale');
            $(window).scrollTop(0)
        })
    }

    // loading
    document.onreadystatechange = function() {
        if (document.readyState == "complete") {
            $('#container-loading').hide();
            $('body').removeClass('container-loading');
            // header 跳动动画
            $(".header").addClass("Top");
        }
    }
    // 上下滑动导航显示隐藏
    var t = 0,
        b = 0;
    $(window).scroll(function() {
            t = $(this).scrollTop();
            if (t > 200) {
                if (b < t) {
                    $('.header').addClass('scroll')
                } else {
                    $('.header').removeClass('scroll')
                }
                setTimeout(function() {
                    b = t
                }, 0);
            }
            // 滚动条距离 导航变化
            var scrollTop = $(document).scrollTop();
            if (scrollTop <= 0) {
                $('.header').addClass('Top').removeClass('hover');
            } else {
                $('.header').removeClass('Top').addClass('hover');
            }

            // 返回顶部
            if (scrollTop >= 500) {
                $('.get-back-top').addClass('show');
            } else {
                $('.get-back-top').removeClass('show');
            }
        })
        // 返回顶部
    $('.get-back-top').on('click', function() {
        $(this).addClass('active');
        setTimeout(function() {
            $('.get-back-top').removeClass('active');
        }, 1000)
        $('html, body').animate({
            scrollTop: 0
        }, 300);
        return false;
    })


    // 初始化prettyPrint
    function prettyPrintCode() {
        $("pre").addClass("prettyprint linenums");
        prettyPrint();
    }
    prettyPrintCode();

    // 点赞 start
    function succeed() {
        var $succeed = $('<div class="favorite-succeed"><i class="fa fa-times-circle"></i>您已经发表过意见了！</div>');

        $('body').append($succeed);

        $succeed.animate({
            top: '40%',
            opacity: 1
        }, 500, function() {
            setInterval(function() {
                $succeed.remove()
            }, 2000)
        })
    }
    $.fn.postLike = function() {
        if ($(this).hasClass('done')) {
            succeed();
        } else {
            var $this = $(this);
            var d = new Date();
            d.setHours(d.getHours() + (24 * 30));

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'setPostLike',
                    post_id: $this.data('id'),
                    post_key: $this.data('key'),
                },
                beforeSend: function() {
                    console.log('点赞中');
                },
                success: function(res) {
                    console.log('点赞成功')
                    document.cookie = 'post_link_' + $this.data('id') + '=done;path=/;expires=' + d.toGMTString();

                    $this.find('.people-num').text(res);
                    $this.parent().children().addClass('done');
                    $this.find('i.fa').toggleClass('fa-heart-o fa-heart');

                }
            });
        }
    };
    $(document).on("click", ".favorite", function() {
        $(this).postLike();
    });
    // 点赞 end

    // 背景音乐start
    var off = true;
    $(".control").click(function() {
        if (off) {
            $("#music").get(0).play()
        } else {
            $("#music").get(0).pause()
        }
        $(this).toggleClass("hover");
        off = !off;
    });
    // 背景音乐end

    // 跳动音符start
    var off_y = true;
    $(".mod-header_music-icon").click(function() {
        clearInterval(navMinHideSetTime); //清除鼠标离开li时候的定时器
        if (off_y) {
            $(this).removeClass("hover");
            $('.music-nav').addClass('activeNo');
            $(".nav ul.music-nav li > p").css("opacity", "0");
            $(this).attr("title", "钢琴音效NO");
        } else {
            $(this).addClass("hover");
            $('.music-nav').removeClass('activeNo');
            $(this).attr("title", "钢琴音效OFF");
            $(".nav ul.music-nav li > p").css("opacity", "1");
        }
        off_y = !off_y;
    });
    // 跳动音符end

    //钢琴导航start
    var $index = null;
    var musicObj = null;
    var navMinHideSetTime = null;
    var musicDown = $(".nav ul.music-nav li:not(.mod-header_music-icon)");

    $(".nav ul.music-nav > li:not(.mod-header_music-icon)").hover(function(event) {
        $index = $(this).index();
        var deta = $(this).attr("detaName");
        musicObj = $(".nav ul.music-nav > li:not(.mod-header_music-icon)").eq($index).find('audio');
        if (off_y) {
            $(this).addClass("active");
            musicObj.get(0).src = "https://yeyucm.cn/wp-content/themes/wsydxiangwang/music/" + deta + ".mp3";
        } else {
            musicObj.get(0).src = "";
        }
        event.stopPropagation();
    },
    function() {
        // clearInterval(navMinHideSetTime);
        // navMinHideSetTime = setInterval(function(){//不断检测鼠标移开后下拉二级菜单是否完好影藏
        //         if (searchShow && $(".nav-min").eq(0).css("opacity") == 0 && $(".nav-min").eq(1).css("opacity") == 0) {
        //             $(".header").css("z-index","10"); //避免在正常时候下方轮播分割旋转时候被遮盖 
        //             clearInterval(navMinHideSetTime);
        //         }
        //     },1000)
        $(this).removeClass("active");
    });

    function musicdown(number) {
        var objLi = $(".nav ul.music-nav li");
        var parameter = objLi.eq(number).attr("detaName");
        objLi.eq(number).find('audio').get(0).src = "https://yeyucm.cn/wp-content/themes/wsydxiangwang/music/" + parameter + ".mp3";
        if (number !== 8) {
            objLi.eq(number).addClass("active")
        }
    }

    $(document).keydown(function(event) {
        if (off_y) {
            //a65 s83 d68 f70 g71 h72 j74 k75 l76
            if (event.keyCode == 65) {
                musicdown(0)
            } else if (event.keyCode == 83) {
                musicdown(1)
            } else if (event.keyCode == 68) {
                musicdown(2)
            } else if (event.keyCode == 70) {
                musicdown(3)
            } else if (event.keyCode == 71) {
                musicdown(4)
            } else if (event.keyCode == 72) {
                musicdown(5)
            } else if (event.keyCode == 74) {
                musicdown(6)
            } else if (event.keyCode == 75) {
                musicdown(7)
            } else if (event.keyCode == 76) {
                musicdown(8)
            }
        }
    });
    $(document).keyup(function() {
        setTimeout(function() {
            musicDown.removeClass("active")
        }, 150);
    });
    //钢琴导航end

    // 页面点击 漂浮文字 start
    $(document).click(function(e) {
        var list = [
            '学而时习之，不亦说乎？',
            '有朋自远方来，不亦乐乎？',
            '人不知而不愠，不亦君子乎？',
            '巧言令色，鲜仁矣。',
            '吾日三省吾身。',
            '为人谋而不忠乎？与朋友交而不信乎？传不习乎？',
            '不患人之不己知，患不知人也。',
            '温故而知新，可以为师矣。',
            '学而不思则罔，思而不学则殆。',
            '知之为知之，不知为不知，是知也。',
            '见贤思齐焉，见不贤而内自省也。',
            '三人行，必有我师焉。',
            '择其善者而从之，其不善者而改之。',
            '士不可不弘毅，任重而道远。',
            '仁以为己任，不亦重乎？',
            '死而后已，不亦远乎？',
            '岁寒，然后知松柏之后凋也。',
            '有一言可以终身行之者乎？',
            '其恕乎！己所不欲，勿施于人。'
        ];
        textUp(e, 2000, list, 200)
    })
    var $float_text_i = 0;

    function textUp(e, time, arr, heightUp) {
        if ($float_text_i >= arr.length) $float_text_i = 0;
        var colors = '#' + Math.floor(Math.random() * 0xffffff).toString(16);
        var $i = $('<span class="floatText" />').text(arr[$float_text_i]);
        var xx = e.pageX || e.clientX + document.body.scroolLeft;
        var yy = e.pageY || e.clientY + document.body.scrollTop;
        $('body').append($i);
        $i.css({
            top: yy,
            left: xx,
            color: colors,
            transform: 'translate(-50%, -50%)',
            display: 'block',
            position: 'absolute',
            zIndex: 999999999999
        })
        setTimeout(function() {
            $i.animate({
                top: yy - (heightUp ? heightUp : 200),
                opacity: 0
            }, time, function() {
                $i.remove();
            })
        }, 300)
        $float_text_i++;
    }
    // 页面点击 漂浮文字 end

    // 评论 留言 start  -----------------------------------------------------------------------
    function commentFn() {
        // submit comment
        if (jQuery('#commentform').length) {
            jQuery('#commentform').submit(function() {
                var ajaxCommentsURL = window.location.href;
                jQuery.ajax({
                    url: ajaxCommentsURL,
                    data: jQuery('#commentform').serialize() + '&action=ajax_comment',
                    type: 'POST',
                    beforeSend: function() {
                        console.log('评论中')
                    },
                    error: function(request) { //发生错误时
                        $('#comment').val('');
                        alert(request.responseText)
                    },
                    success: function(data) {
                        console.log('评论成功')
                        if ($('#comments .comments-null').hasClass('zero')) {
                            $('#comments .comments-null').fadeOut();
                            $('#comments .comments-box').fadeIn();
                        } else {
                            console.log(3)
                        }
                        console.log(data)
                        var CommentsTotal = $('#comments .comments-title .commentCount').text();
                        var CommentsTotals = (parseInt(CommentsTotal)) + 1;
                        $('#comments .comments-title .commentCount').text(CommentsTotals);
                        $('#comments .commentList').prepend(data);
                        $('#comments .commentList .comment').first().hide(0, function() {
                            $(this).slideDown(1000)
                        })
                        $('#comment').val('');
                    }
                });
                return false;
            });
        }
        // set cookie 
        function setCookie(a, c) {
            var b = 30;
            var d = new Date();
            d.setTime(d.getTime() + b * 24 * 60 * 60 * 1000);
            document.cookie = a + "=" + escape(c) + ";expires=" + d.toGMTString()
        }
        // get cookie
        function getCookie(b) {
            var a, c = new RegExp("(^| )" + b + "=([^;]*)(;|$)");
            if (a = document.cookie.match(c)) {
                return unescape(a[2]);
            } else {
                return null;
            }
        }

        function inlojv_js_getqqinfo() {
            // get cookie
            if (getCookie('user_avatar') && getCookie('user_qq')) {
                $('div.comment-user-avatar img').attr('src', getCookie('user_avatar'));
                $('#qqinfo').val(getCookie('user_qq'));
            }
            $('#qqinfo').on('blur', function() {
                var qq = $('#qqinfo').val(); // 获取访客填在qq表单上的qq数字
                $('#email').val($.trim(qq) + '@qq.com'); // 将获取到的qq，改成qq邮箱填入邮箱表单      
                // get name
                $.ajax({
                    type: 'get',
                    url: 'http://wsydxiangwang.cn/wp-content/themes/wsydxiangwang/func_getqqinfo.php?type=getqqnickname&qq=' + qq, // func_getqqinfo.php是后端处理文件，注意路径，127.0.0.1 改成你自己的域名
                    dataType: 'jsonp',
                    jsonp: 'callback',
                    jsonpCallback: 'portraitCallBack',
                    success: function(data) {
                        $('#author').val(data[qq][6]); // 将返回的qq昵称填入到昵称input表单上
                        console.log('已获取昵称！');
                        setCookie('user_qq', qq); // 设置cookie
                    },
                    error: function() {
                        $('#qqinfo, #author, #email').val(''); // 如果获取失败则清空表单
                        console.log('糟糕，昵称获取失败！请重新填写。');
                    }
                });
                // get avatar
                $.ajax({
                    type: 'get',
                    url: 'http://wsydxiangwang.cn/wp-content/themes/wsydxiangwang/func_getqqinfo.php?type=getqqavatar&qq=' + qq, // func_getqqinfo.php是后端处理文件
                    dataType: 'jsonp',
                    jsonp: 'callback',
                    jsonpCallback: 'qqavatarCallBack',
                    success: function(data) {
                        // $('div.comment-user-avatar img').attr('src',data[qq]);  // 将返回的qq头像设置到你评论表单区域显示头像的节点上
                        console.log('已获取头像！'); // 弹出警告
                        console.log(data[qq])
                        setCookie('user_avatar', data[qq]); // 设置cookie
                    },
                    error: function() {
                        console.log('糟糕，获取头像失败了！请重新填写。'); // 弹出警告
                        $('#qqinfo, #author, #email').val(''); // 清空表单
                    }
                });
            });
        }
        inlojv_js_getqqinfo();
    }
    commentFn();
    // 评论 留言 start ------------------------------------------------------------------------


});