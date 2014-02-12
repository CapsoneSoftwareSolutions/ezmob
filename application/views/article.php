<!--Start Article Form-->
<html>
	<head>
		<title>Ezmob Article</title>
		<link rel="stylesheet" href="<?php echo base_url; ?>css/bootstrap.min.css">
		<script type="text/javascript" src="<?php echo base_url;?>js/jquery-1.10.0.min.js"></script>	
		<script type="text/javascript" src="<?php echo base_url;?>js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong><?php if(isset($articletitle)){echo $articletitle;}else{echo 'POST ARTICLE';}?></strong>
							<p style="color:red; font-size:12px; font-weight:bold;"><?php if(isset($article_msg)) { echo $article_msg;} ?></p>
						</h3>
					</div>
					<div class="panel-body">

						<div id="validation_errors" style="color:blue; font-size:12px; font-weight:bold;" align="left"></div>
			
						<form accept-charset="UTF-8" name="article" id="articlepost" action="<?php echo base_url;?>home/<?php if(isset($editaction)){ echo $editaction;}else{ echo 'postarticle';}?>" method="POST">
							<div class='form-row'>
         			    		<div class='col-xs-12 form-group required'>
                					<label class='control-label'>Title:</label>
									<input type="hidden" name="articleid" id="articleid" value="<?php if(isset($articleid)){echo $articleid;} ?>">
									<input class='form-control' size='4' type="text" name="title" id="title" value="<?php if(isset($title)){echo $title;}?>"></td>
								</div>
								<div class='col-xs-12 form-group required'>
		                			<label class='control-label'>Description</label>
									<textarea name="description" id="description" class='form-control' size='4'><?php if(isset($description)){echo $description;} ?></textarea>
								</div>
								<div class='col-xs-12 form-group required'>
									<a class="btn btn-primary" href="<?php echo base_url;?>home"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
									<input type="submit" name="<?php if(isset($editsubmit)){echo $editsubmit;}else {echo 'articlesubmit';}?>" id="articlesub" class="btn btn-primary" value="<?php if(isset($editbutton)){echo $editbutton;}else{echo 'POST';}?>">
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Start Article Form Validation -->

<script type="text/javascript">
$("#articlepost").submit(function () {
	
	var title		=	$("#title").val();
	var desc		=	$("#description").val();
	var charRegex	=	/^[a-zA-Z ]+$/;

	if(title=='')
	{

		$("#validation_errors").html("Enter the Title");
		$("#title").val('');
		$("#title").focus();
		return false;
	}
	else if(!charRegex.test(title))
	{

		$("#validation_errors").html("Enter Characters Only");
		$("#title").val('');
		$("#title").focus();
		return false;
	}
	else if(title.length<5)
	{

		$("#validation_errors").html("Enter Minimum 5 Characters");
		$("#title").val('');
		$("#title").focus();
		return false;
	}
	else if(desc=='')
	{

		$("#validation_errors").html("Enter the Description");
		$("#description").val('');
		$("#description").focus();
		return false;
	}
	else if(desc.length<5)
	{

		$("#validation_errors").html("Enter Minimum 5 Characters");
		$("#description").val('');
		$("#description").focus();
		return false;
	}
});
</script>

<!-- End Article Form Validation -->

</body>
</html>
<!--End Article Form-->