<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        //alert();
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            //console.log(name+price);
            $.ajax({
                url: "{{ route('Store.Product') }}",
                method: 'post',
                data: {
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset('hide');
                        $('.table').load(location.href+' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errmsgcontainer').append('<span class="text-danger">' +
                            value + '</span>' + '<br>')
                    });
                }
            });
        })
        //Show product in Edit form
        $(document).on('click','.Edit-form',function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
            
        });
        // Update form
        $(document).on('click', '.Update_product', function(e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            //console.log(name+price);
            $.ajax({
                url: "{{ route('Update.Product') }}",
                method: 'post',
                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_price: up_price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#UpdateModal').modal('hide');
                        $('#UpdateProductForm')[0].reset('hide');
                        $('.table').load(location.href+' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errmsgcontainer').append('<span class="text-danger">' +
                            value + '</span>' + '<br>')
                    });
                }
            });
        })

    });
</script>
