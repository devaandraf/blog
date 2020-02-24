@extends('layouts.master')	

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<script type="text/javascript">
		document.title="Dashboard";
		document.getElementById('dash').classList.add('active');
	</script>
	<div class="content" style="background-image: url('template/img/school-1.jpg'); background-repeat: no-repeat; background-size: 100%;">
		<div class="padding" style="text-align: center; height: 800px; color: white;">
			<br><br>
			<marquee><h1>Selamat Datang di LakeVille Area School</h1></marquee>
			<br><br><br><br><br><br>
			<center><h1 style="font-family: beyond_the_mountainsregular; font-size: 100px; padding-top: 150px; text-shadow: 4px 6px black;">LakeVille  &nbsp; School</h1></center>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
				
			<div style="font-size: 25px; text-shadow: 3px 3px black; border: 3px solid white; margin: 0px 400px; border-radius: 5px;">
			<script type='text/javascript'>
				<!--
				var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
				var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
				var date = new Date();
				var day = date.getDate();
				var month = date.getMonth();
				var thisDay = date.getDay(),
				    thisDay = myDays[thisDay];
				var yy = date.getYear();
				var year = (yy < 1000) ? yy + 1900 : yy;
				document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
				//-->
			</script>
			<div id="clock"></div>
			<script type="text/javascript">
			<!--
			function showTime() {
			    var a_p = "";
			    var today = new Date();
			    var curr_hour = today.getHours();
			    var curr_minute = today.getMinutes();
			    var curr_second = today.getSeconds();
			    if (curr_hour < 12) {
			        a_p = "AM";
			    } else {
			        a_p = "PM";
			    }
			    if (curr_hour == 0) {
			        curr_hour = 12;
			    }
			    if (curr_hour > 12) {
			        curr_hour = curr_hour - 12;
			    }
			    curr_hour = checkTime(curr_hour);
			    curr_minute = checkTime(curr_minute);
			    curr_second = checkTime(curr_second);
			 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
			    }
	 
			function checkTime(i) {
			    if (i < 10) {
			        i = "0" + i;
			    }
			    return i;
			}
			setInterval(showTime, 500);
			//-->
			</script>
		</div>
		</div>
	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop