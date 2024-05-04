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
                <h2 class="text-center mb-2">File Upload</h2>
            </div>
        </div>
        <form action="{{ route('fileupload.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <input type="file" name="photo" accept=".jpg,.png,.jpeg">
                    @error('photo')
                      <div class="alert alert-danger mb-1 mt-1">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-sm btn-primary">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-6">
                @if(session('status'))
                   <div class="alert alert-success">
                      {{ session('status')}}
                   </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach($fileUploads as $image)
                <div class="col-2">
                    <img class="img-fluid img-thumbnail" src="{{ asset('/storage/'. $image->file_name)}}" alt="" width="100%" height="100%">
                    <form action="{{ route('fileupload.destroy', $image->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mb-3">Delete</button>
                    </form>
                    <a href="{{ route('fileupload.edit', $image->id) }}" class="btn btn-warning">Update</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>