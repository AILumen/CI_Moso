<?php

class Common_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        //$this->load->library(array('s3', 'session'));
    }

    /**
     * Fetch data from any table based on different conditions
     *
     * @access	public
     * @param	string
     * @param	string
     * @param	array
     * @return	bool
     */
    public function fetch_data($table, $fields = '*', $conditions = array(), $returnRow = false) {
        //Preparing query
        $this->db->select($fields);
        $this->db->from($table);

        //If there are conditions
        if (count($conditions) > 0) {
            $this->condition_handler($conditions);
        }
        $query = $this->db->get();
        
        return $returnRow ? $query->row_array() : $query->result_array();
    }

  

    /**
     * Insert data in DB
     *
     * @access	public
     * @param	string
     * @param	array
     * @param	string
     * @return	string
     */
    public function insert_single($table, $data = array()) {
        //Check if any data to insert
        if (count($data) < 1) {
            return false;
        }
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    /**
     * Insert batch data
     *
     * @access	public
     * @param	string
     * @param	array
     * @param	array
     * @param	bool
     * @return	bool
     */
    public function insert_batch($table, $defaultArray, $dynamicArray = array(), $updatedTime = false) {
        //Check if default array has values
        if (count($dynamicArray) < 1) {
            return false;
        }

        //If updatedTime is true
        if ($updatedTime) {
            $defaultArray['UpdatedTime'] = time();
        }

        //Iterate it
        foreach ($dynamicArray as $val) {
            $updates[] = array_merge($defaultArray, $val);
        }
        $this->db->insert_batch($table, $updates);
    }

    /**
     * Delete data from DB
     *
     * @access	public
     * @param	string
     * @param	array
     * @param	string
     * @return	string
     */
    public function delete_data($table, $conditions = array()) {
        //If there are conditions
        if (count($conditions) > 0) {
            $this->condition_handler($conditions);
        }
        return $this->db->delete($table);
    }

    /**
     * Handle different conditions of query
     *
     * @access	public
     * @param	array
     * @return	bool
     */
    private function condition_handler($conditions) {
        //Where
        if (array_key_exists('where', $conditions)) {

            //Iterate all where's
            foreach ($conditions['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        //Where In
        if (array_key_exists('where_in', $conditions)) {

            //Iterate all where in's
            foreach ($conditions['where_in'] as $key => $val) {
                $this->db->where_in($key, $val);
            }
        }

        //Where Not In
        if (array_key_exists('where_not_in', $conditions)) {

            //Iterate all where in's
            foreach ($conditions['where_not_in'] as $key => $val) {
                $this->db->where_not_in($key, $val);
            }
        }

        //Having
        if (array_key_exists('having', $conditions)) {
            $this->db->having($conditions['having']);
        }

        //Group By
        if (array_key_exists('group_by', $conditions)) {
            $this->db->group_by($conditions['group_by']);
        }

        //Order By
        if (array_key_exists('order_by', $conditions)) {

            //Iterate all order by's
            foreach ($conditions['order_by'] as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }

        //Like
        if (array_key_exists('like', $conditions)) {

            //Iterate all likes
            $i = 1;
            foreach ($conditions['like'] as $key => $val) {
                if ($i == 1) {
                    $this->db->like('LOWER(' . $key . ')', strtolower($val), 'after');
                } else {
                    $this->db->or_like('LOWER(' . $key . ')', strtolower($val), 'after');
                }
                $i++;
            }
        }

        //Limit
        if (array_key_exists('limit', $conditions)) {
            //If offset is there too?
            if (count($conditions['limit']) == 1) {
                $this->db->limit($conditions['limit'][0]);
            } else {
                $this->db->limit($conditions['limit'][0], $conditions['limit'][1]);
            }
        }

        if (array_key_exists('findinset', $conditions)) {

            //Iterate all find in set 
            foreach ($conditions['findinset'] as $key => $val) {
                $this->db->where("FIND_IN_SET($val, $key)");
            }
        }
    }

    /**
     * Update Batch
     *
     * @access	public
     * @param	string
     * @param	array
     * @return	boolean
     */
    public function update_batch_data($table, $defaultArray, $dynamicArray = array(), $key) {
        //Check if any data
        if (count($dynamicArray) < 1) {
            return false;
        }

        //Prepare data for insertion
        foreach ($dynamicArray as $val) {
            $data[] = array_merge($defaultArray, $val);
        }
        return $this->db->update_batch($table, $data, $key);
    }

    public function update_db($table, $updates, $where) {
        //If there are conditions
        $this->db->set('tagTitle', $updates['tagTitle'])->where('tagId', $where['tagId'])->update($table);
    }

    /**
     * Update details in DB
     *
     * @access	public
     * @param	string
     * @param	array
     * @param	array
     * @return	string
     */
    public function update_single($table, $updates, $conditions = array()) {
        //If there are conditions

        if (count($conditions) > 0) {
            $this->condition_handler($conditions);
        }
        //echo $this->db->last_query(); die;
        if(isset($updates['attempts'])){
            $this->db->set('attempts', 'attempts+1', FALSE);
            unset($updates['attempts']);
        }
         return $this->db->update($table, $updates);
    }

    public function update_new($table, $updates, $condition) {

        //If there are conditions
        //~ if (count($conditions) > 0) {
        //~ $this->condition_handler($conditions);
        //~ }

        $this->db->where('id', $condition);

        //echo $this->db->last_query(); die;
        return $this->db->update($table, $updates);
    }

    /**
     * Count all records
     *
     * @access	public
     * @param	string
     * @return	array
     */
    public function fetch_count($table, $conditions = array()) {
        $this->db->from($table);
        //If there are conditions
        if (count($conditions) > 0) {
            $this->condition_handler($conditions);
        }
        return $this->db->count_all_results();
    }

    /**
     * For sending mail
     *
     * @access	public
     * @param	string
     * @param	string
     * @param	string
     * @param	boolean
     * @return	array
     */
    public function sendmail($email, $subject, $message = false, $single = true, $param = false, $templet = false) {
        if ($single == true) {
            $this->load->library('email');
        }

        $this->config->load('email');
        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('from'), $this->config->item('from_name'));
        $this->email->reply_to($this->config->item('repy_to'), $this->config->item('reply_to_name'));
        $this->email->to($email);
        $this->email->subject($subject);
        if ($param && $templet) {
            $body = $this->load->view('mail/' . $templet, $param, TRUE);
            $this->email->message($body);
        } else {
            $this->email->message($message);
        }
        return $this->email->send() ? true : false;
    }

    function mcrypt_data($input) {
        /* Return mcrypted data */
        $key1 = "ShareSpark";
        $key2 = "Org";
        $key = $key1 . $key2;
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $input, MCRYPT_MODE_CBC, md5(md5($key))));
        //var_dump($encrypted);
        return $encrypted;
    }

    function demcrypt_data($input) {
        /* Return De-mcrypted data */
        $key1 = "ShareSpark";
        $key2 = "Org";
        $key = $key1 . $key2;
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;
    }

    function bcrypt_data($input) {
        $salt = substr(str_replace('+', '.', base64_encode(sha1(microtime(true), true))), 0, 22);
        $hash = crypt($input, '$2a$12$' . $salt);
        return $hash;
    }

    public function simplify_array($array, $key) {
        $returnArray = array();
        foreach ($array as $val) {
            $returnArray[] = $val[$key];
        }
        return $returnArray;
    }

    //Validate date
    function validateDate($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // for layout
    function load_views($customView, $data = array()) {
        $this->load->view('common/header', $data);
        $this->load->view('common/left_side', $data);
        $this->load->view($customView, $data);
        $this->load->view('common/footer', $data);
    }


}

