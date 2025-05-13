<?php
defined('_JEXEC') or die;
#Thiết lập cài đặt số điện thoại
$zaloPhone = $params->get('zalo_phone', '0123456789');
$callPhone = $params->get('call_phone', '0357379334');
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
        .float-contact {
  position: fixed;
  bottom: 20px;
  left: 20px;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  gap: 10px;
    }

    .zalo-button {
      position: relative;
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(0, 132, 255, 0.15);
  backdrop-filter: blur(6px);
  color: red;
  padding: 12px 20px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  z-index: 1;
  box-shadow: 0 0 15px rgba(0, 132, 255, 0.4), 
              0 0 30px rgba(0, 132, 255, 0.2) inset;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

.zalo-button:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 132, 255, 0.6), 
              0 0 40px rgba(0, 132, 255, 0.3) inset;
}
    .zalo-button img {
      width: 38px;
  height: 38px;
  object-fit: contain;
  z-index: 1;
  animation: float 2.5s ease-in-out infinite, glow 2.5s ease-in-out infinite;
    }

    .zalo-button span {
  z-index: 1;
  position: relative;
}
@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-6px);
  }
}

@keyframes glow {
  0%, 100% {
    filter: drop-shadow(0 0 10px rgba(0, 132, 255, 0.6));
  }
  50% {
    filter: drop-shadow(0 0 16px rgba(0, 132, 255, 1));
  }
}

    .call-button {
      position: relative;
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(0, 132, 255, 0.15);
  backdrop-filter: blur(6px);
  color: red;
  padding: 12px 20px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  
  z-index: 1;
  box-shadow: 0 0 15px rgba(0, 132, 255, 0.4), 
              0 0 30px rgba(0, 132, 255, 0.2) inset;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}




.call-button:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 132, 255, 0.6), 
              0 0 40px rgba(0, 132, 255, 0.3) inset;
}
.call-button img {
  width: 38px;
  height: 38px;
  object-fit: contain;
  z-index: 1;
  animation: phone-shake 1.2s infinite;
  filter: drop-shadow(0 0 8px rgba(0, 132, 255, 0.6));
}

/* Text */
.call-button span {
  z-index: 1;
  position: relative;
}



@keyframes phone-shake {
  0% { transform: rotate(0deg); }
  20% { transform: rotate(-15deg); }
  40% { transform: rotate(15deg); }
  60% { transform: rotate(-10deg); }
  80% { transform: rotate(10deg); }
  100% { transform: rotate(0deg); }
}

        </style>
";

$html = "<div class='float-contact'>
    <a href='https://zalo.me/{$zaloPhone}' class='zalo-button' target='_blank' rel='nofollow'>
        <img src='zalo.jpg' alt='Zalo Icon'>
        <span>Chat Zalo</span>
    </a>

    <a href='tel:{$callPhone}' class='call-button'>
        <img src='phone.png' alt='Phone Icon'>
        {$callPhone}
    </a>
</div>";

echo $css . $html;
