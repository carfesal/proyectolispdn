<?php 
    session_start();
    if(isset($_SESSION['usr'])){
        $total = $_SESSION['total'] + $_POST['subtotal'];;
        $_SESSION['total'] = $total;
        echo "<script>document.getElementById('total').textContent = '$total'</script>";
    }
?>