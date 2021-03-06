<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	@include('includes.head')
  <style type="text/css">
  form.elegant-aero{ 
    margin-left: 5%;
    margin-right: 0;
    min-width: 500px;
    float:left;
   }

   .contact p.one{
    float:left;
    position: static;
   }

   .contact span.one{
    position: static;
   }
  </style>
  </head>
  <body class="contact">
    
<div class="hold">
  <div class="header">
    <div class="container">
    
      </div>
    
      @include('school.includes.header')
    </div>
    
    <!--<div>
    <a href="basic.html">Home</a>&nbsp;&nbsp;&nbsp;
    <a href="about us.html">About Us</a>&nbsp;&nbsp;&nbsp;
    <a href="FAQ.html">FAQ</a>&nbsp;&nbsp;&nbsp;
    <a href="contact us.html">Contact Us</a>&nbsp;&nbsp;&nbsp;
    </div>-->
    
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div></div>
    @if(Session::has('sent'))
    <div style="text-align: center; background-color: #e6ffff; width: 400px; padding: 35px; margin: 25px; font-family: Helvetica;" >
      <h2 style="text-align: center;">Your message was sent successfully!</h2>
    </div>
@endif
	<br />

	<p class="one"><span class="one"><u>Contact Fugo Studio</u></span>
        <br /> 
      If you have any questions/concerns, or are a school district interested in our services, we would love to hear from you. FugoPlace is a completely original concept, which is modeled off of the needs of foodservce staff and students, alike. We keep our software fresh and original by simply listening to the people. So please, your feedback is very much appreciated. You can contact us through email, as you see to your right. <br /><strong>Office hours:</strong> Monday-Friday 9AM-5PM. Fugo Studio is located at 130 Chapman Ave, Fullerton, CA 92832.</p>
    <form action="{{ url('/contact-message') }}" method="post" class="elegant-aero">
    <h1>Contact Us
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Your Name :</span>
        <input id="name" type="text" name="name" placeholder="Your Name, School's name, and Location" />
    </label>
   
    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="email" placeholder="Valid Email Address" />
    </label>
   
    <label>
        <span>Message :</span>
        <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
    </label>
     <label>
        <span>Subject :</span><select name="selection">
    <option value="General Question">General Question</option>
        <option value="Efficiency Concern">Efficiency Concern</option>
    <option value="Other">Other</option>
        </select>
    </label>    
    {{ csrf_field() }}
     <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Send" />
    </label>    
  </body>
</html>