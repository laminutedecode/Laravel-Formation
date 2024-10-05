<?php 


return [
  'required'=>'le champ :attribute est obligatoire',
  'email'=>'l :attribute e-mail est obligatoire',
  'max'=> [
    'string'=>'L :attribute ne peut pas dépasser :max caracteres',
  ],
  'min'=> [
    'string'=>'L :attribute ne peut pas faire moins de :min caracteres',
  ],
  'attributes'=> [
    'name'=>'nom',
    'email'=>'email',
  ],
];