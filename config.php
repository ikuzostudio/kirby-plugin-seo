<?php
$kirby = kirby();

Kirby::plugin('ikuzo/seo', [
    'options'     => [
        'meta.title.prefix' => '',
        'meta.title.suffix' => ' | ' . $kirby->site()->title(),
        'og.title.prefix'   => '',
        'og.title.suffix'   => ' | ' . $kirby->site()->title()
    ],
    'blueprints'  => [
        'tabs/seo' => __DIR__ . '/blueprints/seo.yml'
    ],
    'snippets'    => [
        'seo-head' => __DIR__ . '/snippets/seo-head.php'
    ],
    'pageMethods' => [
        /**
         * get SEO meta title, with prefix and suffix
         * @return string
         */
        'getSeoTitle'   => function () {
            $title = $this->title()->html();

            if ($this->seoMetaTitle()->isNotEmpty()) {
                $title = $this->seoMetaTitle()->html();
            }

            return option('ikuzo.seo.meta.title.prefix') . $title . option('ikuzo.seo.meta.title.suffix');
        },
        /**
         * get SEO desctiption
         * @return string
         */
        'getSeoDescription' => function () {
            return $this->seoMetaDescription()->html()->toString();
        },
        /**
         * get SEO og title, with prefix and suffix
         * @return string
         */
        'getSeoOgTitle' => function () {
            $title = $this->title()->html();

            if ($this->seoOgTitle()->isNotEmpty()) {
                $title = $this->seoOgTitle()->html();
            } elseif ($this->seoMetaTitle()->isNotEmpty()) {
                $title = $this->seoMetaTitle()->html();
            }

            return option('ikuzo.seo.og.title.prefix') . $title . option('ikuzo.seo.og.title.suffix');
        },
        /**
         * get SEO og desctiption
         * @return string
         */
        'getSeoOgDescription' => function () {
            if ($this->seoOgDescription()->isNotEmpty()) {
                $desc = $this->seoOgDescription()->html();
            } else {
                $desc = $this->seoMetaDescription()->html();
            }

            return $desc ? $desc->toString() : '';
        },
        /**
         * get SEO og image
         * @return string
         */
        'getSeoOgImage' => function () {
            return $this->seoOgImage()->isNotEmpty() ? $this->seoOgImage()->toFile()->url() : '';
        },
        /**
         * get SEO noindex
         * @return boolean
         */
        'getSeoNoindex' => function() {
            return $this->seoAdvancedHidden()->toBool();
        },
        /**
         * get SEO canonical url
         * @return string
         */
        'getSeoCanonical' => function() {
            return $this->seoAdvancedCanonical()->html()->toString();
        }
    ]
]);
