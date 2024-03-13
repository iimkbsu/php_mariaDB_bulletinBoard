XAMPP 사용
Apache 서버에서 php로 email 보내는 방법

1. XAMPP 실행 후 Apache config에서 php.ini 열기
2. 아래 4개 찾아서 세미콜론(;) 주석처리 지우고 설정
   
4. SMTP=smtp.gmail.com (gmail의 smtp 사용) //gmail 계정 보안탭 -> 2단계 인증 들어가기 -> 앱 비밀번호 (17번 항목에서 발급 받은 비밀번호 입력)
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





////////////////////////////////////////////////////////////
수정할 사항

1. cascade 글 삭제시 reply의 notice_idx 캐스캐이딩 하여 삭제
 2. 글 작성 엔터 입력 
3. index.html 제목, 글 내용 표시 길이 리밋 걸기 
4. 회원 탈퇴(메일확인) 기능 넣기 (글, 댓글 삭제할거냐 아니면 탈퇴한 회원으로 표기할거냐) 
5. 내용 입력칸 사이즈 초기화 하기 
6. 비회원 글쓰기 기능 삭제하기 
7. 댓글 수 title 내용 옆에 [2] 식으로 표기
 8. 보안처리(스크립팅, sql조작 막기)
 9. 코드 리팩토링 
10. 비회원으로 글 들어가면 비회원으로 접속중 표기 
11. php 페이지 url로 접근막기 (8로 해결 가능?) 
12. 비회원의 글 조회수 증가시킬건지 안 할건지 정하기. (ip로 한 번만 가능하게?) 
13. 글 페이지에도 로그인 로그아웃 만들기 
14. 아이디, 암호, 메일 패턴(정규표현식 regx) 적용 
15. 게시판, 덧글 리스트 많아지면 1/2/3/4...로 페이지 넘길 수 있게


============================================================
