<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <input type="text" id="product_code_input" placeholder="Enter product code">
    <div id="product_name_display"></div>

    <script>
        $(document).ready(function() {
            $('#product_code_input').on('keyup', function() {
                var productCode = $(this).val();
                $.ajax({
                    url: '/getdata',
                    type: 'GET',
                    accepts: {
                        mycustomtype: 'application/x-some-custom-type'
                    },
                    converters: {
                        'text mycustomtype': function(result) {
                            // Manipulasi respons sesuai kebutuhan
                            var newResult = result.toUpperCase();
                            return newResult;
                        }
                    },
                    data: {
                        product_code: productCode
                    },
                    dataType: 'mycustomtype',
                    success: function(response) {
                        $('#product_name_display').text(response);
                    },
                    error: function(xhr) {
                        $('#product_name_display').text('Product not found');
                    }
                });
            });
        });
    </script>
</body>

</html>
