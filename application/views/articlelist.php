<!-- Start Article List View-->
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url; ?>css/bootstrap.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url;?>js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="container">
    	<div class="row">
    		<div class="col-md-12">
				<div class="bs-example">
				<h4><strong>ARTICLE LIST</strong></h4>
				<p style="color:red; font-size:12px; font-weight:bold;"><?php if(isset($article_edit_msg)){echo $article_edit_msg;} ?></p>
				 <table class="table table-hover">
					<thead>
			            <tr>
			                <th>Title</th>
			                <th>Description</th>
			                <th>Action</th>
			                <th><td><a href="<?php echo base_url;?>home/postarticle" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a></td></th>
			            </tr>
					</thead>
					 <tbody>
						<?php if(isset($articlelist) && is_array($articlelist)){  foreach($articlelist as $akeys=>$avalues){?>
						<tr>
						<td><?php echo $avalues->title; ?></td>
						<td><?php echo $avalues->description; ?></td>
						<td><a class="btn btn-primary" href="<?php echo base_url;?>home/articleEdit/<?php echo $avalues->art_id;?>"><span class="glyphicon glyphicon-edit"></span>Edit</a>
						<a class="btn btn-primary" href="<?php echo base_url;?>home/articleDelete/<?php echo $avalues->art_id;?>"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>
						</tr>
						<?php } } else{?>
						<tr>
							<td colspan="4">No Articles Found. Add New Article.</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		  </div>
		</div>
	</div>
</body>
</html>

<!--End Article List View -->