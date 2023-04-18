<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExhibitorDocument extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'exhibitor_documents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'exhibitor_id',
        'title',
        'document_url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function exhibitor()
    {
        return $this->belongsTo(Exhibitor::class, 'exhibitor_id');
    }
}
