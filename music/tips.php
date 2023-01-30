<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tips for degitize</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="general.css" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="185" valign="top" nowrap="NOWRAP" class="bgc_gray2"> <? include("inc_compose_menu.php"); ?> </td>
	<td width="10" valign="top">&nbsp;</td>
	<td width="100%" valign="top">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
	<td><h1>音の量子化ギグ</h1>
	  <h2> 第一回</h2>
	  <h2> ■Pro Tools FREE -- Getting started</h2>
	  <h3 class="H1"> -- 史上最強のレコーディング用フリーウエア Pro Tools FREE を使ってみよう。-- </h3>
	  <p>2002年の3月、某メーカからコピーコントロールCDが発売されました。その有効性や音質に与える影響はさておき、今後各社から発売されるCDは、この様なコピーコントロール付きが主流になるかもしれません。<br />
		Macintoshには、よくできた音楽用アプリケーションiTunesがありますよね。CDを入れれば簡単にリッピングしてくれ、MP3にエンコードしてくれます。iPodと組み合わせてこの機能を日頃から活用している方も多いことでしょう。ところが、CDにコピーコントロールが付くとこの様なことができなくなる可能性が高いのです。<br />
		それではコピーコントロールが働くと、もうCDをコピーしたりMP3にできなくなるのでしょうか？　それは「はい」であり「いいえ」でもあります。　「はい」は、PCではディジタルからディジタルへのコピーはできなくなるということ。　「いいえ」は、CDプレーヤーからのアナログ出力をPCでディジタル録音すれば、コピーやMP3への変換は可能ということです<br />
		もちろん手間もかかりますし、音質も少しは落ちるかもしれませんが、著作権法第30条「私的使用のための複製」の許される範囲でプロテクトのかかったCDをコピーしたりMP3にするには、この方法しかなくなるかもしれないのです。<br />
		そうならないことを祈りつつ、そんな不便な未来に備えて、Digidesign社のフリーウエアPro Tools FREEを使ってMacintoshでのディジタル録音の方法を説明してみましょう。</p>
	  <p> 初めてディジタル録音される方には多少敷居の高いアプリケーションかもしれませんので、今号では何か1曲録音して、それにイフェクトをかけるまでをスナップショットを入れながら、詳しく説明したいと思います。　もっと高度な使い方は次回以降ご期待ください。</p>
	  <h4>◆Digidesign Pro Tools FREE Softwareの入手方法とインストール</h4>
	  <p>Digidesign社トップページ　http://www.digidesign.com/　 ページ下段のナビゲーションバーより [ Get 
		Pro Tools FREE ] をクリック、該当ページより [ Download Pro Tools FREE for Macintosh 
		] をクリックして必要事項を記入しPro Tools FREEをダウンロードします。<br />
		この時一緒に　OMS 2.3.8もダウンロードします。<span class="red">*1</span></p>
	  <p class="notes">*1.　MIDI機器を使わないかぎりOMSは必要ありませんが、OMSがインストールされていないとPro Tools 
		FREEを起動できません。 </p>
	  <p>インストーラがダウンロードできたらPro Tools FREEとOMS 2.3.8をインストールします。<br />
		インストールできたら、ダイアログに従って再起動します。<br />
		再起動後、OMS 2.3.8の設定用ダイアログが起動しますが、今回は何も設定しなくてもかまいません。[Scan]ボタンを押してスキャンが終わったら 
		[ok] を押してください。</p>
	  <h4>◆ハードウエアの設定。</h4>
	  <p>ここでは一番簡単な接続を想定して説明します。一番簡単な接続とは、CDプレーヤーのアナログアウトをMacintoshのオーディオINに接続する場合です。<span class="red">*2</span>　皆さんの環境に合わせて、読み替えてください。</p>
	  <p class="notes">*2. 最近のMacintoshには、オーディオのInput端子が付いていないので、そのような機種の場合はUSBのオーディオインターフェイスなどが必要になります。</p>
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td valign="top" class="pad"> 
<p>サウンドコントロールパネルの入力で「サウンド入力ポート」を選択します。　「出力装置を通して音を再生する」と「信号レベルチェック｣にチェックを入れます。　CDを再生するとMacintoshから音が出てきたでしょう。</p>
			<p> CDを再生して、ほぼ一番大きな音量と思われるところでレベルメータの赤い部分が一つ点灯する位にゲインを調節します。</p>
			<p>&nbsp;</p>
			<p>これで事前の準備は完了です。　早速Pro Tools FREEを起動して録音してみましょう。</p></td>
		  <td><img src="images/1.gif" alt="サウンドコントロールパネルの入力" width="411" height="374" /></td>
		</tr>
	  </table>
	  <h4>◆とりあえずの設定と実際の録音</h4>
	  <p>Pro Tools FREEを起動し、「File」メニューから「New Session...」を選びます。　ダイアログに従って名前をつけて適当な場所にセーブします。　bit 
		depth を聞いて来ますので、自分の環境に合わせて　16bitか24bitかを選択します。　<br />
		Macintosh単体で録音する場合は、16bitを選びます。</p>
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td valign="top" class="pad">次に「File」メニューから「New Track...」を選びます。　ダイアログが出てきますので、Create 
			[2] new [Audio Track] として2つのオーディオトラックを作ります。</td>
		  <td><img src="images/2.gif" alt="「New Track...」" width="326" height="153" /></td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td valign="top"><p>「Windows」メニューから「Show Mix」を選び Mixウインドウを表示させます。<span class="red">（右図）</span></p>
			<hr size="1" />
			<table width="355" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
				<td align="center"><img src="images/4.gif" alt="[Mix Groups]" width="355" height="278" /></td>
			  </tr>
			  <tr>
				<td class="pad">フェーダーの下の [Audio1] [Audio2] の部分がハイライトされているのを確認したら、Mixウインドウ左端真ん中にある 
				  [Mix Groups] ボタンを押します。ダイアログ出てきますので、Name of Group に適当な名前をつけ、Group 
				  Type:[Edit and Mix] Group ID:[a] を選択して [ok] を。</td>
			  </tr>
			</table>
			<hr size="1" />
			<table width="391" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
				<td><img src="images/5.gif" alt="チャンネルに名前" width="391" height="274" /></td>
			  </tr>
			  <tr>
				<td class="pad">各チャンネルのフェーダーの上にあるpanスライダーを、[Audio1] は、左に目一杯、[Audio2]は、右に目一杯スライドさせます。<br />
				  ここで、[Audio1] [Audio2]となっている2つのチャンネルに名前をつけましょう。<br />
				  まず、[Audio1]の部分をダブルクリックするとダイアログが出てきますので、名前をLにでもしておきます。（自分の好きな名前でかまいません)　同じく[Audio2]は、Rとします。</td>
			  </tr>
			</table>
		  </td>
		  <td align="center" valign="top"><img src="images/3.gif" alt="Mixウインドウ" width="249" height="641" /></td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td valign="top"><p>それでは、L、Rとも先ほど使ったpanスライダーの上にある[rec]ボタンを押します。　ここでCDを再生すると...　どうです？　あなたのマックからCDの音が聞こえてきたでしょう。<span class="red">（右図）</span></p>
			<hr size="1" />
			<table width="260" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
				<td align="center"><img src="images/7.gif" width="259" height="95" /></td>
			  </tr>
			  <tr>
				<td class="pad">録音準備完了です。　コントロールウインドウの一番右にある録音ボタンを押して録音待機状態にして、好きな曲をスタートさせたら、再生ボタンを押して録音開始です。</td>
			  </tr>
			</table>
			<p>&nbsp;</p></td>
		  <td><img src="images/6.gif" alt="[rec]ボタン" width="214" height="320" /></td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td align="center"><img src="images/8.gif" alt="波形が現れ" width="640" height="409" /></td>
		</tr>
		<tr> 
		  <td align="center">録音が進むと同時に、Editウインドウの方には、波形が現れてきます。</td>
		</tr>
	  </table>
	  <h4>◆イフェクトをかけてみよう</h4>
	  <p>さて、録音はうまくいきましたか？　それでは録音した素材を使って遊んでみましょう。</p>
	  <p> イフェクトには大きく分けて、ダイナミクス系と空間系があります。ダイナミクス系は、音量、音圧、音質に関わるイフェクトで、Compressor、Limiter、EQ(equalizer)等があります。　一方空間系は、その音が鳴っている場所、部屋の大きさ、反射率、壁の素材等のシミュレートやモジュレーション等のイフェクトで、Reverbe、Delay、Chorus、Flanger等があります。</p>
	  <p>この2つの系列のイフェクトは、かけ方にちょっとした違いがあります。ダイナミクス系のイフェクトは、音源に直接かけます。（今は、ピンとこないと思いますが、この後実際に使ってみれば、理解していただけると思います。）それに対して、空間系のイフェクトは、音源に対して間接的に使用するのが普通です。</p>
	  <p class="bold">それではダイナミクス系のイフェクトの作用を確かめてましょう。　</p>
	  <p> 今回のようにステレオ音源に対してLとRのチャンネルに各々同じ設定のイフェクトを割り当てるのは、手間ですしCPUのパワーも無駄に消費してしまいます。　ステレオ音源に対してダイナミクス系のイフェクトをかける便利な方法があるので覚えておいてください。</p>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td width="326"><img src="images/9.gif" alt="「New Track...」" width="326" height="153" /></td>
		  <td valign="top">
			<p class="bold">1.</p>
			<p>「File」メニューから「New Track...」を選びます。　ダイアログが出てきますので、Create [1] new [Aux 
			  Input(stereo)] として1つのステレオオグジュアリトラックを作ります。</p></td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td valign="top">
<p class="bold">2.</p>
			<p>オグジュアリトラックのInputを bus 1-bus 2 にします。</p></td>
		  <td align="left"><img src="images/10.gif" alt="オグジュアリトラックのInput" width="315" height="296" /></td>
		</tr>
	  </table> 
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td width="217"><img src="images/11.gif" alt="Outputをbus 1-bus 2に" width="217" height="226" /></td>
		  <td valign="top"> <p class="bold">3.</p>
			<p>最初に作った、Lチャンネル、RチャンネルのOutputをbus 1-bus 2にします。</p>
			<p>これで、実際に録音したチャンネルL,Rの音がAux 1から出てくるようになりましたね。</p>
			<p>このAux 1にイフェクトを設定すると、左右まったく同じイフェクトがかけられます。</p>
			<p>&nbsp;</p>
			</td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td valign="top">
<p class="bold">4.</p>
			<p>Mix ウインドウのAux 1のチャンネルの一番上部にある●をクリックするとi/oとplug-Inの一覧が出てきますので、plug-InからCompressorを選びます。</p>
			<p> その他の、ダイナミクス系イフェクトもこれと同じ操作で選ぶことができます。</p>
			</td>
		  <td align="left" valign="top"> 
			<p><img src="images/12.gif" alt="plug-Inの一覧" width="368" height="278" /></p>
			</td>
		</tr>
	  </table>
	  <hr size="1" />
	  <p class="bold">次に空間系イフェクトの設定方法を説明します。</p>
	  <p> 空間系のイフェクトは間接的に使用すると書きましたが、それは元の音はそのまま出し、イフェクト成分をそれに加えることを意味しています。<br />
		早速どのようにするのか説明しましょう。</p>
	  <p> <span class="bold">1〜2</span>　までは、ダイナミクス系のイフェクトのときと同じです。</p>
	  <p> <span class="bold">3.</span>　L,R各チャンネルのOutputを、out L-out Rに戻します。</p>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr> 
		  <td><img src="images/13.gif" alt="◇をクリック" width="270" height="308" /></td>
		  <td valign="top"> <p class="bold">4.</p>
			<p>Mix ウインドウのL,R各チャンネルの真ん中辺りにある◇をクリックします。両方のチャンネルともStereo--&gt;bus 
			  1-bus 2を選び、<span class="red">（左図）</span>　出てきた設定画面のpanを、Lは左に目いっぱい、Rは右に目いっぱい振ります。levelは各チャンネルとも0.0にします。<span class="red">(右図)</span></p></td>
		  <td valign="top"><img src="images/14.gif" alt="設定画面のpan" width="261" height="112" /></td>
		</tr>
	  </table>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td valign="top">
<p><span class="bold">5</span>.　ダイナミクス系イフェクトの4と同じようにして、mediam delay等の空間系イフェクトを選びます。</p>
			<p> <span class="bold">6</span>.　イフェクトのMixを左右とも100%にします。</p>
			<p>元の音とエフェクト音の量は、フェーダーで調整します。</p>
	  </td>
		  <td><img src="images/15.gif" alt="mediam delay" width="535" height="244" /></td>
		</tr>
	  </table> 
	  <p> 次号では、各イフェクトのパラメータの説明と、実際の録音に当たってどのような用途にどんなイフェクトを使えばいいのか等、さらに実用的な使い方を説明したいと思います。</p>
	  <hr size="1" />
	  <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
		  <td valign="top">■著者紹介<br />
			ひらまつ　きよし　<br />
			1991年　テイチクレコードより「LANPA」でデビュー　3枚のアルバムをリリース。<br />
			1998年 赤坂にプライベートスタジオを立ち上げ、CMへの楽曲提供やネット上での音楽配信等を手がける。<br />
			<a href="mailto:kyo@hiramatsu.be">kyo@hiramatsu.be</a><br />
			<a href="http://hiramatsu.be/" target="_blank">http://hiramatsu.be/</a></td>
		  <td><img src="images/kiyoshi.jpg" alt="ひらまつ　きよし" width="150" height="180" /></td>
		</tr>
	  </table>
	</td>
  </tr>
</table>
	</td>
  </tr>
  <tr align="center"> 
	<td height="10"><img src="../images/spacer.gif" width="185" height="10" alt="" /></td>
	<td>&nbsp;</td>
	<td height="10">&nbsp;</td>
  </tr>
  <tr align="center"> 
	<td colspan="3" class="copyright"> <? include("../copyrights.txt"); ?> </td>
  </tr>
</table>
</body>
</html>
