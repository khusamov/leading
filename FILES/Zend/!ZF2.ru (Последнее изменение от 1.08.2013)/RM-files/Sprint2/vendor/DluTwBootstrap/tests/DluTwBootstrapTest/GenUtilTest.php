<?php
namespace DluTwBootstrapTest;

use DluTwBootstrap\GenUtil;

use PHPUnit_Framework_TestCase as TestCase;

class GenUtilTest extends TestCase
{
    /**
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * @var string
     */
    protected $words        = "      one  two three\rfour\nfive\r\nsix\n\rseven\t  eight    nine \f ten    ";

    /**
     * @var string
     */
    protected $correct      = 'one two three four five six seven eight nine ten';

    public function setUp()
    {
        $this->genUtil  = new GenUtil();
    }

    public function testSingleSpace()
    {
        $singleSpaced   = $this->genUtil->singleSpace($this->words);
        $this->assertEquals($this->correct, $singleSpaced);
    }

    public function testGetWordsArray()
    {
        $correct    = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');
        $wordsArray = $this->genUtil->getWordsArray($this->words);
        $this->assertEquals($correct, $wordsArray);
    }

    public function testGetWordsArraySingleWord()
    {
        $word       = "       \t   \n   single       ";
        $correct    = array('single');
        $wordsAy    = $this->genUtil->getWordsArray($word);
        $this->assertEquals($correct, $wordsAy);
    }

    public function testGetWordsArrayFromEmptyString()
    {
        $correct    = array();
        $words      = '';
        $wordsAy    = $this->genUtil->getWordsArray($words);
        $this->assertEquals($correct, $wordsAy, 'Words is empty string.');
        $words      = null;
        $wordsAy    = $this->genUtil->getWordsArray($words);
        $this->assertEquals($correct, $wordsAy, 'Words is null.');
    }

    public function testAddWords()
    {
        $newWords           = "      alpha  three     six   beta \n gamma     nine \t\t    alpha   delta \r  ";
        $correct            = $this->correct . ' alpha beta gamma delta';
        $combined           = $this->genUtil->addWords($newWords, $this->words);
        $this->assertEquals($correct, $combined);
    }

    public function testAddWordsToNullText()
    {
        $newWords   = null;
        $text       = null;
        $combined   = $this->genUtil->addWords($newWords, $text);
        $this->assertEquals('', $combined);
    }

    public function testAddWordsToArrayItem()
    {
        $newWords   = "      alpha  three     six   beta \n gamma     nine \t\t    alpha   delta \r  ";
        $ay         = array(
            'a'         => 'foo',
            'my'        => $this->words,
            'b'         => 'bar',
        );
        $correct    = array(
            'a'         => 'foo',
            'my'        => $this->correct . ' alpha beta gamma delta',
            'b'         => 'bar',
        );
        $combined   = $this->genUtil->addWordsToArrayItem($newWords, $ay, 'my');
        $this->assertEquals($correct, $combined);
    }

    public function testEscapeWords()
    {
        $escaper    = new \Zend\View\Helper\EscapeHtmlAttr();
        $words      = "   \n  mon&day  tues<da>y     wed\"nesday thu'rsday    fri\\day     ";
        $correct    = 'mon&amp;day tues&lt;da&gt;y wed&quot;nesday thu&#x27;rsday fri&#x5C;day';
        $escaped    = $this->genUtil->escapeWords($words, $escaper);
        $this->assertEquals($correct, $escaped);
    }
}