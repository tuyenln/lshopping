<?php
namespace App\Components;

class Recusive {

    private $data;
    private $htmlSelector = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($parentId , $id = 0 , $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id'] ) {
                    $this->htmlSelector .= "<option selected value='" .$value['id']."'>" . $text . $value['name'] ."</option>";
                } else {
                    $this->htmlSelector .= "<option value='" .$value['id']."'>" . $text . $value['name'] ."</option>";
                }

                $this->categoryRecusive($parentId , $value['id'], $text. '--');
            }
        }
        return $this->htmlSelector;
    }

}