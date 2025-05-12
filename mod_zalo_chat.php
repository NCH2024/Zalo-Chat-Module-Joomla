<?php
defined('_JEXEC') or die;
#Thiết lập cài đặt số điện thoại
$zaloPhone = $params->get('zalo_phone', '0123456789');
$link = "https://zalo.me/" . $zaloPhone;
#Thiết lập vị trí nút
$buttonPosition = $params->get('button_position', 'bottom-left');
$positionCss = '';

switch ($buttonPosition) {
    case 'bottom-left':
        $positionCss = 'left: 20px; bottom: 20px;';
        break;
    case 'bottom-right':
        $positionCss = 'right: 20px; bottom: 20px;';
        break;
    case 'top-left':
        $positionCss = 'left: 20px; top: 20px;';
        break;
    case 'top-right':
        $positionCss = 'right: 20px; top: 20px;';
        break;
}

$css = "
<style>
.zalo-float-chat {
    position: fixed;
    z-index: 9999;
    $positionCss
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
?>
