<?php
// 0.htmlspecialcharsの(引数での)関数化 returnを加えることで、外も中でも動くようにする
// XSS対応　（echoする場所で使用！それ以外ではNG
function h($hsc) {
  return htmlspecialchars($hsc, ENT_QUOTES, 'utf-8');
}
