@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
    @include('admin.layouts.form._errors')
    @include('admin.layouts.form._tips')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>编辑栏目分类</h5>
						<div class="ibox-tools">
							<a class="dropdown-toggle" href="{{ route('categorys.index') }}">
									<i class="fa fa-list"></i> 栏目分类列表
							</a>
						</div>
        </div>
        <div class="ibox-content">
          <div class="row form-body form-horizontal m-t">
            <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
              <form action="{{ route('categorys.update', $category->id) }}" method="POST" enctype="multipart/form-data">
              		{{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">栏目名称<span class="text-warning">*</span></label>
                          <div class="col-sm-9">
                              <input type="text" name="name" value="{{ $category->name }}" class="form-control" required placeholder="请输入栏目的分类名称">
                              <span class="help-block m-b-none">栏目分类名称最多由10个汉字组成</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">排序<span class="text-warning">*</span></label>
                          <div class="col-sm-9">
                              <input type="number" required name="order" class="form-control" value="{{ $category->order }}" placeholder="请输入排序数值">
                              <span class="help-block m-b-none">值越小，排名越靠前！</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">显示状态</label>
                          <div class="col-sm-9">
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show == 1) checked @endif value="1" id="optionsRadios1" name="is_show">显示</label>
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show == 0) checked @endif value="0" id="optionsRadios2" name="is_show">不显示</label>
                          </div>
                      </div>
											<div class="form-group">
													<label class="col-sm-3 control-label">字体图标</label>
													<div class="col-sm-9">
															<input type="text" name="font_icon" value="{{ $category->font_icon }}" class="form-control"  placeholder="请输入字体图标的标签">
															<span class="help-block m-b-none">字体图标由完成的i标签组成<br>当前栏目分类的字体图片样式：<span class="text-danger">{!! $category->font_icon !!}</span></span>
													</div>
											</div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">导航小图片</label>
                          <div class="col-sm-9">
                              @if(!empty($category->image_small))
                              <img class="img-thumbnail" src="{{ $category->image_small }}" width="41px" height="41px" alt="">
                              @else
                              <img class="img-thumbnail" src="/adminstyle/img/nopicture.jpg" alt="">
                              @endif
                              <input type="file" name="image_small" class="form-control">
                              <span class="help-block m-b-none text-warning"><strong>提示：</strong>上传图片的大小为：41px*41px</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">魔方左侧大图片</label>
                          <div class="col-sm-9">
                              @if(!empty($category->image_magic_left))
                              <img class="img-thumbnail" src="{{ $category->image_magic_left }}" width="320px" height="320px" alt="">
                              @else
                              <img class="img-thumbnail" src="/adminstyle/img/nopicture.jpg" alt="">
                              @endif
                              <input type="file" name="image_magic_left" class="form-control">
                              <span class="help-block m-b-none text-warning"><strong>提示：</strong>上传图片的大小为：320px*320px</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">魔方右侧正方形图片</label>
                          <div class="col-sm-9">
                              @if(!empty($category->image_magic_top))
                              <img class="img-thumbnail" src="{{ $category->image_magic_top }}" width="160px" height="160px" alt="">
                              @else
                              <img class="img-thumbnail" src="/adminstyle/img/nopicture.jpg" alt="">
                              @endif
                              <input type="file" name="image_magic_top" class="form-control">
                              <span class="help-block m-b-none text-warning"><strong>提示：</strong>上传图片的大小为：160px*160px</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">魔方右侧长方形图片</label>
                          <div class="col-sm-9">
                              @if(!empty($category->image_magic_buttom))
                              <img class="img-thumbnail" src="{{ $category->image_magic_buttom }}" width="320px" height="160px" alt="">
                              @else
                              <img class="img-thumbnail" src="/adminstyle/img/nopicture.jpg" alt="">
                              @endif
                              <input type="file" name="image_magic_buttom" class="form-control">
                              <span class="help-block m-b-none text-warning"><strong>提示：</strong>上传图片的大小为：320px*160px</span>
                          </div>
                      </div>
                  </div>

                  <div style="clear:both;"></div>
                  <div class="hr-line-dashed"></div>

                  <h3 class="text-center"><strong>PC端</strong></h3>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">链接</label>
                          <div class="col-sm-9">
                              <input type="text" name="link_pc" required value="{{ $category->link_pc }}" class="form-control" placeholder="请输入网址链接">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">显示状态</label>
                          <div class="col-sm-9">
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_pc == 1) checked @endif value="1" id="optionsRadios1" name="is_show_pc">显示</label>
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_pc == 0) checked @endif value="0" id="optionsRadios2" name="is_show_pc">不显示</label>
                          </div>
                      </div>
                  </div>

                  <div style="clear:both;"></div>
                  <div class="hr-line-dashed"></div>

                  <h3 class="text-center"><strong>移动端</strong></h3>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">链接</label>
                          <div class="col-sm-9">
                              <input type="text" name="link_wx" required value="{{ $category->link_wx }}" class="form-control" placeholder="请输入网址链接">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">显示状态</label>
                          <div class="col-sm-9">
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_wx == 1) checked @endif value="1" id="optionsRadios1" name="is_show_wx">显示</label>
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_wx == 0) checked @endif value="0" id="optionsRadios2" name="is_show_wx">不显示</label>
                          </div>
                      </div>
                  </div>

                  <div style="clear:both;"></div>
                  <div class="hr-line-dashed"></div>

                  <h3 class="text-center"><strong>微信端</strong></h3>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">链接</label>
                          <div class="col-sm-9">
                              <input type="text" name="link_wechat" required value="{{ $category->link_wechat }}" class="form-control" placeholder="请输入网址链接">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">显示状态</label>
                          <div class="col-sm-9">
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_wechat == 1) checked @endif value="1" id="optionsRadios1" name="is_show_wechat">显示</label>
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_wechat == 0) checked @endif value="0" id="optionsRadios2" name="is_show_wechat">不显示</label>
                          </div>
                      </div>
                  </div>

                  <div style="clear:both;"></div>
                  <div class="hr-line-dashed"></div>

                  <h3 class="text-center"><strong>QQ端</strong></h3>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">链接</label>
                          <div class="col-sm-9">
                              <input type="text" name="link_qq" required value="{{ $category->link_qq }}" class="form-control" placeholder="请输入网址链接">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">显示状态</label>
                          <div class="col-sm-9">
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_qq == 1) checked @endif value="1" id="optionsRadios1" name="is_show_qq">显示</label>
                              <label class="radio-inline">
                                  <input type="radio" @if($category->is_show_qq == 0) checked @endif value="0" id="optionsRadios2" name="is_show_qq">不显示</label>
                          </div>
                      </div>
                  </div>

                  <div style="clear:both;"></div>
                  <div class="hr-line-dashed"></div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="col-sm-12 col-sm-offset-5">
                              <button class="btn btn-primary" type="submit">保存内容</button>
                          </div>
                      </div>
                  </div>
              </form>

              <div class="form-group">
                  <label class="col-sm-3 control-label">关于网址链接的说明</label>
                  <div class="col-sm-9">
                      <p class="form-control-static">系统会根据不同的访问终端来返回对应的链接，以此实现不通过的终端访问不同的内容。</p>
                  </div>
              </div>

            </div>
          </div>
        </div><!-- ibox-content -->
    </div>
  </div>
</div>
@stop
@section('footJs')

@stop
