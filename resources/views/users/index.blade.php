<!DOCTYPE html>

@extends('layouts.app')

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>User Index</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	</head>
	<body>
		@section('content')


<body>
    
<h1>Welcome to the User Index</h1>

<div class="pull-right mb-2">
  <a class="btn btn-success" href="/users/create"> Create User</a>
</div>	


      
<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Street Name</th>
      <th scope="col">Postal Code</th>
      <th scope="col">City</th>
      <th scope="col">Phone</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Email</th>
    </tr>
  
  @foreach($users as $user)
  <tr>
    <td>{{$user->first_name}}</td> 
    <td>{{$user->last_name}}</td>
    <td>{{$user->street_name}}</td>
    <td>{{$user->city}}</td>
    <td>{{$user->postal_code}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->date_of_birth}}</td>
    <td>{{$user->email}}</td>


    <td> 
        <a href="{{'edit/' .$user['id'] }}" class="btn btn-primary btn-sm" >Edit</a>
    </td> 
    <td>
        <a href="{{'delete/' .$user['id'] }}" class="btn btn-danger btn-sm" >Delete</a>
    </td>



   

  </thead>
  </tbody>
  @endforeach
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    {{-- <li class="page-item"><a class="page-link" href="{{$persons->onFirstPage()}}">First Page</a></li> --}}
    <li class="page-item"><a class="page-link" href="{{$users->previousPageUrl()}}">Previous</a></li>
    <li class="page-item"><a class="page-link"> Page: {{$users->currentPage()}} / {{$users->lastPage()}} </a></li> 
    <li class="page-item"><a class="page-link" href="{{$users->nextPageUrl()}}">Next</a></li>
    {{-- <li class="page-item"><a class="page-link" href="{{$persons->lastPage()}}">Last Page</a></li> --}}
    
  </ul>
</nav>







	@endsection	
</body>
</html>