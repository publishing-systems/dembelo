<?php

/* Copyright (C) 2015 Michael Giesler
 *
 * This file is part of Dembelo.
 *
 * Dembelo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Dembelo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License 3 for more details.
 *
 * You should have received a copy of the GNU Affero General Public License 3
 * along with Dembelo. If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * @package DembeloMain
 */

namespace DembeloMain\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use DembeloMain\Controller\UserController;

/**
 * Class DefaultControllerTest
 */
class UserControllerTest extends WebTestCase
{
    /**
     * tests for http status code and html content
     */
    public function testLoginRoute()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Einloggen")')->count() > 0);
    }

    /**
     * tests the loginAction
     */
    public function testLoginAction()
    {
        $formView = 'formView';
        $authErr = 'authErr';
        $loginUrl = '/login';

        $mock = $this->getMockBuilder('foobar')
            ->setMethods(array('get', 'getLastAuthenticationError', 'getLastUsername', 'createBuilder', 'setAction', 'generate', 'add', 'getForm', 'createView', 'renderResponse'))
            ->getMock();
        $container = $this->getMock("Symfony\Component\DependencyInjection\ContainerInterface");
        $container->expects($this->any())
            ->method("get")
            ->will($this->returnValue($mock));
        $mock->expects($this->any())
            ->method('createBuilder')
            ->with('form', $this->isInstanceOf('DembeloMain\Document\User'))
            ->will($this->returnSelf());
        $mock->expects($this->any())
            ->method('setAction')
            ->with($loginUrl)
            ->will($this->returnSelf());
        $mock->expects($this->any())
            ->method('add')
            ->will($this->returnSelf());
        $mock->expects($this->any())
            ->method('getForm')
            ->will($this->returnSelf());
        $mock->expects($this->once())
            ->method('createView')
            ->will($this->returnValue($formView));
        $mock->expects($this->once())
            ->method('getLastAuthenticationError')
            ->will($this->returnValue($authErr));
        $mock->expects($this->once())
            ->method('renderResponse')
            ->with('user/login.html.twig', array('error' => $authErr, 'form' => $formView));
        $mock->expects($this->once())
            ->method('generate')
            ->will($this->returnValue($loginUrl));

        $controller = new UserController();
        $controller->setContainer($container);
        $controller->loginAction();

    }

    /**
     * tests the loginCheck action
     */
    public function testLoginCheckAction()
    {
        $client = static::createClient();
        $client->request('GET', '/login_check');
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
    }

    /**
     * tests the registerAction http status code
     */
    public function testRegisterActionHttpStatusCode()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Registrierungsformular")')->count() > 0);
    }

    /**
     * tests the registerAction response
     */
    public function testRegisterActionResponse()
    {
        $mock = $this->getMockBuilder('foobar')
            ->setMethods(array('get', 'renderResponse'))
            ->getMock();
        $container = $this->getMock("Symfony\Component\DependencyInjection\ContainerInterface");
        $container->expects($this->any())
            ->method("get")
            ->will($this->returnValue($mock));
        $mock->expects($this->once())
            ->method('renderResponse')
            ->with('user/register.html.twig', array());

        $controller = new UserController();
        $controller->setContainer($container);
        $controller->registerAction();
    }
}
