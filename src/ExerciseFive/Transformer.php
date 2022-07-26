<?php

namespace CodeChallenge\ExerciseFive;

use SimpleXMLElement;
use Exception;

/**
 * Transform xml into string class
 */
class Transformer
{
    /**
     * transform xml list into propertyID => propertyType array
     * @param string $xml
     * 
     * @return array
     */
    public static function transform(string $xml): array
    {
        try {
            $parsedXML = new SimpleXMLElement($xml);
        } catch (Exception $e) {
            return [];
        }
        $parsedResult = [];
        foreach ($parsedXML as $propertyType => $propertyData) {
            if ($propertyData->uniqueID) {
                $parsedResult[(string) $propertyData->uniqueID] = $propertyType;
            }
        }
        return $parsedResult;
    }
}
