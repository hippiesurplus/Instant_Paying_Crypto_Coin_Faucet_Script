<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('jsonRPCClient.php');
require('config.php');

/*     Nanotoken Faucet Script     */
/*      Provided by: [zelles]      */
/*  Do not remove these comments.  */

/*     HipCoin Faucet Script     */
/*      Provided by: [hippiesurplus]      */
/*  Do not remove these comments.  */

$date = date("n/j/Y");;
$ip = $_SERVER['REMOTE_ADDR'];

$conn=mysqli_connect($database_host, $database_user, $database_pass, $database) or mysqli_connect_error();

if(isset($_POST['nanoaction'])) { $Take_Action = addslashes(strip_tags($_POST['nanoaction'])); } else { $Take_Action = "none"; }
if(isset($_POST['nanoaddr'])) { $User_Address = addslashes(strip_tags($_POST['nanoaddr'])); }

if($Take_Action=="faucet") {

   if(isset($_POST['nanoaddr'])) {

      if($User_Address!="") {
         $result = $conn->query("SELECT * FROM faucetbox WHERE faucetip='$ip' and faucetaddress='$User_Address'");
         $num_rows = $result->num_rows;

         if($num_rows==0) {
            $result = $conn->query("SELECT * FROM faucetbox WHERE faucetdate='$date' and faucetaddress='$User_Address'");
            $num_rows = $result->num_rows;

            if($num_rows==0) {
               $result = $conn->query("SELECT * FROM faucetbox WHERE faucetip='$ip' and faucetdate='$date'");
               $num_rows = $result->num_rows;

               if($num_rows==0) {
		  $payout_amount = $_POST['amount'];
                  $send_amount = floatval($payout_amount);
                  $txid = $nanotokend->sendtoaddress($User_Address,$send_amount,'HipCoin Faucet','');

                  if($txid) { $send_message = $txid; } else { $send_message = "Your send failed?"; }
                  $sql = $conn->query("INSERT INTO faucetbox (id,faucetdate,faucetip,faucetaddress,faucetamount,faucetpaid) VALUES ('','$date','$ip','$User_Address','$payout_amount','1')");
                  $body = '<table class="roundit" style="height: 100px; width: 440px">
                              <tr>
                                 <td align="center" valign="middle">
                                    Success, HipCoins sent.<br>
                                    Come back for more tomorrow.<br>
                                    View your Transaction ID below:
                                 </td>
                              </tr>
                           </table>'.
                           $send_message;
               } else {
                  $body = '<table class="roundit" style="height: 100px; width: 440px">
                             <tr>
                                 <td align="center" valign="middle">
                                    You already requested HipCoins today.<br>
                                    Come back for more tomorrow.
                                 </td>
                              </tr>
                           </table>';
               }
            } else {
               $body = '<table class="roundit" style="height: 100px; width: 440px">
                          <tr>
                              <td align="center" valign="middle">
                                 You already requested HipCoins today.<br>
                                 Come back for more tomorrow.
                              </td>
                           </tr>
                        </table>';
            }
         } else {
            $body = '<table class="roundit" style="height: 100px; width: 440px">
                        <tr>
                           <td align="center" valign="middle">
                              You already requested HipCoins today.<br>
                              Come back for more tomorrow.
                           </td>
                        </tr>
                     </table>';
         }
      } else {
         $body = '<table class="roundit" style="height: 100px; width: 440px;">
                     <tr>
                        <td align="center" valign="middle">
                           You did not enter an address. Try again!
                        </td>
                     </tr>
                  </table>';
      }
   } else {
      $body = '<table class="roundit" style="height: 100px; width: 440px;">
                  <tr>
                     <td align="center" valign="middle">
                        You did not enter an address. Try again!
                     </td>
                  </tr>
               </table>';
   }
}
?>
