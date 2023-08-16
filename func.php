<?php
            function hitung($angka1, $angka2, $operasi)
            {
                switch ($operasi) {
                    case 'value':
                        # code...
                        case 'tambah':
                            # code...
                            $hasil = $angka1 + $angka2;
                            break;
                        case 'kurang':
                            # code...
                            $hasil = $angka1 - $angka2;
                            break;
                      case 'bagi':
                            # code...
                            $hasil = $angka1 / $angka2;
                            break;
                      case 'kali':
                            # code...
                            $hasil = $angka1 * $angka2;
                            break;

                    
                    default:
                        # code...
                        break;
                }
                return $hasil;
            }
        
    ?>