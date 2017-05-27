@extends('app')
@section('title', 'home')

@section('content')
  <div class="col-md-6">
    <h5>推荐内容</h5>
    @include('_blank')
  </div>

  <div class="col-md-6">
    <h5>权威人士榜</h5>
    @include('_blank')
  </div>

  <div class="col-md-8">
    <h5>最新海报</h5>
    @include('_blank')
  </div>

  <div class="col-md-4">
    <h5>热门作者</h5>
    @include('_square')
  </div>

  <div class="col-md-8">
    <h5>最新草图</h5>
    @include('_blank')
  </div>

  <div class="col-md-4">
    <h5>奋斗中</h5>
    @include('_square')
  </div>

  <div class="col-md-8">
    <h5>热门设定</h5>
    @include('_blank')
  </div>

  <div class="col-md-4">
    <h5>脑洞太太</h5>
    @include('_square')
  </div>
@stop
