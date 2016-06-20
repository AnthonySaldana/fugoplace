<nav class="accordion">
		<header class="box">
			<label for="acc-close" class="box-title">Meal Planner</label>
		</header>

			<?php

				if( isset( $meals ) ){

					$date_counter = 0;
					foreach( $meals as $date => $mealdate ){

						/**
                        *   Day Calculator and icon link maker
                        */
                        $timestamp = strtotime($date);

                        $day = date('l', $timestamp);

                        switch ($day) {

                            case 'Monday':
                                
                                $day_icon_link = "https://image.freepik.com/free-icon/monday-calendar-page_318-58292.jpg";
                            
                            break;
                            
                            case 'Tuesday':

                                $day_icon_link = "https://image.freepik.com/free-icon/tuesday-daily-calendar-page_318-58073.jpg";

                            break;

                            case 'Wednesday':

                                $day_icon_link = "https://image.freepik.com/free-icon/wednesday-calendar-daily-page_318-58282.jpg";

                            break;

                            case 'Thursday':

                                $day_icon_link = "https://image.freepik.com/free-icon/thursday-calendar-daily-page-interface-symbol_318-58232.jpg";

                            break;

                            case 'Friday':

                                $day_icon_link = "https://image.freepik.com/free-icon/friday-daily-calendar-page_318-58120.jpg";

                            break;

                            case 'Saturday':

                                $day_icon_link = "https://image.freepik.com/free-icon/saturday-calendar-daily-page-interface-symbol_318-58127.jpg";

                            break;

                            case 'Sunday':

                                $day_icon_link = "https://image.freepik.com/free-icon/sunday-daily-calendar-page_318-58115.jpg";

                            break;

                            default:
                                //
                            break;
                        }

		            ?>

		                <input type="radio" name="accordion" id="cb{{ $date_counter }}" />
		                <section class="box">
		                <label class="box-title" for="cb{{ $date_counter }}"><img src="{{ $day_icon_link }}" HEIGHT="80" WIDTH="100" BORDER="0"/> {{ $date }} </label>
		                <label class="box-close" for="acc-close"></label>

		                <div class="box-content">
		            
		            <?php

		            foreach( $mealdate as $mealkey => $mealtype ){

		            	switch ($mealkey) {
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

		                    <h1 style="font-family: Futura;"> {{ $meal_category }} </h1>
		                    <ul>

		                <?php

		                foreach( $mealtype as $meal ){

		                     $date = $meal->date;

                            $meal_type = $meal->meal; //b, s, or l

                            $recipe_name = $meal->title;

                            $meal_id = $meal->meal_id;
		                            

                             ?>

                                            
                                    <li><a href="/recipe/{{ $meal->recipe_id }}"> <?php echo $recipe_name; ?></a></li>


                                    
                            <?php
                            //echo "<pre>";print_r( $meal );echo "</pre>";

		                }//end mealtype -> meal foreach

		                ?>
		                    </ul>
		                <?php

		            	}//end date -> mealtype foreach

		            	?>
		                </div>

		            </section>
		            <?php
		   			
		   			$date_counter++;
		        	} //end main foreach
				
				}//end of isset
				
			 ?>

		<input type="radio" name="accordion" id="acc-close" />
	</nav>