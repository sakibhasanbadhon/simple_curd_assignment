<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Software Engineer Intern Attachment </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }
        a,button{
            border-radius: 0!important;
        }
    </style>
  </head>
  <body>

{{--
    <div class="container">
        <div class="row">
            <col-12></col-12>
        </div>
    </div> --}}



    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session()->get('success'))
                <div class="alert alert-success rounded-0 alert-dismissible fade show py-2" role="alert">
                    <strong>Success</strong> {{ session()->get('success') }}
                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="card rounded-0 mt-4">
                    <div class="card-header bg-primary rounded-0">
                        <h4 class="card-title mb-0 text-light justify-content-between align-items-center d-flex">
                            @isset($edit)
                                Edit Data
                            <a class="text-white btn btn-danger btn-sm"  href="{{ url('/') }}">Back</a>
                            @else
                                Create Data
                            @endisset
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($edit) ? route('assignments.update',$edit->id) : route('assignments.store') }}" enctype="multipart/form-data">
                            @csrf
                            @isset($edit)
                            @method('PUT')
                            @endisset
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="name" class="form-control rounded-0 @error('name') is-invalid @enderror" id="name" placeholder="enter name.." value="{{ $edit->name ?? old('name') }}">
                                  @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" placeholder="enter email.." value="{{ $edit->email ?? old('name') }}">
                                  @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image:</label>
                                <div class="col-sm-10">
                                  <input type="file" name="image" class="form-control rounded-0 @error('image') is-invalid @enderror" id="image">
                                  <small class="text-secondary"> File type: image, mimes: jpeg,jpg,png </small>
                                  @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @isset($edit)
                                    <img src="{{ asset('uploads/'.$edit->image) }}" width="70" height="70" class="mt-1" alt="">
                                @endisset
                                </div>
                            </div>


                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" @isset($edit) {{ $edit->gender == 'Male' ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="male"> Male </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" @isset($edit) {{ $edit->gender == 'Female' ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="female"> Female </label>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Skills:</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Laravel" id="laravel" @isset($edit) {{ in_array('Laravel',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="laravel">Laravel</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Codeiniter" id="codeiniter" @isset($edit) {{ in_array('Codeiniter',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="codeiniter">Codeiniter</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Ajax" id="ajax" @isset($edit) {{ in_array('Ajax',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="ajax">Ajax</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="VUE JS" id="vuejs" @isset($edit) {{ in_array('VUE JS',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="vuejs">VUE JS</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="MySQL" id="mysql" @isset($edit) {{ in_array('MySQL',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="mysql">MySQL</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="skill[]" type="checkbox" value="API" id="api" @isset($edit) {{ in_array('API',json_decode($edit->skills)) ? 'checked' : '' }} @endisset>
                                        <label class="form-check-label" for="api">API</label>
                                    </div>
                                    @error('skill')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror




                                </div>
                            </fieldset>

                            <div class="text-end">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card rounded-0 mt-4">
                    <div class="card-header bg-primary rounded-0">
                        <h4 class="cart-title mb-0 text-light">
                            List Of Data
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-bordered text-center table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Skills</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allData as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td><img width="50" height="50" src="{{ asset('uploads/'.$item->image)}}"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>
                                                <ol class="m-0 text-start">
                                                    @foreach (json_decode($item->skills) as $skill)
                                                    <li>{{ $skill }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="{{ route('assignments.edit',$item->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('assignments.destroy',$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="delete_data({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <span class="text-danger">Nothing Data Found</span>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            {{ $allData->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function delete_data(data_id){
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-'+data_id).submit();
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>
  </body>
</html>






