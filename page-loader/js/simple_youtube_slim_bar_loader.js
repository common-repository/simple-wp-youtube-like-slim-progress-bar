jQuery(document).ready(function(){
    jQuery(document).ready(function() {
        NProgress.start();
    });
    jQuery(window).load(function() {
        setTimeout(function(){NProgress.done()},2000);
    });
});