<?php
include('classes/organization/EditRequirement.php');

$obj=new EditRequirement();
$data=$obj->getCategoriesList(); 
?>
<section class="add-requirements">
	<div class="container">
		<div class="div-form">
			<h2>Add Your Requirements</h2>
			<?php
			if(isset($_SESSION['status'])){
				if($_SESSION['class']=='success'){
					$icon='fa fa-check';
				}else{
					$icon='fa fa-times'; 
				}
				?>
				<div class="<?php echo $_SESSION['class'] ?>" id="<?php echo $_SESSION['class'] ?>"><i class="<?php echo $icon ?>"></i><?php echo $_SESSION['status']; ?></div>
				<?php
			}
			unset($_SESSION['status']);
			?>
			<form action="" method="POST">
				<?php 

				foreach ($data as $value) {
					?>
					<input type="checkbox" name="checkBox[]" id="<?php echo $value['categories_list'] ?>" value="<?php echo $value['categories_id'] ?>">
					<label for="<?php echo $value['categories_list'] ?>"><?php echo $value['categories_list'] ?></label>
					<?php
				}
				?>
				<div class="form-group">
					<textarea name="description" id="description" name="description" cols="30" rows="5" required="required"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Add Categories" class=" button btn-blue">
				</div>
			</form>
		</div>

		<div class="requirements-details">
			
			<?php
			$i=1; 
			$data=$obj->getRequirementDetails(); 
			?>
			
			<table>
				<h2>Your Requirements</h2>
				<thead>
					<tr>
						<th>S.N</th>
						<th>Categories list</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data as $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['categories_list']; ?></td>
							<td><?php echo $value['item_description']; ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php

if(isset($_POST['submit'])){
	$obj->addRequirements($_POST['checkBox'],$_POST['description']);
	
	echo($_POST['checkbox']);
	echo($_POST['description']);
	die;
}
?>