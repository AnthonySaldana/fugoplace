<!DOCTYPE html>
<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
	<style type="text/css">
	.alert-success{
		color:#66ff33;
	}

	.alert-danger li{
		color:red;
	}
	</style>

  </head>
  <body id="meal-editor">
						

	<script>
		
		function confirmDeletion() {

		    return confirm("Delete this meal?");
		
		}


		jQuery(document).ready(function closeElement(){
				$(this).toggle('show');

		});
	
	</script>

  @include('user.includes.userheader')

<div class="page-container">
  	<div class="container">
  		 @include('common.errors')

  		 <div class="flash-message">
		    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		      @if(Session::has('alert-' . $msg))

		      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
		      @endif
		    @endforeach
		 </div> <!-- end .flash-message -->

  	</div>

 		<div class="meal-table-container" >
		    <table style="width:100% max-width:700px; float:left;" class="meal-edit-table">
			    <!--<thead>
				  <tr>
				  	<th>ID: </th>
				    <th>Name: </th>
				    <th>Email: </th> 
				    <th>Role: </th>
				    <th>Status: </th>
				    <th>Joined: </th>
				    <th>Status: </th>
				  </tr>
				</thead>-->

				<tbody>
					<tr>
						<td><h3><u>User Role Settings</u></h3></td>
					</tr>
					<tr>
						<td>User Role 0 (label):</td>
						<td>{{ $user_role_names[0] }}</td>
					</tr>
					<tr>
						<td>User Role 1 (label):</td>
						<td>{{ $user_role_names[1] }}</td>
					</tr>
					<tr>
						<td>User Role 2 (label):</td>
						<td>{{ $user_role_names[2] }}</td>
					</tr>

					<tr>
						<td><h3><u>User Status Settings</u></h3></td>
					</tr>
					<tr>
						<td>User status 0 (label):</td>
						<td>{{ $user_status_names[0] }}</td>
					</tr>
					<tr>
						<td>User status 1 (label):</td>
						<td>{{ $user_status_names[1] }}</td>
					</tr>
					<tr>
						<td>User status 2 (label):</td>
						<td>{{ $user_status_names[2] }}</td>
					</tr>
				</tbody>

			</table>
		</div>
		    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
</div>

  </body>
</html>