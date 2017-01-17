<?php if (isset($_POST['email'])) {
  echo "form posted";
  echo $_POST['email']."<br/>";
  echo $_POST['pwd']."<br/>";
  echo $_POST['name']."<br/>";
  echo $_POST['contact']."<br/>";
} else {
  get_header(); ?>
  <div class="main">
    <br/>
    <div style="max-width: 500px; margin: 0 auto;">
      <h1>회원 등록하기</h1>
      <form action="<?php get_permalink() ?>" name="register-form" method="POST">
        <table class="no-border">
          <tr>
            <td><label for="email">이메일(아이디)</label></td><td><input type="text" name="email"/></td>
          </tr>
          <tr>
            <td><label for="pwd">비밀번호</label></td><td><input type="password" name="pwd" /></td>
          </tr>
          <tr>
            <td><label for="pwd2">비밀번호 확인</label></td><td><input type="password" name="pwd2" /></td>
          </tr>
          <tr>
            <td><label for="name">이름</label></td><td><input type="text" name="name"/></td>
          </tr>
          <tr>
            <td><label for="contact">연락처</label></td><td><input type="text" name="contact"/></td>
          </tr>
          <tr>
            <td></td><td><input type="submit" value="등록완료"/></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <?php get_footer();
} ?>
