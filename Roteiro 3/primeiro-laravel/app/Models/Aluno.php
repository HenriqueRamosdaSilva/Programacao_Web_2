<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Aluno extends Model
{
protected $fillable = [
'nome',
'email',
'data_nascimento',
];
protected function casts(): array
{
return [
'data_nascimento' => 'date',
];
}
}






//class Aluno extends Model
//{
//protected $fillable = [
//'nome',
//'email'
//];
//}



//namespace App\Models;
//use Illuminate\Database\Eloquent\Model;
//class Aluno extends Model
//{
//    protected $fillable = [
//        'nome',
//        'email',
//    ];
//}