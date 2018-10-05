<?php
$obj=new Organization();
if(isset($_POST['submit'])){
	$obj->addRequirements($_POST['checkBox'],$_POST['description']);
}
if(isset($_GET['id'])){
}
if(isset($_GET['id'])){

}
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
			$description;
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
						$description=$value['item_description'];

						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['categories_list']; ?></td>
							<td><a href="index.php?filename=pages/organization/add-requirements.php&id=<?php echo $value['categories_id'] ?>" onclick="return confirmationBox('remove?');"><i class="fa fa-trash"></i></a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<td>Description of items : </td>
						<td><?php echo $value['item_description']; ?></td>
						<td><i class="fa fa-edit" id="edit-requirements"></i></td>
					</tr>
				</tfoot>
			</table>
			<div class="edit-description">
				<form action="" method="POST">
					<div class="form-group">
						<textarea name="description" id="description" name="description" cols="30" rows="5" placeholder="Edit your description here" value="<?php echo $description ?>" required="required"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Edit Requirement" class="button btn-blue" name="submitedit">
						<input type="button" value="cancel" name="cancel" id="cancel" class="button btn-blue">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php

?>