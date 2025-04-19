<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Facebook Feed</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <style>
    body {
      font-family: sans-serif;
      background: #f2f2f2;
      padding: 20px;
    }
    .swiper {
      max-width: 600px;
      margin: auto;
    }
    .swiper-slide {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    img {
      max-width: 100%;
      margin-bottom: 10px;
    }
    a {
      color: #1877f2;
    }
  </style>
</head>
<body>

<h2 style="text-align: center;">📘 Facebook Page Feed</h2>

<div class="swiper">
  <div class="swiper-wrapper">
    @php
        $pageId = config('services.facebook.page_id');
        $accessToken = config('services.facebook.access_token');

        $url = "https://graph.facebook.com/v19.0/$pageId/posts?fields=message,created_time,full_picture,permalink_url&access_token=$accessToken";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
    @endphp

    @if(isset($data['data']))
        @foreach($data['data'] as $post)
            @php
                $message = $post['message'] ?? '';
                $picture = $post['full_picture'] ?? '';
                $link = $post['permalink_url'] ?? '#';
                $time = \Carbon\Carbon::parse($post['created_time'])->format('F j, Y g:i A');
            @endphp

            <div class="swiper-slide">
                @if($picture)
                    <img src="{{ $picture }}" alt="Post Image">
                @endif
                <p>{{ $message }}</p>
                <small>Posted on {{ $time }}</small><br>
                <a href="{{ $link }}" target="_blank">View on Facebook</a>
            </div>
        @endforeach
    @else
        <p>⚠️ Unable to load posts. Please check your Page ID or Access Token.</p>
    @endif
  </div>

  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  new Swiper('.swiper', {
    loop: true,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>

</body>
</html>
