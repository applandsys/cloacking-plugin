<?php
if (!defined('ABSPATH')) exit;

/**
 * Block bots, crawlers, reviewers
 * Runs early on template_redirect
 */
function newplugin_block_bots() {

    // Allow disabling from admin
    if (!get_option('newplugin_enable_security')) {
        return;
    }

    $ua = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    if ($ua === '') {
        status_header(403);
        exit;
    }

    /**
     * Meta / Social Review Bots
     */
    $metaBots = [
        'facebot',
        'facebookexternal',
        'facebookcatalog',
        'meta-externalagent',
        'meta-externalfetcher',
        'meta-externalads',
        'meta-webindexer',
        'meta-inspector',
        'meta-cloudcrawler',
        'meta-imageproxy',
        'meta-video',
        'whatsappbot',
        'whatsapp/2'
    ];

    /**
     * Generic + SEO Bots
     */
    $spamBots = [
        'bot','spider','crawler','crawl','fetch',
        'nutch','scrapy','curl','wget',
        'python','java','perl',
        'headless',
        'yandex','semalt','ahrefs','mj12bot',
        'dotbot','blexbot','petalbot','sogou',
        'slurp','baidu','bingbot',
        'duckduckbot','applebot'
    ];

    $allBots = array_merge($metaBots, $spamBots);

    foreach ($allBots as $bot) {
        if (strpos($ua, $bot) !== false) {
            status_header(403);
            exit;
        }
    }
}