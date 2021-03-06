@extends('home.wx.layouts.index')
@section('head')
  <title>{{ $TDK['title'] }}</title>
  <meta name="keywords" content="{{ $TDK['keywords'] }}" />
  <meta name="description" content="{{ $TDK['description'] }}" />
@stop
@section('content')
  <!--底部选项卡-->
  @include('home.wx.layouts._foot_tab_index')

  <!-- 主界面不动、菜单移动 -->
  	<!-- 侧滑导航根容器 -->
  	<div class="mui-off-canvas-wrap mui-draggable mui-slide-in">
  	  <!-- 菜单容器 -->
      @include('home.wx.couponCategory._aside')

  	  <!-- 主页面容器 -->
  	  <div class="mui-inner-wrap">
  	    <!-- 主页面标题 -->
  	   @include('home.wx.couponCategory._header')

        <!--底部选项卡-->
        @include('home.wx.layouts._foot_tab_index')

  	    <div class="mui-content mui-scroll-wrapper">
  	       <div class="mui-scroll">
      	        <!-- 主界面具体展示内容 -->
      	        <div class="mui-row" style="font-size: 14px; padding: 6px 0px 4px; background-color:#fff; border-bottom:1px solid #ed2a7a;">
      	        	<div class="mui-col-xs-4 mui-text-center">
      	        		<a class="a-can-do" href="{{ $currentUrl }}?search={{ $oldRequest['search'] }}" @if(!empty($oldRequest['order']) && ( $oldRequest['order'] === 'sales_down' || $oldRequest['order'] === 'rate_down' ) ) style="color: #000000;" @else style="color: #ed2a7a;" @endif>综合排序<span class="mui-icon mui-icon-arrowdown" style="font-size: 14px;"></span></a>
      	        	</div>
      	        	<div class="mui-col-xs-4 mui-text-center">
      	        		<a class="a-can-do" href="{{ $currentUrl }}?order=sales_down&search={{ $oldRequest['search'] }}" @if(!empty($oldRequest['order']) && $oldRequest['order'] === 'sales_down') style="color: #ed2a7a;" @else style="color: #000000;" @endif>销量排序<span class="mui-icon mui-icon-arrowdown" style="font-size: 14px;"></span></a>
      	        	</div>
      	        	<div class="mui-col-xs-4 mui-text-center">
      	        		<a class="a-can-do" href="{{ $currentUrl }}?order=rate_down&search={{ $oldRequest['search'] }}"  @if(!empty($oldRequest['order']) && $oldRequest['order'] === 'rate_down')  style="color: #ed2a7a;" @else style="color: #000000;" @endif>优惠幅度<span class="mui-icon mui-icon-arrowdown" style="font-size: 14px;"></span></a>
      	        	</div>
      	        </div>
      	        <div style="height:10px; width:100%;"></div>
      	        <!--商品的详细列表-->
      		    <ul id="couponList" class="mui-table-view mui-grid-view">
      		        @include('home.wx.couponCategory._coupon')
                  @if(empty($coupons->count()))
                    <li class="mui-table-view-cell mui-media mui-col-xs-12">
                      @include('home.wx.couponCategory._tips_no_result')
                    </li>
                  @endif
      		    </ul>

      		    <!--分页-->
      		    <div class="mui-row mui-text-center" style="background-color: #FFFFFF; padding-top: 5px;">
                {!! $coupons->appends($oldRequest)->links('home.wx.pagination.default', $oldRequest) !!}
      		    </div>

      		    <!--猜你喜欢-->
      		    <div class="mui-row"  style="margin-top: 12px;">
      		    	<div class="mui-col-xs-4"><hr /></div>
      		        <div class="mui-col-xs-4 mui-text-center">
      		        	<span class="icon iconfont icon-wei-" style="font-size: 20px; color: #ed2a7a;"></span>
      		        	猜你喜欢
      		        </div>
      		        <div class="mui-col-xs-4"><hr /></div>
      		    </div>
      		    <div style="width: 100%; height: 5px;"></div>
      		    <ul class="mui-table-view mui-grid-view">
      		        @include('home.wx.couponCategory._guss_you_like_list')
      		    </ul>
      		    <!--版权-->
      		    @include('home.wx.layouts._copy')
  	      </div>
  	    </div>
  	    <div class="mui-off-canvas-backdrop"></div>
  	  </div>
  	</div>
@stop
