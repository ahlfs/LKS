<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $register = [ 
        'username' => [ 
            'rules' => 'required|min_length[5]|is_unique[users.username]', 
            'errors' => [ 
                'required' => 'Confirm Password need to be filled',
                'min_length' => 'Username atleast 5 character long',
                'is_unique' => 'Username already taken'     
            ], 
        ], 
        'email' => [ 
            'rules' => 'required|is_unique[users.email]', 
            'errors' => [ 
                'required' => 'Confirm Password need to be filled',
                'is_unique' => 'Email already taken'   
            ], 
        ], 
        'password' => [ 
            'rules' => 'required|min_length[8]', 
            'errors' => [ 
                'required' => 'Password need to be filled', 
                'min_length' => 'Password atleast 8 character long'  
            ], 
        ], 
        'confirm' => [ 
            'rules' => 'required|matches[password]', 
            'errors' => [ 
                'required' => 'Confirm Password need to be filled',
                'matches' => 'Confirm password and password are different'  
            ], 
        ], 
    ]; 

    public $movie = [ 
        'title' => [ 
            'rules' => 'required|max_length[100]|alpha_numeric_punct', 
            'errors' => [ 
                'alpha_numeric_punct' => 'Username only contains alphabet and number',
                'required' => 'Confirm Password need to be filled',
                'max_length' =>  'Title max 100 character long',
            ], 
        ], 
        'synopsis' => [ 
            'rules' => 'required', 
            'errors' => [ 
                'required' => 'Synopsis Password need to be filled',  
            ], 
        ], 
        'poster' => [ 
            'rules' => 'permit_empty|max_size[poster,10240]', 
            'errors' => [ 
                'mime_in' => 'Poster must an image',  
                'max_size' => 'File max 10MB', 
            ], 
        ], 
        'genre' => [ 
            'rules' => 'required', 
            'errors' => [ 
                'required' => 'Genre need to be filled',  
            ], 
        ], 
        'runtime' => [ 
            'rules' => 'required', 
            'errors' => [ 
                'required' => 'Runtime need to be filled',
            ], 
        ], 
        'year' => [ 
            'rules' => 'required', 
            'errors' => [ 
                'required' => 'Release year need to be filled',
            ], 
        ], 
    ]; 

   
}
