@extends('layout')
@section('tweets')
<div class="" style = "width:100%;display:flex;">
    <div style>
      <form action="/tweets" method = "post" style = "display:flex; flex-direction:column;" >
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
        
        <div id="input_pluralBox">
          <div id="input_plural">
           <input type="text" class="form-control" placeholder="サンプルテキストサンプルテキストサンプルテキスト" name = "skills[]" multiple>
           <input type="button" value="＋" class="add pluralBtn">
           <input type="button" value="－" class="del pluralBtn">
          </div>
        </div>





        <div>
        </div>
        <input type="submit" value = "投稿">
      </form>
    </div>
</div>
<script>
 $(document).ready(function(){
     $(document).on( 'click', ".add",function() {
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
