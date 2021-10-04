<?php

namespace Zhelyazlo777\Utilities;

trait Exportable
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $controlArr = [];
        $getters = array_filter(get_class_methods($this), fn ($m) => str_starts_with($m, 'get'));
        foreach ($getters as $getter)
        {
            $propName = lcfirst(preg_replace('/^get/', '', $getter));
            $getterName = 'get'.ucfirst($propName);
            $controlArr[$propName] = $this->{$getterName}();
        }

        return $controlArr;
    }
}
