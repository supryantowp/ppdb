<?php

namespace App\Http\Controllers;

use App\AccessMenu;
use App\Bank;
use App\DataPpdb;
use App\HargaPpdb;
use App\HistoryTransaksiPpdb;
use App\Http\Requests\DataSiswa1Request;
use App\Http\Requests\DataSiswa2Request;
use App\Http\Requests\DataSiswa3Request;
use App\Http\Requests\TransaksiPpdbRequest;
use App\Jurusan;
use App\Menu;
use App\PengumumanPpdb;
use App\SubMenu;
use App\TransaksiPpdb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalonSiswaController extends Controller
{
    protected $role = 3; // role calon siswa
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->get();
    }

    public function index()
    {
        $menu = $this->menu;
        $hasDaftar = DataPpdb::where('user_id', auth()->user()->id)->count();
        return view('calon-siswa.index', compact('menu', 'hasDaftar'));
    }

    public function listPendaftar(Request $request)
    {
        $search = $request->search;
        $menu = $this->menu;
        $pengumuman = PengumumanPpdb::where('no_ppdb', 'LIKE', "%$search%")->orderBy('id', 'ASC')->paginate(10);
        return view('calon-siswa.list-pendaftar', compact('menu', 'pengumuman'));
    }

    public function pengumuman()
    {
        $menu = $this->menu;
        $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        $status = $dataPpdb ? PengumumanPpdb::where('no_ppdb', $dataPpdb->no_ppdb)->first() : null;
        return view('calon-siswa.pengumuman', compact('menu', 'status'));
    }

    public function berhasil()
    {
        $menu = $this->menu;
        $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        return view('calon-siswa.pendaftaran-berhasil', compact('menu', 'dataPpdb'));
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

    public function pembayaran()
    {
        $menu = $this->menu;
        $banks = Bank::all();
        $historis = HistoryTransaksiPpdb::where('user_id', auth()->user()->id)->get();

        return view('calon-siswa.pembayaran', compact('menu', 'banks', 'historis'));
    }

    public function konfirmasi()
    {
        $menu = $this->menu;
        $banks = Bank::all();
        $hargaPpdb = HargaPpdb::first();

        $harga = $hargaPpdb->harga;
        $transaksiUser = TransaksiPpdb::where('user_id', auth()->user()->id)->sum('jumlah_bayar');

        $sisa_yang_harus_dibayar =  $harga - $transaksiUser;

        return view('calon-siswa.pembayaran-konfirmasi', compact('menu', 'banks', 'hargaPpdb', 'sisa_yang_harus_dibayar'));
    }

    public function detailPembayaran($id)
    {
        $menu = $this->menu;
        $histori = HistoryTransaksiPpdb::whereId($id)->first();

        return view('calon-siswa.pembayaran-detail', compact('menu', 'histori'));
    }

    public function storePembayaran(TransaksiPpdbRequest $request)
    {
        $TransaksiPpdb = TransaksiPpdb::orderBy('created_at', 'DESC')->first();
        $id = !$TransaksiPpdb ? 0 : $TransaksiPpdb->id;
        $no_transaksi = '#' . str_pad($id + 1, 4, "0", STR_PAD_LEFT);

        $file = $request->file('bukti_pembayaran');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data/images/bukti-pembayaran';
        $file->move($tujuan_upload, $nama_file);

        TransaksiPpdb::create([
            'no_transaksi' => $no_transaksi,
            'user_id'   => auth()->user()->id,
            'nama' => $request->nama,
            'jumlah_bayar' => $request->jumlah_bayar,
            'yang_harus_dibayar' => $request->yang_harus_dibayar,
            'bank_id'   => $request->bank_id,
            'bukti_pembayaran' => $nama_file
        ]);

        $sisa_bayar = $request->yang_harus_dibayar - $request->jumlah_bayar;

        $sisa_bayar = $sisa_bayar < 0 ? 0 : $sisa_bayar;

        if ($sisa_bayar == 0 || $sisa_bayar < 0) {
            $status = 'lunas';
        } else {
            $status = 'belum lunas';
        }

        HistoryTransaksiPpdb::create([
            'no_transaksi'  => $no_transaksi,
            'user_id' => auth()->user()->id,
            'sisa_bayar'  => $sisa_bayar,
            'status'    => $status
        ]);

        session()->flash('success', 'Sukses melakuka pembayaran');
        return redirect()->route('pendaftaran.pembayaran');
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

        PengumumanPpdb::create([
            'no_ppdb' => $no_ppdb,
            'status'  => 'belum di verifikasi'
        ]);

        DataPpdb::create([
            'user_id' => auth()->user()->id,
            'no_ppdb' =>  $no_ppdb,
            'nisn' => $ses->get('nisn'),
            'no_kk' => $ses->get('no_kk'),
            'nik_siswa' => $ses->get('nik_siswa'),
            'nama_siswa' => $ses->get('nama_siswa'),
            'agama' => $ses->get('agama'),
            'jenis_kelamin' => $ses->get('jenis_kelamin'),
            'tanggal_lahir' => $ses->get('tanggal_lahir'),
            'tempat_lahir' => $ses->get('tempat_lahir'),
            'alamat_siswa' => $ses->get('alamat_siswa'),
            'no_telepon_siswa' => $ses->get('no_telepon_siswa'),
            'anak_ke' => $ses->get('anak_ke'),
            'jumlah_saudara' => $ses->get('jumlah_saudara'),
            'hobi' => $ses->get('hobi'),
            'cita_cita' => $ses->get('cita_cita'),
            'foto_siswa' => $nama_file,

            'nik_ayah' => $ses->get('nik_ayah'),
            'nama_ayah' => $ses->get('nama_ayah'),
            'pendidikan_ayah' => $ses->get('pendidikan_ayah'),
            'pekerjaan_ayah' => $ses->get('pekerjaan_ayah'),
            'penghasilan_ayah' => $ses->get('penghasilan_ayah'),
            'no_telepon_ayah' => $ses->get('no_telepon_ayah'),

            'nik_ibu' => $ses->get('nik_ibu'),
            'nama_ibu' => $ses->get('nama_ibu'),
            'pendidikan_ibu' => $ses->get('pendidikan_ibu'),
            'pekerjaan_ibu' => $ses->get('pekerjaan_ibu'),
            'penghasilan_ibu' => $ses->get('penghasilan_ibu'),
            'no_telepon_ibu' => $ses->get('no_telepon_ibu'),

            'nik_wali' => $ses->get('nik_wali'),
            'nama_wali' => $ses->get('nama_wali'),
            'pendidikan_wali' => $ses->get('pendidikan_wali'),
            'pekerjaan_wali' => $ses->get('pekerjaan_wali'),
            'penghasilan_wali' => $ses->get('penghasilan_wali'),
            'no_telepon_wali' => $ses->get('no_telepon_wali'),

            'npsn_sekolah' => $request->npsn_sekolah,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'no_skhun' => $request->no_skhun,
            'tinggal_dengan' => $request->tinggal_dengan,
            'jurusan_pertama' => $request->jurusan_pilihan_pertama,
            'jurusan_kedua' => $request->jurusan_pilihan_kedua
        ]);


        return redirect()->route('pendaftaran.berhasil')->with('success', 'berhasil');
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
}
