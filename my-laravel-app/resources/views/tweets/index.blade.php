<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="" style = "width:100%;display:flex;">
    <div style = "width:50%;">
      <form action="/tweets" method = "post" style = "display:flex; flex-direction:column;width:50%;" >
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
    <div style = "width:50%;">
      <form action="{{url('/tweets')}}" action = "get">
        <input type="text" name = "name" placeholder="会社名を入力してください">
        <input type="submit" value = "検索">
      </form>
      <form action="{{url('/tweets')}}" action = "get">
        <input type="text" name = "job" placeholder="会社名を入力してください">
        <input type="submit" value = "検索">
      </form>
      <form action="{{url('/tweets')}}" action = "get">
        <input type="date" name = "entry_data">
        <input type="submit" value = "検索">
      </form>
      <form action="{{url('/tweets')}}" action = "get">
        <input type="date" name = "start_data">
        <input type="submit" value = "検索">
      </form>
    </div>
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