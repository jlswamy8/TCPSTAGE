<?php
/**
 * Generated by build/gen_test
 */
require_once('src/lightncandy.php');

class LCRun3Test extends PHPUnit_Framework_TestCase
{
    /**
     * @covers LCRun3::debug
     */
    public function testOn_debug() {
        $method = new ReflectionMethod('LCRun3', 'debug');
        $this->assertEquals('{{123}}', $method->invokeArgs(null,array(
            '123', 'miss', array('flags' => array('debug' => LCRun3::DEBUG_TAGS), 'lcrun' => 'LCRun3'), ''
)        ));
        $this->assertEquals('<!--MISSED((-->{{#123}}<!--))--><!--SKIPPED--><!--MISSED((-->{{/123}}<!--))-->', $method->invokeArgs(null,array(
            '123', 'wi', array('flags' => array('debug' => LCRun3::DEBUG_TAGS_HTML), 'lcrun' => 'LCRun3'), false, false, function () {return 'A';}
)        ));
    }
    /**
     * @covers LCRun3::v
     */
    public function testOn_v() {
        $method = new ReflectionMethod('LCRun3', 'v');
        $this->assertEquals(null, $method->invokeArgs(null,array(
            array('scopes' => array(), 'flags' => array('prop' => 0, 'method' => 0, 'mustlok' => 0)), 0, array('a', 'b')
)        ));
        $this->assertEquals(3, $method->invokeArgs(null,array(
            array('scopes' => array(), 'flags' => array('prop' => 0, 'method' => 0), 'mustlok' => 0), array('a' => array('b' => 3)), array('a', 'b')
)        ));
        $this->assertEquals(null, $method->invokeArgs(null,array(
            array('scopes' => array(), 'flags' => array('prop' => 0, 'method' => 0, 'mustlok' => 0)), (Object) array('a' => array('b' => 3)), array('a', 'b')
)        ));
        $this->assertEquals(3, $method->invokeArgs(null,array(
            array('scopes' => array(), 'flags' => array('prop' => 1, 'method' => 0, 'mustlok' => 0)), (Object) array('a' => array('b' => 3)), array('a', 'b')
)        ));
    }
    /**
     * @covers LCRun3::ifvar
     */
    public function testOn_ifvar() {
        $method = new ReflectionMethod('LCRun3', 'ifvar');
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), null
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), 0
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), false
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), true
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), 1
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), ''
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), array()
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), array('')
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), array(0)
)        ));
    }
    /**
     * @covers LCRun3::ifv
     */
    public function testOn_ifv() {
        $method = new ReflectionMethod('LCRun3', 'ifv');
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), null
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), function () {return 'Y';}
)        ));
        $this->assertEquals('Y', $method->invokeArgs(null,array(
            array('scopes' => array()), 1, array(), function () {return 'Y';}
)        ));
        $this->assertEquals('N', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), function () {return 'Y';}, function () {return 'N';}
)        ));
    }
    /**
     * @covers LCRun3::unl
     */
    public function testOn_unl() {
        $method = new ReflectionMethod('LCRun3', 'unl');
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), null
)        ));
        $this->assertEquals('Y', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), function () {return 'Y';}
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('scopes' => array()), 1, array(), function () {return 'Y';}
)        ));
        $this->assertEquals('Y', $method->invokeArgs(null,array(
            array('scopes' => array()), null, array(), function () {return 'Y';}, function () {return 'N';}
)        ));
        $this->assertEquals('N', $method->invokeArgs(null,array(
            array('scopes' => array()), true, array(), function () {return 'Y';}, function () {return 'N';}
)        ));
    }
    /**
     * @covers LCRun3::isec
     */
    public function testOn_isec() {
        $method = new ReflectionMethod('LCRun3', 'isec');
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), null
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), 0
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), false
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), 'false'
)        ));
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array(), array()
)        ));
        $this->assertEquals(false, $method->invokeArgs(null,array(
            array(), array('1')
)        ));
    }
    /**
     * @covers LCRun3::raw
     */
    public function testOn_raw() {
        $method = new ReflectionMethod('LCRun3', 'raw');
        $this->assertEquals(true, $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 0)), true
)        ));
        $this->assertEquals('true', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1)), true
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 0)), false
)        ));
        $this->assertEquals('false', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1)), false
)        ));
        $this->assertEquals('false', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1)), false, true
)        ));
        $this->assertEquals('Array', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 0)), array('a', 'b')
)        ));
        $this->assertEquals('a,b', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 1)), array('a', 'b')
)        ));
        $this->assertEquals('[object Object]', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 1)), array('a', 'c' => 'b')
)        ));
        $this->assertEquals('[object Object]', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 1)), array('c' => 'b')
)        ));
        $this->assertEquals('a,true', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 1)), array('a', true)
)        ));
        $this->assertEquals('a,1', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 0, 'jsobj' => 1)), array('a',true)
)        ));
        $this->assertEquals('a,', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 0, 'jsobj' => 1)), array('a',false)
)        ));
        $this->assertEquals('a,false', $method->invokeArgs(null,array(
            array('flags' => array('jstrue' => 1, 'jsobj' => 1)), array('a',false)
)        ));
    }
    /**
     * @covers LCRun3::enc
     */
    public function testOn_enc() {
        $method = new ReflectionMethod('LCRun3', 'enc');
        $this->assertEquals('a', $method->invokeArgs(null,array(
            array(), 'a'
)        ));
        $this->assertEquals('a&amp;b', $method->invokeArgs(null,array(
            array(), 'a&b'
)        ));
        $this->assertEquals('a&#039;b', $method->invokeArgs(null,array(
            array(), 'a\'b'
)        ));
    }
    /**
     * @covers LCRun3::encq
     */
    public function testOn_encq() {
        $method = new ReflectionMethod('LCRun3', 'encq');
        $this->assertEquals('a', $method->invokeArgs(null,array(
            array(), 'a'
)        ));
        $this->assertEquals('a&amp;b', $method->invokeArgs(null,array(
            array(), 'a&b'
)        ));
        $this->assertEquals('a&#x27;b', $method->invokeArgs(null,array(
            array(), 'a\'b'
)        ));
        $this->assertEquals('&#x60;a&#x27;b', $method->invokeArgs(null,array(
            array(), '`a\'b'
)        ));
    }
    /**
     * @covers LCRun3::sec
     */
    public function testOn_sec() {
        $method = new ReflectionMethod('LCRun3', 'sec');
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), false, false, false, function () {return 'A';}
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), null, null, false, function () {return 'A';}
)        ));
        $this->assertEquals('A', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), true, true, false, function () {return 'A';}
)        ));
        $this->assertEquals('A', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 0, 0, false, function () {return 'A';}
)        ));
        $this->assertEquals('-a=', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array('a'), array('a'), false, function ($c, $i) {return "-$i=";}
)        ));
        $this->assertEquals('-a=-b=', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array('a','b'), array('a','b'), false, function ($c, $i) {return "-$i=";}
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 'abc', 'abc', true, function ($c, $i) {return "-$i=";}
)        ));
        $this->assertEquals('-b=', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array('a' => 'b'), array('a' => 'b'), true, function ($c, $i) {return "-$i=";}
)        ));
        $this->assertEquals('1', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 'b', 'b', false, function ($c, $i) {return count($i);}
)        ));
        $this->assertEquals('1', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 1, 1, false, function ($c, $i) {return print_r($i, true);}
)        ));
        $this->assertEquals('0', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 0, 0, false, function ($c, $i) {return print_r($i, true);}
)        ));
        $this->assertEquals('{"b":"c"}', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array('b' => 'c'), array('b' => 'c'), false, function ($c, $i) {return json_encode($i);}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array(), 0, true, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), array(), 0, false, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), false, 0, true, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), false, 0, false, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), '', 0, true, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('cb', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), '', 0, false, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 0, 0, true, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('cb', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), 0, 0, false, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('inv', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), new stdClass, 0, true, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('cb', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 0)), new stdClass, 0, false, function ($c, $i) {return 'cb';}, function ($c, $i) {return 'inv';}
)        ));
        $this->assertEquals('268', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 1), 'sp_vars'=>array('root' => 0)), array(1,3,4), 0, false, function ($c, $i) {return $i * 2;}
)        ));
        $this->assertEquals('038', $method->invokeArgs(null,array(
            array('flags' => array('spvar' => 1), 'sp_vars'=>array('root' => 0)), array(1,3,'a'=>4), 0, true, function ($c, $i) {return $i * $c['sp_vars']['index'];}
)        ));
    }
    /**
     * @covers LCRun3::wi
     */
    public function testOn_wi() {
        $method = new ReflectionMethod('LCRun3', 'wi');
        $this->assertEquals('', $method->invokeArgs(null,array(
            array(), false, false, function () {return 'A';}
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array(), null, null, function () {return 'A';}
)        ));
        $this->assertEquals('{"a":"b"}', $method->invokeArgs(null,array(
            array(), array('a'=>'b'), array('a'=>'c'), function ($c, $i) {return json_encode($i);}
)        ));
        $this->assertEquals('-b=', $method->invokeArgs(null,array(
            array(), 'b', array('a'=>'b'), function ($c, $i) {return "-$i=";}
)        ));
    }
    /**
     * @covers LCRun3::ch
     */
    public function testOn_ch() {
        $method = new ReflectionMethod('LCRun3', 'ch');
        $this->assertEquals('=-=', $method->invokeArgs(null,array(
            array('helpers' => array('a' => function ($i) {return "=$i[0]=";})), 'a', array(array('-'),array()), 'raw'
)        ));
        $this->assertEquals('=&amp;=', $method->invokeArgs(null,array(
            array('helpers' => array('a' => function ($i) {return "=$i[0]=";})), 'a', array(array('&'),array()), 'enc'
)        ));
        $this->assertEquals('=&#x27;=', $method->invokeArgs(null,array(
            array('helpers' => array('a' => function ($i) {return "=$i[0]=";})), 'a', array(array('\''),array()), 'encq'
)        ));
        $this->assertEquals('=b=', $method->invokeArgs(null,array(
            array('helpers' => array('a' => function ($i,$j) {return "={$j['a']}=";})), 'a', array(array(),array('a' => 'b')), 'raw'
)        ));
    }
    /**
     * @covers LCRun3::chret
     */
    public function testOn_chret() {
        $method = new ReflectionMethod('LCRun3', 'chret');
        $this->assertEquals('=&=', $method->invokeArgs(null,array(
            '=&=', 'raw'
)        ));
        $this->assertEquals('=&amp;&#039;=', $method->invokeArgs(null,array(
            '=&\'=', 'enc'
)        ));
        $this->assertEquals('=&amp;&#x27;=', $method->invokeArgs(null,array(
            '=&\'=', 'encq'
)        ));
        $this->assertEquals('=&amp;&#039;=', $method->invokeArgs(null,array(
            array('=&\'='), 'enc'
)        ));
        $this->assertEquals('=&amp;&#x27;=', $method->invokeArgs(null,array(
            array('=&\'='), 'encq'
)        ));
        $this->assertEquals('=&amp;=', $method->invokeArgs(null,array(
            array('=&=', false), 'enc'
)        ));
        $this->assertEquals('=&=', $method->invokeArgs(null,array(
            array('=&=', false), 'raw'
)        ));
        $this->assertEquals('=&=', $method->invokeArgs(null,array(
            array('=&=', 'raw'), 'enc'
)        ));
        $this->assertEquals('=&amp;&#x27;=', $method->invokeArgs(null,array(
            array('=&\'=', 'encq'), 'raw'
)        ));
    }
    /**
     * @covers LCRun3::bch
     */
    public function testOn_bch() {
        $method = new ReflectionMethod('LCRun3', 'bch');
        $this->assertEquals('4.2.3', $method->invokeArgs(null,array(
            array('blockhelpers' => array('a' => function ($cx) {return array($cx,2,3);})), 'a', array(0, 0), 4, false, function($cx, $i) {return implode('.', $i);}
)        ));
        $this->assertEquals('2.6.5', $method->invokeArgs(null,array(
            array('blockhelpers' => array('a' => function ($cx,$in) {return array($cx,$in[0],5);})), 'a', array('6', 0), 2, false, function($cx, $i) {return implode('.', $i);}
)        ));
        $this->assertEquals('', $method->invokeArgs(null,array(
            array('blockhelpers' => array('a' => function ($cx,$in) {})), 'a', array('6', 0), 2, false, function($cx, $i) {return implode('.', $i);}
)        ));
    }
}
?>