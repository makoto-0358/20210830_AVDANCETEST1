@extends('layouts.default')
<style>

</style>

@section('content')
<h1>内容確認</h1>
<form action="/thanks" method="post">
  @csrf
  <input type="hidden" name="id" value="{{$form['id']}}">
  <table>
    <tr>
      <td>お名前</td>
      <td>{{$form['lastName']}}{{$form['firstName']}}</td>
      <td><input type="hidden" name="lastName" value="{{$form['lastName']}}"></td>
      <td><input type="hidden" name="firstName" value="{{$form['firstName']}}"></td>
    </tr>
    <tr>
      <td>{{$data}}<</td>
      <td>{{$form['gender']}}</td>
      <td><input type="hidden" name="gender" value="{{$form['gender']}}">
      </td>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td>{{$form['email']}}</td>
      <td><input type="hidden" name="email" value="{{$form['email']}}"></td>
    </tr>
    <tr>
      <td>郵便番号</td>
      <td>{{$form['postcode']}}</td>
      <td><input type="hidden" name="postcode" value="{{$form['postcode']}}"></td>
    </tr>
    <tr>
      <td>住所</td>
      <td>{{$form['address']}}</td>
      <td><input type="hidden" name="address" value="{{$form['address']}}"></td>
    </tr>
    <tr>
      <td>建物名</td>
      <td>{{$form['building_name']}}</td>
      <td><input type="hidden" name="building_name" value="{{$form['building_name']}}"></td>
    </tr>
    <tr>
      <td>ご意見</td>
      <td>{{$form['opinion']}}</td>
      <td><input type="hidden" name="opinion" value="{{$form['opinion']}}"></td>
    </tr>
  </table>
<button type="submit" name="submit" value="true">送信</button>
<button type="submit" name="return" value="true">修正する</button>
</form>
