<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article>
    <?php if (login()) { echo tab($p); } ?> 
    <header>
        <h1><?php echo $p->title;?></h1>
    </header>
    <section>
        <?php echo $p->body; ?>
    </section>
</article>