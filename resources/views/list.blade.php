<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Ajax Todo List<a  href="#" data-toggle="modal" data-target="#myModal" id="addNew"><i class="fa fa-plus pull-right" aria-hidden="true"></i></a>
					</h3>
				  </div>
				  <div class="panel-body">

				    <ul class="list-group" id="refreshthis">
				    	@foreach($items as $item)
						 <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}</li>
				    	@endforeach


				    </ul>
				  </div>

				</div>
			</div>
			
			<!--Modal javascript Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="title">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        <p><input type="text" placeholder="Type here" id="addItem" class="form-control"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-warning" id="delete" data-dismiss="modal" style="display: none">Delete</button>
			        <button type="button" class="btn btn-primary"  id="savechanges" style="display: none">Save changes</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" id="AddButton">AddItem</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!--Modal completed -->

		</div>
	</div>

 {{csrf_field()}}  <!--If Internel error 500 then use token concept-->

	
<!--Always jquery first then bootstrap javascript becoz bootstrap Javascript require jquery-->
<!--jquery cdn-->
	<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<!--Javascript  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

	$(document).ready(function() {
		$(".ourItem").on("click",function()
			{ 
				console.log("OK");
				var item=$(this).text();
				$('#addItem').val(item);
				$('#title').text('Edit Item');
				$('#delete').show('400');
				$('#savechanges').show('400');
				$('#AddButton').hide();
				console.log(item);
			});﻿

		$("#addNew").on("click",function()
			{ 
				
				$('#addItem').val('');
				$('#title').text('ADD Item');
				$('#delete').hide();
				$('#savechanges').hide();
				$('#AddButton').show();
				//console.log(item);
			});﻿

		$("#AddButton").click(function(event) {
			//ie.  when AddButton is pressed then take value from text field of form 
		var text=$('#addItem').val(); 
		

		$.post('list', {'text':text,'_token':$('input[name=_token]').val()}, function(data) {
			/*optional stuff to do after success */
			console.log(data);
			$('#refreshthis').load(location.href+ ' #refreshthis');  //put space inbetween ' and # 
		});
							//console.log(data);
			//when + is clicked and Add Button is clicked then this post method gets activate
			//so it call create() method of todolistcontroller then from this method it will return value to data field of this function
		});
		//console.log(text);
		}) ;
	
	
</script>
</body>
</html>