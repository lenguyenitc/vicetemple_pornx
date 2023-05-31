<div class="tab-pane fade" id="likedis" role="tabpanel" aria-labelledby="likedis-tab">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-responsive table-striped table-bordered table-hover likedis_table">
                    <tbody>
                    <tr id="table_header" class="thead-light">
                        <th width="700"><?php echo __('Video Title', 'arc');?></th>
                        <th width="340"><?php echo __('Thumbnail', 'arc');?></th>
                        <th width="100">
                            <form class="form-inline">
                                <p style="width: 100%;"><?php echo __('Likes', 'arc');?></p> <br>
                                <select name="logsLike" class="form-control likesDisSelect" id="like">
                                    <option value="ASC"><?php echo __('Ascending','arc');?></option>
                                    <option value="DESC"><?php echo __('Descending','arc');?></option>
                                </select>
                            </form>
                        </th>
                        <th width="100">
                            <form class="form-inline">
                                <p style="width: 100%;"><?php echo __('Dislikes','arc');?></p> <br>
                                <select name="logsDislike" class="form-control likesDisSelect" id="dislike">
                                    <option value="ASC"><?php echo __('Ascending','arc');?></option>
                                    <option value="DESC"><?php echo __('Descending','arc');?></option>
                                </select>
                            </form>
                        </th>
                    </tr>
                    <?php
                    $data = get_posts([
	                    'numberposts' => -1,
	                    'meta_key' => 'likes_count',
	                    'orderby'     => 'meta_value_num',
	                    'order'       => 'DESC',
	                    'post_type'   => 'post',
	                    'suppress_filters' => true,
                    ]);
                    foreach ($data as $d) {
	                    $thumb = get_post_meta($d->ID, 'thumb', true);
	                    $like = get_post_meta($d->ID, 'likes_count', true);
	                    $dislike = get_post_meta($d->ID, 'dislikes_count', true);
	                    $out[] = [
		                    'id' => $d->ID,
		                    'post_title' => $d->post_title,
		                    'guid' => $d->guid,
		                    'thumb' => $thumb,
		                    'likes' => $like,
		                    'dislikes' => $dislike
	                    ];
                    }
                    foreach($out as $value):
                    ?>
                    <tr data-id="<?php echo $value['id'];?>" class="likesDis_row">
                    <td><p style="font-size: 17px"><a style="color: black;" href="<?php echo $value['guid'];?>"><?php echo $value['post_title'];?></a></p>
                    <ul style="display: inline-flex">
                    <li style="margin-right: 10px;">
                    <a class="editP" style="font-size: 14px; text-decoration: none" href="post.php?action=edit&post=<?php echo $value['id'];?>" target="_blank"><i class="fa fa-edit"></i> Edit post</a></li>
                    <li class="draftP" style="color: #007bff; margin-right: 10px; font-size: 14px; cursor: pointer;" data-draft="<?php echo $value['id'];?>"><i class="fa fa-file-archive"></i> Draft</li>
                    <li class="deleteP" style="color: #007bff; margin-right: 10px; font-size: 14px; cursor: pointer;" data-delete="<?php echo $value['id'];?>"><i class="fa fa-trash"></i> Delete</li></ul></td>
                    <td><p><img style="width: 200px" src=<?php echo $value['thumb'];?> /></p></td>
                    <td><p><?php echo $value['likes'];?></p></td>
                    <td><p><?php echo $value['dislikes'];?></p></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="ban" role="tabpanel" aria-labelledby="ban-tab">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 margin-top-10">
                <textarea id="list_ip" rows="20" cols="6" style="width: 100%" placeholder="<?php echo __('Add one or more IPs that you wish to ban. Each one should be in a new row.', 'arc');?>"></textarea><br>
                <button type="button" class="button button-primary" id="add_to_ban"><i class="fas fa-ban"></i> <?php echo __('Ban IP(s)', 'arc');?></button>
            </div>
            <div class="col-6 margin-top-10">
                <div class="scroll-table" style="height: 445px; overflow-y: auto; border: 1px solid #dee2e6;/*clear: both*/">
                    <table class="table table-responsive table-striped table-bordered table-hover ban_table">
                        <tbody>
                            <tr id="table_header" class="thead-light">
                                <th width="680"><?php echo __('List of banned IPs', 'arc');?></th>
                                <th><?php echo __('Action', 'arc');?></th>
                            </tr>
                            <?php
                            if($all_id = get_option('ban_ip')){
	                            foreach($all_id as $value){
		                            if(empty($value)) continue;?>
		                            <tr class="<?php echo str_replace(['.', ':', '/'], '', $value);?> tr_for_del">
                                        <td width="680"><span><?php echo $value;?></span></td>
                                        <td style="text-align: center;"><button type="button" class="button button-primary delete_from_ban" id="<?php echo $value;?>"><?php echo __('Unban', 'arc');?></button></td>
		                            </tr>
	                        <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if($all_id):?>
                <div class="pull-right" style="margin-top: 5px">
                    <button class="btn btn-danger btn-sm" id="delete_all_ip_from_ban">
                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
			            <?php echo __('Unban all IPs', 'arc');?></button>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="width: 100%; margin-bottom: 20px">
                <div class="pull-right">
                    <button class="btn btn-danger btn-sm" id="delete_all_reports">
                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
						<?php echo __('Delete all reports', 'arc');?></button>
                </div>
            </div>
            <div class="col-12 margin-top-10">
                <table class="table table-responsive table-striped table-bordered table-hover reports_table">
                    <tbody>
                    <tr id="table_header" class="thead-light">
                        <th width="240"><?php echo __('Date', 'arc');?></th>
                        <th width="240">
                            <form class="form-inline">
                                <p style="width: 100%;"><?php echo __('Type', 'arc');?></p> <br>
                                <select name="reportType" class="form-control" id="reportType">
                                    <option value="all"><?php echo __('All', 'arc');?></option>
                                    <option value="wrong"><?php echo __('Inappropriate Content','arc');?></option>
                                    <option value="wrongUser"><?php echo __('This user is impersonating someone else','arc');?></option>
                                    <option value="underage"><?php echo __('Underage','arc');?></option>
                                    <option value="underagePhoto"><?php echo __('Potentially features a Minor','arc');?></option>
                                    <option value="underageUser"><?php echo __('This user appears to be underage','arc');?></option>
                                    <option value="notWork"><?php echo __('Video does not play','arc');?></option>
                                    <option value="violent"><?php echo __('Violent or Harmful Acts','arc');?></option>
                                    <option value="violentUser">This user's content violates <?=get_bloginfo('name')?>'s Terms</option>
                                    <option value="spam"><?php echo __('Spam or misleading','arc');?></option>
                                    <option value="spamUser"><?php echo __('This user is spamming','arc');?></option>
                                    <option value="otherPhoto"><?php echo __('Otherwise Inappropriate or Objectionable','arc');?></option>
                                    <option value="other"><?php echo __('Other','arc');?></option>
                                </select>
                            </form>
                        </th>
                        <th width="400"><?php echo __('Message','arc');?></th>
                        <th width="550"><?php echo __('Title', 'arc');?></th>
                        <th width="10"><?php echo __('Delete', 'arc');?></th>
                    </tr>
					<?php
					global $wpdb;
					$table = $wpdb->prefix . 'reportMsg';
					$query = "SELECT * FROM $table ORDER BY date DESC";
					$msg = $wpdb->get_results($query);
					foreach ($msg as $value):
                        if(get_post_status($value->postId) == 'draft') continue;
                        else {
	                        $videoTitle = get_the_title($value->postId);
	                        if($value->type == 'notWork') {
		                        $badge = 'danger';
		                        $text = __('Video does not play','arc');
	                        }
	                        if($value->type == 'violent') {
		                        $badge = 'danger';
		                        $text = __('Violent or Harmful Acts','arc');
	                        }
	                        if($value->type == 'violentUser') {
		                        $badge = 'danger';
		                        $text = 'This user\'s content violates '.get_bloginfo('name'). '\'s Terms';
	                        }
	                        if($value->type == 'underage') {
		                        $badge = 'warning';
		                        $text = __('Underage','arc');
	                        }
	                        if($value->type == 'underageUser') {
		                        $badge = 'warning';
		                        $text = __('This user appears to be underage','arc');
	                        }
	                        if($value->type == 'underagePhoto') {
		                        $badge = 'warning';
		                        $text = __('Potentially features a Minor','arc');
	                        }
	                        if($value->type == 'otherPhoto') {
		                        $badge = 'secondary';
		                        $text = __('Otherwise Inappropriate or Objectionable','arc');
	                        }
	                        if($value->type == 'other' || $value->type == 'otherUser') {
		                        $badge = 'secondary';
		                        $text = __('Other','arc');
	                        }
	                        if($value->type == 'wrong') {
		                        $badge = 'info';
		                        $text = __('Inappropriate Content','arc');
	                        }
	                        if($value->type == 'wrongUser') {
		                        $badge = 'info';
		                        $text = __('This user is impersonating someone else','arc');
	                        }
	                        if($value->type == 'spam') {
		                        $badge = 'primary';
		                        $text = __('Spam or misleading','arc');
	                        }
	                        if($value->type == 'spamUser') {
		                        $badge = 'primary';
		                        $text = __('This user is spamming','arc');
	                        }
                        }
                        ?>
                        <tr data-id="<?php echo $value->id;?>" data-post="<?php echo $value->postId;?>" class="report_row">
                            <td><small><?php echo $value->date;?></small></td>
                            <td><span class="badge badge-<?php echo $badge;?>"><?php echo $text;?></span></td>
                            <td><small><?php echo $value->msg;?></small></td>
                            <?php
                            if(stripos($value->postId, '&user') !== false):
                            ?>
                                <td>
                                    <a target="_blank" href="<?=site_url() . '/public-profile/?xxx='.(int)str_replace('&user', '', $value->postId)?>">
                                        <small>
                                            <?php echo get_userdata((int)str_replace('&user', '', $value->postId))->display_name;?>
                                        </small>
                                    </a>
                                </td>
                            <?php else:?>
                            <td><small><?php echo $videoTitle;?></small>
                                <ul style="display: inline-flex">
                                    <li style="margin-right: 10px;">
                                        <a class="editPR" style="font-size: 14px; text-decoration: none" href="post.php?action=edit&post=<?php echo $value->postId;?>" target="_blank"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li class="draftPR" style="color: #007bff; margin-right: 10px; font-size: 14px; cursor: pointer;" data-draft="<?php echo $value->postId;?>"><i class="fa fa-file-archive"></i> Draft</li>
                                    <li class="deletePR" style="color: #007bff; margin-right: 10px; font-size: 14px; cursor: pointer;" data-delete="<?php echo $value->postId;?>"><i class="fa fa-trash"></i> Delete</li></ul>

                            </td>
                            <?php endif;?>
                            <td>
                                <button style="float: left" type="button" class="close deleteReport" data-delete="<?php echo $value->id;?>">
                                    <span style="font-size: 24px; color: red;" aria-hidden="true">&times;</span>
                                </button>
                            </td>
                        </tr>
					<?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="width: 100%; margin-bottom: 20px">
                <div class="pull-right">
                    <button class="btn btn-danger btn-sm" id="delete_all_msg">
                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        <?php echo __('Delete all messages', 'arc');?></button>
                </div>
            </div>
            <div class="col-12 margin-top-10">
                <table class="table table-responsive table-striped table-bordered table-hover support_table">
                    <tbody>
                    <tr id="table_header" class="thead-light">
                        <th width="240"><?php echo __('Date', 'arc');?></th>
                        <th width="240">
                            <form class="form-inline">
                                <p style="width: 100%;"><?php echo __('Type', 'arc');?></p> <br>
                                <select name="supportType" class="form-control" id="msgType">
                                    <option value="all"><?php echo __('All', 'arc');?></option>
                                    <option value="Bug"><?php echo __('Bug','arc');?></option>
                                    <option value="Feedback"><?php echo __('Feedback','arc');?></option>
                                    <option value="Media"><?php echo __('Media','arc');?></option>
                                    <option value="Content"><?php echo __('Content','arc');?></option>
                                    <option value="Copyright"><?php echo __('Copyright','arc');?></option>
                                    <option value="Confirmation"><?php echo __('Confirmation','arc');?></option>
                                </select>
                            </form>
                        </th>
                        <th width="500"><?php echo __('Title', 'arc');?></th>
                        <th width="540"><?php echo __('Message','arc');?></th>
                        <th><?php echo __('User email','arc');?></th>
                        <th><?php echo __('User name','arc');?></th>
                    </tr>
                    <?php
                    global $wpdb;
                    $table = $wpdb->prefix . 'supportMsg';
                    $query = "SELECT * FROM $table ORDER BY date DESC";
                    $msg = $wpdb->get_results($query);
                    foreach ($msg as $value):?>
                    <tr data-id="<?php echo $value->id;?>" class="support_row">
                    <td><small><?php echo $value->date;?></small></td>
                    <td><span class="badge badge-info"><?php echo $value->type;?></span></td>
                    <td><small><?php echo $value->title;?></small></td>
                    <td><small><?php echo $value->msg;?></small></td>
                    <td><small><?php echo $value->email;?></small></td>
                    <td><small><?php echo $value->name;?></small></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" style="width: 100%; margin-bottom: 20px">
				<div class="pull-right">
					<script type="application/javascript">
                        function myFunction() {
                            var copyText = document.getElementById("copy_area");
                            copyText.select();
                            document.execCommand("copy");
                            //console.log("Copied the text: " + copyText.value);
                            return copyText.value;
                        }
					</script>
					<button class="btn btn-default btn-sm" id="copy_logs" onclick="myFunction()">
						<svg class="bi bi-files" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 2h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3z"/>
							<path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
						</svg>
						Copy Logs to clipboard</button>
					<button class="btn btn-danger btn-sm" id="delete_logs">
						<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
						Delete Logs</button>
				</div>
			</div>
			<div class="col-12 margin-top-10">
				<table class="table table-responsive table-striped table-bordered table-hover logs_table">
					<tbody>
					<tr id="table_header" class="thead-light">
						<th width="140"><?php echo __('Date', 'arc');?></th>
						<th>
							<form class="form-inline">
								<p style="width: 100%;"><?php echo __('Type', 'arc');?></p> <br>
								<select name="logsType" class="form-control" id="type">
									<option value="all"><?php echo __('All', 'arc');?></option>
									<option value="success"><?php echo __('Success','arc');?></option>
									<option value="notice"><?php echo __('Notice','arc');?></option>
									<option value="warning"><?php echo __('Warning','arc');?></option>
									<option value="error"><?php echo __('Error','arc');?></option>
								</select>
							</form>
						</th>
						<th width="350">
							<form class="form-inline">
								<p style="width: 100%;"><?php echo __('Product','arc');?></p> <br>
								<select name="logsProduct" class="form-control" id="product">
									<option value="all"><?php echo __('All','arc');?></option>
								</select>
							</form>
						</th>
						<th width="500">
							<form class="form-inline">
								<p style="width: 100%;"><?php echo __('Message','arc');?></p> <br>
								<input type="text" id="message" placeholder="Filter messages" class="form-control input-sm filter_text">
							</form>
						</th>
						<th>
							<form class="form-inline">
								<p style="width: 100%;"><?php echo __('Location','arc');?></p> <br>
								<input type="text" id="location" placeholder="Filter locations" class="form-control input-sm filter_text">
							</form>
						</th>
					</tr>
                    <?php
                    global $wpdb;
                    $table = $wpdb->prefix . 'vicetempleCoreLogs';
                    $query = "SELECT * FROM $table ORDER BY date DESC";
                    $logs = $wpdb->get_results($query);
                    foreach ($logs as $log):
                    if($log->type == 'success') $badge = 'success';
                    if($log->type == 'notice') $badge = 'info';
                    if($log->type == 'warning') $badge = 'warning';
                    if($log->type == 'error') $badge = 'danger';?>
                    <tr class="logs_row">
                    <td><small><?php echo $log->date; ?></small></td>
                    <td><span class="badge badge-<?php echo $badge;?>"><?php echo $log->type; ?></span></td>
                    <td><small><?php echo $log->product; ?></small></td>
                    <td><small><?php echo $log->message; ?></small></td>
                    <td><small><?php echo $log->location; ?></small></td></tr>
                    <?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
		<textarea style="opacity: 0;" id="copy_area" type="text"></textarea>
	</div>
</div>
<div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
                <div id="accordion">
	                <?php if(is_plugin_active('vicetemple-single-embedder/vicetemple-single-embedder.php') || is_plugin_active('vicetemple-mass-grabber/vicetemple-mass-grabber.php') || is_plugin_active('vicetemple-mass-embedder/vicetemple-mass-embedder.php')): ?>
                    <div class="card" style="max-width: 100% !important;">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo __('Is there an official list of partners and where can I find it?', 'arc');?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <style>
                                    div.card-body h2 {
                                        border-left: 5px solid #0073aa;
                                        padding: 10px;
                                        background: #a9a9a947;
                                    }
                                </style>
                                <?php if(is_plugin_active('vicetemple-single-embedder/vicetemple-single-embedder.php')):?>
                                    <p>
                                        Of course. Each plugin has a different partner type. Here they all are, sorted by plugin association.
                                    </p>
                                    <h2><?php echo __('Single Embedder');?></h2>
                                    <hr>
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $partners = [
                                          'Xvideos' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/xvideos.jpg',
                                          'Pornhub' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/pornhub.jpg',
                                          'Tube8' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/tube8.jpg',
                                          'Xhamster' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/xhamster.jpg',
                                          'Youporn' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/youporn.jpg',
                                          'Redtube' => plugins_url('vicetemple-single-embedder') . '/admin/assets/img/redtube.jpg',
                                        ];
                                        foreach ($partners as $partner => $img) {
                                            ?>
                                            <div class="p-2" style="padding-top: 15px">
                                                <img src="<?php echo $img?>" />
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php endif;?>
                                <hr>
	                            <?php if(is_plugin_active('vicetemple-mass-grabber/vicetemple-mass-grabber.php')):?>
                                    <h2><?php echo __('Mass Grabber');?></h2>
                                    <hr>
                                    <div class="d-flex flex-wrap">
			                            <?php
                                        global $wpdb;
                                        $table = $wpdb->prefix . 'vicetempleMassGrabberPartner';
                                        $query = "SELECT `img` FROM $table";
                                        $partners = $wpdb->get_results($query);
			                            foreach ($partners as $partner) {
				                            ?>
                                            <div class="p-2" style="padding-top: 15px">
                                                <img src="<?php echo plugins_url('vicetemple-mass-grabber'). '/admin/assets/grabber/' . $partner->img;?>" />
                                            </div>
				                            <?php
			                            }
			                            ?>
                                    </div>
	                            <?php endif;?>
                                <hr>
	                            <?php if(is_plugin_active('vicetemple-mass-embedder/vicetemple-mass-embedder.php')):?>
                                    <h2><?php echo __('Mass Embedder');?></h2>
                                    <hr>
                                    <div class="d-flex flex-wrap">
			                            <?php
			                            global $wpdb;
			                            $table = $wpdb->prefix . 'vicetempleMassEmbedderPartner';
			                            $query = "SELECT `img` FROM $table";
			                            $partners = $wpdb->get_results($query);
			                            foreach ($partners as $partner) {
				                            ?>
                                            <div class="p-2" style="padding-top: 15px">
                                                <img src="<?php echo plugins_url('vicetemple-mass-embedder'). '/admin/assets/embedder/' . $partner->img;?>" />
                                            </div>
				                            <?php
			                            }
			                            ?>
                                    </div>
	                            <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="tab-pane fade" id="site" role="tabpanel" aria-labelledby="site-tab">
	<div class="container-fluid">
		<?php
		$full_site = get_option('create_full_site');
		if($full_site == false && $full_site !== 'created') :?>
			<div class="row">
				<div class="col-12">
					<hr>
                    <p><?= __('Available categories ', 'arc');?></p>
                    <style>
                        div#list {
                            max-width: 200px;
                        }
                        div#list p {
                            margin-bottom: 10px;
                        }
                        div#list p label {
                            margin-top: 10px;
                        }
                        div#list input[type=number] {
                            float: right;
                            max-width: 100px;
                        }
                        @media (min-width: 320px) and (max-width: 494px) {
                            div#list div {
                                width: 100% !important;
                            }
                        }
                        @media (min-width: 495px) and (max-width: 870px) {
                            div#list div {
                                width: 49% !important;
                            }
                        }
                    </style>
                    <button class="button button-secondary" id="create_cat_list" style="display: block; clear: both"><?= __('Check | Uncheck all', 'arc')?></button><br>
                    <div id="list" style="width: 100%;max-width: 100%;display: inline-flex;
    justify-content: space-between;
    flex-wrap: wrap;">
                        <?php

                        $post_data = [
                            'category' => 'all',
                            'status'   => 'get_data',
                            'additional_item' => 'for_theme'
                        ];

                        $ch = curl_init(VICETEMPLECORE_WEB_SERVICE. 'autoimport/index.php');
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        foreach (json_decode($response) as $key => $value):
                            ?>
                            <div style="width: 23%;">
                                <p><input class="check_cat" type="checkbox" name="<?=str_replace(' ', '-', $key)?>" value="<?=$key?>" id="<?=str_replace(' ', '-', $key)?>" /><label for="<?=str_replace(' ', '-', $key)?>"><?=$key;?></label><input id="<?=str_replace(' ', '-', $key)?>-num" type="number" min="1" max="<?=$value?>" value="<?=$value?>"/></p>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <br>
                    <button id="full_site" style="display: block" class="btn btn-success btn-lg" data-import="<?=get_option('autoimport');?>"><i class="fas fa-angle-double-right"></i> <?php echo __('Import videos','arc');?></button>
					<div id="loader_spinner" class="loader" style="display: none; margin-top: 20px;">
						<div class="inner one"></div>
						<div class="inner two"></div>
						<div class="inner three"></div>
					</div>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
                    <h2 id="before_create" style="font-size: 16px; display: none"><?php echo __('Prepare data for import. Do not leave the page!', 'arc');?></h2>
					<h2 id="begin_create" style="font-size: 16px; display: none"><?php echo __('Began creating categories and import videos. Do not leave the page!', 'arc');?></h2>
					<div id="category_list">
						<ul>
						</ul>
					</div>
				</div>
			</div>
		<?php
		else:
			?>
			<div class="row">
				<div class="col-12">
					<h1 style="font-size: 20px; font-style: italic; margin-bottom: 15px">
						<?php echo __('You have already created full site!', 'arc');?>
					</h1>
				</div>
			</div>
		<?php endif;?>
        <p style="text-align: center;">The Auto Import feature is an easy way to quickly populate a new website with a large number of HD porn videos. By using this feature, you’re importing videos from an existing porn collection that spans 16 categories, with 50-100 videos, each - well over 1200 in total. However, please note that the videos are taken from partner sites and that we do not make any guarantees for their content. Our tests confirm that more than 98% of videos will be imported properly, but you may need to remove or update some of them manually.</p>
        <p style="text-align: center;">If you wish to test the Auto Import feature, it is recommended that you do so on a new website. Importing a large number of videos on an existing website may temporarily slow down your site.</p>
	</div>
</div>