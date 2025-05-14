<?php
defined('_JEXEC') or die;

// Lấy thông tin từ cài đặt
$zaloPhone = $params->get('zalo_phone', '0123456789');
$callPhone = $params->get('call_phone', '0123456789');


// kiểm tra màu mặc định
function safeColor($value, $default)
{
    return empty($value) ? $default : $value;
}

// Kiểm tra số điện thoại
function isValidPhoneNumber($phone)
{
    // Loại bỏ khoảng trắng, dấu -, dấu chấm...
    $cleaned = preg_replace('/[\s\.\-]/', '', $phone);

    // Kiểm tra độ dài và định dạng: bắt đầu bằng 0 và 9 đến 10 chữ số
    return preg_match('/^0[0-9]{9}$/', $cleaned);
}
if (!isValidPhoneNumber($zaloPhone) || !isValidPhoneNumber($callPhone)) {
    echo '<div style="color: red; font-weight: bold;">Số điện thoại không hợp lệ. Vui lòng kiểm tra lại.</div>';
    return;
}

$buttonColor = safeColor($params->get('button_color', 'rgba(255,255,255,0.8)'), 'rgba(255,255,255,0.8)');
$textColor = safeColor($params->get('text_color', 'rgb(0,94,255)'), 'rgb(0,94,255)');
$borderColor = safeColor($params->get('border_color', 'rgb(0,43,95)'), 'rgb(0,43,95)');
$hoverButtonColor = safeColor($params->get('hover_button_color', 'rgb(3,56,106)'), 'rgb(3,56,106)');
$hoverTextColor = safeColor($params->get('hover_text_color', 'white'), 'white');
$hoverBorderColor = safeColor($params->get('hover_border_color', 'rgb(3,43,113)'), 'rgb(3,43,113)');


$buttonPosition = $params->get('button_position', 'bottom-left');
$positionCss = match ($buttonPosition) {
    'bottom-left' => 'left: 20px; bottom: 20px;',
    'bottom-right' => 'right: 20px; bottom: 20px;',
    'top-left' => 'left: 20px; top: 20px;',
    'top-right' => 'right: 20px; top: 20px;',
    default => 'left: 20px; bottom: 20px;',
};
?>

<style>
    .float-contact {
        position: fixed;
        <?= $positionCss ?>z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .contact-button {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 6px 10px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 16px;
        text-decoration: none;
        transition: all 0.3s ease;
        z-index: 1;
        background: <?= $buttonColor ?> !important;
        color: <?= $textColor ?> !important;
        box-shadow: 0 0 15px rgba(1, 15, 28, 0.384);
        border: 2px solid <?= $borderColor ?> !important;
    }

    .contact-button:hover {
        box-shadow: 0 0 10px rgb(245, 246, 247);
        border-radius: 40px;
        border: 2px solid <?= $hoverBorderColor ?> !important;
        background-color: <?= $hoverButtonColor ?> !important;
        color: <?= $hoverTextColor ?> !important;
    }

    .contact-button img {
        width: 30px;
        height: 30px;
        object-fit: contain;
        animation: float 2.5s ease-in-out infinite, glow 2.5s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }
    }

    @keyframes glow {

        0%,
        100% {
            filter: drop-shadow(0 0 10px rgba(0, 132, 255, 0.6));
        }

        50% {
            filter: drop-shadow(0 0 16px rgba(0, 132, 255, 1));
        }
    }

    .call-button img {
        animation: phone-shake 1.2s infinite;
        filter: drop-shadow(0 0 8px rgba(0, 132, 255, 0.6));
    }

    @keyframes phone-shake {
        0% {
            transform: rotate(0);
        }

        20% {
            transform: rotate(-15deg);
        }

        40% {
            transform: rotate(15deg);
        }

        60% {
            transform: rotate(-10deg);
        }

        80% {
            transform: rotate(10deg);
        }

        100% {
            transform: rotate(0);
        }
    }
</style>

<div class="float-contact">
    <a href="https://zalo.me/<?= $zaloPhone ?>" class="contact-button" target="_blank" rel="nofollow"
        title="Nhắn tin qua Zalo">
        <img src="<?= JURI::base() ?>modules/mod_zalo_chat/assets/zalo.png" alt="Zalo Icon">
        <span>Chat Zalo</span>
    </a>
    <a href="tel:<?= $callPhone ?>" class="contact-button call-button" title="Gọi điện thoại">
        <img src="<?= JURI::base() ?>modules/mod_zalo_chat/assets/phone.png" alt="Phone Icon">
        <span><?= $callPhone ?></span>
    </a>
</div>