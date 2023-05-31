<li class="nav-item get_site">
    <a class="nav-link" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="site" aria-selected="false">
        <i class="fas fa-angle-double-right"></i> <?php echo __('Auto Import', 'arc');?></a>
</li>
<li class="nav-item">
	<a class="nav-link" id="theme-tab" href="?page=my-theme-options">
		<i class="fas fa-cogs"></i> <?php echo __('Theme Options', 'arc');?></a>
</li>
<li class="nav-item">
    <a class="nav-link" id="email-tab" href="?page=email-settings">
        <i class="fas fa-envelope"></i> <?php echo __('Email Settings', 'arc');?></a>
</li>
<li class="nav-item dropdown" id="pluginList">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<i class="fas fa-layer-group"></i> <?php echo __('Plugins', 'arc');?></a>
	<div class="dropdown-menu">
		<?php if(is_plugin_active('vicetemple-player/vicetemple-player.php')):  ?>
			<a class="dropdown-item" href="?page=vicetemplepl-options"><?php echo __('Player Options', 'arc');?></a> <?php endif;?>
		<?php if(is_plugin_active('vicetemple-single-embedder/vicetemple-single-embedder.php')): ?>
			<a class="dropdown-item" href="?page=asev-options"><?php echo __('Single Embedder', 'arc');?></a> <?php endif;?>
		<?php if(is_plugin_active('vicetemple-mass-grabber/vicetemple-mass-grabber.php')): ?>
			<a class="dropdown-item" href="?page=amvg-options"><?php echo __('Mass Grabber', 'arc');?></a> <?php endif;?>
		<?php if(is_plugin_active('vicetemple-mass-embedder/vicetemple-mass-embedder.php')): ?>
			<a class="dropdown-item" href="?page=amve-options"><?php echo __('Mass Embedder', 'arc');?></a> <?php endif;?>
		<?php if(is_plugin_active('vicetemple-delete-broken-videos/vicetemple-delete-broken-videos.php')): ?>
			<a class="dropdown-item" href="?page=adbv-page"><?php echo __('Find Broken Videos', 'arc');?></a> <?php endif;?>
	</div>
</li>
<li class="nav-item">
    <a class="nav-link" id="likedis-tab" data-toggle="tab" href="#likedis" role="tab" aria-controls="likedis" aria-selected="false">
        <i class="fas fa-thumbs-up"></i> <?php echo __('Likes & Dislikes', 'arc');?></a>
</li>
<li class="nav-item">
    <a class="nav-link" id="ban-tab" data-toggle="tab" href="#ban" role="tab" aria-controls="ban" aria-selected="false">
        <i class="fas fa-ban"></i> <?php echo __('Ban IPs', 'arc');?>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="reports" aria-selected="false">
        <i class="fas fa-exclamation"></i> <?php echo __('Reports', 'arc');?>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" id="support-tab" data-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="false">
        <i class="fas fa-support"></i> <?php echo __('User Messages', 'arc');?>
    </a>
</li>
<li class="nav-item">
	<a class="nav-link" id="logs-tab" data-toggle="tab" href="#logs" role="tab" aria-controls="logs" aria-selected="false">
		<i class="fas fa-list-alt"></i> <?php echo __('Logs', 'arc');?>
	</a>
</li>
<li class="nav-item">
	<a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">
		<i class="fas fa-question"></i> <?php echo __('FAQ', 'arc');?></a>
</li>
