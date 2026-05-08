<?php
if (!defined('ABSPATH')) exit;

function newplugin_is_allowed_traffic() {

    $mode = get_option('newplugin_traffic_mode', 'all');
    $ua   = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    $isMobile = preg_match('/android|iphone|ipad|ipod/i', $ua);

    $sources = [
        'facebook' => ['facebook','fbav'],
        'instagram' => ['instagram'],
        'tiktok' => ['tiktok'],
        'twitter' => ['twitter'],
        'facebook_messenger' => ['messenger','fb_iab']
    ];

    if ($mode === 'all') return true;
    if ($mode === 'mobile') return $isMobile;

    if (isset($sources[$mode])) {
        foreach ($sources[$mode] as $key) {
            if (strpos($ua, $key) !== false) return true;
        }
        return false;
    }

    return true;
}