<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/*                                                                                 */
/*   API Framework                                                                 */
/*                                                                                 */
/*   class Application                                                             */
/*                                                                                 */
/*                                                                                 */
/*   Mauricio Lima (c)  -  2021 January                                            */
/*                                                                                 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

class Application 
{
    public function __construct($file_settings = 'settings.json') 
    {
        try
        {
            if (!file_exists($file_settings))
                throw new Exception('Settings file not found');

            $contents = file_get_contents($file_settings);
            $this->settings = json_decode($contents);
        }
        catch (Exception $e)
        {
            print($e->getMessage() . PHP_EOL . PHP_EOL);
        }
    }

    public function run()
    {
        print('RUN' . PHP_EOL);
    }
}

?>
