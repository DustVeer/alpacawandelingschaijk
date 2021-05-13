<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        function onSubmit(token) {
          document.getElementById("demo-form").submit();
        }
    </script>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="text">
        <input type="email" name="email">
            <button class="g-recaptcha" 
            data-sitekey="reCAPTCHA_site_key" 
            data-callback='onSubmit' 
            data-action='submit'>Submit</button>
        <input type="submit">
    </form>
</body>
</html>
<?php 



?>