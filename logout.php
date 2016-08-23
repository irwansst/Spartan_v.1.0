<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Panel User'); window.location = 'index.php'</script>";
?>
