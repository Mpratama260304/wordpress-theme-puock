
<div class="p-block p-lf-15">
    <div class="row text-center pd-links single-next-or-pre t-md ">
        <div class="col-6 p-border-r-1 p-0">
            <?php if(!empty(get_previous_post_link())): ?>
                <?php echo get_previous_post_link("%link","<div class='abhl puock-text'><p class='t-line-1'>%title</p><span>".__('Previous', PUOCK) ."</span></div>") ?>
            <?php else:?>
                <a rel="prev">
                    <div class="abhl">
                        <p class="t-line-1"><?php _e('Already the earliest article', PUOCK) ?></p>
                        <span><?php _e('Previous', PUOCK) ?></span>
                    </div>
                </a>
            <?php endif?>
        </div>
        <div class="col-6 p-0">
            <?php if(!empty(get_next_post_link())): ?>
                <?php echo get_next_post_link("%link","<div class='abhl puock-text'><p class='t-line-1'>%title</p><span>".__('Next', PUOCK) ."</span></div>") ?>
            <?php else:?>
                <a rel="prev">
                    <div class="abhl">
                        <p class="t-line-1"><?php _e('Already the latest article', PUOCK) ?></p>
                        <span><?php _e('Next', PUOCK) ?></span>
                    </div>
                </a>
            <?php endif?>
        </div>
    </div>
</div>
