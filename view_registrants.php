<?php 
	include 'connection.php';
	include 'header.php'; 
	echo $headerContent;
	
	//Retrieve all users who restistered.
	$query = "SELECT * FROM hw_registrant ORDER BY create_date DESC";
	if (($stmt = $conn->prepare($query))){
		
		//execute
		$stmt->execute();
		
		//get results
		$result = $stmt->get_result();
		$rowCount = $result->num_rows;
	}
	
?>
<div>
		<fieldset>
			<legend>Registrants</legend>
			<?php
				if($rowCount == 0){
			?>
			<div align="center">
				<span>No one has registered at this moment.</span>
			</div>
			<?php
				} else {
			?>
				<div class="div_table">
					<div class="div_table_head">
						<div class="div_table_row">
							<div class="div_table_header">
								First Name
							</div>
							<div class="div_table_header">
								Last Name
							</div>
							<div class="div_table_header">
								Address 1
							</div>
							<div class="div_table_header">
								Address 2
							</div>
							<div class="div_table_header">
								City
							</div>
							<div class="div_table_header">
								State
							</div>
							<div class="div_table_header">
								Zip
							</div>
							<div class="div_table_header">
								Country
							</div>
							<div class="div_table_header">
								Date
							</div>
						</div>
					</div>
					<div class="div_table_body">
						<?php 
							
							//iterate through results and print out.
							while ($myrow = $result->fetch_assoc()){ 
						?>
							<div class="div_table_row">
								<div class="div_table_cell">
									<?= $myrow['first_name'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['last_name'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['address_1'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['address_2'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['city'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['state'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['zip'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['country'] ?>
								</div>
								<div class="div_table_cell">
									<?= $myrow['create_date'] ?>
								</div>
							</div>
						<?php
							}
						?>
					</div>
				</div>
			<?php 
				}
			?>
		</fieldset>
</div>
<?php 
	include 'footer.php'; 
	echo $footerContent;
?>