<?php 
	include 'header.php'; 
	echo $headerContent;
?>
<form method="post" name="registrationForm" id="registrationForm" action="submit_form.php">
	<div>
		<fieldset>
			<legend>Registration Form</legend>
			<div class="form_label">
				<label for="firstName">First Name</label>
				<input id="firstName" name="firstName" type="text" class="required" maxlength="25"/>
			</div>
			<div class="form_label">
				<label for="lastName">Last Name</label>
				<input id="lastName" name="lastName" type="text" class="required" maxlength="25"/>
			</div>
			<div class="form_label">
				<label for="address1">Address 1</label>
				<input id="address1" name="address1" type="text" class="required" maxlength="35"/>
			</div>
			<div class="form_label">
				<label for="address2">Address 2</label>
				<input id="address2" name="address2" type="text" maxlength="35"/>
			</div>
			<div class="form_label">
				<label for="city">City</label>
				<input id="city" name="city" type="text" class="required" maxlength="25"/>
			</div>
			<div class="form_label">
				<label for="state">State</label>
				<select name="state" id="state">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</div>
			<!--(5 or 9 digit)-->
			<div class="form_label">
				<label for="zip">Zip</label>
				<input id="zip" name="zip" type="text" class="required" maxlength="10"/>
			</div>
			<!--(US only)-->
			<div class="form_label">
				<label for="country">Country</label>
				<input id="country" name="country" type="text" readonly  value="US"/>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<div>
				<input type="button" value="Submit" class="ui-button ui-widget ui-corner-all" onclick="registrationValidation('#firstName', '#lastName', '#address1', '#address2', '#city', '#zip', '#registrationForm');" />
			</div>
		</fieldset>
	</div>
</form>
<?php 
	include 'footer.php'; 
	echo $footerContent;
?>