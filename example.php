<form action="" method="post">
  <button type="submit" name="submit">Click Me</button>
</form>

<?php
	require_once('function.php');
	if(isset($_POST['submit']))
	{
    $to       = 'emrifan6@gmail.com';
    $subject  = '02 Subject Pengiriman Email Uji Coba';
    $message  = '<p>Isi dari Email Testing 02</p>';
    smtp_mail($to, $subject, $message, '', '', 0, 0, true);
    
    /*
      jika menggunakan fungsi mail biasa : mail($to, $subject, $message);
      dapat juga menggunakan fungsi smtp secara dasar : smtp_mail($to, $subject, $message);
      jangan lupa melakukan konfigurasi pada file function.php
    */
	}
?>