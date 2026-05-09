<?php
/**
 * Plugin Name:       Cloaking AdX New
 * Description:       Pro Dashboard with Colorful Gradients, Universal URLs, and Premium Designs.
 * Version:           16.0
 * Author:            Imtiaz Nihal
 */

if (!defined('ABSPATH')) exit;


// Add settings page under Plugins -> Settings
add_action('admin_menu', 'newpluign_menu');
function newpluign_menu() {
    add_options_page(
            'Cloaking AdX',
            'Cloaking AdX',
            'manage_options',
            'newpluign-settings',
            'newpluign_admin_page'
    );
}

// Add direct "Settings" link in plugins page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'newpluign_settings_link');

function newpluign_settings_link($links) {
    $settings_link = '<a href="admin.php?page=newpluign-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_action('admin_init', 'newpluign_register_settings');

// newpluign_register_settings();
function newpluign_register_settings() {
    register_setting('newpluign_options', 'adx_traffic_mode');
    register_setting('newpluign_options', 'adx_url_param_key');
    register_setting('newpluign_options', 'adx_url_param_val');
    register_setting('newpluign_options', 'adx_ad_1');
    register_setting('newpluign_options', 'adx_ad_2');
    register_setting('newpluign_options', 'adx_ad_3');
    for($i=1; $i<=10; $i++) {
        register_setting('newpluign_options', 'adx_url_'.$i);
        register_setting('newpluign_options', 'adx_title_'.$i);
        register_setting('newpluign_options', 'adx_desc_'.$i);
        register_setting('newpluign_options', 'adx_keys_'.$i);
    }
    register_setting('newpluign_options', 'adx_videos');
    register_setting('newpluign_options', 'adx_images');
}

function newpluign_admin_page() {
    $param_key = get_option('adx_url_param_key', 'ai');
    $param_val = get_option('adx_url_param_val', '369');
    $base_url_universal = home_url("/?{$param_key}={$param_val}");
    $base_url_specific = home_url("/?{$param_key}={$param_val}&tmpl=");
    ?>
    <style>
        :root {
            --text-main: #1e293b;
            --text-muted: #475569;
            --radius: 16px;
        }
        body { background: #f1f5f9; }
        .adx-wrap { font-family: 'Inter', "Segoe UI", Roboto, sans-serif; max-width: 1100px; margin: 30px auto; color: var(--text-main); }
        
        /* Vibrant Banner Gradient */
        .adx-pro-banner {
            background: linear-gradient(135deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);
            border-radius: var(--radius);
            padding: 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 20px 25px -5px rgba(120, 75, 160, 0.4), 0 8px 10px -6px rgba(120, 75, 160, 0.2);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.2);
        }
        .adx-pro-banner::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
            pointer-events: none;
        }
        .adx-title-main { font-size: 38px; font-weight: 800; margin: 0; color: #ffffff; letter-spacing: -1px; z-index: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.2); }
        
        .adx-dev-badge { 
            background: rgba(0, 0, 0, 0.2); 
            backdrop-filter: blur(12px); 
            -webkit-backdrop-filter: blur(12px); 
            color: #ffffff; 
            padding: 12px 26px; 
            border-radius: 30px; 
            font-weight: 700; 
            font-size: 16px; 
            border: 1px solid rgba(255, 255, 255, 0.5); 
            text-decoration: none;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .blink-anim { animation: glowing-pulse 2s infinite; }
        @keyframes glowing-pulse {
            0% { box-shadow: 0 0 5px rgba(255, 255, 255, 0.2); text-shadow: 0 0 5px rgba(255, 255, 255, 0.2); }
            50% { box-shadow: 0 0 25px rgba(255, 255, 255, 0.9); text-shadow: 0 0 10px rgba(255, 255, 255, 0.9); transform: scale(1.02); }
            100% { box-shadow: 0 0 5px rgba(255, 255, 255, 0.2); text-shadow: 0 0 5px rgba(255, 255, 255, 0.2); }
        }
        
        .adx-layout { display: grid; grid-template-columns: 1fr; gap: 30px; }
        
        /* Colorful Gradient Backgrounds for Sections */
        .adx-card { border-radius: var(--radius); padding: 35px; box-shadow: 0 10px 20px -5px rgba(0,0,0,0.1); position: relative; overflow: hidden; border: 1px solid rgba(255,255,255,0.4); }
        
        .card-core { background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%); }
        .card-urls { background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); }
        .card-ads { background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%); border: 2px solid #6ee7b7; } /* Ads highlighted in vibrant green */
        .card-content { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); }
        .card-media { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); }

        .adx-title { color: #0f172a; font-size: 22px; font-weight: 800; margin-top: 0; border-bottom: 2px solid rgba(0,0,0,0.1); padding-bottom: 16px; margin-bottom: 24px; text-transform: uppercase; letter-spacing: 1px; }
        .adx-label { font-size: 15px; font-weight: 700; color: #1e293b; margin-bottom: 10px; display: block; }
        
        .adx-input, .adx-select, .adx-textarea { width: 100%; border: 1px solid rgba(0,0,0,0.15); border-radius: 10px; padding: 15px 20px; font-size: 15px; margin-bottom: 20px; transition: all 0.3s ease; box-sizing: border-box; background: rgba(255,255,255,0.85); color: #000; font-weight: 600; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02); }
        .adx-input:focus, .adx-select:focus, .adx-textarea:focus { border-color: #3b82f6; outline: none; background: #ffffff; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2); }
        .adx-textarea { font-family: 'Courier New', Courier, monospace; line-height: 1.6; }
        
        .adx-btn { background: linear-gradient(135deg, #0f172a 0%, #334155 100%); color: #fff; border: none; border-radius: 10px; padding: 18px 40px; font-size: 18px; font-weight: 800; cursor: pointer; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); }
        .adx-btn:hover { background: linear-gradient(135deg, #1e293b 0%, #475569 100%); transform: translateY(-3px); box-shadow: 0 15px 25px -3px rgba(0,0,0,0.4); }
        
        .adx-btn-outline { background: #ffffff; color: #0f172a; border: 2px solid #cbd5e1; border-radius: 8px; padding: 10px 20px; cursor: pointer; font-weight: 800; transition: all 0.2s; font-size: 14px; text-transform: uppercase; }
        .adx-btn-outline:hover { background: #0f172a; color: #ffffff; border-color: #0f172a; }
        
        .adx-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        .template-box { border: 1px solid rgba(0,0,0,0.1); border-radius: 12px; padding: 24px; margin-bottom: 24px; background: rgba(255,255,255,0.6); transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        .template-box:hover { background: rgba(255,255,255,0.9); box-shadow: 0 10px 20px rgba(0,0,0,0.08); transform: translateY(-2px); }
        .template-box h3 { margin-top: 0; color: #0f172a; font-size: 17px; font-weight: 800; margin-bottom: 18px; text-transform: uppercase; }
        
        .url-box { display: flex; gap: 15px; margin-bottom: 14px; align-items: center; background: rgba(255,255,255,0.8); padding: 16px 20px; border-radius: 10px; border: 1px solid rgba(0,0,0,0.1); transition: all 0.2s; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .url-box span { font-weight: 800; color: #1e293b; min-width: 110px; font-size: 15px; }
        .url-box input { margin: 0; background: transparent; border: none; color: #2563eb; font-weight: 700; font-size: 15px; padding: 0; flex-grow: 1; }
        .url-box input:focus { outline: none; box-shadow: none; background: transparent; }
        
        .universal-box { background: rgba(255,255,255,0.95); border: 2px dashed #8b5cf6; box-shadow: 0 4px 10px rgba(139, 92, 246, 0.15); }
        .universal-box span { color: #6d28d9; }
        .universal-box input { color: #5b21b6; }
    </style>

    <div class="adx-wrap">
        <div class="adx-pro-banner">
            <h1 class="adx-title-main">Cloaking AdX</h1>
            <a href="https://www.facebook.com/imranV2.0" target="_blank" class="adx-dev-badge blink-anim">Developed by Imtiaz</a>
        </div>

        <form method="post" action="options.php">
            <?php settings_fields('newpluign_options'); ?>
            
            <div class="adx-layout">
                
                <div class="adx-card card-core">
                    <h2 class="adx-title">Core System Configuration</h2>
                    <div class="adx-grid-2">
                        <div>
                            <label class="adx-label">Traffic Targeting Mode</label>
                            <select name="adx_traffic_mode" class="adx-select">
                                <option value="social" <?php selected(get_option('adx_traffic_mode'), 'social'); ?>>Facebook & X (Twitter) Only + Mobile</option>
                                <option value="facebook" <?php selected(get_option('adx_traffic_mode'), 'facebook'); ?>>Facebook</option>
                                <option value="fbav" <?php selected(get_option('adx_traffic_mode'), 'fbav'); ?>>Facebook Bav</option>
                                <option value="fb_iab" <?php selected(get_option('adx_traffic_mode'), 'fb_iab'); ?>>Facebook IAB</option>
                                <option value="tiktok" <?php selected(get_option('adx_traffic_mode'), 'tiktok'); ?>>TikTok Only + Mobile</option>
                                <option value="all_mobile" <?php selected(get_option('adx_traffic_mode'), 'all_mobile'); ?>>All Mobile Traffic</option>
                                <option value="instagram" <?php selected(get_option('adx_traffic_mode'), 'instagram'); ?>>Instagram</option>
                                <option value="facebook_messenger" <?php selected(get_option('adx_traffic_mode'), 'facebook_messenger'); ?>>Facebook Messager</option>
                                <option value="twitter" <?php selected(get_option('adx_traffic_mode'), 'twitter'); ?>>Twitter</option>
                                <option value="everywhere" <?php selected(get_option('adx_traffic_mode'), 'everywhere'); ?>>All Traffic (Desktop & Mobile)</option>
                            </select>
                        </div>
                        <div>
                            <label class="adx-label">Custom URL Slug Setup</label>
                            <div style="display: flex; gap: 15px;">
                                <div style="flex: 1;">
                                    <input type="text" name="adx_url_param_key" class="adx-input" style="margin-bottom: 5px;" placeholder="Parameter Key" value="<?php echo esc_attr($param_key); ?>" />
                                    <small style="color:var(--text-muted); font-size:13px; font-weight:700;">Parameter Name</small>
                                </div>
                                <div style="flex: 1;">
                                    <input type="text" name="adx_url_param_val" class="adx-input" style="margin-bottom: 5px;" placeholder="Value" value="<?php echo esc_attr($param_val); ?>" />
                                    <small style="color:var(--text-muted); font-size:13px; font-weight:700;">Parameter Value</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="adx-card card-urls">
                    <h2 class="adx-title">Premium Shareable Links</h2>
                    <p style="color:#1e293b; font-size:16px; margin-bottom:25px; line-height: 1.5; font-weight: 600;">Use these generated links for distribution. They will update automatically based on your custom slug settings.</p>
                    
                    <div class="url-box universal-box">
                        <span>Universal Link:</span>
                        <input type="text" readonly value="<?php echo $base_url_universal; ?>" id="url_rnd">
                        <button type="button" class="adx-btn-outline" style="border-color:#8b5cf6; color:#6d28d9;" onclick="copyUrl('url_rnd')">Copy Random</button>
                    </div>

                    <?php for($i=1; $i<=10; $i++): ?>
                    <div class="url-box">
                        <span>Template <?php echo $i; ?>:</span>
                        <input type="text" readonly value="<?php echo $base_url_specific . $i; ?>" id="url_<?php echo $i; ?>">
                        <button type="button" class="adx-btn-outline" onclick="copyUrl('url_<?php echo $i; ?>')">Copy Link</button>
                    </div>
                    <?php endfor; ?>
                    <script>
                        function copyUrl(id){ 
                            var copyText = document.getElementById(id); 
                            copyText.select(); 
                            document.execCommand("copy");
                            var btn = copyText.nextElementSibling;
                            var originalText = btn.innerText;
                            btn.innerText = "Copied!";
                            btn.style.background = "#0f172a";
                            btn.style.color = "#fff";
                            btn.style.borderColor = "#0f172a";
                            setTimeout(() => { 
                                btn.innerText = originalText; 
                                btn.style.background = "";
                                btn.style.color = "";
                                btn.style.borderColor = "";
                            }, 1500);
                        }
                    </script>
                </div>

                <div class="adx-card card-ads">
                    <h2 class="adx-title">Ad Placement Options</h2>
                    <p style="color:#064e3b; font-size:16px; margin-bottom:25px; font-weight: 700;">Inject your monetization scripts here. These HTML/JS tags will be executed within all 7 templates.</p>
                    <?php for($i=1; $i<=3; $i++): ?>
                        <label class="adx-label" style="color: #064e3b; font-size: 16px;">Ad Slot Placement <?php echo $i; ?></label>
                        <textarea name="adx_ad_<?php echo $i; ?>" rows="4" class="adx-textarea" style="border: 2px solid #34d399;" placeholder="Paste HTML/JS Ad Code for Slot <?php echo $i; ?> here..."><?php echo esc_textarea(get_option('adx_ad_'.$i)); ?></textarea>
                    <?php endfor; ?>
                </div>

                <div class="adx-card card-content">
                    <h2 class="adx-title">Article Content Control</h2>
                    <p style="color:#1e293b; font-size:16px; margin-bottom:25px; font-weight: 600;">Manage the background iframe links and SEO metadata for every individual template below.</p>
                    <div class="adx-grid-2">
                        <?php for($i=1; $i<=10; $i++): ?>
                        <div class="template-box">
                            <h3>Template ID <?php echo $i; ?> Settings</h3>
                            <label class="adx-label">Target URL (Iframe):</label>
                            <input type="text" name="adx_url_<?php echo $i; ?>" class="adx-input" value="<?php echo esc_attr(get_option('adx_url_'.$i)); ?>" placeholder="Enter target website URL" />
                            
                            <label class="adx-label">Meta Title:</label>
                            <input type="text" name="adx_title_<?php echo $i; ?>" class="adx-input" value="<?php echo esc_attr(get_option('adx_title_'.$i)); ?>" />
                            
                            <label class="adx-label">Meta Description:</label>
                            <input type="text" name="adx_desc_<?php echo $i; ?>" class="adx-input" value="<?php echo esc_attr(get_option('adx_desc_'.$i)); ?>" />
                            
                            <label class="adx-label">Meta Keywords:</label>
                            <input type="text" name="adx_keys_<?php echo $i; ?>" class="adx-input" value="<?php echo esc_attr(get_option('adx_keys_'.$i)); ?>" />
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="adx-card card-media">
                    <h2 class="adx-title">Media Library Hub</h2>
                    <p style="color:#1e293b; font-size:16px; margin-bottom:25px; font-weight: 600;">Supply lists of media URLs. The display system will randomly pick videos and images from these lists.</p>
                    <div class="adx-grid-2">
                        <div>
                            <label class="adx-label">Video MP4 URLs (One per line)</label>
                            <textarea name="adx_videos" rows="8" class="adx-textarea"><?php echo esc_textarea(get_option('adx_videos')); ?></textarea>
                        </div>
                        <div>
                            <label class="adx-label">Thumbnail Image URLs (One per line)</label>
                            <textarea name="adx_images" rows="8" class="adx-textarea"><?php echo esc_textarea(get_option('adx_images')); ?></textarea>
                        </div>
                    </div>
                </div>

                <div style="display:flex; justify-content:center; align-items:center; margin-top:40px; margin-bottom: 20px;">
                    <?php submit_button('Save Professional Settings', 'adx-btn', 'submit', false); ?>
                </div>
            </div>
        </form>
    </div>
    <?php
}

function newpluign_is_mobile() {
    if (empty($_SERVER['HTTP_USER_AGENT'])) return false;
    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mobile_keywords = ['iphone', 'ipod', 'ipad', 'android', 'blackberry', 'windows phone', 'webos', 'iemobile', 'opera mini', 'mobile', 'tablet', 'kindle', 'silk', 'playbook', 'nexus', 'samsung', 'huawei', 'xiaomi', 'oneplus', 'tiktok'];
    foreach ($mobile_keywords as $keyword) { if (strpos($user_agent, $keyword) !== false) return true; }
    if (strpos($user_agent, 'ipad') !== false || (strpos($user_agent, 'macintosh') !== false && strpos($user_agent, 'mobile') !== false)) return true;
    return wp_is_mobile(); 
}

function newpluign_is_social() {
    if (empty($_SERVER['HTTP_REFERER']) && empty($_SERVER['HTTP_USER_AGENT'])) return false;
    $referer = !empty($_SERVER['HTTP_REFERER']) ? strtolower($_SERVER['HTTP_REFERER']) : '';
    $ua      = !empty($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
    if (strpos($referer, 'facebook.com') !== false || strpos($referer, 'fb.com') !== false || strpos($referer, 'm.facebook') !== false || strpos($referer, 'l.facebook') !== false || strpos($referer, 'lm.facebook') !== false) return true;
    if (strpos($ua, 'facebook') !== false || strpos($ua, 'fbav') !== false || strpos($ua, 'fban') !== false) return true;
    if (strpos($referer, 'twitter.com') !== false || strpos($referer, 'x.com') !== false || strpos($referer, 't.co') !== false) return true;
    if (strpos($ua, 'twitter') !== false || strpos($ua, 'x.com') !== false || strpos($ua, 'tweet') !== false) return true;
    return false;
}

function newpluign_is_tiktok() {
    if (empty($_SERVER['HTTP_REFERER']) && empty($_SERVER['HTTP_USER_AGENT'])) return false;
    $referer = !empty($_SERVER['HTTP_REFERER']) ? strtolower($_SERVER['HTTP_REFERER']) : '';
    $ua      = !empty($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
    if (strpos($referer, 'tiktok.com') !== false) return true;
    if (strpos($ua, 'tiktok') !== false || strpos($ua, 'bytedance') !== false) return true;
    return false;
}

function newpluign_should_show() {
    $param_key = get_option('adx_url_param_key', 'ai');
    $param_val = get_option('adx_url_param_val', '369');
    
    if (!isset($_GET[$param_key]) || $_GET[$param_key] !== $param_val) return false;
    
    $mode = get_option('adx_traffic_mode', 'social');
    if($mode === 'everywhere') return true;
    if($mode === 'all_mobile') return newpluign_is_mobile();
    if($mode === 'tiktok') return (newpluign_is_tiktok() && newpluign_is_mobile());
    
    return (newpluign_is_social() && newpluign_is_mobile());
}

function newpluign_get_target_template() {

    if(isset($_GET['tmpl'])) {
        $tmpl_id = intval($_GET['tmpl']);

        // Allow 1-10 templates
        if($tmpl_id >= 1 && $tmpl_id <= 10) {

            $template_file = plugin_dir_path(__FILE__) . 'cloak-template-' . $tmpl_id . '.php';

            // Check file exists
            if(file_exists($template_file)) {
                return $template_file;
            }
        }
    }

    // Random template 1-10
    $templates = [];

    for($i = 1; $i <= 10; $i++) {
        $templates[] = 'cloak-template-' . $i . '.php';
    }

    return plugin_dir_path(__FILE__) . $templates[array_rand($templates)];
}

function newpluign_template_include($template) {
    if (!newpluign_should_show()) return $template;
    
    if(!defined('DONOTCACHEPAGE')) define('DONOTCACHEPAGE', true);
    header('X-Robots-Tag: noindex, nofollow');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
    
    remove_action('template_redirect', 'redirect_canonical');
    add_filter('redirect_canonical', '__return_false', 999);
    add_filter('wpseo_canonical', '__return_false', 999);
    add_filter('rank_math/frontend/canonical', '__return_false', 999);
    return newpluign_get_target_template();
}
add_filter('template_include', 'newpluign_template_include', 1);

/*
 * Bot redirect
 */
add_action('template_redirect', function () {

    if (!newpluign_should_show()) return;

    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    $metaBots = [
            'facebot',
            'facebookcatalog',
            'facebookplatform',
            'facebookexternalua',
            'meta-externalagent',
            'meta-externalfetcher',
            'meta-externalads',
            'meta-webindexer',
            'meta-inspector',
            'meta-uatester',
            'meta-cloudcrawler',
            'meta-externalcrawler',
            'meta-imageproxy',
            'meta-video',
            'meta-crawler',
            'whatsappbot',
            'whatsapp/2'
    ];

    $spamBots = [
            'spider','crawler','crawl','fetch','scan',
            'nutch','scrapy','curl','wget',
            'python','java','perl',
            'yandex','semalt','ahrefs','mj12bot','dotbot','blexbot','petalbot','sogou',
            'slurp','baidu','bingbot','duckduckbot','applebot'
    ];

    $allBots = array_merge($metaBots, $spamBots);

    foreach ($allBots as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            status_header(403);
            exit;
        }
    }

}, 0);
