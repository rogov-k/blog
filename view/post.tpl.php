<div class="wrap-post">
    <div class="post">
        <?php if (l()): ?>
            <div class="buttons" data-id="<?php echo $post['id']; ?>">
                <div class="icon delete hide"></div>
                <div class="icon update hide"></div>
                <div class="icon view hide"></div>
                <div class="icon more switch"></div>
            </div>
        <?php endif; ?>
        <div class="post-header">
            <div class="post-header-user">
                <div class="post-user-img">
                    <img src="/source/user/<?php echo $post['img']; ?>">
                </div>
                <div class="post-user-name"><?php echo $post['name']; ?></div>
                <div class="post-date"><?php echo $post['date']; ?></div>
            </div>
        </div>
        <article class="<?php if ($textLong): ?>pre<?php endif; ?>"><?php echo $post['text']; ?></article>
        <?php if ($textLong): ?>
            <div class="yet">Read more...</div>
        <?php endif; ?>
        <?php echo getHashtags($post['tags']) ?>
    </div>
</div>