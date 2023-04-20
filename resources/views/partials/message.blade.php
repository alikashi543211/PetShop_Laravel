<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('flash_message_success'))
<?php
$success=Session::get('flash_message_success');
?>
             <script> swal("Success!","<?= $success ?>", "success"); </script>
              
                @endif

                @if(Session::has('flash_message_error'))
                <?php
$error=Session::get('flash_message_error');
?>
                <script> swal("Error!", "<?= $error ?>", "error"); </script>
              
                @endif