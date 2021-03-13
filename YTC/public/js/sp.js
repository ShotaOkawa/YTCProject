$(window).resize(function(){
    //windowの幅をxに代入
    var x = $(window).width();
    //windowの分岐幅をyに代入
    var y = 801;
    if (x <= y) {
        document.getElementById("logo").style.display ="none";
    }else{
        document.getElementById("logo").style.display ="block";
    }
});