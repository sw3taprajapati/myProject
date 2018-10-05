</main>
</div>
<footer class="footer">
	<div class="container">
		<span><i class="fa fa-copyright"></i> Copyright 2018 | All rights reserved</span>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>

<script type="text/javascript">
	function confirmationBox($operation){
		return confirm("'Are you sure you want to "+$operation+"'");
	}

	<?php 
	if(isset($_SESSION['class'])){
		?>
		setTimeout(function(){
			document.getElementById('<?php echo $_SESSION['class'] ?>').remove();
		}, 3000);
		<?php

	} ?>
	
	function logout(){
		return confirm('Are you sure you want to logout?');
	}

	jQuery(document).ready(function($){
		$('#confirm-password').on("change",function(){
			var newPassword=$("#new-password").val();
			var confirmPassword=$("#confirm-password").val();

			if(newPassword==confirmPassword){

				$('#password-new').removeClass('fail');
				$('#password-new').text("password matched");
				$('#password-new').addClass('success');

				$('#password-confirm').removeClass('fail');
				$('#password-confirm').text("password matched");
				$('#password-confirm').addClass('success');

			}else{

				$('#password-new').removeClass('success');
				$('#password-new').text("password doesnot matches");
				$('#password-new').addClass('fail');

				$('#password-confirm').removeClass('success');
				$('#password-confirm').text("password doesnot matches");
				$('#password-confirm').addClass('fail');

			}

		});
		
		$('#btn-change').click(function(){
			$('#btn-change').hide();
			$('.div-form').hide();
			$('.change-password-field').show();
		});

		$('#btn-cancel').click(function(){
			$('#btn-change').show();
			$('.div-form').show();
			$('.change-password-field').hide();
		});

		$('#old-password').focusout(function(){

			var oldPassword=$("#old-password");
			$.ajax({  
				type: 'POST',
				url: 'changePassword.php', 
				data: { password: this.oldPassword },
				success: function(result) {
					if(result==true){
						$('#password-old').text("password doesnt match true");
						$('#password-old').addClass('fail');
					}else{
						$('#password-old').text("password doesnt match true");
						$('#password-old').addClass('fail');
					}
				}
			});
		});
		$('#email').on("blur",function(){
			var email=$("#email").val();

			$.ajax({
				type:'POST',
				url:'index.php?filename=pages/validate.php',
				email:{email:this.email},
				success:function(result){
					if (result==true){
						$('#password-old').text("password doesnt match true");
						$('#password-old').addClass('fail');
					}else{
						$('#password-old').text("password doesnt match true");
						$('#password-old').addClass('fail');
					}
				}
			});
		});
	});

	$('#edit-requirements').click(function(){
		$('.div-form').hide();
		$('.edit-description').show();
	});

	$('#cancel').click(function(){
		$('.div-form').show();
		$('.edit-description').hide();

	});
</script>
</div>
<?php
if(isset($_SESSION['status'])){
	unset($_SESSION['status']);
	unset($_SESSION['class']);
}?>
</body>
</html>