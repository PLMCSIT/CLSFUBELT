@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Create new Event</h3>
		</div>
		<div class="box-body">
			<form action="{{url('events/store')}}" method = "post">
				{!! csrf_field() !!}
				<div class="form-group">
				<label for="">Event</label>
					<br>Event Title
					<input type="text" name = "event_title" class = "form-control" placeholder = "Event Title">
					<br>Event Description
					<input type="text" name = "event_desc" class = "form-control" placeholder = "Event Description">
					<br>Event Type
					 <select name="event_type" class = "form-control">
						<option value="Kids">Kids</option>
						<option value="Youth">Youth</option>
						<option value="Leaders">Leaders</option>
						<option value="Singles">Singles</option>
						<option value="Couples">Couples</option>
						<option value="Married">Married</option>
					</select>
					<br>Event Month
					 <select name="event_month" class = "form-control">
						<option value="JAN">January</option>
						<option value="FEB">February</option>
						<option value="MAR">March</option>
						<option value="APR">April</option>
						<option value="MAY">May</option>
						<option value="JUN">June</option>
						<option value="JUL">July</option>
						<option value="AUG">August</option>
						<option value="SEP">September</option>
						<option value="OCT">October</option>
						<option value="NOV">November</option>
						<option value="DEC">December</option>
					</select>
					 <br>Event Day
					 <select name="event_day" class = "form-control">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<br>Event Year
					 <select name="event_year" class = "form-control">
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>
					<br>Event Time
					<input type="text" name = "event_time" class = "form-control" placeholder = "Event Time">
					
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Create</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection