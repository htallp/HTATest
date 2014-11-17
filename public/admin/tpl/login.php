<div class="overlay">
	<div class="close"><img src="assets/img/close.png"/></div>
	<div id="login">
		<span>Our Enterprise CMS</span>
		<form action="" method="POST">
			<input type="hidden" name="login" value="<?php print date("Ymd");?>"/>
			<input type="text" name="hta-user" placeholder="Username"/>
			<input type="password" name="hta-pass" placeholder="Password"/>
			<div class="menu-button-login">
				<input type="submit" value="Login" class="btn btn-success"/>
			</div>
		</form>
	</div>
</div>
<script>
	$("div.close").click(function(){
		$("div.overlay").fadeOut();
	});
</script>
