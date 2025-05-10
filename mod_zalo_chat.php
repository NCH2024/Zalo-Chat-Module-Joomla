<?php
defined('_JEXEC') or die;
?>
$zaloPhone = $params->get('zalo_phone', '0123456789');
$link = "https://zalo.me/" . $zaloPhone;

$css = "
<style>
    .zalo-float-chat {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 9999;
    }

    .zalo-float-chat a {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        background-color: #0084ff;
        border-radius: 50px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .zalo-float-chat a:hover {
        background-color: #005dc1;
    }
</style>
";

$html = "
<div class='zalo-float-chat'>
    <a href='$link' target='_blank' rel='nofollow'>
        Chat Zalo
    </a>
</div>
";

echo $css . $html;