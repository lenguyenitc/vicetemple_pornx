<div id="cookie-notice" class="cookie <?php echo get_theme_mod('cookie_text_pos');?>" style="<?php if(get_theme_mod('cookie_block_color')):?>background-color:<?php echo get_theme_mod('cookie_block_color'); else:?>background-color: #1E2739; <?php endif;?>">
	<div class="cookie-notice-container" style="<?php if(get_theme_mod('cookie_text_color')):?>color:<?php echo get_theme_mod('cookie_text_color');?>;<?php else: ?>color:#fff; <?php endif; ?>">
        <span id="cn-notice-text" class="cn-text-container">
           <?php if(get_theme_mod('cookie_text')){echo get_theme_mod('cookie_text');}else{echo'We use cookies to provide our services. By using this website, you agree to this.';}?>
        </span>
		<span id="cn-notice-buttons" class="cn-buttons-container">
            <a class="button" style="<?php if(get_theme_mod('cookie_btn_color')):?>background-color:<?php echo get_theme_mod('cookie_btn_color');?> !important;border-color:<?php echo get_theme_mod('cookie_btn_color'); ?> !important; <?php else:?>background-color:#FF00D6;border-color:#FF00D6;<?php endif;?>"><?php if(get_theme_mod('agree_btn_text')){echo get_theme_mod('agree_btn_text');}else{echo __('I Agree','arc');}?></a>
            <?php if(get_theme_mod('cookie_dropdownpages') !== false || get_theme_mod('cookie_dropdownpages') != 0 || get_theme_mod('cookie_dropdownpages') != '') :?>
	            <a><?php echo __('Privacy policy', 'arc');?></a>
            <?php endif;?>
        </span>
	</div>
	<span aria-hidden="true" class="closeCookie">
        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="<?php echo get_theme_mod('cookie_btn_color');?>"/>
        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="<?php echo get_theme_mod('cookie_btn_color');?>"/>
        </svg>
    </span>
</div>