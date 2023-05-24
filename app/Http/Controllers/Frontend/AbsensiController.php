<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsensiRequest;
use App\Models\Acara;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = DB::table('acaras')
                ->whereDate('tanggal_pelaksanaan', Carbon::now()->locale('id')->isoFormat('YYYY-MM-DD'))
                ->paginate(8);

        return view('users.index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch($id)
    {
        $pesertas = DB::table('pesertas')
        ->join('acaras', 'acaras.id', '=', 'pesertas.acara_id')
        ->select('pesertas.nama', 'pesertas.acara_id', 'pesertas.nip', 'pesertas.instansi', 'pesertas.jabatan', 'pesertas.divisi')
        ->where('pesertas.acara_id', $id);


            return (DataTables::of($pesertas)
            ->make(true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsensiRequest $request)
    {
        $peserta = Peserta::create([
            'acara_id' => $request->acara_id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'instansi' => $request->instansi != "on" ? $request->instansi : $request->instansi_lain,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'media' => $request->media,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        if($peserta instanceof Peserta){
            Alert::success('Success', 'Data berhasil ditambahkan!');
            return redirect("/absensi/$request->id");
        }

        Alert::error('Error', 'Gagal menambah data');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $acara = Acara::find($id);

        return view('users.form_absensi', compact('acara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
       // Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
