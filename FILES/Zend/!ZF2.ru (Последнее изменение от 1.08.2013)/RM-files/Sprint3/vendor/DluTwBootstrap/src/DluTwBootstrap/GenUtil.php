<?php
namespace DluTwBootstrap;

use DluTwBootstrap\Exception\InvalidParameterTypeException;
use DluTwBootstrap\Exception\InvalidParameterException;

/**
 * GenUtil
 * General Utilities
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class GenUtil
{
    /**
     * If missing in the text, adds the space separated words to the text and returns the text
     * Words are compared in case insensitive manner
     * @param string|array $words A single word, space separated words or an array of words
     * @param string $text
     * @throws Exception\InvalidParameterTypeException
     * @return string
     */
    public function addWords($words, $text)
    {
        $text   = (string)$text;
        if (is_null($words)) {
            $words  = '';
        }
        if (is_string($words)) {
            $words  = $this->getWordsArray($words);
        }
        if (!is_array($words)) {
            throw new InvalidParameterTypeException(sprintf("%s expects either a string or an array as the 'spec' parameter.", __METHOD__));
        }
        $currentWords       = $this->getWordsArray($text);
        $currentWordsLower  = $this->getWordsArray(strtolower($text));
        foreach ($words as $word) {
            $wordLower  = strtolower($word);
            if (!in_array($wordLower, $currentWordsLower)) {
                $currentWords[]         = $word;
                $currentWordsLower[]    = $wordLower;
            }
        }
        $text   = implode(' ', $currentWords);
        return $text;
    }

    /**
     * Adds space separated words to an array item, if the words are missing there
     * If the array item does not exist, creates it
     * Returns the resulting array
     * @param string|array $words A single word, space separated words or an array of words
     * @param array $ay
     * @param string $key
     * @return array
     */
    public function addWordsToArrayItem($words, array $ay, $key)
    {
        if (!array_key_exists($key, $ay)) {
            $ay[$key]   = '';
        }
        $text       = $ay[$key];
        $text       = $this->addWords($words, $text);
        $ay[$key]   = $text;
        return $ay;
    }

    /**
     * Breaks the submitted $words into individual words, escapes them with the escaper and returns space separated words
     * The spaces between words are NOT escaped
     * @param string $words
     * @param callable $escaper
     * @return string
     * @throws Exception\InvalidParameterException
     */
    public function escapeWords($words, $escaper)
    {
        if (!is_callable($escaper)) {
            throw new InvalidParameterException(sprintf('%s: The escaper must be a callable.', __METHOD__));
        }
        $wordsAy    = $this->getWordsArray($words);
        foreach ($wordsAy as $key => $word) {
            $wordsAy[$key]  = $escaper($word);
        }
        $words  = implode(' ', $wordsAy);
        return $words;
    }

    /**
     * Trims the parameter, replaces all whitespace characters with a single space and returns the resulting string
     * @param string $words
     * @return string
     * @throws Exception\InvalidParameterTypeException
     */
    public function singleSpace($words)
    {
        if (is_null($words)) {
            $words  = '';
        }
        if (!is_string($words)) {
            throw new InvalidParameterTypeException(sprintf('%s: Words parameter must be a string.', __METHOD__));
        }
        $words   = trim($words);
        $words   = preg_replace('/\s+/', ' ', $words);
        return $words;
    }

    /**
     * Breaks the $words string into individual words and returns them in an array
     * @param string $words
     * @return array
     */
    public function getWordsArray($words)
    {
        $words      = $this->singleSpace($words);
        if (empty($words)) {
            $wordsAy    = array();
        } else {
            $wordsAy    = explode(' ', $words);
        }
        return $wordsAy;
    }
}