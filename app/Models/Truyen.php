<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    protected $fillable = [
        'tentruyen','tomtat','hinhanh','slug_truyen','danhmuc_id','kichhoat','theloai_id','created_at','updated_at','truyen_noibat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function DanhmucTruyen(){
        return $this -> belongsTo ('App\Models\DanhmucTruyen','danhmuc_id','id');
    }
    public function Chapter(){
        return $this -> hasMany ('App\Models\Chapter','truyen_id','id');
    }
     public function Theloai(){
        return $this -> belongsTo ('App\Models\Theloai','theloai_id','id');
    }
}
