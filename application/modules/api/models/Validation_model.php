<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Validation_model extends CI_Model {
    public function __construct() {
        //Load Defaults here
        
        //Load Launguage File
        $this->load->language('common');
    }
    
    /**
     * 
     * @param type $data All data received on login
     * @return array return array of validation rules
     */
    public function loginValidation($data){
        //create login validation
        $config = [
            [
                'field' => 'pass',
                    'rules' => 'required',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                    ],
            ],
            [
                'field' => 'device_type',
                    'rules' => 'required|integer|in_list[1,2]',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                            'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                            'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                    ],
            ],
        ];
    if(isset($data['is_phone']) && $data['is_phone']){
        $config[] = array(
            "field" => "phone_no",
            "rules" => "required|trim|strip_tags|integer",
            "errors" => array(
                "integer" => $this->lang->line("INVALID_NUMBER"),
                "required" => $this->lang->line("NUMBER_REQURED"),    
            ),
        );
        $config[] = array(
            "field" => "country_code",
            "rules" => "required|trim|strip_tags",
            "errors" => array(
                "required" =>"Country Code is required",
            ),
        );
    }else if(isset($data['is_username'])){
        $config[] = array(
            "field" => "username",
            "rules" => "required|trim|strip_tags",
            "errors" => array(
                "required" => $this->lang->line("PARAM_MISSING"),    
            ),
        );
    }else{
        $config[] = array(
            "field" => "email",
            "rules" => "required|trim|strip_tags|valid_email",
            "errors" => array(
                "required" => $this->lang->line("PARAM_MISSING"),
                "valid_email" => $this->lang->line("INVALID_EMAIL_FORMAT"),
            ),
        );
    }
    return $config;
    }
    /**
     * 
     * @param type $data All data received on connect
     * @return array return array of validation rules
     */
    public function connectValidation($data){ 
        $config = [
             [
                'field' => 'access_token',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' =>$this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
            [
               'field' => 'type',
                   'rules' => 'required|integer|in_list[1,2,3]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' =>$this->lang->line("INVALID_SOCIAL_TYPE"),
                           'in_list' => $this->lang->line("INVALID_SOCIAL_TYPE"),
                   ],
           ],
        ];
        if(isset($data['type']) && $data['type'] == "2"){
            $config[] =array(
            "field" => "social_id",
            "rules" => "required|trim",
            "errors" => array(
                'required' => $this->lang->line("PARAM_MISSING"),
            ),
        );
        }elseif (isset ($data['type']) && $data['type'] == "3") {
            $config[] =array(
            "field" => "code",
            "rules" => "required|trim",
            "errors" => array(
                'required' => $this->lang->line("PARAM_MISSING"),
            ),
        );
        }
        return $config;
    }
    /**
     * 
     * @param type $data All data received on delete
     * @return array return array of validation rules
     */
    public function deleteValidation($data){
        $config = [
             [
                'field' => 'access_token',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' =>$this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
            [
               'field' => 'event_id',
                   'rules' => 'required|trim',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                   ],
           ],
        ];
        return $config;
    }
      /**
     * 
     * @param type $data All information received at user profile
     * @return array return array of validation rules
     */
    public function userprofileValidation($data){
        $config = [
             [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
             [
                'field' => 'user_id',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
            ],
            [
                'field' => 'device_type',
                    'rules' => 'required|integer|in_list[1,2]',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                            'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                            'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                    ],
            ]
        ];
        
        return $config;
    }
    /**
     * 
     * @param type $data All information received at event detail
     * @return array return array of validation rules
     */
    public function eventDetailValidation($data){
        $config = [
             [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
             [
                'field' => 'event_id',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
            ],
            [
                'field' => 'device_type',
                    'rules' => 'required|integer|in_list[1,2]',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                            'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                            'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                    ],
            ]
        ];
        
        return $config;
    }
    /**
     * 
     * @param type $data All information received at media report
     * @return array return array of validation rules
     */
    public function mediaReportValidation($data){
        $config = [
             [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
             [
                'field' => 'media_id',
               'rules' => array(
                   'required',
                   'trim',
                   array($this->Validation_model, 'mediaExist') 
               ),
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                    'mediaExist' => $this->lang->line("MEDIA_EXIST_NOT"),
                ],
            ],
            [
                'field' => 'device_type',
                    'rules' => 'required|integer|in_list[1,2]',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                            'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                            'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                    ],
            ],
            [
                'field' => 'reason',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                    ],
            ],
        ];
        return $config;
    }
    /**
     * 
     * @param type $data All information received at media report
     * @return array return array of validation rules
     */
    public function mediaDeleteValidation($data){
        $config = [
             [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
             [
                'field' => 'media_id',
               'rules' => array(
                   'required',
                   'trim',
                   array($this->Validation_model, 'mediaExist') 
               ),
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                    'mediaExist' => $this->lang->line("MEDIA_EXIST_NOT"),
                ],
            ],
            [
                'field' => 'device_type',
                    'rules' => 'required|integer|in_list[1,2]',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                            'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                            'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                    ],
            ]
        ];
        return $config;
    }
    /**
     * 
     * @param type $data All information received at checkEvent
     * @return array return array of validation rules
     */
    public function checkEventValidation($data){
        $config = [
            [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
           [
               'field' => 'title',
                   'rules' => 'required',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                   ],
           ],
           [
                'field' => 'category',
                   'rules' => 'required',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                   ],
           ],
        ];
        return $config;
    }
    
    public function unlinkValidation($data){
        $config = [
            [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
           [
                'field' => 'type',
               'rules' => 'required|trim|in_list[2,3]|integer',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    'in_list' => $this->lang->line("INVALID_SOCIAL_TYPE"),
                    'integer' => $this->lang->line("INVALID_SOCIAL_TYPE"),
                ],
           ]
        ];
        return $config;
    }

    /**
     * 
     * @param type $media_id id of media
     * @return type status of media existence 
     */
    public function mediaExist($media_id){
        //Load model
        $this->load->model('Common_model');
        $check = $this->Common_model->fetch_data('event_media','id',array('where' => array('id' => $media_id)),TRUE);
        //check if media exists
        $exist = (empty($check)) ? FALSE : TRUE;
        //return status
        return $exist;
    }
    /**
     * 
     * @param type $data Validates access token and device type
     * @return array return array of validation rules 
     */
    public function defaultValidation($data){
        $config = [
            [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
        ];
        
        return $config;
    }
    /**
     * 
     * @param array $data access_token, device_type, reason
     * @return array return array of validation rules
     */
    public function reportappValidation($data){
        $config = [
          [
                'field' => 'access_token',
               'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
          [
              'field' => 'reason',
                  'rules' => 'required|trim',
                  'errors' => [
                          'required' => $this->lang->line("PARAM_MISSING"),
                  ],
          ],
          [
              'field' => 'description',
                  'rules' => 'trim|min_length[10]|max_length[250]',
              'errors' => [
                          'min_length' => $this->lang->line("MIN_LENGTH_ERROR"),
                          'max_length' => $this->lang->line("MAX_LENGTH_ERROR"),
                  ],
          ]
        ];
        return $config;
    }
    /**
     * 
     * @param array $data access_token, device_type, social_account, push_notification, sound,map
     * @return array return array of validation rules
     */
    public function settingsValidation($data){
        $config = $this->defaultValidation($data);
        
        if(isset($data['social_account'])){
            $config[] = [
                'field' => 'social_account',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
            ];
        }
        if(isset($data['push_notification'])){
            $config[] = [
                'field' => 'push_notification',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
            ];
        }
        if(isset($data['sound'])){
            $config[] = [
                'field' => 'sound',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
            ];
        }
        if (isset($data['map'])){
            $config[] = [
                'field' => 'map',
                'rules' => 'required|in_list[1,2,3]|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                    'in_list' => $this->lang->line("INVALID_MAP_TYPE"),
                ],
            ];
        }
        return $config;
    }
    /**
     * 
     * @param array $data access_token, device_type
     * @return array return array of validation rules
     */
    public function peoplelikedValidation($data){
        $config = $this->defaultValidation($data);
        return $config;
    }
       /**
     * 
     * @param array $data access_token, device_type
     * @return array return array of validation rules
     */
    public function eventlikedValidation($data){
        $config = $this->defaultValidation($data);
        return $config;
    }
    /**
     * 
     * @param array $data access_token, device_type
     * @return array return array of validation rules
     */
    public function eventbyfriendsValidation($data){
        $config = $this->defaultValidation($data);
        return $config;
    }
    /**
     * 
     * @param array $data All information received at saveEvent
     * @return array array of validation rules
     */
    public function saveEventValidation($data){
        $config = $this->defaultValidation($data);
        $config[] = [
            'field' => 'event_id',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => $this->lang->line("PARAM_MISSING"),
                ],
        ];
        return $config;
    }
    /**
     * 
     * @param array $data All information received at unsaveEvent
     * @return array array of validation rules
     */
    public function unsaveEventValidation($data){
        $config = $this->saveEventValidation($data);
        return $config;
    }
    /**
     * 
     * @param array $data All information required for change password
     * @return array Array of validation rules
     */
    public function changePasswordValidation($data){
        $config = [
            [
                'field' => 'access_token',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    ],
            ],
            [
                 'field' => 'old_pass',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                    ],
            ],
            [
                 'field' => 'new_pass',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("PARAM_MISSING"),
                    ],
            ]
         ];
        return $config;
    }
    /**
     * 
     * @param array $data All information received at feedback
     * @return array array of validation rules
     */
    public function feedbackValidation($data){
        $config = $this->defaultValidation($data);
        if(isset($data['log_feed']) && $data['log_feed']){
            $config[] = [
                [
                    'field' => 'feedback',
                   'rules' => 'required|trim',
                   'errors' => [
                       'required' => $this->lang->line("PARAM_MISSING"),
                   ],
                ],
                [
                    'field' => 'stars',
                   'rules' => 'required|trim',
                   'errors' => [
                       'required' => $this->lang->line("PARAM_MISSING"),
                   ],
                ]
           ];
        }
        return $config;
    }
    /**
     * 
     * @param type $data
     * @return array
     */
    public function createValidation($data){
        $config = [
            [
                'field' => 'access_token',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
           [
               'field' => 'category',
                   'rules' => 'required|integer',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                   ],
           ],
           [
               'field' => 'event_address',
                   'rules' => 'required|trim',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                   ],
           ],
           [
               'field' => 'title',
                    'rules' => array(
                    'required',
                    'trim',
                    array($this->Api_model, 'validateEventTitle') 
                ),
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'validateEventTitle' => $this->lang->line("EVENT_TITLE_NOT_ALLOWED"),
                   ],
           ],
        ];
        return $config;
    }
    /**
     * 
     * @param type $data All information received at like/unlike/follow/un-follow
     * @return array return array of validation rules
     */
    public function actionValidation($data){
        $config = [
            [
                'field' => 'access_token',
                    'rules' => 'required|trim',
                    'errors' => [
                            'required' => $this->lang->line("ACCESSTOKEN_MISSING"),
                    ],
            ],
            [
               'field' => 'device_type',
                   'rules' => 'required|integer|in_list[1,2]',
                   'errors' => [
                           'required' => $this->lang->line("PARAM_MISSING"),
                           'integer' => $this->lang->line("INVALID_DEVICE_TYPE"),
                           'in_list' => $this->lang->line("DEVICE_NOT_ALLOWED"),
                   ],
           ],
           [
               'field' => 'user_id',
               'rules' => 'required|trim|integer',
               'errors' => [
                   'required' => $this->lang->line("PARAM_MISSING"),
                   'integer' => $this->lang->line("INVALID_PARAM"),
               ]
           ]
        ];
        return $config;
    }
}