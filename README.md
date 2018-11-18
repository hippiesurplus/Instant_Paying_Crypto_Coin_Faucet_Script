# Instant_Paying_Crypto_Coin_Faucet_Script
An instant paying faucet script for use with hipcoin


/*     Nanotoken Faucet Script     */
/*      Provided by: [zelles]      */
/*  Do not remove these comments.  */

/*     Hipcoin Faucet Script     */
/*      Provided by: [Hippiesurplus]      */
/*  Do not remove these comments.  */

To install

01. Create a database to use with the faucet.
02. Import db.sql in to you database you created and then delete db.sql
03. Edit config.php with your database and hipcoins RPC credentials.
04. Upload files to your servers root directory.

That is it. Your script should now be ready to use.

The faucet is set to send from the account "" by default. So create an addres with no label in 
the client, or using command line use "" as the acount name. Coins sent to that account are the 
coins used in/sent from the faucet.
