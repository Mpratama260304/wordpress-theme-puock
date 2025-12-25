<?php

pk_ajax_register('pk_ajax_dialog_reward', 'pk_ajax_dialog_reward', true);
function pk_ajax_dialog_reward()
{
    $reward_alipay = pk_get_option('post_reward_alipay');
    $reward_wx = pk_get_option('post_reward_wx');
    if (empty($reward_alipay) && empty($reward_wx)) {
        echo '<div class="mt20 text-center">' . __('No reward QR codes available', PUOCK) . '</div>';
    } else {
        ?>
        <div class="p-flex-sbc">
            <?php if (!empty($reward_alipay)): ?>
                <div class="mr10" id="reward-alipay">
                    <img src="<?php echo $reward_alipay; ?>" style="width: 140px" alt="<?php esc_attr_e('Alipay Donation', PUOCK); ?>" title="<?php esc_attr_e('Alipay Donation', PUOCK); ?>" data-bs-toggle="tooltip"/>
                    <p class="mt10 text-center fs12"><i class="fa-brands fa-alipay"></i>&nbsp;<?php _e('Please scan with Alipay', PUOCK); ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($reward_wx)): ?>
                <div id="reward-wx">
                    <img src="<?php echo $reward_wx ?>" style="width: 140px" alt="<?php esc_attr_e('WeChat Donation', PUOCK); ?>" title="<?php esc_attr_e('WeChat Donation', PUOCK); ?>" data-bs-toggle="tooltip"/>
                    <p class="mt10 text-center fs12"><i class="fa-brands fa-weixin"></i>&nbsp;<?php _e('Please scan with WeChat', PUOCK); ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
    <?php wp_die();
} ?>
