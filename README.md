XAMPP 사용
Apache 서버에서 php로 email 보내는 방법

1. XAMPP 실행 후 Apache config에서 php.ini 열기
2. 아래 4개 찾아서 세미콜론(;) 주석처리 지우고 설정
   
4. SMTP=smtp.gmail.com (gmail의 smtp 사용)
5. smtp_port=587
6. sendmail_from = ***@gmail.com (발신자 이메일 주소)
7. sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"


   
9. Xampp 폴더에서 sendmail 폴더 안에 sendmail.ini 열기
10. 아래 6개(7개) 찾아서 세미콜론(;) 주석처리 지우고 설정

12. smtp_server=smtp.gmail.com
13. smtp_port=587
14. error_logfile=error.log
15. debug_logfile=debug.log
16. auth_username=example@gmail.com  (발신자 이메일 주소)
17. auth_password=**********  (해당 발신자 구글이메일 계정에서 2차비번 설정 후 앱비밀번호 생성하여 추가)
18. force_sender=example@gmail.com  (선택사항)



php의 mail('보낼주소','제목','내용','헤더') 함수 사용
