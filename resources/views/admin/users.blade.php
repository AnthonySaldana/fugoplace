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

		    return confirm("Are you sure you want to delete this user? Deleting the user will also delete the assoicated invitation.");
		
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
		    @foreach (['danger', 'warning', 'success', 'info', 'sent', 'sent_error'] as $msg)
		      @if(Session::has('alert-' . $msg))

		      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
		      @endif
		    @endforeach

		     @if(Session::has('sent'))
		      <p class="alert alert-success">{{ Session::get('sent') }}</p>
		      @endif
		      @if(Session::has('sent_error'))
		      <p class="alert alert-danger">{{ Session::get('sent_error') }}</p>
		      @endif
		 </div> <!-- end .flash-message -->

  	</div>

		<div class="meal-table-container" >
			<table>
				<tr class="minimal-cell">
				<b><u>INVITATION MANAGEMENT</u></b>
				<form method="post" action="{{ url('/user/admin/invite') }}" >
					<td>
						<label for="email">Email: </label>
						<input type="text" name="email" />
					</td> 
					<td>
						<label for="role" >Role: </label>
						<select name="role"> 
						<option disabled value selected=""> -- select an option -- </option>
						<?php if( isset( $user_role ) ){
							if( 0 == $user_role ){
								?><option value="0" > <?php echo $user_role_names[0]; ?> </option>
								echo "<option value="1" > <?php echo $user_role_names[1]; ?> </option>
								<?php
							}elseif( 1 == $user_role ){
								echo "<option value=\"2\" > $user_role_names[2] </option>";
							}
						} ?>
						</select>
					</td>
					<td>
						<button type="submit" name="send" class="green-btn">Send Invite</button>
					</td>
					{{ csrf_field() }}

				</form>
				</tr>
			</table>
			<br/>
		    <table style="width:100%" class="meal-edit-table">
			    <thead>
				  <tr>
				  	<th>ID: </th>
				    <th>Key: </th>
				    <th>Sent By: </th> 
				    <th>Sent To: </th>
				    <th>Sent: </th>
				    <th>Status: </th>
				    <th>Manage: </th>
				  </tr>
				</thead>

				<tbody>

				<?php

					if( isset( $invitations ) ){

						foreach( $invitations as $invitation ){

							$invitation_id = $invitation['id'];
							$invitation_key = $invitation['key'];
							$invitation_sentby = $invitation['sent_by'];
							$invitation_sentto = $invitation['sent_to'];
							$invitation_status = $user_status_names[$invitation['status']];
							$invitation_sent = $invitation['sent'];

							?>
								<tr>
									<td> {{ $invitation_id }} </td>
								    <td>{{ $invitation_key }}</td>
								    <td>{{ $invitation_sentby }}</td> 
								    <td>{{ $invitation_sentto }}</td>
								    <td>{{ $invitation_sent }}</td>
								    <td><form action="{{ url('/user/admin/invitations') }}" method="post">
											<input type="hidden" name="id" value="{{ $invitation_id }}" />
											<select name="status"> 
											<option disabled value selected=""> -- select an option -- </option>
												<option value="1" <?php if( 1 == $invitation['status'] ){ echo "selected"; } ?> > Approve </option>
												<option value="0" <?php if( 0 == $invitation['status'] ){ echo "selected"; } ?> > Deny </option>
												<option value="2" <?php if( 2 == $invitation['status'] ){ echo "selected"; } ?> > pending </option>
											</select>
											<button type="submit" value="update" class="blue-btn">Update</button>
											{{ csrf_field() }}
										</form>
									</td>
									<td>
										<form action="{{ action('AdminInvitationsController@destroy') }}" method="post">
											<input type="hidden" name="id" value="{{ $invitation_id }}" />
											<input name="_method" type="hidden" value="DELETE" />
											<button type="submit" value="delete" class="delete-btn" onclick="return confirmDeletion();">Delete</button>
											{{ csrf_field() }}
										</form>
									</td>

								    
								</tr>
							<?php
							//echo "<pre>";print_r( $meal );echo "</pre>";

						}

					}
					
				 ?>
				</tbody>

			</table>
		</div>

		<hr/>

		<div class="container">

		<b><u>USER MANAGEMENT</u></b>
			<table style="width:100%;" >
				
				<br/>

				<?php if( isset( $isadmin ) && false != $isadmin  ){ ?>
				<!--<form method="post" action="{{ url('/user/admin/users') }}" >
				<tr class="minimal-cell">
					<td>Create User</td>
					<td>
						<label for="email">Email: </label>
						<input type="text" name="email" />
					</td> 
					<td>
						<label for="role" >Role: </label>
						<select name="role"> 
						<option disabled value selected=""> -- select an option -- </option>
						<?php if( isset( $user_role ) ){
							if( 0 == $user_role ){
								echo "<option value=\"0\" > $user_role_names[0] </option>";
								echo "<option value=\"1\" > $user_role_names[1] </option>";
							}elseif( 1 == $user_role ){
								echo "<option value=\"2\" > $user_role_names[2] </option>";
							}
						} ?>
						</select>
					</td>
					<td>
						<label for="role" >Status: </label>
						<select name="role"> 
						<option disabled value selected=""> -- select an option -- </option>
						<?php
								echo "<option value=\"0\" > $user_status_names[0] </option>";
								echo "<option value=\"1\" > $user_status_names[1] </option>";
								echo "<option value=\"2\" > $user_status_names[2] </option>";
						?>
						</select>
					</td>
				</tr>
				<br/>
				<tr class="minimal-cell">
				<td></td>
					<td><label for="new_user_email">name: </label> <input type="text" name="new_user_name" /></td>
				</tr>
				<br/>
				<tr class="minimal-cell">
					<td><button type="submit" name="send" class="blue-btn">Create User</button></td>
				</tr>
				{{ csrf_field() }}
				</form>-->
				<?php } ?>

			</table>

	</div>
	<br/><hr/>

 		<div class="meal-table-container" >
		    <table style="width:100%;" class="meal-edit-table">
			    <thead>
				  <tr>
				  	<th>ID: </th>
				    <th>Name: </th>
				    <th>Email: </th> 
				    <th>Role: </th>
				    <th>Joined: </th>
				    <th>Status: </th>
				    <th>Manage: </th>
				  </tr>
				</thead>

				<tbody>

				<?php

					if( isset( $users ) ){

						foreach( $users as $user ){

							$user_id = $user['id'];
							$user_name = $user['name'];
							$user_email = $user['email'];

							$user_role = $user_role_names[$user['role']]; //pretty name for the user role

							//$user_role = $user['role'];
							$user_status = $user_status_names[$user['status']]; //pretty name for the status names
							$user_joined = $user['joined'];

							?>
								<tr>
									<td> {{ $user_id }} </td>
								    <td>{{ $user_name }}</td>
								    <td>{{ $user_email }}</td> 
								    <td>{{ $user_role }}</td>
								    <td>{{ $user_joined }}</td>
								    <td>
									    <form action="{{ action('AdminUsersController@update', array($user_id) ) }}" method="post">
											<input type="hidden" name="id" value="{{ $user_id }}" />
											<input name="_method" type="hidden" value="PUT" />
											<select name="status"> 
											<option disabled value selected=""> -- select an option -- </option>
												<option value="1" <?php if( 1 == $user['status'] ){ echo "selected"; } ?> > Approve </option>
												<option value="0" <?php if( 0 == $user['status'] ){ echo "selected"; } ?> > Deny </option>
												<option value="2" <?php if( 2 == $user['status'] ){ echo "selected"; } ?> > pending </option>
											</select>
											<button type="submit" value="delete" class="blue-btn">Update</button>
											{{ csrf_field() }}
										</form>
									</td>
									<td>
										<form action="{{ action('AdminUsersController@destroy', array($user_id) ) }}" method="post">
											<input type="hidden" name="id" value="{{ $user_id }}" />
											<input name="_method" type="hidden" value="DELETE" />
											<button type="submit" value="delete" class="delete-btn" onclick="return confirmDeletion();">Delete</button>
											{{ csrf_field() }}
										</form>
									</td>
								</tr>
							<?php
							//echo "<pre>";print_r( $meal );echo "</pre>";

						}

					}
					
				 ?>
				</tbody>

			</table>
		</div>
		    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
</div>

  </body>
</html>