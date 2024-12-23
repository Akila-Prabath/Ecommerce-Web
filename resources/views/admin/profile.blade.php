@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Profile</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.index')}}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Profile</div>
                </li>
            </ul>
        </div>
        <div class="tf-section-2">
        <div class="wg-box mb-27">
            <div class="col-lg-12">
                <div class="page-content my-account__edit">
                    <div class="my-account__edit-form">
                        <form name="account_edit_form" action="{{route('admin.profile.update')}}" method="POST"
                            class="form-new-product form-style-1 needs-validation"
                            novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                            <fieldset class="name">
                                <div class="body-title pb-3">Name <span class="tf-color-1">*</span>
                                </div>
                                <input class="flex-grow" type="text" placeholder="Full Name"
                                    name="name" tabindex="0" value="{{Auth::user()->name}}" aria-required="true"
                                    required="">
                            </fieldset>                               
                            <fieldset class="name">
                                <div class="body-title pb-3">Email Address <span
                                    class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Email Address"
                                    name="email" tabindex="0" value="{{Auth::user()->email}}" aria-required="true"
                                    required="" readonly>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                                    <div class="my-3">
                                        <h5 class="text-uppercase mb-0">Change Password</h5>
                                    </div>
                            </div>                           
                                <fieldset class="name">
                                <div class="body-title pb-3">Old password <span
                                    class="tf-color-1">*</span>
                                </div>
                                    <input class="flex-grow" type="password"
                                        placeholder="Old password" id="old_password"
                                        name="old_password" aria-required="true"
                                        required="">
                                </fieldset>
                                <fieldset class="name">
                                    <div class="body-title pb-3">New password <span
                                        class="tf-color-1">*</span>
                                    </div>
                                    <input class="flex-grow" type="password"
                                            placeholder="New password" id="new_password"
                                            name="new_password" aria-required="true"
                                            required="">
                                </fieldset>
                                <fieldset class="name">
                                    <div class="body-title pb-3">Confirm new password <span
                                        class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="password"
                                            placeholder="Confirm new password" cfpwd=""
                                            data-cf-pwd="#new_password"
                                            id="new_password_confirmation"
                                            name="new_password_confirmation"
                                            aria-required="true" required="">
                                    <div class="invalid-feedback">Passwords did not match!
                                    </div>
                                </fieldset>                                                                  
                            <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit"
                                            class="btn btn-primary tf-button w208">Save
                                            Changes</button>
                                    </div>
                            </div>
                        </form>                       
                        @if(session('profile_update'))
                            <div class="alert alert-success mt-3">
                                <p>{{ session('profile_update') }}</p>
                            </div>
                        @endif
                        @if($errors->hasBag('profile_update'))
                            <div class="alert alert-danger mt-3">
                                <ul style="list-style-type:none;">
                                    @foreach($errors->getBag('profile_update')->all() as $error)
                                        <li><p>{{ $error }}</p></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>           
            </div>        
        </div>
        <div class="wg-box mb-27">
            <div class="col-lg-12">
                <form name="profile_photo" action="{{route('admin.profile.photo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="my-3 pb-20">
                            <h5 class="text-uppercase mb-0">Change Profile Photo</h5>
                        </div>
                    </div>
                    <div class="col-md-12 mb-50">
                        <fieldset>
                            <div class="body-title pb-40">Upload images <span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                @if(Auth::user()->profile_photo_path)
                                <div class="item" id="imgpreview">
                                    <img src="{{asset('images/avatar')}}/{{Auth::user()->profile_photo_path}}" class="effect8" alt="">
                                </div>
                                @endif
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="upload-1.html" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*" required>
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <div class="my-3">
                            <button type="submit"
                                class="btn btn-primary tf-button w208">Update Photo</button>
                        </div>
                    </div>
                    </div>
                </form>
                @if(session('photo_update'))
                    <div class="alert alert-success mt-3">
                        <p>{{ session('photo_update') }}</p>
                    </div>
                @endif
                @if($errors->hasBag('photo_update'))
                    <div class="alert alert-danger mt-3">
                        <ul style="list-style-type:none;">
                            @foreach($errors->getBag('photo_update')->all() as $error)
                                <li><p>{{ $error }}</p></li>
                            @endforeach
                        </ul>
                    </div>
                @endif            
            </div>
        </div>
        </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $("#myFile").on("change",function(e){
                const photoInp = $("#myFile");
                const [file] = this.files;
                if(file){
                    $("#imgpreview img").attr('src',URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });
        });
    </script>
@endpush