<?php

use Illuminate\Support\Facades\Request;

$json = [
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'numberOfItems'   => count($breadcrumbs),
    'itemListElement' => [],
];

foreach ($breadcrumbs as $i => $breadcrumb) {
    $json['itemListElement'][] = [
        '@type'    => 'ListItem',
        'position' => $i + 1,
        'name'     => $breadcrumb->title,
        'item'     => $breadcrumb->url ?: Request::fullUrl(),
    ];
}
?>
<script type="application/ld+json"><?= json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?></script>
