<?php
    class User
    {
        private $name;
        private $id;

        function __construct($name, $pass, $mail, $role, $status, $picture, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
            $this->pass = $pass;
            $this->mail = $mail;
            $this->role = $role;
            $this->status = $status;
            $this->picture = $picture;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM users;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setPass($new_pass)
        {
            $this->pass = (string) $new_pass;
        }

        function getPass()
        {
            return $this->pass;
        }

        function getId()
        {
            return $this->id;
        }

        function getMail()
        {
            return $this->mail;
        }

        function setMail($new_mail)
        {
            $this->mail = (string) $new_mail;
        }

        function getRole()
        {
            return $this->role;
        }

        function setRole($new_role)
        {
            $this->role = (int) $new_role;
        }

        function getStatus()
        {
            return $this->status;
        }

        function setStatus($new_status)
        {
            $this->status = (string) $new_status;
        }

        function getPicture()
        {
            return $this->picture;
        }

        function setPicture($new_picture)
        {
            $this->picture = (string) $new_picture;
        }

        function save()
        {
          //CREATE TABLE users (id serial PRIMARY KEY, name VARCHAR(60), pass VARCHAR(128), mail VARCHAR(254), role VARCHAR(64), status TINYINT(1), picture VARCHAR(1024));
            $executed = $GLOBALS['DB']->exec("INSERT INTO users (name, pass, mail, role, status, picture)
                VALUES ('{$this->getName()}',
                        '{$this->getPass()}',
                        '{$this->getMail()}',
                        '{$this->getRole()}',
                        '{$this->getStatus()}',
                        '{$this->getPicture()}')
                      ;");
            if ($executed) {
                  $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_users = $GLOBALS['DB']->query("SELECT * FROM users;");
            $users = array();
            foreach($returned_users as $user) {
                $name = $user['name'];
                $id = $user['id'];
                $pass = $user['pass'];
                $mail = $user['mail'];
                $role = intval($user['role']);
                $status = intval($user['status']);
                $picture = $user['picture'];

                $test_user = new User($name, $pass, $mail, $role, $status, $picture);

                array_push($users, $test_user);
            }
            return $users;
        }

    }
?>
