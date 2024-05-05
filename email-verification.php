 <!-- Add SweetAlert2 CSS and JS links -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.2/dist/sweetalert2.all.min.js"></script>

<?php
include ("db_conection.php");

if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verfication_code = $_POST["verification_code"];

    // echo "email = " . $email . " verification code = " . $verfication_code . "";

    $sql = "UPDATE users SET email_verified_at = NOW() WHERE user_email = '" . $email . "' AND verification_code = '" . $verfication_code . "'";

    $result = mysqli_query($dbcon, $sql);

    if (mysqli_affected_rows($dbcon) == 0) {
        //insert html tag for verification code failed
        die("<script>
        document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            title: 'Error',
            text: 'Verification failed. Please try again.',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Try again',
            cancelButtonText: 'Return to Home Page'
          }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
            else {
                window.location.href = 'index.php';
            }
          });
        });
        </script>");
    }

    //insert html tag for verification successful
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    Swal.fire({
        title: 'Account Activated',
        text: 'Your account has been successfully activated! You can now log in using your credentials.',
        icon: 'success',
        confirmButtonText: 'Go to Home Page',
        confirmButtonColor: '#3085d6',
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php';
        }
      });
    });
    </script>
    ";
    exit();
}
?>

<!-- <form method="POST">
    <input type="Hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required>

    <input type="submit" name="verify_email" placeholder="Verify Email" required>
</form> -->

<script>
    // Make sure the document is loaded
    document.addEventListener('DOMContentLoaded', function () {

        const email = '<?php echo $_GET['email']; ?>';
        
        Swal.fire({
            title: 'Verify its you',
            text: 'We have sent verification code to your email. Please check your inbox and enter the code below.',
            input: 'text',
            imageUrl: 'assets/img/email-verify.png',
            imageWidth: 150,
            imageHeight: 150,
            inputLabel: 'Enter verification code',
            inputPlaceholder: 'Enter 6-digit code',
            confirmButtonText: 'Verify Code',
            confirmButtonColor: '#10556b',
            showCancelButton: false,
            allowOutsideClick: false,
            preConfirm: (verificationCode) => {
                if (!verificationCode) {
                    Swal.showValidationMessage('Verification code cannot be empty.');
                }
                return verificationCode;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const verificationCode = result.value;

                // Create a form to submit the verification data
                const form = document.createElement('form');
                form.method = 'POST';

                // Add the hidden input for email
                const emailInput = document.createElement('input');
                emailInput.type = 'hidden';
                emailInput.name = 'email';
                emailInput.value = email;
                form.appendChild(emailInput);

                // Add the input for verification code
                const verificationCodeInput = document.createElement('input');
                verificationCodeInput.type = 'hidden';
                verificationCodeInput.name = 'verification_code';
                verificationCodeInput.value = verificationCode;
                form.appendChild(verificationCodeInput);

                // Add the submit input
                const submitInput = document.createElement('input');
                submitInput.type = 'hidden';
                submitInput.name = 'verify_email';
                form.appendChild(submitInput);

                // Append the form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>