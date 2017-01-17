<?php get_header(); ?>
<?php
  function get_new_icon($post_id) {
    $post = get_post($post_id);
    $modified = new DateTime($post->post_modified);
    $now = new DateTime();
    $diff = date_diff($modified, $now);
    if ($diff->d < 3) {
      return "<img style='width: 23px; margin-bottom: 4px; float:right;' src='http://www.btjprayer.net/40ucsILHrT/wp-content/themes/pray-for-muslims-wp-2/img/new1.gif'><br/>";
    } else {
      return "<br/>";
    }
  }
?>

<div class="main">
  <br/>
  <div class="nj-widget">
    <p><span class="nj-title">아랍</span> <span class="nj-title-en">Arab</span></p>
    <p>
      <ul>
        <li><a href="/archives/8804"><?php echo get_new_icon(8804) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations01.png" /><p>시리아</p></a></li>
        <li><a href="/archives/8812"><?php echo get_new_icon(8812) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations02.png" /><p>이라크</p></a></li>
        <li><a href="/archives/8810"><?php echo get_new_icon(8810) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations03.png" /><p>예멘</p></a></li>
        <li><a href="/archives/8808"><?php echo get_new_icon(8808) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations04.png" /><p>사우디 아라비아</p></a></li>
        <li><a href="/archives/8802"><?php echo get_new_icon(8802) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations05.png" /><p>요르단</p></a></li>
        <li><a href="/archives/8614"><?php echo get_new_icon(8614) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations06.png" /><p>레바논</p></a></li>
        <li><a href="/archives/8814"><?php echo get_new_icon(8814) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations07.png" /><p>이집트</p></a></li>
        <li><a href="/archives/8806"><?php echo get_new_icon(8806) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations08.png" /><p>팔레스타인-이스라엘</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">마그렙</span> <span class="nj-title-en">Maghreb</span></p>
    <p>
      <ul>
        <li><a href="/archives/8618"><?php echo get_new_icon(8618) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations09.png" /><p>리비아</p></a></li>
        <li><a href="/archives/8824"><?php echo get_new_icon(8824) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations10.png" /><p>튀니지</p></a></li>
        <li><a href="/archives/8828"><?php echo get_new_icon(8828) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations11.png" /><p>알제리</p></a></li>
        <li><a href="/archives/8832"><?php echo get_new_icon(8832) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations12.png" /><p>에티오피아</p></a></li>
        <li><a href="/archives/8830"><?php echo get_new_icon(8830) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations13.png" /><p>모로코</p></a></li>
        <li><a href="/archives/8834"><?php echo get_new_icon(8834) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations14.png" /><p>모리타니</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">소아시아</span> <span class="nj-title-en">Asia Minor</span></p>
    <p>
      <ul>
        <li><a href="/archives/8816"><?php echo get_new_icon(8816) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations15.png" /><p>터키</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">페르시아</span> <span class="nj-title-en">Persia</span></p>
    <p>
      <ul>
        <li><a href="/archives/8762"><?php echo get_new_icon(8762) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations16.png" /><p>아프가니스탄-파키스탄</p></a></li>
        <li><a href="/archives/8758"><?php echo get_new_icon(8758) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations17.png" /><p>이란</p></a></li>
        <li><a href="/archives/8753"><?php echo get_new_icon(8753) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations18.png" /><p>타지키스탄</p></a></li>
        <li><a href="/archives/8760"><?php echo get_new_icon(8760) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_logo.png" /><p>쿠르드</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">인도</span> <span class="nj-title-en">India</span></p>
    <p>
      <ul>
        <li><a href="/archives/8790"><?php echo get_new_icon(8790) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations20.png" /><p>인도</p></a></li>
        <li><a href="/archives/8792"><?php echo get_new_icon(8792) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations21.png" /><p>네팔</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">중국변방</span> <span class="nj-title-en">China Frontiers</span></p>
    <p>
      <ul>
        <li><a href="/archives/8784"><?php echo get_new_icon(8784) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations22.png" /><p>위구르</p></a></li>
        <li><a href="/archives/8786"><?php echo get_new_icon(8786) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations23.png" /><p>회족</p></a></li>
        <li><a href="/archives/8788"><?php echo get_new_icon(8788) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations24.png" /><p>티벳</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">중앙아시아</span> <span class="nj-title-en">Central Asia</span></p>
    <p>
      <ul>
        <li><a href="/archives/8780"><?php echo get_new_icon(8780) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations25.png" /><p>투르크메니스탄</p></a></li>
        <li><a href="/archives/8772"><?php echo get_new_icon(8772) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations26.png" /><p>우즈베키스탄</p></a></li>
        <li><a href="/archives/8775"><?php echo get_new_icon(8775) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations27.png" /><p>카자흐스탄</p></a></li>
        <li><a href="/archives/8777"><?php echo get_new_icon(8777) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations28.png" /><p>키르기스스탄</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">카프카스</span> <span class="nj-title-en">the Caucasus Region</span></p>
    <p>
      <ul>
        <li><a href="/archives/8770"><?php echo get_new_icon(8770) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations29.png" /><p>아제르바이잔</p></a></li>
        <li><a href="/archives/8765"><?php echo get_new_icon(8765) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations30.png" /><p>까바르딘발카르<br/>다게스탄<br/>잉귀시<br/>체첸</p></a></li>
        <li><a href="/archives/18550"><?php echo get_new_icon(18550) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations39.png" /><p>조지아</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">볼가-우랄</span> <span class="nj-title-en">Volga-Ural</span></p>
    <p>
      <ul>
        <li><a href="/archives/8818"><?php echo get_new_icon(8818) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations31.png" /><p>타타르스탄<br/>바쉬코르토스탄<br/>크림타타르</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">몽골-시베리아</span> <span class="nj-title-en">Mongol-Siberia</span></p>
    <p>
      <ul>
        <li><a href="/archives/8820"><?php echo get_new_icon(8820) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations32.png" /><p>몽골</p></a></li>
        <li><a href="/archives/8822"><?php echo get_new_icon(8822) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations33.png" /><p>부랴트</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">인도차이나</span> <span class="nj-title-en">Indochina</span></p>
    <p>
      <ul>
        <li><a href="/archives/8794"><?php echo get_new_icon(8794) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations34.png" /><p>베트남</p></a></li>
        <li><a href="/archives/8796"><?php echo get_new_icon(8796) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations35.png" /><p>캄보디아</p></a></li>
        <li><a href="/archives/8798"><?php echo get_new_icon(8798) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations36.png" /><p>라오스</p></a></li>
        <li><a href="/archives/8800"><?php echo get_new_icon(8800) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations37.png" /><p>미얀마</p></a></li>
      </ul>
    </p>
  </div>

  <div class="nj-widget">
    <p><span class="nj-title">동아시아</span> <span class="nj-title-en">Eastern Asia</span></p>
    <p>
      <ul>
        <li><a href="/archives/8836"><?php echo get_new_icon(8836) ?><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/nation_img/ic_nations38.png" /><p>일본</p></a></li>
      </ul>
    </p>
  </div>
</div>
<?php get_footer(); ?>
