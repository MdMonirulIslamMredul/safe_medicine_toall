@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card-body">
                    <form class="form-horizontal" action="{{route('update.about')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <input type="hidden" value="{{$about->id}}" name="id">

                        <h3>Front page information</h3>
                        {{-- <div class="form-group">
                            <label>Title English</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name" id="foundation_name" name="title" value="{{$about->foundation_name}}">
                        </div>
                        <div class="form-group">
                            <label>Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name_bangla" id="foundation_name_bangla" value="{{$about->foundation_name_bangla}}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Foundation Name Arabic</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name_ab" id="foundation_name_ab" placeholder="Foundation Name Arabic" value="{{$about->foundation_name_ab}}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director Name English</label>
                            <input type="text" class="form-control" rows="5" name="director_name" id="director_name" name="title" value="{{$about->director_name}}" >
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director Name Bangla</label>
                            <input type="text" class="form-control" rows="5" name="director_name_bangla" id="director_name_bangla" value="{{$about->director_name_bangla}}" >
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director Name Arabic</label>
                            <input type="text" class="form-control" rows="5" name="director_name_ab" id="director_name_ab" value="{{$about->director_name_ab}}" >
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" rows="5" name="foundation_image" id="foundation_image">
                            <img src="{{asset($about->foundation_image)}}" class="mb-2" height="100" width="100" alt="">
                        </div> --}}
                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" class="form-control" rows="5" name="title" value="{{$about->title}}" id="title" placeholder="Service Title">
                        </div>
                        <div class="form-group">
                            <label>About Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title_bangla" value="{{$about->title_bangla}}" required>
                        </div>
                        {{-- <div class="form-group">
                            <label>About Title Arabic</label>
                            <input type="text" class="form-control" rows="5" name="title_ab" id="title_ab" value="{{$about->title_ab}}" required>
                        </div> --}}
                        <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control">
                            <img src="{{asset($about->image1)}}" class="mb-2" height="100" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                            <img src="{{asset($about->image2)}}" class="mb-2" height="100" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            <img src="{{asset($about->banner_image)}}" class="mb-2" height="100" width="100" alt="">
                        </div>

                        <div class="form-group">
                            <label> Description English</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_eng">
                                {!! $about->des_eng !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label> Description Bangla</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_bangla" >
                                {!! $about->des_bangla !!}
                            </textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label> Description Arabic</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_ab" >
                                {!! $about->des_ab !!}
                            </textarea>
                        </div> --}}

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
