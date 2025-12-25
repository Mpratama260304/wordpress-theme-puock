<?php

namespace Puock\Theme\setting\options;

class OptionAd extends BaseOptionItem{

    function get_fields(): array
    {
        return [
            'key' => 'ad',
            'label' => __('Ad Settings', PUOCK),
            'icon'=>'dashicons-megaphone',
            'fields' => [
                [
                    'id' => 'ad_g_top_c',
                    'label' => __('Site-wide top ads', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'ad_g_top',
                    'label' => __('Site-wide top ad content', PUOCK),
                    'type' => 'textarea',
                    'sdt' => '',
                    'showRefId' => 'ad_g_top_c',
                ],
                [
                    'id' => 'ad_g_bottom_c',
                    'label' => __('Site-wide bottom ads', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'ad_g_bottom',
                    'label' => __('Site-wide bottom ad content', PUOCK),
                    'type' => 'textarea',
                    'sdt' => '',
                    'showRefId' => 'ad_g_bottom_c',
                ],
                [
                    'id' => 'ad_page_t_c',
                    'label' => __('Top ads in article', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'ad_page_t',
                    'label' => __('Top ad content in article', PUOCK),
                    'type' => 'textarea',
                    'sdt' => '',
                    'showRefId' => 'ad_page_t_c',
                    'tips'=>'显示在面包屑导航下'
                ],
                [
                    'id' => 'ad_page_c_b_c',
                    'label' => __('Bottom ads in article content', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'ad_page_c_b',
                    'label' => __('Bottom ad content in article', PUOCK),
                    'type' => 'textarea',
                    'sdt' => '',
                    'showRefId' => 'ad_page_c_b_c',
                    'tips'=>'会显示在文章结尾处'
                ],
                [
                    'id' => 'ad_comment_t_c',
                    'label' => __('Ads above comments', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'ad_comment_t',
                    'label' => __('Ad content above comments', PUOCK),
                    'type' => 'textarea',
                    'sdt' => '',
                    'showRefId' => 'ad_comment_t_c',
                ],
            ],
        ];
    }
}
