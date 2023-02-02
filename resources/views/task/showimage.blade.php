<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">All Images with Water Mark</h2>
  <table class="table">
    <thead class="thead-dark mt-5">
      <tr>
        <th>ID</th>
        <th>Image with Watermark</th>
        <th><a href="{{route('image_upload')}}" class="btn btn-primary" >Upload Image</a></th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
      <tr>
        <td>{{$d->id}}</td>
        <td><img src="{{ asset(Storage::url($d->image)) }}" alt="" width="600px" height="600px"></td> 
      </tr>
    @endforeach
    </tbody>
  </table>
  
</div>

</body>
</html>
