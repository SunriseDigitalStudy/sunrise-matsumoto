<!DOCTYPE html>
<!-- 櫻井が追加しました！！ -->
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link charset="UTF-8" media="screen" type="text/css" href="/test/matsumoto/site/css/reset.css" rel="stylesheet">
	<link charset="UTF-8" media="screen" type="text/css" href="/test/matsumoto/site/css/input.css" rel="stylesheet">
	<title>組込み関数ですよ</title>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/test/matsumoto/site/scripts/shCore.js"></script>
	<script type="text/javascript" src="/test/matsumoto/site/scripts/shBrushCss.js.js"></script>
	<script type="text/javascript" src="/test/matsumoto/site/scripts/shBrushXml.js.js"></script>
	<script type="text/javascript" src="/test/matsumoto/site/scripts/shBrushPhp.js"></script>
	<link type="text/css" rel="stylesheet" href="/test/matsumoto/site/styles/shCore.css"/>
	<link type="text/css" rel="stylesheet" href="/test/matsumoto/site/styles/shThemeDefault.css"/>
	<script type="text/javascript"> SyntaxHighlighter.config.clipboardSwf = '/test/matsumoto/site/scripts/clipboard.swf'; SyntaxHighlighter.all(); </script>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
	</head>

<body>
	<div id="wrapper">
		<div id="container">

<h1>5 組込み関数だお！</h1>
<img id="banner" src="img/ini.jpg" alt="バナー(大)" border="0">
<br />
<p>目次</p>
<br />
<ul>
<li><a href="#1">5.1 関数の基本</a></li>
<li><a href="#2">5.1.1 関数の呼び出し</a></li>
<li><a href="#3">5.1.2 組込み関数</a></li>
<li><a href="#4">5.1.3 構文の表記について</a></li>
<li><a href="#5">5.2 文字列関数</a></li>
<li><a href="#6">5.2.1 マルチバイト文字列の設定</a></li>
<li><a href="#7">5.2.2 文字列の長さを取得する ── mb_strlen関数</a></li>
<li><a href="#8">5.2.3 文字列を大文字⇔小文字で変換する ── strolower / strtoupper</a></li>
<li><a href="#9">5.4.2 部分文字列を取得する ── mb_substr関</a></li>
<li><a href="#10">5.2.5 部分文字列を置換する ── str_replace</a></li>
<li><a href="#11">5.2.6 文字列を特定の区切り文字で分割する ── explode関数</a></li>
<li><a href="#12">5.2.7 特定の文字列を検索する ── mb_strpos関数 / mb_strrpos関数</a></li>
<li><a href="#13">5.2.8 文字列を整形する ── printf関数</a></li>
<li><a href="#14">5.2.9 文字列を変換する ── mb_convert_kana 関数</a></li>
<li><a href="#15">5.1.10 文字エンコーディングを変換する-mb_convert_encoding / mb_convert_variable関数</a></li>
</ul>
<br />
<br />

<h2><a name="1">5.1 関数の基本</a></h2>

<hr />
<h3><a name="2">5.1.1 関数の呼び出し</a></h3>
<hr />

<p>関数：何かしら入力値（引数）を与えることによって、予め決められた処理を行い、その結果（戻り値）を返す仕組みのこと</p>
<p><pre class="brush: php">print_r
	</pre></p>
<p><pre class="brush: php">ver_dump
	</pre></p>
<p><pre class="brush: php">mb_convert_encording
	</pre></p>
<p>など。</p>
<p>phpは関数は最初からたくさん用意されているので、関数の組み合わせや順番を組み合わせることでプログラムを構築する。</p>

<br />

<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">関数の呼び出し</span>
  </div>
  <div id="cont">
    <p>戻り値 = 関数名（引数 , ……）</p>
  </div>
</div>

<br />

<p>・引数を2つ以上受け取る場合はカンマで区切る</p>
<p id="exp"><span style="color: deepPink;">$data = array( <span style="font-weight:bold;">'PHP' , 'JSP' , 'ASP'</span> ); //引数が複数ある場合</span></p>
<pre class="brush: php">
$data = array( 'PHP' , 'JSP' , 'ASP' ); //引数が複数ある場合
</pre>
<br />
<p>・引数が無い場合でも丸カッコは省略しない</p>
<p id="exp"><span style="color: deepPink;">$today = time( ); //引数がない場合</span></p>
<pre class="brush: php">
$today = time( ); //引数がない場合
</pre>
<br />
<p>・戻り値を必要としない場合には単に「関数名（引数 , ……）」と記述してもよい</p>
<p id="exp"><span style="color: deepPink;">clesedir( $dir ); //戻り値がない場合</span></p>
<pre class="brush: php">
clesedir( $dir ); //戻り値がない場合
</pre>

<br />
<hr />
<h3><a name="3">5.1.2 組込み関数</a></h3>
<hr />

<p id="exp">PHPが標準で提供する関数のことを<span style="font-weight:bold;">組込み（ビルトイン）関数</span>または<span style="font-weight:bold;">内部関数</span>という</p>

<br />

<p>関数</p>
<p id="exp">　┣<span style="font-weight:bold;">組込み（ビルトイン）関数</span>──PHPに組み込まれた関数</p>
<p id="exp">　┃　┣<span style="color: deepPink;"><span style="font-weight:bold;">コア拡張</span>────コア組込み（無効にすることはできない）</span></span></p>
<p id="exp">　┃　┣<span style="color: deepPink;"><span style="font-weight:bold;">バンドル拡張</span>──PHP標準でバンドル</span></span></p>
<p id="exp">　┃　┣<span style="font-weight:bold;">外部拡張</span>────外部ライブラリの組込みが必要</p>
<p id="exp">　┃　┗<span style="font-weight:bold;">PECL拡張</span>────PECL（PHP　Extension Community Library）で提供されるライブラリ</p>
<p id="exp">　┗<span style="font-weight:bold;">ユーザ定義関数</span>───アプリケーション開発者が定義した関数（第6章）</p>

<br />

<p id="exp">配列関数というカテゴリで80以上ある！<p/>

<br />
<br />

<div id="table">
<p>表5.1 本書で解説する関数</p>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
<tr><td><span style="font-weight:bold;">関数名</span></td><td><span style="font-weight:bold;">主な機能</span></td></tr>
<tr><td>文字列関数</td><td>文字列の加工や整形、文字部分の検索／取得など</td></tr>
<tr><td>配列関数</td><td>配列に対する要素の追加／削除、配列要素の並べ替えなど</td></tr>
<tr><td>正規表現関数</td><td>正規表現を利用した文字列の検索や置換、分割</td></tr>
<tr><td>ファイルシステム関数</td><td>ファイルシステム上のフォルダやファイルを操作</td></tr>
<tr><td>数学関数</td><td>絶対値や進数変換</td></tr>
<tr><td>変数操作関数</td><td>変数のデータ型チェックや変数の破棄など</td></tr>
</table>
<div>
<br />
<hr />
<h3><a name="4">5.1.3 構文の表記について</a></h3>
<hr />
<br />
<p id="exp"><span style="font-weight:bold;">構文表記の読み方</span></p>
<pre class="brush: php">

void asort (array $array [, int $sort_flegs = SORT_REGULAR])
	
</pre>
<p id="exp">void　：　戻り値のデータ型</p>
<p id="exp">asort　：　関数名</p>
<p id="exp">array、int　：　引数のデータ型</p>
<p id="exp">$array、$sort_flags　：　仮引数</p>
<p id="exp">SORT＿REGULAR　：　デフォルト型</p>
<br />


<div id="table">
<p>表5.2 データ型（リファレンスでの表記）</p>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
<tr><td><span style="font-weight:bold;">データ型</span></td><td><span style="font-weight:bold;">概要</span></td></tr>
<tr><td>array</td><td>配列型</td></tr>
<tr><td>bool</td><td>真偽型（TRUE | FALSE）</td></tr>
<tr><td>callback</td><td>関数（6.4.3で解説）</td></tr>
<tr><td>float</td><td>浮動小数点型</td></tr>
<tr><td>int</td><td>整数型</td></tr>
<tr><td>mixed</td><td>複数のデータ型を返す可能性がある（戻り値の場合）、または複数のデータ型を指定できる（引数の場合）</td></tr>
<tr><td>object</td><td>オブジェクト型</td></tr>
<tr><td>resorce</td><td>リソース型</td></tr>
<tr><td>string</td><td>文字列型</td></tr>
<tr><td>void</td><td>戻り値が無い型</td></tr>
</table>
<div>

<br />
<p id="exp">このうち、callback、number、mixed、voidはドキュメント表記上の擬似的な型で、戻り値を返さない場合、戻り値のデータ型はvoidと表記される。また、関数によっては、たとえば処理に成功した場合にはFALSEを返すようなものもあり、このような関数も戻り値はmixedと表記される。引数として文字列（string）、配列（array）など異なる型を渡せる場合にもmixedと表記される。</p>

<br />
<div id="exercises">
	<div id="constbk"><span id="const">練習問題</span><span id="exNo">5.1</span>
	</div>
	<div id="exCont">
		<p>1.次の文章は、構文「<pre class="brush: php">array explode (string $sep, string $str [, int $limit])
	</pre>」を説明したものです。</p>
<br />
		<p><span style="color: deepPink;">explode</span>関数は、引数として$sep、$str、$limitを受け取ります。<br />このうち、引数<span style="color: #A70;">$limitr</span>は省略可能です。戻り値のデータ型は<span style="font-weight:bold;">配列型</span>です。</p><br />
	</div>
</div>
<br />
<div id="memo">
<p><span style="font-weight:bold;">explode( )</span><br />
引数の文字列を指定した文字で区切ります。分割された文字列は配列として返されます。区切りも自我からの場合には、falseを返します。
戻り値の配列の最大インデックス数を指定した場合で、最大インデックスよりも分割した文字列の数が多い場合には、配列の最後のインデックスに残りすべてを含みます
<pre class="brush: php">
$banban = explode(",", "HTML,XHTML,XML,XSLT,RSS");
    print($banban[3]);
	
</pre>
<span style="font-weight:bold;">実行結果：</span>
<?php
$banban = explode(",", "HTML,XHTML,XML,XSLT,RSS");
    print($banban[3]);
?>
</p>
</div>


<br />
<br />
<h2><a name="5">5.2 文字列関数</a></h2>
<br />
<p id="exp">・文字列関数は、文字列の加工や整形、部分文字列の検索/取得など、文字列の操作に広く関わる機能を提供する。</p>
<p id="exp">・文字列関数には、<br /><span style="font-weight:bold;">　標準の文字列関数</span><br /><span style="font-weight:bold;"> 　日本語に対応したマルチバイト文字列関数</span><br />とがある</p>
<br />
<hr />
<h3><a name="6">5.2.1 マルチバイト文字列の設定</a></h3>
<hr />
<br />
<div id="table">
<p>表5.3 php.iniの設定（出力がShift_JISである場合）</p>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
<tr><td><span style="font-weight:bold;">パラメータ</span></td><td><span style="font-weight:bold;">推奨値</span></td></tr>
<tr><td>output_buffering</td><td>On</td></tr>
<tr><td>output_handler</td><td>mb_output_handrlar</td></tr>
<tr><td>fefault_charset</td><td>Shift_JIS</td></tr>
<tr><td>mb_string.language</td><td>Japanese</td></tr>
<tr><td>mbstring.internal_encording</td><td>UTF-8</td></tr>
<tr><td>mbstring.http_input</td><td>auto</td></tr>
<tr><td>mbstring.http_output</td><td>SJIS</td></tr>
<tr><td>mbstring.oncording_translation</td><td>On</td></tr>
<tr><td>mbstring.detect_orlder</td><td>SJIS, UTF-8, EUC-JP, JIS, ASCII</td></tr>
<tr><td>mbstring.substitute_character</td><td>none</td></tr>
</table>
<div>

<br />
<hr />
<h3><a name="7">5.2.2 文字列の長さを取得する --- mb_strlen関数</a></h3>
<hr />
<p id="exp">mb_strlen関数は、与えられた文字列の長さを取得します。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">mb_strlen関数</span>
  </div>
  <div id="cont">
    <p><pre class="brush: php">
int mb_strlen (string $str [, string $enc])
	
</pre>
<span style="font-style:oblique;">$str</span>　：　任意の文字列<br /><span style="font-style:oblique;">$enc</span>　：　使用するエンコーディング
</p>
  </div>
</div>
<br />
<div id="study">
<h4>[ リスト 5.1 ] mb_strlen.php</h4>
<pre class="brush: php">
$str = 'WINGSプロジェクト';
print mb_strlen($str);
	
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str = 'WINGSプロジェクト';
print mb_strlen($str);
?>
</div>
<br />
<a href="#13">5.2.8へ ≫ </a>

<br />
<br />
<hr />
<h3><a name="8">5.2.3 文字列を大文字⇔小文字で変換する<br />── strtolower / strtoupper関数</a></h3>
<hr />
<br />
<p id="exp">指定された文字列を小文字から大文字に変換する　：　strtolower関数<br />指定された文字列を大文字から小文字に変換する　：　strtoupper関数</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">strtolower / strtoupper関数</span>
  </div>
  <div id="cont">
    <pre class="brush: php">
    string strtolower (string $str)
    string strtoupper (string $str)
	
      $str : 任意の文字列
	
    </pre>
  </div>
</div><!--/#construction-->
<br />
<p id="exp">その他、先頭文字だけを大文字にするucfirst、逆に先頭だけを小文字にするlcfirst関数、さらに単語に区切りをすべて大文字にするucwords関数などもある。uc は「Upper Case = 大文字」、lc は「Lower Case = 小文字」の略。<br />以下、具体例</p>
<br />
<div id="study">
<h4>[ リスト 5.2 ] strtolower.php</h4>
<pre class="brush: php">
print strtolower ('WINGS プロジェクト');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print strtolower ('WINGS プロジェクト');
?>
<pre class="brush: php">
print strtoupper ('wings プロジェクト');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print strtoupper ('wings プロジェクト');
?>
<pre class="brush: php">
print ucfirst ('wings project');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print ucfirst ('wings project');
?>
<pre class="brush: php">
print ucwords('wings project');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print ucwords('wings project');
?>
</div><!--/#study-->
<br />

<p id="exp">アルファベット以外の文字が混在している場合には、アルファベットだけが変換の対象となります。<br />但し、アルファベットが全角文字（マルチバイト文字）として表記されている場合には strtolower / strtoupper関数でなく、マルチバイト対応のmb_strtolower / mb_strtoupper関数を利用する必要がある。</p>

<br />
<div id="study">
<h4>[ リスト 5.3 ] mb_strtolower.php</h4>
<pre class="brush: php">
print strtolower ('ＷＩＮＧＳ プロジェクト');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print strtolower ('ＷＩＮＧＳ プロジェクト');
?>
<pre class="brush: php">
print mb_strtolower ('ＷＩＮＧＳ プロジェクト');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print mb_strtolower ('ＷＩＮＧＳ プロジェクト');
?>
</div>

<br />
<br />
<hr />
<h3><a name="9">5.4.2 部分文字列を取得する ── mb_substr関数</a></h3>
<hr />
<p id="exp">mb_substr関数は、元の文字列から部分的な文字列を取り出します。</p>

<br />

<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">mb_substr関数</span>
  </div>
  <div id="cont">
    <pre class="brush: php">
    string mb_subtr(string $str, int $str [, int $len [, string $enc]])
    </pre>
    <p>$str : 任意の文字列<br />
      $strart : 取得開始位置（文字開始は 0 スタート）　$len : 取り出す文字数<br />
      $enc : 使用する文字エンコーディング（省略時は内部文字エンコーディング）
    </p>
  </div>
</div>


<div id="study">
<h4>[ リスト 5.4 ] mb_substr.php</h4>
<pre class="brush: php">
$str = 'WINGS プロジェクト';
print mb_substr($str, 5, 2);
print mb_substr($str, 5);
print mb_substr($str, 5, 4);
print mb_substr($str, -6, 2);
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str = 'WINGS プロジェクト';
print mb_substr($str, 5, 2);
print mb_substr($str, 5);
print mb_substr($str, 5, 4);
print mb_substr($str, -6, 2);
?>
</div>
<br />
<hr />
<h3><a name="10">5.2.5 部分文字列を置換する</a></h3>
<hr />
<p id="exp">文字列に含まれる特定の部分文字列を別の文字列で置き換えるには、str_replace関数を利用します。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">str_replace関数</span>
  </div>
  <div id="cont">
    <pre class="brush: php">
    mixed str_replace (mixed $src, mixed $rep mixed $str [, int &cnt])
    </pre>
    <p>$src : 置き換える部分文字列<br />$rep : 置き換え後の文字列<br />$str : 対象の文字列<br />&$cnt : 置き換えた文字列の個数を格納する変数</p>
  </div>
</div>
<br />
<div id="study">
<h4>[ リスト 5.5 ] str_replace.php</h4>
<pre class="brush: php">
$str = ' にわにはにわにわとりがいる ';
print str_replace( 'にわ' , 'ニワ' , $str, $cnt ). '<br />';
print "{$cnt}個の置き換えをしました。"
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str = ' にわにはにわにわとりがいる ';
print str_replace( 'にわ' , 'ニワ' , $str, $cnt ). '<br />';
print "{$cnt}個の置き換えをしました。"
?>
</div>

<br />

<div id="memo">
<p>引数&$cntは、（他の引数とは異なり）処理結果を受け取るための引数です。出力を目的とした引数と言ってもいいでしょう。str_replace関数の結果、置き換えられた箇所の個数がここで指定した変数に格納されます。構文で引数の頭に「＆」のあるのは、引数が参照渡しで受け渡すことを意味しています。引数の参照渡しについては、改めて<a href="http://afternoon-tea.heteml.jp/test/matsumoto/site/input_2.php#10" target="_blank">6.3.2項</a>でも解説します。</p>
</div>
<br />
<p id="exp">引数$src、$rep、$strには、それぞれ配列を渡すこともできます。（リスト 5.6）</p>
<br />
<div id="study">
<h4>[ リスト 5.6 ] str_replace.php</h4>
<pre class="brush: php">
$str = array('PHPは良い言語です。','PHPは良いサーバ実行環境です。');
$src = array('PHP','良い');
$rep = array('PHP 5','素晴らしい');
print_r(str_replace($src, $rep, $str, $cnt));
print"{$cnt}個の置き換えをしました。";
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str = array('PHPは良い言語です。','PHPは良いサーバ実行環境です。');
$src = array('PHP','良い');
$rep = array('PHP 5','素晴らしい');
print_r(str_replace($src, $rep, $str, $cnt));
print"{$cnt}個の置き換えをしました。";
?>
</div>
<br />
<div id="memo">
<p>まず、引数$strに配列を指定した場合、戻り値も配列となります（戻り値のデータ型がmixedになっていたのもこのためです）。ただし、引数&$cntには（配列ではなく）あくまで置換箇所の「総数」がセットされる点に注意が必要です。引数$src、$repに配列を指定した場合、原則として両者の要素数は等しくなければなりません。要素数が異なってもエラーにはなりませんが、$srcの要素数が$repの要素数より少ない（$src < $rep）場合、余った$repの内容は無視されます。逆に$src > $repである場合、対応する要素のない$srcの要素は空文字列で置換されます。</p>
</div>
<br />
<div id="notebox">
<p><span id="note">Note</span></p>
<p>文字列の大文字/小文字を区別しないstr_ireplace関数もあります。str_ireplace関数の構文はstr_replace関数と同じです。</p>
</div>
<br />
<br />
<hr />
<h3><a name="11">5.2.6 文字列を特定の区切り文字で分割する</a></h3>
<hr />
<p id="exp">文字列を特定の区切り文字で分割するには、explode関数を利用します。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">explode関数</span>
  </div>
  <div id="cont">
    <pre class="brush: php">
    array expode(string $delimiter, string $str [,int $limit])
    </pre>
    <p>$delimiter：区切り文字<br />$str：分割する文字列<br />$limit：分割の最大数（デフォルトは制限なし）</p>
  </div>
</div>
<br />
<p id="exp">以下、具体例</p>
<div id="study">
<h4>[ リスト 5.7 ] explode.php</h4>
<pre class="brush: php">
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data));
    //①Array ( ([0] => リオ [1] => ニンザブロウ [2] => ナミ [3] => リンリン )
print_r(explode('や', $data));
    //②Array ( [0] => リオとニンザブロウとナミとリンリン )
print_r(explode('や', $data, 2));
    //③Array ( [0] => リオ [1] => ニンザブロウとナミとリンリン) 
print_r(explode('や', $data, -2));
    //④Array ( [0] => リオ [1] => ニンザブロウ )
</pre>

<span style="font-weight:bold;">実行結果：</span><br />
<?php
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data));
print_r(explode('や', $data));
print_r(explode('と', $data, 2));
print_r(explode('と', $data, -2));
?>
<br />
<br />
<div id="memo">
<p id="exp">①：最もスタンダードな例です。引数$limitが指定しない場合には、文字列全体に対して無条件に分割処理が行われ、その結果が配列に格納されます。</p>
<pre class="brush: php">
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data));
</pre>
<?php
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data));
?>
</div>
<br />
<div id="memo">
<p id="exp">②：区切り文字（$delimiter）が文字列（＄str）に含まれない場合、expode関数は元の文字列をそのまま要素一つの配列として返します。</p>
<pre class="brush: php">
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('や', $data));
</pre>
<?php
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('や', $data));
?>
</div>
<br />
<div id="memo">
<p id="exp">③：引数$limitを指定した例です。この場合、explode関数は$limitの指定数を上限に分割処理を行います。最後の要素には、分割されなかったすべての文字列が含まれる点に注意してください。</p>
<pre class="brush: php">
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data, 2));
</pre>
<?php
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data, 2));
?>
</div>
<br />
<div id="memo">
<p id="exp">④：引数に負数を指定することも出来ます。この場合、explode関数は最後の$lomit個（絶対値）を除く分割結果を返します。</p>
<pre class="brush: php">
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data, -2));
</pre>
<?php
$data = 'リオとニンザブロウとナミとリンリン';
print_r(explode('と', $data, -2));
?>
</div>
</div>
<br />
<br />
<hr />
<h3><a name="12">5.2.7 特定の文字列を検索する</a></h3>
<hr />
<p id="exp">ある文字列の中で特定の部分文字列が登場する文字位置を取得するには、mb_strpos / mb_strrpos関数を利用します。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">mb_strpos / mb_strrpos関数</span>
  </div>
  <div id="cont">
    <pre class="brush: php">
    int mb_strpos( string $str, string $substr [ , int $off [ , string $enc] ])
    int mb_strrpos( string $str, string $substr [ , int $off [ , string $enc] ])
    </pre>
    <p>$str：検索対象の文字列<br />$substr：検索文字列<br />$off：検索開始位置<br />$enc：使用する文字エンコーディング（省略時は文字内部エンコーディング）</p>
  </div>
</div>
<br />
<div id="memo">
<p>mb_strpos関数とmb_strrpos関数との違いは、検索文字列が最初に現れた位置を返すか（mb_strpos関数）、最後に現れた位置を返すか（mb_strrpos関数）です。mb_strpos / mb_strrpos関数のいずれも部分文字列が見つからなかった場合にはFALSEを、見つからなかった場合には先頭文字を0とした場合の文字列を返します。引数$offは検索の開始位置を表します（デフォルトは文字列の先頭）。ただし、mb_strrpos関数で負数を指定した場合は文字列末尾からの文字数と見なされ、関数はその位置で検索を終了します。mb_strpos関数では負数を指定できません。</p>
</div>
<br />
<p id="exp">以下、具体例</p>
<div id="study">
<h4>[ リスト 5.8 ] mb_strpos.php</h4>
<pre class="brush: php">
$str = 'にわにはにわにわとりがいる';
print mb_strpos ($str , 'にわ');
    // 結果：0
print mb_strpos ($str , 'にわ' , 2);
    // 結果：4
print mb_strpos ($str , 'かに');
    // 結果：FALSE
print mb_strrpos ($str , 'にわ');
    // 結果：6
print mb_strrpos ($str , 'にわ',-8);
    // 結果：4
</pre>
</div>



<pre class="brush: php">
$str = 'にわにはにわにわとりがいる';
print mb_strpos ($str , 'かに');
    // 結果：0
</pre>

<p id="exp"><span style="color: deepPink;">ちゃんと動かない！</span></p>


<div id="study">
<h4>[ リスト 5.9 ] mb_strpos2.php</h4>
<pre class="brush: php">
$str2 = 'にわにはにわにわとりがいる';
if (mb_strpos($str, 'には') != FALSE){
    print '文字列が見つかりました。';
}    //結果：なにも表示されない
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str2 = 'にわにはにわにわとりがいる';
if (mb_strpos($str2, 'には') != FALSE){
    print '文字列が見つかりました。';
}
?>
</div>
…スルー
<br />
<br />
<hr />
<h3><a name="13">5.2.8 文字列を整形する ── printf関数</a></h3>
<hr />
<br />
<p id="exp">printf関数は、指定された書式文字列に基づいて文字列を整形し、その結果を出力します<br />
（戻り値は、整形済みの文字列のバイト数）。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">printf関数</span>
  </div>
  <div id="cont">
    <p></p>
    <pre class="brush: php">
int printf ( string $format [, mixed $args [ , …… ] ] )
    $format : 書式文字列<br />
    $args : 書式の埋め込む文字列
    </pre>
  </div>
<br />
<p id="exp">書式文字列$formatには、変換指定子と呼ばれるプレイスホルダを埋め込むことが出来ます。プレイスホルダとは、引数$arg……で指定された文字列を埋め込む場所と考えればよいでしょう。書式文字列で変換指定子以外の部分はそのまま出力されます。</p>
<br />
<p id="exp">変換指定子は「%各種指定子」の形式であらわすすことができます。変換指定子に含めることができる指定子には、表5.4に示すものがあります（表に示した順序で指定します。）</p>
</div>
<br />
<div id="table">
 <caption>表5.4 変換指定子に含めることができる指定子</caption>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
 <tr>
  <th><span style="font-weight:bold;">指定子</span></th>
  <th colspan=2><span style="font-weight:bold;">概要</span></th>
 </tr>
 <tr>
  <td>符号指定子</td>
  <td colspan=2>数値に付与する符号（+、-）を指定（負数にはデフォルトで「-」が付くので、正確に「+」を強制的に付けるのに使用）</td>
 </tr>
 <tr>
  <td>パディング指定子</td>
  <td colspan=2>不足している桁を埋めるための文字（デフォルトは空白）</td>
 </tr>
 <tr>
  <td>アライメント指定子</td>
  <td colspan=2>「-」を指定した場合には左寄せ（デフォルトは右寄せ）</td>
 </tr>
 <tr>
  <td>表示幅指定子</td>
  <td colspan=2>全体の表示桁数</td>
 </tr>
 <tr>
  <td>精度指定子</td>
  <td colspan=2>小数点以下の桁数（直前に表示幅指定子との区切りを表す「.」が必要）</td>
 </tr>
 <tr>
  <td>型指定子</td>
  <td colspan=2>引数の型</td>
 </tr>
 <tr>
  <td rowspan=13><br /></td>
  <td><span style="font-weight:bold;">型　　　</span></td>
  <td><span style="font-weight:bold;">概要</span></td>
 </tr>
 <tr>
  <td>%</td>
  <td colspan=2>パーセント文字</td>
 </tr>
 <tr>
  <td>b</td>
  <td colspan=2>引数を整数と見なし、2進数として表現</td>
 </tr>
 <tr>
  <td>c</td>
  <td colspan=2>引数を整数と見なし、ASCII値の文字として表現</td>
 </tr>
 <tr>
  <td>d</td>
  <td colspan=2>引数を整数と見なし、10進数として表現</td>
 </tr>
 <tr>
  <td>e</td>
  <td colspan=2>引数を指数表現として処理</td>
 </tr>
 <tr>
  <td>u</td>
  <td colspan=2>引数を整数と見なし、符号なし10進数として表現</td>
 </tr>
 <tr>
  <td>f</td>
  <td colspan=2>引数をdoubleと見なし、不動少数点として表現</td>
 </tr>
 <tr>
  <td>F</td>
  <td colspan=2>引数をfloatと見なし、不動少数点として表現</td>
 </tr>
 <tr>
  <td>o</td>
  <td colspan=2>引数を整数と見なし、8進数として表現</td>
 </tr>
 <tr>
  <td>s</td>
  <td colspan=2>引数を文字列と見なして処理</td>
 </tr>
 <tr>
  <td>x</td>
  <td colspan=2>引数を整数と見なし、16進数（小文字）として表現</td>
 </tr>
 <tr>
  <td>X</td>
  <td colspan=2>引数を整数と見なし、16進数（大文字）として表現</td>
 </tr>
</table>
<div>

<br />
<br />

<p id="exp">「売上平均」をタイプミスしたら「売るage兵器」ってなった。売るage兵器</p>
<br />
<br />

<div id="memo">
<h4>[ リスト 5.10 ] printf.php①</h4>
<pre class="brush: php">
printf('%sは%sです。' , 'ニンザブロウ' , 'ハムスター');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
printf('%sは%sです。' , 'ニンザブロウ' , 'ハムスター');
?>
</div>
<br />
<p id="exp">最もシンプルなパターン。変換指定子 ( %s ) の箇所が引数 %args,……によって順番に置き換えられます。</p>
<br />
<br />
<div id="memo">
<h4>[ リスト 5.10 ] printf.php②</h4>
<pre class="brush: php">
printf('売上平均(前月比)：%+0-8.3f' , 0.198765);
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
printf('売上平均(前月比)：%+0-8.3f' , 0.198765);
?>
</div>
<br />
<p id="exp">やや複雑なパターンで、全ての指定子を指定しています。符号指定子「+」を指定することで、正数に対しても強制的に「+」記号が表示されるようになります。表示指定子は、符号や小数点を含めた表示桁を表す点に注意して下さい（いわゆる数字的な桁数ではありません）表示幅指定子は型指定子が文字列の場合にも有効です。アライメント指定子に「-」を指定した場合は、値が左寄せで表示されます。通常は右寄せで、その場合には「+000.199」のような結果が得られます。</p>
<br />
<br />
<div id="memo">
<h4>[ リスト 5.10 ] printf.php③</h4>
<pre class="brush: php">
printf("売上平均(前月比)：%'*10.3e" , 0.198765);
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
printf("売上平均(前月比)：%'*10.3e" , 0.198765);
?>
</div>
<br />
<p id="exp">パディング指定子に「*」を指定する例です。この場合、1.988e-1が10桁から2桁不足しているので2つの「*」で補われます。パディング指定子に「」(空白)、「0」以外の値を指定する場合、サンプルのように指定子の前に「’」を置く必要がある点に注意して下さい。（この例では「'*」）。型指定子に「e」を指定した場合、数値は指数表現に変換されます。繰り返しになりますが、表示幅指定子は指数表現を表す「E」などを含めた桁数を表します。</p>
<br />
<br />
<div id="memo">
<h4>[ リスト 5.10 ] printf.php④</h4>
<pre class="brush: php">
printf('%.6sは%sです。' , 'ニンザブロウ' , 'ハムスター');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
printf('%.6sは%sです。' , 'ニンザブロウ' , 'ハムスター');
?>
</div>
<br />
<p id="exp">文字列に精度指定子をつけた例です。この場合、文字列は強制的に指定桁数で切り捨てられます。なおここ指定している値は、（文字数ではなく）バイト数である点に要注意です。<a href="#7">5.2.2項</a>でも触れたように、UTF-8は1文字を3バイトで表現するので、「.6」は2文字を表します。（使用していつ文字コードによって異なります）。「.5」のような中途半端な数値を指定した場合には一部の文字が化ける原因にもなるので注意して下さい。</p>
<br />
<br />
<div id="memo">
<h4>[ リスト 5.10 ] printf.php⑤</h4>
<pre class="brush: php">
printf('%2$sは%1$sです。%2$s、大好き！' , 'ニンザブロウ' , 'ハムスター');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
printf('%2$sは%1$sです。%2$s、大好き！' , 'ニンザブロウ' , 'ハムスター');
?>
</div>
<br />
<p id="exp">引数args,…指定順ではなく、任意の順番で書式文字列に埋め込みたい場合の例です。これには「$」区切りでインデックス番号を指定して下さい（インデックス番号は1で始まります）。
<br />
<br />
<p id="exp">インデックス記号を埋め込むことで、書式文字列に含まれる変換指定子が（例えば）翻訳などによって順番が変わったとしても、引数$args…には影響が及ばすに済みます。また、インデックス指定によって同じ値を複数の箇所に埋め込めるようになる、というメリットもあります。</p>
<br />


<div id="memo">
<p>リスト5.10の例では、書式文字列をシングルクォートでくくっているので問題ありませんが、もしダブルクォートを使用している場合には「％2¥＄s」のようにエスケープしてください。そうでないと「＄」以降が変数展開のように解釈されてしまい、意図した結果になりません。</p>
</div>
<br />
<br />
<p id="exp">printf関数は、整形した文字列をそのまま出力しますが、整形した結果を文字列として返したい場合には、sprintf関数を使用して下さい。また、引数$args,…を配列として渡したい場合には、vprintf / vsprintf関数を利用することもできます。従って、次のコードはすべて意味的に等価です。</p>


<div id="study">
<pre class="brush: php">
printf('%sは%sです。', 'ニンザブロウ', 'ハムスター');
print sprintaf('%sは%s', 'ニンザブロウ', 'ハムスター');
vprintf('%sは%sです。', array('ニンザブロウ', 'ハムスター'));
printf vsprintf('%sは$sです。' array('ニンザブロウ','ハムスター'));
</pre>
</div>
<br />
<br />
<hr />
<h3><a name="14">5.2.9 文字列を変換する ── mb_convert_kana 関数</a></h3>
<hr />
<br />
<p id="exp">mb_convert_kana 関数を利用することで、マルチバイト文字列をひらがなからカタカナ、全角文字から半角文字に変換できます。少々変り種の機能ですが、エンドユーザーから入力された値に「ゆらぎ」があった場合にも、この関数を利用することで表記を揃えることができるでしょう。</p>
<br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">mb_convert_kana 関数</span>
  </div>
  <div id="cont">
    <p></p>
    <pre class="brush: php">
    string mb_convert_kana ( string $str [ , string $option [ , string $enc] ] )
    
    $str：任意の文字　$option：変換オプション(デフォルトは'KV')
    $enc：使用する文字エンコーディング(省略時は内部文字エンコーディング)
    </pre>
  </div>
</div>
<br />
<p id="exp">引数optionで設定できる変換オプションは表5.5の通りです(デフォルトは'KV')</p>
<br />

<div id="table">
<p>表5.5 引数optionに使用可能な主な変換オプション</p>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
<tr><td><span style="font-weight:bold;">オプション</span></td><td><span style="font-weight:bold;">概要</span></td></tr>
<tr><td>r</td><td>「全角」英文字→「半角」→英文字</td></tr>
<tr><td>R</td><td>「半角」英文字→「全角」→英文字</td></tr>
<tr><td>n</td><td>「全角」数字→「半角」数字</td></tr>
<tr><td>N</td><td>「半角」数字→「全角」数字</td></tr>
<tr><td>a</td><td>「全角」英数字→「半角」英数字</td></tr>
<tr><td>A</td><td>「半角」英数字→「全角」英数字</td></tr>
<tr><td>s</td><td>「全角」スペース→「半角」スペース</td></tr>
<tr><td>S</td><td>「半角」スペース→「全角」スペース</td></tr>
<tr><td>k</td><td>「全角」カタカナ→「半角」カタカナ</td></tr>
<tr><td>K</td><td>「半角」カタカナ→「全角」カタカナ</td></tr>
<tr><td>h</td><td>「全角」ひらがな→「半角」ひらがな</td></tr>
<tr><td>H</td><td>「半角」ひらがな→「全角」ひらがな</td></tr>
<tr><td>c</td><td>「全角」カタカナ→「半角」ひらがな</td></tr>
<tr><td>C</td><td>「半角」カタカナ→「全角」ひらがな</td></tr>
<tr><td>V</td><td>濁点付きの文字を1文字に変換（K、Hと合わせて使用）</td></tr>
</table>
<div>
<br />
<p id="exp">例えば「ＷＩＮＧＳﾌﾟﾛｼﾞｪｸﾄ」を「WINGSプロジェクト」に変換したければ。リスト5.11のように記述します。</p>
<br />
<div id="study">
<h4>[ リスト 5.11 ] mb_convert_kana.php</h4>
<pre class="brush: php">
$str = 'ＷＩＮＧＳﾌﾟﾛｼﾞｪｸﾄ';
print mb_convert_kana ($str, 'RKV');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
$str = 'ＷＩＮＧＳﾌﾟﾛｼﾞｪｸﾄ';
print mb_convert_kana ($str, 'RKV');
?>
</div>
<br />
<p id="exp">変換オプションは、互いに矛盾しない範囲で組み合わせて指定することができます。</p>
<br />
<br />
<hr />
<h3><a name="15">5.1.10 文字エンコーディングを変換する-mb_convert_encoding / mb_convert_variable関数</a></h3>
<hr />
<br />
<p id="exp">2.1.2項でも述べたように、マルチバイト文字（日本語）を扱う場合、文字コードを意識しないでいることはできません。無用な混乱を防ぐためにも、アプリケーション内で使用する文字エンコーディングは統一しておくのが原則ですが、データベースやテキストファイルを他のアプリケーションと共有しているような場合には必ずしも文字エンコーディングを統一できない場合も同じでしょう。そのような場合には、アプリケーション側で明示的に文字エンコーディングを変換する必要があります。文字エンコーディング変換の機能を提供するのは、mb_convert_enording関数の役割です。</p><br />
<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">mb_convert_encoding関数</span>
  </div>
  <div id="cont">
    <p></p>
    <pre class="brush: php">
    string mb_convert_encorong（string $str , string $to [ , mixed $from]）
    
    $str：任意の文字数　$to：変換後の文字コード
    $from：変換前の文字コード（デフォルトは内部文字エンコーディング）
    </pre>
  </div>
</div>
<br />
<p id="exp">マルチバイト文字列関数は多くの文字エンコーディングに対応していますが、日本語を利用するなら、まずはSJIS、SJIS-win、EUC-JP、ISO-2022-JP、JIS、UTF-8、UTF-16、UTF-32あたりから選択することになるでしょう。SJIS-winは、「～」のようなWindows固有の機種依存文字を含んだSJISです。<br />引数$fromには、可能性のある文字コードを「UTF-8,SJIS,EUC-JP」のようにカンマ区切りの文字列、もしくは配列として指定出来ます。<br />例えばリスト5.12は与えられた文字列をEUC-JPに変換するためのコードです。変換前の文字コードはUTF-8→SJIS→JISの順番で検出するものとします。</p>
<br />
<div id="study">
<h4>[ リスト 5.12 ] mb_convert_encoding.php</h4>
<pre class="brush: php">
print mb_convert_encoding('こんにちは、赤ちゃん！', 'EUC-JP', 'UTF-8 , SJIS , JIS');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print mb_convert_encoding('こんにちは、赤ちゃん！', 'EUC-JP', 'UTF-8, SJIS, JIS');
?>
</div>
<br />
<p id="exp">結果は文字化けするはずなので、ブラウザの文字エンコーディングをEUCに変換してください。正しく文字列が表示されれば、文字エンコーディングがEUC-JPに変換されています。<br />配列やオブジェクト（後述）のような複合型の値を変換したい場合には、mb_convert_variables関数を利用することもできます。</p>




































	<p id="back-top"><!--#back-top-->
	<a href="#top"><span></span></a>
	</p><!--/#back-top-->
		</div><!--/#wrapper-->
	</div><!--/#containe-->

</body>
</html>





<!--/#construction-->
<!--/#study-->
<!--/#notebox-->
<!--/#memo-->
<!--/#table-->
<!--/#exercises-->

<!--テンプレ
<h1><a name="*">***</a></h1>

<h2><a name="*">*.* ****</a></h2>

<hr />
<h3><a name="*">*.*.* ***-***</a></h3>
<hr />

<p id="exp">***</p>
<p id="exp"><span style="color: deepPink;">***</span></p>

<div id="construction">
  <div id="constbk">
    <span id="const">構文</span><span id="title">***</span>
  </div>
  <div id="cont">
    <p></p>
    <pre class="brush: php">
    ***
    </pre>
  </div>
</div>

<div id="study">
<h4>[ リスト *.* ] ***.php</h4>
<pre class="brush: php">
***
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
?>
</div>

<div id="notebox">
<p><span id="note">Note</span><span>***</span></p>
<br />
<p>***</p>
</div>

<div id="memo">
<p>***</p>
</div>

<div id="table">
<p>表*.* </p>
<hr size="2" color="#0000ff" noshade>
<table border="1" width="700" rules="rows" frame="below" >
<tr><td><span style="font-weight:bold;">***</span></td><td><span style="font-weight:bold;">***</span></td></tr>
<tr><td>***</td><td>***</td></tr>
<tr><td>***</td><td>***</td></tr>
<tr><td>***</td><td>***</td></tr>
<tr><td>***</td><td>***</td></tr>
<tr><td>***</td><td>***</td></tr>
<tr><td>***</td><td>***</td></tr>
</table>
<div>

<div id="exercises">
	<div id="constbk"><span id="const">練習問題</span><span id="exNo">***</span>
	</div>
	<div id="exCont">
		<p>***</p>
	</div>
</div>

テンプレ-->



<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />


<pre class="brush: php">
print lcfirst ('WINGS PROJECT');
</pre>
<span style="font-weight:bold;">実行結果：</span><br />
<?php
print lcfirst ('WINGS PROJECT');
?>



