<?php get_header(); ?>
<div class="headline">
  <?php
    $cat_id = get_category_by_slug('today');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array( 'posts_per_page' => 2, 'paged' => $paged, 'category' => $cat_id->term_id );
    $myposts = get_posts( $args );
  ?>

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li><!--
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
      -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!--
        <div class="item active">
            <a href="http://www.btjprayer.net/archives/12662"><?php echo get_the_post_thumbnail(12662); ?></a>
            
            <div class="carousel-caption">
                <p>
                    <span class="caption-category">[라마단] </span>
                    16. 6. 6 ~ 7.5
                </p>
                <p><span class="caption-title"><a href="http://www.btjprayer.net/archives/12662">라마단이란?</a></span></p>
            </div>
        </div>
        -->
        <!--
        <div class="item active">
            <a href="http://www.btjprayer.net/archives/13734"><?php echo get_the_post_thumbnail(13734); ?></a>
            
            <div class="carousel-caption">
                <p>
                    <span class="caption-category">[라마단] </span>
                    2016. 7. 2
                </p>
                <p><span class="caption-title"><a href="http://www.btjprayer.net/archives/13734">권능의 밤 (Laylat al-Qadr)</a></span></p>
            </div>
        </div>
        -->
      <?php foreach ( $myposts as $i=>$post ) : setup_postdata( $post ); ?>
        <!-- 라마단 끝나면 $i == 0으로 바꿔야 함. -->
        <div class="item <?php if($i == 0): ?>active<?php endif;?>" >
          <?php if( has_post_thumbnail() ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>

          <?php endif; ?>
          <div class="carousel-caption">
            <p><span class="caption-category"><a href="/archives/category/today">오늘의 기도</a></span> <?php the_date(); ?></p>

            <?php
              $obj_category = get_the_category();
              $term_id = $obj_category[0]->term_id;
              $dif_day = "-1";
              if( $term_id == '6') {		// 종족기도만 -3
                $dif_day = "-3";
              }
              // New 표시
              $sub_date = substr( $post->post_date , 0, 10);
              $script_str = "<script>print_new( \"".$sub_date."\", $dif_day );</script>";
            ?>
            <p class="caption-title"><?php the_title('<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> '.$script_str); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Controls -->

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div> <!-- .carousel -->
</div> <!-- .headline -->
<div style="margin-top:45px; height:1px;"></div>
<div class="article-list fp-widget">
  <h4><div class="heading-deco"> </div><a href="/archives/cateogory/nationsjoin"><strong>종족별 기도</strong></a></h4>

  <?php
    $cat_id = get_category_by_slug('nationsjoin');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array( 'posts_per_page' => 2, 'paged' => $paged, 'category' => $cat_id->term_id, 'orderby' => 'modified' );
    $myposts = get_posts( $args );

    foreach ( $myposts as $i=>$post ) : setup_postdata( $post );
  ?>


    <div class="col-xs-12 col-sm-6" style="padding: 0; margin-bottom: 15px;">
      <table class="fp-table">
        <tr>
          <td style="width:120px;">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="nations-thumbnail"><a href="<?php esc_url( get_permalink() ) ?>"><?php the_post_thumbnail(array(120, 100)); ?></a></div>
            <?php endif; ?>
          </td>
          <td style="padding-left: 4px;">
            <?php
              $obj_category = get_the_category();
              $term_id = $obj_category[0]->term_id;
              $dif_day = "-1";
              if( $term_id == '6') {		// 종족기도만 -3
                $dif_day = "-3";
              }
              // New 표시
              $sub_date = substr( $post->post_date , 0, 10);
              $script_str = "<script>print_new( \"".$sub_date."\", $dif_day );</script>";

              $title = $post->post_title;
              $title = explode(";", $title)[1];
            ?>
            <!--
            <strong><?php the_title('<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> '.$script_str); ?></strong>-->

            <strong><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php echo getExcerpt($title, 0, 32); ?></a><?php $script_str ?></strong>
          </td>
        </tr>
      </table>
    </div>

  <?php endforeach; ?>
  <div style="clear:both;"></div>
</div><!-- .article-list -->

<div style="background-color: #f1f1f1;">
  <div style="max-width: 500px; margin:0 auto; padding: 15px;">
    <div class="heading-deco"> </div><strong><span style="font-size: 18px; margin-right: 15px;">GAP말씀</span></strong>
    <table class="fp-table gap horizontal dragscroll">
      <tr>
        <?php
          $cat_id = get_category_by_slug('gap');
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array( 'posts_per_page' => 4, 'paged' => $paged, 'category' => $cat_id->term_id );
          $myposts = get_posts( $args );

          foreach ( $myposts as $i=>$post ) : setup_postdata( $post );
        ?>
        <td style="vertical-align: middle;"><strong><?php the_title('<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>'); ?></strong></td>
        <?php endforeach ?>
      </tr>
    </table>
  </div>
</div>

<div class="comment-list fp-widget">
  <h4><div class="heading-deco"> </div><strong>Best 기도문</strong></h4>
  <ul>
  <?php
    $comments = get_best_comments();

    foreach ( $comments as $comment ):
      ?>
      <li>
        <table class="fp-table">
          <tr>
            <td style="padding-right: 15px; vertical-align:middle;"><?php echo get_the_post_thumbnail($comment->parent, array(90, 90)); ?></td>
            <td>
              <strong><a style="color: black" href="<?php echo esc_url( get_permalink( $comment->parent ) ); ?>">
              <?php
                if ($comment->category == 'today') :
                  echo '[오늘의 기도] '.$comment->parent_title;
                elseif ($comment->category == 'nationsjoin') :
                  $title = explode(";", $comment->parent_title)[1];
                  echo '[종족별기도] '.$comment->parent_title;
                elseif ($comment->category == 'columns') :
                  echo '[BTJ자료실] '.$comment->parent_title;
                elseif (strpos($comment->category, '16p4m') !== false || strpos($comment->category, '16p4mjap') !== false || strpos($comment->category, '16p4mcn') !== false || strpos($comment->category, '16p4meng') !== false) :
                  echo '[PRAY FOR MUSLIMS] '.$comment->parent_title;
                else :
                  echo $comment->parent_title;
                endif;
              ?>
              </a></strong> <br/>
              <?php echo "[".$comment->name."] ".getExcerpt($comment->content); ?>
            </td>
          </tr>
        </table>
      </li>
      <?php
    endforeach;
  ?>
  </ul>
</div><!-- .comment-list -->

<div style="background-color: #f1f1f1;">
  <div style="max-width: 500px; margin:0 auto; padding: 15px;">
    <h4><div class="heading-deco"> </div><a href="/archives/columns"><strong>BTJ자료실</strong></a></h4>
    <table class="fp-table">
      <tr>
        <?php
          $cat_id = get_category_by_slug('columns');
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array( 'posts_per_page' => 1, 'paged' => $paged, 'category' => $cat_id->term_id, 'orderby' => 'modified' );
          $myposts = get_posts( $args );

          foreach ( $myposts as $i=>$post ) : setup_postdata( $post );
        ?>
        <td><?php if( has_post_thumbnail() ) : the_post_thumbnail(array(280, 150)); endif; ?></td>
        <?php
          $obj_category = get_the_category();
          $term_id = $obj_category[0]->term_id;
          $dif_day = "-1";
          if( $term_id == '6') {		// 종족기도만 -3
            $dif_day = "-3";
          }
          // New 표시
          $sub_date = substr( $post->post_date , 0, 10);
          $script_str = "<script>print_new( \"".$sub_date."\", $dif_day );</script>";
        ?>
      </tr>
      <tr>
        <td style="vertical-align:bottom;">
          <div style="height: 8px;"></div>
          <strong><?php the_title('<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> '.$script_str); ?></strong>
        </td>
        <?php endforeach; ?>
      </tr>
    </table>
    <br/>
  </div>
</div>
<?php get_footer(); ?>
