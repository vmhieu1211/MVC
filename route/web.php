<?php
// muc dich moi thu deu phai chay xuat phat tu file root index.php

if(!defined('APP_PATH')){
    die("cannot access");
}
// muc dich tiep nhan cac request tu phia client gui len
// cac request do co the la cac phiong thuc : GET, POST ...
// index.php?c=login&m=index
// c: ten controller
// m: phuong thuc nam trong controller
// su dung ky thuat lazy loading (ten file va class giong nhau)
// trong 1 file chi nen chua 1 class