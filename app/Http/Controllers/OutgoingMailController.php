<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutgoingMail;
use Barryvdh\DomPDF\Facade\Pdf;

class OutgoingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Agenda Surat Keluar',
            'outgoing_mail' => OutgoingMail::all()
        ];

        return view('dashboard/outgoing_mail/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Surat Keluar'
        ];

        return view('dashboard/outgoing_mail/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'mail_date.required' => 'Tanggal Surat harus diisi!',
            'mail_number.required' => 'Nomor Surat harus diisi!',
            'notes.required' => 'Keterangan harus diisi!',
            'mail_to.required' => 'Tujuan Surat harus diisi!',
            'mail_subject.required' => 'Perihal Surat harus diisi!'
        ];

        $request->validate([
            'mail_date' => 'required|date',
            'mail_number' => 'required',
            'notes' => 'required',
            'mail_to' => 'required',
            'mail_subject' => 'required',
        ], $messages);

        OutgoingMail::create([
            'mail_date' => $request->mail_date,
            'mail_number' => $request->mail_number,
            'notes' => $request->notes,
            'mail_to' => $request->mail_to,
            'mail_subject' => $request->mail_subject,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan!');
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
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Surat Keluar',
            'outgoing_mail' => OutgoingMail::find($id)
        ];

        return view('dashboard/outgoing_mail/edit', $data);
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
        $messages = [
            'mail_date.required' => 'Tanggal Surat harus diisi!',
            'mail_number.required' => 'Nomor Surat harus diisi!',
            'notes.required' => 'Keterangan harus diisi!',
            'mail_to.required' => 'Tujuan Surat harus diisi!',
            'mail_subject.required' => 'Perihal Surat harus diisi!'
        ];

        $request->validate([
            'mail_date' => 'required|date',
            'mail_number' => 'required',
            'notes' => 'required',
            'mail_to' => 'required',
            'mail_subject' => 'required',
        ], $messages);

        OutgoingMail::where('id', $id)->update([
            'mail_date' => $request->mail_date,
            'mail_number' => $request->mail_number,
            'notes' => $request->notes,
            'mail_to' => $request->mail_to,
            'mail_subject' => $request->mail_subject,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OutgoingMail::destroy($id);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus!');
    }

    public function pdf()
    {
        $data = [
            'title' => 'Agenda Surat Keluar',
            'outgoing_mail' => OutgoingMail::all()
        ];

        $pdf = Pdf::loadView('dashboard/outgoing_mail/pdf', $data);
        return $pdf->stream();
    }
}
