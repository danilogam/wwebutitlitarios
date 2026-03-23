<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Visita extends Model
{
    protected $table = 'visitas';

    protected $fillable = [
        'url',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    // Filtrar por URL
    public function scopeUrl(Builder $query, string $url): Builder
    {
        return $query->where('url', $url);
    }

    // Visitas de hoje
    public function scopeHoje(Builder $query): Builder
    {
        return $query->whereDate('created_at', now()->toDateString());
    }

    // Visitas por período
    public function scopePeriodo(Builder $query, $inicio, $fim): Builder
    {
        return $query->whereBetween('created_at', [$inicio, $fim]);
    }

    /*
    |--------------------------------------------------------------------------
    | MÉTODOS ÚTEIS
    |--------------------------------------------------------------------------
    */

    // Registrar visita manualmente (caso queira usar fora do middleware)
    public static function registrar(string $url, ?string $ip = null, ?string $userAgent = null): self
    {
        return self::create([
            'url' => $url,
            'ip' => $ip ?? request()->ip(),
            'user_agent' => $userAgent ?? request()->userAgent(),
        ]);
    }

    // Total de visitas de uma página
    public static function totalPorPagina(string $url): int
    {
        return self::where('url', $url)->count();
    }

    // Total de visitas hoje por página
    public static function totalHoje(string $url): int
    {
        return self::where('url', $url)
            ->whereDate('created_at', now()->toDateString())
            ->count();
    }
}