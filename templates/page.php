<?php
/**
Template name: newtemplate
 */
//
get_header();
?>
    <main id="site-content" class="user-list" role="main">
        <article class="page type-page status-publish hentry" id="post-83">
            <header class="users-list entry-header has-text-align-center">
                <div class="entry-header-inner section-inner medium">
                    <h1 class="entry-title">Get Users List API Response</h1>
                </div><!-- .entry-header-inner -->
            </header><!-- .entry-header -->
            <div class="post-inner thin ">
                <div class="entry-content">
                    <?php echo do_shortcode('[list_users]'); ?>
                </div><!-- .entry-content -->
            </div><!-- .post-inner -->
        </article><!-- .post -->
        <div id="popup" class="modal">
            <div class="loader"></div>
            <div id="user_data"></div>
        </div>
    </main>
<?php
get_footer();
?>
