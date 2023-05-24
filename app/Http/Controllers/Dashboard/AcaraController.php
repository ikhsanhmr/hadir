<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AcaraDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcaraRequest;
use App\Models\Acara;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class AcaraController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $title = 'Delete User!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        if($request->ajax()){
            return DataTables::of(Acara::query())
            ->addColumn('action', function($model){
                return view('admin.acara.action_button', ['model' => $model])->render();
            })
            ->make(true);
        }
        return view('admin.acara.acara');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.acara.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(AcaraRequest $request)
    {


        $acara = Acara::create([
            'judul' => $request->judul,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'tempat' => $request->tempat,
            'media' => $request->media,
            'link' => $request->link,
            'id_meeting' => $request->id_meeting,
            'password' => $request->password,
            'mulai' => $request->mulai,
            'berakhir' => $request->berakhir
        ]);

        if($acara instanceof Acara){
            Alert::success('Success', 'Data berhasil ditambahkan!');
            return redirect()->route('acara.index');
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
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Acara $acara)
    {
        return view('admin.acara.edit', compact('acara'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(AcaraRequest $request, Acara $acara)
    {
        // dd($request->all());
        $action = $acara->update([
            'judul' => $request->judul,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'tempat' => $request->tempat,
            'media' => $request->media,
            'link' => $request->link,
            'id_meeting' => $request->id_meeting,
            'password' => $request->password,
            'mulai' => $request->mulai,
            'berakhir' => $request->berakhir
        ]);

        if($action){
            Alert::success('Success', 'Data berhasil diupdate!');
            return redirect()->route('acara.index');
        }

        Alert::error('Error', 'Gagal mengupdate data');

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Acara $acara)
    {

        $action = $acara->delete();

        if($action){
            Alert::success('Success', 'Data berhasil dihapus!');
            return redirect()->route('acara.index');
        }

        Alert::error('Error', 'Gagal menghapus data');

        return back();
    }
}
