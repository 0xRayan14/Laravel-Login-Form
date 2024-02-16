@extends('layout')

@section('title', "TrekBlog - Profile")

@section('body')
    <div class="container">
        <h1 class="text-center">Your profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
