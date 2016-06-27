<nav class="accordion">
	<header class="box">
		<label for="acc-close" class="box-title">Meal Planner</label>
	</header>

	<?php

	if( isset( $meals ) ){

		//var_dump( $today ); //_day;
		//echo $today->date;
		$today_stamp = strtotime( $today->format('date') );
		$today_day = date('l', $today_stamp);
		//echo $today_day;
		//strtotime("+1 days")
		$date_counter = 0;
		$days_counter = 0; //a counter to check how many days past the first day we are
		$amount_counter = 0;

		$weekdays = array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday'
		);


		foreach( $weekdays as $weekday ){
			$amount_counter = 0;
			switch ($weekday) {

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
			<label class="box-title" for="cb{{ $date_counter }}"><img src="{{ $day_icon_link }}" HEIGHT="80" WIDTH="100" BORDER="0"/>

			<?php

			$day_limiter = 0;

			foreach( $meals as $date => $mealdate ){
				/**
				*   Day Calculator and icon link maker
				*/
				$timestamp = strtotime($date);

				$day = date('l', $timestamp); 

				if( $day == $weekday && 0 == $day_limiter ){
					
					?>
					{{ $date }} </label>
					<label class="box-close" for="acc-close"></label>

					<div class="box-content">
						<?php



						/*switch ($day) {

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
						}*/

						?>



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

										<li><a href="/meal/{{ $meal->meal_id }}"> <?php echo $recipe_name; ?></a></li>

									<?php
									//echo "<pre>";print_r( $meal );echo "</pre>";

									$amount_counter++;

								}//end mealtype -> meal foreach

								?>
							</ul> <?php

							
						} //end date -> mealtype foreach
						?>
					</div>

					</section>
					<?php

					$date_counter++;

					$day_limiter++;
				}
			} //end main foreach

			if( 0 == $amount_counter ){
				$date_counter++;

				$default_date = date('Y-m-d', strtotime("+".$days_counter." days"));
				?>
					{{ $default_date }}
				</label>
				<label class="box-close" for="acc-close"></label>

				<div class="box-content">
					<span class="red-action">X</span> Nothing written for today
				</div>
				</section>
				<?php
			}

			$days_counter++;
		}

	}//end of isset

	?>

	<input type="radio" name="accordion" id="acc-close" />
</nav>