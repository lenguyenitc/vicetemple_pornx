<?php
http_response_code(403);
?>
<style>
    body {
        background: url("<?=get_template_directory_uri() . '/assets/img/main_background.png'?>");
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }


    .container .forbidden,
    .container .txt{
        margin: 0;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 144px;
        line-height: 169px;
        text-transform: uppercase;
        color: #FFFFFF;
        text-shadow: 0px 5px 10px rgba(0, 0, 0, 0.35);
        text-align: center;
    }
    .container .txt {
        line-height: 90px;
    }

    .container .txt {
        margin: 0;
        font-size: 60px;
    }
</style>

<div class="container">
  <p class="forbidden">403</p>
  <p class="txt">Forbidden</p>
</div>

