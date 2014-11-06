<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){
			$("td.access").each(function(){
				var moduleName = $(this).attr("module");
				var e_view = $(this).children('input[type="checkbox"].view');
				var e_add = $(this).children("input[type='checkbox'].add");
				var e_edit = $(this).children("input[type='checkbox'].edit");
				var e_delete = $(this).children("input[type='checkbox'].delete");
				
				var view = $(e_view).is(":checked") ? "1" : "0";
				alert(view);
			})
			$("#access").val();
		})
	})
</script>
</head>
<body>
		<input type="text" name="access" id="access" /><br />
		<input type="submit" value="submit" name="submit" id="submit"/>	
		<table class="table beauty-table table-hover">					
			<tbody>
				<tr>
					<td>
						<label>
							<input type="checkbox" name="ModuleEntity"> Entity
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" name="entityProfile"> Entity Profile
						</label>
					</td>
					<td class="access" module="entity">
						<label>
							<input type="checkbox"  class="view"> View
						</label>
						<label>
							<input type="checkbox"  class="add"> Add
						</label>
						<label>
							<input type="checkbox"  class="edit"> Edit
						</label>
						<label>
							<input type="checkbox"  class="delete"> Delete
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>							
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" name="entityProfile"> Module Activation
						</label>
					</td>
					<td class="access" module="module">
						<label>
							<input type="checkbox"  name="module[]" value="view"> View
						</label>
						<label>
							<input type="checkbox"  name="module[]" value="add"> Add
						</label>
						<label>
							<input type="checkbox"  name="module[]" value="edit"> Edit
						</label>
						<label>
							<input type="checkbox"  name="module[]" value="delete"> Delete
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>							
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" name="entityProfile"> Billing & Invoicing
						</label>
					</td>
					<td class="access" module="billing">
						<label>
							<input type="checkbox"  name="billing[]" value="view"> View
						</label>
						<label>
							<input type="checkbox"  name="billing[]" value="add"> Add
						</label>
						<label>
							<input type="checkbox"  name="billing[]" value="edit"> Edit
						</label>
						<label>
							<input type="checkbox"  name="billing[]" value="delete"> Delete
						</label>
					</td>
				</tr>
			</tbody>
		</table>
	
</body>
</html>