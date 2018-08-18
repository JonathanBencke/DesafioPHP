<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';
    protected $fillable = ['produto_id', 'user_id', 'qtd'];
    protected $primaryKey = "id";
    
    /**
     * Get do tipo do produto do produto
     */
    public function produto()
    {
        return $this->belongsTo('App\Produtos');
    }
    
    /**
     * Get do usuario que cadastrou o produto
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
