@extends("layouts.app");
@section('content')

<div class="container">
    <div class="row">
            <div class="text-center">
            	<h1 class="lead">Make Something Great</h1>
            </div>
            <form class="form-horizontal" role="form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group {{$errors->has('title')?'has-error':''}}">

                    <label for="title" class="control-label col-md-4">Title:</label>
                   <div class="col-md-6">
                        <input type="text" id="title" name="title" class="form-control" required>
                        @if($errors->has("title"))
                            <span class="alert alert-danger"> 
                             <strong>Whoops!</strong>
                             there were something wrong with your input.
                             <p>{{$errors->first('title')}}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{$errors->has('slug')?'has-error':''}}">

                    <label for="slug" class="control-label col-md-4">Slug:</label>
                    <div class="col-md-6">
                      <input type="text" name="slug" class="form-control" required>
                        @if($errors->has("slug"))
                         <span class="help-block">
                                    <strong>whoops!</strong>
                                    there were something wrong with your input.
                                    <p>{{$errors->first('slug')}}</p>
                          </span>
                        @endif
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
                <div class="form-group {{$errors->has('body')?'has-error':''}}">
                    
            	   <label for="body" class="control-label col-md-4">Body:</label>
                  <div class="col-md-6">
                    <textarea  id="body"  name="body" class="form-control" required></textarea>  
                      @if($errors->has('body'))
                      <span class="help-block">
                       <strong>whoops!</strong>
                        there where something wrong with your input.
                        <p>{{$errors->first('body')}}</p>
                      </span>
                      @endif
                  </div>
                <div>
                <div class="form-group {{$errors->has('tags')?'has-error':''}}">
                  <label class="control-label col-md-4" for="tags">Tags:</label>
                  <div class="col-md-6">
                    <select name='tags[]' class="form-control" id="tags"  multiple="multiple">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('tags'))
                    <span class="help-block">
                      <strong>{{$errors}}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group {{$errors->has('categories')?'has-error':''}}">
                  <label class="control-label col-md-4" for="categories">Categories:</label>
                  <div class="col-md-6">
                    <select name='categories[]' class="form-control" id="categories"  multiple="multiple">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('tags'))
                    <span class="help-block">
                    <strong>{{$errors}}</strong> 
                     </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
            	       <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                    </div>
                </div>


            </form>




    </div>
</div>
@stop