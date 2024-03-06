<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and random number from POST datakbsu

    $email = $_POST['email'];
    $randomNumber = $_POST['randomNumber'];

    // Email configuration
    $to_email = $email;
    $subject = "김범수 php 테스트 발송메일입니다.(이메일확인번호)";
    $message = "이메일 확인 6자리 번호: $randomNumber";
    $headers = "From: sender@example.com\r\n";
    $headers .= "Reply-To: sender@example.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to_email, $subject, $message, $headers)) {
        echo "메일이 보내졌습니다. 번호를 확인하세요.";
    } else {
        echo "메일 전송 실패. 관리자에게 문의하세요.";
    }
} else {
    echo "잘못된 요청입니다. 관리자에게 문의하세요.";
}
?>