<?php

use Puock\Theme\classes\meta\PuockAbsMeta;

PuockAbsMeta::newPostMeta('pk-post-seo', [
    'title' => __('SEO Settings', PUOCK),
    'options' => [
        array(
            "id" => "seo_keywords",
            "title" => __('Custom SEO Keywords', PUOCK),
            'desc' => __('Separate multiple keywords with ", ", defaults to tags', PUOCK),
            "type" => "text"
        ),
        array(
            "id" => "seo_desc",
            "title" => __('Custom SEO Description', PUOCK),
            'desc' => __('Defaults to first 150 characters (recommended max 150)', PUOCK),
            "type" => "text"
        )
    ]
]);

PuockAbsMeta::newPostMeta('pk-post-basic', [
    'title' => __('Basic Settings', PUOCK),
    'options' => [
        array(
            "id" => "hide_side",
            "title" => __('Hide Sidebar', PUOCK),
            "type" => "checkbox"
        ),
        array(
            "id" => "author_cat_comment",
            "title" => __('Comments visible to author only', PUOCK),
            "type" => "checkbox"
        ),
        array(
            "id" => "origin_author",
            "title" => __('Source Name', PUOCK),
            "desc" => __('Fill this if not original, including next field', PUOCK),
            "type" => "text"
        ),
        array(
            "id" => "origin_url",
            "title" => __('Source URL', PUOCK),
            "type" => "text"
        )
    ]
]);

function pk_page_meta_basic()
{
    $link_cats = get_all_category_id_row('link_category');
    PuockAbsMeta::newPostMeta('pk-page-basic', [
        'title' => __('Basic Settings', PUOCK),
        'post_type' => 'page',
        'options' => [
            array(
                "id" => "hide_side",
                "title" => __('Hide Sidebar', PUOCK),
                "type" => "checkbox"
            ),
            array(
                "id" => "author_cat_comment",
                "title" => __('Comments visible to author only', PUOCK),
                "type" => "checkbox"
            ),
            array(
                "id" => "use_theme_link_forward",
                "std" => "0",
                "title" => __('Use theme redirect page for internal links', PUOCK),
                "type" => "checkbox"
            ),
            array(
                "id" => "page_links_id",
                "std" => "",
                "title" => __('Link Display Category ID List', PUOCK),
                'desc' => __('(Only effective for <b>Friendly Links</b> and <b>Navigation</b> templates, leave empty to hide, multiple selection allowed)', PUOCK),
                "type" => "select",
                'multiple' => true,
                "options" => $link_cats
            ),
            array(
                "id" => "page_books_id",
                "std" => "",
                "title" => __('Book Display Category ID List', PUOCK),
                "desc" => __('(Only effective for <b>Book Recommendations</b> template, leave empty to hide, multiple selection allowed)', PUOCK),
                "type" => "select",
                'multiple' => true,
                "options" => $link_cats
            )
        ]
    ]);
}

pk_page_meta_basic();
