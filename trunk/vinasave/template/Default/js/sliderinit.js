jQuery(document).ready(function(){
    var jsFolder = project_url+"template/Default/images/slider/";
    jQuery("#amazingslider-7").amazingslider({
        jsfolder:jsFolder,
        width:870,
        height:220,
        watermarkstyle:"text",
        loadimageondemand:false,
        watermarktext:"http://amazingslider.com",
        isresponsive:true,
        autoplayvideo:false,
        watermarkimage:"",
        pauseonmouseover:false,
        watermarktextcss:"font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;padding:2px 4px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);",
        randomplay:false,
        showwatermark:false,
        watermarklinkcss:"text-decoration:none;font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;",
        slideinterval:5000,
        watermarktarget:"_blank",
        watermarkpositioncss:"display:block;position:absolute;top:4px;left:4px;",
        watermarklink:"http://amazingslider.com",
        transitiononfirstslide:false,
        loop:0,
        autoplay:true,
        navplayvideoimage:"play-32-32-0.png",
        navpreviewheight:60,
        timerheight:2,
        skin:"Classic",
        textautohide:false,
        addgooglefonts:true,
        navshowplaypause:true,
        navshowplayvideo:false,
        navbuttonradius:0,
        navpreviewposition:"top",
        navpreviewarrowheight:8,
        showshadow:false,
        navfeaturedarrowimagewidth:16,
        navpreviewwidth:120,
        googlefonts:"Inder",
        textpositionmarginright:24,
        navcolor:"#999999",
        arrowwidth:32,
        navmargin:16,
        texteffecteasing:"easeOutCubic",
        texteffect:"fade",
        navspacing:8,
        navarrowimage:"navarrows-28-28-0.png",
        navwidth:24,
        navheight:24,
        timeropacity:0.6,
        descriptioncss:"display:block; position:relative; font:14px Inder,Arial,Tahoma,Helvetica,sans-serif; color:#333;",
        navpreviewbordercolor:"#ffffff",
        arrowstyle:"mouseover",
        textpositionmargintop:24,
        navswitchonmouseover:false,
        playvideoimage:"playvideo-64-64-0.png",
        arrowimage:"arrows-32-32-1.png",
        textstyle:"none",
        playvideoimageheight:64,
        navfonthighlightcolor:"#666666",
        showbackgroundimage:false,
        navpreviewborder:4,
        shadowcolor:"#aaaaaa",
        navbuttonshowbgimage:true,
        navbuttonbgimage:"navbuttonbgimage-28-28-0.png",
        textbgcss:"display:block; position:absolute; top:0px; left:0px; width:100%; height:100%; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; background-color:#fff; opacity:0.7; filter:alpha(opacity=70);",
        navpreviewarrowwidth:16,
        playvideoimagewidth:64,
        bottomshadowimagewidth:110,
        showtimer:false,
        navshowpreview:true,
        navradius:0,
        navfeaturedarrowimage:"featuredarrow-16-8-0.png",
        navfeaturedarrowimageheight:8,
        navstyle:"bullets",
        textpositionmarginleft:24,
        navplaypauseimage:"navplaypause-28-28-0.png",
        backgroundimagetop:-10,
        timercolor:"#ffffff",
        navfontsize:12,
        navhighlightcolor:"#333333",
        navimage:"bullet-24-24-1.png",
        navbuttoncolor:"#999999",
        navshowarrow:true,
        textcss:"display:block; padding:8px 16px; text-align:left; ",
        titlecss:"display:block; position:relative; font: 16px Inder,Arial,Tahoma,Helvetica,sans-serif; color:#000;",
        navshowbuttons:false,
        arrowhideonmouseleave:1000,
        navopacity:0.8,
        backgroundimagewidth:120,
        bordercolor:"#ffffff",
        arrowheight:32,
        arrowmargin:8,
        texteffectduration:1000,
        bottomshadowimage:"bottomshadow-110-95-3.png",
        border:0,
        timerposition:"bottom",
        navfontcolor:"#333333",
        bottomshadowimagetop:95,
        borderradius:0,
        navbuttonhighlightcolor:"#333333",
        textpositionstatic:"bottom",
        navshowfeaturedarrow:false,
        navbordercolor:"#ffffff",
        navpreviewarrowimage:"previewarrow-16-8-0.png",
        showbottomshadow:true,
        backgroundimage:"",
        navposition:"bottom",
        navborder:4,
        textpositiondynamic:"bottomleft",
        shadowsize:5,
        textpositionmarginbottom:24,
        threedhorizontal: {
            checked:true,
            bgcolor:"#222222",
            perspective:1000,
            slicecount:1,
            duration:1500,
            easing:"easeOutCubic",
            fallback:"slice",
            scatter:5,
            perspectiveorigin:"bottom"
        },
        threed: {
            checked:true,
            bgcolor:"#222222",
            perspective:1000,
            slicecount:5,
            duration:1500,
            easing:"easeOutCubic",
            fallback:"slice",
            scatter:5,
            perspectiveorigin:"right"
        },
        transition:"threedhorizontal,threed"
    });
    
    

    function mycarousel_initCallback(carousel)
    {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function() {
            carousel.startAuto(0);
        });

        carousel.buttonPrev.bind('click', function() {
            carousel.startAuto(0);
        });

        // Pause autoscrolling if the user moves with the cursor over the clip.
        carousel.clip.hover(function() {
            carousel.stopAuto();
        }, function() {
            carousel.startAuto();
        });
    };

    
        jQuery('#mycarousel').jcarousel({
            auto: 2,
            wrap: 'last',
            initCallback: mycarousel_initCallback
        });
    

    
});