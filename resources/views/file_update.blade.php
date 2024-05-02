<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">Update : File Upload</h2>
            </div>
        </div>
        {{-- {{dd($fileUploads->id)}} --}}
        <form action="{{ route('fileupload.update', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    {{-- {{dd($data->file_name)}} --}}
                    <img id="output" class="img-thumbnail img-fluid" src="{{ asset('/storage/'. $data->file_name) }}" alt="">
                </div>
                <div class="col-9">
                    <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" name="photo" accept=".jpg,.png,.jpeg">
                    @error('photo')
                      <div class="alert alert-danger mb-1 mt-1">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="col-12">
                    <input type="submit" value="Update" class="btn btn-sm btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>
</html>