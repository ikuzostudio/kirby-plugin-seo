
# SEO Kirby plugin

Kirby CMS plugin to edit SEO data on the panel, and display it in the head tag.

Edit meta title and description, social network og metas, noindex and canonical URL.

## Blueprint

To show SEO edition tab in the panel, add `tabs/seo` to your blueprints

Example with page preset :

```yml
title: Simple Page

tabs:

  # content tab
  content:
    label: Content
    icon: text
    preset: page
    fields:
      text:
        label: Text
        type: textarea
        size: huge

  # seo tab
  seo: tabs/seo
```

## Snippet

To display SEO metas in head tag of your website, include the snippet `seo-head`.

Example in `header.php` snippet :

```php
<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
  <?php snippet('seo-head'); ?>

  <?= css(['assets/css/index.css', '@auto']) ?>

</head>
<body>
```

You can also pass parameters to the snippet, to override page data :

```php
snippet('seo-head', [
  'title' => 'title',
  'description' => 'description',
  'ogTitle' => 'og title',
  'ogDesc' => 'og description',
  'ogImage' => 'og image',
  'noindex' => true,
  'canonical' => 'canonical-url'
]);
```

## Options

- `ikuzo.seo.meta.title.prefix` : Prefix prepened to meta title, default `""`
- `ikuzo.seo.meta.title.suffix` : Suffix appened to meta title, default `" | Site title"`
- `ikuzo.seo.og.title.prefix` : Prefix prepened to og title, default `""`
- `ikuzo.seo.og.title.suffix` : Suffix appened to og title, default `" | Site title"`