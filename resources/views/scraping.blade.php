@extends('layouts.app')

@section('content')
<p class="text-center fs-1">SCRAPING</p>
<form action="/scraping" method="get">
  @csrf
<div class="container d-flex justify-content-center align-items-baseline">
<div class="form-floating mb-3 col-6">
  <input type="url" name="url" class="form-control" id="floatingInput" placeholder="http://">
  <label for="floatingInput">URL</label>
  <select class="form-select col-6 mt-3 mb-3" name="select_url" style="padding:0 10px" aria-label="Default select example">
    <option value="">選択</option>
    <option value="https://news.yahoo.co.jp/">yahoo</option>
    <option value="https://www.google.com/">Google</option>
  </select>
  <button type="submit" class="btn btn-lg btn-primary col-12">検索</button>
</div>
</form>
</div>
@isset($url)
@php
        $dom = new DOMDocument('1.0', 'UTF-8');
        $html = file_get_contents($url);
        @$dom->loadHTML(mb_convert_encoding($html, "HTML-ENTITIES", 'auto'));
        $xpath = new DOMXpath($dom);
        foreach($xpath->query('//a') as $node){ 
            $link = $node->getAttribute('href');
            if(strpos($link, "http")===0){
              echo "<p class=\"text-center\">";
              echo "<a href=\"$link\" target=\"_blank\">". $node->nodeValue. "</a>"; 
            } else {
              continue;
            }
          }
@endphp
@endisset
@endsection
