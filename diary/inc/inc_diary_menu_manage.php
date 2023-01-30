<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" ;/>
<div class="main_title">My Diary</div>
<div class="link_head1"><a href="/diary/" class="menu-lnk">* Most up-to-date </a></div>
<div class="link_head1"><a href="/diary/diary_graph.php" class="menu-lnk">* Health Parameter</a></div>
<div class="link_head1"><a href="/diary/query/diary_add_m_tusk.php" class="menu-lnk">* Add</a></div>
<div class="link_head1"><a href="http://gallery.me.com/kyo_h/" class="menu-lnk" target="_blank">* Gallery</a></div>
<div class="link_head1"><a href="/HouseholdAccount/" class="menu-lnk" target="_blank">* Household budget</a></div>
<div class="link_head1"><a href="https://www.google.com/calendar/embed?src=kiyoshi.hiramatsu%40gmail.com&ctz=Asia/Tokyo"
                           class="menu-lnk" target="_blank">* Schedule</a></div>
<div class="link_head1"><a href="/index.html" class="menu-lnk">* Home</a></div>
<div class="link_head1"><a href="/DivingLog/index.php" class="menu-lnk" target="_blank">* Diving Log</a></div>
<div class="link_head1"><a href="diary.xml" class="menu-lnk" target="_blank">* RSS</a></div>
<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_jumpMenu(targ, selObj, restore) { //v3.0
		eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
		if (restore) selObj.selectedIndex = 0;
	}
	//-->
</script>

<div class="message">* All Those Years Ago</div>
<div class="menuap">
	<select name="date_old" class="icon" onChange="MM_jumpMenu('parent',this,0)">
		<option selected>Select date</option>
		<?php
		$i = 1;
		$ym = date("Y-m");
		while ($ym > "2002-02") {
			echo "<option value=\"/diary/diary_old.php?date_old=$ym\">$ym</option>\n";
			$ym = date("Y-m", mktime(0, 0, 0, date("m") - $i, 1, date("Y")));
			$i++;
		}
		?>
	</select>
</div>

<div class="message">* Recent Comments</div>
<?php

$sql = "
select 
	DiaryComments.id_num,
	input_date,
	name,
	comment,
	date
from 
	DiaryComments,
	DiaryContent
where
	DiaryComments.id_num = DiaryContent.id_num
order by 
	input_date desc,
	comment_id desc 
limit 0 , 10
";

$result_gbook = mysqli_query($link, $sql);
while ($row_gbook = mysqli_fetch_array($result_gbook)) {
	$id_num = $row_gbook["id_num"];
	$input_date = $row_gbook["input_date"];
	$name = $row_gbook["name"];
	$comment = mb_substr($row_gbook["comment"], 0, 20, "utf-8") . "...";
	$main_date = $row_gbook["date"];

	echo <<< EOF
	<div class="guestbook">
	<span class="icon">$input_date</span>
	<span class="gname"><a href="diary_old.php?date_old=$main_date">$name</a></span><br />
	<span class="size_10">$comment</span>
	</div>
EOF;
}
?>
</div>

<hr size="1" noshade/>

<form action="/diary/diary_search_result.php" method="post" name="serach_page" id="serach_page">
	<div class="message">* Search</div>
	<div class="menuap">
		<input name="searchword" type="text" size="16" class="menuap"/>
		<input name="submit" type="image" src="images/bottum.jpg" align="middle">
	</div>
</form>

<form action="/diary/diary_search_meal_result.php" method="post" name="serach_page" id="serach_page">
	<div class="message">* Nice Meal?</div>
	<div class="menuap">
		<input name="searchword_meal" type="text" size="16" class="menuap"/>
		<input name="submit" type="image" src="images/bottum.jpg" align="middle">
	</div>
</form>
<div>
	<hr size="1" noshade/>
</div>

<table width="180" border="0" cellpadding="2" cellspacing="2">
	<tr class="align_center">
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr class="align_center">
		<td width="33%">
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=1"><img src="/diary/images/1.gif" alt="Private"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td width="34%">
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=2"><img src="/diary/images/2.gif" alt="hobby"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td width="33%">
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=3"><img src="/diary/images/3.gif" alt="Interest"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
	</tr>
	<tr class="align_center">
		<td class="icon" lang="en">
			<div align="center">Private</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Hobby</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Interest</div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=4"><img src="/diary/images/4.gif" alt="Audio"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=5"><img src="/diary/images/5.gif" alt="Work"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=6"><img src="/diary/images/6.gif" alt="Document"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
	</tr>
	<tr class="align_center">
		<td class="icon" lang="en">
			<div align="center">Audio</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Work</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Blog</div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=7"><img src="/diary/images/7.gif" alt="Memory"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=8"><img src="/diary/images/8.gif" alt="Surprise"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=9"><img src="/diary/images/9.gif" alt="PC"
			                                                                          width="50" height="40" border="0"/></a>
			</div>
		</td>
	</tr>
	<tr class="align_center">
		<td class="icon" lang="en">
			<div align="center">Memory</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Surprise</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">PC</div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
		<td>
			<div align="center"></div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=10"><img src="/diary/images/10.gif" alt="Info"
			                                                                           width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=11"><img src="/diary/images/11.gif" alt="server"
			                                                                           width="50" height="40" border="0"/></a>
			</div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=13"><img src="/diary/images/13.gif" alt="mac"
			                                                                           width="50" height="40" border="0"/></a>
			</div>
		</td>
	</tr>
	<tr class="align_center">
		<td class="icon" lang="en">
			<div align="center">Info</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Server</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">mac</div>
		</td>
	</tr>
	<tr class="align_center">
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=12"><img src="/diary/images/12.gif" alt="Misc"
			                                                                           width="50" height="40" border="0"/></a><a
						href="diary_icon_result.php?icon_id=10"></a></div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=14"><img src="/diary/images/14.gif" width="50"
			                                                                           height="40" alt="Diving"
			                                                                           border="0"/></a></div>
		</td>
		<td>
			<div align="center"><a href="/diary/diary_icon_result.php?icon_id=15"><img src="/diary/images/15.gif" width="50"
			                                                                           height="40" alt="Cooking" border="0"/></a>
			</div>
		</td>
	</tr>
	<tr class="align_center">
		<td class="icon" lang="en">
			<div align="center">Misc</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Diving</div>
		</td>
		<td class="icon" lang="en">
			<div align="center">Cooking</div>
		</td>
	</tr>
</table>

<div class="message">* Links</div>
<div class="link">
	<a href="http://blog.livedoor.jp/yatinowa8/" target="_blank">ヤッチーのしまうま日記</a>
</div>
<div class="link">
	<a href="http://www.geocities.jp/do_yan3/index.html" target="_blank">広い空の下から</a>
</div><!--
<div class="message">* Special</div>
<div class="link">
<a href="gokinjo/index.html" target="_blank">ご近所お散歩レポート 佃島編</a></div>
<div class="link"><hr /></div>
<div class="link">
<a href="seoul/20060520/index.html" target="_blank">青葉町を探して完結編 0605</a></div>
<div class="link"><hr /></div>
<div class="link">
<a href="seoul/20060406/seoul_20060406_1.html" target="_blank">ソウル食事レポート 0604</a></div>
<div class="link">
<a href="seoul/20060406/seoul_20060406.html" target="_blank">青葉町を探してその2 0604</a></div>
<div class="link"><hr /></div>
<div class="link">
<a href="seoul/20060215/seoul_20060216.html" target="_blank">ソウル食事レポート 0602</a>
</div>
<div class="link">
<a href="seoul/20060215/seoul_20060218.html" target="_blank">ソウル自由時間レポート 0602</a>
</div>
<div class="link">

<hr />

</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_n.html" target="_blank">ソウル 南大門から景福宮 0601</a>
</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_m.html" target="_blank">ソウル  地下鉄編</a>
</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_at.html" target="_blank">ソウル  青葉町って</a>
</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_a.html" target="_blank">ソウル  青葉小学校を探して</a>
</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_ni.html" target="_blank">ソウル  夜のソウル駅前</a>
</div>
<div class="link">
<a href="seoul/20060110/seoul_20060110_e.html" target="_blank">ソウル  帰国前の emart</a>
</div>
-->
<div class="message">* 韓国語 翻訳・通訳</div>
<div class="link">
	<a href="http://hany-lee.com/index.html" target="_blank">Maya Lee's Home</a>
</div>
