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

1. cascade 글 삭제시 reply의 notice_idx 캐스캐이딩 하여 삭제_(완료)●
6. 비회원 글쓰기 기능 삭제하기_(완료)●
10. 비회원으로 글 들어가면 비회원으로 접속중 표기_(완료, 비회원인경우 로그인/회원가입 문구표기)●
12. 회원은 본인 작성 글 조회수 안 올라감. 비회원은 조회수 올라감)●
16. 모바일 회원가입 확인번호 복붙 오류 수정●

 2. 글, 댓글 엔터 출력 (nl2br()함수 description, reply contents에 적용) ●
3. index.html 제목, 글 내용 표시 길이 리밋 걸기 ●
4. 회원 탈퇴기능 넣기 (글, 댓글 삭제할거냐 아니면 탈퇴한 회원으로 표기할거냐, sql스케쥴링 할거냐)  ●
17. 회원정보수정 기능 넣기  (로그아웃, 회원수정 모두 세션파기 기능 추가)●
18. 회원정보수정 안 되는 문제 해결하기●
5. 내용 입력칸 사이즈 초기화 하기 ●
7. 댓글 수 title 내용 옆에 [2] 식으로 표기●
5.파일 업로드, 다운로드, 이미지, 영상 출력 기능
15. 게시판, 덧글 리스트 많아지면 1/2/3/4...로 페이지 넘길 수 있게 mysql 쿼리문으로 limit 걸기
 8. 보안처리(스크립팅, sql조작 막기)
 9. 코드 리팩토링 (세션비번대신 토큰사용해서 세션유지)

11. php 페이지 url로 접근막기 (8로 해결 가능?) 

14. 아이디, 암호, 메일 패턴(정규표현식 regx) 적용, input 글자 수 제한걸기




============================================================
