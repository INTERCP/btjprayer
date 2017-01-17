<?php
/**
 * @package WordPress
 * @subpackage BTJPrayer
 */
?><!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width">


  <?php if (preg_match('/(facebook|kakaotalk)/',$_SERVER['HTTP_USER_AGENT']) == true) { ?>
    <meta property="og:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>">
  <?php } ?>


  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/../twentyfourteen/style.css " />
  <!--
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style_old.css " />
  -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/jquery.modal.min.css " />

  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <?php if(isset($_GET["mobile"])) : ?>
  <style>
  .site-content {
    margin-right: 0 !important;
  }
  .site-content .entry-header, .site-content .entry-content {
    padding: 25px;
    margin: 0;
    width: 100%;
    max-width: 100%;
  }
      
/*
  .site-content .entry-meta {
    display: none;
  }*/
  </style>
  <?php endif; ?>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <script>
		// 날짜 차이 계산으로 new 버튼 출력. header.php
		function print_new( input_day, diff_day ){
			var now = new Date();
			var new_dt = new Date(Date.parse(now) + diff_day * 1000 * 60 * 60 * 24)
			var yyyy = new_dt.getFullYear();
			var mm = new_dt.getMonth()+1;
			var dd = new_dt.getDate();
			if(mm < 10) mm = '0'+mm;
			if(dd < 10) dd = '0'+dd;
			var str = yyyy+'-'+mm+'-'+dd;
			//alert(str);
			if( input_day >= str ){
				document.write("<img class='new_icon' src='http://www.btjprayer.net/40ucsILHrT/wp-content/themes/pray-for-muslims-wp-2/img/new1.gif'>");
			}
		}
	</script>
</head>

<body <?php body_class(); ?> style="margin-top: 0px;">
  <div id="wrapper">
    <?php if(!isset($_GET["mobile"])) : ?>
    <header>
      <div class="branding-bar"></div>
      <div class="branding">
        <div class="logo">
          <a href="/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/logo.png"/></a>
        </div>
        <div class="main-nav">
          <ul class="horizontal dragscroll">
            <li><a href="/">HOME</a></li>
            <li><a href="/archives/category/today">오늘의 기도</a></li>
            <li><a href="/archives/category/nationsjoin">종족별 기도</a></li>
            <!--<li>기도실</li>-->
            <li><a href="/archives/category/columns">BTJ자료실</a></li>
            <li><a href="/archives/category/gap">GAP</a></li>
          </ul>
        </div>
        <div style="clear:both;"></div>
      </div> <!-- .branding -->
    </header>
    <?php endif; ?>
