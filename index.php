<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../faucet/configuration.php');
/*     Nanotoken Faucet Script     */
/*      Provided by: [zelles]      */
/*  Do not remove these comments.  */
?>
<html>
<head>
<title>HipCoin Faucet</title>
<style>
#hold {
	text-align: center;
}

#form {
	height: 300px;
	width: 400px;
	margin: 0 auto;
	margin-top: 200px;
	border: 2px solid #000;
	border-radius: 5px;
}

.button {
	height: 24px;
	width: auto;
}

.input {
	width: 280px;
	text-align: center;
	margin: 10px;	
}
</style>
</head>
<body>
<div id='hold'>
<div id='form'>
	<form method="POST" action="index.php">	
		<input type="hidden" name="nanoaction" value="faucet">           
		<h2>Request Free HipCoins</h2><br>
			           <?php
           				 if(isset($body)) { echo $body; }
          			    ?>
		<b>Balance: </b><?php echo $nanotokend->getbalance('4570df78e89a01c459c3cf01b36d309a'); ?> HIPs<br>
		<input type="text" name="nanoaddr" class='input' placeholder="LNb6xt6wZaP6HKdac1PjpTCf7jAdySSK1E" autofocus required><br>
		<input type='hidden' name='amount' value='<?php echo $payout_amount; ?>'>
		<input type="submit" name="submit" value="Send Some HIPs" class="button"><br><br>
		<a href='https://github.com/hippiesurplus/HipCoin'>Source Code</a>
		<a href='../files/hipcoin-qt-windows.zip'>Windows Client</a>
		<a href='../files/hipcoin-qt-linux.tar.gz'>Linux Client</a>
		<a href='../wallet/'>Online Wallet</a>
	</form>
</div>
</div>
</body>
</html>
