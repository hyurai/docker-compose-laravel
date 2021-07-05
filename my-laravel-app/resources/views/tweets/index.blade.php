<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="">
    <div>
      <form action="/tweets" method = "post">
        @csrf
        <input type="text" name = "title">
        <input type="text" name = "name">
        <select name="job">
          <option value="フロントエンドエンジニア">フロントエンドエンジニア</option>
          <option value="バックエンドエンジニア">バックエンドエンジニア</option>
          <option value="インフラエンジニア">インフラエンジニア</option>
          <option value="iosエンジニア">iosエンジニア</option>
          <option value="Andoroidエンジニア">Andoroidエンジニア</option>
        </select>
        <input type="date" name = "entry_data">
        <input type="date" name = "start_data">
        <input type="date" name = "end_data">
        <input type="text" name = "text" placeholder="他の情報">
        <input type="submit" value = "投稿">
      </form>
    </div>
    <div>
        @foreach($tweets as $tweet)
         <p>{{$tweet->title}}</p>
         <p>{{$tweet->name}}</p>
         <p>{{$tweet->job}}</p>
         <p>{{$tweet->entry_data}}</p>
         <p>{{$tweet->start_data}}</p>
         <p>{{$tweet->end_data}}</p>
         <p>{{$tweet->text}}</p>
        @endforeach
    </div>
</div>