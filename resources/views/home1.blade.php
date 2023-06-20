<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    
   

    <div class="container">
    <h3 class="mt-5 justify-content-center text-muted">Total Number of :{{ $count }}</h3>
    
    <form action="{{ route('logout') }}" method="post" class="text-right">
        @csrf
        @method('DELETE')
        <button class="btn btn-info ">Logout</button>
    </form>

    
      <!-- <table class="table table-hover mt-5 table-dark"> -->
      <table class="table mt-5 table-dark table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mo.Number</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Images</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>


        @foreach($form as $row)

        <tr>
          <td>{{ $loop->index+1 }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->number }}</td>
          <td>{{ $row->country }}</td>
          <td>{{ $row->state }}</td>
          <td>{{ $row->city }}</td>

          <td>
              <img src="imges/{{ $row->images }}" alt="this is not Present"  class="rounded-circle" width="50" height="50"> 
          </td>
          <td>{{ $row->created_at }}</td>	
          <td>{{ $row->updated_at }}</td>

          <td>
              <a href="/{{ $row->id }}/edit" class="btn btn-info btn-sm">Edit</a> ||
              <a href="/{{ $row->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
          </td>
      </tr>

        @endforeach
  </tbody>
</table>
</div>

</body>
</html>