<?php
date_default_timezone_set('America/Los_Angeles');
$art_day = date("F_j,_Y");
//echo date("F_j,_Y");
$ch = curl_init("http://en.wikipedia.org/w/api.php?format=json&action=query&titles=Wikipedia:Today%27s_featured_article/". $art_day ."&prop=revisions&rvprop=content");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: Wikipedia GeekTool/1.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch), true);
curl_close($ch);
$page_id = array_keys($result['query']['pages']);
//echo $page_id[0];
$page_text = $result['query']['pages'][$page_id[0]]['revisions'][0]['*'];
//echo substr($page_text, 0, strrpos($page_text, '([['));
$f_text = substr($page_text, 0, strrpos($page_text, '([['));

//Take out "DIV" elements out of $f_text (leading image cannot be displayed with this script)
$lead_image = strpos($f_text, '</div>');
if ($lead_image != 0)
{
$f_text = substr($f_text, ($lead_image + 7), strlen($f_text));
}
  
//Strip out all links  
  preg_match_all('#\\[\\[(.*?)\\]\\]#', $f_text, $matches, PREG_SET_ORDER);
for($i = 0; $i < count($matches); ++$i) {
	//print_r($matches[$i]);
	$offset = strpos($matches[$i][1], '|');
	if ($offset == null){$offset = 0;} else {$offset = ($offset + 1);}
	$f_text = str_replace($matches[$i][0], substr($matches[$i][1], $offset), $f_text);
}
$f_text = str_replace("'''", null, $f_text);
$f_text = str_replace("''", null, $f_text);
echo $f_text;
?>
