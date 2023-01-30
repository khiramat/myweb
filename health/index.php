<?php
require_once '/var/www/html/inc/inc_init.php';
$date_th = null;
$tall = null;
$waist = null;
$weight = null;
$right_eye = null;
$left_eye = null;
$hbalc = null;
$glu = null;
$wbc = null;
$rbc = null;
$hgb = null;
$hct = null;
$mcv = null;
$mch = null;
$mchc = null;
$plt = null;
$b = null;
$e = null;
$ne = null;
$l = null;
$mon = null;
$un = null;
$cre = null;
$ua = null;
$egfr = null;
$tg = null;
$hdl = null;
$ast = null;
$alt = null;
$ldl = null;
$gdp = null;
$ldh = null;
$tbil = null;
$dbil = null;
$alp = null;
$tp = null;
$alb = null;
$na = null;
$k = null;
$cl = null;
$crp = null;
$blood_pressure = null;
$bmi = null;
$sight = null;
$fe = null;
$lpz = null;
$amy = null;

$sql = "
SELECT *
FROM medical_examination
ORDER BY date 
";
$result = mysqli_query($link_health, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$date = $row["date"];
	$date_th .= "<th>".$date."</th>";
	if($row["tall"] && $row["weight"]){
		$tall_calc = pow($row["tall"]/100,2);
		$bmi_calc = round($row["weight"] / $tall_calc, 1);
		if($bmi_calc > 25){
			$style_bmi = " class='alert'";
		} else {
			$style_bmi = null;
		}
	} else {
		$bmi_calc = null;
		$style_bmi = null;
	}
	if($row["waist"] > 85){
		$style_waist = " class='alert'";
	} else {
		$style_waist = null;
	}
	if($row["gdp"] > 75){
		$style_gdp = " class='alert'";
	} else {
		$style_gdp = null;
	}
	if($row["ua"] > 7){
		$style_ua = " class='alert'";
	} else {
		$style_ua = null;
	}
	if($row["crp"] > 0.3){
		$style_crp = " class='alert'";
	} else {
		$style_crp = null;
	}
	if($row["tp"] > 8.3 || $row["tp"] < 6.7){
		$style_tp = " class='alert'";
	} else {
		$style_tp = null;
	}
	if($row["ldl"] > 139 || $row["ldl"] < 70){
		$style_ldl = " class='alert'";
	} else {
		$style_ldl = null;
	}
    if($row["glu"] > 109 || $row["glu"] < 70){
        $style_glu = " class='alert'";
    } else {
        $style_glu = null;
    }
    if($row["tbil"] > 1.1 || $row["tbil"] < 0.2){
        $style_tbil = " class='alert'";
    } else {
        $style_tbil = null;
    }
    if($row["tg"] > 149 || $row["tg"] < 35){
        $style_tg = " class='alert'";
    } else {
        $style_tg = null;
    }
    if($row["ck"] > 250 || $row["ck"] < 50){
        $style_ck = " class='alert'";
    } else {
        $style_tg = null;
    }
    if($row["hgb"] > 17.6 || $row["hgb"] < 13.5){
        $style_hgb = " class='alert'";
    } else {
        $style_hgb = null;
    }
	$blood_pressure .= "<td>".$row["high"]. " / ".$row["lo"]."</td>";
	$tall .= "<td>".$row["tall"]."</td>";
	$waist .= "<td".$style_waist.">".$row["waist"]."</td>";
	$weight .= "<td>".$row["weight"]."</td>";
	$bmi .= "<td".$style_bmi.">".$bmi_calc."</td>";
	$sight .= "<td>".$row["left_eye"]." / ".$row["right_eye"]."</td>";
	$hbalc .= "<td>".$row["hbalc"]."</td>";
	$glu .= "<td".$style_glu.">".$row["glu"]."</td>";
	$wbc .= "<td>".$row["wbc"]."</td>";
	$rbc .= "<td>".$row["rbc"]."</td>";
	$hgb .= "<td".$style_hgb.">".$row["hgb"]."</td>";
	$hct .= "<td>".$row["hct"]."</td>";
	$mcv .= "<td>".$row["mcv"]."</td>";
	$mch .= "<td>".$row["mch"]."</td>";
	$mchc .= "<td>".$row["mchc"]."</td>";
	$plt .= "<td>".$row["plt"]."</td>";
	$b .= "<td>".$row["b"]."</td>";
	$e .= "<td>".$row["e"]."</td>";
	$ne .= "<td>".$row["ne"]."</td>";
	$fe .= "<td>".$row["fe"]."</td>";
	$l .= "<td>".$row["l"]."</td>";
	$mon .= "<td>".$row["mon"]."</td>";
	$un .= "<td>".$row["un"]."</td>";
	$cre .= "<td>".$row["cre"]."</td>";
	$ua .= "<td".$style_ua.">".$row["ua"]."</td>";
	$egfr .= "<td>".$row["egfr"]."</td>";
	$tg .= "<td".$style_tg.">".$row["tg"]."</td>";
	$hdl .= "<td>".$row["hdl"]."</td>";
	$ast .= "<td>".$row["ast"]."</td>";
	$alt .= "<td>".$row["alt"]."</td>";
	$ldl .= "<td".$style_ldl.">".$row["ldl"]."</td>";
	$gdp .= "<td".$style_gdp.">".$row["gdp"]."</td>";
	$ldh .= "<td>".$row["ldh"]."</td>";
	$tbil .= "<td".$style_tbil.">".$row["tbil"]."</td>";
	$lpz .= "<td>".$row["lpz"]."</td>";
	$alp .= "<td>".$row["alp"]."</td>";
	$tp .= "<td".$style_tp.">".$row["tp"]."</td>";
	$alb .= "<td>".$row["alb"]."</td>";
	$amy .= "<td>".$row["amy"]."</td>";
	$na .= "<td>".$row["na"]."</td>";
	$k .= "<td>".$row["k"]."</td>";
	$cl .= "<td>".$row["cl"]."</td>";
    $crp .= "<td".$style_crp.">".$row["crp"]."</td>";
    $ck .= "<td".$style_ck.">".$row["ck"]."</td>";
}
?>
<style>
    th{text-align: left; font-size: 13px; border-bottom: solid 1px black; border-right: solid 1px black; font-weight: bold; padding: 5px; white-space: nowrap;}
    td{text-align: right; font-size: 13px; border-bottom: solid 1px black; border-right: solid 1px black; padding: 5px}
    .alert{color: red; font-weight: bold; text-align: right; font-size: 13px; border-bottom: solid 1px black; border-right: solid 1px black; padding: 5px}
    h2{font-size: 16px; font-weight: bold; padding-top: 10px; padding-left: 10px;}
    h3{font-size: 13px; font-weight: bold; padding-top: 10px; padding-left: 10px;}
    p{font-size: 13px; padding-bottom: 20px; padding-left: 20px;}
</style>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Medical examination Results</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<table>
			<tr><th colspan="2">項目</th><?=$date_th?></tr>
			<tr><th rowspan="6">身体</th><th>身長</th><?=$tall?></tr>
			<tr><th>体重</th><?=$weight?></tr>
			<tr><th>腹囲（-85cm）</th><?=$waist?></tr>
			<tr><th>BMI（18.5~25）</th><?=$bmi?></tr>
			<tr><th>血圧（89 139 mHg）</th><?=$blood_pressure?></tr>
			<tr><th>視力（左右）</th><?=$sight?></tr>
			<!-- 腎臓 -->
			<tr><th rowspan=3">腎臓</th><th>尿素窒素（8~22 mg/dl）</th><?=$un?></tr>
			<tr><th>クレアチニン（0.61~1.04 mg/dl）</th><?=$cre?></tr>
			<tr><th>eGFRcreat（）</th><?=$egfr?></tr>
			<!-- 肝臓 -->
            <tr><th rowspan=1">尿酸</th><th>尿酸値（3.7~7 mg/dl）</th><?=$ua?></tr>
			<tr><th rowspan="8">肝臓</th><th>AST（10~40 u/l）</th><?=$ast?></tr>
			<tr><th>ALT（5~45 u/l）</th><?=$alt?></tr>
			<tr><th>LDH（115~245 u/l）</th><?=$ldh?></tr>
			<tr><th>ALP（110~360 u/l）</th><?=$alp?></tr>
			<tr><th>Γ-GDP（~75 u/l）</th><?=$gdp?></tr>
			<tr><th>総ビルビリン（0.2~1.1 mg/dl）</th><?=$tbil?></tr>
			<tr><th>アルブミン（3.8~5.1 g/dl）</th><?=$alb?></tr>
			<tr><th>総蛋白（6.7~8.3 g/dl）</th><?=$tp?></tr>
			<!-- 膵臓 -->
			<tr><th rowspan="2">膵臓</th><th>アミラーゼ（37~127 u/l）</th><?=$amy?></tr>
			<tr><th>リパーゼ（13~55 u/l）</th><?=$lpz?></tr>
			<!-- 脂質代謝 -->
			<tr><th rowspan="3">脂質代謝</th><th>中性脂肪（35~149 mg/dl）</th><?=$tg?></tr>
			<tr><th>HDL（40~86 mg/dl）</th><?=$hdl?></tr>
			<tr><th>LDL（70~139 mg/dl）</th><?=$ldl?></tr>
			<!-- 糖代謝 -->
			<tr><th rowspan="2">糖代謝</th><th>HbAlc（4.6~6.2 %）</th><?=$hbalc?></tr>
			<tr><th>血糖値（70~109 mg/dl）</th><?=$glu?></tr>
			<!-- 免疫血清 -->
			<tr><th rowspan="1">免疫</th><th>CRP定量（~0.3 mg/dl）</th><?=$crp?></tr>
			<!-- 造血 -->
			<tr><th rowspan="14">造血</th><th>白血球数（3900~9800）</th><?=$wbc?></tr>
			<tr><th>赤血球数（427~570）</th><?=$rbc?></tr>
			<tr><th>ヘモグロビン（13.5~17.6 g/dl）</th><?=$hgb?></tr>
			<tr><th>ヘマトクリット（39.8~51.8 %）</th><?=$hct?></tr>
			<tr><th>MCV（83~102 fl）</th><?=$mcv?></tr>
			<tr><th>MCH（28~34.6 pg）</th><?=$mch?></tr>
			<tr><th>MCHC（31.6~36.6 %）</th><?=$mchc?></tr>
			<tr><th>血小板数（13~36.9 x10000）</th><?=$plt?></tr>
			<tr><th>好塩基球（0~3 %）</th><?=$b?></tr>
			<tr><th>好酸球（0~10 %）</th><?=$e?></tr>
			<tr><th>好中球（35~73 %）</th><?=$ne?></tr>
			<tr><th>リンパ球（20~51 %）</th><?=$l?></tr>
			<tr><th>単球（2~12 %）</th><?=$mon?></tr>
			<tr><th>血清鉄（54~200 μ/dl）</th><?=$fe?></tr>
			<!-- 電解質 -->
            <tr><th rowspan="3">電解質</th><th>ナトリウム（136~147 meg/l）</th><?=$na?></tr>
            <tr><th>カリウム（3.6~5 mg/dj）</th><?=$k?></tr>
            <tr><th>カルシウム（8.5~10.2 meg/l）</th><?=$cl?></tr>
            <tr><th>筋肉</th><th>CK値（50~250）</th><?=$ck?></tr>
		</table>
	</div>  <!-- コンテンツ終了 -->
    <div style="width: 920px;">
        <h2>腎臓の検査</h2>
        <h3>クレアチニン（Cr）（基準値：男性1.00mg／dL以下、女性0.70mg／dL以下）</h3>
        <p>筋肉内にあるクレアチン（アミノ酸の一種）が代謝された後の老廃物です。腎臓でろ過された後、尿として排出されることから、腎機能が低下していると数値が高くなります。<br>
        男性と女性で筋肉量に差があるため、男女で基準値が異なります。</p>

        <h3>eGFR（イージーエフアール）（基準値：60.0mL／分／1.73m2以上）</h3>
        <p>腎臓が老廃物を尿として排泄する能力を示すもので、血清クレアチニンの値を性別、年齢で補正して算出します。腎機能が低下している場合、数値が低くなります。</p>

        <h2>尿酸の検査（基準値：2.1～7.0mg／dL）</h2>
        <h3>尿酸（UA）</h3>
        <p>尿酸はプリン体（タンパク質の一種）が代謝されてできたものです。尿酸が増えると尿酸塩という結晶になり、それが足の親指の付け根などの関節に付着すると痛風を引き起こし、強い痛みが生じます。<br>
        尿酸塩が腎臓に沈着すると腎機能障害を引き起こします。また、動脈硬化のリスクもあります。</p>

        <h2>肝臓の検査</h2>
        <h3>総タンパク（基準値：6.5～7.9g／dL）</h3>
        <p>血液中に含まれるタンパク質の総称です。主にアルブミンやグロブリンを指します。低栄養や肝機能障害、ネフローゼ症候群で数値が低くなり、多発性骨髄腫たはつせいこつずいしゅや脱水などで高くなります。</p>

        <h3>アルブミン（ALB）（基準値：3.9g／dL以上）</h3>
        <p>血液中のタンパク質のうち、もっとも多くを占めるタンパク質です。低栄養や肝機能障害、ネフローゼ症候群の場合に数値が低くなります。</p>

        <h3>AST（GOT）、ALT（GPT）（基準値：30U／L以下）</h3>
        <p>AST（GOT）は、心臓や肝臓、腎臓、筋肉などに存在している酵素で、ALT（GPT）は主に肝臓に多く存在している酵素です。ALTだけ高い、もしくはASTもALTも高い場合には、脂肪肝や肝炎、肝臓がんなどの病気を疑います。<br>
            ASTだけが高い場合には、肝臓や心臓の病気を疑います。</p>

        <h3>γ（ガンマ）-GT（γ-GTP）（基準値：50U／L以下）</h3>
        <p>タンパク質を分解する酵素の一種で、肝臓の解毒作用に関わっています。アルコール性肝障害や脂肪肝、肝炎、胆道閉塞たんどうへいそくなどがあるときに数値が高くなります。</p>

        <h3>HBs抗原（基準値：陰性−）</h3>
        <p>B型肝炎ウイルスへの感染の有無を調べます。</p>

        <h3>HCV抗体（基準値：陰性−）</h3>
        <p>C型肝炎ウイルスへの感染歴や現在感染していないかどうかを調べます。</p>

        <h2>脂質系の検査</h2>
        <h3>HDL-コレステロール（基準値：40mg／dL以上）</h3>
        <p>動脈の内側に付着した余分なコレステロールを回収して動脈硬化を防いでいます。善玉コレステロールとも呼ばれます。数値が低いと動脈硬化のリスクが高くなります。</p>

        <h3>LDL-コレステロール（基準値：60～119mg／dL）</h3>
        <p>コレステロールを全身に運ぶ役割を担っています。悪玉コレステロールとも呼ばれ、数値が高いと動脈硬化を引き起こし、心筋梗塞しんきんこうそくや脳梗塞のリスクが高まります。</p>

        <h3>Non-HDL-コレステロール（基準値：90～149mg／dL）</h3>
        <p>全てのコレステロールからHDL-コレステロール（善玉コレステロール）だけを除いたものです。動脈硬化を引き起こす全てのコレステロールを意味します。</p>

        <h3>中性脂肪（TG）（基準値：30～149mg／dL）</h3>
        <p>体脂肪の大部分を占めます。大切なエネルギー源となりますが、増えすぎると皮下脂肪や肝臓に蓄えられ、肥満や脂肪肝を招きます。</p>

        <h2>糖代謝系の検査</h2>
        <h3>血糖値（基準値：99mg／dL以下）</h3>
        <p>血液中のブドウ糖の量を濃度で示したものです。ブドウ糖はインスリン膵臓すいぞうから分泌されるホルモン）のはたらきによってエネルギー源となります。<br>
        血糖値は、空腹時と食後で数値が異なることが一般的です。空腹時は血糖値が低く、食後は血糖値が高くなりますが、健康な人であればインスリンのはたらきにより、時間の経過とともに再び空腹時と同様の血糖値まで戻ります。<br>
        一方、糖尿病の人はインスリンがうまくはたらかなくなり、血液中のブドウ糖が過剰になってしまいます。そのため、血糖値の数値が高い場合には糖尿病を疑います。</p>

        <h3>HbA1c（ヘモグロビンエーワンシー）（基準値：5.5％以下）</h3>
        <p>血液中のヘモグロビンとブドウ糖が結合してできた物質のことで、これを見ることで過去1～2か月における平均的な血糖値が分かります。</p>

        <h2>炎症反応の検査</h2>
        <h3>C反応性タンパク（CRP）（基準値：0.3mg／dL以下）</h3>
        <p>体に炎症が起きているときに血液中に増加するC反応性タンパクの量を調べます。細菌やウイルスに感染したり、がんによって体の組織が傷害を受けていたりするときに上昇します。</p>

        <h2>血球系の検査</h2>
        <h3>赤血球（RBC）</h3>
        <p>全身に酸素を運び、血液中の二酸化炭素を分解する役割を担います。赤血球の数が多すぎると多血症、少なすぎると貧血を疑います。</p>

        <h3>白血球数（WBC）（基準値：3,100～8,400／μL）</h3>
        <p>細菌やウイルスから体を守る役割を担います。感染症や炎症性の病気、腫瘍性しゅようせいの病気で数値が高くなります。また、喫煙習慣がある場合にも高くなります。</p>

        <h3>血色素量（Hb・ヘモグロビン）（基準値：男性13.1～16.3g／dL、女性12.1～14.5g／dL）</h3>
        <p>赤血球の中で酸素を運ぶ役割を担うタンパク質のことです。数値が低い場合には貧血などを疑います。</p>

        <h3>ヘマトクリット（Ht）</h3>
        <p>血液全体のうち赤血球が占める割合のことです。数値が高い場合には多血症や脱水、低い場合に貧血などを疑います。</p>

        <h3>血小板数（基準値：145,000～329,000／μL）</h3>
        <p>出血時に血液を固めて止血する役割を担います。血小板血症やリウマチなどの慢性炎症で数値が高くなり、再生不良性貧血や特発性血小板減少性紫斑病などで数値が低くなります。</p>
    </div>
</div>




