<?php
function fuzyylogic($a,$b,$c){
    $ph = $a; //ph
    $garam = $b; //ppm
    $kekeruhan = $c; //ppm


    function rumus_pertama($x,$c,$d){
        $hitung = (-($x-$d))/($d-$c);
        return $hitung;
    }
    function rumus_kedua($x,$a,$b){
        $hitung = ($x-$a)/($b-$a);
        return $hitung;
    }

    //switch ph
    $ph_hasil = [];
    $ph_nomer = [];
    switch (true) {
        case ($ph > 0 && $ph <= 6.5):
            array_push($ph_hasil,'Asam');
            array_push($ph_nomer,'1');
            break;
        case ($ph > 6.5 && $ph < 7):
            $a = 6.5;
            $b = 7;
            array_push($ph_hasil,'Asam','Netral');
            array_push($ph_nomer,rumus_pertama($ph,$a,$b),rumus_kedua($ph,$a,$b));
            break;
        case ($ph >= 7 && $ph < 8):
            array_push($ph_hasil,'Netral');
            array_push($ph_nomer,'1');
            break;
        case ($ph > 8 && $ph <= 8.4):
            $a = 8;
            $b = 8.5;
            array_push($ph_hasil,'Netral','Basa');
            array_push($ph_nomer,rumus_pertama($ph,$a,$b),rumus_kedua($ph,$a,$b));
            break;
        case ($ph > 8.5 && $ph <= 14):
            array_push($ph_hasil,'Basa');
            array_push($ph_nomer,'1');
    };

    //switch kadar garam

    $garam_hasil = [];
    $garam_nomer = [];

    switch (true) {
        case ($garam > 0 && $garam <= 800):
            array_push($garam_hasil,'Rendah');
            array_push($garam_nomer,'1');
            break;
        case ($garam > 800 && $garam < 1000):
            $a = 800;
            $b = 1000;
            array_push($garam_hasil,'Rendah','Sedang');
            array_push($garam_nomer,rumus_pertama($garam,$a,$b),rumus_kedua($garam,$a,$b));
            break;
        case ($garam >= 1000 && $garam <= 2800):
            array_push($garam_hasil,'Sedang');
            array_push($garam_nomer,'1');
            break;
        case ($garam > 2800 && $garam < 3000):
            $a = 2800;
            $b = 3000;
            array_push($garam_hasil,'Sedang','Tinggi');
            array_push($garam_nomer,rumus_pertama($garam,$a,$b),rumus_kedua($garam,$a,$b));
            break;
        case ($garam > 3000 && $garam <= 10000):
            array_push($garam_hasil,'Tinggi');
            array_push($garam_nomer,'1');
    };

    //switch Kekeruhan
    $kekeruhan_hasil = [];
    $kekeruhan_nomer = [];
    switch(true) {
        case ($kekeruhan > 0 && $kekeruhan <= 4):
            array_push($kekeruhan_hasil,'Jernih');
            array_push($kekeruhan_nomer,'1');
            break;
        case ($kekeruhan > 4 && $kekeruhan < 5):
            $a = 4;
            $b = 5;
            array_push($kekeruhan_hasil,'Jernih','Cukup');
            array_push($kekeruhan_nomer,rumus_pertama($kekeruhan,$a,$b),rumus_kedua($kekeruhan,$a,$b));
            break;
        case ($kekeruhan > 5 && $kekeruhan < 24):
            array_push($kekeruhan_hasil,'Cukup');
            array_push($kekeruhan_nomer,'1');
            break;
        case ($kekeruhan > 24 && $kekeruhan < 25):
            $a = 24;
            $b = 25;
            array_push($kekeruhan_hasil,'Cukup','Keruh');
            array_push($kekeruhan_nomer,rumus_pertama($kekeruhan,$a,$b),rumus_kedua($kekeruhan,$a,$b));
            break;
        case ($kekeruhan >= 25):
            array_push($kekeruhan_hasil,'Keruh');
            array_push($kekeruhan_nomer,'1');
    }

    print_r($ph_hasil);
    print_r($ph_nomer);
    print_r($garam_hasil);
    print_r($garam_nomer);
    print_r($kekeruhan_hasil);
    print_r($kekeruhan_nomer);
    print_r('-----------------------------------------------');
    //inference
    $number_inference = [];
    $hasil_inference = [];

    //conjungtion
    foreach($ph_nomer as $h) {
        foreach($garam_nomer as $i) {
            foreach($kekeruhan_nomer as $j){
                array_push($number_inference,min($h,$i,$j));
            }
        }
    }

    print_r($number_inference);

    foreach($ph_hasil as $h) {
        foreach($garam_hasil as $i) {
            foreach($kekeruhan_hasil as $j) {
                if($h == 'Asam' && $i == 'Rendah' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Rendah' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Rendah' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Sedang' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Sedang' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Sedang' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Tinggi' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Tinggi' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Asam' && $i == 'Tinggi' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Netral' && $i == 'Rendah' && $j == 'Jernih') {
                    array_push($hasil_inference,'Layak');
                }else if($h == 'Netral' && $i == 'Rendah' && $j == 'Cukup') {
                    array_push($hasil_inference,'Layak');
                }else if($h == 'Netral' && $i == 'Rendah' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Netral' && $i == 'Sedang' && $j == 'Jernih') {
                    array_push($hasil_inference,'Layak');
                }else if($h == 'Netral' && $i == 'Sedang' && $j == 'Cukup') {
                    array_push($hasil_inference,'Layak');
                }else if($h == 'Netral' && $i == 'Sedang' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Netral' && $i == 'Tinggi' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Netral' && $i == 'Tinggi' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Netral' && $i == 'Tinggi' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Rendah' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Rendah' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Rendah' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Sedang' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Sedang' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Sedang' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Tinggi' && $j == 'Jernih') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Tinggi' && $j == 'Cukup') {
                    array_push($hasil_inference,'Tidak Layak');
                }else if($h == 'Basa' && $i == 'Tinggi' && $j == 'Keruh') {
                    array_push($hasil_inference,'Tidak Layak');
                }else{
                    print_r('Data Tidak tersedia');
                }
            }
        }
    }
    print_r($hasil_inference);

    //pengecekan disjunction
    global $nomer_disjunction,$hasil_disjunction;
    $nomer_disjunction = [];
    $hasil_disjunction = [];

    function disjunction ($arr,$arr2){
        //pengelompokan nilai
        $layak = [];
        $tidak = [];
        foreach($arr as $key => $value) {
            if($value == 'Layak') {
                array_push($layak,$arr2[$key]);
            }else{
                array_push($tidak,$arr2[$key]);
            }  
        }
        //disjunction , nilai tertinggi dari masing2 kategori
        if(count($layak) > 0) {
            array_push($GLOBALS['hasil_disjunction'],'Layak');
            array_push($GLOBALS['nomer_disjunction'],max($layak));
        }
        if(count($tidak) > 0) {
            array_push($GLOBALS['hasil_disjunction'],'Tidak Layak');
            array_push($GLOBALS['nomer_disjunction'],max($tidak));
        }
    }

    //check duplicate
    function duplicate($array) {
        return count($array) > count(array_unique($array));
    }

    //menjalankan disjunction
    if(duplicate($hasil_inference)){
        disjunction($hasil_inference,$number_inference);
    }else{
        foreach($hasil_inference as $a){
            array_push($GLOBALS['hasil_disjunction'],$a);
        }
        foreach($number_inference as $b){
            array_push($GLOBALS['nomer_disjunction'],$b);
        }
    }
    
    print_r($GLOBALS['nomer_disjunction']);
    print_r($GLOBALS['hasil_disjunction']);

    //defuzzification
    //rumus height metdod
    function height ($arr1) {
        $a = max($arr1);
        if (array_search($a,$arr1) == 0) {
            return 'Layak';
        }else{
            return 'Tidak Layak';
        }
    }
    if(count($GLOBALS['nomer_disjunction']) == 2){
        print_r(height($GLOBALS['nomer_disjunction']));
    }else{
        print_r('hasil akhir '.implode($GLOBALS['hasil_disjunction']));
    }
    //weighted average
    // function weighted ($arr1) {
    //     if(count($arr1) == 2){
    //         return ($arr1[0]*100 + $arr1[1]*50)/($arr1[0]+$arr1[1]);
    //     }else{
    //         return ($arr1[0]*100)/($arr1[0]);
    //     }
    // }
    // print_r(weighted($GLOBALS['nomer_disjunction']));

    //final result dengan weighted average


}
fuzyylogic(6.8,850,24.6);



?>