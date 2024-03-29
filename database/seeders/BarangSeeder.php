<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaBarang = [
            'LCD X6512/INFINIX SMART 6HD/HOT 12i INCEL',
            'LCD X655/X656/INFINIX HOT 9/NOTE 7 LITE INCEL',
            'LCD X657/X657B/TECNO K35/ITEL VISION 1+/INFINIX HOT 10 LITE/SMART 5 CROWM',
            'LCD X680/INFINIX HOT 9 PLAY',
            'LCD X6812/INFINIX HOT 11S INCEL',
            'LCD X682/X683/INFINIX HOT 10/NOTE 8i CROWN',
            'LCD INFINIX X6831 INCEL (INFINIX HOT 30)',
            'LCD INFINIX X688 MGKU (INFINIX HOT 10 PLAY/HOT 11 PLAY',
            'LCD I NFINIX X689 MGKU X683 (INFINIX HOT 10S)',
            'LCD IPHONE 11 INCEL (MS) HITAM',
            'LCD IPHONE 7+ INCEL HITAM',
            'LCD IPHONE X INCELL (JK) HITAM',
            'LCD IPHONE XR INCELL (MS) HITAM',
            'LCD IPHONE XS INCEL (JK) HITAM',
            'LCD IPHONE XS MAX INCELL (JK) HITAM',
            'LCD SAMSUNG A01 BIG INCEL',
            'LCD SAMSUNG A03/A02S/A03S MGKU',
            'LCD SAMSUNG A10S CROWN',
            'LCD SAMSUNG A22 4G INCEL',
            'LCD SAMSUNG A30/A50 INCEL',
            'LCD SAMSUNG A31 INCEL',
            'LCD SAMSUNG A6+ INCEL',
            'LCD SAMSUNG A70 INCEL',
            'LCD SAMSUNG J2 PRIME',
            'LCD SAMSUNG J5 PRIME INCEL HITAM',
            'LCD SAMSUNG J5 PRIME INCEL PUTIH',
            'LCD SAMSUNG J7 PRIME INCEL HITAM',
            'LCD SAMSUNG J7 PRIME INCEL PUTIH',
            'LCD SAMSUNG J7 PRO INCEL HITAM',
            'LCD SAMSUNG J7 PRO INCEL GOLD',
            'LCD SAMSUNG J7 PRO OLED GOLD',
            'LCD POCO M3/REDMI 9T/NOTE 9 4G',
            'LCD REDMI 9/POCO M2/9 PRIME CROWN',
            'LCD REDMI A1/A1+ CROWN',
            'LCD REDMI NOTE 10 4G/NOTE 10S INCEL',
            'LCD REDMI NOTE 8 INCEL',
            'LCD REDMI NOTE 8 PRO INCEL',
            'LCD REDMI NOTE 9/REDMI 10X 4G INCEL',
            'TS SAMSUNG J2 PRIME HITAM',
            'TS SAMSUNG J2 PRIME GOLD',
            'TS SAMSUNG J2 PRIME SILVER',
            'TS SAMSUNG J2 PRIME PUTIH',
            'LCD OPPO A16/REALME C25 INCEL',
            'LCD OPPO A1K CROWN',
            'LCD OPPO A57 2022 INCEL',
            'LCD OPPO F1S INCEL HITAM',
            'LCD OPPO F1S INCEL PUTIH',
            'LCD OPPO A74 4G INCEL',
            'LCD OPPO F7 CROWN',
            'LCD REALME 3 PRO INCEL',
            'LCD REALME 6/7/NARZO 20 PRO INCEL',
            'LCD REALME C31 INCEL',
            'LCD REALME C35 CROWN',
            'LCD VIVO V15 INCEL',
            'LCD VIVO V17 PRO/V19 PRO INCEL (NOT FINGER)',
            'LCD VIVO V20 INCEL (NOT FINGER)',
            'LCD VIVO V7+ CROWN HITAM',
            'LCD VIVO V7+ CROWN PUTIH',
            'LCD VIVO Y12S CROWN',
            'ON OFF OPPO A5S',
            'ON OFF OPPO A74 (4G)/A95 (4G)/REALME 8 PRO',
            'ON OFF SAMSUNG A12/A13 4G/A13 5G GOLD',
            'ON OFF SAMSING A12/A13 4G/A13 5G PUTIH',
            'ON OFF SAMSUNG A20S',
            'ON OFF SAMSUNG A11/M11',
            'ON OFF SAMSUNG A20/A30/A30S/A50/A50S',
            'ON OFF REDMI 10 (5G)/REDMI NOTE 11E/POCO M5',
            'ON OFF REDMI NOTE 7/NOTE 7 PRO/NOTE 8',
            'VOL OPPO A16 2021/A54 (4G)',
            'VOL OPPO A1K',
            'VOL OPPO A3S (1803)',
            'VOL OPPO A3S (1853)',
            'VOL OPPO A7',
            'VOL OPPO A74 (4G)/A95 (4G)',
            'VOL OPPO F7',
            'VOL SAMSUNG A12',
            'VOL SAMSUNG A20S',
            'CC OPPO A37',
            'CC OPPO A3S (1803)',
            'CC OPPO A3S (1853)',
            'CC REALME C11/C12/C15',
            'CC REALME C3 2020/REALME 5i',
            'CC REALME C30/C33',
            'CC REALME C35',
            'CC SAMSUNG A01 BIG',
            'CC SAMSUNG A10S BIG',
            'CC SAMSUNG A10S SMALL',
            'CC SAMSUNG A20S SMALL',
            'CC SAMSUNG A20S BIG',
            'CC VIVO Y12',
            'CC VIVO Y12S/Y20/Y20S',
            'CC VIVO Y30',
            'CC VIVO Y91',
            'CC REDMI 10 (5G)/NOTE 11E/POCO M5',
            'CC REDMI 10',
            'CC REDMI 7',
            'CC REDMI 9A/9C',
            'CC REDMI NOTE 10 (4G)/NOTE 10S',
            'CC REDMI NOTE 8 PRO',
            'CC REDMI NOTE 8',
            'CC SAMSUNG A02S/A03S/A03',
            'CC INFINIX X6511/X6512/X665B/TECNO SPARK GO 2022',
            'CC INFINIX X662/HOT 11 (MICRO)',
            'CC INFINIX X662/HOT 11 (TIPE C)',
            'CC INFINIX X6812/X663/HOT 11S/NOTE 11',
            'CC INFINIX X690/NOTE 7',
            'CC INFINIX X693/NOTE 10',
            'ON OFF OPPO A16 2021/A54 (4G)',
            'ON OFF OPPO A1K',
            'ON OFF OPPO A31 2020',
            'ON OFF OPPO A37',
            'ON OFF OPPO A5 2020/A9 2020',
            'ON OFF OPPO A53 (5G)/A72 (5G)',
            'ON OFF OPPO A5S',
            'ON OFF OPPO A83',
            'ON OFF OPPO F11',
            'ON OFF OPPO F9/REALME 2 PRO',
            'ON OFF REALME 5 PRO/REALME Q',
            'ON OFF OPPO A15',
            'ON OFF RELAME C7i/REALME C17',
            'ON OFF REALME C11/C12/C15/C25/NARZO 20/NARZO 50A',
            'ON OFF VIVO V11 PRO',
            'ON OFF VIVO V11',
            'ON OFF VIVO V15 PRO/S1 PRO',
            'ON OFF VIVO V7+',
            'ON OFF VIVO V7',
            'ON OFF VIVO Y12',
            'ON OFF VIVO Y19 2019',
            'ON OFF VIVO Y91',
            'ON OFF VIVO Z1 PRO',
            'CC INFINIX X680/X688/HOT 9 PLAY/HOT 10 PLAY',
            'BATERAI BLP681/OPPO F9/F9 PRO 99%',
            'BATERAI BLP683/REALME 2/REALME 2 PRO 99%',
            'BATERAI BLP707/OPPO F11 99%',
            'BATERAI BLP711/OPPO A1K 99%',
            'BATERAI BLP727/OPPO A5 2020/A9 2020 99%',
            'BATERAI BLP737/OPPO RENO 2F 99%',
            'BATERAI BLP755/OPPO RENO 3 PRO 99%',
            'BATERAI BLP537/U705 99% @45',
            'BATERAI BLP601/OPPO F1S/A59 99%',
            'BATERAI BLP615/OPPO A37 99%',
            'BATERAI BLP619/OPPO A39/A57 2016 99%',
            'BATERAI BLP631/OPPO F3/F5/F5 YOUTH 99%',
            'BATERAI BLP641/OPPO A71 99%',
            'BATERAI BLP649/OPPO A83 99%',
            'BATERAI BLP661/OPPO F7 99%',
            'BATERAI BLP779/OPPO A92S/RENO 4F 99%',
            'BATERAI BLP781/OPPO A51/A72/A92 99%',
            'BATERAI BLP791/OPPO RENO 4 99%',
            'BATERAI BLP839/OPPO RENO 5 (4G)/RENO 5F/A95 (5) 99%',
            'BATERAI BLP851/OPPO A74 (4G) 99%',
            'BATERAI EB-207ABY/ SAMSUNG M21/M31/M30S/M31S 99%',
            'BATERAI EB-BM325ABN/SAMSUNG M32 99%',
            'BATERAI EB-BM415ABY /SAMSUNG M51/M62 99%',
            'BATERAI IPHONE IPHONE 6G 100%',
            'BATERAI IPHONE 6S+ 100%',
            'BATERAI IPHONE 11 PRO 100%',
            'BATERAI IPHONE 11 PRO MAX 100%',
            'BATERAI IPHONE XS MAX 100%',
            'BATERAI QL-1695/SAMSUNG A01 100%',
            'BATERAI SCUD-WT-N6/SAMSUNG A10S/A20S 100%',
            'BATERAI HQ-70N/SAMSUNG A11 100%',
            'BATERAI EB-BA136ABY/SAMSUNG A13 (5G) 100%',
            'BATERAI EB-BA217ABY/SAMSUNG A21S/A12/A02/A04S/M02/M12 100%',
            'BATERAI BN57/BN61/POCO X3/X3 NFC 99%',
            'BATERAI BN59/REDMI NOTE 10S 99%',
            'BATERAI BN5A/POCO M3 PRO (5G) 99%',
            'BATERAI B5C/POCO M4 PRO (5G) 99%',
            'BATERAI BN5D/REDMI NOTE 11/11S 99%',
            'BATERAI BN5G/REDMI 10C 99%',
            'BATERAI BN62/REDMI 9T/POCO M3 99%',
            'BATERAI BP42/REDMI MI 11 LITE 99%',
            'BATERAI BM3J/REDMI MI 8 LITE/MI 8X 99%',
            'BATERAI BM4E/POCOPHONE F1 99%',
            'BATERAI BM4J/REDMI NOTE 8 PRO 99%',
            'BATERAI BM4Q/POCO F2//K30 PRO 99%',
            'BATERAI BM4Y/BM56/POCO F3 99%',
            'BATERAI BM5A/REDMI NOTE 11 PRO 99%',
            'BATERAI BN31/REDMI S2/MI A1/MI5X/RRDMI NOTE 5A 99%',
            'BATERAI BN34/REDMI 5A 99%',
            'BATERAI BN35/REDMI 5 99%',
            'BATERAI BN36/MI A2/MI 6X 99%',
            'BATERAI BN37/REDMI 6/6A 99%',
            'BATERAI BN44/REDMI 5+ 99%',
            'BATERAI BN45/REDMI NOTE 5 99%',
            'BATERAI BN46/REDMI 7/REDMI NOTE 8 99%',
            'BATERAI BN48/REDMI NOTE 6 PRO 99%',
            'BATERAI BN49/REDMI 7A 99%',
            'BATERAI BN4A/REDMI NOTE 7/NOTE 7 PRO 99%',
            'BATERAI BN50/REDMI 10/REDMI NOTE 10 (4G)/MI MAX 2 99%',
            'BATERAI BN51/REDMI 8/8A/8A PRO 99%',
            'BATERAI BN53/REDMI NOTE 10 PRO 99%',
            'BATERAI BN54/REDMI 9/NOTE 9/10X (4G) 99%',
            'BATERAI BN56/REDMI 9A/9C/10A/POCO M2 PRO 99%',
            'BATERAI IPHONE 11 99%',
            'BATERAI IPHONE 11 PRO 99%',
            'BATERAI IPHONE 11 PRO MAX 99%',
            'BATERAI IPHONE 12/12 PRO 99%',
            'BATERAI IPHONE 13 99%',
            'BATERAI IPHONE 13 PRO 99%',
            'BATERAI IPHONE 13 PRO MAXK 99%',
            'BATERAI IPHONE 6G 99%',
            'BATERAI IPHONE 6G+ 99%',
            'BATERAI IPHONE 6S 99%',
            'BATERAI IPHONE 7G 99%',
            'BATERAI IPHONE 8G 99%',
            'BATERAI IPHONE X 99%',
            'BATERAI IPHONE XS 99%',
            'BATERAI IPHONE XS MAX 99%',
            'BATERAI EB-BG530CBE/SAMSUNG J2 PRIME/GREND PRIME 99%',
            'BATERAI EB-BA013ABY/SAMSUNG A01 CORE 99%',
            'BATERAI EB-BJ120CBE/SAMSUNG 120/J1 2016 99%',
            'BATERAI B500AE/SAMSUNG J110/J111/J1 ACE 99%',
            'BATERAI EB-BJ510CBC/SAMSUNG J510/J5 2016 99%',
            'BATERAI EB-BJ700BBU/SAMSUNG J700/J7/J400/J4 99%',
            'BATERAI EB-BJ710CBE/SAMSUNG J710/J7 2016 99%',
            'BATERAI HQ-S71/SAMSUNG M11 99%',
            'BATERAI EB-BG580ABU/SAMSUNG M20/M30 99%',
            'BATERAI QL1695/SAMSUNG A01 99%',
            'BATERAI SLC-50/SAMSUNG A03 CORE 99%',
            'BATERAI SCUD-QT-N6/SAMSUNG A10S/A20S 99%',
            'BATERAI HQ-70N/SAMSUNG A11 99%',
            'BATERAI EB-BA136ABY/SAMSUNG A13 (5G) 99%',
            'BATERAI EB-BA217ABY/SAMSUNG A21S/A12/A02/A04S/M02/M12 99%',
            'BATERAI SXUD-WT-W1/SAMSUNG A22 (5G) 99%',
            'BATERAI EB-BA315ABY/SAMSUNG A21/A22 (4G) 99%',
            'BATERAI EB-BA505ABU/SAMSUNG A50/A50S/A30/A30S/A20 99%',
            'BATERAI EB-BA515ABY/SAMSUNG A51 99%',
            'BATERAI 710ABE/610ABE/SAMSUNG A7 2016/J7 PRIME/J4+/J6+ 99%',
            'BATERAI EB-BA750ABE/SAMSUNG A7 2018/M10/M50/A10 99%',
            'BATERAI EB-BA705ABU/SAMSUNG A70 99%',
            'BATERAI EB-BA530ABE/SAMSUNG A8 2018',
            'BATERAI EB-BG360CBC/SAMSUNG J200/J2 2015 99%',
            'BATERAI BL-39LX//S5/X652/X653/653C/INFINIX SMART 4/4C 99%',
            'BATERAI BL-42AX/X572/INFINIX NOTE 4 99%',
            'BATERAI BL-49FX/BL-49GF/BL49G/ INFINIX HOT 8/HOT 9/SMART 5/SMART 6 99%',
            'BATERAI BL-49IX/X612B/INFINIX SMART HD 2021 99%',
            'BATERAI BL-49JX/INFINIX NOTE 10 PRO/NOTE 11 PRO 99%',
            'BATERAI BL-49KX/X663/INFINIX NOTE 11 99%',
            'BATERAI BL-49LX/X6817/INFINIX HOT 12 99%',
            'BATERAI BL-51B/INFINIX NOTE 8/8i/HOT 10/HOT 11 99%',
            'BATERAI B-95/VIVO Y51/Y51A 99%',
            'BATERAI B-C8/VIVO Y69 99%',
            'BATERAI B-C9/VIVO V7+ 99%',
            'BATERAI B-D5/VIVO V7 99%',
            'BATERAI B-D9/VIVO V9/V9 YOUTH/Y85/Z1 99%',
            'BATERAI B-E1/VIVO Y71 99%',
            'BATERAI B-E8/VIVO V11/V11i/Z3/Z3i 99%',
            'BATERAI B-F0/VIVO V11 PRO 99%',
            'BATERAI B-G0/VIVO V15 PRO/X27 99%',
            'BATERAI B-G1/VIVO V15 PRO 99%',
            'BATERAI B-G2/VIVO V15 99%',
            'BATERAI B-H0/VIVO V17/S1 99%',
            'BATERAI B-H1/VIVO V17 PRO 99%',
            'BATERAI B-H9/VIVO Y19 2019/U3/U20/Y5S/Z5i 99%',
            'BATERAI B-K3/VIVO S1 PRO 99%',
            'BATERAI B-K6/VIVO V19 99%',
            'BATERAI B-M3/VIVO Y30/Y30i/50 99%',
            'BATERAI BF-3/VIVO Y91/Y91C/Y93/Y95/Y1S 99%',
            'BATERAI BK-B-05/VIVO Y20/Y20S/Y12S/Y20i 99%',
            'BATERAI BK-B-65/B-75/VIVO Y15/Y21 2016/Y22 2013Y13 99%',
            'BATERAI BK-B-B2/B-E2/VIVO V5/V5S/Y5S/Y65 99%',
            'BATERAI BK-B-C1/VIVO Y53 99%',
            'BATERAI BK-B-G7/VIVO Y3/Y12/Y12i/Y15 2019/Y17 2019/Z1 PRO 99%',
            'KESING FULLSET OPPO A1K RED',
            'KESING FULLSET OPPO A37 BLACK',
            'KESING FULLSET OPPO A37 GOLD',
            'KESING FULLSET OPPO A37 PINK',
            'KESING FULLSET OPPO A5S BLUE',
            'KESING FULLSET OPPO A5S RED',
            'KESING FULLSET OPPO A7 GOLD',
            'KESING FULLSET OPPO A7 GREEN',
            'KESING FULLSET OPPO A71 BLACK',
            'KESING FULLSET OPPO A71 BLUE',
            'KESING FULLSET OPPO A71 GOLD',
            'KESING FULLSET OPPO F5/F5 YOUTH BLACK',
            'KESING FULLSET OPPO F5/F5 YOUTH GOLD',
            'KESING FULLSET OPPO F5/F5 YOUTH PINK',
            'KESING FULLSET VIVO Y12 BLUE',
            'KESING FULLSET VIVO Y12 PURPLE',
            'KESING FULLSET VIVO Y20/Y20A/Y20i/Y20s/Y20t/Y12s BLACK',
            'KESING FULLSET VIVO Y20/Y20A/Y20i/Y20s/Y20t/Y12s BLUE',
            'KESING FULLSET VIVO Y20/Y20A/Y20i/Y20s/Y20t/Y12s GREY',
            'KESING FULLSET VIVO Y53 BLACK',
            'KESING FULLSET VIVO Y53 GOLD',
            'KESING FULLSET VIVO Y53 PINK',
            'KESING FULLSET VIVO Y71 BLACK',
            'KESING FULLSET VIVO Y71 GOLD',
            'KESING FULLSET VIVO Y95 BLACK',
            'KESING FULLSET VIVO Y95 BLUE',
            'KESING FULLSET VIVO Y95 PURPLE',
            'KESING FULLSET VIVO Y95 RED',
            'KESING FULLSET XIOMI REDMI 8 BLACK',
            'KESING FULLSET XIOMI REDMI 8 BLUE',
            'KESING FULLSET XIOMI REDMI 8 GREEN',
            'KESING FULLSET XIOMI REDMI 8 RED',
            'KESING FULLSET XIOMI REDMI NOTE 7 BLACK',
            'KESING FULLSET XIOMI REDMI NOTE 7 BLUE',
            'KESING FULLSET XIOMI REDMI NOTE 7 RED',
            'KESING FULLSET XIOMI REDMI NOTE 9 BLACK',
            'KESING FULLSET XIOMI REDMI NOTE 9 BLUE',
            'KESING FULLSET XIOMI REDMI NOTE 9 GREEN',
            'KESING FULLSET XIOMI REDMI NOTE 9 WHITE',
        ];

        foreach ($namaBarang as $barang) {
            $data[] = [
                'nama' => $barang,
                'harga' => rand(1, 10) * 10000,
                'deskripsi' => $barang,
                'toko_id' => 2,
            ];
        }

        DB::table('barangs')->insert($data);
    }
}
