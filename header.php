<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/prettify.css">

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/index.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prettify.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.pjax.js"></script>


<div class="header">
	<div class="header-top">
		<div class="header-list clear">
			<span class="head-greet"></span>
			<span class="head-time"></span>
		</div> 
	</div>
	<div class="header-conter clear">
		<a class="logo" href="/">
			<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
		</a>
		<div class="nav pc-nav">
			<ul class="music-nav">
				<li detaName="do">
					<a href="/">
						<span data-href="/">首页</span>
						<span data-href="/">首页</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="re">
					<a href="/category/mood-town">
						<span>心情小镇</span>
						<span>心情小镇</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="mi" class="front">
					<a href="javascript:void(0);">
						<span>技术世界</span>
						<span>技术世界</span>
					</a>
					<div class="nav-front-list">
						<a href="/category/mood-town/">JavaScript</a>
						<a href="/category/jquery/">jquery</a>
						<a href="/category/vue/">Vue</a>
						<a href="/category/css/">CSS</a>
					</div>

					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="fa">
					<a href="/phrase.html">
						<span>微言细语</span>
						<span>微言细语</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="sol">
					<a href="/RainyDay.html" target="_blank">
						<span>Raing Day</span>
						<span>Raing Day</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="la">
					<a href="/links.html">
						<span>夜雨导航</span>
						<span>夜雨导航</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="si">
					<a href="/comments.html">
						<span>偶然相遇</span>
						<span>偶然相遇</span>
					</a>
					<audio src="" autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="dd">
					<a href="/myself.html">
						<span>蓦然回首</span>
						<span>蓦然回首</span>
					</a>
					<audio src=""  autoplay="autoplay"></audio>
					<p></p>
				</li>
				<li detaName="ddd" class="js_piano_nav_icon mod-header_music-icon hover" title="钢琴节奏">
					<audio src=""  autoplay="autoplay"></audio>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</li>
			</ul>
			<div class="navto-search">
				<a href="javascript:;" class="search-show active">
					<i class="fa fa-search" title="打开搜索框"></i>
				</a>
			</div>
		</div>
		<span class="fa fa-barcode"></span>
	</div>
	<div class="site-search active">
		<div class="container" style="padding-top: 10px;">
			<form role="search" method="get" id="searchform" class="site-search-form" action="<?php bloginfo('url'); ?>">
				<input class="search-input" name="s" id="s" type="text" value="" placeholder="输入关键字搜索">
				<button class="search-btn" type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
</div>
<div class="nav-filter"></div>
<div class="nav mobile-nav">
	<div class="nav-me">
	    <div class="me-bg"></div>
	    <a href="/myself.html">
	        <img src="<?php bloginfo('template_url'); ?>/images/me2.jpg" alt="">
	    </a>
	</div>
	<ul class="music-nav">
		<li detaName="do">
			<a href="/">
				<span data-href="/">首页</span>
				<span data-href="/">首页</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="re">
			<a href="/category/mood-town">
				<span>心情小镇</span>
				<span>心情小镇</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="mi" class="mobile-front">
			<a href="javascript:void(0);">
				<span>技术世界</span>
				<span>技术世界</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
			<div class="nav-front-list">
				<a href="/category/mood-town/">JavaScript</a>
				<a href="/category/jquery/">jquery</a>
				<a href="/category/vue/">Vue</a>
				<a href="/category/css/">CSS</a>
			</div>
		</li>
		<li detaName="fa">
			<a href="/phrase.html">
				<span>微言细语</span>
				<span>微言细语</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="sol">
			<a href="/RainyDay.html" targit="_blank">
				<span>Raing Day</span>
				<span>Raing Day</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="la">
			<a href="/links.html">
				<span>夜雨导航</span>
				<span>夜雨导航</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="si">
			<a href="/comments.html">
				<span>偶然相遇</span>
				<span>偶然相遇</span>
			</a>
			<audio src="" autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="dd">
			<a href="/myself.html">
				<span>蓦然回首</span>
				<span>蓦然回首</span>
			</a>
			<audio src=""  autoplay="autoplay"></audio>
			<p></p>
		</li>
		<li detaName="ddd" class="js_piano_nav_icon mod-header_music-icon hover" title="钢琴节奏">
			<audio src=""  autoplay="autoplay"></audio>
			<i></i>
			<i></i>
			<i></i>
			<i></i>
			<i></i>
		</li>
<!-- 	</ul>
	<div class="navto-search">
		<a href="javascript:;" class="search-show active">
			<i class="fa fa-search" title="打开搜索框"></i>
		</a>
	</div> -->
</div>