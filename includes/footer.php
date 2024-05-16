
	<footer>
		<div class="container">
			<p>Copyright &copy; <?php echo Date('Y'); ?>. Hamro News. All Right Reseved. Developed By PHP Team.</p>
		</div>
	</footer>
	
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

	<script>
	$(document).ready(function(){

		$('#keywords').keyup(function(){

			var keywords = $('#keywords').val();

			if(keywords.length > 3){
				$.ajax({
					url: 'search_api.php',
					data: { 'keywords': keywords},
					method: 'post',
					dataType: 'text',
					success: function(response) {
						document.getElementById("searchlist").innerHTML = response;
					}
				});
			} else{
				document.getElementById("searchlist").innerHTML = '';
			}

		});

	});
</script>
</div>
</body>
</html>