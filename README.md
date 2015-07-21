<article class="markdown-body entry-content" itemprop="mainContentOfPage"><h1><a id="user-content-application-grid" class="anchor" href="#application-grid" aria-hidden="true"><span class="octicon octicon-link"></span></a>Cstore Board CRUD</h1>


EX) APPID = test005 생성 </BR>

해당파일 LOCATION:</BR>
https://github.com/SimplexInternet/Cstore 에 접속  -> class 폴더 -> admin 폴더 -> adminBoard.php  파일 
</BR>
</BR>
테스트 적용 주소 :</BR>
http://test005.app-sdk-003.cafe24.com/admin/board

</BR>
테스트 확인 주소:</BR>
개발자센터 로그인 -> MY개발자 센터 -> MY앱 개발 -> 기본정보 -> 오른쪽 창 서비스도메인 목록의 주소 

<BR>
<h2><a id="user-content-test-environment" class="anchor" href="#test-environment" aria-hidden="true"><span class="octicon octicon-link"></span></a>Test environment</h2>

<ul>
<li>PC

<ul>
<li>ECLIPSE INDIGO 3.7.2</li>
<li>jdk 1.8</li>
<li>IE7~11</li>
<li>Chrome</li>
<li>Firefox</li>
</ul></li>
</ul>


<h2><a id="user-content-test-environment" class="anchor" href="#test-environment" aria-hidden="true"><span class="octicon octicon-link"></span></a>Source explanation</h2>

<ul> 
<li>해당 예제는 테스트 서버에서 자유계시판인 board_no=5 에서 테스트 실시
<ul>
<li>CREATE(write)- 계시판에 글을 쓰는 부분 입니다. POST방식 예제의 컬럼들을 다 기재 해줘야 합니다</li>
<li>READ- 계시판의 글을 조회하는 부분 입니다</li>
<li>UPDATE- 계시판의 존재하는 글을 수정하는 부분 입니다. POST방식 예제에서는 제목(subject)을 수정 , pw 필요 </li>
<li>DELETE- 계시판의 존재하는 글을 삭제하는 분분 입니다. POST방식 pw 필요  </li>
<li>LIST- 계시판의 글 리스트를 보는 부분입니다.</li>
<li>Detail- 계시판의 정보를 볼 수 있습니다. 예제에서는 자유계시판의 정보를 볼 수 있습니다.</li>
</ul></li>
</ul>



<h2><a id="user-content-test-environment" class="anchor" href="#test-environment" aria-hidden="true"><span class="octicon octicon-link"></span></a>Culumn</h2>
<table><thead>
<tr>
<th>Culumn</th>
<th>Description</th>
<th>Date</th>
<th>Writer</th>
</tr>
</thead><tbody>
<tr>
<td>board_no</td>
<td>계시판번호</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>
<tr>
<td>subject</td>
<td>글제목</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>
<tr>
<td>content</a></td>
<td>글내용</td>
<td>15 .07 .21</td>
<td>이상욱 </td>
</tr>
<tr>
<td>writer</td>
<td>작성자</td>
<td>15 .07 .21</td>
<td>이상욱 </td>
</tr>
<tr>
<td>email1</td>
<td>이메일주소</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>

<tr>
<td>email2</td>
<td>이메일주소</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>

<tr>
<td>passwd</td>
<td>비밀번호</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>

<tr>
<td>no</td>
<td>글번호</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>

<tr>
<td>search_date</td>
<td>검색기간</td>
<td>15 .07 .21</td>
<td>이상욱</td>
</tr>



</tbody></table>


