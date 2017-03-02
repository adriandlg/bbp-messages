<?php global $bbpm_chats, $bbpm_pagination, $bbpm_bases;

?>

<div class="bbpm-chats bbpm-items">

    <div class="bbpm-head">
        <span class="bbpm-left">
            <a href="<?php echo bbpm_messages_url($bbpm_bases['new']); ?>" class="bbpm-new"><?php _e('&plus; New Message', BBP_MESSAGES_DOMAIN); ?></a>
        </span>

        <form method="get" action="<?php echo bbpm_messages_url(); ?>">
            <input type="text" name="search" value="<?php echo esc_attr(bbpm_search_query()); ?>" placeholder="<?php esc_attr_e('Search', BBP_MESSAGES_DOMAIN); ?>" />
        </form>
    </div>

    <div class="bbpm-body">

        <?php if ( bbpm_search_query() ) : ?>
        
            <p><?php printf(__('Showing search results for "%s":', BBP_MESSAGES_DOMAIN), bbpm_search_query()); ?></p>
        
        <?php endif; ?>

        <?php if ( $bbpm_chats->hasChats() ) : ?>

            <ul class="bbpm-list">
                
                <?php while ( $bbpm_chats->hasChats(true) ) : $bbpm_chats->theChat(); ?>

                    <?php bbpm_load_template('messages/loop-chat.php'); ?>

                <?php endwhile; ?>

            </ul>

        <?php elseif ( bbpm_search_query() ) : ?>

            <p class="bbpm-no-items"><?php _e('No chats have matched your search query, please try again with a different search term', BBP_MESSAGES_DOMAIN); ?></p>

        <?php else : ?>

            <p class="bbpm-no-chats"><?php printf(__('There are no chats to show. Get started by <a href="%s">sending a message &raquo;</a>', BBP_MESSAGES_DOMAIN), bbpm_messages_url($bbpm_bases['new'])); ?></p>

        <?php endif; ?>

    </div>

    <div class="bbpm-foot">

        <div class="bbpm-pagi">
            <?php echo paginate_links($bbpm_pagination); ?>
        </div>

    </div>

</div>