<div class="holder school-header" style="	padding:0;">
	<div class="header" style="	position:relative;">
		<div class="container"></div>
			<ul class="nav">
				<li style="position:absolute; left:0;"><a href="/school/<?php echo $school_link; ?>"><span class="two" style="position:static;">Fugo</span>&nbsp;&nbsp;<u style="position:static;">Place</u><br /></a></li>
				<li><a href="/school/<?php echo $school_link; ?>">Home</a></li>
				<li><a href="/school/<?php echo $school_link; ?>/about">About Us</a></li>
				<li><a href="/school/<?php echo $school_link; ?>/faq">FAQ</a></li>
				<li><a href="/school/<?php echo $school_link; ?>/contact">Contact Us</a></li>

				<?php if( true == $schoolsiteincluded ){ ?>
				<li><a href="{{ $schoolsite }}">School-Home</a></li>
				<?php } ?>

				<?php if( true == $isuser ){ ?>
				<li><a href="/user">user</a></li>
				<?php } ?>
			</ul>
	</div>
</div>