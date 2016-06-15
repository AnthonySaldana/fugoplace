<!DOCTYPE html>
<html>
<head>
<title>FugoPlace</title>
<style>

/*.box {
	width: 600px; 
	height: 100px; 
	background-color: blue;
}
.div {
padding: 10px;
}*/

@font-face {
  font-family: 'Klavika';
  src: local('Roboto Thin'), local('Roboto-Thin'), url(http://download.socialfonts.co.uk/fontface/fonts/facebook/klavika-bold/klavika-bold.woff) format('woff');
}

*{
 -webkit-font-smoothing:antialiased;
 box-sizing: border-box;
}

body{
  background:ghostwhite;
}

.container{
  width:1100px;
  height:80px;
  display:block;
  background-color:#99ccff;
  position:absolute;
  top:0;left:0;
 
}


::-webkit-input-placeholder {
    color: #cdd9f1;
}
:-moz-placeholder {
    color: #cdd9f1;
}
::-moz-placeholder {
    color: #cdd9f1;
}
:-ms-input-placeholder {
    color: #cdd9f1;
}
input:focus{
  outline:none;
  content:"";
}
:focus::-webkit-input-placeholder { 
  color: #6779bc; 
  text-shadow:0 -1px 0 rgba(0, 0, 0, .2);
  font-size:1em;
}

#icon{
  width:21px;
  height:21px;
  position:relative;
  top:5%;
  left:9.6%;
  z-index:2;
  border-box:1px solid black;
  background:white;
  border-radius:3px;
  padding-right:2px;
  text-align:right;
  font-size:1.4em;
  font-family: Klavika, 'lucida grande', 'lucida sans', sans-serif; 
  font-weight:bold;
  overflow:hidden;
  color:#4c66a4;
  display:inline-block;
}


.input1 {
  height:20px;
  width:130px;
  margin-top:3px;
  margin-left:10%;
  background-color:#4c66a4;
  border:none;
  line-height:24px;
  position:relative;
  right: -380px;
  top: 40px;
  background-color: white;
}

.input2 {
  height:20px;
  width:130px;
  margin-top:3px;
  margin-left:10%;
  background-color:#4c66a4;
  border:none;
  line-height:24px;
  position:relative;
  right: -315px;
  top: 40px;
  background-color: white;
}

.spanone {
  color: white; 
  font-family: sans-serif;
  position: relative;
  right: -485px;
  top: 40px;
  color: white;
}

.spantwo {
  color: white; 
  font-family: sans-serif;
  position: relative;
  right: -420px;
  top: 40px;
  color: white;
}
.log {
  background-color: #005580;
  border: none;
  color: white;
  padding: 1px 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position: relative;
  right: -330px;
  top: 41px;
}

.two {
	
    border-radius: 17px;
    width: 10px;
    padding: 5px;
    border: 2px solid #ff9900;
    margin: 0;
    font-size:50px;
    font-family:Helvetica;
	position: relative;
	right: -10px;
	top: -20px;
}

u {
	font-size:50px;
	font-family:Helvetica;
	position: relative;
	right: -10px;
	top: -20px;
}
			



			
.one {
	Font-family: Helvetica; text-align: center;
	}

#registration-form {
  font-family:'Open Sans Condensed', sans-serif;
	width: 400px;
  min-width:250px;
	margin: 20px auto;
	position: relative;
}

#registration-form .fieldset {
	background-color:#d5d5d5;

	border-radius: 3px;
  
}

 #registration-form legend {
	text-align: center;
	background: #000066;
	width: 100%;
	padding: 30px 0;
	border-radius: 3px 3px 0 0;
	color: white;
font-size:2em;
}

.fieldset form{
  border:1px solid #2f2f2f;
  margin:0 auto;
  display:block;
  width:100%;
  padding:30px 20px;
  box-sizing:border-box;
  border-radius:0 0 3px 3px;
}
.placeholder #registration-form label {
	display: none;
}
 .no-placeholder #registration-form label{
margin-left:5px;
  position:relative;
  display:block;
  color:grey;
  text-shadow:0 1px white;
  font-weight:bold;
}
/* all */
::-webkit-input-placeholder { text-shadow:1px 1px 1px white; font-weight:bold; }
::-moz-placeholder { text-shadow:0 1px 1px white; font-weight:bold; } /* firefox 19+ */
:-ms-input-placeholder { text-shadow:0 1px 1px white; font-weight:bold; } /* ie */
#registration-form input[type=text] {
	padding: 15px 20px;
	border-radius: 1px;
  margin:5px auto;
  background-color:#f7f7f7;
	border: 1px solid silver;

	-webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
	box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
	width: 100%;

	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
  -webkit-transition:background-color .5s ease;
-moz-transition:background-color .5s ease;
-o-transition:background-color .5s ease;
-ms-transition:background-color .5s ease;
transition:background-color .5s ease;
}
.no-placeholder #registration-form input[type=text] {
	padding: 10px 20px;
}

#registration-form input[type=text]:active, .placeholder #registration-form input[type=text]:focus {
	outline: none;
	border-color: silver;
  background-color:white;
}

#registration-form input[type=submit] {
  font-family:'Open Sans Condensed', sans-serif;
  text-transform:uppercase;
  outline:none;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
	width: 100%;
	background-color: #0077b3;
	padding: 10px;
	color: white;
	border: 1px solid #3498db;
	border-radius: 3px;
	font-size: 1.5em;
	font-weight: bold;
	margin-top: 5px;
	cursor: pointer;
  position:relative;
  top:0;
}

#registration-form input[type=submit]:hover {
	background-color: #2980b9;
}

#registration-form input[type=submit]:active {
background:#5C8CA7;
}


.parsley-error-list{
background-color:#C34343;
padding: 5px 11px;
margin: 0;
list-style: none;
border-radius: 0 0 3px 3px;
margin-top:-5px;
  margin-bottom:5px;
  color:white;
  border:1px solid #870d0d;
  border-top:none;
    -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position:relative;
  top:-1px;
  text-shadow:0px 1px 1px #460909;
    font-weight:700;
  font-size:12px;
}
.parsley-error{
	border-color:#870d0d!important;
  border-bottom:none;
}
#registration-form select{
	width:100%;
	padding:5px;
}
::-moz-focus-inner {
  border: 0;
}			

.reg {
   padding: 50px;
}

.footerspace {
   padding: 30px;
}

* {
	margin: 0;
}
html, body {
	height: 100%;
}
.page-wrap {
  min-height: 100%;
  /* equal to footer height */
	margin-bottom: -142px; 
}
.page-wrap:after {
  content: "";
  display: block;
}
.site-footer, .page-wrap:after {
  /* .push must be the same height as footer */
	height: 142px; 
}
.site-footer {
  background: #ccccff;
}

.para {
    font-family: sans-serif;
    position: relative;
    top: -80px;
	right: -50px;
}

.parag {
    font-family: sans-serif;
	position: relative;
    top: -80px;
	right: -50px;
}

.img1 {
    position: relative;
	top: -30px;
	right: -45px;
}

.support {
    font-family: Trebuchet MS;
	font-size: 25px;
	color: gray;
    position: relative;
    top: -80px;
	right: -125px;
}

.img2 {
    position: relative;
	top: -30px;
	right: -45px;
}

.aspect {
    font-family: Trebuchet MS;
	font-size: 25px;
	color: gray;
    position: relative;
    top: -80px;
	right: -125px;
}

</style>
</head>
<body>

<div class="box"></div>
<div></div>
<div class="container">
  <form action="{{ url('/login') }}" method="post">
  <span class="spanone">Email:</span> 
  <input class="input1" type="phone/email" name="email" value="{{ old('email') }}">
  
  <span class="spantwo">Password:</span> 
  <input class="input2" type="password" name="password" >
  <button class="log">Log In</button>

  {{ csrf_field() }}
  </form>
  <h6><span class="two">Fugo</span>&nbsp;&nbsp;<u>Place</u><br /><span></h6>
  
</div>
<br />

<div class="page-wrap">

<div class="reg"></div>
<table style="width:100%">

  <tr>
    <td><h1 class="parag">A friend of food service.</h1> 
<br/>
<p class="para"><strong>FugoPlace</strong> is a management tool made specifically for<br /> the food service staff of school cafeterias, as well as a<br /> nutrition information provider of meals served, made<br /> viewable to the public.</p>

<br />

<img class="img1" src="http://www.tidydesign.com/img/free-clock-icon.png" HEIGHT="60" WIDTH="60"/><p class="support">24/7 Support</p> 

<br />

<img class="img2" src="http://www.iconsdb.com/icons/preview/black/mobile-phone-8-xxl.png" HEIGHT="60" WIDTH="60"/><p class="aspect">Aspect receptive</p>

    </td>

    <td><div id="registration-form">
	<div class='fieldset'>
    <legend>Sign Up</legend>
		<form action="{{ url('/register') }}" method="post" data-validate="parsley">
			<div class='row'>
				<label for='firstname'>School's Name</label>
				<input type="text" placeholder="User School" name='school_name' id='firstname' data-required="true" data-error-message="Your School's Name is required">
			</div>
<div class='row'>
				<label for="email">E-mail</label>
				<input type="text" placeholder="Your Email"  name='email' data-required="true" data-type="email" data-error-message="Your E-mail is required">
			</div>
						
			<div class='row'>
				<label for="cemail">Confirm your E-mail</label>
				<input type="text" placeholder="Confirm your E-mail" name='cemail' data-required="true" data-error-message="Your E-mail must correspond">
			</div>

			<div class='row'>
				<label for="email">Password</label>
				<input type="text" placeholder="Your Password"  name='password' data-required="true" data-type="email" data-error-message="Your password is required">
			</div>
						
			<div class='row'>
				<label for="cemail">Confirm your Password</label>
				<input type="text" placeholder="Confirm your Password" name='cpassword' data-required="true" data-error-message="Restate your Password">
			</div>
			<input type="submit" value="Submit">
		</form>
	</div>
</div></td>
    
  </tr>
  
  
</table>
<div class="footerspace"></div>
</div>

<footer class="site-footer">
<br />
  &nbsp;&nbsp;&nbsp;TEST TEXT TEST TEXT TEST TEXT TEST<br /> &nbsp;&nbsp;&nbsp;TEXT TEST TEXT TEST TEXT TEST TEXT<br /> &nbsp;&nbsp;&nbsp;TEST TEXT TEST TEXT TEST TEXT TEST<br /> &nbsp;&nbsp;&nbsp;TEXT TEST TEXT.
</footer>
</body>
</html>
