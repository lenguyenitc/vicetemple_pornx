<div class="header-search small-search">
	<form method="get" id="searchform" action="<?php home_url(); ?>/" style="display: inline-flex">
        <div style="display: inline-flex;width: 380px;">
            <?php if( get_search_query() ): ?>
                <input class="input-group-field" type="text" value=""  name="s" id="s" />
            <?php else: ?>
                <input class="input-group-field" value="" placeholder="<?php echo esc_html__('Search', 'arc'); ?>" name="s" id="s"
                        type="text" />
                <!--onfocus="if (this.value == '<?php /*echo esc_html__('Search by...', 'arc'); */?>') {this.value = '';}"
                onblur="if (this.value == '') {this.value = '<?php /*echo esc_html__('Search by...', 'arc'); */?>';}"-->
            <?php endif; ?>
            <div class="separator-search"></div>
            <select name="search-type" style="display: inline" id="search_select">
                <option value="normal" <?php selected($_GET['search-type'], 'videos')?>><?php echo __('Videos', 'arc');?></option>
                <option value="photo" <?php selected($_GET['search-type'], 'photo')?>><?php echo __('Photos', 'arc');?></option>
                <option value="pornstars" <?php selected($_GET['search-type'], 'pornstars')?>><?php echo __('Pornstars', 'arc');?></option>
                <option value="members" <?php selected($_GET['search-type'], 'members')?>><?php echo __('Members', 'arc');?></option>
                <!--<option value="blog" <?php /*selected($_GET['search-type'], 'blog')*/?>><i class="fa fa-star"></i><?php /*echo __('Blog', 'arc');*/?></option>-->
                <option value="all" <?php selected($_GET['search-type'], 'all')?>><?php echo __('All', 'arc');?></option>
            </select>
            <input class="button fa-input" type="submit" id="searchsubmit" value="" disabled="disabled"/>
            <div class="search-btn-icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.3167 14.434L11.0511 10.1684C11.8774 9.14777 12.3749 7.8509 12.3749 6.43843C12.3749 3.16471 9.71114 0.500977 6.43742 0.500977C3.1637 0.500977 0.5 3.16468 0.5 6.4384C0.5 9.71211 3.16373 12.3758 6.43745 12.3758C7.84993 12.3758 9.1468 11.8784 10.1674 11.0521L14.433 15.3177C14.5549 15.4396 14.7149 15.5008 14.8749 15.5008C15.0349 15.5008 15.1949 15.4396 15.3168 15.3177C15.5611 15.0733 15.5611 14.6783 15.3167 14.434ZM6.43745 11.1258C3.85247 11.1258 1.75 9.02338 1.75 6.4384C1.75 3.85341 3.85247 1.75094 6.43745 1.75094C9.02244 1.75094 11.1249 3.85341 11.1249 6.4384C11.1249 9.02338 9.02241 11.1258 6.43745 11.1258Z" fill="white"/>
                </svg>
            </div>
        </div>
	</form>
</div>
