@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Room Type Data</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('room.type.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="roomTypeTitle">Room Type Title<span class="text-danger">*</span></label>
                        <input type="text" name="room_type_title" value="{{ $edit_data->room_type_title }}" class="form-control" id="roomTypeTitle" required/>
                    </div>
                    <div class="form-group">
                        <label for="roomTypeDetails">Room Type Details<span class="text-danger">*</span></label>
                        <textarea name="room_type_details" class="form-control" id="" cols="15" rows="5">
                            {{ $edit_data->room_type_details }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="roomTypePrice">Room Type Price<span class="text-danger">*</span></label>
                        <input type="text" name="room_type_price" value="{{ $edit_data->room_type_price }}" class="form-control" id="roomTypePrice" required/>
                    </div>
                    <div class="form-group">
                        <label for="roomTypePrice">Gallery Images</label><br>
                       <div class="col-md-12 d-flex flex-row">
                            @foreach ($edit_data->roomTypeImages as $img)
                                <div class="card col-md-2 mr-2 imageCol{{ $img->id }}">
                                    <div class="card-body">
                                        <img src="{{ asset($img->img_src) }}" height="150px" width="150px" alt="">
                                        <p class="mt-2">
                                            <button type="button" class="btn btn-danger btn-sm delete-image" data_image_id="{{ $img->id }}"><i class="fa fa-trash"></i></button>
                                        </p>
                                        {{-- <p class="mt-2">
                                            <button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                        </p> --}}
                                    </div>
                                </div>
                            @endforeach
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="gallery">Add New Gallery Images</label>
                        <input type="file" multiple name="images[]" class="form-control" id="gallery" required/>
                    </div>
                    <div class="form-group">
                        <label for="preparedBy">Prepared By<span class="text-danger"></span></label>
                        <input type="text" name="prepared_by" value="{{ Auth::user()->name; }}" class="form-control" id="preparedBy" readonly />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.delete-image').on('click',function(e){
                e.preventDefault();

                let img_id = $(this).attr('data_image_id');
                let vm=$(this);

                let conf = confirm('Are you sure..?');
                if( conf == true){
                    $.ajax({
                        url: '/room-type-image/' + img_id,
                        // data:{

                        // },
                        dataType:'json',
                        beforeSend:function(){
                            vm.addClass('disabled');
                        },
                        success:function(res){
                            console.log(res);
                            $(".imageCol"+img_id).remove();
                            vm.removeClass('disabled');
                        }
                    });
                    // return true;
                }else{
                    return false;
                }

               
            });
        });
    </script>
@endsection

@endsection