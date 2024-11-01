<?php
/*
Plugin Name: Simple WP YouTube like slim progress bar
Plugin URI: http://vijay.pro
Description: Simple WordPress YouTube like slim progress bar inspired from NProgress.js. Set your progress bar color in settings -> YouTube like loader.
Version: 1.1.0
Author: Vijayakumar S (core WordPress Developer)
Author URI: http://vijay.pro
License: GNU General Public License v3 or later
*/
define('swpytlspb_YOUTUBE_LIKE_PLUGIN_LOADER_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

function swpytlspb_youtube_like_loading_bar_jquery() {
    wp_enqueue_script('jquery');
}
add_action('init', 'swpytlspb_youtube_like_loading_bar_jquery');

function swpytlspb_youtube_like_loading_bar_js() {
    wp_enqueue_script('youtube_like_loading-main-js-active', swpytlspb_YOUTUBE_LIKE_PLUGIN_LOADER_PATH.'js/nprogress.min.js',
        array('jquery'));
}
add_action('init', 'swpytlspb_youtube_like_loading_bar_js');

function swpytlspb_youtube_like_loading_bar_css() {
    wp_enqueue_style('youtube_like_loading-css-active', swpytlspb_YOUTUBE_LIKE_PLUGIN_LOADER_PATH.'css/nprogress.min.css');
}
add_action('init', 'swpytlspb_youtube_like_loading_bar_css');

function swpytlspb_youtube_like_loading_bar_js_config() {
    wp_register_script('youtube_like_loading-js-active', swpytlspb_YOUTUBE_LIKE_PLUGIN_LOADER_PATH.'js/simple_youtube_slim_bar_loader.js', array('jquery'));
    wp_enqueue_script('youtube_like_loading-js-active');
}
add_action('wp_enqueue_scripts', 'swpytlspb_youtube_like_loading_bar_js_config');

add_action('admin_menu', 'swpytlspb_add_youtube_like_loading_options');
function swpytlspb_add_youtube_like_loading_options()
{
    add_options_page('YouTube like loader', 'YouTube like loader', 'manage_options', 'functions','swpytlspb_youtube_like_loading_options');
}
function swpytlspb_youtube_like_loading_options()
{
    ?>
    <div class="wrap">
        <h2>YouTube like loading bar - Settings</h2>
        <div class="welcome-panel" style="padding-top: 10px;">
            <p>Use below settings to configure your YouTube like pageloader in a minute.</p>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p style="margin-top: 0;"><strong>Progress Bar Color</strong><br />
                <input type="text" name="progressBarColor" id="progressBarColors" maxlength="7" value="<?php echo get_option('progressBarColor'); ?>"
                style="margin-top: 1%;"/> (Ex: #ffff) [Use <a href="http://www.colorpicker.com" target="_blank" rel="nofollow">Color Picker tool</a>, to get your color]
            </p>
            <p><strong>Spinner Icon</strong><br />
                <div style="height: 1%;"></div>
                <input type="radio" name="spinner-icon" id="spinner-icon-block" value="block" <?php echo (get_option('spinner-icon') == "block")? "checked" : "";?> /> <label for="spinner-icon-block">Block</label>
                <input type="radio" name="spinner-icon" id="spinner-icon-hidden" value="hidden" <?php echo (get_option('spinner-icon') == "hidden")? "checked" : "";?> /> <label for="spinner-icon-hidden">Hidden</label>
            </p>
            <p><input type="submit" name="Submit" class="button button-primary" value="Save Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="progressBarColor,spinner-icon" />
        </form>
        </div>
    <div class="welcome-panel" style="padding-top: 10px;">
        <div class="welcome-panel-content">
            <h2>Thanks for using WP YouTube like slim progress bar plugin!</h2>
            <h3>About Plugin</h3>
            <p>A nanoscopic progress bar (inspired from <a href="http://ricostacruz.com/nprogress/" target="_blank" rel="nofollow">NProgress.js</a>). Featuring realistic trickle animations to convince your users that something is happening!</p>
            <h3>About Plugin Author</h3>
            <p>Vijayakumar Selvaraj working as a Sr. UI Developer for Cognizant Technology Solutions, Bengaluru. He done many other hats too and he is your humble multi-tasking man; PHP Geek, Entrepreneur, Freelance UI/WordPress Theme/Plugin developer. He is the founder director of <a href="http://oddanchatram.in" target="_blank">Oddanchatram.in</a>, a popular portal about the latest happenings in the town of the same name in Dindigul district, TamilNadu, India.</p>
            <p>He have worked in and completed over 100 projects since 2008, you can see his <a target="_blank" href="http://vijay.pro/portfolio/">portfolio</a>.</p>
            <p>He freelance and offer solutions and expertise in web development, content management system using core PHP &amp; WordPress.</p>
            <h3>Follow the author</h3>
            <p>
                <ul>
                    <li><a href="http://vijay.pro/" target="_blank">Website</a></li>
                    <li><a href="http://vijay.pro/facebook" target="_blank">Facebook</a></li>
                    <li><a href="http://vijay.pro/twitter" target="_blank">Twitter</a></li>
                    <li><a href="https://plus.google.com/u/0/+VijayakumarSmrvijayakumar?rel=author" target="_blank">Google+</a></li>
                    <li><a href="http://vijay.pro/linkedin" target="_blank">Linkedin</a></li>
                </ul>
            </p>
        </div>
    </div>
    </div>
    <?php
}
function swpytlspb_youtube_like_loading_bar_overRide(){
    $progressBarColor = (swpytlspb_is_hex(get_option('progressBarColor'))) ? get_option('progressBarColor') : "#29d";
    $spinner_icon = (get_option('spinner-icon') == "hidden") ? "none" : "block";
    ?>
    <!- Youtube like loading bar plugin by Vijayakumar Selvaraj (http://vijay.pro) starts->
    <style type="text/css">
        #nprogress .bar {background: <?php echo $progressBarColor;?>!important;}
        #nprogress .peg {box-shadow: 0 0 10px <?php echo $progressBarColor;?>, 0 0 5px <?php echo $progressBarColor; ?>!important;}
        #nprogress .spinner-icon {border-top-color: <?php echo $progressBarColor;?>!important;border-left-color: <?php echo $progressBarColor;?>!important;}
        #nprogress .spinner-icon {display: <?php echo $spinner_icon;?>!important;}
    </style>
    <!- Youtube like loading bar plugin by Vijayakumar Selvaraj (http://vijay.pro) ends->
<?php }
add_action('wp_head', 'swpytlspb_youtube_like_loading_bar_overRide');

function swpytlspb_is_hex($hex_code) {
    return preg_grep('/^(#[a-f0-9]{3}([a-f0-9]{3})?)$/i', [$hex_code]);
}
?>