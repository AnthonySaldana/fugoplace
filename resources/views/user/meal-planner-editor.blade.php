<!DOCTYPE html>
<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
	<style type="text/css">
	body{
		display: block;
	}
	input{
		margin:15px;
	}

	.container{
		padding:15px;
	}

	.meal-table-container{
		width: 100%;
	}

	.meal-edit-table{
		margin-top:15px;
		margin-left: auto;
		margin-right: auto;
	}

	.meal-edit-table tbody{
		margin-top:15px;
	}

	.meal-edit-table tr{
		width: 100%;
	}

	tr:nth-child(even) {background-color: white}

	th, td{
		border-bottom: 1px solid #ddd;
	}

	th{
		background-color: #00BCD4;
		color:white;
		padding:15px;
	}

	.meal-edit-table tr td{
		padding:15px;
		min-width: 50px;
	}

	.seperator{
		margin:15px;
	}

	.submit-btn{
		padding:15px;
	}

	.delete-btn{
		color:red;
		text-decoration: none;
	}

	.minimal-cell th, .minimal-cell td{
		border:none;
	}
	</style>

  </head>
  <body>

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
			    <thead>
				  <tr class="minimal-cell">
				    <td><label for="meal_date">Date: </label>
			    <input type="date" name="meal_date" ></td>

				    <td><label for="recipe_select">Recipe</label>
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
	
			    </select></td> 
				    <td><label for="meal" >Meal: </label>
			    <select name="meal"> 
			    	<option disabled selected value> -- select an option -- </option>
			    	<option Value="B" > Breakfast </option>
			    	<option value="BR" > Snack/Break </option>
			    	<option value="L" > Lunch </option>
			    </select></td>
				    <td><button type="submit" name="send" class="submit-btn">Save</button></td>
				  </tr>
				</thead>

			</table>

			    {{ csrf_field() }}

		</form>

	</div>
		    <hr/>

 		<div class="meal-table-container" >
		    <table style="width:100%" class="meal-edit-table">
			    <thead>
				  <tr>
				    <th>Date</th>
				    <th>Meal</th> 
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
								    <td>{{ $date }}</td>
								    <td>{{ $meal_category }}</td> 
								    <td>{{ $recipe_name }} - {{ $meal->recipe_id }}</td>
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