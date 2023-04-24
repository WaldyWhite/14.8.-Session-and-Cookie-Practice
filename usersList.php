<?php
  /*  $date = date('d.m.Y'); */
   $usersList = [
        'admin' => ['id' => '1', 'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b', 
                    'bday' => '81abd1ebff0165045ab8e2bc3d4b6ace7363da02'], // pw: 123456, bday: 24.04.1982

        'user' => ['id' => '2', 'password' => '5dd4ebdac62609c834f7768f02286b798bd82a38', 
                    'bday' =>'f5241e34987621ab21591af6321cb920fab022d5'], // pw: 234567, bday: 25.11.1978

        'ivan' => ['id' => '3', 'password' => '09a9ed2c9b4c439667f00e5b07f7283971654f6c', 
                    'bday' => '54fb8a3115eaa0d6e0daba8a7bc9c1cac6ae97ef'], // pw: 345678. bday: 15.08.1998
                    
        'waldy' => ['id' => '4', 'password' => 'df2983700ffecb52e6649f0cb3981b66537083a4', 
                    'bday' => '65a7f9622ed820b9513b0ee0c977566c45392a93' /* sha1($date) */], // pw: 456789, bday: 23.09.1992
    ];

    $img = ['Spa' => 'img/spa.jpg', 'Sauna' => 'img/Sauna-Blog 2.jpg','Thermal-bad' => 'img/thermalbad.jpg'];

   $keyRandom = ['Spa', 'Sauna', 'Thermal-bad'];