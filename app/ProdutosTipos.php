<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutosTipos extends Model
{
   
    protected $table = 'produtos_tipos';
    protected $fillable = ['nome', 'imposto'];
    protected $primaryKey = "id";
    
    /**
     * Get dos produtos para o tipo de produto
     */
    public function produtos()
    {
        return $this->hasMany('App\Produtos', 'produto_tipo_id');
    }
    
    
}
