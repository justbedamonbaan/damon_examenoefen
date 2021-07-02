<?php
    class Database {
        private $dbh;
        public function __construct()   {
            try {
                $dsn = "mysql:host=localhost;dbname=examenoefen;charset=utf8";
                $this->dbh = new PDO($dsn, "root", "");
            } catch (PDOException $exception) {
                exit('unable to connect. Error message: ' . $exception->getMessage());
            }

        }

    public function create_users() {
            $admin_hashed_password = password_hash('admin', PASSWORD_DEFAULT);
            $user2_hashed_password = password_hash('dummy', PASSWORD_DEFAULT);
            $user3_hashed_password = password_hash('test', PASSWORD_DEFAULT);
            $user4_hashed_password = password_hash('testes', PASSWORD_DEFAULT);
            $sql ='INSERT INTO user VALUES 
                (NULL, :first_name, :last_name, :phone_number, :email, :password, :is_admin1, :created_at, NULL),
                (NULL, :first_name2, :last_name2, :phone_number2, :email2, :password2, :is_admin2, :created_at, NULL),
                (NULL, :first_name3, :last_name3, :phone_number3, :email3, :password3, :is_admin2, :created_at, NULL),
                (NULL, :first_name4, :last_name4, :phone_number4, :email4, :password4, :is_admin2, :created_at, NULL)';

            $statement = $this->dbh->prepare($sql);

            $statement->execute([
                'first_name' => 'admin',
                'last_name' => 'mummy',
                'phone_number' => '0612345678',
                'email' => 'admin@hotmail.nl',
                'password' => $admin_hashed_password,
                'is_admin1' => 1,
                'created_at' => date('Y-m-d H:i:S'),

                'first_name2' => 'dummy',
                'last_name2' => 'mummy',
                'phone_number2' => '0643434343',
                'email2' => 'dummy@hotmail.nl',
                'password2' => $user2_hashed_password,
                'is_admin2' => 0,

                'first_name3' => 'boopus',
                'last_name3' => 'moopus',
                'phone_number3' => '0612121212',
                'email3' => 'boopus@hotmail.nl',
                'password3' => $user3_hashed_password,

                'first_name4' => 'joe',
                'last_name4' => 'mama',
                'phone_number4' => '0642069666',
                'email4' => 'joe@hotmail.nl',
                'password4' => $user4_hashed_password,

            ]);
    }






    }