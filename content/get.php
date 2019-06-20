<?php
	include '../includes/session.php';
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];
	$operator = $_GET['operator'];
	
?>

		<div class="container jumbotron" style="text-align: center; height:600px;" >
			<form  method='get' >
			<input type="hidden" name="page_slug" value="get" />
				<div class="input-group mb-3">
					<input type='number' name='num1' required class="form-control" placeholder="First number"/>
					<div class="form-check-inline">	
						<input type="radio" name="operator" value="+" required style="margin-left:20px;">+  
						<input type="radio" name="operator" value="-" style="margin-left:20px;">-  
						<input type="radio" name="operator" value="*" style="margin-left:20px;">*  
						<input type="radio" name="operator" value="/" style="margin-left:20px;">/  
					</div>
					<input type='number' name='num2' required class="form-control" placeholder="Second number"/>
				</div>	
				<button type='submit' class="btn btn-primary" style="margin-bottom:20px;">Submit</button>
			</form>
			<?php
				if(isset($_GET["num1"])){	
					switch ($operator) {
						case "+":
							$result = $num1+$num2;
							break;
						case "-":
							$result = $num1-$num2;
							break;
						case "*":
							$result = $num1*$num2;
							break;
						default:
							$result = $num1/$num2;
					}
					echo '<h1 style="font-family: Shrikhand, cursive">'.$num1.$operator.$num2.' = '.$result.'</h1>';
				}	
			?>
		</div>	
		