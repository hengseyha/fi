
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reservation</title>
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<link href="/css/reservation.css" rel='stylesheet' type='text/css' media="all">

	<link rel="stylesheet" href="/css/jquery-ui.css" />

	<link href="/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body>
	<h1 class="header-w3ls">Make your reservation</h1>
	<div class="appointment-w3">
		<form action="#" method="post">
			<div class="personal">
			
				<div class="main">
					<div class="form-left-w3l">

						<input type="text" class="top-up" name="name" placeholder="Name" required="">
					</div>
					<div class="form-left-w3l">

						<input type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="form-right-w3ls ">

						<input class="buttom" type="text" name="phone number" placeholder="Phone Number" required="">
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
			<div class="information">
				
				
				<div class="main">

					
					<div class="form-left-w3l">
						<input id="datepicker" name="text" type="text" placeholder="Booking Date &" required="">
						<input type="text" id="timepicker" name="Time" class="timepicker form-control hasWickedpicker" placeholder="Time" required=""
						 onkeypress="return false;">
						<div class="clear"></div>
					</div>
				</div>
				
				<div class="main">

					<div class="form-left-w3l">
						<select class="form-control">
					<option value="">Number of Adults</option>
						<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>and more</option>
					</select>
					</div>
					<div class="form-right-w3ls">
						<select class="form-control">
					<option value="">Number of Children</option>
						<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>and more</option>
					</select>
					</div>
				</div>
				
			</div>
			
			
			<div class="btnn">
				<input type="submit" value="Confirm Reservation">
			</div>
		</form>
	</div>
	<div class="copy">
		{{-- <p>&copy;2018 Table Booking Form. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a></p> --}}
	</div>
	<!-- js -->
	<script type='text/javascript' src='/js/jquery-2.2.3.min.js'></script>
	<!-- //js -->
	<!-- Calendar -->
	<script src="/js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- Time -->
	<script type="text/javascript" src="/js/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
	</script>
	<!-- //Time -->

</body>

</html>