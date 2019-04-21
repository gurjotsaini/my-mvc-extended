<?php
    /**
     * Created by User: gurjot
     */

    class Post
    {
        private  $db;

        /**
         * Post constructor.
         */
        public function __construct () {
            $this->db = new Database();
        } // end of construct method

        /**
         * @return all
         */
        public function getPosts() {
            $this->db->query('SELECT *, 
                                    posts.id as postId,
                                    users.id as userId, 
                                    posts.created_at as postCreated, 
                                    users.created_at as userCreated 
                                    FROM posts 
                                    INNER JOIN users 
                                    ON posts.user_id = users.id 
                                    ORDER BY posts.created_at DESC ');

            $results = $this->db->resultSet();

            return $results;
        } // end of getPosts method

        /**
         * @param $data
         * @return bool
         */
        public function addPost( $data) {
            $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');

            // Binding values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            // Executing query & returning true or false
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } // end of addPost method

        /**
         * Find Post by email
         *
         * @param $id
         * @return mixed
         */
        public function getPostById($id) {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        } // end of getPostById method

        /**
         * Update Post by id
         *
         * @param $data
         * @return bool
         */
        public function updatePost( $data) {
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

            // Binding values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            // Executing query & returning true or false
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } // end of updatePost method

        /**
         * Delete Post by id
         *
         * @param $id
         * @return bool
         */
        public function deletePost( $id) {
            $this->db->query('DELETE FROM posts WHERE id = :id');

            // Binding values
            $this->db->bind(':id', $id);

            // Executing query & returning true or false
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } // end of deletePost method
    }