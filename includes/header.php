
<style>
	@media only screen and (max-width: 600px) {
    .media {
        display:block;
  }
}
</style>
<div id="top"></div>
<div class="jumbotron " style="margin-bottom:0; background:#aaa; padding:24px;  ">
	<!--user conectet & disconetion-->
	<div style="text-align:right; float:right">
		<h6 style="color:#fff;">
			<b><?= $username ?></b>: is connected
		</h6>
		<form method="post">
			<button type="submit" name="User_logged_out" class="btn btn-secondary" >signout
				<i class="fas fa-sign-out-alt" ></i>
			</button>
		</form>
	</div>
	<div class="media">
	<img src="../includes/icons/<?= $page_slug ?>.png" class="icon_zize">
	<div class="media-body align-self-end">
		<h1  style="font-size: 5vh; font-family: 'Shrikhand', cursive;color:#39ace7; margin-bottom:0">
			<?= $page_slug ?>
		</h1>
	</div>
	</div>
	
</div>

<!--menu-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item ">
				<a class="nav-link" href="?page_slug=home">	<i class="fas fa-home"></i> home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?page_slug=Multiplication table"><i class="fas fa-calculator"></i> Multiplication table</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?page_slug=get"><i class="fab fa-joget"></i> get</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?page_slug=gallery"><i class="far fa-images"></i> gallery</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?page_slug=history"><i class="fas fa-history"></i> history</a>
			</li>			
		</ul>
	</div>
</nav>



  

