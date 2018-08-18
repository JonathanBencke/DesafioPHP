<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutosTipos extends Model
{
   
    protected $table = 'produtos_tipos';
    protected $fillable = ['nome', 'imposto', 'user_id'];
    protected $primaryKey = "id";
    
    /**
     * Get dos produtos para o tipo de produto
     */
    public function produtos()
    {
        return $this->hasMany('App\Produtos');
    }
    
    
}
