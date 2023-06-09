<?php
function arc_actor_load_wp_media_files() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'arc_actor_load_wp_media_files' );
/**
 * Plugin class
 **/
if ( ! class_exists( 'Actors_Taxonomy_Images' ) ) {
	class Actors_Taxonomy_Images  {
		public function __construct() {
//
		}
		/*
		* Initialize the class and start calling our hooks and filters
		* @since 1.0.0
		*/
		public function arc_actor_init() {
			add_action( 'actors_add_form_fields', array ( $this, 'arc_actor_add_actors_image' ), 10, 2 );
			add_action( 'created_actors', array ( $this, 'arc_actor_save_actors_image' ), 10, 2 );
			add_action( 'actors_edit_form_fields', array ( $this, 'arc_actor_update_actors_image' ), 10, 2 );
			add_action( 'edited_actors', array ( $this, 'arc_actor_updated_actors_image' ), 10, 2 );
			add_action( 'admin_footer', array ( $this, 'arc_actor_add_script' ) );
		}
		/*
		* Add a form field in the new actor page
		* @since 1.0.0
		*/
		public function arc_actor_add_actors_image ( $taxonomy ) { ?>
			<div class="form-field term-group">
				<label for="actors-image-id"><?php _e('Image', 'arc'); ?></label>
				<input type="hidden" id="actors-image-id" name="actors-image-id" class="custom_media_url" value="">
				<div id="actors-image-wrapper"></div>
				<p>
					<input type="button" class="button button-secondary actors_tax_media_button" id="actors_tax_media_button" name="actors_tax_media_button" value="<?php _e( 'Add Image', 'arc' ); ?>" />
					<input type="button" class="button button-secondary actors_tax_media_remove" id="actors_tax_media_remove" name="actors_tax_media_remove" value="<?php _e( 'Remove Image', 'arc' ); ?>" />
				</p>
			</div>
			<?php
		}
		/*
		* Save the form field
		* @since 1.0.0
		*/
		public function arc_actor_save_actors_image ( $term_id, $tt_id ) {
			if( isset( $_POST['actors-image-id'] ) && '' !== $_POST['actors-image-id'] ){
				$image = $_POST['actors-image-id'];
				add_term_meta( $term_id, 'actors-image-id', $image, true );
			}
		}
		/*
		* Edit the form field
		* @since 1.0.0
		*/
		public function arc_actor_update_actors_image ( $term, $taxonomy ) { ?>
			<tr class="form-field term-group-wrap">
				<th scope="row">
					<label for="actors-image-id"><?php _e( 'Image', 'arc' ); ?></label>
				</th>
				<td>
					<?php $image_id = get_term_meta ( $term -> term_id, 'actors-image-id', true ); ?>
					<input type="hidden" id="actors-image-id" name="actors-image-id" value="<?php echo $image_id; ?>">
					<div id="actors-image-wrapper">
						<?php if ( $image_id ) { ?>
							<?php echo wp_get_attachment_image ( $image_id, 'arc_thumb_medium' ); ?>
						<?php } ?>
					</div>
					<p>
						<input type="button" class="button button-secondary actors_tax_media_button" id="actors_tax_media_button" name="actors_tax_media_button" value="<?php _e( 'Add Image', 'arc' ); ?>" />
						<input type="button" class="button button-secondary actors_tax_media_remove" id="actors_tax_media_remove" name="actors_tax_media_remove" value="<?php _e( 'Remove Image', 'arc' ); ?>" />
					</p>
				</td>
			</tr>
			<?php
		}
		/*
		* Update the form field value
		* @since 1.0.0
		*/

		public function arc_actor_updated_actors_image ( $term_id, $tt_id ) {
			if( isset( $_POST['actors-image-id'] ) && '' !== $_POST['actors-image-id'] ){
				$image = $_POST['actors-image-id'];
				update_term_meta ( $term_id, 'actors-image-id', $image );
			} else {
				update_term_meta ( $term_id, 'actors-image-id', '' );
			}
		}
		/*
		* Add script
		* @since 1.0.0
		*/
		public function arc_actor_add_script() {
			if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'pornstars' ) {
				return;
			} ?>
			<script>
                jQuery(document).ready( function($) {
                    function actor_media_upload(button_class) {
                        var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                        $('body').on('click', button_class, function(e) {
                            var button_id = '#'+$(this).attr('id');
                            var send_attachment_bkp = wp.media.editor.send.attachment;
                            var button = $(button_id);
                            _custom_media = true;
                            wp.media.editor.send.attachment = function(props, attachment){
                                if ( _custom_media ) {
                                    $('#actors-image-id').val(attachment.id);
                                    $('#actors-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                    $('#actors-image-wrapper .custom_media_image').attr('src',attachment.sizes.thumbnail.url).css('display','block');
                                } else {
                                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                                }
                            }
                            wp.media.editor.open(button);
                            return false;
                        });
                    }
                    actor_media_upload('.actors_tax_media_button.button');
                    $('body').on('click','.actors_tax_media_remove',function(){
                        $('#actors-image-id').val('');
                        $('#actors-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                    });

// Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
                    $(document).ajaxComplete(function(event, xhr, settings) {
                        if( settings.data ){
                            var queryStringArr = settings.data.split('&');
                            if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                                var xml = xhr.responseXML;
                                $response = $(xml).find('term_id').text();
                                if($response!=""){
// Clear the thumb image
                                    $('#actors-image-wrapper').html('');
                                }
                            }
                        }
                    });
                });
			</script>
		<?php }
	}
	$Actors_Taxonomy_Images = new Actors_Taxonomy_Images();
	$Actors_Taxonomy_Images->arc_actor_init();
}