<?php
defined('_JEXEC') or die;

// Thiết lập cài đặt số điện thoại
$zaloPhone = $params->get('zalo_phone', '0123456789');
$callPhone = $params->get('call_phone', '0357379334');
$link = "https://zalo.me/" . $zaloPhone;

// Thiết lập vị trí nút
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
        .float-contact {
            position: fixed; bottom: 20px; left: 20px; z-index: 9999; display: flex; flex-direction: column; gap: 10px;
        }
        .contact-button {
            display: flex; align-items: center; gap: 12px; padding: 6px; border-radius: 5px; font-weight: bold; font-size: 16px; text-decoration: none; transition: all 0.3s ease; z-index: 1; 
            background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(6px); color: rgb(0, 94, 255); box-shadow: 0 0 15px rgba(1, 15, 28, 0.384); border: 2px solid rgb(0, 43, 95);
        }
        .contact-button:hover {
            box-shadow: 0 0 10px rgb(245, 246, 247); border-radius: 40px; border: 2px solid rgb(3, 43, 113); background-color: rgb(3, 56, 106);
            color: white;
        }
        .contact-button img {
            width: 30px; height: 30px; object-fit: contain; animation: float 2.5s ease-in-out infinite, glow 2.5s ease-in-out infinite;
        }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
        @keyframes glow { 0%, 100% { filter: drop-shadow(0 0 10px rgba(0, 132, 255, 0.6)); } 50% { filter: drop-shadow(0 0 16px rgba(0, 132, 255, 1)); } }
        .call-button img { animation: phone-shake 1.2s infinite; filter: drop-shadow(0 0 8px rgba(0, 132, 255, 0.6)); }
        @keyframes phone-shake { 0% { transform: rotate(0); } 20% { transform: rotate(-15deg); } 40% { transform: rotate(15deg); } 60% { transform: rotate(-10deg); } 80% { transform: rotate(10deg); } 100% { transform: rotate(0); } }
    </style>
";

$html = "<div class='float-contact'>
    <a href='https://zalo.me/{$zaloPhone}' class='zalo-button' target='_blank' rel='nofollow'>
        <img src='" . JURI::base() . "modules/mod_zalo_chat/assets/zalo.png' alt='Zalo Icon'>
        <span>Chat Zalo</span>
    </a>
    <a href='tel:{$callPhone}' class='call-button'>
        <img src='" . JURI::base() . "modules/mod_zalo_chat/assets/phone.png' alt='Phone Icon'>
        {$callPhone}
    </a>
</div>";

echo $css . $html;
