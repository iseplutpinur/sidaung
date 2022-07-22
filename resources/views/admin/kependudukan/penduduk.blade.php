@extends('templates.admin.master')

@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="main-card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Penduduk</h3>
                    <div>
                        <button type="submit" form="FilterForm" class="btn btn-rounded btn-md btn-info" data-toggle="tooltip"
                            title="Refresh Filter Table">
                            <i class="bi bi-arrow-repeat"></i> Refresh
                        </button>
                        <button type="button" class="btn btn-rounded btn-success" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="h5">Filter Data</h5>
                    <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="FilterForm">
                        <div class="form-group float-start me-2">
                            <label for="filter_rt">Rt</label>
                            <select class="form-control" id="filter_rt" name="filter_rt" style="max-width: 200px">
                                <option value="">Semua Rt</option>
                                @foreach ($rts ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="filter_jenis_kelamin" name="filter_jenis_kelamin"
                                style="max-width: 200px">
                                <option value="">Semua JK</option>
                                <option value="laki-laki" class="text-capitalize">laki-laki</option>
                                <option value="perempuan" class="text-capitalize">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_agama">Agama</label>
                            <select class="form-control" id="filter_agama" name="filter_agama" style="max-width: 200px">
                                <option value="">Semua Agama</option>
                                @foreach ($agamas ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_status_kawin">Status Kawin</label>
                            <select class="form-control" id="filter_status_kawin" name="filter_status_kawin"
                                style="max-width: 200px">
                                <option value="">Semua SK</option>
                                @foreach ($status_kawins ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_pendidikan">Pendidikan</label>
                            <select class="form-control" id="filter_pendidikan" name="filter_pendidikan"
                                style="max-width: 200px">
                                <option value="">Semua Pend</option>
                                @foreach ($pendidikans ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_Pekerjaan">Pekerjaan</label>
                            <select class="form-control" id="filter_Pekerjaan" name="filter_Pekerjaan"
                                style="max-width: 200px">
                                <option value="">Semua Pek</option>
                                @foreach ($pekerjaans ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_status_penduduk">Jenis Penduduk</label>
                            <select class="form-control" id="filter_status_penduduk" name="filter_status_penduduk"
                                style="max-width: 200px">
                                <option value="">Semua JP</option>
                                @foreach ($status_penduduks ?? [] as $v)
                                    <option value="{{ $v->id }}" class="text-capitalize">
                                        {{ $v->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_ktp">Status KTP</label>
                            <select class="form-control" id="filter_ktp" name="filter_ktp" style="max-width: 200px">
                                <option value="">Semua Sts. KTP</option>
                                <option value="1">Ada</option>
                                <option value="0">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="form-group float-start me-2">
                            <label for="filter_akte">Status Akte</label>
                            <select class="form-control" id="filter_akte" name="filter_akte" style="max-width: 200px">
                                <option value="">Semua Sts. Akte</option>
                                <option value="1">Ada</option>
                                <option value="0">Tidak Ada</option>
                            </select>
                        </div>
                    </form>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2">
                                        No
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2">
                                        Action
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Rukun Tetangga">
                                        RT
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Nama Lengkap Penduduk">
                                        Nama
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Nomor Induk Penduduk">
                                        NIK
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2">
                                        Jenis Kelamin
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" colspan="2">
                                        Tanggal Lahir
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2">
                                        Umur
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Tanggal Meninggal">
                                        Meninggal
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2">
                                        Agama
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Status Kawin">
                                        Sts. KW
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Status Pendidikan">
                                        Sts. Pend
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Status Pekerjaan">
                                        Sts. Pek
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Status Penduduk">
                                        Penduduk
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="KTP Ada/Tidak">
                                        KTP
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Akte Ada/Tidak">
                                        Akte
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Nomor Telepon">
                                        No. Tel
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Alamat Lengkap">
                                        Alamat
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Kewarganegaraan">
                                        Asal
                                    </th>
                                    <th class="text-center" style="vertical-align: middle" rowspan="2"
                                        data-toggle="tooltip" title="Asal Negara">
                                        Negara
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-center">Kota</th>
                                    <th class="text-nowrap text-center">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nik">Nomori Induk Kependudukan</label>
                                    <input type="number" class="form-control" id="nik" name="nik"
                                        placeholder="Nomori Induk Kependudukan" maxlength="16" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Lengkap" required="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="penduduk_negara">Warga Negara<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="penduduk_negara" name="penduduk_negara">
                                        <option value="1" class="text-capitalize">warga negara indonesia</option>
                                        <option value="0" class="text-capitalize">warga negara asing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4" style="display: none">
                                <div class="form-group">
                                    <label class="form-label" for="negara_asal">Negara Asal <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="negara_asal" name="negara_asal"
                                        placeholder="Negara Asal" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="kota_lahir">Kota Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kota_lahir" name="kota_lahir"
                                        placeholder="Kota Lahir" required="" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir
                                        <span class="text-danger">*</span>
                                        <span class="text-success">bulan/tanggal/tahun</span>
                                    </label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        required="" />
                                    <input type="hidden" id="tanggal_lahir_id" name="tanggal_lahir_id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="jenis_kelamin">Jenis Kelamin<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="laki-laki" class="text-capitalize">laki-laki</option>
                                        <option value="perempuan" class="text-capitalize">perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="agama_id">Agama<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="agama_id" name="agama_id">
                                        @foreach ($agamas ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="pendidikan_id">pendidikan<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="pendidikan_id" name="pendidikan_id">
                                        @foreach ($pendidikans ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="pekerjaan_id">pekerjaan<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="pekerjaan_id" name="pekerjaan_id">
                                        @foreach ($pekerjaans ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="status_kawin_id">status kawin<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="status_kawin_id" name="status_kawin_id">
                                        @foreach ($status_kawins ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="status_penduduk_id">status
                                        penduduk<span class="text-danger">*</span></label>
                                    <select class="form-control" id="status_penduduk_id" name="status_penduduk_id">
                                        @foreach ($status_penduduks ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="rt_id">rukun tetangga<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="rt_id" name="rt_id">
                                        @foreach ($rts ?? [] as $v)
                                            <option value="{{ $v->id }}" class="text-capitalize">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="file_ktp">KTP</label>
                                    <input type="file" class="form-control" id="file_ktp" name="file_ktp" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="file_akte">Akte Kelahiran</label>
                                    <input type="file" class="form-control" id="file_akte" name="file_akte" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="asal_data">
                                        Ditambahkan Berdasarkan<span class="text-danger">*</span></label>
                                    <select class="form-control" id="asal_data" name="asal_data">
                                        <option value="0" class="text-capitalize">Kelahiran</option>
                                        <option value="1" class="text-capitalize">Kedatangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="tanggal_datang">
                                        Tanggal Datang<span class="text-danger">*</span>
                                        <span class="text-success">bulan/tanggal/tahun</span>
                                    </label>
                                    <input type="hidden" id="tanggal_datang_id" name="tanggal_datang_id">
                                    <input type="date" class="form-control" id="tanggal_datang"
                                        name="tanggal_datang">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label text-capitalize" for="alamat_lengkap">Alamat Lengkap <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required
                                        placeholder="Alamat Yang Digunakan Untuk Laporan Dan Lain Lain"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fa fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default-ktp">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-ktp-title">Lihat KTP</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="img-modal-ktp" />
                </div>
                <div class="modal-footer">
                    <a href="" download="" id="donwloadd-btn-ktp" class="btn btn-primary">
                        <li class="fa fa-save mr-1"></li> Download
                    </a>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default-akte">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-akte-title">Lihat AKTE</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="img-modal-akte" />
                </div>
                <div class="modal-footer">
                    <a href="" download="" id="donwloadd-btn-akte" class="btn btn-primary">
                        <li class="fa fa-save mr-1"></li> Download
                    </a>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        let global_is_edit = true;
        const table_html = $('#tbl_main');
        $(document).ready(function() {
            $('#penduduk_negara').change(() => {
                wn_refresh();
            })
            $('#asal_data').change(() => {
                tanggal_datang_refresh();
            })
            // datatable ====================================================================================
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // return;
            const new_table = table_html.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route('admin.kependudukan.penduduk') }}",
                    data: function(d) {
                        d['filter[rt_id]'] = $('#filter_rt').val();
                        d['filter[jenis_kelamin]'] = $('#filter_jenis_kelamin').val();
                        d['filter[agama]'] = $('#filter_agama').val();
                        d['filter[status_kawin]'] = $('#filter_status_kawin').val();
                        d['filter[pendidikan]'] = $('#filter_pendidikan').val();
                        d['filter[Pekerjaan]'] = $('#filter_Pekerjaan').val();
                        d['filter[status_penduduk]'] = $('#filter_status_penduduk').val();
                        d['filter[ktp]'] = $('#filter_ktp').val();
                        d['filter[akte]'] = $('#filter_akte').val();
                        // asal negara
                        // nama negara query distict ke penduduk negara
                        // status meninggal [ya, tidak]
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return ` <button type="button" class="btn btn-rounded btn-primary btn-sm" title="Edit Data" onClick="editFunc('${data}')" data-toggle="tooltip" title="Ubah Data">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-rounded btn-danger btn-sm" title="Delete Data" onClick="deleteFunc('${data}')"  data-toggle="tooltip" title="Hapus Data">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        `;
                        },
                        orderable: false,
                        className: 'text-nowrap'
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.rt_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'kota_lahir',
                        name: 'kota_lahir',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'tanggal_lahir_str',
                        name: 'tanggal_lahir_str',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'umur',
                        name: 'umur',
                        className: 'text-nowrap text-capitalize',
                        render(data, type, row) {
                            return (data && row.tanggal_mati == null) ? `${data} Tahun` : '';
                        },
                    },
                    {
                        data: 'tanggal_mati_str',
                        name: 'tanggal_mati_str',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return data ? `<span class="badge bg-warning">${data}</span>` : '';
                        }
                    },
                    {
                        data: 'agama',
                        name: 'agama',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.agama_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'status_kawin',
                        name: 'status_kawin',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.status_kawin_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.pendidikan_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.pekerjaan_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'status_penduduk',
                        name: 'status_penduduk',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${row.status_penduduk_nama}">
                                ${data}
                                </span> `;
                        }
                    },
                    {
                        data: 'ktp_ada',
                        name: 'ktp_ada',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            const status = data == 1 ? 'Ada' : 'Tidak';
                            const status_nama = data == 1 ? 'Ada' : 'Tidak Ada';
                            const bg = data == 1 ? 'bg-success' : 'bg-danger';
                            return ` <span class="badge ${bg}" tabindex="0" data-toggle="tooltip" title="${status_nama}">
                                ${status}
                                </span> `;
                        }
                    },
                    {
                        data: 'akte_ada',
                        name: 'akte_ada',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            const status = data == 1 ? 'Ada' : 'Tidak';
                            const status_nama = data == 1 ? 'Ada' : 'Tidak Ada';
                            const bg = data == 1 ? 'bg-success' : 'bg-danger';
                            return ` <span class="badge ${bg}" tabindex="0" data-toggle="tooltip" title="${status_nama}">
                                ${status}
                                </span> `;
                        }
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp',
                        className: 'text-nowrap text-capitalize',
                    },
                    {
                        data: 'alamat_lengkap',
                        name: 'alamat_lengkap',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            return ` <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="${data}">
                                ${String(data).substr(0, 100) + (String(data).length > 100 ? '...' : '')}
                                </span> `;
                        }
                    },
                    {
                        data: 'negara',
                        name: 'negara',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            const status = data == 1 ? 'WNI' : 'WNA';
                            const status_nama = data == 1 ? 'Warga Negara Indonesia' :
                                'Warga Negara Asing';
                            const bg = data == 1 ? 'bg-success' : 'bg-info';
                            return ` <span class="badge ${bg}" tabindex="0" data-toggle="tooltip" title="${status_nama}">
                                ${status}
                                </span> `;
                        }
                    },
                    {
                        data: 'negara_nama',
                        name: 'negara_nama',
                        className: 'text-nowrap text-capitalize',
                        render: function(data, type, row) {
                            const status = row.negara == 1 ? 'IND' : data;
                            const status_nama = row.negara == 1 ? 'Indonesia' : data;
                            const bg = row.negara == 1 ? 'bg-success' : 'bg-info';
                            return ` <span class="badge ${bg}" tabindex="0" data-toggle="tooltip" title="${status_nama}">
                                ${status}
                                </span> `;
                        }
                    },

                ],
                order: [
                    [1, 'asc']
                ],
                drawCallback: function(settings) {
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            new_table.on('draw.dt', function() {
                var PageInfo = table_html.DataTable().page.info();
                new_table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });

            });

            $('#FilterForm').submit(function(e) {
                e.preventDefault();
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
            });

            // insertForm ===================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
                const route = ($('#id').val() == '') ?
                    "{{ route('admin.kependudukan.penduduk.insert') }}" :
                    "{{ route('admin.kependudukan.penduduk.update') }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-default").modal('hide');
                        var oTable = table_html.dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        global_is_edit = true;
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('#btn-save',
                            '<li class="fa fa-save mr-1"></li> Simpan',
                            false);
                    }
                });
            });
        });

        function add() {
            if (global_is_edit) {
                $('#MainForm').trigger("reset");
                $('#modal-default-title').html("Tambah Data Penduduk");
                $('#modal-default').modal('show');
                $('#id').val('');
                resetErrorAfterInput();
                global_is_edit = false;
                wn_refresh();
                tanggal_datang_refresh();
            }
        }


        function editFunc(id) {
            $('#main-card').LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ url('admin/kependudukan/penduduk/find') }}/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: null,
                success: (data) => {
                    $('#id').val(data.id);
                    $('#nik').val(data.nik);
                    $('#nama').val(data.nama);
                    $('#penduduk_negara').val(data.penduduk_negara);
                    $('#negara_asal').val(data.negara_asal);
                    $('#kota_lahir').val(data.kota_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#tanggal_lahir_id').val(data.tanggal_lahir_id);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#agama_id').val(data.agama_id);
                    $('#pendidikan_id').val(data.pendidikan_id);
                    $('#pekerjaan_id').val(data.pekerjaan_id);
                    $('#status_kawin_id').val(data.status_kawin_id);
                    $('#status_penduduk_id').val(data.status_penduduk_id);
                    $('#rt_id').val(data.rt_id);
                    $('#asal_data').val(data.asal_data);
                    $('#tanggal_datang').val(data.tanggal_datang);
                    $('#tanggal_datang_id').val(data.tanggal_datang_id);
                    $('#alamat_lengkap').val(data.alamat_lengkap);
                    $('#file_ktp').val('');
                    $('#file_akte').val('');

                    $('#modal-default-title').html("Ubah Data Penduduk");
                    $('#modal-default').modal('show');
                    resetErrorAfterInput();
                    global_is_edit = true;
                    wn_refresh();
                    // perlu revisi
                    // asal_data
                    // tanggal_datang
                    tanggal_datang_refresh();
                },
                error: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $('#main-card').LoadingOverlay("hide");
                }
            });
        }

        function deleteFunc(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('admin/kependudukan/penduduk') }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html.dataTable();
                            oTable.fnDraw(false);
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function viewKtp(ele) {
            const data = ele.dataset;
            const link = `{{ url($folder_ktp) }}/${data.foto}`
            $('#modal-default-ktp').modal('show');
            const btn_download = $('#donwloadd-btn-ktp');
            const img_modal = $('#img-modal-ktp');
            btn_download.attr('href', link);
            btn_download.attr('download', `ktp-${data.nama}-${data.nik}`);

            img_modal.attr('src', link);
            img_modal.attr('alt', data.nama);
        }

        function viewAkte(ele) {
            const data = ele.dataset;
            const link = `{{ url($folder_akte) }}/${data.foto}`
            $('#modal-default-akte').modal('show');
            const btn_download = $('#donwloadd-btn-akte');
            const img_modal = $('#img-modal-akte');
            btn_download.attr('href', link);
            btn_download.attr('download', `akte-${data.nama}-${data.nik}`);

            img_modal.attr('src', link);
            img_modal.attr('alt', data.nama);
        }

        function wn_refresh() {
            const penduduk_negara = $('#penduduk_negara');
            const negara_asal = $('#negara_asal');
            const nama = $('#nama');

            if (penduduk_negara.val() == 0) {
                negara_asal.parent().parent().fadeIn();
                nama.parent().parent().attr('class', 'col-md-4');
                penduduk_negara.parent().parent().attr('class', 'col-md-4');
                negara_asal.attr('required', '');
            } else {
                negara_asal.parent().parent().hide();
                nama.parent().parent().attr('class', 'col-md-6');
                penduduk_negara.parent().parent().attr('class', 'col-md-6');
                negara_asal.removeAttr('required')
            }
        }

        function tanggal_datang_refresh() {
            const asal_data = $('#asal_data');
            const file_ktp = $('#file_ktp');
            const file_akte = $('#file_akte');
            const tanggal_datang = $('#tanggal_datang');


            if (asal_data.val() == 0) {
                tanggal_datang.parent().parent().hide();
                tanggal_datang.removeAttr('required')

                asal_data.parent().parent().attr('class', 'col-md-4');
                file_ktp.parent().parent().attr('class', 'col-md-4');
                file_akte.parent().parent().attr('class', 'col-md-4');
            } else {
                tanggal_datang.parent().parent().fadeIn();
                tanggal_datang.attr('required', '');

                asal_data.parent().parent().attr('class', 'col-md-6');
                file_ktp.parent().parent().attr('class', 'col-md-6');
                file_akte.parent().parent().attr('class', 'col-md-6');
            }
        }
    </script>
@endsection
