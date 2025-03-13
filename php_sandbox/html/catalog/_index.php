<?php require_once($_SERVER['DOCUMENT_ROOT'].'/inc/contentsConfig.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>森田アルミ工業</title>
<meta name="description" content="森田アルミ工業">
<meta name="Keywords" content="">
<meta property="og:title" content="森田アルミ工業">
<meta property="og:type" content="website">
<meta property="og:description" content="森田アルミ工業">
<meta property="og:image" content="">
<meta property="og:site_name" content="森田アルミ工業">
<link rel="shortcut icon" href="/image/icon/favicon.ico">
<link rel="apple-touch-icon" href="/image/icon/ios.png"/>
<link rel="icon" href="/image/icon/ios.png">
<link rel="stylesheet" type="text/css" href="/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/common/css/comp.css">
<link rel="stylesheet" type="text/css" href="uniq.css">
<!--[if IE]><link rel="stylesheet" href="/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/common/js/html5shiv.js"></script><![endif]-->
<link href="/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/common/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Quicksand|Source+Sans+Pro:400,200,300' rel='stylesheet' type='text/css'>
</head>
<body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/common/include/header.php'); ?>
<section id="md_area">
  <div id="md_area_in">
    <h1>製品カタログ請求</h1>
  </div>
  <!--/md_area_in--> 
</section>
<!--/md_area-->

<article id="contents" class="privacy">
  <nav id="pan">
    <ul>
      <li><a href="/index.php">HOME</a></li>
      <li><span>製品カタログ請求</span></li>
    </ul>
    <br class="clearfix">
  </nav>
  <!--/pan-->
  
  <div class="md002">
    <h2 class="head">製品カタログ請求フォーム</h2>
  </div>
  <!--/md002-->
  
  <section class="box">
    <p class="txt02 btm20">当社が製造および販売する各製品のカタログ請求は以下のフォームよりお願いいたします。<br>
      アルミ階段やエクステリア製品から、テラス・バルコニーなどのサイズオーダー可能なオーダーエクステリア製品まで、<br>
      ご興味を持たれた製 品がございましたら、ぜひお気軽に資料をご請求ください。<br>
      ※カタログ内容について、お急ぎの方は弊社まで直接お電話もしくはメールにて各詳細内容をご確認下さい。</p>
    <p class="txt02 btm20 red02">各製品カタログは本ウェブサイトからもPDF 形式にてダウンロードが可能です。<br>
      各製品ページ<a href="/product/" class="red02">「カタログ・図面」</a>からダウンロードしていただけます。<br>
      ※ダウンロードには会員登録が必要になります。</p>
    <p class="txt02 btm20">各項目の必要事項をご入力いただき、【次へ】ボタンをクリックしてください。<br>
      続いて確認画面に切り替わりますので、内容をご確認いただき間違いがないようでしたら、【完了】ボタンをクリックしてください。</p>
  </section>
  <!--/box-->
  <section class="box">
    <form action="/member/index.php" method="post" name="login" id="login">
      <div class="ta01 btm50">
        <table>
          <tbody>
            <tr>
              <th scope="row" class="w30">会社名<span class="f10">※</span></th>
              <td><input class="wS imeOn" name="companyName" type="text" />
                <p class=" f10_2">例）株式会社○○ &nbsp;※全角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th scope="row">お名前<span class="f10">※</span></th>
              <td><input class="wS imeOn" name="name" type="text" />
                <p class=" f10_2">例）○○ ○○ &nbsp;※全角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th scope="row">関連業種<span class="f10">※</span></th>
              <td><input value="1" type="radio" id="" name="relationJob" />
                <label for="">戸建</label>
                <br>
                <input value="2" type="radio" id="" name="relationJob" />
                <label for="">分譲マンション</label>
                <br>
                <input value="3" type="radio" id="" name="relationJob" />
                <label for="">賃貸</label>
                <br>
                <input value="4" type="radio" id="" name="relationJob" />
                <label for="">リフォーム</label>
                <br>
                <input value="5" type="radio" id="" name="relationJob" />
                <label for="">建材</label>
                <br>
                <input value="6" type="radio" id="" name="relationJob" />
                <label for="">エクステリア・外溝</label>
                <br>
                <input value="7" type="radio" id="" name="relationJob" />
                <label for="">オフィス</label>
                <br>
                <input value="8" type="radio" id="" name="relationJob" />
                <label for="">その他</label></td>
            </tr>
            <tr>
              <th scope="row">職種<span class="f10">※</span></th>
              <td><input value="1" type="radio" id="" name="subJobCategory" />
                <label for="">営業</label>
                <br>
                <input value="2" type="radio" id="" name="subJobCategory" />
                <label for="">企画</label>
                <br>
                <input value="3" type="radio" id="" name="subJobCategory" />
                <label for="">設計</label>
                <br>
                <input value="4" type="radio" id="" name="subJobCategory" />
                <label for="">購買</label>
                <br>
                <input value="5" type="radio" id="" name="subJobCategory" />
                <label for="">開発</label>
                <br>
                <input value="6" type="radio" id="" name="subJobCategory" />
                <label for="">その他</label></td>
            </tr>
            <tr>
              <th scope="row">部署名</th>
              <td><input class="wS imeOn" name="busyo" type="text" /></td>
            </tr>
            <tr>
              <th scope="row">メールアドレス<span class="f10">※</span></th>
              <td><input class="wS imeOff" name="eMail" type="text" />
                <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th scope="row">確認用メールアドレス<span class="f10">※</span></th>
              <td><input class="wS imeOff" name="eMailConf" type="text" />
                <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th>郵便番号<span class="f10">※</span></th>
              <td><p class="b01">〒&nbsp;
                  <input class="wSS imeOff" maxlength="3" onkeyup="AjaxZip3.zip2addr('zip1','zip2','pref','address1');" name="zip1" type="text" />
                  &nbsp;-&nbsp;
                  <input class="wSS imeOff" maxlength="4" onkeyup="AjaxZip3.zip2addr('zip1','zip2','pref','address1');" name="zip2" type="text" />
                </p></td>
            </tr>
            <tr>
              <th>住所<span class="f10">※</span></th>
              <td><p class="btm10">
                  <select class="se01" name="pref">
                    <option value="0">都道府県を選択</option>
                    <option value="1">北海道</option>
                    <option value="2">青森県</option>
                    <option value="3">岩手県</option>
                    <option value="4">宮城県</option>
                    <option value="5">秋田県</option>
                    <option value="6">山形県</option>
                    <option value="7">福島県</option>
                    <option value="8">茨城県</option>
                    <option value="9">栃木県</option>
                    <option value="10">群馬県</option>
                    <option value="11">埼玉県</option>
                    <option value="12">千葉県</option>
                    <option value="13">東京都</option>
                    <option value="14">神奈川県</option>
                    <option value="15">新潟県</option>
                    <option value="16">富山県</option>
                    <option value="17">石川県</option>
                    <option value="18">福井県</option>
                    <option value="19">山梨県</option>
                    <option value="20">長野県</option>
                    <option value="21">岐阜県</option>
                    <option value="22">静岡県</option>
                    <option value="23">愛知県</option>
                    <option value="24">三重県</option>
                    <option value="25">滋賀県</option>
                    <option value="26">京都府</option>
                    <option value="27">大阪府</option>
                    <option value="28">兵庫県</option>
                    <option value="29">奈良県</option>
                    <option value="30">和歌山県</option>
                    <option value="31">鳥取県</option>
                    <option value="32">島根県</option>
                    <option value="33">岡山県</option>
                    <option value="34">広島県</option>
                    <option value="35">山口県</option>
                    <option value="36">徳島県</option>
                    <option value="37">香川県</option>
                    <option value="38">愛媛県</option>
                    <option value="39">高知県</option>
                    <option value="40">福岡県</option>
                    <option value="41">佐賀県</option>
                    <option value="42">長崎県</option>
                    <option value="43">熊本県</option>
                    <option value="44">大分県</option>
                    <option value="45">宮崎県</option>
                    <option value="46">鹿児島県</option>
                    <option value="47">沖縄県</option>
                  </select>
                </p>
                <p>
                  <input class="wS imeOn" name="address1" type="text" />
                </p>
                <p class=" f10_2 btm5">市区町村名 (例：千代田区神田神保町)</p>
                <p>
                  <input class="wS imeOn" name="address2" type="text" />
                </p>
                <p class=" f10_2">番地・ビル名 (例：1-3-5)</p></td>
            </tr>
            <tr>
              <th>電話番号<span class="f10">※</span></th>
              <td><p class="b01 btm5">
                  <input class="wSSS imeOff" maxlength="4" name="tel1" type="text" />
                  -
                  <input class="wSSS imeOff" maxlength="4" name="tel2" type="text" />
                  -
                  <input class="wSSS imeOff" maxlength="4" name="tel3" type="text" />
                </p>
                <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th>FAX番号</th>
              <td><p class="b01 btm5">
                  <input class="wSSS imeOff" maxlength="4" name="fax1" type="text" />
                  -
                  <input class="wSSS imeOff" maxlength="4" name="fax2" type="text" />
                  -
                  <input class="wSSS imeOff" maxlength="4" name="fax3" type="text" />
                </p>
                <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th scope="row">御社URL</th>
              <td><input class="wS imeOff" name="siteUrl" type="text" />
                <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p></td>
            </tr>
            <tr>
              <th scope="row">ご希望のカタログ<span class="f10">※</span></th>
              <td>
              <p class="txt02 btm20 left">下記よりご希望のカタログをチェックしてください。（※最大3つまで）</p>
              <ul class="ca_list001">
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" />&nbsp;<i>アルミ手摺</i></p>
              <p class="cata_ph001"><img src="image/alumi_tesuri.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>スカイスペース</i></p>
              <p class="cata_ph001"><img src="image/sky_space.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>ステアーズ</i></p>
              <p class="cata_ph001"><img src="image/stears.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>エアリー</i></p>
              <p class="cata_ph001"><img src="image/airly.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>フラットテラス</i></p>
              <p class="cata_ph001"><img src="image/flat_t.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>フランジポート</i></p>
              <p class="cata_ph001"><img src="image/flange_port.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>morita color works<br>(カラーエクステリア）</i></p>
              <p class="cata_ph001"><img src="image/morita_color.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>TAS Step</i></p>
              <p class="cata_ph001"><img src="image/tas_step.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>TAS Handrail</i></p>
              <p class="cata_ph001"><img src="image/tas_hand.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>AG、AGx</i></p>
              <p class="cata_ph001"><img src="image/ag_agx.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>ViK</i></p>
              <p class="cata_ph001"><img src="image/vik.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>pid4M</i></p>
              <p class="cata_ph001"><img src="image/pid4m.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>STOK laundry</i></p>
              <p class="cata_ph001"><img src="image/ph001.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>Wally</i></p>
              <p class="cata_ph001"><img src="image/stok_laundry.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>albase</i></p>
              <p class="cata_ph001"><img src="image/albase.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>falce</i></p>
              <p class="cata_ph001"><img src="image/falce.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>patis</i></p>
              <p class="cata_ph001"><img src="image/patis.jpg" alt=""/></p>
              </label>
              </li>
              <li class="ca_list001_in"><label class="cata001">
              <p class="cata_txt001"><input name="" type="checkbox" value="" id="" /><i>AReco</i></p>
              <p class="cata_ph001"><img src="image/areco.jpg" alt=""/></p>
              </label>
              </li>
              
              </ul>
              <!--/ca_list001-->
              <p class="red02">各製品カタログは本ウェブサイトからもPDF 形式にてダウンロードが可能です。<br>
各製品ページ<a href="/product/" class="red02">「カタログ・図面」</a>からダウンロードしていただけます。<br>
※ダウンロードには会員登録が必要になります。PC のみ対応しています。</p>
              </td>
            </tr>
            <tr>
              <th scope="row">弊社ウェブサイトに<br>
                来られたきっかけを<br>
                教えて下さい。</th>
              <td><input 0="0" 1="1" name="medium[1]" type="checkbox" value="1" id="qf_e96ee1" />
                <label for="qf_e96ee1"> 検索エンジン(yahoo!、google等)</label>
                <br>
                <input 0="0" 1="1" name="medium[2]" type="checkbox" value="1" id="qf_12c882" />
                <label for="qf_12c882"> ネットショップ</label>
                <br>
                <input 0="0" 1="1" name="medium[3]" type="checkbox" value="1" id="qf_c8987d" />
                <label for="qf_c8987d"> SNS(Twitter、Facebook）</label>
                <br>
                <input 0="0" 1="1" name="medium[4]" type="checkbox" value="1" id="qf_456cc7" />
                <label for="qf_456cc7"> ブログ・まとめ記事等</label>
                <br>
                <input 0="0" 1="1" name="medium[5]" type="checkbox" value="1" id="qf_131738" />
                <label for="qf_131738"> 雑誌</label>
                <br>
                <input 0="0" 1="1" name="medium[6]" type="checkbox" value="1" id="qf_1afe20" />
                <label for="qf_1afe20"> 展示会</label>
                <br>
                <input 0="0" 1="1" name="medium[7]" type="checkbox" value="1" id="qf_65055e" />
                <label for="qf_65055e"> プレスリリース</label>
                <br>
                <input 0="0" 1="1" name="medium[8]" type="checkbox" value="1" id="qf_ac8c10" />
                <label for="qf_ac8c10"> その他</label></td>
            </tr>
            <tr>
              <th>その他コメント<br>アンケート</th>
              <td><p class="txt02 btm20 left">資料請求のきっかけとなった媒体の詳細名（雑誌
「BAILA」等）をご記入下さい。<br>またその他コメント等ございましたらご記入下さい。</p>
              <p class="b01 btm5"><textarea name="content" rows="4" ></textarea></p></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--/ta01-->
      
      <nav class="btn_area">
        <ul>
          <li>
            <input class="reset" name="reset" value="リセット" type="reset" />
          </li>
          <li>
            <input class="kakunin" name="submitConf" value="入力情報確認画面へ" type="submit" />
          </li>
         
        </ul>
      </nav>
      <!--/btn_area-->
      <nav class="btn_area">
			<ul>
			<li><input class="reset" type="submit" value="前のページへ戻る" name="confirm"></li>
			<li><input class="kakunin" type="submit" value="送信" name=""></li>
			</ul>
		</nav>
		<!--/btn_area-->
        <nav class="btn_area">
			<ul>
			<li><input class="reset" type="submit" value="前のページへ戻る" name="confirm"></li>
			</ul>
		</nav>
		<!--/btn_area-->
    </form>
  </section>
  <!--/box--> 
  
</article>
<!--/contents-->
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
<script src="/common/js/import.js"></script> 
<script src="/common/js/bootstrap.min.js"></script> 
 <script src="/common/js/matchHeight/matchHeight.js"></script>
<script>

	
	/////////////////////////
	
	$(function () {
  /**
   * jQuery object
   */
  var $window = $(window);
  var $triggerArray = [

    '.cata_txt001 i'
  ];

  /**
   * Event method
   */
  for (var i = 0; i < $triggerArray.length; i++) {
    $($triggerArray[i]).matchHeight();
  }

  /**
   * Event handler
   */
  $window.on('orientationchange', function () {
    location.href = location.href;
  });
});
</script>
</body>
</html>
