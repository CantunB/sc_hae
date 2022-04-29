<?php

namespace HAE;

use Dompdf\Dompdf;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
class Requisition extends Model
{
    protected $fillable = [
        'folio',
        'added_on',
        'management',
        'coordination_id',
        'department_id',
        'administrative_unit',
        'required_on',
        'issue',
        'remark',
        'dep_use'
    ];

    public  function asignado()
    {
        return $this->HasMany(AssignedRequisition::class);
    }
    public function area()
    {
        return $this->belongsToMany(AssignedUserAreas::class);
    }
    public function providers()
    {
        return $this->belongsTo(Quotesrequisitions::class);
    }

    public function requesteds()
    {
        return $this->belongsToMany(Requested::class, 'assigned_requesteds');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'assigned_requisitions');
    }

    public function compras()
    {
        return $this->hasMany( Purchase::class);
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class,'coordination_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }


    /** VERSION H.A.E correcciones, implementaciones y actualizaciones */

    /**
     * public static function total(): float{
     * return self::products()->sum(function(Product $product){
     *  return $product->total();
     * })}
     */

    /**
     * public static function qrCode(){
     *  $code = QrCode::format('png)->size(150)->generate('invoice-unique-code');
     *  return base64_encode($code);
     * }
     */

    public static function attributes($inBackground = false): array
    {
        return [
            'requesteds' => self::requesteds(),
            'inBackground' => $inBackground
        ];
    }

    public static function generatePdf($inBackground = false): PDF
    {
        return Dompdf::loadView('pdf.requisition_request', self::attributes($inBackground));
    }

    public static function download(): Response
    {
        $filename = self::filename();
        return self::generatePdf(true)->download($filename);
    }

    public static function outputAsBinary(): string
    {
        return self::generatePdf(true)->output();
    }

    public static function filename(){
        return "{$this->folio}" . ".pdf";
    }

}
