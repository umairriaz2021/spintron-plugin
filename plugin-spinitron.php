<?php
/*
Plugin Name: Spinitron Api Integration Plugin
Plugin URI: https://www.wxnafm.org/shows/
Description: Connecting Spinitron api to get the shows information
Author Name: John/Samadullah
Author URI: http://www.alankabootint.com/Web/Page/Default.aspx
Version: 1.0.0
*/

// validating plugin folder exists
if(!defined('PLUGIN_DIR_PATH')){
    define('PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));
}


if(!defined('PLUGIN_URL')){
    define('PLUGIN_URL',plugin_dir_url(__FILE__,'/plugin-spinitron'));
}

$plugin_spinitron_prefix = "";
// function to enqueue the external css/javaScript
function enqueue_external_js_css() {

/*    wp_register_style('spinitron-web-toolkit-css', 'https://www.wxnafm.org/wp-content/themes/WXNA/style.css');
    wp_enqueue_style('spinitron-web-toolkit-css');

    wp_register_style('spinitron-web-toolkit-css1', 'https://studio.creek.org/api/embed/custom-css.css?studioId=6');
    wp_enqueue_style('spinitron-web-toolkit-css1');

    wp_register_style('spinitron-web-toolkit-css3', 'https://studio.creek.org/api/embed/custom-css.css?studioId=6');
    wp_enqueue_style('spinitron-web-toolkit-css3');

    wp_register_style('spinitron-web-toolkit-css4', 'https://www.wxnafm.org/wp-content/themes/WXNA/assets/css/bootstrap.min.css?ver=6.3.1');
    wp_enqueue_style('spinitron-web-toolkit-css4');

    wp_register_style('spinitron-web-toolkit-css5', 'https://www.wxnafm.org/wp-content/plugins/jetpack/css/jetpack.css?ver=12.7.1');
    wp_enqueue_style('spinitron-web-toolkit-css5');*/

    // another way of adding style without  wp_register_style
    if(is_page('shows'))
    {
       wp_enqueue_style('spinitron-bootstrap' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',[],time(),'all');
       wp_enqueue_style('spinitron-web-toolkit-css6' , plugin_dir_url(__FILE__) . '/assets/css/plugin_spinitron_style.css' );
       wp_enqueue_script('spinitron-bootstrapJs','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',['jquery'],time(),true);
       wp_enqueue_script('mainJs',PLUGIN_URL.'assets/js/main.js',['jquery'],time(),true);
       wp_localize_script('mainJs','myajax',admin_url('admin-ajax.php'));
    }

    //wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
}
add_action('wp_enqueue_scripts', 'enqueue_external_js_css');



// getting shows contents in html
function shortcodetest() {

    $content = include PLUGIN_DIR_PATH.'views/plugin_spinitron_view_shows.php';
    return $content;
}

// passing shows html content to the page short codes
//add_shortcode('helloworld', 'shortcodetest');
add_shortcode('shortcode_shows', 'shortcodetest');

function getHtmlByDay($url,$day='') {
    
   
    $data = getAllData($url,$day);    
   
    
    
    $html = '';
    if(count($data['items']) > 0):
        foreach($data['items'] as $key => $da):
             $start_time1 = new Datetime($da["start"]);
            $end_time2 = new Datetime($da["end"]);
            $start_time1 = $start_time1->format('l');
            $end_time2 = $end_time2->format('l');
           if(strtolower($day) == strtolower($start_time1) && strtolower($day) == strtolower($end_time2)):
            $desc = ($da['description']) ? $da['description'] : '';
            $image = ($da['image']) ? $da['image'] : 'https://picsum.photos/seed/picsum/200/300';
            $start_time = new Datetime($da["start"]);
            $end_time = new Datetime($da["end"]);
            $start_time = $start_time->format('h:i A');
            $end_time = $end_time->format('h:i A');

            $html .= '<div class="spinitron_schedule_occurrence">
                        <div class="spinitron_time_container">
                            <div class="spinitron_time">
                                <time class="spinitron_start" aria-label="Start time for '.$da['title'].'" date-time="'.$start_time.'">'.$start_time.'</time>
                                <span class="spinitron_divider">—</span>
                                <time class="spinitron_end" aria-label="End time for '.$da['title'].'" date-time="'.$end_time.'">'.$end_time.'</time>
                            </div>
                        </div>
                        <div class="spinitron_show creek-show-indo-burma">
                            <div class="spinitron_show_inner">
                                <div class="spinitron_image_container">
                                    <img decoding="async" src="'.$image.'" class="img-fluid" alt="Logo for '. $da['title'] . '">
                                </div>
                                <div class="spinitron_info_container"><a class="spinitron_show_title">'.$da['title'].'</a>
                                    <div class="spinitron_summary">'.$desc.'</div>
                                </div>
                            </div>
                        </div>
                </div>';
               
                endif;
        endforeach;
   
    endif;

    return $html;
}

// call the api to fetch the data
function getAllData($url,$day='')
{
    $site_url = 'https://spinitron.com/api/';
    $token = 'QLWLIVrGxB6FEfoGopdxJBCO';
    $headers = array(
        'Authorization' => 'Bearer ' . $token, // Include the Bearer token
    );

    $args = array(
        'headers' => $headers,
    );


    
        $response = wp_safe_remote_get($site_url.$url.'?count=1000',$args);
        if (is_wp_error($response)) {
        return;
    }
        $data = json_decode(wp_remote_retrieve_body($response),true);
        
        
     return $data;
   

}
