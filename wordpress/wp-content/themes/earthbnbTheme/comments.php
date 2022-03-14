<?php
$count = absint(get_comments_number());
?>

<div class="comments">
<?php if ($count > 0): ?>
        <h2 class="comments-read"><?= $count ?> Commentaire<?= $count > 1 ? 's' : '' ?></h2>
        <?php else: ?>
        <h2 class="comments-title">Laisser un commentaire</h2>
        <?php endif ?>
        
        <?php 
    if (comments_open()) {
        comment_form(['title_reply' => '']);
    }
    ?>

<?php wp_list_comments() ?>

<?php paginate_comments_links() ?>
</div>