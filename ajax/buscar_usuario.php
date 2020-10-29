<?php
	require_once ("../vistas/config/db.php");
	require_once ("../vistas/config/conexion.php");
?>

<?php

$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "productos";
		 $sWhere = "";
		 $sWhere.="WHERE id<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and titulo like '%$q%' or detalles like '%$q%'";
			
		}
		
		$sWhere.=" order by id asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = 'perfilMayoreo.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			  <table class="table table-hover" style="border-color: #337ab7;" id="buscador">
			  	<thead>
				<tr style="color: #fff; background-color: #337ab7; border-color: #337ab7;">
					<th>ID</th>
					<th>CÓDIGO</th>
					<th>DESCRIPCIÓN</th>
					<th>MARCA</th>
					<th>UNIDAD</th>
					<th>PRECIO</th>
					
				</tr>
				</thead>
				<tbody>
				<?php
				
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id'];
						
						$descripcion=$row['titulo'];
						$precio=$row['precio'];

						$array = utf8_decode($row['detalles']);

						list($unidad, $codigo, $marca) = explode(',', utf8_encode($array));

						
						

					?>

					
				
					<tr>
						<td><?php echo utf8_encode($id); ?></td>
						<td><?php echo utf8_encode(preg_replace('([^a-zA-Z0-9.]+$)', '',substr($codigo, 11))); ?></td>
						<td><?php echo utf8_encode($descripcion);?></td>
						<td><?php echo utf8_encode(preg_replace('([^a-zA-Z0-9.])', '' ,substr($marca,10))); ?></td>
						<td><?php echo utf8_encode(preg_replace('([^a-zA-Z0-9.])', '',substr($unidad, 10))); ?></td>
						<td style="font-weight: bold;">$ <?php echo utf8_encode(number_format($precio,2)); ?></td>
										
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
				</tbody>
			  </table>
			</div>
			<?php
		}
	}
?>
