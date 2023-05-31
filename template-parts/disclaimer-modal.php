<?php
$back = (get_theme_mod('disc_back_color') !== "" && get_theme_mod('disc_back_color') !== false) ? get_theme_mod('disc_back_color') : '#0F1725';
$form_back = (get_theme_mod('disc_form_back_color') !== "" && get_theme_mod('disc_form_back_color') !== false) ? get_theme_mod('disc_form_back_color') : '#1E2739';
$btnY = (get_theme_mod('disc_form_yes_btn_color') !== "" && get_theme_mod('disc_form_yes_btn_color') !== false) ? get_theme_mod('disc_form_yes_btn_color') : '#FF00D6';
$btnYHover = (get_theme_mod('disc_form_yes_btn_color_on_hover') !== "" && get_theme_mod('disc_form_yes_btn_color_on_hover') !== false) ? get_theme_mod('disc_form_yes_btn_color_on_hover') : '#FF00D6';
$btnYTextColor = (get_theme_mod('disc_form_yes_btn_text_color') !== "" && get_theme_mod('disc_form_yes_btn_text_color') !== false) ? get_theme_mod('disc_form_yes_btn_text_color') : '#ffffff';
$btnN = (get_theme_mod('disc_form_no_btn_color') !== "" && get_theme_mod('disc_form_no_btn_color') !== false) ? get_theme_mod('disc_form_no_btn_color') : '#1E2739';
$btnNHover = (get_theme_mod('disc_form_no_btn_color_on_hover') !== "" && get_theme_mod('disc_form_no_btn_color_on_hover') !== false) ? get_theme_mod('disc_form_no_btn_color_on_hover') : '#1E2739';
$btnNTextColor = (get_theme_mod('disc_form_no_btn_text_color') !== "" && get_theme_mod('disc_form_no_btn_text_color') !== false) ? get_theme_mod('disc_form_no_btn_text_color') : '#ffffff';
$header1 = (get_theme_mod('disc_form_header_color') !== "" && get_theme_mod('disc_form_header_color') !== false) ? get_theme_mod('disc_form_header_color') : '#ffffff';
$desc1 = (get_theme_mod('disc_form_text_color') !== "" && get_theme_mod('disc_form_text_color') !== false) ? get_theme_mod('disc_form_text_color') : '#ffffff';
$form_nope_back = (get_theme_mod('disc_nope_form_back_color') !== "" && get_theme_mod('disc_nope_form_back_color') !== false) ? get_theme_mod('disc_nope_form_back_color') : '#1E2739';
$headerN1 = (get_theme_mod('disc_nope_form_header1_color') !== "" && get_theme_mod('disc_nope_form_header1_color') !== false) ? get_theme_mod('disc_nope_form_header1_color') : '#ffffff';
$headerN2 = (get_theme_mod('disc_nope_form_header2_color') !== "" && get_theme_mod('disc_nope_form_header2_color') !== false) ? get_theme_mod('disc_nope_form_header2_color') :'#ffffff';
$desc2 = (get_theme_mod('disc_nope_form_text_color') !== "" && get_theme_mod('disc_nope_form_text_color') !== false) ? get_theme_mod('disc_nope_form_text_color') : '#ffffff';
$btnNope = (get_theme_mod('disc_nope_form_btn_color') !== "" && get_theme_mod('disc_nope_form_btn_color') !== false) ? get_theme_mod('disc_nope_form_btn_color') :'#FF00D6';
$btnNopeHover = (get_theme_mod('disc_nope_form_btn_color_on_hover') !== "" && get_theme_mod('disc_nope_form_btn_color_on_hover') !== false) ? get_theme_mod('disc_nope_form_btn_color_on_hover') :'#FF00D6';
$btnNopeTextColor = (get_theme_mod('disc_nope_form_btn_text_color') !== "" && get_theme_mod('disc_nope_form_btn_text_color') !== false) ? get_theme_mod('disc_nope_form_btn_text_color') :'#ffffff';
?>
<style>

            body[data-rsssl="1"] {
                margin-top: -250px;
                background-color: <?php echo $back;?>!important;
                background-repeat: repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: auto;
            }
        #some_div{
            width: 100%;
            height: 100%;
            background-color: <?php echo $back;?>;
            position: fixed;
            z-index: 1;
            opacity: <?php if(get_theme_mod('disc_back_opacity') !== '' && get_theme_mod('disc_back_opacity') !== false) : echo get_theme_mod('disc_back_opacity').'%'; else :?> 90% <?php endif;?>;
            bottom: 0;
            left: 0;
        }
             #dclm-blur {
                filter: <?php if(get_theme_mod('disc_back_blur') !== '' && get_theme_mod('disc_back_blur') !== false) : ?> blur(<?php echo get_theme_mod('disc_back_blur').'px';?>) <?php else :?> blur(5px) <?php endif;?>;
             }
             #dclm_modal_screen {
                position: fixed;
                top:0;
                left: 0;
                height: 100%;
                width: 100%;
                z-index: 1100;
            }
/*         #dclm_modal_screen.nope {
            background-color: #1e0924;
        }*/
        #dclm_modal_content {
            background-color: <?php echo $form_back;?>;
            position: fixed;
            z-index: 1101;
            margin: 0 auto;
            font-size: 12px;
            padding: 40px 79px!important;
            width: 100%; /* if you adjust it from the original 290px, adjust the difference in the width of #dclm_modal_content nav too */
            max-width: 483px;
            height: auto; /* if you adjust it from the original 290px, adjust the difference in the width of #dclm_modal_content nav too */
            background-position: center;
            background-repeat: no-repeat;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            /* Drop shadow card */
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            -moz-box-shadow:  0px 2px 10px rgba(0, 0, 0, 0.25);
            -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
        }

        #dclm_modal_content .content_wrapper {
            /* padding-top: 8em;
            margin: 3em auto 0; */
            text-align: center;
        }

        #dclm_modal_content h2 {
            margin: 0 0 0 0;
            margin-bottom: 20px!important;
        }
            #dclm_modal_content h2 p{
                margin-bottom: 20px!important;
            }

        #first_heading {
            color: <?php echo $header1;?>!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: 300;
            font-size: 36px!important;
            line-height: 42px!important;
        }

        #first_heading_nope {
            color: <?php echo $headerN1;?>!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: 300;
            font-size: 36px!important;
            line-height: 42px!important;
        }
            #first_heading_nope p {
                margin-top: 0!important;
            }

        #second_heading_nope {
            color: <?php echo $headerN2;?>!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 14px!important;
            line-height: 18px!important;
            text-align: center!important;
        }

        #first_desc {
            color: rgba(255,255,255, 0.5)!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            margin: 0 auto !important;
            margin-bottom: 0px!important;
            margin-top: 20px!important;
            max-width: 265px;
            width: 100%;
        }

        #first_desc_nope {
            color: rgba(255,255,255, 0.5)!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
        }
        #dclm_modal_content nav {
            font-size: 16px;
            display:table;
            width: 230px;
            text-transform: uppercase;
            font-weight: bold;
        }

        #dclm_modal_content nav ul {
            display:table-row;
            width: 100%;
            margin:0;
            padding:0;
        }

        #dclm_modal_content nav li {
            display: table-cell;
            text-align: right;
            width: auto;
        }

        #dclm_modal_content nav:after {
            content: "";
            display: block;
            clear: both;
        }

        #dclm_modal_content nav small {
            display: block;
            text-align: center;
            color: <?php echo $headerN2;?>;
            margin: 15px 0;
        }

        #dclm_modal_content h2 {
            color: <?php echo $header1?>;
        }

        #dclm_modal_content p {
            color: <?php echo $desc1;?>;
        }

        #yes {
            color: <?php echo $btnYTextColor;?>!important;
            background-color: <?php echo $btnY;?>!important;
        }
        #no {
            color: rgba(<?php
                $hex = get_theme_mod('disc_form_no_btn_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,.5)!important;
            background-color: transparent!important;
            border-color: rgba(<?php
            $hex = get_theme_mod('disc_form_no_btn_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,.5)!important;
        }
        #no > * {
            color: rgba(<?php
                $hex = get_theme_mod('disc_form_no_btn_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,.5)!important;
        }
        #nope {
            color: <?php echo $btnNopeTextColor;?>!important;
            background-color: <?php echo $btnNope;?>!important;
        }

            #nope p {
                white-space: nowrap!important;
            }
        #dclm_modal_content nav a.av_btn {
            display: block;
            text-align: center;
            width: 100%;
            max-width: 157px;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }


        #dclm_modal_content #dclm_modal_regret_wrapper nav a.av_btn {
            width: 100%;
            max-width: 157px;
            border-radius: 4px;
            padding: 10px !important;
        }

        .av_btn #yes:hover{
            background-color: <?php echo $btnYHover;?>!important;
        }
        .av_btn #no:hover{
            background-color: transparent!important;
        }
        .av_btn #nope:hover{
            background-color: <?php echo $btnNopeHover;?>!important;
        }

        #dclm-logo {
            margin: 0 0 20px;
        }

        nav#nope_nav ul{
            justify-content: center !important;
        }
        /*@media (min-width: 688px) {*/
            #dclm-logo {
                margin: 0 0 40px;
            }
            #dclm_modal_content {
                top: 10em;
                top: 30vh;
                left: 30vw;
                width: 100%;
                max-width: 483px;
                height: auto;
                background-position: center 3em;
            }

            #dclm_modal_content h2 {
                margin: 0 0 0 0;
            }

            #dclm_modal_content p {
            }

            #dclm_modal_content nav {
                width: 396px;
                display: contents;
            }
            #dclm_modal_content nav ul {
                display: inline-flex;
                justify-content: space-between;

            }
            #dclm_modal_content nav ul li:nth-child(1) {
                width: 100%;
                max-width: 157px;
            }
            #dclm_modal_content nav ul li:nth-child(2) {
                width: 100%;
                max-width: 157px;
            }

            #dclm_modal_content nav a.av_btn {
                width: 100%;
                max-width: 157px;
            }
            #first_heading {
                color: <?php echo $header1;?>!important;
            }

            #first_heading_nope {
                color: <?php echo $headerN1;?>!important;
            }

            #second_heading_nope {
                color: <?php echo $headerN2;?>!important;
            }

            #first_desc_nope,
            #first_desc_nope p{
                font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 14px!important;
                line-height: 16px!important;
                color: rgba(255,255,255, 0.5)!important;
            }
            #yes {
                color: <?php echo $btnYTextColor;?>!important;
                background-color: <?php echo $btnY;?>!important;
                border-radius: 4px !important;
                padding: 10px 66px!important;
                border: 1px solid rgba(<?php
                $hex = $btnY;
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1)!important;
            }
            #no {
                border-radius: 4px !important;
                padding: 10px 66px!important;
                color: rgba(<?php
                $hex = get_theme_mod('disc_form_no_btn_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,.5)!important;
                background-color: transparent!important;
                border:1px solid rgba(<?php
                $hex = get_theme_mod('disc_form_no_btn_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,.5)!important;
            }
            #nope {
                color: <?php echo $btnNopeTextColor;?>!important;
                background-color: <?php echo $btnNope;?>!important;
            }

            #yes:hover{
                background-color: <?php echo $btnYHover;?>!important;
            }
            #no:hover{
                background-color:transparent!important;
            }
            #nope:hover{
                background-color: <?php echo $btnNopeHover;?>!important;
            }
        /*}*/
            @media (max-width: 491px) {
                #dclm_modal_content {
                    padding: 40px 60px!important;
                }
            }
            @media (min-width: 410px) and (max-width: 460px) {
                #dclm_modal_content {
                    padding: 40px 40px!important;
                }
            }
            @media (min-width: 375px) and (max-width: 409px) {
                #dclm_modal_content {
                    padding: 40px 25px!important;
                }
            }
            @media (min-width: 320px) and (max-width: 374px) {
                #dclm_modal_content nav ul {
                    justify-content: center;
                    flex-wrap: wrap;
                }
                #dclm_modal_content nav ul li:first-child {
                    margin-bottom: 20px;
                }
            }

            <?php if(get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
            <?php //fetish
			if('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCCCCC !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #FFFFFF !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #FFFFFF !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #FFFFFF !important;
            }
            <?php endif;?>

            <?php //pornx default
			if('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCCCCC !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #FFFFFF !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #CCCCCC !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #FFFFFF!important;
            }
            <?php endif;?>

            <?php //light
			if('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
            #first_heading,
            #first_heading > *{
                color: #111111 !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #0A0A0A !important;
            }
            #yes,
            #yes > *,
            #yes > p > span{
                color: #FFFFFF !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#111111';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#111111';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#111111';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#111111';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #111111 !important;
            }
            #second_heading_nope {
                color: #0A0A0A !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #FFFFFF!important;
            }
            #first_heading_nope,
            #first_heading_nope > * {
                color: #111111 !important;
            }

            #second_heading_nope,
            #second_heading_nope > *{
                color: #0A0A0A !important;
            }
            <?php endif;?>

            <?php //milf
			if('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCCCCC !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #100025 !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #CCCCCC !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #100025!important;
            }
            <?php endif;?>

            <?php //gay
			if('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCCCCC !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #031748 !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #CCCCCC !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #031748!important;
            }
            <?php endif;?>

            <?php //hentai
			if('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #E4C1D2 !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #520027 !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #E4C1D2 !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #520027!important;
            }
            <?php endif;?>

            <?php //teen
			if('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCCCCC !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #FFFFFF !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #CCCCCC !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #FFFFFF!important;
            }
            <?php endif;?>

            <?php //trans
			if('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
            #first_heading,
            #first_heading > *{
                color: #FFFFFF !important;
            }
            #first_desc p,
            #first_desc p > *{
                color: #CCB2B2 !important;
            }

            #yes,
            #yes > *,
            #yes > p > span{
                color: #FFFFFF !important;
            }
            #no {
                color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
            }
            #no > p > span,
            #no > *{
                color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
            }
            #first_desc_nope,
            #first_desc_nope p {
                color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
            }
            #first_heading_nope {
                color: #FFFFFF !important;
            }
            #second_heading_nope {
                color: #CCB2B2 !important;
            }
            #nope,
            #nope > *,
            #nope > p {
                color: #FFFFFF !important;
            }
            <?php endif;?>

            <?php //lesbian
			if('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
                #first_heading,
                #first_heading > *{
                    color: #FFFFFF !important;
                }
                #first_desc p,
                #first_desc p > *{
                    color: #CCCCCC !important;
                }

                #yes,
                #yes > *,
                #yes > p > span{
                    color: #003538 !important;
                }
                #no {
                    color: rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                    border: 1px solid rgba(<?php
                    $hex = '#FFFFFF';
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>,.5)!important;
                }
                #no > p > span,
                #no > *{
                    color: rgba(<?php
                        $hex = '#FFFFFF';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,.5)!important;
                }
                #first_desc_nope,
                #first_desc_nope p {
                    color: rgba(<?php
                        $hex = '#CCCCCC';
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>,1)!important;
                }
                #first_heading_nope {
                    color: #FFFFFF !important;
                }
                #second_heading_nope {
                    color: #FFFFFF !important;
                }
                #nope,
                #nope > *,
                #nope > p {
                    color: #003538 !important;
                }
            <?php endif;?>

            <?php endif;?>
	</style>