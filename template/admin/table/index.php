 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h5 class="font-20 mt-15 mb-1">Table</h5>

<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="admin.php?page=table&cmd=edit"
			class="btn btn-success">Add</a>
	</div>
	
	
</div>
<!--End of Action//--> 
   
<!--Data display of table-->     
<div style="overflow-x:auto;width:100%;">      
<table cellspacing="3" cellpadding="3" class="table table-striped table-bordered">
    <tr>
		<th>room_id</th>
        <th>table_no</th>
        <th>position</th>
        <th>description</th>
        <th>no_of_chairs</th>
        <th>cost</th>
        <th>picture</th>
		<th>Actions</th>
    </tr>
	<?php foreach($table as $c){ ?>
    <tr>
        <td><?php 
		
		
		    $result = $wpdb->get_results($wpdb->prepare("SELECT * from wp_room WHERE id='".$c->room_id."'"));
		if(!(array)$result){
			$fields = $wpdb->get_col("SELECT * from wp_room");
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		if (!empty($wpdb->last_error)){
			echo $wpdb->last_error;
			exit;
		}
		
		echo $result[0]->room_no;
		
		?>
        
        </td>
        <td><?php echo $c->table_no; ?></td>
         <td><?php echo $c->position; ?></td>
        <td><?php echo $c->description; ?></td>
        <td><?php echo $c->no_of_chairs; ?></td>
        <td><?php echo $c->cost; ?></td>
         <td>   
              <img src="<?php echo $c->picture; ?>" width="100">
           
        </td>

		<td>
            <a href="admin.php?page=table&cmd=edit&id=<?=$c->id?>" class="action-icon"> Edit</a>
            <a href="admin.php?page=table&cmd=delete&id=<?=$c->id?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> Delete</a>
         </td>
    </tr>
	<?php } ?>
</table>
</div>
<!--End of Data display of table//--> 

<!--No data-->
<?php
	if(count($table)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<!--End of Pagination//-->
