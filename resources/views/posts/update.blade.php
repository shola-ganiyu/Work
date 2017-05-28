@extends("layouts.app");
@section('content')
<div class="container">
	<div class="row">

		<div class="text-center">
            	<h1 class="lead">update/edit Post</h1>
            </div>
            <form class="form-horizontal" role="form" method="post" action="{{route('posts.update',$posts->id)}}" enctype="multipart/form-data">
                {{method_field("PUT")}} {{csrf_field()}}
                <div class="form-group">
                    @if(count($errors)>0)
                       <span class="alert alert-danger"> <strong>Whoops!</strong>
                        there were something wrong with your input.
                        <li>{{$errors}}</li>
                       </span>
                    @endif

            	   <label for="title" class="control-label col-md-4">Title:</label>
                   <div class="col-md-6">
                        <input type="text" id="title" name="title" value="{{$posts->title}}" class="form-control" required>
                   </div>
                </div>
                <div class="form-group{{$errors->has('slug')?'has-error':''}}">
                    @if($errors->has('slug'))
                        <span class="help-block">
                            <strong>whoops!</strong>
                            there were something wrong with your input.
                            <li>{{$errors}}</li>
                        </span>
                    @endif
                	<label for="slug" class="control-label col-md-4">Slug:</label>
                    <div class="col-md-6">
                        <input type="text" name="slug" value="{{$posts->slug}}" class="form-control">
                    </div>
                </div>
                <div class="form-group {{$errors->has('img')?'has-error':''}}">
                  <label for='img' class="control-label col-md-4">Upload Image:</label>
                  <div class="col-md-6">
                  <input type="file" name="img" id='img' class="form-control">
                  @if($errors->has('img'))
                  <span class="help-block">
                    <strong>{{$errors}}</strong>
                  </span>
                  @endif
                  </div>
                </div>
                <div class="form-group{{$errors->has('body')?'has-error':""}}">
                    @if($errors->has("body"))
                        <span class="help-block">
                            <strong>whoops!</strong>
                            there where something wrong with your input.
                            <li>{{$errors}}</li>
                        </span>
                    @endif
            	   <label for="body" class="control-label col-md-4">Body:</label>
                   <div class="col-md-6">
                        <textarea  class="form-control" name="body" id="body" required></textarea>  
                   </div>
                <div>
                <div class="form-group {{$errors->has('tags')?'has-error':''}}">
                  <label class="control-label col-md-4" for="tags">Tags:</label>
                  <div class="col-md-6">
                    <select name='tags[]' class="form-control" id="tags" multiple="multiple">
                      @foreach($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('tags'))
                        <span class="help-block">
                            <strong>{{$errors->first('tags')}}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group {{$errors->has('categories')?'has-error':''}}">
                  <label class="control-label col-md-4" for="categories">Tags:</label>
                  <div class="col-md-6">
                    <select name='categories[]' class="form-control" id="categories" multiple="multiple">
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <span class="help-block">
                            <strong>{{$errors->first('categories')}}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-12 col-md-6 col-md-offset-6">
                	       <button type="submit" class="btn btn-success">Update Post</button>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-8 col-md-offset-6">
                               <a  href="{{route('posts.show',$posts->id)}}" class="btn btn-info">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            
            </form>




		



	</div>



</div>





@stop