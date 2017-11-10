<style type="text/css">
.stilo{
	color:#000;
	text-transform: none;
}

.sub{
	padding: 10px;
	cursor: pointer;
	margin-right: 10px;
	border-radius: 10px;
}
</style>
			<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<div class="stilo"><form action="php/deleteoption3.php" method="POST">';
			echo '<input name="id" type="hidden" value="'. $messages_id . '" />';
			echo 'Are you sure you want to delete this Image?';
			echo '<center><div>'.'<input name="yes" type="submit" value="Yes" class="sub" /><input name="no" type="submit" value="No" class="sub" />'.'</div>';
			echo '</center></form></div>';
			
	}
			?>
			