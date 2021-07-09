@extends('layout')
@section('tweets')
<div class="" style = "width:100%;display:flex;">
    <div>
      <form action="{{url('/tweets')}}" action = "get">
        <div>
          <input type="text" name = "company_name" placeholder="会社名を入力してください" style = "width:400px;height:40px;">
        </div>
        <div style="padding-top:10px;">
          <select name="job" style = "width:400px;">
            <option hidden value = "">エンジニアの種類を選択してください</option>
            <option value="フロントエンドエンジニア">フロントエンドエンジニア</option>
            <option value="バックエンドエンジニア">バックエンドエンジニア</option>
            <option value="インフラエンジニア">インフラエンジニア</option>
            <option value="iosエンジニア">iosエンジニア</option>
            <option value="Andoroidエンジニア">Andoroidエンジニア</option>
          </select>
        </div>
        <div style = "padding-top:10px;">
          <input type="date" name = "entry_data" style = "width:198px;">
          <input type="date" name = "start_data" style = "width:198px;">
        </div>
        

        <div id="input_pluralBox">
          <div id="input_plural">
           <input type="text" class="form-control" placeholder="サンプルテキストサンプルテキストサンプルテキスト" name = "skillname[]" multiple>
           <input type="button" value="＋" class="add pluralBtn">
           <input type="button" value="－" class="del pluralBtn">
          </div>
        </div>

        <div style = "padding-top:20px;">
          <input type="submit" value = "検索" style = "width:200px;">
        </div>
      </form>
    </div>
</div>
<div>
<div class = "result">
 検索
 @if(!empty($company_name))
   <h4>会社名</h4>
   <h4>{{$company_name}}</h4>
 @endif
 @if(!empty($job))
   <h4>職種</h4>
   <h4>{{$job}}</h4>
 @endif
 @if(!empty($before_entry_data))
   <h4>エントリー日付</h4>
   <h4>{{$before_entry_data}}</h4>
 @endif
 @if(!empty($before_start_data))
   <h4>業務開始日</h4>
   <h4>{{$before_start_data}}</h4>
 @endif
</div>
@if(!empty($skillname))
  <h4>スキル</h4>
  @foreach($skillname as $skillnameone)
    <p>{{$skillnameone}}</p>
  @endforeach
@endif
@foreach($tweets as $tweet)
  <div style = "border:solid;">
    <h2 style = "font-weight:bold;">{{$tweet->title}}</h2>
    <div style = "display:flex;">
      <h4 style = "font-weight:bold;">{{$tweet->company_name}}</h4>
      <h4>{{$tweet->job}}</h4>
    </div>
    <h5>エントリー</h5>
    <p>{{$tweet->entry_data}}</p>
    <h5>期間</h5>
    <div style = "display:flex;">
      <p>{{$tweet->start_data}}</p>
      <p>~</p>
      <p>{{$tweet->end_data}}</p>
    </div>
    <h6>使用している技術</h6>

    
    
      @foreach($tweet->tweetskills as $skill)
        <p>{{$skill->name}}</p>
      @endforeach
   



   
    <h6>詳細</h6>
    <p>{{$tweet->text}}</p>
   
  </div>
@endforeach
</div>
<a href="/tweets/create">投稿</a>
<script>
$(document).ready(function(){
  $(document).on("click",".add",function(){
    $(this).parent().clone(true).insertAfter($(this).parent());
  });
  $(document).on("click",".del",function(){
    var target = $(this).parent();
    if(target.parent().children().length > 1){
      target.remove();
    }
  });
});
</script>
@endsection