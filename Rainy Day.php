<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title>Rainy Day</title>
<link rel="shortcut icon" type="image/x-icon" href="wp-content/themes/wsydxiangwang/favicon.ico" />
<style>
body{
    background-image: url('wp-content/themes/wsydxiangwang/img/rain/rain-bg.gif');
    background-size: cover;
}
.word{
    position: fixed;
    top: 0;
    right: 0;
    z-index: 9;
}
#options{
    position: fixed;
    z-index: 9;
    color: #fff;
    bottom: 10%;
    right: 10%;
}
#options > div{
    float: left;
    width: 60px;
    height: 60px;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
}
#options > div span{
    width: 100%;
    height: 100%;
    display: inline-block;
    position: absolute;
    top: 0;
    left: 0;
}
#options > div span:first-of-type{
    display: none;
    opacity: .8;
}
#options > div.checked span:first-of-type{
    display: block;
}
#options > div.checked span:last-of-type{
    display: none;
}

#options .soft_rain{}
#options .soft_rain #rainOn{
    background: url('wp-content/themes/wsydxiangwang/img/rain/rainon.png') center center no-repeat;
}
#options .soft_rain #rainOff{
    background: url('wp-content/themes/wsydxiangwang/img/rain/rainoff.png') center center no-repeat;
}
#options .rolling_thunder{}
#options .rolling_thunder #rollingThunderOn{
    background: url('wp-content/themes/wsydxiangwang/img/rain/rollingthunder_on.png') center center no-repeat;
}
#options .rolling_thunder #rollingThunderOff{
    background: url('wp-content/themes/wsydxiangwang/img/rain/rollingthunder_off.png') center center no-repeat;
}
#options .loud_thunder{}
#options .loud_thunder #loudThunderOn{
    background: url('wp-content/themes/wsydxiangwang/img/rain/loudthunder_on.png') center center no-repeat;
}
#options .loud_thunder #loudThunderOff{
    background: url('wp-content/themes/wsydxiangwang/img/rain/loudthunder_off.png') center center no-repeat;
}
.loading-box{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99;
}
.loading-box img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.loading-box > div{ 
    background: url(wp-content/themes/wsydxiangwang/img/rain/note.png);
    color: #000;
    width: 320px;
    height: 220px;
    background-size: contain;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    transform: translateY(-20px);
}
.loading-box > div > span{
    width: 11em;
    overflow: hidden;
    white-space: nowrap;
    border-right: 0.1em solid;
    display: block;
    animation: typing 8s steps(11), caret 0.5s steps(1) infinite;
    transform: translate(-10px, 20px);
}
@keyframes typing { 
   from { width: 0; } 
} 
@keyframes caret { 
   50% { border-color: transparent; } 
} 
.loading-box > div > div{
    position: absolute;
    bottom: 40px;
    margin-left: -16px;
}
.loading-box > div > div i:nth-child(1) {
  -webkit-animation-delay: 0.77s;
          animation-delay: 0.77s;
  -webkit-animation-duration: 1.26s;
          animation-duration: 1.26s; }
.loading-box > div > div i:nth-child(2) {
  -webkit-animation-delay: 0.29s;
          animation-delay: 0.29s;
  -webkit-animation-duration: 0.43s;
          animation-duration: 0.43s; }
.loading-box > div > div i:nth-child(3) {
  -webkit-animation-delay: 0.28s;
          animation-delay: 0.28s;
  -webkit-animation-duration: 1.01s;
          animation-duration: 1.01s; }
.loading-box > div > div i:nth-child(4) {
  -webkit-animation-delay: 0.74s;
          animation-delay: 0.74s;
  -webkit-animation-duration: 0.73s;
          animation-duration: 0.73s; }
.loading-box > div > div i {
    background-color: #279fcf;
    width: 2px;
    height: 15px;
    border-radius: 2px;
    margin: 1px;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    display: inline-block;
    -webkit-animation-name: line-scale-party;
    animation-name: line-scale-party;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-delay: 0;
    animation-delay: 0; 
}

@-webkit-keyframes line-scale-party {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1); }

  50% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5); }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes line-scale-party {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1); }

  50% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5); }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1); } }

</style>
</head>
<body>
<?php
/*
Template Name: Rainy Day
*/
?>
<img class="word" src="wp-content/themes/wsydxiangwang/img/rain/words.png" alt="">  

<div id="options">
    <div class="soft_rain checked">
        <span id="rainOn"></span>
        <span id="rainOff"></span>
    </div>
    <div class="rolling_thunder">
        <span id="rollingThunderOn"></span>
        <span id="rollingThunderOff"></span>
    </div>
    <div class="loud_thunder">
        <span id="loudThunderOn"></span>
        <span id="loudThunderOff"></span>
    </div>
</div>
<div class="loading-box">
    <img src="wp-content/themes/wsydxiangwang/img/rain/loading-bg.jpg" alt="">
    <div>
        <span>下雨啦，你喜欢雨天吗？</span>
        <div>
            <i></i>
            <i></i>
            <i></i>
            <i></i>
        </div>
    </div>
</div>
<audio id="audio1" loop src="wp-content/themes/wsydxiangwang/img/rain/rainfade_1.mp3" autoplay>
  Your browser does not support this audio format.
</audio>
<audio id="audio2" loop src="wp-content/themes/wsydxiangwang/img/rain/thunderfade_1.mp3">
  Your browser does not support this audio format.
</audio>
<audio id="audio3" loop src="wp-content/themes/wsydxiangwang/img/rain/loudthunderfade_1.mp3">
  Your browser does not support this audio format.
</audio>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>
<script>
$(function(){
    $('#options > div').on('click', function(){

        var aIndex = $(this).index();

        $(this).toggleClass('checked');

        if($(this).children().eq(0).css('display') == 'block'){
            $('audio').eq(aIndex).get(0).volume = 0.4;
            $('audio').eq(aIndex).get(0).play();
        }else{
            $('audio').eq(aIndex).get(0).pause();
        }
    })
    document.onreadystatechange = function(){
        setTimeout(function(){
            if(document.readyState == "complete"){
                $('.loading-box').hide();
            }
        }, 10000)
    }
})
</script>
</body>
</html>