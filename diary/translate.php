<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
	<title>Translate</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"></meta>
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<meta name="author" content="Kiyoshi Hiramatsu"/>
	<meta name="Reply-to" content="kyo@hiramatsu.be"/>
	<meta name="Description" content="Kiyoshi Hiramatsu's Diary"/>
	<meta name="copyright" content="Copyright(C)2002 hiramatsu.be"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Cache-Control" content="no-cache"/>
	<meta name="robots" content=none">
	<link rel="stylesheet" href="general.css" type="text/css" media="all"/>

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load("language", "1");
		// 画面初期化時に言語選択ボックスを作成する
		function init() {
			var langList = document.getElementById("target-language");
			// (1) Language APIで使える言語をループしてリストに表示
			for (var lang in google.language.Languages) {
				var langOpt = new Option(lang, google.language.Languages[lang]);
				langList.options[langList.options.length] = langOpt;
			}
		}
		// body.onload時にinit()が呼ばれるようにする
		google.setOnLoadCallback(init);

		function translate() {
			var source = document.getElementById("source").value;
			// (2) 入力された文字列から、言語を自動的に判別する
			google.language.detect(source, function (detectResult) {
				if (detectResult.error) {
					alert("Error:" + error.message);
					return;
				}
				// 選択されている言語を取得
				var langList = document.getElementById("target-language");
				targetLang = langList.options[langList.selectedIndex].value;
				// 翻訳
				google.language.translate(
						source,
						detectResult.language,
						targetLang,
						function (result) {
							if (result.error) {
								alert("Error:" + result.message);
								return;
							}
							document.getElementById("result").value = result.translation;
						});
			});
		}
	</script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-25509634-1']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>
</head>
<body bgcolor="#ffffff" text="#000000">
<?php
mysqli_query("set names utf8");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" valign="top" class="title">Translate</td>
	</tr>
	<tr>
		<td width="185" valign="top">
			<div>
				<?php include("inc_diary_menu.php"); ?>
			</div>
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/></td>
		<td width="100%" valign="top">
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td>
						<textarea rows="8" cols="100" id="source"></textarea>
					</td>
				</tr>
				<tr>
					<td align="left">
						<select id="target-language"></select>　
						<button onclick="translate()">翻訳</button>
					</td>
				</tr>
				<tr>
					<td>
						<textarea rows="8" cols="100" id="result"></textarea>
					</td>
				</tr>
			</table>
			<div class="copyright"><?php include("../copyrights.txt") ?></div>
		</td>
	</tr>
</table>
<script type="text/javascript" src="http://i.yimg.jp/images/analytics/js/ywa.js"></script>
<script type="text/javascript">
	var YWATracker = YWA.getTracker("1000210685304");
	YWATracker.addExcludeProtocol("file:");
	YWATracker.submit();
</script>
<noscript>
	<div><img src="http://by.analytics.yahoo.co.jp/p.pl?a=1000210685304&js=no" width="1" height="1" alt=""/></div>
</noscript>
</body>
</html>
