<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body>

  @include('user.includes.userheader')
  	<?php if( isset( $id )){
  		echo "Showing form belonging to: ".  $id;
  	} ?>

    <br />
	<form class="two" method="get" action="#"><button class="two" type="submit">Edit</button></form>
	<form class="three" method="get" action="#"><button class="two" type="submit">Upload</button></form>
	<form class="four" method="get" action="#"><button class="two" type="submit">Clear</button></form>
	
    <nav class="accordion">
		<header class="box">
			<label for="acc-close" class="box-title">Meal Planner</label>
		</header>

		<input type="radio" name="accordion" id="cb1" />
		<section class="box">
			<label class="box-title" for="cb1"><img src="https://image.freepik.com/free-icon/monday-calendar-page_318-58292.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/> 3/08/2016</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content">
	
	<h1 style="font-family: Futura;">Breakfast</h1>
	<ul>
    <li><a href="example-meal5.html">Pancake</a></li>
    <li>Plain Scrambled eges</li>
	</ul>
	
	<h1 style="font-family: Futura;">Snack/Break</h1>
	<ul>
    <li><a href="example-meal3.html">Banana Bread</a></li>
    <li><a href="example-meal4.html">Carrot Muffin</a></li>
	</ul>
	
	<h1 style="font-family: Futura;">Lunch</h1>
	<ul>
    <li><a href="example-meal.html">Lasagna</a></li>
    <li><a href="example-meal2.html">Meatloaf</a></li>
	</ul></div>
		</section>

<input type="radio" name="accordion" id="cb4" />
		<section class="box">
			<label class="box-title" for="cb4"><img src="https://image.freepik.com/free-icon/tuesday-daily-calendar-page_318-58073.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/> 3/09/2016</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><h1 style="font-family: Futura;">Breakfast</h1>
	<ul>
    <li><a href="example-meal5.html">Pancake</a></li>
    <li>Plain Scrambled eges</li>
	</ul>
	
	<h1 style="font-family: Futura;">Snack/Break</h1>
	<ul>
    <li><a href="example-meal3.html">Banana Bread</a></li>
    <li><a href="example-meal4.html">Carrot Muffin</a></li>
	</ul>
	
	<h1 style="font-family: Futura;">Lunch</h1>
	<ul>
    <li><a href="example-meal.html">Lasagna</a></li>
    <li><a href="example-meal2.html">Meatloaf</a></li>
	</ul></div>
		</section>

<input type="radio" name="accordion" id="cb5" />
		<section class="box">
			<label class="box-title" for="cb5"><img src="https://image.freepik.com/free-icon/wednesday-calendar-daily-page_318-58282.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/> 3/10/2016</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><h1 style="font-family: Futura;">Breakfast</h1>
	<ul>
    <li><a href="example-meal5.html">Pancake</a></li>
    <li>Plain Scrambled eges</li>
	</ul>
	
	<h1 style="font-family: Futura;">Snack/Break</h1>
	<ul>
    <li><a href="example-meal3.html">Banana Bread</a></li>
    <li><a href="example-meal4.html">Carrot Muffin</a></li>
	</ul>
	
	<h1 style="font-family: Futura;">Lunch</h1>
	<ul>
    <li><a href="example-meal.html">Lasagna</a></li>
    <li><a href="example-meal2.html">Meatloaf</a></li>
	</ul></div>
		</section>

		<input type="radio" name="accordion" id="cb2" />
		<section class="box">
			<label class="box-title" for="cb2"><img src="https://image.freepik.com/free-icon/thursday-calendar-daily-page-interface-symbol_318-58232.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/> 3/11/2016</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><h1 style="font-family: Futura;">Breakfast</h1>
	<ul>
    <li><a href="example-meal5.html">Pancake</a></li>
    <li>Plain Scrambled eges</li>
	</ul>
	
	<h1 style="font-family: Futura;">Snack/Break</h1>
	<ul>
    <li><a href="example-meal3.html">Banana Bread</a></li>
    <li><a href="example-meal4.html">Carrot Muffin</a></li>
	</ul>
	
	<h1 style="font-family: Futura;">Lunch</h1>
	<ul>
    <li><a href="example-meal.html">Lasagna</a></li>
    <li><a href="example-meal2.html">Meatloaf</a></li>
	</ul></div>
		</section>

		<input type="radio" name="accordion" id="cb3" />
		<section class="box">
			<label class="box-title" for="cb3"><img src="https://image.freepik.com/free-icon/friday-daily-calendar-page_318-58120.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/> 3/12/2016</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><h1 style="font-family: Futura;">Breakfast</h1>
	<ul>
    <li><a href="example-meal5.html">Pancake</a></li>
    <li>Plain Scrambled eges</li>
	</ul>
	
	<h1 style="font-family: Futura;">Snack/Break</h1>
	<ul>
    <li><a href="example-meal3.html">Banana Bread</a></li>
    <li><a href="example-meal4.html">Carrot Muffin</a></li>
	</ul>
	
	<h1 style="font-family: Futura;">Lunch</h1>
	<ul>
    <li><a href="example-meal.html">Lasagna</a></li>
    <li><a href="example-meal2.html">Meatloaf</a></li>
	</ul></div>
		</section>

		<input type="radio" name="accordion" id="acc-close" />
	</nav>
  </body>
</html>