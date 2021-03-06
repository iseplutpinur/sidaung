<?php
$admin = [
    ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'fe fe-home'],
    [
        'title' => 'Data Kependudukan', 'icon' => 'fa fa-id-card-o',
        'children' => [
            ['title' => 'Penduduk', 'route' => 'admin.kependudukan.penduduk'],
            ['title' => 'Kartu Keluarga', 'route' => 'admin.kependudukan.kk'],
            ['title' => 'Tamu'],
        ]
    ],
    [
        'title' => 'Administrasi', 'icon' => 'fa fa-pencil-square-o',
        'children' => [
            ['title' => 'Pindah Agama'],
            ['title' => 'Pindah Pekerjaan'],
            ['title' => 'Pindah Pendidikan'],
            ['title' => 'Pindah Warga Negara'],
            ['title' => 'Pindah Status Kawin'],
            ['title' => 'Pindah Status Penduduk'],
            ['title' => 'Pindah Rukun Tetangga'],
        ]
    ],
    [
        'title' => 'Laporan Data Penduduk', 'icon' => 'fa fa-file-text',
        'children' => [
            ['title' => 'Model 1 (KKPP) WNI'],
            ['title' => 'Model 2 (KKPP) WNA'],
            ['title' => 'Model 3 Golongan Agama'],
            ['title' => 'Model 4 Umur'],
            ['title' => 'Model 5 Pendididkan & Pekerjaan'],
            ['title' => 'Model 6 Kep. KTP & Akte'],
        ]
    ],
    [
        'title' => 'Buku Induk Penduduk', 'icon' => 'fa fa-book'
    ],
    [
        'title' => 'PKM Lansia', 'icon' => 'fa fa-user-o'
    ],
    [
        'title' => 'Data Master', 'icon' => 'fa fa-database',
        'children' => [
            ['title' => 'Agama', 'route' => 'admin.data_master.agama'],
            ['title' => 'Pekerjaan', 'route' => 'admin.data_master.pekerjaan'],
            ['title' => 'Pendidikan', 'route' => 'admin.data_master.pendidikan'],
            ['title' => 'Status Kawin', 'route' => 'admin.data_master.status_kawin'],
            ['title' => 'Status Penduduk', 'route' => 'admin.data_master.status_penduduk'],
            ['title' => 'Hubungan Dengan KK', 'route' => 'admin.data_master.hubungan_dengan_kk'],
            ['title' => 'Rukun Tetangga', 'route' => 'admin.data_master.rukun_tetangga'],
            ['title' => 'Status Tamu', 'route' => 'admin.data_master.status_tamu'],
        ]
    ],
    [
        'title' => 'User Applicaiton',
        'icon' => 'fe fe-users',
        'route' => 'admin.user',
    ],
];

// $admin = [
//     ['title' => 'Administrator Menu', 'separator' => true],
//     ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'fe fe-home'],
//     [
//         'title' => 'Member',
//         'icon' => 'fe fe-users',
//         'route' => 'admin.user',
//     ],
//     [
//         'title' => 'Profile Addon', 'icon' => 'fe fe-user-plus',
//         'children' => [
//             ['title' => 'Pendidikan Jenis', 'route' => 'admin.profile.pendidikan_jenis'],
//             ['title' => 'Kontak Tipe', 'route' => 'admin.profile.kontak_tipe'],
//         ]
//     ],
//     [
//         'title' => 'Kepengurusan',
//         'route' => 'admin.pengurus.periode',
//         'icon' => 'fe fe-sliders'
//     ],
//     [
//         'title' => 'Artikel',
//         'icon' => 'fe fe-file-text',
//         'children' => [
//             ['title' => 'Data', 'route' => 'admin.artikel.data'],
//             ['title' => 'Kategori', 'route' => 'admin.artikel.kategori'],
//             ['title' => 'Tag', 'route' => 'admin.artikel.tag']
//         ],
//     ],
//     [
//         'title' => 'Address', 'icon' => 'fe fe-map-pin',
//         'children' => [
//             ['title' => 'Province', 'route' => 'admin.address.province'],
//             ['title' => 'Regencie', 'route' => 'admin.address.regencie'],
//             ['title' => 'District', 'route' => 'admin.address.district'],
//             ['title' => 'Village', 'route' => 'admin.address.village'],
//         ]
//     ],

//     ['title' => 'Galeri', 'route' => 'admin.galeri', 'icon' => 'fe fe-image'],
//     [
//         'name' => 'pendaftaran',
//     ],
//     ['title' => 'Sosial Media', 'icon' => 'fe fe-aperture', 'route' => 'admin.social_media'],
//     ['title' => 'Kontak', 'icon' => 'fe fe-phone', 'route' => 'admin.contact'],
//     ['title' => 'Footer Instagram', 'icon' => 'fe fe-image', 'route' => 'admin.footer_instagram'],
//     ['title' => 'Username Role', 'icon' => 'fe fe-check', 'route' => 'admin.username_validation'],
// ];

// set member menu
$member  = [
    ['title' => 'Dashboard', 'route' => 'member.dashboard', 'icon' => 'fe fe-home'],
    ['title' => 'Profile', 'route' => 'member.profile', 'icon' => 'fe fe-user'],
    ['title' => 'Ganti Password', 'icon' => 'fe fe-lock', 'route' => 'member.password'],
];

// set frontend menu
$frontend  = [
    ['title' => 'Home', 'route' => 'home'],
    [
        'title' => 'Tentang Kami',
        'children' => [
            ['title' => 'Sejarah'],
            ['title' => 'Struktur Kepengurusan', 'route' => 'about.kepengurusan.struktur'],
            ['title' => 'Periode Kepengurusan'],
            ['title' => 'Anggaran Dasar Anggaran Rumah Tangga'],
        ]
    ],
    [
        'name' => 'bidang',
    ],
    ['title' => 'Anggota', 'route' => 'anggota'],
    ['title' => 'Galeri', 'route' => 'galeri'],
    ['title' => 'Pendaftaran', 'route' => 'pendaftaran'],
    ['title' => 'Kontak', 'route' => 'kontak'],
];

$member = array_merge($member, [['title' => 'Home Menu', 'separator' => true]], $frontend);

return [
    // 'admin' => array_merge($admin, [['title' => 'Member Menu', 'separator' => true]], $member),
    'member' => $member,
    'frontend' => $frontend,
    'admin' => $admin
];
