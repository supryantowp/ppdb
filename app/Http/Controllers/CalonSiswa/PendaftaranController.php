<?php

namespace App\Http\Controllers\CalonSiswa;

use App\AccessMenu;
use App\DataPpdb;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataSiswa1Request;
use App\Http\Requests\DataSiswa2Request;
use App\Http\Requests\DataSiswa3Request;
use App\Jurusan;
use App\PengumumanPpdb;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PendaftaranController extends Controller
{
    protected $role = 3; // role calon siswa
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->get();
    }

    public function pendaftaran()
    {
        $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        $menu = $this->menu;

        if ($dataPpdb) {
            return view('calon-siswa.pendaftaran-berhasil', compact('menu', 'dataPpdb'));
        }
        return view('calon-siswa.pendaftaran', compact('menu'));
    }

    public function cetak()
    {
        $dataPpdb = $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        $pdf = PDF::loadview('calon-siswa.cetak-pendaftaran', ['dataPpdb' => $dataPpdb]);
        return $pdf->download('data pendaftaran ' . $dataPpdb->nama_siswa);
    }

    public function cetakKelulusan($id)
    {
        $pengumuman = PengumumanPpdb::where('id', $id)->first();
        if (!$pengumuman) {
            session()->flash('error', 'pendaftaran kamu belum di verifikasi');
            return redirect()->back();
        }
        $pdf = PDF::loadview('calon-siswa.cetak-kelulusan', ['pengumuman' => $pengumuman]);
        return $pdf->download('data kelulusan ' . $pengumuman->data_ppdb->nama_siswa);
    }

    public function listPendaftar(Request $request)
    {
        $search = $request->search;
        $menu = $this->menu;
        $pengumuman = PengumumanPpdb::where('no_ppdb', 'LIKE', "%$search%")->orderBy('id', 'ASC')->paginate(10);
        return view('calon-siswa.list-pendaftar', compact('menu', 'pengumuman'));
    }

    public function pendaftaranStep2()
    {
        $menu = $this->menu;
        if (!session()->get('step2')) {
            return back()->withErrors('isi form data siswa terlebih dahulu');
        }

        return view('calon-siswa.pendaftaran-step-2', compact('menu'));
    }

    public function pendaftaranStep3()
    {
        $menu = $this->menu;
        $jurusan = Jurusan::orderBy('name', 'asc')->get();

        if (!session()->get('step3')) {
            return back()->withErrors('isi form data siswa terlebih dahulu');
        }

        return view('calon-siswa.pendaftaran-step-3', compact('jurusan', 'menu'));
    }

    public function berhasil()
    {
        $menu = $this->menu;
        $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        return view('calon-siswa.pendaftaran-berhasil', compact('menu', 'dataPpdb'));
    }

    public function dataSiswa1(DataSiswa1Request $request)
    {
        $data = [
            'step2' => true,
            'nisn' => $request->nisn,
            'no_kk' => $request->no_kk,
            'nik_siswa' => $request->nik_siswa,
            'agama' => $request->agama,
            'no_telepon_siswa' => $request->no_telepon_siswa,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_siswa' => $request->alamat_siswa,
            'anak_ke' => $request->anak_ke,
            'jumlah_saudara' => $request->jumlah_saudara,
            'hobi' => $request->hobi,
            'cita_cita' => $request->cita_cita,
            'foto_siswa' => $request->foto_siswa
        ];

        session()->put($data);

        return redirect()->route('pendaftaran-step-2');
    }

    public function dataSiswa2(DataSiswa2Request $request)
    {
        $data = [
            'step3' => true,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'no_telepon_ayah' => $request->no_telepon_ayah,

            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'no_telepon_ibu' => $request->no_telepon_ibu,

            'nik_wali' => $request->nik_wali,
            'nama_wali' => $request->nama_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'no_telepon_wali' => $request->no_telepon_wali,
        ];

        session()->put($data);

        return redirect()->route('pendaftaran-step-3');
    }

    public function dataSiswa3(DataSiswa3Request $request)
    {
        $data = [
            'konfirmasi' => true,
            'npsn_sekolah' => $request->npsn_sekolah,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'no_skhun' => $request->no_skhun,
            'rencana_tempat_tinggal' => $request->rencana_tempat_tinggal,
            'jurusan_pilihan_pertama' => $request->jurusan_pilihan_pertama,
            'jurusan_pilihan_kedua' => $request->jurusan_pilihan_kedua,
        ];

        session()->put($data);
    }

    public function store(DataSiswa3Request $request)
    {
        $ses = session();
        $latestPpdb = DataPpdb::orderBy('created_at', 'DESC')->first();

        $id = !$latestPpdb ? 0 : $latestPpdb->id;

        $no_ppdb = '#' . str_pad($id + 1, 4, "0", STR_PAD_LEFT);

        $file = $request->file('foto_siswa');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data/images/calon_siswa';
        $file->move($tujuan_upload, $nama_file);

        $dataPengumuman = [];
        $dataPengumuman['no_ppdb']  = $no_ppdb;
        $dataPengumuman['status']   = 'belum di verifikasi';

        PengumumanPpdb::create($dataPengumuman);

        $data = [];
        $data['user_id']            = auth()->user()->id;
        $data['no_ppdb']            = $no_ppdb;
        $data['nisn']               = $ses->get('nisn');
        $data['no_kk']              = $ses->get('no_kk');
        $data['nik_siswa']          = $ses->get('nik_siswa');
        $data['nama_siswa']         = $ses->get('nama_siswa');
        $data['agama']              = $ses->get('agama');
        $data['jenis_kelamin']      = $ses->get('jenis_kelamin');
        $data['tanggal_lahir']      = $ses->get('tanggal_lahir');
        $data['tempat_lahir']       = $ses->get('tempat_lahir');
        $data['alamat_siswa']       = $ses->get('alamat_siswa');
        $data['no_telepon_siswa']   = $ses->get('no_telepon_siswa');
        $data['anak_ke']            = $ses->get('anak_ke');
        $data['jumlah_saudara']     = $ses->get('jumlah_saudara');
        $data['hobi']               = $ses->get('hobi');
        $data['cita_cita']          = $ses->get('cita_cita');
        $data['foto_siswa']         = $nama_file;

        $data['nik_ayah']           = $ses->get('nik_ayah');
        $data['nama_ayah']          = $ses->get('nama_ayah');
        $data['pendidikan_ayah']    = $ses->get('pendidikan_ayah');
        $data['pekerjaan_ayah']     = $ses->get('pekerjaan_ayah');
        $data['penghasilan_ayah']   = $ses->get('penghasilan_ayah');
        $data['no_telepon_ayah']    = $ses->get('no_telepon_ayah');

        $data['nik_ibu']           = $ses->get('nik_ibu');
        $data['nama_ibu']          = $ses->get('nama_ibu');
        $data['pendidikan_ibu']    = $ses->get('pendidikan_ibu');
        $data['pekerjaan_ibu']     = $ses->get('pekerjaan_ibu');
        $data['penghasilan_ibu']   = $ses->get('penghasilan_ibu');
        $data['no_telepon_ibu']    = $ses->get('no_telepon_ibu');

        $data['nik_wali']           = $ses->get('nik_wali');
        $data['nama_wali']          = $ses->get('nama_wali');
        $data['pendidikan_wali']    = $ses->get('pendidikan_wali');
        $data['pekerjaan_wali']     = $ses->get('pekerjaan_wali');
        $data['penghasilan_wali']   = $ses->get('penghasilan_wali');
        $data['no_telepon_wali']    = $ses->get('no_telepon_wali');

        $data['npsn_sekolah']       = $request->npsn_sekolah;
        $data['asal_sekolah']       = $request->asal_sekolah;
        $data['alamat_sekolah']     = $request->alamat_sekolah;
        $data['no_skhun']           = $request->no_skhun;
        $data['tinggal_dengan']     = $request->tinggal_dengan;
        $data['jurusan_pertama']    = $request->jurusan_pilihan_pertama;
        $data['jurusan_kedua']      = $request->jurusan_pilihan_kedua;

        DataPpdb::create($data);

        return redirect()->route('pendaftaran.berhasil')->with('success', 'berhasil');
    }
}
