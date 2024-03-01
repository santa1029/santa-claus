<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script>
    $('#change-password').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type: "POST",
            data: {
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if (response.isSuccess == false) {
                    $('#current_passwordError').text(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors
                    .password_confirmation);
            }
        });
    });

    $('#page-header-notifications-dropdown').on('click', function() {
        $.ajax({
            url: "{{ url('api/alerts') }}",
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                $('#page-header-notifications-number').css('display', 'none');
            },
            error: function(response) {}
        });
    });

    $('.btn-alert-delete').on('click', function() {
        const alert_id = $(this).attr('data-id');
        $.ajax({
            url: "{{ url('api/alert') }}" + `/${alert_id}`,
            type: "DELETE",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                window.location.href = window.location.href;
            },
            error: function(response) {}
        });
    });

    $('#btn-alert-delete-all').on('click', function() {
        $.ajax({
            url: "{{ url('api/alerts') }}",
            type: "DELETE",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                window.location.href = window.location.href;
            },
            error: function(response) {}
        });
    });
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

@yield('script-bottom')
