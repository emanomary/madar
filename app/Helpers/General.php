<?php

/**
 * get all object with childs in create blade
 * @param $objects
 * @param $counter
 * @param $char
 */
function subRecursion($objects, $counter, $char){

    foreach($objects as $object){
            $space = "";
            $style= "";
            $temp=$counter;
            while($temp>0){
                $space.="&nbsp&nbsp&nbsp";
                $style.= $char;
                $temp--;
            }
            if(isset($object->id))
            {
                if($object->child->count() >0)
                {
                    echo '<option value="'.$object->id.'" style="font-weight:bold;">'. $space . $style . $space.
                        $object->name . '</option>';
                }
                else
                {
                    echo '<option value="'.$object->id.'"style="font-weight:bold;">'. $space . $style . $space .
                        $object->name . '</option>';
                }

            }
            if (isset($object->child)) {
                subRecursion($object->child, $counter + 1, $char);
            }
        }
}

function subRecursionForEdit($objects, $counter, $char,$object)
{
    foreach ($objects as $obj)
    {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected='selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }

        if(isset($obj->id))
        {
            if (isset($obj->child))
            {
                echo '<option value="'.$obj->id.'"'.($object->id==$obj->id? $selected:"").'> ' . $space . $style .
                    $obj->name . '</option>';
                subRecursionForEdit($obj->child, $counter + 1, $char,$object);
            }
            else{
                echo '<option value="'.$obj->id.'"'.($object->id==$obj->id? $selected:"").'> ' . $space . $style .
                    $obj->name . '</option>';
            }
            /*echo '<option value="'.$obj->id.'"'.($object->id==$obj->id? $selected:"").'> ' . $space . $style .
                $obj->name . '</option>';*/
        }
        /*if (isset($obj->childs)) {
            subRecursionForEdit($obj->childs, $counter + 1, $char,$object);
        }*/
    }
}

function subRecursionForNews($objects, $counter, $char){

    foreach($objects as $object){
        $space = "";
        $style= "";
        $temp=$counter;
        while($temp>0){
            $space.="&nbsp&nbsp&nbsp";
            $style.= $char;
            $temp--;
        }
        if(isset($object->id))
        {
            if($object->child->count() >0)
            {
                echo '<option value="'.$object->id.'" disabled style="font-weight:bold;"'
                    .(old('category_id') == $object->id ? "selected" : ""). '>'
                    . $space . $style . $space.
                    $object->name . '</option>';
            }
            else
            {
                echo '<option value="'.$object->id.'" style="font-weight:bold;"'
                    .(old('category_id') == $object->id ? "selected" : "").'>'. $space . $style . $space .
                    $object->name . '</option>';
            }

        }
        if (isset($object->child)) {
            subRecursion($object->child, $counter + 1, $char);
        }
    }
}


function subRecursionForEditNews($objects, $counter, $char,$obj){

    foreach($objects as $object){
        $space = "";
        $style= "";
        $temp=$counter;
        while($temp>0){
            $space.="&nbsp&nbsp&nbsp";
            $style.= $char;
            $temp--;
        }
        if(isset($object->id))
        {
            if (isset($obj->child))
            {
                echo '<option value="'.$object->id.'" disabled style="font-weight:bold;"'
                    .($object->id==$obj->id? "selected":""). '>'
                    . $space . $style . $space.
                    $object->name . '</option>';
                subRecursionForEditNews($obj->child, $counter + 1, $char,$obj);

            }
            else
            {
                echo '<option value="'.$object->id.'" style="font-weight:bold;"'
                    .($object->id==$obj->id? "selected":"").'>'. $space . $style . $space .
                    $object->name . '</option>';
            }
        }
    }
}

