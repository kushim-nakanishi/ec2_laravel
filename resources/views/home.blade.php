@extends('layouts.app')

@section('content')
<p class="text-center fs-1">HOME</p>
<?php
  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents("https://www.nikkei.com/");
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);

foreach($xpath->query('//a') as $node){ //h2の部分を変更することで他のタグなど指定が可能
$link = $node->getAttribute('href');
echo "<p class=\"text-center\">";
echo "<a href=\"$link\">". $node->nodeValue. "</a>"; //h2の内容を1つずつ表示させる
 }
?>
@endsection
