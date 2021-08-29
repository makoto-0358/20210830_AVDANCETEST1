@extends('layouts.default')
<style>
  svg.w-5.h-5 {
  width: 30px;
  height: 30px;
  }
  .overflow-ellipsis {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  width: 20ch;
  font-family: "Courier New", Consolas, monospace;
}
.width{
  width: 20ch;
  font-family: "Courier New", Consolas, monospace;
}

</style>

@section('content')
<h1>管理システム</h1>
<form id="find" action="/find" method="post">
  @csrf
  <table>
    <tr>
      <td>お名前</td>
      <td><input type="text" name="fullname"></td>
    </tr>
    <tr>
      <td>性別</td>
      <td><input type="radio" name="gender" value="全て" checked>全て</td>
      <td><input type="radio" name="gender" value="男性">男性</td>
      <td><input type="radio" name="gender" value="女性">女性</td>
    </tr>
    <tr>
      <td>登録日</td>
      <td><input type="date" name="created_at1"></td><td>{{"~"}}</td><td><input type="date" name="created_at2"></td>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td><input type="email" name="email"></td>
    </tr>
  </table>
</form>
<button type="submit" form="find">検索</button>
<form action="/find" method="post">
@csrf
  <button type="submit">リセット</button>
</form>

<table>
  <tr>
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th class="width">ご意見</th>
  </tr>
  @if (@isset($contacts))
  @foreach($contacts as $contact)
    <tr>
      <td>{{$contact->id}}</td>
      <td>{{$contact->lastName}}{{$contact->firstName}}</td>
      <td>{{$contact->gender}}</td>
      <td>{{$contact->email}}</td>
      <td class="overflow-ellipsis">{{mb_strimwidth("$contact->opinion", 0 ,54, "...","UTF-8")}}</td>
      <td>
        <form id="delete" action="/delete" method="post">
        @csrf
          <input type="hidden" name="id" value="{{$contact->id}}">
          <button type="submit" form="delete">削除</button>
        </form>
      </td>
    </tr>
  @endforeach
  @endif
</table>
{{ $contacts->links() }}
@endsection