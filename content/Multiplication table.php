
		<?php include '../includes/session.php';?>
		<script>
			$(document).ready(function(){
				$(".sum").click(function(){
					$("#count").text($(this).data("count"));
				})
			})
		</script>
		<style>
			body{
				
			}
			h6{
				font-size: 2vh;
			}
			.number,.sum{
				
				height:4.5vh;
				width:4.5vh;
				text-align:center;
				border-radius:0.6vh;
			}
			.number{
				color:white;
				background-color:#aaa;
			}
			.sum{
				background-color:#f7c594;
				cursor: pointer;
			} 
			.sum:hover{
				background-color:#e9ecef;
			} 
			.sum:active{
				border:0.2vh inset rgb(150,150,150);
			}
			@media only screen and (max-width: 600px) {
				h6{
				font-size: 4vw;
			}
			.number,.sum{
				
				height:8vw;
				width:8vw;
				text-align:center;
				border-radius:0.6vh;
			}
			}
		</style>
	
			<div class="jumbotron">
				<div class="table_box">
					<table style="margin:auto; background-color:black; border-collapse: separate; border-spacing: 0.7vh; border:1vh solid black; border-radius:1vh; ">
						<tr>
							<th colspan="10" style="background-color:#f7c594; height:110px;text-align:center; border-bottom:1.5vh solid black; border-radius:0.7vh;"><h1 id="count"></h1></th>
						</tr>
						<?php
							for($i=1;$i<=10;$i++){
								echo'<tr>';
								for($i1=1;$i1<=10;$i1++){
									$sum=$i1*$i;
						?>
									<td <?php $i1==1 || $i==1 ? print 'class="number"':print'class="sum"'; echo 'data-count="'.$i1.'*'.$i.'='.$sum.'"';?>><h6 style="margin:0px;"><?=$sum?></h6></td>
						<?php
								}
								echo'</tr>';
							}
						?>
					</table>
				</div>
			</div>	
		