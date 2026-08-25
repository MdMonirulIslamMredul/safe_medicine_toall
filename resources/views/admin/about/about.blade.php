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

                <div class="card-body ">
                    <form class="form-horizontal" action="{{route('store.about')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        @if($about_data!=null)
                        <input type="hidden" value="{{$about_data->id}}" name="id">
                        @endif

                        <h3>Front page information</h3>
                        {{-- <div class="form-group">
                            <label>Title English</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name" id="foundation_name" placeholder="title English">
                        </div>
                        <div class="form-group">
                            <label>Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name_bangla" id="foundation_name_bangla" placeholder="title Bangla">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Foundation Name Arabic</label>
                            <input type="text" class="form-control" rows="5" name="foundation_name_ab" id="foundation_name_ab" placeholder="Foundation Name Arabic">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director Name English</label>
                            <input type="text" class="form-control" rows="5" name="director_name" id="director_name" placeholder="Director Name" >
                        </div>
                        <div class="form-group">
                            <label>Director Name Bangla</label>
                            <input type="text" class="form-control" rows="5" name="director_name_bangla" id="director_name_bangla" placeholder="Director Name Bangla" >
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director Name Arabic</label>
                            <input type="text" class="form-control" rows="5" name="director_name_ab" id="director_name_ab" placeholder="Director Name Arabic" >
                        </div> --}}
                        {{-- <div class="form-group">
                            <label> Image</label>
                            <input type="file" class="form-control" rows="5" name="foundation_image" id="foundation_image" placeholder="Foundation Image">
                        </div> --}}
                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="About Title" required>
                        </div>
                        <div class="form-group">
                            <label>About Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title_bangla" placeholder="About Title Bangla" required>
                        </div>
                        {{-- <div class="form-group">
                            <label>About Title Arabic</label>
                            <input type="text" class="form-control" rows="5" name="title_ab" id="title_ab" placeholder="About Title Arabic" required>
                        </div> --}}
                        <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description English</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_eng" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Bangla</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_bangla" ></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>About Description Arabic</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_ab" ></textarea>
                        </div> --}}
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td><img src="{{ asset($about->image1) }}" style="height: 100px"></td>
                            <td>{{ $about->title ?? null }}</td>
                            <td>{!! $about->details1 ?? null !!}</td>

                            <td>
                                <a href="{{ route('edit.about',['id'=>$about->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
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
