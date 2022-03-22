<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php foreach ($posts as $p): ?>

        <?php if (!empty($p->link)) { ?>
                <h2><a target="_blank" href="<?php echo $p->link ?>"></a><?php echo $p->title ?></h2>            
        <?php } else { ?>
            <h2><a href="<?php echo $p->url; ?>"></a><?php echo $p->title; ?></h2>
        <?php } ?>
        <p><?php echo format_date($p->date); ?></p>
   
    <?php if (!empty($p->image)) { ?>
        <div class="featured featured-image">
            <a href="<?php echo $p->url; ?>"><img itemprop="image" width="100%" src="<?php echo $p->image; ?>" alt="<?php echo $p->title ?>"/></a>
        </div>
    <?php } ?>
    <?php if (!empty($p->video)) { ?>
        <div class="featured featured-video">
            <iframe width="100%" height="315px;" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    <?php } ?>
    <?php if (!empty($p->audio)) { ?>
        <div class="featured featured-audio">
            <iframe width="100%" height="200px;" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
        </div>
    <?php } ?>
    <?php if (!empty($p->quote)) { ?>
        <div class="featured featured-quote">
            <blockquote class="quote"><p><i class="fa fa-quote-left"></i> <?php echo $p->quote ?> <i class="fa fa-quote-right"></i></p></blockquote>
        </div>
    <?php } ?>
   
        <?php echo get_teaser($p->body, $p->url); ?>
        <?php if (config('teaser.type') === 'trimmed'):?><p class="readmore"><a href="<?php echo $p->url; ?>"><?php echo config('read.more'); ?></a></p><?php endif;?>
   

<?php endforeach;?>
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<div>
    <?php if (!empty($pagination['prev'])): ?>
        <a href="?page=<?php echo $page - 1 ?>">Newer</a>
    <?php endif; ?>
    <?php echo $pagination['pagenum'];?>
    <?php if (!empty($pagination['next'])): ?>
        <a href="?page=<?php echo $page + 1 ?>">Older</a>
    <?php endif; ?>
</div>
<?php endif; ?>