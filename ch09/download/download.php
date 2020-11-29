<?php
session_start();
?>
<?php
if(!isset($_SESSION['userid'])){
    print "(window.alert('로그인후 이용해 주세요'); history.go(-1);";
    exit;
}

$num =$_REQUEST['num'];
$real_name =$_REQUEST['real_name'];
$show_name = $_REQUEST['show_name'];
$file_type =$_REQUEST['file_type'];

$upload_dir = 'C:\xampp\htdocs\ch09\data\\';   //물리적 저장위치 

$file_path=$upload_dir.$real_name;     
   if(file_exists($file_path) )
    { 
	$fp = fopen($file_path,"rb"); 

        if( $file_type ) 
           { 
		Header("Content-type: application/x-msdownload"); 
                Header("Content-Length: ".filesize($file_path));     
                Header("Content-Disposition: attachment; filename=$show_name");   
                Header("Content-Transfer-Encoding: binary"); 
		Header("Content-Description: File Transfer"); 
                header("Expires: 0"); 
           } 
            else 
           { 
               if(eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $HTTP_USER_AGENT)) 
               { 
                  Header("Content-type: application/octet-stream"); 
                  Header("Content-Length: ".filesize($file_path));
                  Header("Content-Disposition: attachment; filename=$show_name");   
                  Header("Content-Transfer-Encoding: binary");   
                  Header("Expires: 0");   
               } 
              else 
                { 
                  Header("Content-type: file/unknown");     
                  Header("Content-Length: ".filesize($file_path)); 
                  Header("Content-Disposition: attachment; filename=$show_name"); 
                  Header("Content-Description: PHP3 Generated Data"); 
                  Header("Expires: 0"); 
                 } 
            } 

		if(!fpassthru($fp)) 
		fclose($fp); 
	}
       /*
        *  형식
  void Header ( string $string )
  - 인자: 웹 브라우저가 이해할 수 있는 약속된 헤더(문자열 형태)

 기능
  HTTP의 헤더를 클라이언트 측의 웹 브라우저에 보낸다. 반환값의 형식이 void이므로 반환값은 없으며, 헤더에 대한 자세한 내용은 PHP 공식 웹 사이트(php.net)를 참고하기 바란다.

 사용예
  <?
    Header('Content-type: application/pdf');
    Header('Content-Disposition: attachment;    
    filename="downloaded.pdf"');
  ?> 
 
  2행은 전송하려는 파일의 형식이 pdf임을 알려주고, 3행에서는 전송하려는 파일명이 downloaded.pdf임을 클라이언트 측의 웹 브라우저에게 알려준다.

 형식
  bool file_exists(string $filename)
  - 인자: 파일명이나 디렉터리명, 경로

 기능
  입력한 경로에 해당 파일이 있는지 확인한다. 파일이 존재하면 TURE를, 그렇지 않으면 FALSE를 반환한다.

 형식
  resource fopen(string $filename , string $mode)
  - 첫 번째 인자: 파일명과 파일이 존재하는 위치(경로)
  - 두 번째 인자: 읽기 모드

 기능
  파일을 열어서 파일이 있는 위치를 가르키는 파일 포인터를 반환한다. 두 번째 인자값에 따라 어떤 방법으로 파일을 여는지 결정된다.

  $mode에는 다음과 같은 값을 입력할 수 있다.
  - 'r' : 읽기 모드
  - 'w' : 쓰기 모드
  - 'b' : 이진(binary) 모드
 
 사용예
  <?
    $handle = fopen(".\folder\resource.exe", "rb");
  ?>

  [folder] 폴더의 resource.exe 파일을 이진 읽기 모드로 열어서 파일 포인터($handle)에 저장한다. 이진 모드는 텍스트 파일이 아닌 실행파일(.exe)과 같은 일반 파일을 여는 데 사용한다.
        * 
   형식
  int fpassthru(resource $handle)
  - 인자: 파일 포인터

 기능
  파일 포인터($handle)가 지시하는 현 위치에서 파일을 끝까지 읽어서 출력버퍼에 저장
        *  형식
  bool fclose(resource $handle)
  - 인자: 파일 포인터 

 기능
  파일 포인터($handle)가 지시하는 파일을 닫는다. 함수를 실행하면 TRUE를, 실패하면 FALSE를 반환한다.



        * 
        */
 ?>