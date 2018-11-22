<?php
/*     Nanotoken Faucet Script     */
/*      Provided by: [zelles]      */
/*  Do not remove these comments.  */

/*     HipCoin Faucet Script     */
/*      Provided by: [hippiesurplus]      */
/*  Do not remove these comments.  */

$database_host = '';
$database_user = '';
$database_pass = '';
$database = '';

$nanotokend_rpc_server = "";
$nanotokend_rpc_user = "";
$nanotokend_rpc_password = "";
$nanotokend_rpc_port = "";

$payout_amount = rand(0, 50);

$nanotokend_RPC = "http://".$nanotokend_rpc_user.":".$nanotokend_rpc_password."@".$nanotokend_rpc_server.":".$nanotokend_rpc_port."/";



$nanotokend = new jsonRPCClient($nanotokend_RPC);
?>
