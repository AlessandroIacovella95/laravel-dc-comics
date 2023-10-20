<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics= Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('comics.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
      $data = $this->validation($request->all(), $comic->id);
      $comic->update($data);
      return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
       $comic->delete();
       return redirect()->route('comics.index');
    }

    private function validation($data) {
        $validator = Validator::make(
          $data,
          [
            'title' => 'required|string|max:50',
            "description" => "nullable|string",
            "thumb" => "nullable|string",
            'price' => "required|string",
            "series" => "required|string",
            "sale_date" => "required|date",
            "type" => "required|string",
          ],
          [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo deve massimo di 50 caratteri',

            'description.text' => 'La descrizione deve essere un testo',

            'thumb.string' => 'L\'immagine deve essere una stringa',

            'price.required' => 'Il prezzo è obbligatorio',
            'price.string' => 'Il prezzo deve essere una stringa',

            'series.required' => 'La serie è obbligatoria',
            'series.string' => 'La serie deve essere una stringa',

            'sale_date.required' => 'La data di uscita è obbligatoria',
            'sale_date' => 'La data di uscita deve essere una data',

            'type.required' => 'Il genere è obbligatorio',
            'type.string' => 'Il genere deve essere una stringa',
          ]
        )->validate();  

        return $validator;
    }
}