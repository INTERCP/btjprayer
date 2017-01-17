<?php
  $db = new SQLite3('gap.db');
  $day = $_GET['day'];
  $results = $db->query('SELECT * FROM gap where day='.$day);
  $metadata = $results->fetchArray();
  // metadata['count'] 그날 갭본문에 챕터가 몇개나 있는지
  // metadata['c1'] 첫 번째 챕터의 네비게이션 코드
  // metadata['c2'] 두 번째 챕터의 네비게이션 코드
  // metadata['c3'] 세 번째 챕터의 네비게이션 코드
  // metadata['c4'] 네 번째 챕터의 네비게이션 코드
  // metadata['c5'] 다섯 번째 챕터의 네비게이션 코드

  $todaygap = array();
  $index = array('c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7');

  $book = array();
  $chapter = array();
  $init = array();
  $end = array();
  $verses = array();

  $bible_book = [
    '',
    '창세기',
    '출애굽기',
    '레위기',
    '민수기',
    '신명기',
    '여호수아',
    '사사기',
    '룻기',
    '사무엘상',
    '사무엘하',
    '열왕기상',
    '열왕기하',
    '역대상',
    '역대하',
    '에스라',
    '느헤미야',
    '에스더',
    '욥기',
    '시편',
    '잠언',
    '전도서',
    '아가',
    '이사야',
    '예레미야',
    '예레미야애가',
    '에스겔',
    '다니엘',
    '호세아',
    '요엘',
    '아모스',
    '오바댜',
    '요나',
    '미가',
    '나훔',
    '하박국',
    '스바냐',
    '학개',
    '스가랴',
    '말라기',
    '마태복음',
    '마가복음',
    '누가복음',
    '요한복음',
    '사도행전',
    '로마서',
    '고린도전서',
    '고린도후서',
    '갈라디아서',
    '에베소서',
    '빌립보서',
    '골로새서',
    '데살로니가전서',
    '데살로니가후서',
    '디모데전서',
    '디모데후서',
    '디도서',
    '빌레몬서',
    '히브리서',
    '야고보서',
    '베드로전서',
    '베드로후서',
    '요한1서',
    '요한2서',
    '요한3서',
    '유다서',
    '요한계시록'
  ];

  for($i = 0; $i < $metadata['count']; $i++) {
    $todaygap[$i] = $metadata[$index[$i]];
    $end[$i] = 0;
  }

  // [책];[장]:[절시작]-[절끝]   ===> 절 범위가 있는 경우
  // [책];[장]                ===> 한 장 전체가 범위인 경우
  for($j = 0; $j < $metadata['count']; $j++) {
    $book[$j] = explode(';', $todaygap[$j])[0];
    $chapter[$j] = explode(':', explode(';', $todaygap[$j])[1])[0];

    // 장의 부분만 범위에 해당하는 경우
    if (strpos($todaygap[$j], ':') !== false) {
      $init[$j] = explode('-', explode(':', explode(';', $todaygap[$j])[1])[1])[0];
      $end[$j] = explode('-', explode(':', explode(';', $todaygap[$j])[1])[1])[1];
    }
    // 한 장 전체가 범위인 경우
    else {
      $init[$j] = 1;
    }

    $index_str = $bible_book[$book[$j]].' '.$chapter[$j].'장 ';
    if (strpos($todaygap[$j], '-') !== false) {
      $index_str .= $init[$j].'-'.$end[$j].'절';
      $bible_query_result = $db->query(
        'SELECT * FROM bible WHERE book='.$book[$j].' and chapter='.$chapter[$j].' and verse>='.$init[$j].' and verse <='.$end[$j].' order by verse asc'
      );

      $verses[$index_str] = array();
      $k = $init[$j];
      while ($row = $bible_query_result->fetchArray()) {
        $verses[$index_str][$k] = $row['content'];
        $k++;
      }
    }

    else if (strpos($todaygap[$j], ':') !== false) {
      $index_str .= $init[$j].'절';
      $bible_query_result = $db->query(
        'SELECT * FROM bible WHERE book='.$book[$j].' and chapter='.$chapter[$j].' and verse='.$init[$j]
      );
      // $index_str =
      $verses[$index_str] = array();
      $k = $init[$j];
      while ($row = $bible_query_result->fetchArray()) {
        $verses[$index_str][$k] = $row['content'];
        $k++;
      }
    }

    else {
      $bible_query_result = $db->query(
        'SELECT * FROM bible WHERE book='.$book[$j].' and chapter='.$chapter[$j]
      );
      $verses[$index_str] = array();
      $k = $init[$j];
      while ($row = $bible_query_result->fetchArray()) {
        $verses[$index_str][$k] = $row['content'];
        $k++;
      }

      // echo '<br/>'.$todaygap[$j].'<br/>';
      // echo json_encode($verses[$j]);
    }
  }

  if($_GET['escape'] === 'true') {
    echo json_encode($verses, JSON_UNESCAPED_UNICODE);
  } else {
    echo json_encode($verses);
  }

?>
