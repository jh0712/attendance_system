<?php

namespace Modules\Translation\Traits;

use Illuminate\Support\Facades\DB;
use ReflectionClass;

trait Translatable
{
    /**
     *  Register Model observer.
     */
    public static function bootTranslatable()
    {
        static::observe(new TranslatableObserver());
    }

    /**
     *  Hijack parent's getAttribute to get the translation of the given field instead of its value.
     *
     *  @param  string  $key  Attribute name
     * @param mixed $attribute
     *
     *  @return mixed
     */
    public function getAttribute($attribute)
    {
        // Return the raw value of a translatable attribute if requested
        if ($this->rawValueRequested($attribute)) {
            $rawAttribute = snake_case(str_replace('raw', '', $attribute));

            return $this->attributes[$rawAttribute];
        }
        // Return the translation for the given attribute if available
        if ($this->isTranslated($attribute)) {
            return $this->translate($attribute);
        }
        // Return parent
        return parent::getAttribute($attribute);
    }

    /**
     *  Hijack Eloquent's setAttribute to create a Language Entry, or update the existing one, when setting the value of this attribute.
     *
     *  @param  string  $attribute    Attribute name
     *  @param  string  $value  text value in default locale
     */
    public function setAttribute($attribute, $value)
    {
        if ($this->isTranslatable($attribute) && !empty($value)) {
            $this->attributes["{$attribute}_translation"] = preg_replace('/_+/', ' ', trim($value));
        }

        return parent::setAttribute($attribute, $value);
    }

    /**
     *  Extend parent's attributesToArray so that _translation attributes do not appear in array, and translatable attributes are translated.
     *
     *  @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();

        foreach ($this->translatableAttributes as $translatableAttribute) {
            $slug = $attributes[$translatableAttribute];
            if (isset($attributes[$translatableAttribute])) {
                $attributes[$translatableAttribute] = $this->translate($translatableAttribute);
            }
            unset($attributes["{$translatableAttribute}_translation"]);
            $attributes["raw{$translatableAttribute}"] = $slug;
        }

        return $attributes;
    }

    /**
     *  Get the set translation code for the give attribute.
     *
     *  @param string $attribute
     *
     *  @return string
     */
    public function translationCodeFor($attribute)
    {
        return $this->getTranslatorPageName().'.'.array_get($this->attributes, "{$attribute}_translation", false);
    }

    /**
     *  Check if the attribute being queried is the raw value of a translatable attribute.
     *
     *  @param  string $attribute
     *
     *  @return bool
     */
    public function rawValueRequested($attribute)
    {
        if (0 === strrpos($attribute, 'raw')) {
            $rawAttribute = snake_case(str_replace('raw', '', $attribute));

            return $this->isTranslatable($rawAttribute);
        }

        return false;
    }

    /**
     * @param $attribute
     */
    public function getRawAttribute($attribute)
    {
        return array_get($this->attributes, $attribute, '');
    }

    /**
     *  Return the translation related to a translatable attribute.
     *
     *  @param  string $attribute
     *
     *  @return Translation
     */
    public function translate($attribute)
    {
        $translationCode = $this->translationCodeFor($attribute);
        $translation     = $translationCode ? __($translationCode) : false;

        return $translation ?: parent::getAttribute($attribute);
    }

    /**
     *  Check if an attribute is translatable.
     *
     * @param mixed $attribute
     *
     *  @return bool
     */
    public function isTranslatable($attribute)
    {
        return in_array($attribute, $this->translatableAttributes);
    }

    /**
     *  Check if a translation exists for the given attribute.
     *
     *  @param  string $attribute
     *
     *  @return bool
     */
    public function isTranslated($attribute)
    {
        return $this->isTranslatable($attribute) && isset($this->attributes["{$attribute}_translation"]);
    }

    /**
     *  Return the translatable attributes array.
     *
     *  @return  array
     */
    public function translatableAttributes()
    {
        return $this->translatableAttributes;
    }

    public function getTranslatorPageName()
    {
        return strtolower('s_'.$this->getTable());
    }

    public static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }
    public function scopeSetTranslateKey($query){
        //DB::raw("REPLACE(" . DB::raw('concat("' . $fundMethodName . '")') . ", ':name', fund_methods.name) as fund_method_name"),
        //$statusName       = "s_deposit_statuses.:name";
        $select_columns = $query->getQuery()->columns;
        $translate_key = [];
        foreach ($this->translatableAttributes as $value){
            $translate_key =$this->getTranslatorPageName().'.:'.$value;
            //search name_translation and remove
            $translate_attribute_key =  array_search($this->getTable().'.'.$value.'_translation',$select_columns)?:array_search($value.'_translation',$select_columns);
            if($translate_attribute_key){
                unset($select_columns[$translate_attribute_key]);
            }
            //search name and replace name_raw
            $p_t = array_search($this->getTable().'.'.$value,$select_columns)?:array_search($value,$select_columns);
            if($p_t){
                $select_columns[$p_t]=$this->getTable().'.'.$value.' as '.$value .'_raw';
            }
            $select_columns[] =DB::raw("REPLACE(" . 'concat("' . $translate_key . '")' . ", ':".$value."', ".$this->getTable().'.'.$value.") as ".$value);
        }
        return $query->select($select_columns);
    }
}
