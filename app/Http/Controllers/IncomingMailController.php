<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingMail;
use Barryvdh\DomPDF\Facade\Pdf;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Agenda Surat Masuk',
            'incoming_mail' => IncomingMail::all()
        ];

        return view('dashboard/incoming_mail/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Surat Masuk'
        ];

        return view('dashboard/incoming_mail/create', $data);
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
            'mail_from.required' => 'Asal Surat harus diisi!',
            'mail_subject.required' => 'Perihal Surat harus diisi!',
            'date_received.required' => 'Tanggal Surat Diterima harus diisi!'
        ];

        $request->validate([
            'mail_date' => 'required|date',
            'mail_number' => 'required',
            'mail_from' => 'required',
            'mail_subject' => 'required',
            'date_received' => 'required|date',
            'notes' => 'nullable'
        ], $messages);

        IncomingMail::create([
            'mail_date' => $request->mail_date,
            'mail_number' => $request->mail_number,
            'mail_from' => $request->mail_from,
            'mail_subject' => $request->mail_subject,
            'date_received' => $request->date_received,
            'notes' => $request->notes
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil ditambahkan');
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
            'title' => 'Edit Surat Masuk',
            'incoming_mail' => IncomingMail::find($id)
        ];

        return view('dashboard/incoming_mail/edit', $data);
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
            'mail_from.required' => 'Asal Surat harus diisi!',
            'mail_subject.required' => 'Perihal Surat harus diisi!',
            'date_received.required' => 'Tanggal Surat Diterima harus diisi!'
        ];

        $request->validate([
            'mail_date' => 'required|date',
            'mail_number' => 'required',
            'mail_from' => 'required',
            'mail_subject' => 'required',
            'date_received' => 'required|date',
            'notes' => 'nullable'
        ], $messages);

        IncomingMail::where('id', $id)->update([
            'mail_date' => $request->mail_date,
            'mail_number' => $request->mail_number,
            'mail_from' => $request->mail_from,
            'mail_subject' => $request->mail_subject,
            'date_received' => $request->date_received,
            'notes' => $request->notes
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IncomingMail::destroy($id);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil dihapus');
    }

    public function pdf()
    {
        $data = [
            'title' => 'Agenda Surat Masuk',
            'incoming_mail' => IncomingMail::all()
        ];

        $pdf = Pdf::loadView('dashboard/incoming_mail/pdf', $data);
        return $pdf->stream();
    }
}
