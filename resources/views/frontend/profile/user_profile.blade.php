@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            
            {{-- START USER SIDEBAR --}}
            @include('frontend.common.user_sidebar')
            {{-- END USER SIDEBAR --}}
            
            <div class="col-md-2">
                
            </div> 

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><strong>Update Your Profile<strong></h3>

                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Name <span></span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span></span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span></span></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">User Image <span></span></label>
                                <input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div> 

        </div> 
    </div> 
</div>


@endsection
