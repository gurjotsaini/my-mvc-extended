<?php
    /**
     * Created by User: gurjot
     */

    class User
    {
        private $db;

        /**
         * User constructor.
         */
        public function __construct () {
            // Initialize PDO Class
            $this->db = new Database();
        }

        /**
         * Find user by email
         *
         * @param $email
         * @return bool
         */
        public function findUserByEmail( $email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            // Storing data in the variable
            $row = $this->db->single();

            // Checking row & returning true or false
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } // end of findUserByEmail method

        public function register($data) {
            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

            // Binding values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Executing query & returning true or false
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } // end of register method

        public function login($email, $password) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            // Storing data in the variable
            $row = $this->db->single();

            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
    }