<?php

namespace Puock\Theme\classes;

class PuockUserCenter implements IPuockClassLoad
{

    private static array $menus = [];

    public static function load()
    {
        pk_ajax_register('pk_user_update_profile', array(__CLASS__, 'update_profile'));
        self::register_basic_menus();
    }

    private static function register_basic_menus()
    {
        self::$menus['profile'] = [
            'title' => __('Profile', PUOCK),
            'subtitle' => __('Your basic profile information', PUOCK),
            'call' => array(__CLASS__, 'page_profile'),
        ];
    }

    public static function get_menus()
    {
        return apply_filters('pk_user_center_menus', self::$menus);
    }

    public static function register_menu($id, $title, $call, $subtitle = '', $args = array())
    {
        self::$menus[$id] = [
            'title' => $title,
            'subtitle' => $subtitle,
            'call' => $call,
        ];
    }

    public static function update_profile()
    {
        if (is_string($data = pk_get_req_data([
                'nickname' => ['name' => __('Nickname', PUOCK), 'required' => true, 'remove_html' => true],
                'user_url' => ['name' => __('Website URL', PUOCK), 'remove_html' => true, 'empty' => true],
                'description' => ['name' => __('Bio', PUOCK), 'remove_html' => true, 'empty' => true],
            ])) === true) {
            echo pk_ajax_resp_error($data);
            wp_die();
        }
        $user = wp_get_current_user();
        if (!$user) {
            echo pk_ajax_resp_error(__('Please login first', PUOCK));
            wp_die();
        }
        $data['ID'] = $user->ID;
        if ($data['nickname'] != $user->nickname) {
            $data['display_name'] = $data['nickname'];
        }
        do_action('pk_update_user_profile_before', $data);
        if (!wp_update_user($data)) {
            echo pk_ajax_resp_error(__('Save failed', PUOCK));
            wp_die();
        }
        echo pk_ajax_resp(null, __('Saved successfully', PUOCK));
        do_action('pk_update_user_profile_after', $data);
        wp_die();
    }

    public static function page_profile()
    {
        $userinfo = get_userdata(get_current_user_id());
        ?>
        <form action="<?php echo pk_ajax_url('pk_user_update_profile') ?>" class="ajax-form" data-no-reset>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <input type="text" readonly class="form-control" value="<?php echo $userinfo->ID ?>">
                        </div>
                        <div class="col-8 d-flex">
                            <?php if (current_user_can('administrator')): ?>
                                <a data-no-instant href="<?php echo get_admin_url() ?>" type="button" class="btn btn-ssm btn-primary me-1">
                                    <i class="fa fa-magic"></i>
                                    <span><?php _e('WP Admin', PUOCK) ?></span>
                                </a>
                            <?php endif; ?>
                            <button type="button"
                                    onclick="layer.confirm('<?php _e('Confirm logout?', PUOCK) ?>',function (){window.Puock.goUrl('<?php echo wp_logout_url('/'); ?>')})"
                                    class="btn btn-ssm btn-danger">
                                <i class="fa fa-sign-out"></i>
                                <span><?php _e('Logout', PUOCK) ?></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"><?php _e('Username', PUOCK) ?></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" value="<?php echo $userinfo->user_nicename ?>">
                    <small class="c-sub"><?php _e('Username cannot be changed', PUOCK) ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"><?php _e('Nickname', PUOCK) ?></label>
                <div class="col-sm-10">
                    <input name="nickname" type="text" class="form-control" value="<?php echo $userinfo->nickname ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"><?php _e('Website URL', PUOCK) ?></label>
                <div class="col-sm-10">
                    <input name="user_url" type="url" class="form-control" value="<?php echo $userinfo->user_url ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"><?php _e('Bio', PUOCK) ?></label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control"
                              rows="4"><?php echo $userinfo->description ?></textarea>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-primary btn-sm" type="submit"><?php _e('Save', PUOCK) ?></button>
            </div>
        </form>
        <?php
    }
}
