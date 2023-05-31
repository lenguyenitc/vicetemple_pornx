<?php
/****premium category****/
add_action( 'category_add_form_fields', 'arc_add_category_premium', 10, 2 );
function arc_add_category_premium ( $taxonomy ) { ?>
	<div class="form-field term-group">
		<label for="category-premium-id"><?php _e('Set this category as Premium', 'arc'); ?> <br><i>Use this option only if you have enabled membership on the site.</i></label>
		<?php if(!$value = get_term_meta ( $taxonomy->term_id, 'category-premium-id', true )) $value = 'off';?>
		<input type="checkbox" id="category-premium-id" name="category-premium-id" class="category-premium-id" <?php echo ($value=='on') ? ' checked="checked"' : '' ?>>
	</div>
	<?php
}

add_action( 'created_category', 'arc_save_category_premium', 10, 2 );
function arc_save_category_premium ( $term_id, $tt_id ) {
	if( isset( $_POST['category-premium-id'] ) && '' !== $_POST['category-premium-id'] ){
		$premium = $_POST['category-premium-id'];
		add_term_meta( $term_id, 'category-premium-id', $premium, true );
	}
}

add_action( 'category_edit_form_fields', 'arc_update_category_premium' , 10, 2 );
function arc_update_category_premium ( $term, $taxonomy ) { ?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="category-premium-id"><?php _e( 'Premium category', 'arc' ); ?></label>
		</th>
		<td>
			<?php
			$premium_id = get_term_meta ( $term -> term_id, 'category-premium-id', true ); ?>
			<input type="checkbox" id="category-premium-id" name="category-premium-id" class="category-premium-id" <?php echo ($premium_id=='on') ? ' checked="checked"' : '' ?>>
		</td>
	</tr>
	<?php
}

add_action( 'edited_category', 'arc_updated_category_premium', 10, 2 );
function arc_updated_category_premium ( $term_id, $tt_id ) {
	if( isset( $_POST['category-premium-id'] ) && '' !== $_POST['category-premium-id'] ){
		$premium = $_POST['category-premium-id'];
		$posts = get_posts([
			'numberposts' => -1,
			'category'    => $term_id]);
		if(count($posts) !== 0) {
			foreach ($posts as $post){
				setup_postdata($post);
				update_post_meta($post->ID, 'premium_video', 'on');
			}
			wp_reset_postdata();
		}
		update_term_meta ( $term_id, 'category-premium-id', $premium );
	} else {
		$posts = get_posts([
			'numberposts' => -1,
			'category'    => $term_id]);
		if(count($posts) !== 0) {
			foreach ($posts as $post){
				setup_postdata($post);
				update_post_meta($post->ID, 'premium_video', 'off');
			}
			wp_reset_postdata();
		}
		update_term_meta ( $term_id, 'category-premium-id', '' );
	}
}

add_filter( 'manage_edit-category_columns', 'premium_category_columns', 10, 1 );
function premium_category_columns($premium){
	$premium['premium'] = __('Premium', 'arc');
	return $premium;
}

add_filter("manage_category_custom_column", 'fill_columns', 10, 3);
function fill_columns($out, $column_name, $id) {
	$premium = get_term_meta($id, 'category-premium-id', true);
	$premium_image = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/premium.jpg';
	switch ($column_name) {
		case 'premium':
			if($premium == 'on')
			$out .= '<img src="' . $premium_image.'" />';
			break;
	}
	return $out;
}
/*****recommended category****/
add_action( 'category_add_form_fields', 'arc_add_category_recommend', 10, 2 );
function arc_add_category_recommend ( $taxonomy ) { ?>
    <div class="form-field term-group">
        <label for="category-recommend-id"><?php _e('Set this category as Recommended', 'arc'); ?></label>
		<?php if(!$value = get_term_meta ( $taxonomy->term_id, 'category-recommend-id', true )) $value = 'off';?>
        <input type="checkbox" id="category-recommend-id" name="category-recommend-id" class="category-recommend-id" <?php echo ($value=='on') ? ' checked="checked"' : '' ?>>
    </div>
	<?php
}

add_action( 'created_category', 'arc_save_category_recommend', 10, 2 );
function arc_save_category_recommend ( $term_id, $tt_id ) {
	if( isset( $_POST['category-recommend-id'] ) && '' !== $_POST['category-recommend-id'] ){
		$premium = $_POST['category-recommend-id'];
		add_term_meta( $term_id, 'category-recommend-id', $premium, true );
	}
}

add_action( 'category_edit_form_fields', 'arc_update_category_recommend' , 10, 2 );
function arc_update_category_recommend ( $term, $taxonomy ) { ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="category-recommend-id"><?php _e( 'Recommended category', 'arc' ); ?></label>
        </th>
        <td>
			<?php
			$recommend_id = get_term_meta ( $term -> term_id, 'category-recommend-id', true ); ?>
            <input type="checkbox" id="category-recommend-id" name="category-recommend-id" class="category-recommend-id" <?php echo ($recommend_id=='on') ? ' checked="checked"' : '' ?>>
        </td>
    </tr>
	<?php
}

add_action( 'edited_category', 'arc_updated_category_recommend', 10, 2 );
function arc_updated_category_recommend ( $term_id, $tt_id ) {
	if( isset( $_POST['category-recommend-id'] ) && '' !== $_POST['category-recommend-id'] ){
		$recommend = $_POST['category-recommend-id'];
		$posts = get_posts([
			'numberposts' => -1,
			'category'    => $term_id]);
		if(count($posts) !== 0) {
			foreach ($posts as $post){
				setup_postdata($post);
				update_post_meta($post->ID, 'featured_video', 'on');
				update_post_meta($post->ID, 'hd_video', 'on');
			}
			wp_reset_postdata();
		}
		update_term_meta ( $term_id, 'category-recommend-id', $recommend );
	} else {
		$posts = get_posts([
			'numberposts' => -1,
			'category'    => $term_id]);
		if(count($posts) !== 0) {
			foreach ($posts as $post){
				setup_postdata($post);
				update_post_meta($post->ID, 'featured_video', 'off');
				update_post_meta($post->ID, 'hd_video', 'off');
			}
			wp_reset_postdata();
		}
		update_term_meta ( $term_id, 'category-recommend-id', '' );
	}
}

add_filter( 'manage_edit-category_columns', 'recommend_category_columns', 10, 1 );
function recommend_category_columns($recommend){
	$recommend['recommend'] = __('Recommend', 'arc');
	return $recommend;
}

add_filter("manage_category_custom_column", 'fill_columns_recommend', 10, 3);
function fill_columns_recommend($out, $column_name, $id) {
	$recommend = get_term_meta($id, 'category-recommend-id', true);
	switch ($column_name) {
		case 'recommend':
			if($recommend == 'on')
				$out .= '<img src="' . get_template_directory_uri() . '/assets/img/recommend.jpg" />';
			break;
	}
	return $out;
}