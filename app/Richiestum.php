<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Richiestum extends Model
{
    public $table = 'richiesta';

    const STATO_SELECT = [
        '1' => 'No',
        '0' => 'Si',
    ];

    const GIARDINO_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const TERRAZZA_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CUCINA_SELECT = [
        '1' => 'cottura',
        '2' => 'abitabile',
    ];

    const DESTINAZIONE_SELECT = [
        '1' => 'Residenziale',
        '2' => 'Commerciale',
    ];

    const PRIORITA_SELECT = [
        'normale'      => 'Normale',
        'alta'         => 'Alta',
        'urgente'      => 'Urgente',
        'finanziabile' => 'Finanziabile',
    ];

    protected $fillable = [
        'agente_id',
        'agenzia_id',
        'cliente_id',
        'contratto_id',
        'provincia_id',
        'comune_id',
        'garage_id',
        'prezzo',
        'tipologia_immobile_id',
        'tipologia_immobile_2_id',
        'tipologia_immobile_3_id',
        'tipologia_immobile_4_id',
        'comune_2_id',
        'comune_3_id',
        'comune_4_id',
        'comune_5_id',
        'comune_6_id',
        'priorita',
        'destinazione',
        'stato_ids',
        'piano_ids',
        'piano',
        'uso',
        'contesto',
        'cucina',
        'camere',
        'servizi',
        'mq',
        'giardino',
        'terrazza',
        'stato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');
    }

    public function agenzia()
    {
        return $this->belongsTo(Agenzie::class, 'agenzia_id');
    }

    public function cliente()
    {
        return $this->belongsTo(AgentClient::class, 'cliente_id');
    }

    public function contratto()
    {
        return $this->belongsTo(ContrattoImmobile::class, 'contratto_id');
    }

    public function provincia()
    {
        return $this->belongsTo(Province::class, 'provincia_id');
    }

    public function comune()
    {
        return $this->belongsTo(Comuni::class, 'comune_id');
    }

    public function garage()
    {
        return $this->belongsTo(GarageImmobile::class, 'garage_id');
    }

    public function tipologia_immobile()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_id');
    }

    public function tipologia_immobile_2()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_2_id');
    }

    public function tipologia_immobile_3()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_3_id');
    }

    public function tipologia_immobile_4()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_4_id');
    }

    public function comune_2()
    {
        return $this->belongsTo(Comuni::class, 'comune_2_id');
    }

    public function comune_3()
    {
        return $this->belongsTo(Comuni::class, 'comune_3_id');
    }

    public function comune_4()
    {
        return $this->belongsTo(Comuni::class, 'comune_4_id');
    }

    public function comune_5()
    {
        return $this->belongsTo(Comuni::class, 'comune_5_id');
    }

    public function comune_6()
    {
        return $this->belongsTo(Comuni::class, 'comune_6_id');
    }
}
