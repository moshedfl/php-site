<div class="container">
	<form method="post">
	<button type="submit" name="clear_history"  class="btn btn-warning" style="margin:20px;">clear history</button>
	</form>		
	<?php
		if(isset($_SESSION[history])){
	?>
	<h2 style="font-family: Shrikhand, cursive">page history</h2>
	<p>Your visit history on the site pages:</p>            
	<table class="table table-striped">
		<thead class="thead-dark">
			<tr>
				<th>Page name</th>
				<th>Amount of visits</th>
				<th>Time of last visit</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($_SESSION[history] as $page) {
					echo
				'<tr>
					<td>'.$page[url].'</td>
					<td>'.$page[times_visit].'</td>
					<td>'.$page[time_lest_request].'</td>
				</tr>';
				}
			?>
		</tbody>
	</table>

	<?php
		}else{
			echo '<h1 style="font-family: Shrikhand, cursive">no history</h1>
</div>';
		}
		if(isset($_POST[clear_history])){
				
			unset($_SESSION[history]);
			header("Refresh:0");
			
		}	
	?>		
	
