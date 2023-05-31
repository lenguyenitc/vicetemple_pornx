<?php
/**
Template Name: Chat
 **/

	if($_GET['xxx'] != wp_get_current_user()->ID){
		$url = get_page_link() . '?xxx=' . wp_get_current_user()->ID;
		header('Location: '. $url);
		exit();
	}


get_header(); ?>
<?php $sidebar_pos = '';
$curr = wp_get_current_user();?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
	<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
		<?php
		if(!is_user_logged_in()) {?>
            <p><?php echo __('You need to ', 'arc');?>
                <span class="login" ><a href="<?php echo wp_login_url();?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
                <!--<span class="or"><?php /*echo esc_html__('Or', 'arc');*/?></span>-->
                <span class="login"><?php wp_register('', ''); ?> <?php echo __('to see the chat.');?></span>
            </p>
		<?php }
		else {
			?>
        <div id="profile-tabs" class="tabs">
            <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/profile/'. $curr->user_login . '/'?>'" class="tab-link"><i class="fa fa-upload"></i> <?php echo esc_html__('Uploaded videos', 'arc'); ?></a>
            <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/my-profile/'?>'" class="tab-link"><i class="fa fa-user"></i> <?php echo esc_html__('My profile', 'arc'); ?></a>
            <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/watch-list/'?>'" class="tab-link"><i class="fa fa-eye"></i> <?php echo esc_html__('My watch list', 'arc'); ?></a>
            <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/playlists/'?>'"><i class="fa fa-heart"></i> <?php echo esc_html__('My playlist', 'arc'); ?></a>
            <button class="tab-link active chat"><i class="fa fa-comment"></i> <?php echo esc_html__('My chat', 'arc'); ?></button>
            <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-subscriptions/'?>'"><i class="fa fa-user-plus"></i> <?php echo esc_html__('My subscriptions', 'arc'); ?></a>
            <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-payments/'?>'"><i class="fa fa-paypal"></i> <?php echo esc_html__('My payments', 'arc'); ?></a>
        </div>
		<div class="clear"></div>

            <div id="color_chat_scheme" style="padding: 5px;margin: 10px;">
                <span><?php echo __('Change color chat scheme:', 'arc');?></span>
			<?php if(get_user_meta($curr->ID, 'color_chat_scheme', true) == false):?>
                <input type="radio" name="color_chat_scheme" id="white_scheme" value="white" checked/>
                <label for="white_scheme"><?php echo __('White', 'arc');?></label>
                <input type="radio" name="color_chat_scheme" id="grey_scheme" value="grey" />
                <label for="grey_scheme"><?php echo __('Grey', 'arc');?></label>
                <input type="radio" name="color_chat_scheme" id="black_scheme" value="black" />
                <label for="black_scheme"><?php echo __('Black', 'arc');?></label>
            <?php else: ?>
                <?php if(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'white'):?>
                    <input type="radio" name="color_chat_scheme" id="white_scheme" value="white" checked/>
                    <label for="white_scheme"><?php echo __('White', 'arc');?></label>
                    <input type="radio" name="color_chat_scheme" id="grey_scheme" value="grey" />
                    <label for="grey_scheme"><?php echo __('Grey', 'arc');?></label>
                    <input type="radio" name="color_chat_scheme" id="black_scheme" value="black" />
                    <label for="black_scheme"><?php echo __('Black', 'arc');?></label>
                <?php elseif(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'grey'):?>
                        <input type="radio" name="color_chat_scheme" id="white_scheme" value="white"/>
                        <label for="white_scheme"><?php echo __('White', 'arc');?></label>
                        <input type="radio" name="color_chat_scheme" id="grey_scheme" value="grey" checked />
                        <label for="grey_scheme"><?php echo __('Grey', 'arc');?></label>
                        <input type="radio" name="color_chat_scheme" id="black_scheme" value="black" />
                        <label for="black_scheme"><?php echo __('Black', 'arc');?></label>
				<?php elseif(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'black'):?>
                    <input type="radio" name="color_chat_scheme" id="white_scheme" value="white"/>
                    <label for="white_scheme"><?php echo __('White', 'arc');?></label>
                    <input type="radio" name="color_chat_scheme" id="grey_scheme" value="grey" />
                    <label for="grey_scheme"><?php echo __('Grey', 'arc');?></label>
                    <input type="radio" name="color_chat_scheme" id="black_scheme" value="black" checked />
                    <label for="black_scheme"><?php echo __('Black', 'arc');?></label>
                <?php endif;?>
            <?php endif;?>


            </div>
            <div class="clear"></div>
                <?php function get_all_sender(){
                global $wpdb;
                $table = $wpdb->prefix . 'chat';
                $id_recipient = $_GET['xxx'];
                $res = $wpdb->get_results( "SELECT sender_id FROM $table WHERE recepient_id = '" . $id_recipient . "'" );
                return $res;
                }
                $all_sender = get_all_sender();
                $all_sender_prepare = array_reverse($all_sender, TRUE);
                $all_sender_final = [];
                foreach($all_sender_prepare as $k=>$v){
                if(array_search($v->sender_id, $all_sender_final) === false){
                $all_sender_final[] = $v->sender_id;
                }
                }
                ?>
                <?php
                if(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'white' || get_user_meta($curr->ID, 'color_chat_scheme', true) == false):
                ?>
            <style>
                @import url('https://fonts.googleapis.com/css?family=Roboto:100,400,700');
                #container{
                    width: 100%;
                    height: 100vh;
                    display: flex;
                    box-shadow: 0 0 20px rgba(0,0,0,0.2);
                    border: 1px solid #22272d;
                }
                aside{
                    flex-grow: 1;
                    height: 100%;
                    width: 100%;
                    max-width: 15em;
                    /*min-width: 200px;
					max-width: 200px;*/
                }
                aside{
                    background-color: white;
                    overflow: scroll;
                    overflow-x: hidden;
                }
                ::-webkit-scrollbar { width: 10px; height: 50px;}
                ::-webkit-scrollbar-button {  background-color: #ddd; height: 0px }
                ::-webkit-scrollbar-track {  background-color: #999;}
                ::-webkit-scrollbar-track-piece { background-color: #ddd; height: 10px}
                ::-webkit-scrollbar-thumb { height: 10px; background-color: #666; border-radius: 2px;}
                ::-webkit-scrollbar-corner { background-color: #ddd;}
                ::-webkit-resizer { background-color: #ddd;}

                aside header{
                    background-color: #ddd;
                    padding: 28px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    color: #fff;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin-bottom: 20px;
                }
                header#chat_with {
                    background-color: #ddd;
                    padding: 16px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    color: black;
                    font-weight: bold;
                    margin-bottom: 20px;
                }
                aside ul{
                    padding-left:10px;
                    list-style-type: none;
                    overflow: auto;
                    padding-left: 0;
                }
                aside ul li{
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    color: #c0c0c0;
                    margin-bottom: 10px;
                    padding: 10px 10px 5px;
                    border-bottom: 1px solid #ddd;
                }
                /*aside ul li:hover {
                    cursor: pointer;
                    background-color: #1d98e0;
                    color: white;
                }
                aside ul li.activeLi {
                    background-color: #1d98e0;
                    color: white;
                }*/
                aside ul li div{
                    /*flex-grow: 1;*/
                }
                aside ul li .color{
                    border: 2px solid #2F373F;
                }
                .avatar{
                    margin-bottom:-5px;
                    margin-right:-10px;
                }
                .avatar img{
                    width: 40px;
                    height: 40px;
                    border-radius: 100%;
                    margin-right: 20px;
                }
                .color{
                    background-color: #4AD99B;
                    width: 8px;
                    height: 8px;
                    border-radius: 100%;
                    position: relative;
                    top: -16px;
                    right: -32px;
                    border: 2px solid #343E48;
                }

                .color2 i.fa-envelope{
                    /*background-color: red;*/
                    width: 8px;
                    position: relative;
                    top: -20px;
                    right: -32px;
                    height: 10px;
                }

                .avatar i#back_to_list,
                aside p i#back_to_msg {
                    color: black !important;
                }

                .main_li{
                    flex-grow: 2;
                }


                .username{
                    margin-top: 5px;
                }

                section#main{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    width: 100%;
                    background-color: white;
                }

                section#main footer{
                    background-color: #fff;
                    padding: 10px;
                    display: flex;
                    justify-content: space-between;
                    padding-left: 0;
                }

                section#main footer textarea{
                    flex-grow: 2;
                    margin: 0 10px;
                    resize: none;
                    border: none;
                    padding-top: 5px;
                    height: 20px;
                    min-height: 60px;
                    /*margin-left: 0;*/
                    background-color: #ddd;
                    color: black;
                    border-radius: 5px;
                }

                section#main footer textarea:focus{
                    outline: none;
                }

                section#main footer i{
                    color: #c0c0c0;
                    cursor: pointer;
                    cursor: hand;
                    margin-top: 20px;
                }

                section#messages{
                    overflow: auto;
                    flex-grow: 2;
                    padding: 10px 10px 10px 42px;
                    border-bottom: 1px solid #ddd;
                }

                section#messages article{
                    display: flex;
                    justify-content: flex-start;
                    margin-bottom: 20px;
                }

                section#messages article .avatar{
                    margin-right: 10px;
                }

                section#messages .right .avatar{
                    margin-right: 0;
                }

                .msg{
                    display: flex;
                    justify-content: space-between;
                }
                .msg .tri{
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 0 10px 15px 0;
                    border-color: transparent #ffffff transparent transparent;
                }
                article div.msg_inner{
                    background-color: #ddd;
                }
                article div.tri {
                    border-color: transparent #ddd transparent transparent !important;
                }
                /*article.right div.msg_inner {
                    background-color: #1d98e0;
                }
                article.right div.tri {
                    border-color: #1d98e0 transparent transparent transparent !important;
                }*/

                .msg_inner{
                    background-color: #fff;
                    width: 100%;
                    padding: 15px 10px;
                    border-radius: 0 4px 4px 4px;
                    box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
                    text-align: left;
                    color: black;
                }

                .msg_inner span {
                    font-size: 11px;
                    font-style: italic;
                    margin: 0;
                    float: right;
                    color: #777;
                }
                .right .msg_inner span {
                    font-size: 11px;
                    font-style: italic;
                    margin: 0;
                    float: right;
                    color: white;
                }
                .right{
                    flex-direction: row-reverse;
                }

                .right .msg{
                    flex-direction: row-reverse;
                }

                .right .msg .tri{
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 15px 10px 0 0;
                    border-color: #ffffff transparent transparent transparent;
                }

                .right .msg .msg_inner{
                    border-radius: 4px 0 4px 4px;
                    box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
                    text-align: right;
                }
            </style>
            <?php elseif(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'grey'):?>
                <style>
                    @import url('https://fonts.googleapis.com/css?family=Roboto:100,400,700');
                    #container{
                        width: 100%;
                        height: 100vh;
                        display: flex;
                        box-shadow: 0 0 20px rgba(0,0,0,0.2);
                        border: 1px solid #22272d;
                    }
                    aside{
                        flex-grow: 1;
                        height: 100%;
                        width: 100%;
                        max-width: 15em;
                        /*min-width: 200px;
						max-width: 200px;*/
                    }
                    aside{
                        background-color: #888;
                        overflow: scroll;
                        overflow-x: hidden;
                    }
                    ::-webkit-scrollbar { width: 10px; height: 50px;}
                    ::-webkit-scrollbar-button {  background-color: #ddd; height: 0px }
                    ::-webkit-scrollbar-track {  background-color: #999;}
                    ::-webkit-scrollbar-track-piece { background-color: #ddd; height: 10px}
                    ::-webkit-scrollbar-thumb { height: 10px; background-color: #666; border-radius: 2px;}
                    ::-webkit-scrollbar-corner { background-color: #ddd;}
                    ::-webkit-resizer { background-color: #ddd;}

                    aside header{
                        background-color: #555;
                        padding: 28px;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        color: #fff;
                        font-weight: bold;
                        text-transform: uppercase;
                        margin-bottom: 20px;
                    }
                    header#chat_with {
                        background-color: #555;
                        padding: 16px;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        color: white;
                        font-weight: bold;
                        margin-bottom: 20px;
                    }
                    aside ul{
                        padding-left:10px;
                        list-style-type: none;
                        overflow: auto;
                        padding-left: 0;
                    }
                    aside ul li{
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        color: #c0c0c0;
                        margin-bottom: 10px;
                        padding: 10px 10px 5px;
                        border-bottom: 1px solid #ccc;
                    }
                    /*aside ul li:hover {
						cursor: pointer;
						background-color: #1d98e0;
						color: white;
					}
					aside ul li.activeLi {
						background-color: #1d98e0;
						color: white;
					}*/
                    aside ul li div{
                        /*flex-grow: 1;*/
                    }
                    aside ul li .color{
                        border: 2px solid #2F373F;
                    }
                    .avatar{
                        margin-bottom:-5px;
                        margin-right:-10px;
                    }
                    .avatar img{
                        width: 40px;
                        height: 40px;
                        border-radius: 100%;
                        margin-right: 20px;
                    }
                    .color{
                        background-color: #4AD99B;
                        width: 8px;
                        height: 8px;
                        border-radius: 100%;
                        position: relative;
                        top: -16px;
                        right: -32px;
                        border: 2px solid #343E48;
                    }

                    .color2 i.fa-envelope{
                        /*background-color: red;*/
                        width: 8px;
                        position: relative;
                        top: -20px;
                        right: -32px;
                        height: 10px;
                    }

                    .avatar i#back_to_list,
                    aside p i#back_to_msg {
                        color: white !important;
                    }
                    .away{
                        background-color: #FA676A;
                    }
                    .main_li{
                        flex-grow: 2;
                    }
                    .selected{
                        border-bottom: 2px solid #fff;
                    }

                    .username{
                        margin-top: 5px;
                    }
                    .text{
                        font-size: 0.7em;
                    }

                    .time{
                        font-size: 0.6em;
                        flex-grow: 0.3;
                        margin-top: 10px;
                    }

                    section#main{
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        width: 100%;
                        background-color: #888;
                    }

                    section#main footer{
                        background-color: #888;
                        padding: 10px;
                        display: flex;
                        justify-content: space-between;
                        padding-left: 0;
                    }

                    section#main footer textarea{
                        flex-grow: 2;
                        margin: 0 10px;
                        resize: none;
                        border: none;
                        padding-top: 5px;
                        height: 20px;
                        min-height: 60px;
                        /*margin-left: 0;*/
                        background-color: #ccc;
                        color: black;
                        border-radius: 5px;
                    }

                    section#main footer textarea:focus{
                        outline: none;
                    }

                    section#main footer i{
                        color: #c0c0c0;
                        cursor: pointer;
                        cursor: hand;
                        margin-top: 20px;
                    }

                    section#messages{
                        overflow: auto;
                        flex-grow: 2;
                        padding: 10px 10px 10px 42px;
                        border-bottom: 1px solid #ccc;
                    }

                    section#messages article{
                        display: flex;
                        justify-content: flex-start;
                        margin-bottom: 20px;
                    }

                    section#messages article .avatar{
                        margin-right: 10px;
                    }

                    section#messages .right .avatar{
                        margin-right: 0;
                    }

                    .msg{
                        display: flex;
                        justify-content: space-between;
                    }
                    .msg .tri{
                        width: 0;
                        height: 0;
                        border-style: solid;
                        border-width: 0 10px 15px 0;
                        border-color: transparent #ffffff transparent transparent;
                    }
                    article div.msg_inner{
                        background-color: #ccc;
                    }
                    article div.tri {
                        border-color: transparent #ccc transparent transparent !important;
                    }
                    /*article.right div.msg_inner {
						background-color: #1d98e0;
					}
					article.right div.tri {
						border-color: #1d98e0 transparent transparent transparent !important;
					}*/

                    .msg_inner{
                        background-color: #fff;
                        width: 100%;
                        padding: 15px 10px;
                        border-radius: 0 4px 4px 4px;
                        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
                        text-align: left;
                        color: black;
                    }

                    .msg_inner span {
                        font-size: 11px;
                        font-style: italic;
                        margin: 0;
                        float: right;
                        color: #777;
                    }
                    .right .msg_inner span {
                        font-size: 11px;
                        font-style: italic;
                        margin: 0;
                        float: right;
                        color: white;
                    }
                    .right{
                        flex-direction: row-reverse;
                    }

                    .right .msg{
                        flex-direction: row-reverse;
                    }

                    .right .msg .tri{
                        width: 0;
                        height: 0;
                        border-style: solid;
                        border-width: 15px 10px 0 0;
                        border-color: #ffffff transparent transparent transparent;
                    }

                    .right .msg .msg_inner{
                        border-radius: 4px 0 4px 4px;
                        box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
                        text-align: right;
                    }
                </style>
                <?php elseif(get_user_meta($curr->ID, 'color_chat_scheme', true) == 'black'):?>
                    <style>
                    @import url('https://fonts.googleapis.com/css?family=Roboto:100,400,700');
                    #container{
                    width: 100%;
                    height: 100vh;
                    display: flex;
                    box-shadow: 0 0 20px rgba(0,0,0,0.2);
                    border: 1px solid #121212;
                    }
                    aside{
                    flex-grow: 1;
                    height: 100%;
                    width: 100%;
                    max-width: 15em;
                    /*min-width: 200px;
                    max-width: 200px;*/
                    }
                    aside{
                    background-color: #222;
                    overflow: scroll;
                    overflow-x: hidden;
                    }
                    ::-webkit-scrollbar { width: 10px; height: 50px;}
                    ::-webkit-scrollbar-button {  background-color: #ddd; height: 0px }
                    ::-webkit-scrollbar-track {  background-color: #999;}
                    ::-webkit-scrollbar-track-piece { background-color: #ddd; height: 10px}
                    ::-webkit-scrollbar-thumb { height: 10px; background-color: #666; border-radius: 2px;}
                    ::-webkit-scrollbar-corner { background-color: #ddd;}
                    ::-webkit-resizer { background-color: #ddd;}

                    aside header{
                    background-color: #121212;
                    padding: 28px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    color: #fff;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin-bottom: 20px;
                    }
                    header#chat_with {
                    background-color: #121212;
                    padding: 16px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    color: white;
                    font-weight: bold;
                    margin-bottom: 20px;
                    }
                    aside ul{
                    padding-left:10px;
                    list-style-type: none;
                    overflow: auto;
                    padding-left: 0;
                    }
                    aside ul li{
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    color: #c0c0c0;
                    margin-bottom: 10px;
                    padding: 10px 10px 5px;
                    border-bottom: 1px solid #333;
                    }
                    /*aside ul li:hover {
                    cursor: pointer;
                    background-color: #1d98e0;
                    color: white;
                    }
                    aside ul li.activeLi {
                    background-color: #1d98e0;
                    color: white;
                    }*/
                    aside ul li div{
                    /*flex-grow: 1;*/
                    }
                    aside ul li .color{
                    border: 2px solid #2F373F;
                    }
                    .avatar{
                    margin-bottom:-5px;
                    margin-right:-10px;
                    }
                    .avatar img{
                    width: 40px;
                    height: 40px;
                    border-radius: 100%;
                    margin-right: 20px;
                    }
                    .color{
                    background-color: #4AD99B;
                    width: 8px;
                    height: 8px;
                    border-radius: 100%;
                    position: relative;
                    top: -16px;
                    right: -32px;
                    border: 2px solid #343E48;
                    }

                    .color2 i.fa-envelope{
                    /*background-color: red;*/
                    width: 8px;
                    position: relative;
                    top: -20px;
                    right: -32px;
                    height: 10px;
                    }

                    .avatar i#back_to_list,
                    aside p i#back_to_msg {
                    color: white !important;
                    }
                    .away{
                    background-color: #FA676A;
                    }
                    .main_li{
                    flex-grow: 2;
                    }
                    .selected{
                    border-bottom: 2px solid #fff;
                    }

                    .username{
                    margin-top: 5px;
                    }
                    .text{
                    font-size: 0.7em;
                    }

                    .time{
                    font-size: 0.6em;
                    flex-grow: 0.3;
                    margin-top: 10px;
                    }

                    section#main{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    width: 100%;
                    background-color: #222;
                    }

                    section#main footer{
                    background-color: #222;
                    padding: 10px;
                    display: flex;
                    justify-content: space-between;
                    padding-left: 0;
                    }

                    section#main footer textarea{
                    flex-grow: 2;
                    margin: 0 10px;
                    resize: none;
                    border: none;
                    padding-top: 5px;
                    height: 20px;
                    min-height: 60px;
                    /*margin-left: 0;*/
                    background-color: #333;
                    color: white;
                    border-radius: 5px;
                    }

                    section#main footer textarea:focus{
                    outline: none;
                    }

                    section#main footer i{
                    color: #c0c0c0;
                    cursor: pointer;
                    cursor: hand;
                    margin-top: 20px;
                    }

                    section#messages{
                    overflow: auto;
                    flex-grow: 2;
                    padding: 10px 10px 10px 42px;
                    border-bottom: 1px solid #333;
                    }

                    section#messages article{
                    display: flex;
                    justify-content: flex-start;
                    margin-bottom: 20px;
                    }

                    section#messages article .avatar{
                    margin-right: 10px;
                    }

                    section#messages .right .avatar{
                    margin-right: 0;
                    }

                    .msg{
                    display: flex;
                    justify-content: space-between;
                    }
                    .msg .tri{
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 0 10px 15px 0;
                    border-color: transparent #ffffff transparent transparent;
                    }
                    article div.msg_inner{
                    background-color: #ccc;
                    }
                    article div.tri {
                    border-color: transparent #ccc transparent transparent !important;
                    }
                    /*article.right div.msg_inner {
                    background-color: #1d98e0;
                    }
                    article.right div.tri {
                    border-color: #1d98e0 transparent transparent transparent !important;
                    }*/

                    .msg_inner{
                    background-color: #fff;
                    width: 100%;
                    padding: 15px 10px;
                    border-radius: 0 4px 4px 4px;
                    box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
                    text-align: left;
                    color: black;
                    }

                    .msg_inner span {
                    font-size: 11px;
                    font-style: italic;
                    margin: 0;
                    float: right;
                    color: #777;
                    }
                    .right .msg_inner span {
                    font-size: 11px;
                    font-style: italic;
                    margin: 0;
                    float: right;
                    color: white;
                    }
                    .right{
                    flex-direction: row-reverse;
                    }

                    .right .msg{
                    flex-direction: row-reverse;
                    }

                    .right .msg .tri{
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 15px 10px 0 0;
                    border-color: #ffffff transparent transparent transparent;
                    }

                    .right .msg .msg_inner{
                    border-radius: 4px 0 4px 4px;
                    box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
                    text-align: right;
                    }
                        </style>
            <?php endif;?>

       <!-- <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:100,400,700');
            #container{
                width: 100%;
                height: 100vh;
                display: flex;
                box-shadow: 0 0 20px rgba(0,0,0,0.2);
                border: 1px solid #22272d;
            }
            aside{
                flex-grow: 1;
                height: 100%;
                width: 100%;
                max-width: 15em;
                /*min-width: 200px;
                max-width: 200px;*/
            }

            aside{
                background-color: #2F373F;
                overflow: scroll;
                overflow-x: hidden;
            }
            ::-webkit-scrollbar { width: 10px; height: 50px;}
            ::-webkit-scrollbar-button {  background-color: #ffffff; height: 0px }
            ::-webkit-scrollbar-track {  background-color: #999;}
            ::-webkit-scrollbar-track-piece { background-color: #ffffff; height: 10px}
            ::-webkit-scrollbar-thumb { height: 10px; background-color: #666; border-radius: 2px;}
            ::-webkit-scrollbar-corner { background-color: #ffffff;}
            ::-webkit-resizer { background-color: #ffffff;}

            aside header{
                background-color: #343E48;
                padding: 27px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                color: #fff;
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 20px;
            }
            header#chat_with {
                background-color: #343E48;
                padding: 16px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                color: #fff;
                font-weight: bold;
                margin-bottom: 20px;
            }

            aside ul{
                padding-left:10px;
                list-style-type: none;
                overflow: auto;
                padding-left: 0;
            }

            aside ul li{
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                color: #c0c0c0;
                margin-bottom: 10px;
                padding: 10px 10px 5px;
            }
            aside ul li:hover {
                cursor: pointer;
            }

            aside ul li.activeLi {
                background-color: #22272d;
            }

            aside ul li div{
                /*flex-grow: 1;*/
            }

            aside ul li .color{
                border: 2px solid #2F373F;
            }

            .avatar{
                margin-bottom:-5px;
                margin-right:-10px;
            }

            .avatar img{
                width: 40px;
                height: 40px;
                border-radius: 100%;
                margin-right: 20px;
            }

            .color{
                background-color: #4AD99B;
                width: 8px;
                height: 8px;
                border-radius: 100%;
                position: relative;
                top: -16px;
                right: -32px;
                border: 2px solid #343E48;
            }

            .color2 i.fa-envelope{
                /*background-color: red;*/
                width: 8px;
                height: 8px;
                position: relative;
                top: -20px;
                right: -32px;
            }


            .away{
                background-color: #FA676A;
            }
            .main_li{
                flex-grow: 2;
            }
            .selected{
                border-bottom: 2px solid #fff;
            }

            .username{
                margin-top: 5px;
            }
            .text{
                font-size: 0.7em;
            }

            .time{
                font-size: 0.6em;
                flex-grow: 0.3;
                margin-top: 10px;
            }

            section#main{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                width: 100%;
            }

            section#main footer{
                background-color: #fff;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                padding-left: 0;
            }

            section#main footer textarea{
                flex-grow: 2;
                margin: 0 10px;
                resize: none;
                border: none;
                padding-top: 5px;
                height: 20px;
                min-height: 60px;
                /*margin-left: 0;*/
            }

            section#main footer textarea:focus{
                outline: none;
            }

            section#main footer i{
                color: #c0c0c0;
                cursor: pointer;
                cursor: hand;
                margin-top: 20px;
            }

            section#messages{
                overflow: auto;
                flex-grow: 2;
                padding: 10px 10px 10px 50px;
            }

            section#messages article{
                display: flex;
                justify-content: flex-start;
                margin-bottom: 20px;
            }

            section#messages article .avatar{
                margin-right: 10px;
            }

            section#messages .right .avatar{
                margin-right: 0;
            }

            .msg{
                display: flex;
                justify-content: space-between;
            }
            .msg .tri{
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 10px 15px 0;
                border-color: transparent #ffffff transparent transparent;
            }
            article div.msg_inner{
                background-color: lightgreen;
            }
            article div.tri {
                border-color: transparent lightgreen transparent transparent !important;
            }
            article.right div.msg_inner {
                background-color: lightblue;
            }
            article.right div.tri {
                border-color: lightblue transparent transparent transparent !important;
            }

            .msg_inner{
                background-color: #fff;
                width: 100%;
                padding: 15px 10px;
                border-radius: 0 4px 4px 4px;
                box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
                text-align: left;
                color: black;
            }

            .msg_inner span {
                font-size: 11px;
                font-style: italic;
                margin: 0;
                float: right;
                color: dimgrey;
            }
            .right{
                flex-direction: row-reverse;
            }

            .right .msg{
                flex-direction: row-reverse;
            }

            .right .msg .tri{
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 15px 10px 0 0;
                border-color: #ffffff transparent transparent transparent;
            }

            .right .msg .msg_inner{
                border-radius: 4px 0 4px 4px;
                box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
                text-align: right;
            }
        </style>-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <section id="container">
            <aside>
                <header style="/*padding-bottom: 40px*/">
                    <p style="width: 100%; margin: 0; ">
                        <i id="back_to_msg" class="fa fa-angle-left" style="float: right; color: white; font-size: 30px; cursor: pointer;"></i>
                    </p>
                    <!--<div><?php /*echo __('Contacts', 'arc');*/?></div>-->
                </header>
                <ul id="list_id_sender">
					<?php $i = 0;?>
					<?php foreach($all_sender_final as $key => $value):?>
						<?php
						global $wpdb;
						$table = $wpdb->prefix . 'chat';
						$user = get_userdata($value);
						$all_date = $wpdb->get_col( "SELECT date_sent FROM $table WHERE sender_id = '" . $value . "'" );
						$date = max($all_date );
						$message = $wpdb->get_col( "SELECT message_text FROM $table WHERE date_sent = '" . $date . "'" );

						$unread_msg = $wpdb->get_col("SELECT `sender_id` FROM $table WHERE `recepient_id` = '" . wp_get_current_user()->ID . "' AND `status` = 0");
						if($i == 0){
							$start_id = $value;
							$i++;
						}
						if($value == $unread_msg[0]):
						?>
                            <li id="<?php echo $value; ?>">
                                <div class="avatar">
									<?php
									if(get_user_meta($user->ID, 'personal_foto', true) != false) :?>
                                        <img style="width: 100%; max-width: 40px" src="<?php echo get_user_meta($user->ID,'personal_foto', true);?>" />
									<?php else:?>
                                        <img style="width: 100%; max-width: 40px" src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" />
									<?php endif;?>
                                    <div class="color2"><i class="fa fa-envelope"></i></div>
                                </div>
                                <div class="main_li">
                                    <div class="username"><?php echo $user->display_name; ?></div>
                                </div>
                            </li>
                        <?php else:?>
                        <li id="<?php echo $value; ?>">
                            <div class="avatar">
	                            <?php
	                            if(get_user_meta($user->ID, 'personal_foto', true) != false) :?>
                                    <img style="width: 100%; max-width: 40px" src="<?php echo get_user_meta($user->ID,'personal_foto', true);?>" />
	                            <?php else:?>
                                    <img style="width: 100%; max-width: 40px" src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" />
	                            <?php endif;?>
                            </div>
                            <div class="main_li">
                                <div class="username"><?php echo $user->display_name; ?></div>
                            </div>
                        </li>
					<?php
                        endif;
                        endforeach; ?>
                </ul>
                <div id="<?php echo $start_id; ?>" class="start" data-current="<?php echo $start_id; ?>">
            </aside>
            <section id="main">
                <header id="chat_with" style="padding-bottom: 0; padding-top: 5px">
                    <div class="avatar" style="display: inline-flex">
                        <i id="back_to_list" class="fa fa-angle-right" style="color: white; font-size: 30px; margin-top: 5px; cursor: pointer;"></i>
                        <?php
                        if(get_user_meta($start_id, 'personal_foto', true) != false) {
	                        $avatarSender = get_user_meta($start_id,'personal_foto', true);
                        } else $avatarSender = get_template_directory_uri(). '/assets/img/picture.png';
                        ?>
                        <img alt="avatar" style="width: 100%; max-width: 40px; margin-left: 20px; margin-right: 5px" src="<?php echo $avatarSender;?>" />
                        <p style="margin-left: 10px" id="sender_name"><?php echo get_userdata($start_id)->display_name;?></p>
                    </div>
                </header>
                <section id="messages">

                </section>
                <div id="anchor"></div>
                <footer>
                    <!--<i class="material-icons">attach_file</i>-->
                    <textarea placeholder="Write a message..." id="textarea_content"></textarea><i class="material-icons">send</i>
                </footer>
            </section>
        </section>
            <?php }?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
	</main>
</div>
<?php
get_footer();