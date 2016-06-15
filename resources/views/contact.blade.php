<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	@include('includes.head')
  </head>
  @include('includes.head')
  <body>
  @include('includes.header')
    <div></div>
	<br />
	<p class="one"><span class="one"><u>Contact Fugo Studio</u></span>
				<br /> <br />
			If you have any questions or concerns we would love to hear from you. We are a young company and are eager to improve your experience, so please send us any suggestions. You can contact us through email, as you see to your right, or via phone call; (949)999-999. <br /><strong>Office hours:</strong> Monday-Saturday 9AM-5PM. Fugo Studio is located at 130 Chapman Ave, Fullerton, CA 92832.</p>
	
	<form action="" method="post" class="elegant-aero">
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
     <label>
        <span>&nbsp;</span>
        <input type="button" class="button" value="Send" />
    </label>    
</form>

  </body>
</html>