<?php

$instagram_business_id = '17841428849189054'; 
$access_token = 'EAACZBgYAqFCgBALqpp8FkMNnUJP1nZBKlPVB1IbrfRiV4uTEIF7ZBZAgoDcHZBiyYhS13KY195hPUolkvdPBeCjqxie8pIaVZAB7Wesf0tX3i7eZBVIx7asyY43H2YIVMTcNofa3bhF6PALCJOy7l01M0MF9RteBy0OMfD2X6i87uWGOYECziCZA3XSq6nG00OMZD';

$target_user = 'cupen00';

//自分が所有するアカウント以外のInstagramビジネスアカウントが投稿している写真も取得したい場合は以下
$query = 'business_discovery.username('.$target_user.'){id,followers_count,media_count,ig_id,media{caption,media_url,media_type,like_count,comments_count,timestamp,id,permalink,username}}';

//自分のアカウントの画像が取得できればOKな場合は$queryを以下のようにしてください。

// $query = 'name,media{caption,like_count,media_url,permalink,timestamp,username}&access_token='.$access_token;



$instagram_api_url = 'https://graph.facebook.com/v6.0/';
$target_url = $instagram_api_url.$instagram_business_id."?fields=".$query."&access_token=".$access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$instagram_data = curl_exec($ch);
curl_close($ch);

echo $instagram_data;
exit;
