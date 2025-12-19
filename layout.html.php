<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo head_contents();?>
		<title<?php echo $title;?></title>
		<meta name="description" content="<?php echo $description; ?>"/>
		<link rel="canonical" href="<?php echo $canonical; ?>" />
		<?php if (publisher()): ?>
		<link href="<?php echo publisher() ?>" rel="publisher" /><?php endif; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
	function setTheme(themeName) {
  localStorage.setItem('theme', themeName);

  //document.documentElement.className = themeName;

  var link = document.createElement('link');
  link.rel = 'stylesheet';
  if (themeName == "theme-dark") {
    link.href = '<?php echo theme_path();?>css/dark.css';
  } else {
    link.href = '<?php echo theme_path();?>css/light.css';
  }
  document.head.appendChild(link);
}

// function to toggle between light and dark theme
function toggleTheme() {
  if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-light');
  } else {
    setTheme('theme-dark');
  }
}

// Immediately invoked function to set the theme on initial load
(function() {
  if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-dark');
  } else {
    setTheme('theme-light');
  }
})();
	</script>
	</head>
	<body>
		<?php if (facebook()) { echo facebook(); } ?>
		<?php if (login()) { toolbar(); } ?>
		<header>
			<?php if(is_index()) {?>
			<h1><a href="<?php echo site_url();?>"><?php echo blog_title();?></a></h1>
			<?php } else { ?>
			<h1><a href="<?php echo site_url();?>"><?php echo blog_title();?></a></h1>
			<?php } ?>
			
			<nav>
				<?php echo menu();?>
			</nav>
		</header>
		
      <button id="switch" onclick="toggleTheme()">🌙/☀</button>
    
		<div>
			<?php echo content();?>
		</div>

		<footer>
			<?php echo copyright();?> | <?php echo blog_description();?>
		</footer>

	</body>
</html>
