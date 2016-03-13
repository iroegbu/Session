<?php
/**
 * Project: Session.
 * User:    Iroegbu
 */

namespace Test\Unit\Storage;


use Session\Storage\NativeSession;

class NativeSessionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers Session\Storage\NativeSession::__construct
     */
    public function testImplementsCorrectInterface()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot send session cookie - headers already sent/'
        );

        $this->assertInstanceOf('Session\Session', new NativeSession('/', '.example.com', true));
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::exists
     */
    public function testExistsWithoutSet()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $this->assertFalse((new NativeSession('/', '.example.com', true))->exists('check'));
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::exists
     */
    public function testExistsWithSet()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $session = new NativeSession('/', '.example.com', true);
        $session->set('check', 'foo');

        $this->assertTrue($session->exists('check'));
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::get
     */
    public function testGetWithoutSet()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $this->getExpectedException('Session\Exceptions\OutOfBoundsException');
        (new NativeSession('/', '.example.com', true))->get('check');
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::get
     */
    public function testSet()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $session = new NativeSession('/', '.example.com', true);
        $this->assertNull($session->set('check', 'foo'));
        $this->assertSame('foo', $session->get('check'));
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::remove
     */
    public function testRemove()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $session = new NativeSession('/', '.example.com', true);
        $session->set('check', 'foo');
        $this->assertNull($session->remove('check'));
    }

    /**
     * @covers Session\Storage\NativeSession::__construct
     * @covers Session\Storage\NativeSession::destroy
     */
    public function testDestroy()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Notice',
            '/A session had already been started/'
        );

        $session = new NativeSession('/', '.example.com', true);
        $this->assertNull($session->destroy());
    }
}
