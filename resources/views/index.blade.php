@extends('layouts.default')
<style>

</style>

@section('content')
<h1>お問い合わせ</h1>
<form action="/confirm" method="post">
  @csrf
  <input type="hidden" name="id" value="{{old('id')}}">
  <table>
    <tr>
      <td>お名前</td>
      <td><input type="text" name="lastName" value="{{old('lastName')}}" required></td>
      <td><input type="text" name="firstName" value="{{old('firstName')}}" required></td>
    </tr>
    @error('familyname')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    @error('firstName')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>性別</td>
      <td><input type="radio" name="gender" value="1" {{old('gender','男性') == '男性'?'checked':''}}>男性</td>
      <td><input type="radio" name="gender" value="2" {{old('gender') == '女性'?'checked':''}}>女性</td>
    </tr>
    @error('gender')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>メールアドレス</td>
      <td><input type="email" name="email" value="{{old('email')}}" required></td>
    </tr>
    @error('email')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>郵便番号</td>
      <td><input type="text" name="postcode" oninput="value = value.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g,'-').replace(/[^\-\d]/g,'');
" value="{{old('postcode')}}" pattern="\d{3}-\d{4}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" required></td>
    </tr>
    @error('postcode')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>住所</td>
      <td><input type="text" name="address" value="{{old('address')}}" required></td>
    </tr>
    @error('address')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>建物名</td>
      <td><input type="text" name="building_name" value="{{old('building_name')}}"></td>
    </tr>
    @error('building_name')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <td>ご意見</td>
      <td><input type="textarea" name="opinion" value="{{old('opinion')}}" required></td>
    </tr>
    @error('opinion')
    <tr>
      <td>{{$message}}</td>
    </tr>
    @enderror
  </table>
<button type="submit">確認</button>
</form>
