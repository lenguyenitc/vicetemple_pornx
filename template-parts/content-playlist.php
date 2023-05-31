<?php
global $post;
$videoInPlaylist = get_the_terms($post->ID, 'playlists');
$user = wp_get_current_user();
$favorites = get_user_meta($user->ID, "userPlaylists");
//dumper($videoInPlaylist);
?>
<div id="video-playlist">
    <?php
        $terms = get_terms([
            'taxonomy'      => array('playlists'),
            'hide_empty'    => false]);
        if(count($terms) == 0 || count($favorites) == 0): ?>
    <p><?php echo __('No created playlist yet', 'arc');?></p>
    <?php endif;?>
    <h4 class="widget-title" style="margin-bottom: 20px">
        <span>
	        <?php echo __('Video is in the following playlists', 'arc') ?>
        </span>
        <a class="btn btn-info" id="createPlaylist" data-toggle="modal" data-target="#playlistModal">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="7" width="16" height="2" rx="1" fill="white"></rect>
                <rect x="7" y="16" width="16" height="2" rx="1" transform="rotate(-90 7 16)" fill="white"></rect>
            </svg>
		    <?php echo __('Add to playlist','arc');?></a>
    </h4>
    <table>
        <tr>
            <?php
            foreach ($videoInPlaylist as $video) {
	            foreach ($favorites as $favorite) {
	                if($favorite == $video->term_id) {
		                $playLists[] = get_term($favorite, 'playlists', 'ARRAY_A');
                    }
                }
            }?>
            <td>
                <p style="margin: 0;">
                <?php
                if(count($playLists) == 0): echo '<span id="isnt_in">'.__('You have not added this video to any playlist.', 'arc').'</span>';
                endif;?>
                </p>
                <style>
                   ul#videoInPlayList {
                       list-style: none;
                       padding-left: 0;
                       margin: 0px 0 0 10px;
                       /*-webkit-column-count: 5;
                       -moz-column-count: 5;
                       column-count: 5;
                       -moz-column-gap: 10px;
                       -webkit-column-gap: 10px;
                       column-gap: 10px;*/
                       display: flex;
                       justify-content: flex-start;
                       margin: auto;
                       flex-wrap: wrap;
                   }

                   ul#videoInPlayList li a {
                       padding: 2px!important;
                       padding-left: 4px!important;
                       padding-right: 4px!important;
                       font-family: 'Roboto',sans-serif;
                       font-style: normal;
                       font-weight: normal;
                       font-size: 14px;
                       line-height: 21px;
                       color: <?=get_theme_mod('text_site_color')?>;
                       white-space: nowrap;
                       overflow: hidden;
                       text-overflow: ellipsis;
                       max-width: 90px;
                   }
                   ul#videoInPlayList li{
                       /*float: left;
                       max-width: 126px;
                       margin-bottom: 5px;*/
                       max-width: 126px;
                       /*width: calc((100% - 40px)/3);*/
                       width: 100%;
                       margin-bottom: 5px;
                       margin-right: 40px;
                       clear: both;
                   }
                   /*ul#videoInPlayList li:nth-child(1n+5) {
                       margin-right: 0px;
                   }*/
                   ul#videoInPlayList li div {
                       display: flex;
                       justify-content: space-between;
                   }
                   ul#videoInPlayList li div span{
                       float: left;
                       font-family: 'Roboto', sans-serif;
                       font-style: normal !important;
                       font-weight: 500!important;
                       font-size: 14px!important;
                       line-height: 16px!important;
                       color: <?=get_theme_mod('text_site_color')?> !important;
                   }
                   ul#videoInPlayList li span a i{
                       font-size: 17px !important;
                       color: rgba(<?php
                        $hex = get_theme_mod('links_color_setting');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 0.5);
                   }
                </style>
                <ul id="videoInPlayList">
                <?php
                if(count($playLists)>0):
                    foreach ($playLists as $playlist):?>
                        <li data-list="<?php echo $playlist['slug'];?>">
                            <span>
                                <a style="float:left" href="<?php echo esc_url(home_url()); ?>?playlists=<?php echo $playlist['slug']; ?>" data-list="<?php echo $playlist['slug'];?>">
                                    <?php echo $playlist['name'];?></a>
                                <a style="float:right" href="#" class="removeFromPlaylist" data-post="<?php echo $post->ID;?>" data-list="<?php echo $playlist['slug'];?>">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 4C0 1.79086 1.79086 0 4 0H14C16.2091 0 18 1.79086 18 4V14C18 16.2091 16.2091 18 14 18H4C1.79086 18 0 16.2091 0 14V4Z" fill="#1E2739" fill-opacity="0.8"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8302 13.8213C14.0566 13.5832 14.0566 13.1972 13.8302 12.9591L9.81992 8.74166L13.3389 5.04093C13.5653 4.80284 13.5653 4.41681 13.3389 4.17871C13.1125 3.94061 12.7454 3.94061 12.519 4.17871L9.00005 7.87944L5.48098 4.17857C5.25457 3.94048 4.88751 3.94048 4.66111 4.17857C4.43471 4.41667 4.43471 4.8027 4.66111 5.04079L8.18018 8.74166L4.1698 12.9592C3.9434 13.1973 3.9434 13.5833 4.1698 13.8214C4.3962 14.0595 4.76327 14.0595 4.98967 13.8214L9.00005 9.60388L13.0103 13.8213C13.2367 14.0594 13.6038 14.0594 13.8302 13.8213Z" fill="white" fill-opacity="0.5"/>
                                    </svg>
                                </a>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </td>
            <?php endif;?>
        </tr>
    </table>
</div>
    <div class="modal fade" id="playlistModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index:99999;overflow: auto;">
        <div class="modal-dialog" data-active-tab="">
            <div class="modal-content">
                <div class="modal-body" style="padding-bottom: 10px; padding-top: 0; padding-left: 0; padding-right: 0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                                <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                            </svg>
                        </button>
                    </div>
                    <div id="form_container">
                        <form>
                            <h3 class="modal-title">Add video</h3>
                            <span class="to_existing">to a new or an existing playlist</span>
                            <div class="modal-separator"></div>
                            <p id="playlistSuccess" style="margin-top:0;display: none;color: greenyellow; text-align: center; width: 100%"></p>
                            <p id="playlistError" style="margin-top:0;display: none;color: orangered;text-align: center; width: 100%"></p>
                            <div id="existings">
                                <div id="exist_inside">
                                    <div class="form-group" style="text-align: center">
                                        <select class="form-control" id="playlistList">
			                                <?php //if(count($favorites) !== 0):?>
				                                <?php
				                                foreach ($favorites as $favorite) {
					                                $userPlaylists[] = get_term($favorite, 'playlists', 'ARRAY_A');
				                                }
				                                arsort($userPlaylists);
				                                foreach ($userPlaylists as $userPlayList):
                                                    if(is_object_in_term($post->ID, 'playlists', $userPlayList['term_id'])) continue;
					                                ?>
                                                    <option data-id="<?php echo $userPlayList['slug'];?>"><?php echo $userPlayList['name'];?></option>
				                                <?php endforeach;?>
                                                <option data-id="noSelect"><?php echo __('Create a playlist', 'arc');?></option>
			                                <?php //endif;?>
                                        </select>
                                    </div>
                                    <div id="create_new">
                                        <div class="form-group" style="display:none; margin: 0 auto; text-align: center" id="div_playlistTitle">
                                            <input type="text" required class="form-control" id="playlistTitle" placeholder="Title"/>
                                        </div>
                                        <div class="form-group" style="display:none; margin: 0 auto;text-align: center" id="div_playlistDesc">
                                            <textarea class="form-control" style="min-height: 4em !important;" id="playlistDesc" rows="2" placeholder="Description" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" id="savePlaylist"><?php echo __('Add video','arc');?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


