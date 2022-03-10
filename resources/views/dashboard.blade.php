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
                    <h3 class="text-center">Welcome back! <strong>{{ Auth::user()->name }}</strong> Welcome To Thomz Market</h3>
                </div>
            </div> 

        </div> 
    </div> 
</div>


@endsection
