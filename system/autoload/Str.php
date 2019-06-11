<?php

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

Class Str{

    public static function clean($string){

        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

    }

    public static function uuid()
    {
        try {

            $uuid4 = Uuid::uuid4();
            return $uuid4->toString(); // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a


        } catch (UnsatisfiedDependencyException $e) {

            // Some dependency was not met. Either the method cannot be called on a
            // 32-bit system, or it can, but it relies on Moontoast\Math to be present.
          //  echo 'Caught exception: ' . $e->getMessage() . "\n";

            return '';

        }
    }

}