<?php

class Update{


    public static function dbChanges()
    {

        global $config;

        $current_build = 3;

        $s_version = $config['s_version'];

        $message = '';

        $updates = [


            1 => [

            ],
            2=> [

            ],

            3=> [

            ],

            4=> [

            ],

            5=> [

            ],

            6=> [

            ],

            7=> [

            ]


        ];

        $max = max(array_keys($updates));

        if($s_version != $max){

            // update the schemas


            $next_key = $s_version+1;


            foreach ($updates[$next_key] as $statement){
                DB::statement($statement);
            }


            switch ($next_key){


                case 1:



                    break;



                case 2:



                    break;


                case 3:



                    break;



                case 4:


                    break;



                case 5:




                    break;



                case 6:


                    break;

                case 7:


                    break;


            }


            update_option('s_version',$next_key);

            // echo 'Updated to Schema: '.$next_key;

            $resp = [
                'continue' => true,
                'message' => $message.'Updated to Schema: '.$next_key
            ];


        }
        else{

            update_option('build',$current_build);

            $resp = [
                'continue' => false,
                'message' => 'No more update is available'
            ];
        }

        return $resp;

    }


    public static function singleCommand()
    {
        if(function_exists('ini_set')){

            ini_set('memory_limit', '512M');
            ini_set('max_execution_time', 300);


        }

        global $file_build;
        $message = '';

        if(!db_table_exist('app_settings'))
        {
            ORM::execute('CREATE TABLE `app_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        }


        $message .= '... Done!'.PHP_EOL;

        return $message;

    }


}