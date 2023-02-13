<div id="acount_edit_area"></div>
<div id="acount_list">
	<?php include("/var/www/kh/accounts/account_list.php"); ?>
</div>

<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_account = $('#acount_edit_area');
		//ボタンをクリックした時の処理
		$(document).on('click', '.account_add_ajax a', function (event) {
			event.preventDefault();
			//.account_add aのhrefにあるリンク先を保存
			var link = $(this).attr("href");
			$content_account.fadeOut(10, function () {
				getPage(link);
			});
		});
		
		//ページを取得してくる
		function getPage(elm) {
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function (data1) {
					$content_account.html(data1).fadeIn(10);
				},
				error: function () {
					alert('問題がありました。');
				}
			});
		}
	});
</script>


<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_account = $('#acount_edit_area');
		//ボタンをクリックした時の処理
		$(document).on('click', '.account_detail_ajax a', function (event) {
			event.preventDefault();
			//.account_detail_ajax aのhrefにあるリンク先を保存
			var link = $(this).attr("href");
			$content_account.fadeOut(10, function () {
				getPage(link);
			});
		});
		
		
		//ページを取得してくる
		function getPage(elm) {
			$('html, body').animate({'scrollTop': 0}, 0);
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function (data1) {
					$content_account.html(data1).fadeIn(10);
				},
				error: function () {
					alert('問題がありました。');
				}
			});
		}
	});
</script>

