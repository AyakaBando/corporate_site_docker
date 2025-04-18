#!/usr/bin/perl -w

############################################################
# 環境
############################################################
# メールコマンド(環境に合わせて変えてください)
$g_MailCmd = '/usr/sbin/sendmail';

############################################################
# 変更不可
############################################################
# 作成ファイルのパス
$g_DataFile = './data/data.csv';
# エラー表示判断格納ファイル
$g_ErrFile = './data/error.dat';
# エラーＨＴＭＬ
$g_ErrorHtmlFile = './error.html';
# 確認ＨＴＭＬ
$g_ConfirmHtmlFile = './confirm.html';
# 終了ＨＴＭＬ
$g_EndHtmlFile = './end.html';
# 店舗様に送るメールベース
$g_ToMailFile = './data/tomail.txt';
# 顧客様に送るメールベース
$g_FroMmailFile = './data/frommail.txt';

############################################################
# 設定
############################################################
# メール送信先（メールを飛ばす先のアドレスです）複数可（例：test1@cns-inc.co.jp,test2@cns-inc.co.jp）
$g_MailTo = 'info@moritaalumi.co.jp';
# メール送信先（BCCに飛ばすアドレスです）複数可（例：test1@cns-inc.co.jp,test2@cns-inc.co.jp）
$g_Mailbcc = 'sagara@moritaalumi.co.jp,matsumoto@moritaalumi.co.jp,mamoto@moritaalumi.co.jp,ueno@moritaalumi.co.jp';
# メール送信先（CCに飛ばすアドレスです）複数可（例：test1@cns-inc.co.jp,test2@cns-inc.co.jp）
$g_Mailcc = '';
# 店舗件名（店舗に届くメールの件名です）
$g_Subject = 'お問い合わせ';
# 顧客件名（顧客に届くメールの件名です）
$g_SubjectK = 'お問い合わせいただきありがとうございました';
# メール送信後のＵＲＬ（メール送信後のＵＲＬです）
$g_EndUrl = 'http://www.moritaalumi.co.jp ';
# 戻り先のＵＲＬ
$g_ReturnUrl = 'http://www.moritaalumi.co.jp ';

# 作成ファイルへのデータ書き込み設定（書き込む場合は「1」、書き込まない場合は「0」をいれてください）
$g_DataSet = 1;

# 確認画面に有無（確認画面が必要ならば「1」を、いらないならば「0」をいれてください。）
$g_Kakunin = 1;
# 送信後の処理（終了画面が必要ならば「1」を、送信後ＵＲＬに飛ばすならば「0」をいれてください。）
$g_End = 1;

############################################################
# 色設定
############################################################
# テーブルボーダーカラー
$g_TableBorderColor = '#000000';
# 項目のバックカラー
$g_LavelBackColor ='#ffffff';
# 値のバックカラー
$g_DataBackColor ='#ffffff';
# 項目の文字色
$g_LavelTextColor ='#000000';
# 値の文字色
$g_DataTextColor ='#000000';

true;
