<?php

$instagram_business_id = '17841432022430305'; 
$access_token = 'EAAh6ZBhJT7tgBAHOB1lHq5KOak30i6KVF5qjCvYqvMSwgfXNqKq3NQwMypBDpypjDNU8Qdyb9FrhE0Mf9loxtYYhllS9vDUIw73bQCLKruad1PaZBuHVKKfEiSg901Ic4Ki6sOU33GVUwpcKcwZBw0L7GG1EOBGbjOw5fyZAdc6TpZB9YEKS1Wee6RB2HwOMZD';

$target_user = 'kururi_m';

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
