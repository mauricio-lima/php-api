<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/*                                                                                 */
/*   API Framework                                                                 */
/*                                                                                 */
/*   Mauricio Lima (c)  -  2021 January                                            */
/*                                                                                 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

require('classes/autoload.php');

$application = new Application;

$application->get('/',      function ($request) { print('Teste 1' . PHP_EOL); });
$application->get('/teste', function ($request) { print('Teste 2' . PHP_EOL); });

$application->run();

?>

