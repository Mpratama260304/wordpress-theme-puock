<?php

namespace Puock\Theme\setting\options;

class OptionBasic extends BaseOptionItem
{

    function get_fields(): array
    {
        return [
            'key' => 'basic',
            'label' => __('Basic Settings', PUOCK),
            'icon' => 'dashicons-admin-generic',
            'fields' => [
                [
                    'id' => 'mobile_sidebar_enable',
                    'label' => __('Mobile sidebar enable', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                    'badge' => ['value' => 'New'],
                    'tips' => __('After enabled, sidebar button will be shown on mobile', PUOCK)
                ],
                [
                    'id' => 'basic_img_lazy_s',
                    'label' => __('Image lazy loading', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'basic_img_lazy_z',
                    'label' => __('Content image lazy loading', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'basic_img_lazy_a',
                    'label' => __('Comment avatar lazy loading', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'off_img_viewer',
                    'label' => __('Disable content image lightbox preview', PUOCK),
                    'type' => 'switch',
                    'sdt' => false,
                ],
                [
                    'id' => 'off_code_highlighting',
                    'label' => __('Disable theme code highlighting', PUOCK),
                    'type' => 'switch',
                    'sdt' => false,
                ],
                [
                    'id' => 'post_content_indent',
                    'label' => __('First line indent', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'link_blank_content',
                    'label' => __('Open content links in new tab', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'link_go_page',
                    'label' => __('Content link redirect', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'use_post_menu',
                    'label' => __('Generate sidebar table of contents', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                    'tips' => __('Check this to display article TOC in sidebar', PUOCK),
                ],
                [
                    'id' => 'comment_ajax',
                    'label' => __('Comment ajax pagination', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'page_ajax_load',
                    'label' => __('Page no-refresh loading', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                    'tips' => "Except for links opened in new tabs"
                ],
                [
                    'id' => 'async_view',
                    'label' => __('Async view count', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                    'tips' => __('This option is a solution for view count not incrementing after caching is enabled', PUOCK)
                ],
                [
                    'id' => 'page_animate',
                    'label' => __('Page module loading animation', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'page_link_before_icon',
                    'label' => __('Display icon before page content links', PUOCK),
                    'type' => 'switch',
                    'sdt' => false,
                ],
                [
                    'id' => '-',
                    'type' => 'panel',
                    'open' => pk_is_checked('post_expire_tips_open'),
                    'label' => __('Article expiration notice', PUOCK),
                    'children'=>[
                        [
                            'id' => 'post_expire_tips_open',
                            'label' => __('Enable', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'post_expire_tips_day',
                            'label' => __('Greater than N days', PUOCK),
                            'type' => 'number',
                            'sdt' => 100,
                        ],
                        [
                            'id' => 'post_expire_tips',
                            'label' => __('Notice content', PUOCK),
                            'sdt' => __('<i class="fa fa-circle-exclamation me-1"></i>Reminder: This article was last updated on {date}, the information may have changed, please be aware!', PUOCK),
                            'tips' => __('{date}: Article last update time', PUOCK),
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'type' => 'panel',
                    'open' => true,
                    'label' => __('Comment related', PUOCK),
                    'children' => [
                        [
                            'id' => 'comment_level',
                            'label' => __('Comment level', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'comment_mail_notify',
                            'label' => __('Comment reply email notification', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'comment_has_at',
                            'label' => __('Comment @ feature', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'comment_show_ua',
                            'label' => __('Show user UA in comments', PUOCK),
                            'type' => 'switch',
                            'sdt' => true,
                        ],
                        [
                            'id' => 'comment_show_ip',
                            'label' => __('Show IP location and carrier', PUOCK),
                            'type' => 'switch',
                            'sdt' => true,
                        ],
                        [
                            'id' => 'comment_dont_show_owner_ip',
                            'label' => __('Do not show admin IP location and carrier', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                        ],
                        [
                            'id' => 'comment_duplicate_check',
                            'label' => __('Enable duplicate comment check', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                            'tips' => __('When enabled, users are prohibited from posting identical comments. When disabled, users can send repeated short replies (such as "thanks"), recommended to disable for better UX', PUOCK),
                        ],
                    ]
                ],
                [
                    'id' => 'post_poster_open',
                    'label' => __('Article poster generation', PUOCK),
                    'tips' => __('If images cannot be generated, check if they meet cross-domain requirements', PUOCK),

                    'type' => 'switch',
                    'sdt' => false,
                ],
                [
                    'id' => 'page_copy_right',
                    'label' => __('Show content copyright notice', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'page_b_recommend',
                    'label' => __('Show related recommendations at bottom', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'page_b_recommend_num',
                    'label' => __('Number of related articles at bottom', PUOCK),
                    'tips' => __('Recommended to be a multiple of 4, otherwise there will be empty spaces', PUOCK),
                    'type' => 'number',
                    'sdt' => 4,
                ],
                [
                    'id' => 'link_page',
                    'label' => __('Friend links page', PUOCK),
                    'type' => 'select',
                    'options' => self::get_pages(),
                ],
                [
                    'id' => 'index_link_id',
                    'label' => __('Homepage friend links category ID', PUOCK),
                    'type' => 'select',
                    'options' => self::get_link_category(),
                ],
                [
                    'id' => 'index_link_order_by',
                    'label' => __('Homepage friend links sort field', PUOCK),
                    'tips' => __('Sort by link field, default is ID sorting', PUOCK),
                    'type' => 'select',
                    'options' => self::get_link_order_by(),
                ],
                [
                    'id' => 'index_link_order',
                    'label' => __('Homepage friend links sort order', PUOCK),
                    'tips' => __('Default is ascending (ASC)', PUOCK),
                    'type' => 'select',
                    'options' => self::get_link_order(),
                ],
                [
                    'id' => 'gravatar_url',
                    'label' => __('Gravatar avatar source', PUOCK),
                    'type' => 'radio',
                    'sdt' => 'cravatar',
                    'radioType' => 'radio',
                    'options' => [
                        [
                            'value' => 'wp',
                            'label' => __('WordPress default', PUOCK),
                        ],
                        [
                            'value' => 'cn',
                            'label' => __('WordPress China default', PUOCK),
                        ],
                        [
                            'value' => 'cn_ssl',
                            'label' => __('WordPress China default SSL', PUOCK),
                        ],
                        [
                            'value' => 'cravatar',
                            'label' => 'Cravatar',
                        ],
                        [
                            'value' => 'v2ex',
                            'label' => 'V2EX',
                        ],
                        [
                            'value' => 'loli',
                            'label' => 'loli.net'
                        ],
                        [
                            'value' => 'custom',
                            'label' => __('Custom', PUOCK)
                        ]
                    ],
                ],
                [
                    'id'=>'gravatar_custom_url',
                    'label'=>__('Custom Gravatar source', PUOCK),
                    'tips'=>__('For example: ',PUOCK).'<code>gravatar.example.com</code>',
                    'showRefId'=>'func:(function(args){return args.data.gravatar_url==="custom"})(args)'
                ],
                [
                    'id' => 'post_reward',
                    'label' => __('Article appreciation', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                ],
                [
                    'id' => 'post_reward_alipay',
                    'label' => __('Article appreciation Alipay QR code', PUOCK),
                    'type' => 'img',
                    'showRefId' => 'post_reward',
                    'tips' => __('Please select an image with 1:1 aspect ratio', PUOCK)
                ],
                [
                    'id' => 'post_reward_wx',
                    'label' => __('Article appreciation WeChat QR code', PUOCK),
                    'type' => 'img',
                    'showRefId' => 'post_reward',
                    'tips' => __('Please select an image with 1:1 aspect ratio', PUOCK)
                ],
                [
                    'id' => 'post_foot_qrcode_open',
                    'label' => __('Article bottom QR code', PUOCK),
                    'type' => 'switch',
                    'sdt' => 'false',
                    'tips' => __('Please select an image with 1:1 aspect ratio', PUOCK)
                ],
                [
                    'id' => 'post_foot_qrcode_title',
                    'label' => __('Article bottom QR code title', PUOCK),
                    'sdt' => '',
                    'showRefId' => 'post_foot_qrcode_open',
                ],
                [
                    'id' => 'post_foot_qrcode_img',
                    'label' => __('Article bottom QR code', PUOCK),
                    'type' => 'img',
                    'showRefId' => 'post_foot_qrcode_open',
                ],
                [
                    'id' => 'post_reprint_note',
                    'label' => __('Article reprint instructions', PUOCK),
                    'type' => 'textarea',
                    'sdt' => __('Unless otherwise stated, all articles are published under CC-4.0 license. Please indicate the source when reprinting.', PUOCK),
                ],
                [
                    'id' => 'post_read_time',
                    'label' => __('Article reading time', PUOCK),
                    'type' => 'switch',
                    'sdt' => false,
                ]
            ],
        ];
    }
}
