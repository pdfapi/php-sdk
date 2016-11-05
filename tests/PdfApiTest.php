<?php
/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 14:11
 */

namespace PdfApi\Tests;

use PdfApi\Parameter\Enum\Orientation;
use PdfApi\Parameter\Enum\Size;
use PdfApi\PdfApi;

class FacebookTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PdfApi
     */
    private $api;

    public function setUp()
    {
        $this->api = new PdfApi('apiKey');
    }

    public function testCanCreateNewInstance()
    {
        $this->assertInstanceOf(PdfApi::class, $this->api);
    }

    public function testCanSetContent()
    {
        $contents = 'contents';
        $this->api->setContents($contents);
        $this->assertEquals($contents, $this->api->getParameters()['html']);
    }

    public function testCanSetHtml()
    {
        $contents = 'contents';
        $this->api->setHtml($contents);
        $this->assertEquals($contents, $this->api->getParameters()['html']);
    }

    public function testCanSetHeader()
    {
        $contents = 'contents';
        $this->api->setHeader($contents);
        $this->assertEquals($contents, $this->api->getParameters()['header']);
    }

    public function testCanSetFooter()
    {
        $contents = 'contents';
        $this->api->setFooter($contents);
        $this->assertEquals($contents, $this->api->getParameters()['footer']);
    }

    public function testCanSetOrientation()
    {
        $contents = Orientation::Landscape;
        $this->api->setOrientation($contents);
        $this->assertEquals($contents, $this->api->getParameters()['orientation']);
    }

    /**
     * @expectedException \PdfApi\Exception\InvalidParameterValueException
     */
    public function testWrongOrientationThrowsException()
    {
        $this->api->setOrientation('Diagonal');
    }

    public function testCanSetSize()
    {
        $contents = Size::A4;
        $this->api->setSize($contents);
        $this->assertEquals($contents, $this->api->getParameters()['size']);
    }

    /**
     * @expectedException \PdfApi\Exception\InvalidParameterValueException
     */
    public function testWrongSizeThrowsException()
    {
        $this->api->setSize('C1234');
    }

    public function canSetParameters()
    {
        $this->api->setParameters([
            'margins' => [
                'top' => 10,
                'right' => 11,
                'bottom' => 12,
                'left' => 13,
            ],
            'header' => '<html>',
            'footer' => '<html>',
            'html' => '<html>'
        ]);

        $this->assertEquals('<html>', $this->api->getParameters()['html']);
        $this->assertEquals('<html>', $this->api->getParameters()['header']);
        $this->assertEquals('<html>', $this->api->getParameters()['footer']);

        $this->assertEquals(10, $this->api->getParameters()['margins']['top']);
        $this->assertEquals(11, $this->api->getParameters()['margins']['right']);
        $this->assertEquals(12, $this->api->getParameters()['margins']['bottom']);
        $this->assertEquals(13, $this->api->getParameters()['margins']['left']);
    }
}