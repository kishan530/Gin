<?php
namespace  Cup\SiteManagementBundle\Service;
use Cup\SiteManagementBundle\Service\SimpleHtmlDom;
define('HDOM_TYPE_ELEMENT', 1);
define('HDOM_TYPE_COMMENT', 2);
define('HDOM_TYPE_TEXT',    3);
define('HDOM_TYPE_ENDTAG',  4);
define('HDOM_TYPE_ROOT',    5);
define('HDOM_TYPE_UNKNOWN', 6);
define('HDOM_QUOTE_DOUBLE', 0);
define('HDOM_QUOTE_SINGLE', 1);
define('HDOM_QUOTE_NO',     3);
define('HDOM_INFO_BEGIN',   0);
define('HDOM_INFO_END',     1);
define('HDOM_INFO_QUOTE',   2);
define('HDOM_INFO_SPACE',   3);
define('HDOM_INFO_TEXT',    4);
define('HDOM_INFO_INNER',   5);
define('HDOM_INFO_OUTER',   6);
define('HDOM_INFO_ENDSPACE',7);
define('DEFAULT_TARGET_CHARSET', 'UTF-8');
define('DEFAULT_BR_TEXT', "\r\n");
define('DEFAULT_SPAN_TEXT', " ");
define('MAX_FILE_SIZE', 600000);
/* helper functions
 * -----------------------------------------------------------------------------
 * get html dom from file
 * $maxlen is defined in the code as PHP_STREAM_COPY_ALL which is defined as -1.
 */
class WebScrapper{
function file_get_html($url, $use_include_path = false, $context=null, $offset = -1, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
{
    $context = stream_context_create(
    array(
        "http" => array(
            "header" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);
    // We DO force the tags to be terminated.
    $dom = new SimpleHtmlDom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    // For sourceforge users: uncomment the next line and comment the retreive_url_contents line 2 lines down if it is not already done.
    $contents = file_get_contents($url, $use_include_path, $context, $offset);
  /*  $contents = '<div class="col-xs-12 nopadding "><div class="snippet-box"><div class="box-left"><img class="clgdn_lazyload" title="RV College of Engineering-[RVCE], Bangalore logo" data-src="http://static-collegedunia.com/public/college_data/images/appImage/14673_RVCENG_APP.jpg/200/200"><div class="overlay"><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/gallery#photo" class="extra_data"><svg class="svg-sm"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-images_flat"></use></svg> 25</a><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/gallery#video" class="extra_data"><svg class="svg-sm"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-videos_flat"></use></svg> 1</a></div><div class="snippet-bottom"><p><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore#brouchure_gallery"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-download"></use></svg> download brochure</a></p></div></div><div class="box-right"><div class="right-top"><div class="box-info"><div class="img-logo"><img class="clgdn_lazyload" title="RV College of Engineering-[RVCE], Bangalore logo" data-src="http://static-collegedunia.com/public/college_data/images/logos/1457592867RVCE.jpg/50/50"></div><div class="college_info"><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore" class="college_name">RV College of Engineering-[RVCE], Bangalore </a><span class="college_location"><svg class="svg-rupee" style="fill:#ABABAB;vertical-align:middle"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-pin"></use></svg> Bangalore, Karnataka   <span class="college_affiliation"><svg class="svg-rupee" style="fill:#ABABAB;vertical-align:middle"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-affiliate_icon"></use></svg> AFFILIATED WITH      AICTE, NBA </span></span></div></div><div class="box-buttons"><div class="college_rating pull-right"><span class="rating_val">8.1</span><span class="rating_data"><div class="rating-imp" id="rating14673" data-rating="8.1"></div><span>Course Rating</span></span></div></div></div><ul class="right-middle"><li class="lr"><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/courses-fees"><span class="lr-key">₹39,830 </span><span class="lr-value">BE/B.Tech-avg fee/yr</span></a></li><li class="lr"><a target="_blank" href="http://exams.collegedunia.com/comedk-uget"><span class="lr-key">COMEDK-UGET</span></a></li><span class="lr"><span class="lr-key"><span class="rank-span">Ranked</span> 35 <span class="lr-small">out of 100</span></span><span class="lr-value img-holder">MHRD </span></span><span class="lr"><span class="lr-key"><span class="rank-span">Ranked</span> 6 <span class="lr-small">out of 156</span></span><span class="lr-value img-holder">PWC </span></span></ul><div class="right-bottom"><div class="data-tag"><a target="_blank" href="http://collegedunia.com/reviews/1496-kiranraj-kamath-review-on-rv-college-of-engineering-rvce-bangalore">" <span class="data-title"></span><span class="data-body">There is nothing bad to say about my college or the management. 4 years of engin .. </span>"</a><a target="_blank" href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/reviews" class="data-more">33 reviews</a></div><div class="download-broucher "><a rel="nofollow" href="http://collegedunia.com/auth/capture-lead ? lead_type=Shortlist&amp;source=Desktop&amp;college_id=14673&amp;college_acronym=RV+College+of+Engineering-%5BRVCE%5D&amp;college_city=Bangalore" class="btn-snipp open-popup-ajax"><svg class="btn-heart" style="margin-bottom:-1px"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://collegedunia.com/public/asset/build/svg/desktop/listing.417.svg#icon-favorite"></use></svg> ADD TO FAVOURITE</a></div></div></div><div class="wrapper-nav"><div class="container-fluid pad-wrap"><div class="college_nav"><ul class="college_nav_ul"><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/reviews" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Reviews ">Reviews</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/courses-fees" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Course &amp; Fees Details ">Courses &amp; Fees</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/placement" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Placement Details and Companies Visiting ">Placement</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/news" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - News &amp; Articles Details ">News &amp; Articles</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/scholarship" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Scholarship Details ">Scholarship</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/gallery" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Photos &amp; Videos ">Gallery</a></li><li class="college_tab"><a href="http://collegedunia.com/college/14673-rv-college-of-engineeringrvce-bangalore/hostel" class="college_nav_tab first_tab" title="RV College of Engineering-[RVCE], Bangalore - Hostel Details ">Hostel</a></li></ul></div></div></div></div></div>'; */
    
    $header = array();
    $header[] = "Cookie: __gads=ID=2cacbeaaee57e7bb:T=1476350020:S=ALNI_MakYNZTY8v-ZBI5UopVXb3Va1Qj6w; csrftoken=Ktpmf74m0RdYMaxGc47oamyXDeiygMgB; _ga=GA1.2.1945254955.1476344312; _gat=1; _co_session_active=1";
    $header[] = "Origin: http://www.collegedekho.com";
	$header[] = "Accept-Encoding: gzip, deflate, br";
	$header[] = "Accept-Language: en-US,en;q=0.8";
	$header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36";
	$header[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
	$header[] = "Accept: */*";
    $header[] =  "Referer: http://www.collegedekho.com/filter/colleges-in-india/";
	$header[] = "X-Requested-With: XMLHttpRequest";
    $header[] =  "Connection: keep-alive";
/*$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_POST, 1);
curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl_handle, CURLOPT_POSTFIELDS,
            "csrfmiddlewaretoken=Ktpmf74m0RdYMaxGc47oamyXDeiygMgB&stream_tag=&page=5&source=old&search_text=&exam_id=&year=&marks=");
//curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$contents = curl_exec($curl_handle);
echo var_dump($contents);
    exit();
curl_close($curl_handle); */
    //echo var_dump($context);
    // echo var_dump($use_include_path);
  //  echo var_dump($contents);
   // exit();
    // Paperg - use our own mechanism for getting the contents as we want to control the timeout.
   // $contents = retrieve_url_contents($url);
    if (empty($contents))
    {
        return false;
    }
    // The second parameter can force the selectors to all be lowercase.
    $dom->load($contents, $lowercase, $stripRN);
    return $dom;
}

// get html dom from string
function str_get_html($str, $lowercase=true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
{
    $dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    if (empty($str) || strlen($str) > MAX_FILE_SIZE)
    {
        $dom->clear();
        return false;
    }
    $dom->load($str, $lowercase, $stripRN);
    return $dom;
}

// dump html dom tree
function dump_html_tree($node, $show_attr=true, $deep=0)
{
    $node->dump($node);
}
}