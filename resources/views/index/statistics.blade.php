@extends('app')
@section('title', '统计')

@section('content')
<div class="col-xs-12">
  <table class="table">
    <thead>
      <th>作品</th>
      <th>得分</th>
      <th>用户11</th>
      <th>用户12</th>
      <th>用户13</th>
      <th>用户14</th>
      <th>用户15</th>
    </thead>
    <tbody>
      @foreach($galleries as $gallery)
      <tr>
        <td>{{ $gallery->id }}</td>
        <td>{{ $gallery->imageable->score }}</td>
        <td>{{ $gallery->scores()->where('user_id' , 11)->first()->score }}</td>
        <td>{{ $gallery->scores()->where('user_id' , 12)->first()->score }}</td>
        <td>{{ $gallery->scores()->where('user_id' , 13)->first()->score }}</td>
        <td>{{ $gallery->scores()->where('user_id' , 14)->first()->score }}</td>
        <td>{{ $gallery->scores()->where('user_id' , 15)->first()->score }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
