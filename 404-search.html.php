<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article>
    <header>
        <h1>Search results not found!</h1>
    </header>
    <section style="text-align:center;">
        <p>Please search again, or would you like to try our <a href="<?php echo site_url() ?>">homepage</a> instead?</p>
        <div>
            <?php echo search() ?>
        </div>
    </section>
</article>