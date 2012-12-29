<?php
date_default_timezone_set('America/Los_Angeles');
$art_day = date("F_j,_Y");
//echo date("F_j,_Y");
$ch = curl_init("http://en.wikipedia.org/w/api.php?format=json&action=query&titles=Wikipedia:Today%27s_featured_article/". $art_day ."&prop=revisions&rvprop=content");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: Wikipedia Geektool/1.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch), true);
curl_close($ch);
$page_id = array_keys($result['query']['pages']);
//echo $page_id[0];
$page_title = $result['query']['pages'][$page_id[0]]['revisions'][0]['*'];
$b_bracket = strpos($page_title, '\'\'\'[[');
$e_bracket = strpos(substr($page_title, $b_bracket), ']]\'\'\'');
echo substr($page_title, ($b_bracket + 5), ($e_bracket - 5));
?>
