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
  @include('includes.head')
  <body class="contact">
  @include('includes.header')
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('sent'))
    <div style="text-align: center; background-color: #e6ffff; width: 400px; padding: 35px; margin: 25px; font-family: Helvetica;" >
      <h2 style="text-align: center;">Your message was sent successfully!</h2>
    </div>
@endif
    <div></div>
	<br />

	<p class="one"><span class="one"><u>Contact Fugo Studio</u></span>
				<br /> 
			If you have any questions or concerns we would love to hear from you. We are a young company and are eager to improve your experience, so please send us any suggestions. You can contact us through email, as you see to your right, or via phone call; (949)999-999. <br /><strong>Office hours:</strong> Monday-Saturday 9AM-5PM. Fugo Studio is located at 130 Chapman Ave, Fullerton, CA 92832.</p>
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
</form>
  </body>
</html>