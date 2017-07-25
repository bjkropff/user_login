<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/User.php";


    // $server = 'mysql:host=127.0.0.1:33067;dbtype=to_do';
    $server = 'mysql:host=localhost:33067;dbname=test_cred';
    $username = 'root';
    $DB = new PDO($server, $username);

    //,$password

    class UserTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            User::deleteAll();
        }



        function test_getName()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $test_user->setName("George");
            $name = $test_user->getName();

            //Assert
            $this->assertTrue($name == "George");
        }

        function test_getPass()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getPass();

            //Assert
            $this->assertEquals($pass, $result);
        }

        function test_setPass()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $test_user->setPass("dragon");
            $pass = $test_user->getPass();

            //Assert
            $this->assertTrue($pass == "dragon");
        }

        function test_getMail()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getMail();

            //Assert
            $this->assertEquals($mail, $result);
        }

        function test_setMail()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $test_user->setMail("george@geosomething.net");
            $mail = $test_user->getMail();

            //Assert
            $this->assertTrue($mail == "george@geosomething.net");
        }

        function test_getRole()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getRole();

            //Assert
            $this->assertEquals($role, $result);
        }

        function test_setRole()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            $isAdmin = false;

            //Act
            if (!$isAdmin) {
                $test_user->setRole(1);
                $isAdmin = true;
            }

            $role = $test_user->getRole();

            //Assert
              $this->assertEquals($role, $isAdmin);
        }

        function test_getStatus()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getStatus();

            //Assert
            $this->assertEquals($status, $result);
        }

        function test_setStatus()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            $isOnline = 0;

            //Act
            if ($status == 0) {
                $isOnline = 1;
                $test_user->setStatus(1);
            }
            $test_user->setStatus(1);
            $status = $test_user->getStatus();

            //Assert
            $this->assertEquals($isOnline, $status);
        }

        function test_getPicture()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $result = $test_user->getPicture();

            //Assert
            $this->assertEquals($picture, $result);
        }

        function test_setPicture()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $test_user->setPicture("mynewimage.png");
            $picture = $test_user->getPicture();

            //Assert
            $this->assertEquals($picture, "mynewimage.png");
        }

        function test_save()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);

            //Act
            $executed = $test_user->save();

            // Assert
            // assertTrue will return the string if false
            $this->assertTrue($executed, "Task not successfully saved to database");
        }

        function test_getId()
        {
            //Arrange
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);
            $test_user->save();
            //Act
            $result = $test_user->getId();

            //Assert
            $this->assertTrue(is_numeric($result) && $result !== false);
        }

        function test_getAll()
        {
            //Arrange first
            $name = "Fred";
            $pass = "1a2b3c";
            $mail = "user@place.com";
            $role = 0;
            $status = 0;
            $picture = "myimage.jpg";

            $test_user = new User($name, $pass, $mail, $role, $status, $picture);
            $executed = $test_user->save();

            //Arrange second
            $name0 = "Fred";
            $pass0 = "1a2b3c";
            $mail0 = "user@place.com";
            $role0 = 0;
            $status0 = 0;
            $picture0 = "myimage.jpg";

            $test_user0 = new User($name0, $pass0, $mail0, $role0, $status0, $picture0);
            $executed0 = $test_user0->save();

            //Act
            $result = User::getAll();

            // // $result = $test_user->getId();
            // //
            // //
            // $new_id = $result[0]->getId();
            // $test_user->id = $new_id;
            // $test_user0->id = $result[0]->getId();

            //Assert
            $this->assertEquals([$test_user, $test_user0], $result);
        }


    }
?>
