<!--Right hand area-->
<div id="right_pannel"; style="height:100%;">
	<div id="toptab" style="width:100%;"><b>Visual Results</b></div>
	<form action="added_pat.php" method="post">

		<!--Beginning of first row of checks-->
		<div style="width:100%; height:100%; float:left;">

			<!-- Cable check start -->
			<div style="width:33%; height:100%; float:left;" class="p_right;">
				<!--Table holding div-->
				<b>Cable Check</b>
				<table style="width:100%">
					<tr>
						<td>
							Pass
						</td>
						<td>
							<input title="" type="radio" name="cable_check" value="pass" required></input>
						</td>
					</tr>
					<tr>
						<td>
							Fail
						</td>
						<td>
							<input title="" type="radio" name="cable_check" value="fail"></input>
						</td>
					</tr>
				</table>
			</div>
			<!-- Cable check end -->

			<!-- Appliance check start -->
			<div style="width:33%; height:100%; float:left;" class="p_right;">
				<b>Appliance check</b>
				<table style="width:100%">
					<tr>
						<td>
							Pass
						</td>
						<td>
							<input title="" type="radio" name="appliance_check" value="pass" required></input>
						</td>
					</tr>
					<tr>
						<td>
							Fail
						</td>
						<td>
							<input title="" type="radio" name="appliance_check" value="fail"></input>
						</td>
					</tr>
				</table>
			</div>
			<!-- Appliance check end -->

			<!-- Plug External Check start -->
			<div style="width:33%; height:100%; float:left;" class="p_right;">
				<!--Table div-->
				<b>Plug Check (External)</b>
				<table style="width:100%">
					<tr>
						<td>
							Pass
						</td>
						<td>
							<input title="" type="radio" name="plug_check_external" value="pass" required></input>
						</td>
					</tr>
					<tr>
						<td>
							Fail
						</td>
						<td>
							<input title="" type="radio" name="plug_check_external" value="fail"></input>
						</td>
					</tr>
				</table>
			</div>
			<!-- Plug External Check end -->

		</div>
		<!--End of first row of checks-->

		<!-- Beginning of second row of checks -->
		<div style="width:100%; height:100%; float:left;">

			<!-- Plug internal check start -->
			<div style="width:33%; height:100%; float:left;" class="p_right;">
				<b>Plug Check (Internal)</b>
				<table style="width:100%">
					<tr>
						<td>
							Pass
						</td>
						<td>
							<input title="" type="radio" name="plug_check_internal" value="pass" required></input>
						</td>
					</tr>
					<tr>
						<td>
							Fail
						</td>
						<td>
							<input title="" type="radio" name="plug_check_internal" value="fail"></input>
						</td>
					</tr>
					<tr>
						<td>
							Not Applicable
						</td>
						<td>
							<input title="" type="radio" name="plug_check_internal" value="NA"></input>
						</td>
					</tr>
				</table>
			</div>
			<!-- plug internal check end -->

			<!-- Fuse size start -->
			<div style="width:66%; height:100%; float:left;" class="p_right;">
				<b>Fuse Size</b>
				<br>Is the correct size fuse fitted?
				<br>It is regesterd as having a
				<?php  ?>amp fuse
				<br>Yes
				<input title="" type="radio" name="fuse_check" value="yes" required></input>
				<br>No
				<input title="" type="radio" name="fuse_check" value="no"></input>
				<br>
				<input type="hidden" name="tool_id" value="<?php echo($tool_id);?>"></input>
				<input type="hidden" name="combined_inspection_frequency" value="<?php echo($combined_inspection_frequency);?>"></input>
				<input type="hidden" name="tool_id_number" value="<?php echo($id_number);?>"></input>
				<input type="hidden" name="client_id" value="<?php echo($client_id);?>"></input>
			</div>
			<!-- Fuse size end -->

		</div>
		<!--End of second row-->

		<div id="toptab" style="width:100%"><b>Test Results</b></div>
		<div style="width:100%; height:150%; float:left;">

			<!-- Insulation  Check start -->
			<div style="width:33%; height:100%; float:left;" class="p_right;">
				<!--Table div-->
				<b>Insulation Check</b>
				<table style="width:100%">
					<tr>
						<td>
							Pass
						</td>
						<td>
							<input title="" type="radio" name="insulation_check" value="pass" required></input>
						</td>
					</tr>
					<tr>
						<td>
							Fail
						</td>
						<td>
							<input title="" type="radio" name="insulation_check" value="fail"></input>
						</td>
					</tr>
				</table>
			</div>
			<!-- Insulation Check end -->

		</div>
		<!-- End of row -->
		<!--Bottom row, Datepicker and notes-->
		<div style="width:100%; height:100%; float:left;">

			<!-- Date picker-->
			<div style="width:50%; height:100%; float:left;" class="p_right;">
				<b>Date appliance tested</b><br>
				<?php $today = date("d/m/Y");?>
				<input title="" name="datepicker" style="width:90%;"type="text" value=<?php echo($today); ?> id="datepicker" ></input>
				<br>
				<input type="hidden" name="currentTime" value=<?php echo date("h:i:s")?>></input>
			</div>
			<!-- End of date picker-->

			<!--Optional Notes -->
				<div style="width:50%; height:100%; float:left;">
					<b>Notes (optional)</b><br>
					<textarea style="width:90%;" title="Optional Notes"rows="5" cols="50" name="notes" alt="Notes"></textarea>
				</div>
				<!-- Optional Notes -->
		</div>
		<!--End Of Bottom row, Datepicker and notes-->


		<!-- End of row -->
		<br>
		<div style="width:100%; height:10px; float:left;"></div>
		<input type="submit" name="submit" value="Save" id="submit" ></input>
	</form>
</div>
<!--End of right hand pannel-->
