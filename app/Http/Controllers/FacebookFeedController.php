<?php
// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Http;
// class FacebookFeedController extends Controller
// {
//     public function showFeed()
// {
//     $accessToken = 'EAAZA0dJuYkCoBOZBh5RFSZAz64QBxpE0MxsPP0lGWvYCWoJP9mWVc46xmTi1xsiFe13Jciu7wPLTXqrE3dOxxeShRTr14xnGNRTMc7LjBW0qSOnDfnMA7lZBaYG0v1vSL9YOtaCUcBogPbqbDYKb72JQySVZCdMrAXGr8ZB2sPgRPyw9ZBuVfLqdShDhGzN5TFHCOBXKXGJZCOdZAZCC8lpHX70FFOWeqDM0ZAxotRZBwDv4';
//     $pageId = '753363951395836';

//     // Get page info
//     $pageResponse = Http::get("https://graph.facebook.com/v19.0/{$pageId}?fields=name,about,picture{url}&access_token={$accessToken}");
//     $pageData = $pageResponse->json();

//     // Get posts
//     $postsResponse = Http::get("https://graph.facebook.com/v19.0/{$pageId}/posts?fields=message,story,full_picture,created_time,comments.limit(0).summary(true),likes.limit(0).summary(true),shares,attachments&access_token={$accessToken}");
//     $posts = $postsResponse->json()['data'] ?? [];

//     return view('frontend.pages.feed', compact('posts', 'pageData'));
// }
// }

// app/Http/Controllers/FacebookController.php
// namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;

// class FacebookFeedController extends Controller
// {
//     public function showFeed()
//     {
//         $pageId = env('FB_PAGE_ID');
//         $accessToken = env('FB_ACCESS_TOKEN');

//         $response = Http::get("https://graph.facebook.com/v18.0/{$pageId}/posts", [
//             'fields' => 'id,message,created_time,full_picture,permalink_url',
//             'access_token' => $accessToken
//         ]);

//         return $response->json();
//     }
// }
