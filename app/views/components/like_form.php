<div class="tweet-nav mb-3">
    <form action="like.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">

        <?php if (in_array($tweet['id'], $user_likes)) : ?>
            <button class="btn btn-sm" type="submit" name="unlike"><img src="../images/svg/heart_active.svg"></button>
            <span class="like-count"><?= @$like_counts[$tweet['id']] ?></span>
        <?php else : ?>
            <button class="btn btn-sm" type="submit" name="like"><img src="../images/svg/heart.svg"></button>
            <span class="like-count"><?= @$like_counts[$tweet['id']] ?></span>
        <?php endif ?>
    </form>
</div>