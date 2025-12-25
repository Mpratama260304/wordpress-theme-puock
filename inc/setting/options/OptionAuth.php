<?php

namespace Puock\Theme\setting\options;

class OptionAuth extends BaseOptionItem
{

    function get_fields(): array
    {
        return [
            'key' => 'auth',
            'label' => __('Login & Auth', PUOCK),
            'icon' => 'czs-qq',
            'fields' => [
                [
                    'id' => '-',
                    'label' => __('Quick login', PUOCK),
                    'type' => 'panel',
                    'open' => true,
                    'children' => [
                        [
                            'id' => 'open_quick_login',
                            'label' => __('Enable quick login', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                        ],
                        [
                            'id' => 'only_quick_oauth',
                            'label' => __('Only allow third-party login', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                        ],
                        [
                            'id' => 'quick_login_try_max_open',
                            'label' => __('Enable maximum login attempt limit', PUOCK),
                            'tips' => __('After this number is exceeded, the corresponding IP will be blocked from logging in', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                        ],
                        [
                            'id' => 'quick_login_try_max_num',
                            'label' => __('Maximum login attempts', PUOCK),
                            'type' => 'number',
                            'sdt' => 3,
                        ],
                        [
                            'id' => 'quick_login_try_max_ban_time',
                            'label' => __('Ban time after login attempts reached (minutes)', PUOCK),
                            'type' => 'number',
                            'sdt' => 10,
                        ],
                        [
                            'id' => 'quick_login_forget_password',
                            'label' => __('Enable forgot password recovery', PUOCK),
                            'type' => 'switch',
                            'sdt' => false,
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'type' => 'panel',
                    'label' => __('Admin login protection', PUOCK),
                    'open' => pk_is_checked('login_protection'),
                    'children' => [
                        [
                            'id' => 'login_protection',
                            'label' => __('Enable admin login protection', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                            'tips' => 'func:(function(args){
                            const link = `' . home_url() . '/wp-login.php?${args.data.lp_user}=${args.data.lp_pass}`
                            return `<div>启用后则用 <a href="${link}" target="_blank">${link}</a> 的方式访问后台入口</div>`
                        })(args)'
                        ],
                        [
                            'id' => 'lp_user',
                            'label' => __('Admin login protection parameter', PUOCK),
                            'sdt' => 'admin',
                            'showRefId' => 'login_protection',
                        ],
                        [
                            'id' => 'lp_pass',
                            'label' => __('Admin login protection password', PUOCK),
                            'sdt' => 'admin',
                            'showRefId' => 'login_protection',
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'label' => __('Third-party login callback address hint', PUOCK),
                    'type' => 'info',
                    'infoType' => 'info',
                    'tips' => '通用回调地址（callback url）为: <code>' . home_url() . '/wp-admin/admin-ajax.php</code>'
                ],
                [
                    'id' => 'oauth_close_register',
                    'label' => __('Disable direct registration via third-party login', PUOCK),
                    'type' => 'switch',
                    'tips' => __('When enabled, if a user has not bound an account for third-party login, a new account will not be created automatically', PUOCK),
                    'std' => false
                ],
                [
                    'id' => '-',
                    'label' => 'QQ ' . __('Login configuration', PUOCK),
                    'type' => 'panel',
                    'open' => pk_is_checked('oauth_qq'),
                    'tips' => '<a target="_blank" href="https://wiki.connect.qq.com/%E7%BD%91%E7%AB%99%E6%8E%A5%E5%85%A5%E6%B5%81%E7%A8%8B">' . __('Application steps and instructions', PUOCK) . '</a>',
                    'children' => [
                        [
                            'id' => 'oauth_qq',
                            'label' => 'QQ ' . __('Login', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'oauth_qq_id',
                            'label' => __('QQ Login', PUOCK) . ' APP ID',
                            'sdt' => '',
                            'showRefId' => 'oauth_qq',
                        ],
                        [
                            'id' => 'oauth_qq_key',
                            'label' => __('QQ Login', PUOCK) . ' APP KEY',
                            'sdt' => '',
                            'showRefId' => 'oauth_qq',
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'label' => 'Github ' . __('Login configuration', PUOCK),
                    'type' => 'panel',
                    'open' => pk_is_checked('oauth_github'),
                    'tips' => '<a target="_blank" href="https://www.ruanyifeng.com/blog/2019/04/github-oauth.html">' . __('Application steps and instructions', PUOCK) . '</a>',
                    'children' => [
                        [
                            'id' => 'oauth_github',
                            'label' => 'Github ' . __('Login', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'oauth_github_id',
                            'label' => 'Github Client ID',
                            'sdt' => '',
                            'showRefId' => 'oauth_github',
                        ],
                        [
                            'id' => 'oauth_github_secret',
                            'label' => 'Github Client Secret',
                            'sdt' => '',
                            'showRefId' => 'oauth_github',
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'label' => __('Weibo', PUOCK).' ' . __('Login configuration', PUOCK),
                    'type' => 'panel',
                    'open' => pk_is_checked('oauth_weibo'),
                    'tips' => '<a target="_blank" href="https://open.weibo.com/wiki/%E7%BD%91%E7%AB%99%E6%8E%A5%E5%85%A5%E4%BB%8B%E7%BB%8D">' . __('Application steps and instructions', PUOCK) . '</a>',
                    'children' => [
                        [
                            'id' => 'oauth_weibo',
                            'label' => __('Weibo', PUOCK) . ' ' . __('Login', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'oauth_weibo_key',
                            'label' => __('Weibo', PUOCK) . ' App Key',
                            'sdt' => '',
                            'showRefId' => 'oauth_weibo',
                        ],
                        [
                            'id' => 'oauth_weibo_secret',
                            'label' => __('Weibo', PUOCK) . ' App Secret',
                            'sdt' => '',
                            'showRefId' => 'oauth_weibo',
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'label' => 'Gitee ' . __('Login configuration', PUOCK),
                    'type' => 'panel',
                    'open' => pk_is_checked('oauth_gitee'),
                    'tips' => '<a target="_blank" href="https://gitee.com/api/v5/oauth_doc#/list-item-3">' . __('Application steps and instructions', PUOCK) . '</a>',
                    'children' => [
                        [
                            'id' => 'oauth_gitee',
                            'label' => 'Gitee ' . __('Login', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'oauth_gitee_id',
                            'label' => 'Gitee Client ID',
                            'sdt' => '',
                            'showRefId' => 'oauth_gitee',
                        ],
                        [
                            'id' => 'oauth_gitee_secret',
                            'label' => 'Gitee Client Secret',
                            'sdt' => '',
                            'showRefId' => 'oauth_gitee',
                        ],
                    ]
                ],
                [
                    'id' => '-',
                    'label' => 'LinuxDO ' . __('Login configuration', PUOCK),
                    'type' => 'panel',
                    'open' => pk_is_checked('oauth_linuxdo'),
                    'tips' => '<a target="_blank" href="https://connect.linux.do">' . __('Application steps and instructions', PUOCK) . '</a>',
                    'children' => [
                        [
                            'id' => '-',
                            'label' => __('Third-party login callback address hint', PUOCK),
                            'type' => 'info',
                            'infoType' => 'info',
                            'tips' => '通用回调地址（callback url）为: <code>' . PUOCK_ABS_URI . '/inc/oauth/callback/linuxdo.php</code>'
                        ],
                        [
                            'id' => 'oauth_linuxdo',
                            'label' => 'LinuxDO ' . __('Login', PUOCK),
                            'type' => 'switch',
                            'sdt' => 'false',
                        ],
                        [
                            'id' => 'oauth_linuxdo_id',
                            'label' => 'LinuxDO Client ID',
                            'sdt' => '',
                            'showRefId' => 'oauth_linuxdo',
                        ],
                        [
                            'id' => 'oauth_linuxdo_secret',
                            'label' => 'LinuxDO Client Secret',
                            'sdt' => '',
                            'showRefId' => 'oauth_linuxdo',
                        ],
                    ]
                ],
            ],
        ];
    }
}
