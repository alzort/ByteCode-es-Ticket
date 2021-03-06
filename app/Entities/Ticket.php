<?php namespace SistemaTickets\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['titulo', 'estado'];


	public function autor()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }


	public function comentarios()
    {
    	return $this->hasMany(TicketComentario::class);
    }


    public function votos()
    {
    	return $this->hasMany(TicketVoto::class);
    }

    public function getOpenAttribute()
    {
    	return $this->estado == 'abierto';
    } 
}
