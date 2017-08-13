<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation language lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe de ser aceptado.',
    'active_url'           => 'El campo :attribute no posee una URL válida.',
    'after'                => 'El campo :attribute debe de ser una fecha posterior a: :date.',
    'alpha'                => 'El campo :attribute solo debe de contener letras.',
    'alpha_dash'           => 'El campo :attribute solo debe de contener letras, números, y guiones.',
    'alpha_num'            => 'El campo :attribute solo debe de contener letras y números.',
    'array'                => 'El campo :attribute debe de ser una cadena (array).',
    'before'               => 'El campo :attribute debe de ser una fecha anterior a: :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe de estar entre :min y :max.',
        'file'    => 'El campo :attribute debe de estar entre :min y :max Kilobytes.',
        'string'  => 'El campo :attribute debe de estar entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe de tener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe de ser verdadero o falso.',
    'confirmed'            => 'El campo de confirmación :attribute no coincide.',
    'date'                 => 'El campo :attribute no posee una fecha válida.',
    'date_format'          => 'El campo :attribute no coincide con el formato :format.',
    'different'            => 'El campo :attribute debe de tener un valor diferente a ":other"',
    'digits'               => 'El campo :attribute debe de ser de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe de ser de :min y :max dígitos.',
    'distinct'             => 'El campo :attribute posee un valor duplicado.',
    'email'                => 'El campo :attribute debe de ser un correo electrónico válido.',
    'exists'               => 'El campo seleccionado :attribute es inválido.',
    'filled'               => 'El campo :attribute es requerido.',
    'image'                => 'El campo :attribute debe de ser una imagen.',
    'in'                   => 'El campo seleccionado :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en el campo :other.',
    'integer'              => 'El campo :attribute debe de ser un número.',
    'ip'                   => 'El campo :attribute debe de ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe de ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El campo :attribute no debe de ser mayor a :max.',
        'file'    => 'El campo :attribute no debe de ser mayor a :max Kilobytes.',
        'string'  => 'El campo :attribute no debe de ser mayor a :max caracteres.',
        'array'   => 'El campo :attribute no debe de tener más de :max elemento(s).',
    ],
    'mimes'                => 'El campo :attribute debe de ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe de ser al menos de :min.',
        'file'    => 'El campo :attribute debe de ser al menos de :min Kilobytes.',
        'string'  => 'El campo :attribute debe de ser al menos de :min caracteres.',
        'array'   => 'El campo :attribute debe de tener al menos :min items.',
    ],
    'not_in'               => 'El campo seleccionado :attribute es inválido.',
    'numeric'              => 'El campo :attribute debe de ser numérico.',
    'present'              => 'El campo :attribute debe de estar presente.',
    'regex'                => 'El campo :attribute posee un formato inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que el campo :other sea :values.',
    'required_with'        => 'El campo :attribute es requerido cuando el campo :values está presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando el campo :values está presente.',
    'required_without'     => 'El campo :attribute es requerido cuando el campo :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ningún valor :values está presente.',
    'same'                 => 'El campo :attribute y el campo :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe de ser de :size.',
        'file'    => 'El campo :attribute debe de ser de :size Kilobytes.',
        'string'  => 'El campo :attribute debe de ser de :size caracteres.',
        'array'   => 'El campo :attribute must contain :size items.',
    ],
    'string'               => 'El campo :attribute debe de ser textual.',
    'timezone'             => 'El campo :attribute debe de ser una zona válida.',
    'unique'               => 'El campo :attribute ya ha sido escogido anteriormente.',
    'url'                  => 'El campo :attribute posee un formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom validation language lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'coordinator' => [
            'required_if' => 'El campo coordinador es requerido cuando el campo rol es "Docente".',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom validation attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'nombre',
        'second_name' => 'apellido',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'role' => 'rol',
        'password_confirmation' => 'confirmación de contraseña',
        'coordinator' => 'coordinador',

        'knowledge' => 'área de conocimiento',
        'conceptual' => 'bloque conceptual',
        'planification_date' => 'fecha de planificación',
        'time_start' => 'hora de inicio',
        'time_end' => 'hora de fin',

        'procedimental' => 'bloque procedimental',
        'actitudinal' => 'bloque actitudinal',
        'competences' => 'competencias',
        'indicators' => 'indicadores',
        'teaching_strategy' => 'estrategia de enseñanza',
        'teaching_sequence' => 'secuencia didáctica',
        'course' => 'curso',

        'null' => 'Ninguno'
    ],

];
