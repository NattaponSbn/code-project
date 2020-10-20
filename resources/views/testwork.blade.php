<div id="waterMark" style="position: absolute; left: 12; top: 460; width: 693; height: 19"><a href="#" onClick="window.scrollTo(0,0)"><img src="pic.jpg" border="0"></a></div>
<script language="JavaScript1.2">
    // กำหนดตำแหน่งของรูป
    markW = 90; // pixels wide
    markH = 40; // pixels high
    markX = 99; // percent right
    markY = 99; // percent down
    markRefresh = 50; // milliseconds

    // set common object reference
    if (!document.all) document.all = document;
    if (!document.all.waterMark.style) document.all.waterMark.style = document.all.waterMark;

    wMark = document.all.waterMark.style;
    wMark.width = markW;
    wMark.height = markH;
    navDOM = window.innerHeight; // Nav DOM flag

    function setVals() {
        barW = 0; // scrollbar compensation for PC Nav
        barH = 0;
        if (navDOM) {
            if (document.height > innerHeight) barW = 20;
            if (document.width > innerWidth) barH = 20;
        } else {
            innerWidth = document.body.clientWidth;
            innerHeight = document.body.clientHeight;
        }
        posX = ((innerWidth - markW) - barW) * (markX / 100);
        posY = ((innerHeight - markH) - barH) * (markY / 100);
    }

    function wRefresh() {
        wMark.left = posX + (navDOM ? pageXOffset : document.body.scrollLeft);
        wMark.top = posY + (navDOM ? pageYOffset : document.body.scrollTop);
    }

    function markMe() {
        setVals();
        window.onresize = setVals;
        markID = setInterval("wRefresh()", markRefresh);
    }

    window.onload = markMe; // safety for Mac IE4.5

    //-->
</script>