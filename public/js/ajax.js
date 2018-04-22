$('[data-ajax="apply"]').on('click',function(){

	var $_this = $(this)
	var $_url = $_this.data('url');
	var $_target = $_this.data('target');
	var $_token = $('[name="_token"]').val();
	$.ajax({
        url: $_url, 
		data: {id:$_target,'_token':$_token},
		cache: false, 
		type: 'POST', 
		dataType: 'json',
		success: function($response){
		if ($response.response==200) {
			swal({
				title: $response.message,
				text: "Success",
				type: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				closeOnEsc: false,
				allowOutsideClick:false,
				cancelButtonColor: '#d33',
				button: 'Ok',
				timer: 1000
			});
			$_this.html('Applied')
			$_this.toggleClass('btn-success')
			$_this.toggleClass('btn-danger')
		}
    }
	});
})