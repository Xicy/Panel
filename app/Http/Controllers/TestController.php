<?php

namespace App\Http\Controllers;

use Orbitali\Foundations\Orbitali;

class TestController extends Controller
{
    public function nodeDetails(Orbitali $orb)
    {
        $orb->relation->icon = ["icon-a", "icon-b", "icon-c"];
        $orb->relation->title = ["title-a", "title-b", "title-c"];
        $orb->relation->detail = ["detail-a", "detail-b", "detail-c"];
        groupExpander($orb->relation, ['icon', 'title', 'detail']);
    }


}
