<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Headerlink Include --}}
    @include('vendor.include.headerlink')
    {{-- @include('vendor.include.headerlink') --}}
    {{-- Headerlink Include --}}
</head>

<body>

    <div class="screen-overlay"></div>
    {{-- Sidebar include --}}
    @include('vendor.include.sidebar')
    {{-- Sidebar include --}}

    <main class="main-wrap">
        {{-- Header Include --}}
        @include('vendor.include.header')
        {{-- Header Unclude --}}

        <!-- profile section start// -->
        <div class="container">
            <div class="main-body">
                <!-- Breadcrumb -->
                <!-- /Breadcrumb -->
                <h2> Vendor Profile</h2>
                <div class="row gutters-sm">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <span>{{ Session::get('success') }}</span>
                    </div>
                    @endif
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('uploads/admin_create_vendor/'.Auth::guard('vendor')->user()->file) }}"
                                        alt="Vendor" class="rounded-circle" width="150" />
                                    <div class="mt-3">
                                        <h4>{{ Auth::guard('vendor')->user()->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">{{ Auth::guard('vendor')->user()->name }}</div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">{{ Auth::guard('vendor')->user()->email }}
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">{{ Auth::guard('vendor')->user()->mobile }}
                                    </div>
                                </div>
                                <hr />

                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                                class="fa fa-fw fa-edit"></i>Edit</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- profile section start// -->

        {{-- Footer Includes --}}
        @include('vendor.include.footer')
        {{-- Footer Includes --}}

        {{-- Modal Popup Edit --}}
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- <h6 class="alert alert-success"></h6> -->
                    <div class="modal-body">
                        <form action="{{ route('profile_update', Auth::guard('vendor')->user()->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="text-danger"></span>
                                    <label for="pic">Profile Pic </label>
                                    <input type="hidden" name="id" class="form-control"
                                        value="{{ Auth::guard('vendor')->user()->id }}">
                                    <input type="file" class="form-control" name="profile_image"
                                        value="{{ Auth::guard('vendor')->user()->profile_image }}">
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <span class="text-danger"></span>
                                    <label for="fname">Full Name </label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ Auth::guard('vendor')->user()->name }}">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <span class="text-danger"></span>
                                    <label for="email">Email Id</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ Auth::guard('vendor')->user()->email }}">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <span class="text-danger"></span>
                                    <label for="contact">Contact No</label>
                                    <input type="text" class="form-control" name="mobile"
                                        value="{{ Auth::guard('vendor')->user()->mobile }}" maxlength="10"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <span class="text-danger"></span>
                                    <label for="pass">New Password</label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ Auth::guard('vendor')->user()->password }}"
                                        placeholder="Enter Your New Password">
                                </div>

                                <div class="modal-footer mt-3">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="butsave">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Popup end --}}


    </main>
</body>

</html>