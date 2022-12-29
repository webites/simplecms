<?php

namespace Simple\Modules\Seo;

use Simple\Core\Pages;

class SitemapGenerator
{

    public function __construct()
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $pages = new Pages();
        $all_pages = $pages->getAll();
        foreach ($all_pages as $page) {
            $content .= '<url>
        <loc>' . SITE_URL . '/' . $page['slug'] . '</loc>
      </url>';
        }

        $content .= '</urlset>';
        $file = 'sitemap.xml';
        $handle = fopen($file, "w");
        $response = fwrite($handle, $content);
        fclose($handle);



        $robots = 'Sitemap: ' . SITE_URL . '/' . $file;
        $robots_handle = fopen('robots.txt', "w");
        $robots_response = fwrite($robots_handle, $robots);
        fclose($robots_handle);
    }
}
