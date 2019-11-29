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
<title>夜雨导航</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
</head>
<body>

<?php /*
    Template Name: 导航
*/
?>

<div id="all">
    <?php get_header(); ?>
    <div id="container" class="container">
        <style>
        body{ background: #f3f6f8; padding-bottom:50px !important; }
        .footer-fixed, .footer, .header{ display: none; }
        .container{ width: auto; padding-top: 0px; }
        @media screen and (max-width: 768px){
            body{ padding-bottom: 0 !important; }
        }
        </style>
        <div class="container-filter"></div>
        <div class="links-container">
            <div class="links-header">
                <div class="links-icon"><img src="<?php bloginfo('template_url'); ?>/img/links-logo.png" alt=""></div>
                <div class="links-header-title"><a href="/">一个导航</a></div>
                <div class="links-icon"><img src="<?php bloginfo('template_url'); ?>/img/links-logo.png" alt=""></div>
            </div>
            <div class="left-side">
               <h2 class="links-title">夜雨导航</h2>
               <a class="links-home" href="/"><i class="fa fa-paper-plane"></i>夜雨绸缪</a>
                <ul class="title-list">
                    <li class="active"><i class="fa fa-user"></i>学习天地</li>
                    <li><i class="fa fa-user"></i>开发社区</li>
                    <li><i class="fa fa-user"></i>前端门户</li>
                    <li><i class="fa fa-user"></i>框架类库</li>
                    <li><i class="fa fa-user"></i>设计素材</li>
                </ul>
           </div> 
           <div class="right-side">
                <div class="side-box">
                    <div class="side-box-list">
                        <h2 class="list-title">学习天地</h2>
                        <ul class="list-box clear">
                            <li>
                                <a href="javascript:;" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/2-1.png" alt=""><span>慕课网</span></h2>
                                    <p>IT技能学习平台，程序员的梦工厂</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://study.163.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/2-2.png" alt=""><span>网易云课堂</span></h2>
                                    <p>一个专注职业技能提升的在线学习平台</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://ke.qq.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/2-3.png" alt=""><span>腾讯课堂</span></h2>
                                    <p>专业的在线教育平台</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.icourse163.org/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/2-4.png" alt=""><span>中国大学MOOC</span></h2>
                                    <p>国家精品课程在线学习平台</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://open.163.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/2-5.png" alt=""><span>网易公开课</span></h2>
                                    <p>国内外名校公开课,涉及广泛的学科,名校老师认真讲解深度剖析</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="side-box-list">
                        <h2 class="list-title">开发社区</h2>
                        <ul class="list-box clear">
                            <li>
                                <a href="https://juejin.im/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-1.png" alt=""><span>掘金</span></h2>
                                    <p>只有高手分享的中文技术社区</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://stackoverflow.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-2.png" alt=""><span>Stack Overflow</span></h2>
                                    <p>编程相关的IT技术问答网站</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-3.png" alt=""><span>GitHub</span></h2>
                                    <p>面向开源及私有软件项目的git托管平台</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://segmentfault.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-4.png" alt=""><span>SegmentFault</span></h2>
                                    <p>一个专注于解决编程问题，提高开发技能的社区。</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.v2ex.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-5.png" alt=""><span>V2EX</span></h2>
                                    <p>一个关于分享和探索的地方。</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.smashingmagazine.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-6.png" alt=""><span>Smashingmagazine</span></h2>
                                    <p>一个web技术类的博客杂志站点</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://cnodejs.org/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-7.png" alt=""><span>CNode</span></h2>
                                    <p>Node.js专业中文社区</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.qdfuns.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-9.png" alt=""><span>QDFuns</span></h2>
                                    <p>WEB前端开发工程师专业网站,一站式服务平台!</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.csdn.net/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-10.png" alt=""><span>CSDN</span></h2>
                                    <p>中国专业IT社区</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.softwhy.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-11.png" alt=""><span>蚂蚁部落</span></h2>
                                    <p>提供全面详细的前沿前端教程,精心雕琢每一篇文章,是将要从事前端和正在致力于前端的开发者的最佳选择,欢迎加入蚂蚁部落前端</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.codeceo.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-12.png" alt=""><span>码农网</span></h2>
                                    <p>一个专注程序员编程资料、编程经验、职场面试分享的博客平台</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.cnblogs.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-13.png" alt=""><span>博客园</span></h2>
                                    <p>一个面向开发者的知识分享社区</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://web.jobbole.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-14.png" alt=""><span>伯乐在线</span></h2>
                                    <p>做最专业的IT互联网职业社区</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.mamicode.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/1-15.png" alt=""><span>码迷</span></h2>
                                    <p>专注于技术文章分享。</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="side-box-list">
                        <h2 class="list-title">前端门户</h2>
                        <ul class="list-box clear">
                            <li>
                                <a href="http://www.w3school.com.cn/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-1.png" alt=""><span>w3school</span></h2>
                                    <p>前端入门教程网站，全球最大的中文 Web 技术教程。</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.runoob.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-2.png" alt=""><span>菜鸟教程</span></h2>
                                    <p>学的不只是技术，更是梦想！</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.maiziedu.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-3.png" alt=""><span>麦子学院</span></h2>
                                    <p>第一个入门学习的网站，专注IT职业在线教育</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.miaov.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-4.png" alt=""><span>妙味课堂</span></h2>
                                    <p>妙味课堂是国内资深的前端开发培训机构,妙味课堂拥有系统的教程课程</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.lvyestudy.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-5.png" alt=""><span>绿叶学习网</span></h2>
                                    <p>绿叶学习网-给你初恋般的感觉~</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.daqianduan.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-6.png" alt=""><span>大前端</span></h2>
                                    <p>旨在更完善的为各位前端爱好者提供阅读和自我提升服务。</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.w3cplus.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-7.png" alt=""><span>W3cplus</span></h2>
                                    <p>W3cplus是一个致力于推广国内前端行业的技术博客</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://w3ctech.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/3-8.png" alt=""><span>w3ctech</span></h2>
                                    <p>中国最大的前端技术社区</p>
                                </a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="side-box-list">
                        <h2 class="list-title">框架类库</h2>
                        <ul class="list-box clear">
                            <li>
                                <a href="https://cn.vuejs.org/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-1.png" alt=""><span>Vue</span></h2>
                                    <p>构建数据驱动的web界面的渐进式框架</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://reactjs.org/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-2.png" alt=""><span>React</span></h2>
                                    <p>用于构建用户界面的Javscript库</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.jquery123.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-3.png" alt=""><span>jQuery</span></h2>
                                    <p>优秀的JavaScript代码库</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.bootcss.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-4.png" alt=""><span>Bootstrap</span></h2>
                                    <p>基于HTML/CSS/Javscript的前端框架</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://rxjs-dev.firebaseapp.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-5.png" alt=""><span>RxJs</span></h2>
                                    <p>提供强大的数据流组合和控制能力的Reactive编程库</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://reactnative.cn/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-2.png" alt=""><span>React Native</span></h2>
                                    <p>使用React构建原生app的框架</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://amazeui.org/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-6.png" alt=""><span>Amaze UI</span></h2>
                                    <p>Amaze UI 是一个移动优先的跨屏前端框架</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://reactnative.cn/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/4-7.png" alt=""><span>UIkit</span></h2>
                                    <p>一款轻量级、模块化的前端框架,可快速构建强大的前端web界面</p>
                                </a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="side-box-list">
                        <h2 class="list-title">设计素材</h2>
                        <ul class="list-box clear">
                            <li>
                                <a href="https://ibaotu.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-1.png" alt=""><span>包图</span></h2>
                                    <p>各种流行趋势,视觉冲击力强的原创广告图片设计、电商淘宝、企业办公模板素材</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://588ku.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-2.png" alt=""><span>千库</span></h2>
                                    <p>免费png图片背景素材下载,做设计不抠图</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.nicepsd.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-3.png" alt=""><span>NicePSD</span></h2>
                                    <p>优质设计素材下载站</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.zcool.com.cn/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-4.png" alt=""><span>站酷</span></h2>
                                    <p>打开站酷,发现更好的设计!</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.51yuansu.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-5.png" alt=""><span>觅元素</span></h2>
                                    <p>设计元素的免费下载网站</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://dameigong.cn/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-6.png" alt=""><span>大美工</span></h2>
                                    <p>一个收罗优秀网页设计、电商设计、网店设计、平面设计、UI设计灵感地</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://90sheji.com/" target="_blank">
                                    <h2><img src="<?php bloginfo('template_url'); ?>/img/link/5-7.png" alt=""><span>90设计</span></h2>
                                    <p>让电商设计找灵感和素材更效率。</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                   
                </div>
           </div>
        </div>
    </div>
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