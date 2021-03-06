<?php namespace SistemaTickets\Http\Controllers;

use Illuminate\Auth\Guard;
use SistemaTickets\Http\Requests;
use SistemaTickets\Http\Controllers\Controller;
use SistemaTickets\Entities\Ticket;
use SistemaTickets\Entities\TicketComentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function nuevo($id, Request $request, Guard $auth)
	{
		$this->validate($request, [

			'comentario' => 'required|max:250',

			'link' => 'url'

		]);

		$comentario = new TicketComentario($request->all());

		$comentario->user_id = $auth->id();

		$ticket = Ticket::findOrFail($id);

		$ticket->comentarios()->save($comentario);


		session()->flash('success', 'Comentario guardado correctamente');
		
		return redirect()->back();


		//$comentario = new TicketComentario($request->only(['comentario', 'link']));



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
