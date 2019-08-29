<?php
// get params from snippet if defined
$title = isset($title) ?
    option('ikuzo.seo.meta.title.prefix')() . $title . option('ikuzo.seo.meta.title.suffix')()
    : $page->getSeoTitle();
$description = isset($description) ? $description : $page->getSeoDescription();
$ogTitle = isset($ogTitle) ?
    option('ikuzo.seo.og.title.prefix')() . $ogTitle . option('ikuzo.seo.og.title.suffix')()
    : $page->getSeoOgTitle();
$ogDesc = isset($ogDesc) ? $ogDesc : $page->getSeoOgDescription();
$ogImage = isset($ogImage) ? $ogImage : $page->getSeoOgImage();
$noindex = isset($noindex) ? $noindex : $page->getSeoNoindex();
$canonical = isset($canonical) ? $canonical : $page->getSeoCanonical();
?>

<title><?= $title ?></title>
<meta name="description" content="<?= $description ?>">

<?php
if($ogTitle) {
    ?>
    <meta property="og:title" content="<?= $ogTitle ?>">
    <?php
}

if($ogDesc) {
    ?>
    <meta property="og:description" content="<?= $ogDesc ?>">
    <?php
}

if($ogImage) {
    ?>
    <meta property="og:image" content="<?= $ogImage ?>">
    <?php
}

if($noindex) {
    ?>
    <meta name="robots" content="noindex">
    <?php
}

if($canonical) {
    ?>
    <link rel="canonical" href="<?= $canonical ?>" />
    <?php
}

