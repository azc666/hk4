<?php

namespace App;

class Phone
{
    /////////// Format Phone Number to "123.123.1234" ///////////////////////////
    public static function phoneNumber($numb) {
      // $numb = $request->phone;
      // dd($request->phone);  
      if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) { return $numb; }
     
      $chars = array(' ', '(', ')', '-', '.');
      $numb = str_replace($chars, "", $numb);
      
      if (strlen($numb) > 10 && substr($numb, 0, 1) == "+" && substr($numb, 0, 3) == "+57") {
        // an Columbia number, format as +01.5.555.5555
        $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 1) . '.' . substr($numb, 4, 3) . '.' . substr($numb, 7, 4);
        //$numb = "uhoh";
      }
       elseif (strlen($numb) > 10 && substr($numb, 0, 1) == "+") {
        // an international number, format as +01.55.5555.5555
        $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 2) . '.' . substr($numb, 5, 4) . '.' . substr($numb, 9, 4);
        //$numb = "uhoh";
      }
      elseif (strlen($numb) > 10 && substr($numb, 0, 1) != "+") {
        // a 10 digit number, format as 1.800.555.5555
        $numb = substr($numb, 0, 1) . '.' . substr($numb, 1, 3) . '.' . substr($numb, 4, 3) . '.' . substr($numb, 7, 4);
      }
      else {
        $numb = '(' . substr($numb, 0, 3) . ') ' . substr($numb, 3, 3) . '-' . substr($numb, 6, 4);
      }
     // dd($numb);
      return $numb;
    }
}
