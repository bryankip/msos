<script>
	$(document).ready(function() {
				/* Build the DataTable with third column using our custom sort functions */
				$('#example').dataTable( {
					
					
					//"aaSorting": [ [0,'asc'], [1,'asc'] ],
					//"aoColumnDefs": [
						//{ "sType": 'string-case', "aTargets": [ 2 ] }
					//]
				} );
			} );
</script>
<?php
if(!$this->session->userdata("user_id") || $this->session->userdata("user_indicator")!="Administrator" ){
	redirect("home_controller");
}

?>
<div class="panel panel-default">
	<div class="panel-heading">
		System Users.
	</div>
	<div class="panel-body" style="overflow-y: auto">
<table class="table table-responsive table-hover" id="example">
			<thead>
				<th><strong>Names </strong></th>
				<th><strong>Username</strong></th> 
				<th>Status</th>

				<th>Email</th>
				<th>Phone No</th>
				<th>Access Domain</th>
				<th>Action</th>	
			</thead>
			<tbody>
			<?php foreach( $result as $row):?>
				<?php if($row->status==1){ echo '
			<tr>
				<td>'?><?php echo $row->fname;?><?php echo ' </td>
				<td>'?><?php echo $row->username?><?php echo ' </td> 
				<td>'?><?php if ($row->status==1){
					echo 'Active';
				}else{
					echo 'In Active';
				}?><?php 
				/*$da['user']=User::get_usertype($row->usertype_id);
				foreach($da as $rows){$user_domain=$rows->level; break;}*/
				
				echo'
				<td>'.$row->email.'</td>
				<td>'.$row->telephone.'</td>
				<td>';
				$usertype=$row->usertype_id;
				//echo $row->usertype_id;
				if($usertype==1){echo "Administrator";}
				else if($usertype==2){echo "MOH";}
				else if($usertype==3){echo "County Administrator";}
				else if($usertype==4){echo "District Administrator";}
				else if($usertype==5){echo "KEMRI";}
				else{echo "Test";}
				echo '</td>
				</td>
				<td>'?>
					<a href="<?php echo site_url('user_management/user_reset/'.$row->id)?>"
				 class='label label-primary'><span class="glyphicon glyphicon-refresh"></span> Reset Password</a>
					<?php echo'
				
				' ?><?php if ($row->status==1){
					
					echo "<a href='".site_url('user_management/deactive/'.$row->id)."' class='label label-danger'><span class='glyphicon glyphicon-off'></span> Deactivate</a>";
				}else{
					echo "<a href='".site_url('user_management/active/'.$row->id)."' class='label label-info'><span class='glyphicon glyphicon-off'></span> Activate</a>";
					
				}?><?php echo '</td>
				
			</tr>';
			}else{
				echo '<tr style="background-color:#D3D3D3">
				<td>'?><?php echo $row->fname;?><?php echo '</td>
				<td>'?><?php echo $row->username?><?php echo '</td> 
				<td>'?><?php if ($row->status==1){
					echo 'Active';
				}else{
					echo 'In Active';
				}?><?php 
				
				echo'
				<td>'.$row->email.'</td>
				<td>'.$row->telephone.'</td>
				<td>';
				$usertype=$row->usertype_id;
				//echo $row->usertype_id;
				if($usertype==1){echo "Administrator";}
				else if($usertype==2){echo "MOH";}
				else if($usertype==3){echo "County Administrator";}
				else if($usertype==4){echo "District Administrator";}
				else if($usertype==5){echo "KEMRI";}
				else{echo "Test";}
				echo '</td>
				</td>
				<td>'?>
					<a href="<?php echo site_url('user_management/user_reset/'.$row->id)?>"
				 class='label label-primary'><span class="glyphicon glyphicon-refresh"></span> Reset Password</a>
					<?php if ($row->status==1){
					echo "<a href='".site_url('user_management/deactive/'.$row->id)."' class='label label-danger'><span class='glyphicon glyphicon-off'></span> Deactivate</a>";
				}else{
					echo "<a href='".site_url('user_management/active/'.$row->id)."' class='label label-info'><span class='glyphicon glyphicon-off'></span> Activate</a>";
				}?><?php echo '</td>
				
			</tr>';
			}?>
		<?php
 endforeach;
	?>
	</tbody>
		</table>
		</div>
		</div>