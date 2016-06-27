<!DOCTYPE html>
<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
	<style type="text/css">
	

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
  	<?php
  	 	if( isset( $user_id )){
  			echo "Showing form belonging to: ".  $user_id;
  		} 
  	?>

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

  	<div class="container">

		<form method="post" action="{{ url('/user/meal-planner') }}" >

			<table style="width:100%" >
				<tr class="minimal-cell">
					<td>
						<label for="meal_date">Date: </label>
						<input type="date" name="meal_date" >
					</td>

					<td>
						<label for="recipe_select">Recipe</label>
						<select name="recipe_select" >

						<option disabled selected value> -- select an option -- </option>
						<?php 
						if( isset( $recipes ) ){

						foreach( $recipes as $recipe ){

						$recipe_id = $recipe->id;

						$recipe_name = $recipe->title;

						?>

						<option value="{{ $recipe_id }}" > {{ $recipe_name }} - {{ $recipe_id }} </option>

						<?php

						}

						}
						?>

						</select>
					</td> 
					<td>
						<label for="meal" >Meal: </label>
						<select name="meal"> 
						<option disabled selected value> -- select an option -- </option>
						<option Value="B" > Breakfast </option>
						<option value="BR" > Snack/Break </option>
						<option value="L" > Lunch </option>
						</select>
					</td>
					<td>
						<button type="submit" name="send" class="submit-btn">Save</button>
					</td>
				</tr>

				<tr>
					<td colspan="4">
						<small>Chose preferred media type: </small>
						<input type="radio" name="meal_media" value="I" checked> Image
	  					<input type="radio" name="meal_media" value="V"> Video
	  				</td>
				</tr>

			</table>

			    {{ csrf_field() }}

		</form>

	</div>
		    <hr/>

 		<div class="meal-table-container" >
		    <table style="width:100%" class="meal-edit-table">
			    <thead>
				  <tr>
				  	<th>ID: </th>
				    <th>Date</th>
				    <th>Meal</th> 
				    <th>Media Type</th>
				    <th>Recipe</th>
				    <th>Delete?</th>
				  </tr>
				</thead>

				<tbody>

				<?php

					if( isset( $meals ) ){

						foreach( $meals as $meal ){

							$date = $meal->date;

							$meal_type = $meal->meal; //b, s, or l

							$recipe_name = $meal->title;

							$meal_id = $meal->meal_id;

							if( $meal->mealmedia == "V" ){

								$mediatype = "Video";

							}else if( $meal->mealmedia == "I" ){
								$mediatype = "Image";
							}else{
								$mediatype = "";
							}

							switch ($meal_type) {
								case 'B':
									$meal_category = "breakfast";
								break;
								
								case 'BR':

									$meal_category = "Snack / Break";

								break;

								case 'L':

									$meal_category = "Lunch";

								break;

								default:

									$meal_category = "N/A";
									
								break;
							}

							?>
								<tr>
									<td><a href="/meal/{{ $meal->meal_id }}"> {{ $meal->meal_id }} </a></td>
								    <td>{{ $date }}</td>
								    <td>{{ $meal_category }}</td> 
								    <td>{{ $mediatype }}</td>
								    <td><a href="/user/recipes/{{ $meal->recipe_id }}/edit">{{ $recipe_name }} - {{ $meal->recipe_id }}</a></td>
								    <td>
									    <form action="{{ action('MealController@destroy', array($meal_id) ) }}" method="post">
											<input type="hidden" name="id" value="{{ $meal_id }}" />
											<input name="_method" type="hidden" value="delete" />
											<button type="submit" value="delete" class="delete-btn" onclick="return confirmDeletion()">Delete</button>
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


  </body>
</html>