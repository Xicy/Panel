<?php

namespace App\Http\Controllers;

use Orbitali\Foundations\Orbitali;
use Orbitali\Http\Traits\FormSubmission;

class TestController extends Controller
{
    use FormSubmission;

    public function pageDetails(Orbitali $orb)
    {
        /* Orbitali::macro("groupExpander",function ($name,$relation,$keys){
            $this->$name = groupExpander($relation,$keys);
         });

         $orb->groupExpander('galary',$orb->relation, ['icon', 'title', 'detail']);
         dd($orb);*/
        return response("
       <form action='#' method='post'>
            <input type='hidden' name='form_key' value='test_form'/>
            <input type='text' name='test'/>
       </form>
       ");
    }


}
