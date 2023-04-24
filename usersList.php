<?php
   $date = date('d.m');
   $usersList = [
        'admin' => ['id' => '1', 'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b', 
                    'bday' => /* '81f94fa51422857a1ca9cfa1197982bd5a0e7dda' */ sha1($date),// pw: 123456, bday: 01.02.1987
                    'bday2' => /* '83395dbf15a5f85567a39f027ac3bf31d5da3d82' */ sha1($date)],

        'user' => ['id' => '2', 'password' => '5dd4ebdac62609c834f7768f02286b798bd82a38', 
                    'bday' =>'f5241e34987621ab21591af6321cb920fab022d5', // pw: 234567, bday: 25.11.1978
                    'bday2' => 'fd2223c48fde4014b6fbaa1806871ece65750c44'],

        'ivan' => ['id' => '3', 'password' => '09a9ed2c9b4c439667f00e5b07f7283971654f6c', 
                    'bday' => '54fb8a3115eaa0d6e0daba8a7bc9c1cac6ae97ef', // pw: 345678. bday: 15.08.1998
                    'bday2' => 'f4cb7bab45dd0b7106062df8e6ef374e4fcb86d8'],
                    
        'waldy' => ['id' => '4', 'password' => 'df2983700ffecb52e6649f0cb3981b66537083a4', 
                    'bday' => '65a7f9622ed820b9513b0ee0c977566c45392a93', // pw: 456789, bday: 23.09.1992
                    'bday2' =>'0a5103ccaaeca9ffc2dc244f48d7c1cd5bb03fb1',],
    ];

    $img = ['Spa' => 'img/spa.jpg', 'Sauna' => 'img/Sauna-Blog 2.jpg','Thermal-bad' => 'img/thermalbad.jpg'];

   $keyRandom = ['Spa', 'Sauna', 'Thermal-bad'];