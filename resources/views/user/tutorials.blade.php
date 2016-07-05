<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
    <title>FugoPlace</title>
	<style>
	h2.one {
	Font-family: Helvetica; text-align: left;
	}
	.button {
    
	height: 180px;
	/*width: 800px;*/
  width:100%;
    background-color: #f2f2f2;
	font-family: sans-serif;
    color: black;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
/*.two {
position: relative;
top: -20px;
left: 320px;
}*/
	/*div {
padding: 20px;
}*/
.div1 {
padding: 12px;
}

	</style>
  </head>
  <body id="tutorials">
  <div class="container"></div>
    @include('user.includes.userheader')
  <div class="page-container">
    <h2 class="one">Tutorials</h2>
		<p>Hello! To help you to get your footing around FugoPlace we have compiled some helpful video guides that will assist you in getting the most out of our tools. We hope this guide will be enough for you to acheive fugo mastery but if you would like to speak to a FugoPlace representive please visit our <strong>Contact Us</strong> page.</p>
		<br />
  <table  style="width:97%">

  <tr>
    <td class="recipe-thumb"><iframe height="auto" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</form></td>
    <td class="button"><p class="button"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>
  <tr>
    <td class="recipe-thumb"><iframe height="auto" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="button"><p class="button"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>
  <tr>
    <td class="recipe-thumb"><iframe height="auto" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="button"><p class="button"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>
  <tr>
    <td class="recipe-thumb"><iframe height="auto" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="button"><p class="button"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>
  <tr>
    <td class="recipe-thumb"><iframe height="auto" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="button"><p class="button"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>
  <!--<tr>
    <td><div class="div1"></div><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><p class="button button1"><br /><u><strong>TUTORIAL:&nbsp;</strong>[text.text.]</u><br /><br /><br />[Description]text.text.text.</p></td>		
     
  </tr>-->
</table>
</div>

  </body>
</html>