<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Immobile extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'immobiles';

    protected $appends = [
        'foto',
        'planimetrie',
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

    const TIPOLOGIA_SELECT = [
        '1' => 'Residenziale',
        '2' => 'Commerciale',
    ];

    const CLASSE_ENERGETICA_SELECT = [
        'casa-clima'   => 'Casa Clima',
        'aplus'        => 'A+',
        'a'            => 'A',
        'b'            => 'B',
        'c'            => 'C',
        'd'            => 'D',
        'e'            => 'E',
        'f'            => 'F',
        'g'            => 'G',
        'in-richiesta' => 'In fase di richiesta',
        'non-soggetto' => 'Non soggetto a classificazione',
        'da-reperire'  => 'Da reperire',
    ];

    protected $fillable = [
        'nome',
        'tipologia',
        'cliente_id',
        'agente_id',
        'filiale_id',
        'tipologia_immobile_id',
        'provincia_id',
        'comune_id',
        'indirizzo',
        'civico',
        'prezzo',
        'garage_id',
        'mq',
        'cucina',
        'giardino',
        'terrazza',
        'anno_costruzione',
        'anno_ristrutturazione',
        'contesto',
        'camere',
        'vani',
        'ripostigli',
        'bagni',
        'balconi',
        'soffitta',
        'cantina',
        'taverna',
        'catasto_sezione',
        'catasto_foglio',
        'catasto_mappale',
        'catasto_sub',
        'catasto_zona',
        'catasto_categoria',
        'catasto_classe',
        'catasto_consvani',
        'catasto_superficie',
        'catasto_rendita',
        'catasto_codcomune',
        'posti_auto',
        'imp_satellite',
        'imp_aria',
        'imp_allarme',
        'riscaldamento',
        'citofono',
        'ascensore',
        'pan_solari',
        'loggia',
        'veranda',
        'posto_auto',
        'pavimenti',
        'infissi',
        'facciata',
        'fabbricato',
        'unita_totali',
        'descrizione_immobile',
        'opere_rinnovi',
        'classe_energetica',
        'piano_ids',
        'piano',
        'ma_0',
        'ma_1',
        'ma_2',
        'ma_3',
        'mb_0',
        'mb_1',
        'mb_2',
        'mb_3',
        'mc_0',
        'mc_1',
        'mc_2',
        'mc_3',
        'md_0',
        'md_1',
        'md_2',
        'md_3',
        'me_0',
        'me_1',
        'me_2',
        'me_3',
        'mf_0',
        'mf_1',
        'mf_2',
        'mf_3',
        'mg_0',
        'mg_1',
        'mg_2',
        'mg_3',
        'mh_0',
        'mh_1',
        'mh_2',
        'mh_3',
        'mi_0',
        'mi_1',
        'mi_2',
        'mi_3',
        'ml_0',
        'ml_1',
        'ml_2',
        'ml_3',
        'mm_0',
        'mm_1',
        'mm_2',
        'mm_3',
        'mn_0',
        'mn_1',
        'mn_2',
        'mn_3',
        'mo_0',
        'mo_1',
        'mo_2',
        'mo_3',
        'mp_0',
        'mp_1',
        'mp_2',
        'mp_3',
        'mq_0',
        'mq_1',
        'mq_2',
        'mq_3',
        'mr_0',
        'mr_1',
        'mr_2',
        'mr_3',
        'ms_0',
        'ms_1',
        'ms_2',
        'ms_3',
        'mt_0',
        'mt_1',
        'mt_2',
        'mt_3',
        'mu_0',
        'mu_1',
        'mu_2',
        'mu_3',
        'mtotale_01',
        'mtotale_02',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function cliente()
    {
        return $this->belongsTo(AgentClient::class, 'cliente_id');
    }

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }

    public function tipologia_immobile()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_id');
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

    public function getFotoAttribute()
    {
        $files = $this->getMedia('foto');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }

    public function getPlanimetrieAttribute()
    {
        $files = $this->getMedia('planimetrie');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
