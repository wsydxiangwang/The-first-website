<div class="footer">
    <div class="container">
        <p>即使生活不如意，也要记得微笑哦！！</p>
        <p style="color:#00a8ff;">
            该网站勉强运行 :
            <span id="htmer_time"></span>
        </p>
        <p style="color:#00a8ff">©2018-2019 By Libai <span class="min-block">Please believe in the power of persistence</span></p>
    </div>
</div>
<div class="footer-fixed"></div>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>
<script>
$(function(){
    function secondToDate(second) {
        if (!second) {
            return 0;
        }
        var time = new Array(0, 0, 0, 0, 0);
        if (second >= 365 * 24 * 3600) {
            time[0] = parseInt(second / (365 * 24 * 3600));
            second %= 365 * 24 * 3600;
        }
        if (second >= 24 * 3600) {
            time[1] = parseInt(second / (24 * 3600));
            second %= 24 * 3600;
        }
        if (second >= 3600) {
            time[2] = parseInt(second / 3600);
            second %= 3600;
        }
        if (second >= 60) {
            time[3] = parseInt(second / 60);
            second %= 60;
        }
        if (second > 0) {
            time[4] = second;
        }
        return time;
    }
    function setTime() {
        // 博客创建时间秒数，时间格式中，月比较特殊，是从0开始的，所以想要显示5月，得写4才行，如下
        var create_time = Math.round(new Date(Date.UTC(2018, 10, 03, 0, 0, 0))
            .getTime() / 1000);
        // 当前时间秒数,增加时区的差异
        var timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
        currentTime = secondToDate((timestamp - create_time));
        currentTimeHtml = currentTime[0] + '年' + currentTime[1] + '天' +
        currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4] +
        '秒';
        document.getElementById("htmer_time").innerHTML = currentTimeHtml;
    }
    setInterval(setTime, 1000);

    function play(){
        function num(n){
            if( n < 10 ){
                return '0' + n;
            }else{
                return n;
            }
        }
        var myDate = new Date(),
            weekday = [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
            year = myDate.getFullYear(),
            month = myDate.getMonth() + 1,
            date = myDate.getDate() ,
            week = weekday[myDate.getDay()],
            hours = myDate.getHours(),
            minutes = myDate.getMinutes(),
            seconds = myDate.getSeconds(),
            hello;
        if (hours < 6) {
            hello = '凌晨好！你知道么，早起的鸟儿有虫吃哦 ~ ~';
        } else if (hours < 9) {
            hello = '早上好！依然要记得保持微笑哦 ~';
        } else if (hours < 12) {
            hello = '上午好！今天也要元气满满的哦 加油 ~';
        } else if (hours < 14) {
            hello = '中午好！吃完饭 要不再睡个午觉 哈哈 ~ ~';
        } else if (hours < 17) {
            hello = '下午好！工作了一天 注意休息哦 ~';
        } else if (hours < 19) {
            hello = '傍晚好！买菜做饭 一本书 一首音乐 抒情 惬意 ~ ~';
        } else if (hours < 22) {
            hello = '夜深人静时，你脑海中浮现的是什么呢！！ ';
        } else {
            hello = '早点休息，不能熬夜哦，要照顾好自己，爱自己 ~ ~';
        }
        var thisDate = year + '年' + num(month) + '月' + num(date) + '日  ' + week + '  ' + num(hours) + ':' + num(minutes) + ':' + num(seconds);

        document.getElementsByClassName('head-greet')[0].innerHTML = hello;
        document.getElementsByClassName('head-time')[0].innerHTML = '当前时间：' + thisDate;
    }
    play();
    setInterval(play, 1000);    


    /**
     * 神兽庇佑，万码朝宗
     */
    var noattack = '　　　　　　　┏┓　　　┏┓+ +\n'
        +'　　　　　　┏┛┻━━━┛┻┓ + +\n'
        +'　　　　　　┃　　　　　　　┃\n'
        +'　　　　　　┃　　　━　　　┃ ++ + + +\n'
        +'　　　　　 ████━████ ┃+\n'
        +'　　　　　　┃　　　　　　　┃ +\n'
        +'　　　　　　┃　　　┻　　　┃\n'
        +'　　　　　　┃　　　　　　　┃ + +\n'
        +'　　　　　　┗━┓　　　┏━┛\n'
        +'　　　　　　　　┃　　　┃\n'
        +'　　　　　　　　┃　　　┃ + + + +\n'
        +'　　　　　　　　┃　　　┃　　　　Mythical animals bless, website no attack\n'
        +'　　　　　　　　┃　　　┃ + 　　　　神兽保佑,网站无攻击\n'
        +'　　　　　　　　┃　　　┃\n'
        +'　　　　　　　　┃　　　┃　　+\n'
        +'　　　　　　　　┃　 　　┗━━━┓ + +\n'
        +'　　　　　　　　┃ 　　　　　　　┣┓\n'
        +'　　　　　　　　┃ 　　　　　　　┏┛\n'
        +'　　　　　　　　┗┓┓┏━┳┓┏┛ + + + +\n'
        +'　　　　　　　　　┃┫┫　┃┫┫\n'
        +'　　　　　　　　　┗┻┛　┗┻┛+ + + +';

    console.log('%c' + noattack, "color:orange");
    console.log('%c' + 'QQ: 1915398623', "color:#1ba1e2");
    console.log('%c' + 'WeChat: wsydxiangwang', "color:#1ba1e2");
})
</script>