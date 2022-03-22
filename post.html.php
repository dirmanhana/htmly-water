<?php if (!defined('HTMLY')) die('HTMLy'); ?>
    <?php if (login()) { echo tab($p); } ?>     
        Posted in <?php echo $p->category;?>
        <?php if (!empty($p->link)) { ?>  
                <h1 class="post-title"><a target="_blank" href="<?php echo $p->link ?>"></a><?php echo $p->title ?></h1>
        <?php } else { ?>
            <h1><?php echo $p->title; ?></h1>
        <?php } ?>
        <?php echo format_date($p->date); ?>
   
    <?php if (!empty($p->image)) { ?>
        <div class="featured featured-image">
            <img itemprop="image" width="100%" src="<?php echo $p->image; ?>" alt="<?php echo $p->title ?>"/>
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
    <div class="post-content">
        <?php echo $p->body; ?>
    </div>
    <div>
        <div>
            <p>Tagged: <?php echo $p->tag;?></p>
        </div>
        <div>
            <p class="info prompt">Share:
            <a onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" href="https://twitter.com/share?url=<?php echo $p->url ?>&text=<?php echo $p->title ?>">
            <span class="hidden">Twitter</span>
            </a> | 
            <a onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" href="https://www.facebook.com/sharer.php?u=<?php echo $p->url ?>&t=<?php echo $p->title ?>">
            <span class="hidden">Facebook</span>
            </a>
			</p>
        </div>
        
    </div>
    
        
 
            <p>Author: <a href="<?php echo $p->authorUrl;?>"><?php echo $author->name;?></a></p>
			
      
    <?php if (disqus()): ?>
        <?php echo disqus($p->title, $p->url) ?>
    <?php endif; ?>
    <?php if (disqus_count()): ?>
        <?php echo disqus_count() ?>
    <?php endif; ?>
    <?php if (facebook() || disqus()): ?>
        <section class="comments" id="comments">
            <?php if (facebook()): ?>
                <div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
            <?php endif; ?>
            <?php if (disqus()): ?>
                <div id="disqus_thread"></div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
	
	<h4>Related posts</h4>
			<?php echo get_related($p->related)?>
	
    <?php if (!empty($prev) || !empty($next)): ?>
        
            <?php if (!empty($next)): ?>
                <a href="<?php echo($next['url']); ?>"><i class="fa fa-chevron-circle-left"></i>< Next Post</a>
            <?php endif; ?>
            &nbsp;
            <?php if (!empty($prev)): ?>
                <a href="<?php echo($prev['url']); ?>">Previous Post > <i class="fa fa-chevron-circle-right"></i></a>
            <?php endif; ?>
        
    <?php endif; ?>
