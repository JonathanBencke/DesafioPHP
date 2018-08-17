<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'valor', 'user_id', 'produto_tipo_id'];
    protected $primaryKey = "id";
    
    /**
     * Get do tipo do produto do produto
     */
    public function produtoTipo()
    {
        return $this->belongsTo('App\ProdutosTipos');
    }
    
    /**
     * Get do usuario que cadastrou o produto
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
