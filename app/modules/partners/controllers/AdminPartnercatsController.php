<?php namespace App\Modules\Partners\Controllers;

use App\Modules\Partners\Models\Partnercat;
use Hover, BackController;

class AdminPartnercatsController extends BackController {

    protected $icon = 'coins.png';

    public function __construct()
    {
        $this->modelName = 'Partnercat';

        parent::__construct();
    }

    public function index()
    {
        $this->indexPage([
            'tableHead' => [
                trans('app.id')     => 'id', 
                trans('app.title')  => 'title'
            ],
            'tableRow' => function($partnercat)
            {
                Hover::modelAttributes($partnercat, ['creator']);

                return [
                    $partnercat->id,
                    Hover::pull().$partnercat->title
                ];
            }
        ]);
    }

}